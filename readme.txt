
Hinweise zum: Event-Kalender (SQLite)

	Version vom: 09.08.2022

Mit dem Event-Kalender können Sie Events (Ereignisse) in einer DB-Tabelle (SQLite-Datenbank-Datei) speichern. 
Die Events werden übersichtlich in einem Kalender angezeigt. Die Navigation des Kalenders läuft 
vollständig über JavaScript (Ajax), somit ist kein Seitenwechsel notwendig.

Der Kalender zeigt alle Tage eines Monats in Form einer HTML-Tabelle an. Dabei kann über Buttons zum 
Vormonat / Vorjahr oder kommenden Monat / Jahr navigiert werden. Die Events kann man direkt im Kalender 
eintragen (bearbeiten, verschieben, kopieren oder löschen).


Voraussetzungen:
Webserver mit PHP 7.4 (oder höher). Einen aktuellen Browser (zum Beispiel: 
Microsoft Edge, Mozilla Firefox oder Google Chrome).

Anweisungen zur Installation:
Führen Sie folgende Anweisungen nacheinander aus:
In der Datei: kalender.php tragen Sie Ihre Zugangsdaten (Name und Passwort) ein.
Laden Sie alle Dateien auf Ihrem Webserver hoch.
Rufen Sie die Datei: "demo.htm" in Ihrem Browser auf.


Tipps:
- Machen Sie von der Datei: "datenbank.db" regelmäßig eine Sicherungskopie, dies schützt vor Datenverlust.

- Bitte bearbeiten Sie die Datei: "datenbank.db" nicht mit einem Texteditor, dadurch kann diese unbrauchbar werden!
Die Datei: "datenbank.db" kann man zum Beispiel mit dem Programm: „DB Browser for SQLite“ bearbeiten.
Das Programm ist kostenlos und zu finden unter: https://sqlitebrowser.org 
Infos über SQLite finden Sie unter: https://sqlitetutorial.net

- Tag, Woche oder der Wochentag können mit CSS-Anweisungen hervorgehoben werden.
Beispiele dazu, finden Sie in der Datei: "style.css".

- Auf der Seite des Event-Kalenders sollten sich keine weiteren Formulare befinden, denn dies kann 
die Funktionalität des Kalenders negativ beeinflussen.

- Einen internen Verweis (Link) zum Kalender setzen:
  <a href="#kalender"> Zum Kalender </a>


Tastaturbelegung (T1/QWERTZ):
Bei Formularen ist die Funktionalität über die Tastatur deaktiviert, es funktioniert nur die [ESC]-Taste!
	[STRG] + [Pfeiltaste Links] - Einen Monat zurück
	[STRG] + [Pfeiltaste Rechts] - Einen Monat weiter
	[STRG] + [Pfeiltaste Ab] - Ein Jahr zurück (am Laptop auch: STRG+Fn + Pfeiltaste Ab)
	[STRG] + [Pfeiltaste Auf] - Ein Jahr weiter (am Laptop auch: STRG+Fn + Pfeiltaste Auf)
	[ESC] - Anzeige schließen (funktioniert auch innerhalb von Formularen)
	[A] - Anmeldung und Abmeldung
	[D] - Drucken (Druckvorschau öffnen)
	[K] - Kalender (Monat / Jahr auswählen)
	[N] - Neuen Event eintragen
	[O] - Zum Kalender scrollen
	[W] - Wochennummern anzeigen
	[X] - Aktuellen Kalender anzeigen


Im Textfeld lassen sich folgende BBCodes verwenden:
	[b]Fett[/b], [i]Kursiv[/i], [q]Zitat[/q]
	[u]Unterstrichen[/u], [s]Durchgestrichen[/s]
	[c=red]Farbe[/c], [bc=blue]Hintergrund[/bc]
	[g=bild.jpg][/g], [z]Zentriert[/z]
	[a=audio.mp3][/a], [v=video.mp4][/v]
URL und Zeilenumbrüche werden formatiert.


