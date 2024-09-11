<?php
/*
 *  Event-Kalender (SQLite) - kalender.php (utf-8)
 * von Werner Zenk
 */

// Namen und Passwörter der Benutzer
$NAME_PASS["user"] = "0000";
// $NAME_PASS["user2"] = "0002";

// Benachrichtigung per E-Mail versenden
// Eine beim Provider registrierte E-Mail-Adresse.
// Siehe Datei: lies_micht.txt
$EMAIL = "";

/*
* Programmspezifische Einstellungen
 */

// Sitzungskonfigurationsanweisung
session_start();

// HTTP-Charset-Parameter
header('Content-type: text/html; charset=utf-8');

// PHP-Fehlermeldungen (unter localhost anzeigen)
if (isset($_SERVER["SERVER_NAME"])) {

  error_reporting($_SERVER["SERVER_NAME"] == 'localhost' ? E_ALL : E_ALL);
}

// Zeitzone - https://www.php.net/manual/de/timezones.php
date_default_timezone_set("Europe/Berlin");

// Pfad zur Datenbank-Datei
$datenbank = __DIR__ . "/db/datenbank.db";

// Datenbank-Datei erstellen wenn diese nicht existiert
if (!file_exists($datenbank)) {

  $db = new PDO('sqlite:' . $datenbank);
  $db->exec("CREATE TABLE `kalender`(
  id INTEGER PRIMARY KEY,
  groupid INTEGER,
  event TEXT,
  beschreibung TEXT,
  farbe TEXT,
  privat INTEGER,
  festtag INTEGER,
  nachricht INTEGER,
  datum TEXT,
  datumbeginn TEXT,
  datumende TEXT,
  uhr TEXT,
  uhrbeginn TEXT,
  uhrende TEXT)");
} else {

  // Verbindung herstellen
  $db = new PDO('sqlite:' . $datenbank);
}

// Benutzer definieren
define("BENUTZER", (isset($_SESSION["name"])) ? true : false);

// SQL - Private Events anzeigen
define("BENUTZER_PRIVAT", (BENUTZER) ? ' AND `privat` >= 0 ' : ' AND `privat` = 0 ');

// Monate
define("MONATE", [
  1 => 'Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'
]);

// Wochentage
define("WOCHENTAGE", [
  1 => 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag', 'Sonntag'
]);

// Formular
define(
  "FORM",
  '<form id="form" accept-charset="utf-8" autocomplete="on" spellcheck="true">
 <div id="titelleiste">
  <div id="titel">Terminkalender</div>
  <div id="schliessen" class="navLink" title="Schließen&#10;Taste: ESC">&#10761;</div>
 </div>' . PHP_EOL . '
 <div id="formblock">'
);

define("FORM_", PHP_EOL . '</div>' . PHP_EOL . '</form>');

// BBCode - Info
define(
  "BBCODE",
  '<span class="tool">?<span class="tip">Verwende BBCodes:<br>
    [b]Fett[/b]&emsp; [i]Kursiv[/i]&emsp; [q]Zitat[/q]<br>
    [u]Unterstrichen[/u]&emsp; [s]Durchgestrichen[/s]<br>
    [c=red]Farbe[/c]&emsp; [bc=blue]Hintergrund[/bc]<br>
    [g=bild.jpg][/g]&emsp; [z]Zentriert[/z]<br>
    [a=audio.mp3][/a]&emsp; [v=video.mp4][/v]<br>
    URL und Zeilenumbrüche werden formatiert.</span></span>'
);

// Farbpalette (für Chromium basierte Browser)
define(
  "FARBPALETTE",
  '<datalist id="farben">
    <option>#BBDAF9</option> <option>#FFCACA</option> <option>#FFFFBF</option>
    <option>#C4FFC4</option> <option>#FFD2FF</option> <option>#CAFFFF</option>
    <option>#F5F5F5</option> <option>#FFFFFF</option> <option>#1578DB</option>
    <option>#E10000</option> <option>#DFDF00</option> <option>#00DF00</option>
    <option>#DF00DF</option> <option>#00DDDD</option> <option>#7F7F7F</option>
   </datalist>'
);

// Monat und Jahr festsetzen
$aktuell = date_create("now");
$monat = $_GET["monat"] ?? date_format($aktuell, "n");
$jahr = $_GET["jahr"] ?? date_format($aktuell, "Y");
$ausgewaehlt = date_create($jahr . "-" . $monat . "-01 00:00:00");

/*
 * Daten auslesen
 */