Benachrichtigungen automatisch per E-Mail versenden:
  Rufen Sie die PHP-Datei über: "kalender.php?cron" mit einer Cron
  1-mal am Tag auf. Beim Provider muss dazu ein Cronjob angelegt werden
  (http://de.wikipedia.org/wiki/Cron).


Nutzungsbedingungen
 Mit dem Einsatz der Scripte akzeptieren Sie meine Nutzungsbedingungen ohne Einschränkungen.
 Die Scripte sind für die private Verwendung kostenlos.
 Ich übernehme keinerlei Haftung bezüglich der Funktionstüchtigkeit oder irgendwelchen Schadens- 
 oder Ersatzansprüchen, die sich bei der Nutzung der Scripte ergeben.
 Es wird kein Support für Probleme geben, die bei der Anpassung der Scripte entstehen.


	"Kalender zeigen die Tage an,
	  einen solchen zu erstellen verkürzen diese"  ;)


Viel Spaß damit!
  W. Zenk

Für die zahlreichen Vorschläge, Hinweise und Fehlermeldungen,
meinen besten Dank an:
Thomas Frei-Herrmann - https://mobirise-tutorials.com


Versionen (Historie)

Version: 09.08.2022
	* Schleife entfernt (PHP: Events für jeden Tag sammeln)
	* PHP: 30 Zeilen gekürzt, gegenüber der alten Version!
	* CSS: --highlight-outlinecolor entfernt.
	* JavaScript Bug behoben!

Version: 04.07.2022
	Events können mit der Tabulatortaste ausgewählt werden.
	Kleinere Anpassungen am Design.
	Taste: [N] - "Neuen Event eintragen"-Funktionalität wurde (nach Benutzerwunsch) wieder hinzugefügt.
	Fehler beim speichern des Datums in der DB-Tabelle wurde behoben.
	JavaScript, CSS und PHP-Code wurden verbessert.
	Codebeschreibungen wurden hinzugefügt.

Version: 20.05.2022
	Optimierung des dargestellten HTML-Quelltextes im Browser.
	Die Farbwerte sind in CSS nun einheitlich als RGB(A) Format angegeben.
	Taste: [N] - "Neuen Event eintragen"-Funktionalität wurde entfernt.
	Die mit Mouseover ausgewählte Tabellenzeile (CSS) wird nun besser hervorgehoben.

Version: 15.04.2022
	Taste: [O] - Nach oben zum Kalender scrollen.
	Kleinere Änderungen in CSS an diverse Browser.
	Name des Wochentags hervorheben (siehe Datei: style.css).

Version: 26.03.2022
	Die Wochentage sind beim Scrollen oben festgesetzt, so dass sich diese immer im sichtbaren Bereich befinden.

Version: 07.03.2022
	Das JavaScript wurde so angepasst, das es keine Skript-Warnungen mehr auf dem Smartphone gibt.
	Eine markierte Checkbox wird nun besser hervorgehoben.
	Kleinere Anpassungen in HTML, PHP und CSS.

Version: 28.02.2022
	Checkbox (Nachricht) - Benachrichtigung per E-Mail versenden (optional).
	Passwortschutz für mehrere Benutzer.
	Taste: [D] - Drucken (öffnet die Druckvorschau).

Version: 20.02.2022
	Checkbox (Festtag) - Ein fester Tag im Jahr, für Geburtstage, Feiertage etc. (optional).

Version: 13.02.2022
	Checkbox (Privat) - Private Events (optional).
	Der ausgewählte Event wird im Kalender hervorgehoben.
	Kleinere Anpassungen (Icon und Farbe) in der Titelleiste.

Version: 31.01.2022
	Das Fenster lässt sich in der mobilen Ansicht verschieben.
	Nach dem Anmelden oder Abmelden, bleibt die aktuelle Kalenderauswahl erhalten.

Version: 26.01.2022
	Taste: [W] - Wochennummern anzeigen.
	Die Wochennummern am Ende des Jahres, werden nun korrekt nach ISO 8601 angezeigt.
	Der Monat und das Jahr sind anklickbar, um einen anderen Kalender auszuwählen.
	Monatsbilder anzeigen (optional).
	Diverse CSS und JavaScript Optimierungen.

Version: 22.01.2022
	Die Position des Fensters wird automatisch angepasst, wenn das Smartphone gedreht wird.
	Es wird die Schriftart des jeweiligen Betriebssystems verwendet (unter Windows ist das: "Segoe UI").
	Die Fläche der Links wurde erhöht, um diese am Smartphone besser mit dem Finger treffen zu können.
	Eine Option in einer Auswahlliste kann mit dem Mausrad ausgewählt werden.

Version: 16.01.2022
	Tag, Woche, Wochentag mit CSS-Anweisungen hervorheben. Beispiele in der Datei: style.css

Version: 15.01.2022
	Eine Auswahlliste für den Monat um einen anderen Kalender anzuzeigen. 
	Bei Bildern die mit BBCode formatiert werden, wurde das Attribut: 'alt' hinzugefügt.
	Beim überfahren mit dem Mauszeiger werden weitere Details zum Event angezeigt.

Version: 09.01.2022
	HTML-Tags wurden deaktiviert, verwende BBCodes!
	Diverse Darstellungsfehler behoben.

Version: 03.01.2022
	HTML-Eingabefeld: Uhr, für das Ende eines Events.
	Eine Funktion um das Fenster zu bewegen wurde hinzugefügt.
	Diverse Fehler behoben.

Version: 02.01.2022
	Navigation mit der Tastatur.
	Hell.- und Dunkelmodus.
	Zahlreiche Änderungen im Skript.

Version: 29.12.2021
	Erste Version mit den Grundfunktionen.
	Vorbild war hier der Event-Kalender mit MySQL.
	Von dort wurden wichtige Grundfunktionen für diesen Kalender entnommen.