if (isset($_GET["kalender"])) {

  // Events des gewählten Monats auslesen
  $select = $db->prepare("SELECT `id`, `event`, `beschreibung`, `farbe`, `privat`, `festtag`, `nachricht`, `datum`, `datumende`, `uhr`, `uhrende`
                          FROM `kalender`
                          WHERE STRFTIME('%Y', `datum`) = :jahr AND STRFTIME('%m', `datum`) = :monat
                          " . BENUTZER_PRIVAT . "
                          OR STRFTIME('%m', `datum`) = :monat AND `festtag` = 1 " . BENUTZER_PRIVAT . "
                          ORDER BY `datum` ASC");
  if ($select->execute([
    ':jahr' => $jahr,
    ':monat' => sprintf("%02s", $_GET["monat"])
  ])) {
    $events = $select->fetchAll();

    // Events sammeln
    $daten = [];
    foreach ($events as $event) {

      // Datum und Uhrzeit
      sscanf($event["datum"], "%4s-%2u-%2u %5s", $dbJahr, $dbMonat, $dbTag, $dbUhr);
      $datum = datum($dbTag, $dbMonat, $dbJahr);
	  
	  sscanf($event["datumende"], "%4s-%2u-%2u %5s", $dbJahrEnde, $dbMonatEnde, $dbTagEnde, $dbUhrende);
	  $datumende = datum($dbTagEnde, $dbMonatEnde, $dbJahrEnde);

      $uhr = ($dbUhr == '00:00') ? '' : $dbUhr . ' ' . $dbUhrende;

      // HTML-Title Attribut
      $tuhr = !empty($uhr) ? ' - ' . $uhr . 'Uhr' : $uhr;
      $optionen = ($event["privat"] == 1 ? '| Privat ' : '') . ($event["festtag"] == 1 ? '| Festtag ' : '') . ($event["nachricht"] == 1 ? '| Nachricht ' : '');
      $title = 'title="' . $datum . $tuhr . (!empty($optionen) ? ' ' . $optionen : '') . '&#10;' . $event["event"] .
        (!empty($event["beschreibung"]) ? '&#10;' . stripBBCode($event["beschreibung"]) : '') . '"';

      // Schriftfarbe je nach Hintergrundfarbe
      $schriftfarbe = schwarzweiss($event["farbe"]);

      // Events zum Array hinzufügen
      $button = '<button type="button" class="event" data-event="' . $event["id"] . '" data-farbe="' . $event["farbe"] . '|' . $schriftfarbe .  '" ' . $title . '>' . $uhr . htmlspecialchars($event["event"]) . '</button>';
      isset($daten[$dbTag]) ? $daten[$dbTag] .= $button : $daten[$dbTag] = $button;
    }

    /*
    * Kalender (HTML-Tabelle) erstellen
    */

    // Monatsbilder anzeigen (HTML-Kommentar <!-- --> entfernen)
    $monatsbild = '<!-- <div id="monatsbild" data-bildname="img/' . $monat . '.png"></div> -->' . PHP_EOL;

    // Navigation
    $tabelle = $monatsbild . '<table id="tabelle">
    <thead>
    <tr>
    <th colspan="8" id="navigation">
    <span class="navLink" id="monatMinus" title="Einen Monat zurück&#10;STRG + Pfeiltaste Links">&#10092;</span>
    <span class="navLink" id="monat" data-monat="' . $monat . '" title="Monat: ' . MONATE[$monat] . '&#10;Kalender auswählen&#10;Taste: K">' . MONATE[$monat] . '</span>
    <span class="navLink" id="monatPlus" title="Einen Monat weiter&#10;STRG + Pfeiltaste Rechts">&#10093;</span>
    <span class="navLink" id="kalenderAktuell" title="Aktueller Kalender&#10;Taste: X">&#9711;</span>
    <span class="navLink" id="jahrMinus" title="Ein Jahr zurück&#10;STRG + Pfeiltaste Ab">&#10092;</span>
    <span class="navLink" id="jahr" data-jahr="' . $jahr . '" title="Jahr: ' . $jahr . '&#10;Kalender auswählen&#10;Taste: K">' . $jahr . '</span>
    <span class="navLink" id="jahrPlus" title="Ein Jahr weiter&#10;STRG + Pfeiltaste Auf">&#10093;</span>
    </th>
    </tr>
    <tr>
    <th class="woche spalte" title="Woche&#10;Taste: W">W</th>' . PHP_EOL;

    // Wochentage
    foreach (WOCHENTAGE as $wochentag) {
      $tabelle .= '  <th width="14.285714%" class="spalten ' . $wochentag . '"><span title="' . $wochentag . '">' .
        mb_substr($wochentag, 0, 2) . '</span><span class="abbrWochentag">' . mb_substr($wochentag, 2) . '</span>' . '</th>' . PHP_EOL;
    }

    $tabelle .= ' </tr>
    </thead>
    <tbody>';

    // Länge des aktuellen Monats
    $monatslaenge = date_format($ausgewaehlt, "t");

    // Länge des vorherigen Monats
    $altmonatslaenge = date_format(date_modify(clone $ausgewaehlt, '-1 month'), "t");

    // Erster Wochentag im aktuellen Monat
    $ersterwochentag = date_format(date_modify(clone $ausgewaehlt, 'first day of this month'), "w");
    $ersterwochentag = ($ersterwochentag == 0) ? 7 : $ersterwochentag;

    // Erste Woche im Monat
    $woche = woche('1', $monat, $jahr);
    $tabelle .= PHP_EOL . ' <tr data-woche="' . $woche . '">' . PHP_EOL . '  <th class="woche" title="Woche ' . $woche . '">' . $woche . '</th>';

    // Kalendertage des vorherigen Monats
    for ($i = 1; $i < $ersterwochentag; $i++) {
      $tabelle .= PHP_EOL . '  <td class="keintag"><div class="keineAuswahl">' . ($altmonatslaenge - ($ersterwochentag - 1) + $i) . '</div></td>';
    }

    // Kalendertage des aktuellen Monats
    for ($tag = 1; $tag <= $monatslaenge; $tag++) {
      $rest = ($tag + $ersterwochentag - 1) % 7;

      // HTML-Title Attribut
      $title = datum($tag, $monat, $jahr) .
        '&#10;Woche: ' . woche($tag, $monat, $jahr) .
        ' | Quartal: ' . quartal($monat);

      // Heute - CSS Markierung
      $heute = (sprintf("%s%02s%02s", $jahr, $monat, $tag) == date_format($aktuell, "Ymd") ? ' heute' : '');

      // Kalendertag hinzufügen
      $wochentag = wochentag($tag, $monat, $jahr);
      $tabelle .= PHP_EOL . '  <td class="eintag' . $heute . '" data-tag="' . sprintf("%02s.%02s.%s", $tag, $monat, $jahr) . '" data-wochentag="' . $wochentag . '">' .
        '<div class="' . (BENUTZER ? 'tag navLink' : 'keineAuswahl') . '" data-monatstag="' . sprintf("%s-%02s-%02s", $jahr, $monat, $tag) . '" title="' . $title . '">' . $tag . '</div>';

      // Vorhandene Daten in die Tabelle hinzufügen
      if (isset($daten[$tag])) {
        $tabelle .= $daten[$tag];
      }

      $tabelle .= '</td>';

      // Nächste Tabellenzeile beginnen
      if ($rest == 0) {
        if ($tag <= ($monatslaenge - 1)) {
          $woche = woche($tag + 1, $monat, $jahr);
          $tabelle .= PHP_EOL . ' </tr>' . PHP_EOL . ' <tr data-woche="' . $woche . '">' . PHP_EOL . ' <th class="woche"><span title="Woche ' . $woche . '">' . $woche . '</span></th>';
        }
      }
    }

    // Kalendertage des nächsten Monats
    if ($rest > 0) {
      for ($i = 1; $i <= (7 - $rest); $i++) {
        $tabelle .= PHP_EOL . '  <td class="keintag"><div class="keineAuswahl">' . $i . '</div></td>';
      }
    }

    // Menü
    $anmeldung = (BENUTZER) ?
      '<span id="log" class="navLink abmelden" title="Vom Event-Kalender abmelden&#10;Taste: A">Abmelden</span>' :
      '<span id="log" class="navLink" title="Am Event-Kalender anmelden&#10;Taste: A">Anmelden</span>';

    $tabelle .= PHP_EOL . '  </tr>
</tbody>
<tfoot>
  <tr>
   <td colspan="8" id="menue">
   <span id="wochennr" class="navLink" title="Wochennummern einblenden&#10;Taste: W">Woche</span> |
   <span id="calendar" class="navLink" title="Kalender auswählen&#10;Taste: K">Kalender</span> |
  ' . $anmeldung . '
   </td>
 </tr>
</tfoot>
</table>';

    echo $tabelle;
  }
}

/*
 * Formulare
 */

// Eintragen
if (isset($_GET["eintragen"]) && BENUTZER) {
  echo FORM . '
  <div id="ueberschrift">Event eintragen</div>

  <p>
   <label title="Event (Erforderlich)&#e10;Zugriffstaste: E"><u>E</u>vent:
   <input type="text" name="event" maxlength="50" placeholder="Event eintragen" accesskey="e" class="eventfeld" required autofocus></label>
  </p>

  <p>
   <label title="Startdatum (Erforderlich)&#10;Zugriffstaste: D"><u>S</u>tartdatum: 
   <input type="date" name="datumbeginn" value="' . $_GET["jahr"] . '-' . sprintf("%02s", $_GET["monat"]) . '-' . sprintf("%02s", $_GET["tag"]) . '"
    min="0001-01-01" max="2500-01-01" accesskey="d" required></label>&emsp;
   <label title="Uhrzeit (Optional, darf nicht leer sein!)&#10;Setze: &#34;00:00&#34; für einen ganztägigen Event.&#10;Zugriffstaste: U"><u>U</u>hrzeit:
   <input type="time" name="uhrbeginn" value="00:00" accesskey="u" required></label>&emsp;
  </p>

  <p>
   <label title="Enddatum (Erforderlich)&#10;Zugriffstaste: D"><u>E</u>nddatum: 
   <input type="date" name="datumende" value="' . $_GET["jahr"] . '-' . sprintf("%02s", $_GET["monat"]) . '-' . sprintf("%02s", $_GET["tag"]) . '"
    min="0001-01-01" max="2500-01-01" accesskey="d" required></label>&emsp;
   <label title="Uhrzeit bis (Optional, darf nicht leer sein!)&#10;Zugriffstaste: S"> Uhrz<u>e</u>it:
   <input type="time" name="uhrende" value="00:00" accesskey="s" required></label>
  </p>
  
<!--
  <p>
   <input type="checkbox" name="festtag" id="festtag" accesskey="t">
   <label for="festtag" title="Wiederkehrend (Optional)&#10;Ein fester Tag im Jahr für Feiertage, Geburtstage etc.&#10;Zugriffstaste: k">Wieder<u>k</u>ehrend</label>
  </p>
-->  

  <p>
   <label title="Farbe (Optional)&#10;Markiere den Event mit einer bestimmten Farbe.&#10;Zugriffstaste: F"><u>F</u>arbe:
   <input type="color" name="farbe" value="#D5E8FB" list="farben" accesskey="f"></label>
   ' . FARBPALETTE . '&nbsp;
   <input type="checkbox" name="privat" id="privat" accesskey="p">
   <label for="privat" title="Privater Event (Optional)&#10;Dieser Event wird erst nach einer Anmeldung angezeigt.&#10;Zugriffstaste: P"><u>P</u>rivat</label>&nbsp;
   <input type="checkbox" name="nachricht" id="nachricht" accesskey="n">
   <label for="nachricht" title="Nachricht (Optional)&#10;Eine Benachrichtigung per E-Mail senden.&#10;Zugriffstaste: N"><u>N</u>achricht</label>
  </p>

  <p>
   <label for="beschreibung" title="Beschreibung (Optional)&#10;Zugriffstaste: B"><u>B</u>eschreibung:</label> 
   ' . BBCODE . '<br>
   <textarea name="beschreibung" id="beschreibung" placeholder="Beschreibung (Optional)" accesskey="b"></textarea>
  </p>

  <p class="absatz">
   <input type="hidden" name="aktion" value="eintragen">
   <button type="button" id="absenden" accesskey="e" title="Event eintragen&#10;Zugriffstaste: E"><u>E</u>intragen</button>
  </p>
  ' . FORM_;
}

// Event anzeigen / bearbeiten
if (isset($_GET["bearbeiten"])) {

  $select = $db->prepare("SELECT `id`, `event`, `beschreibung`, `farbe`, `privat`,`festtag`, `nachricht`, `datum`, `datumende`, `uhr`, `uhrende`
                          FROM `kalender`
                          WHERE `id` = :id");

  $select->execute([':id' => $_GET["id"]]);
  $event = $select->fetch();

  // Datum und Uhrzeit
  sscanf($event["datum"], "%4s-%2s-%2s %5s", $dbJahr, $dbMonat, $dbTag, $dbUhr);
  $datum = shortDate($dbTag, $dbMonat, $dbJahr);
  sscanf($event["datumende"], "%4s-%2s-%2s %5s", $dbJahrEnde, $dbMonatEnde, $dbTagEnde, $dbUhrende);
  $datumende = shortDate($dbTagEnde, $dbMonatEnde, $dbJahrEnde);
  
  $uhr = $dbUhr . ' Uhr';
  $uhrende = $dbUhrende . ' Uhr';
  
  //$uhrende = ($event["uhr"] == '00:00') ? '' : ' - ' . $event["uhr"];
  //$uhr = ($dbUhr != '00:00') ? '<br> ' . $dbUhr . $uhrende . ' Uhr' : '';

  // Schriftfarbe je nach Hintergrundfarbe
  $schriftfarbe = schwarzweiss($event["farbe"]);

  // Checkbox-Werte festlegen
  $cxFesttag = $event["festtag"] == 1 ? ' checked' : '';
  $cxPrivat = $event["privat"] == 1 ? ' checked' : '';
  $cxNachricht = $event["nachricht"] == 1 ? ' checked' : '';

  echo FORM . '
  <div id="ueberschrift">
  ' . $datum . ' - ' . $uhr . '<br> 
  bis<br> 
  ' . $datumende . ' - ' . $uhrende . '
  </div>

  <p>
  <div id="eventtext" class="event" data-farbe="' . $event["farbe"] . '|' . $schriftfarbe .  '">' . $event["event"] . '</div>
  </p>' .
    (!empty($event["beschreibung"]) ? '<div id="beschreibung">' . textFormatierung($event["beschreibung"]) . '</div>' : '');

  // Event durch den Benutzer bearbeiten
  if (BENUTZER) {

    echo '<details>
  <summary accesskey="r" title="Event bearbeiten&#10;Zugriffstaste: R">Event bea<u>r</u>beiten</summary>

  <p>
   <label title="Event (Erforderlich) - ID: ' . $event["id"] . '&#10;Zugriffstaste: E"><u>E</u>vent:
   <input type="text" name="event" value="' . $event["event"] . '" maxlength="50" placeholder="Event eintragen" class="eventfeld" accesskey="e" required></label>
  </p>

  <p>
   <label title="Datum (Erforderlich)&#10;Zugriffstaste: D"><u>D</u>atum:
   <input type="date" name="datum" value="' . $dbJahr . '-' . $dbMonat . '-' . $dbTag . '" min="0001-01-01" max="2500-01-01" accesskey="d" required></label>&emsp;
   <input type="checkbox" name="festtag" id="festtag"' . $cxFesttag . ' accesskey="t">
   <label for="festtag" title="Festtag (Optional)&#10;Ein fester Tag im Jahr für Feiertage, Geburtstage etc.&#10;Zugriffstaste: T">Fest<u>t</u>ag</label>
  </p>

  <p>
   <label title="Uhrzeit (Optional, darf nicht leer sein!)&#10;Setze: &#34;00:00&#34; für einen ganztägigen Event.&#10;Zugriffstaste: U"><u>U</u>hrzeit:
   <input type="time" name="uhr" value="' . $dbUhr . '" accesskey="u" required></label>&emsp;
   <label title="Uhrzeit bis (Optional, darf nicht leer sein!)&#10;Zugriffstaste: S"> bi<u>s</u>:
   <input type="time" name="uhr2" value="' . $event["uhr"] . '" accesskey="s" required></label>
  </p>

  <p>
   <label title="Farbe (Optional)&#10;Markiere den Event mit einer bestimmten Farbe.&#10;Zugriffstaste: F"><u>F</u>arbe:
   <input type="color" name="farbe" value="' . $event["farbe"] . '" list="farben" accesskey="f"></label>
   ' . FARBPALETTE . '&nbsp;
   <input type="checkbox" name="privat" id="privat"' . $cxPrivat . ' accesskey="p">
   <label for="privat" title="Privater Event (Optional)&#10;Dieser Event wird erst nach einer Anmeldung angezeigt.&#10;Zugriffstaste: P"><u>P</u>rivat</label>&nbsp;
   <input type="checkbox" name="nachricht" id="nachricht"' . $cxNachricht . ' accesskey="n">
   <label for="nachricht" title="Nachricht (Optional)&#10;Eine Benachrichtigung per E-Mail senden.&#10;Zugriffstaste: N"><u>N</u>achricht</label>
  </p>

  <p>
   <label for="beschreibung" title="Beschreibung (Optional)&#10;Zugriffstaste: B"><u>B</u>eschreibung:</label>
  ' . BBCODE . '<br>
   <textarea name="beschreibung" id="beschreibung" placeholder="Beschreibung (Optional)" accesskey="b">' . $event["beschreibung"] . '</textarea>
  </p>

  <p>
   <input type="checkbox" name="kopieren" id="kopieren" accesskey="k">
   <label for="kopieren" id="copy" title="Event kopieren (Optional)&#10;Den Event zum ausgewählten Datum kopieren.&#10;Zugriffstaste: K">Event <u>k</u>opieren</label> &emsp;
   <input type="checkbox" name="loeschen" id="loeschen" accesskey="l">
   <label for="loeschen" id="delete" title="Event löschen (Optional)&#10;Das Löschen des Events kann nicht rückgängig&#10;gemacht werden und bedarf einer Bestätigung.&#10;Zugriffstaste: L">Event <u>l</u>öschen</label>
  </p>

  <p class="absatz">
   <input type="hidden" name="id" value="' . $_GET["id"] . '">
   <input type="hidden" name="aktion" value="bearbeiten">
   <button type="button" id="absenden" accesskey="a" title="Änderungen ausführen&#10;Zugriffstaste: A"><u>A</u>usführen</button>
  </p>
  </details>';
  }

  echo FORM_;
}

// Kalender auswählen
if (isset($_GET["calendar"])) {

  // Auswahlliste für den Monat
  $auswahlMonat = PHP_EOL . '  <select name="monat" id="selMonat" autofocus accesskey="m">' . PHP_EOL;
  foreach (MONATE as $monatszahl => $monat) {
    $auswahlMonat .= '   <option value="' . $monatszahl . '"' . ($monatszahl == $_GET["monat"] ? ' selected' : '') . '>' . $monatszahl . ' - ' . $monat . '</option>' . PHP_EOL;
  }
  $auswahlMonat .= '  </select>';

  // Auswahlliste für das Jahr
  $_GET["jahr"] = ($_GET["jahr"] < 1 || $_GET["jahr"] > 2500) ? date_format($aktuell, "Y") : $_GET["jahr"];
  $jahre = range($_GET["jahr"] - 100, $_GET["jahr"] + 100);
  $auswahlJahr = PHP_EOL . '  <select name="jahr" id="selJahr" accesskey="j">' . PHP_EOL;
  foreach ($jahre as $jahr) {
    $auswahlJahr .= '   <option value="' . $jahr . '"' . ($jahr == $_GET["jahr"] ? ' selected' : '') . '>' . $jahr . '</option>' . PHP_EOL;
  }
  $auswahlJahr .= '  </select>';

  echo FORM . '
  <div id="ueberschrift">Kalender auswählen</div>

  <p class="absatz">
   <label title="Monat auswählen&#10;Zum Beispiel mit dem Mausrad drehen.&#10;Zugriffstaste: M"><u>M</u>onat: 
   ' . $auswahlMonat . '</label>&emsp;
   <label title="Jahr auswählen&#10;Zum Beispiel mit dem Mausrad drehen.&#10;Zugriffstaste: J"><u>J</u>ahr:
    ' . $auswahlJahr . '</label>
  </p>

  <p class="absatz">
   <input type="hidden" name="aktion" value="calendar">
   <button type="button" id="absenden" accesskey="a" title="Kalender anzeigen&#10;Zugriffstaste: A"><u>A</u>nzeigen</button>
  </p>
  ' . FORM_;
}

// Anmelden
if (isset($_GET["anmeldung"])) {

  echo FORM;

  if (!BENUTZER) {
    echo '
  <div id="ueberschrift">Anmeldung</div>

  <p>
   <label><u>N</u>ame:<br>
   <input type="text" name="name" autocomplete="username" accesskey="n" required></label>
  </p>

  <p>
   <label><u>P</u>asswort:<br>
   <input type="password" name="passwort" autocomplete="current-password" accesskey="p" required></label>
  </p>

  <p class="absatz">
   <input type="hidden" name="aktion" value="anmelden">
   <button type="button" id="absenden" accesskey="a" autofocus title="Anmelden&#10;Zugriffstaste: A"><u>A</u>nmelden</button>
  </p>
  ';
  } else {

    // Abmelden
    echo '
  <div id="ueberschrift">Abmeldung</div>

  <p class="absatz">
  <em>' . htmlspecialchars($_SESSION["name"]) . '</em>, sicher abmelden?
  </p>

  <p class="absatz">
   <input type="hidden" name="aktion" value="abmelden">
   <button type="button" id="absenden" accesskey="a" autofocus title="Abmelden&#10;Zugriffstaste: A"><u>A</u>bmelden</button>
  </p>
  ';
  }

  echo '<input type="hidden" name="jahr" value="' . $_GET["jahr"] . '"> <input type="hidden" name="monat" value="' . $_GET["monat"] . '">' . FORM_;
}

// Formular abgesendet
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Checkbox-Werte festlegen
  $festtag = isset($_POST["festtag"]) ? 1 : 0;
  $nachricht = isset($_POST["nachricht"]) ? 1 : 0;
  $privat = isset($_POST["privat"]) ? 1 : 0;

  // Eintragen
  if ($_POST["aktion"] == "eintragen" && BENUTZER) {

	$startDate = strtotime($_POST["datumbeginn"]);
	$endDate = strtotime($_POST["datumende"]);
	$datediff = round(($endDate - $startDate) / (60 * 60 * 24));
	$nextDay = $_POST["datumbeginn"];
	
    $eintragen = $db->prepare("INSERT INTO `kalender` (`groupid`, `event`, `beschreibung`, `farbe`, `privat`, `festtag`, `nachricht`, `datum`, `datumbeginn`, `datumende`, `uhr`, `uhrbeginn`, `uhrende`)
                               VALUES (:groupid, :event, :beschreibung, :farbe, :privat, :festtag, :nachricht, :datum, :datumbeginn, :datumende, :uhr, :uhrbeginn, :uhrende)");
							
	
	for ($i = 0; $i <= $datediff; $i++)
	{	
		//echo '<pre>' , var_dump($nextDay) ,'</pre>';
		
		$eintragen->execute([
		  ':groupid' => $startDate,
		  ':event' => $_POST["event"],
		  ':beschreibung' => $_POST["beschreibung"],
		  ':farbe' => $_POST["farbe"],
		  ':privat' => $privat,
		  ':festtag' => $festtag,
		  ':nachricht' => $nachricht,
		  ':datum' => $nextDay . " " . $_POST["uhrbeginn"],
		  ':datumbeginn' => $_POST["datumbeginn"] . " " . $_POST["uhrbeginn"],
		  ':datumende' => $_POST["datumende"] . " " . $_POST["uhrende"],
		  ':uhr' => $_POST["uhrbeginn"],
		  ':uhrbeginn' => $_POST["uhrbeginn"],
		  ':uhrende' => $_POST["uhrende"],
		]);
		
		$nextDay = date('Y-m-d', strtotime($nextDay . " +1 days"));
	}		

    list($_POST["jahr"], $_POST["monat"]) = explode("-", $_POST["datum"]);
	
  }

  // Bearbeiten
  if ($_POST["aktion"] == "bearbeiten" && BENUTZER) {

    // Kopieren
    if (isset($_POST["kopieren"])) {

      $kopieren = $db->prepare("INSERT INTO `kalender` (`event`, `beschreibung`, `farbe`, `privat`, `festtag`, `nachricht`, `datum`, `datumende`, `uhr`, `uhrende`)
                                VALUES (:event, :beschreibung, :farbe, :privat, :festtag, :nachricht, :datum, :datumende, :uhr, :uhrende)");
      $kopieren->execute([
        ':event' => $_POST["event"],
        ':beschreibung' => $_POST["beschreibung"],
        ':farbe' => $_POST["farbe"],
        ':privat' => $privat,
        ':festtag' => $festtag,
        ':nachricht' => $nachricht,
        ':datum' => $_POST["datum"] . " " . $_POST["uhr"],
        ':datumende' => $_POST["datumende"] . " " . $_POST["uhrende"]
      ]);
    } else {

      // Löschen
      if (isset($_POST["loeschen"])) {

        $loeschen = $db->prepare("DELETE FROM `kalender` WHERE `id` = :id");
        $loeschen->execute([':id' => $_POST["id"]]);
      } else {

        // Aktualisieren
        $aktualisieren = $db->prepare("UPDATE `kalender`
                                       SET `event` = :event, `beschreibung` = :beschreibung, `farbe` = :farbe, `privat` = :privat,
                                           `festtag` = :festtag, `nachricht` = :nachricht, `datum` = :datum, `datumende` = :datumende, `uhr` = :uhr, `uhrende` = :uhrende
                                       WHERE `id` = :id");
        $aktualisieren->execute([
          ':event' => $_POST["event"],
          ':beschreibung' => $_POST["beschreibung"],
          ':farbe' => $_POST["farbe"],
          ':privat' => $privat,
          ':festtag' => $festtag,
          ':nachricht' => $nachricht,
          ':datum' => $_POST["datum"] . " " . $_POST["uhr"],
          ':uhr' => $_POST["uhr2"],
          ':id' => $_POST["id"]
        ]);
      }
    }

    list($_POST["jahr"], $_POST["monat"]) = explode("-", $_POST["datum"]);
  }

  // Anmelden
  if ($_POST["aktion"] == "anmelden") {

    if (
      isset($NAME_PASS[$_POST["name"]]) &&
      $NAME_PASS[$_POST["name"]] == $_POST["passwort"]
    ) {

      // Session-Variable (Benutzer) hinzufügen
      $_SESSION["name"] = $_POST["name"];
    }
  }

  // Abmelden
  if ($_POST["aktion"] == "abmelden" && BENUTZER) {

    session_destroy();
  }

  // Rückgabe an JavaScript
  echo $_POST["jahr"] . "|" . floor($_POST["monat"]);
}

/*
 * Benachrichtigungen per E-Mail versenden
 */
if (isset($_GET["cron"])) {

  $select = $db->query("SELECT `event`, `beschreibung`, STRFTIME('%d.%m.%Y, %H:%M', datum) AS Datumsformat
                        FROM `kalender`
                        WHERE DATE(`datum`) = DATE('now','+1 day')
                        AND `nachricht` = 1
                        ORDER BY `datum` ASC");
  $events = $select->fetchAll();

  // Events einsammeln
  $benachrichtigung = "";
  foreach ($events as $event) {
    $benachrichtigung .= $event["Datumsformat"] . ' Uhr' . PHP_EOL .
      $event["event"] . PHP_EOL . stripBBCode($event["beschreibung"]) . PHP_EOL . PHP_EOL;
  }

  // E-Mail versenden
  if (!empty($benachrichtigung)) {

    // Verwende den PHP-Mailer oder Swift-Mailer um E-Mails zu versenden!
    mb_internal_encoding("UTF-8");
    $betreff = mb_encode_mimeheader("Event-Kalender", "UTF-8", "Q");
    $kopfzeile = "From: " . mb_encode_mimeheader('"' . $_SERVER["HTTP_HOST"] . '"', "UTF-8", "Q") .
      " <$EMAIL>" . "\nMIME-Version: 1.0;\nContent-Type: text/plain; charset=UTF-8;\n";
    mail($EMAIL, $betreff, $benachrichtigung, $kopfzeile);
  }
}

/*
 * Funktionen
 */

// Formatiertes Datum
function shortDate(string $tag, string $monat, string $jahr): string {

  return $tag . '.' . $monat . '.' . $jahr;
}

function datum(string $tag, string $monat, string $jahr): string {

  return wochentag($tag, $monat, $jahr) . ', ' . $tag . ' ' . MONATE[(int)$monat] . ' ' . $jahr;
}

// Woche (ISO: 8601)
function woche(string $tag, string $monat, string $jahr): int {

  return date_format(date_create($jahr . "-" . $monat . "-" . $tag . " 00:00:00"), "W");
}

// Wochentag
function wochentag(string $tag, string $monat, string $jahr): string {

  $wt = date_format(date_create($jahr . "-" . $monat . "-" . $tag . " 00:00:00"), "N");
  return WOCHENTAGE[$wt];
}

// Quartal
function quartal(int $monat): int {

  return (int)(($monat - 1) / 3) + 1;
}

// Schriftfarbe je nach Hintergrundfarbe
function schwarzweiss(string $farbe): string {

  sscanf(substr($farbe, 1, 6), "%2s%2s%2s", $r, $g, $b);
  return ((hexdec($r) . hexdec($g) . hexdec($b)) <= "160160160") ? "#FFFFFF" : "#000000";
}

// BBCode - Text formatieren
function textFormatierung(string $text): string {

  $text = htmlspecialchars($text, ENT_HTML5 | ENT_QUOTES);
  $text = preg_replace_callback('#(( |^)(((http|https|)://)|www.)\S+)#mi', 'linkUmwandeln', $text); // Link umwandeln
  $text = preg_replace('/\[b\](.*)\[\/b\]/Uism', '<b>$1</b>', $text); // [b] (fett, hervorgehoben)
  $text = preg_replace('/\[i\](.*)\[\/i\]/Uism', '<i>$1</i>', $text); // [i] (kursiv, schräg)
  $text = preg_replace('/\[s\](.*)\[\/s\]/Uism', '<s>$1</s>', $text); // [s] (durchgestrichen, gelöscht)
  $text = preg_replace('/\[q\](.*)\[\/q\]/Uism', '<q>$1</q>', $text); // [q] (quotiert, zitiert)
  $text = preg_replace('/\[u\](.*)\[\/u\]/Uism', '<u>$1</u>', $text); // [u] (unterstrichen)
  $text = preg_replace('/\[c=(.*)\](.*)\[\/c\]/Uism', '<span style=\'color:$1\'>$2</span>', $text); // [c=#FF0000] [c=green]
  $text = preg_replace('/\[bc=(.*)\](.*)\[\/bc\]/Uism', '<span style=\'background:$1\'>$2</span>', $text); // [bc=#FF0000] [bc=green]
  $text = preg_replace('/\[z\](.*)\[\/z\]/Uism', '<div style="text-align:center;">$1</div>', $text); // [z] (zentriert)
  $text = preg_replace('/\[g=(.*)\](.*)\[\/g\]/Uism', '<figure><img src="$1" alt="$2"><figcaption>$2</figcaption></figure>', $text); // [g=url] (Bildpfad)
  $text = preg_replace('/\[a=(.*)\](.*)\[\/a\]/Uism', '<figure><audio controls><source src="$1"></audio><figcaption>$2</figcaption></figure>', $text); // [a=url] (Audio-Datei)
  $text = preg_replace('/\[v=(.*)\](.*)\[\/v\]/Uism', '<figure><video controls><source src="$1"></video><figcaption>$2</figcaption></figure>', $text); // [v=url] (Video-Datei)
  return nl2br($text, true);
}

// BBCode entfernen
function stripBBCode(string $text): string {

  return preg_replace('|[[\/\!]*?[^\[\]]*?]|si', '', $text);
}

// Link umwandeln
function linkUmwandeln(array $hit): string {

  $url = trim($hit[1]);
  return ' <a href="' . $url . '" target="_blank" rel="noopener" class="link">' . $url . '</a>';
}
?>
