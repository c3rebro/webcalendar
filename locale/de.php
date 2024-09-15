<?php
declare(strict_types=1);

// Months
define("MONTHS", [
    1 => 'Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'
]);

// Weekdays
define("WEEKDAYS", [
    1 => 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag', 'Sonntag'
]);

//Common Names
define("labelHeaderTime", "Uhr"); 
define("labelHeaderUntil", "bis"); 

//TitleBars
define("formTitleBarHeader", "Kalender"); 

//Navs and Buttons
define("navLinkHeaderClose", "Schließen"); 
define("navLinkHeaderHotkey", "Taste");
define("navLinkHeaderCtrl", "Strg");
define("navLinkHeaderLeftarrow", "Pfeil nach links");
define("navLinkHeaderRightarrow", "Pfeil nach rechts");
define("navLinkHeaderUparrow", "Pfeil nach oben");
define("navLinkHeaderDownarrow", "Pfeil nach unten");
define("navLinkHeaderNavigationGoback", "Gehe einen Monat zurück"); 
define("navLinkHeaderNavigationGofwd", "Gehe einen Monat vor");
define("navLinkHeaderNavigationGobackYear", "Gehe ein Jahr zurück"); 
define("navLinkHeaderNavigationGofwdYear", "Gehe ein Jahr vor");
define("navLinkHeaderNavigationMonth", "Monat");
define("navLinkHeaderNavigationYear", "Jahr"); 
define("navLinkHeaderNavigationSelectMonth", "Wähle Monat");
define("navLinkHeaderNavigationSelectYear", "Wähle Jahr");
define("navLinkHeaderNavigationCurrentCalendar", "Gehe zu 'Heute'");
define("navLinkHeaderFooterTooltipShowWeekNr", "Ausblenden / Anzeigen der Kalenderwoche");
define("navLinkHeaderFooterShowWeekNr", "Woche");
define("navLinkHeaderFooterTooltipCalendarSelect", "Wähle Kalender...");
define("navLinkHeaderFooterCalendarSelect", "Kalender");
define("navLinkHeaderFooterTooltipLogout", "Aus dem Kalender abmelden");
define("navLinkHeaderFooterTooltipLogin", "Im Kalender anmelden");
define("navLinkHeaderFooterLogin", "Anmelden");
define("navLinkHeaderFooterLogout", "Abmelden");

//Calendar table
define("tableColumnHeaderWeek", "Woche");
define("tableColumnHeaderQuarter", "Quartal");

//BBCode description
define("tooltipBBCodesHeader", "Verwende folgende BBCodes"); 
define("tooltipBBCodesBold", "Fett");
define("tooltipBBCodesItalic", "Kursiv"); 
define("tooltipBBCodesQuote", "Zitat");
define("tooltipBBCodesUnderlined", "Unterstrichen"); 
define("tooltipBBCodesStrikethrough", "Durchgestrichen");
define("tooltipBBCodesColor", "Farbe"); 
define("tooltipBBCodesBackground", "Hintergrund"); 
define("tooltipBBCodesCentered", "Zentriert"); 
define("tooltipBBCodesURLFormatted", "Links und Zeilenumbrüche werden formatiert.");

//Form - Add
define("formHeaderAddEvent", "Neues Ereignis"); 
define("formLabelTooltipEventname", "Anzeigename (Erforderlich)");
define("formLabelEventname", "<u>E</u>reignis");
define("formInputPlaceholderEventname", "Bezeichnung"); 
define("formLabelTooltipStartdate", "Startdatum (Erforderlich)");
define("formLabelStartdate", "<u>S</u>tartdatum");
define("formLabelTooltipEnddate", "Enddatum (Erforderlich)");
define("formLabelEnddate", "<u>E</u>nddatum"); 
define("formLabelTooltipStarttime", "Startzeit (Optional, darf nicht leer sein!)");
define("formLabelTooltip2Starttime", "Auf '00:00' setzen um einen Tagestermin oder eine Serie zu definieren.");
define("formLabelStarttime", "<u>V</u>on");
define("formLabelTooltipEndtime", "Ende-Zeit (Optional, darf nicht leer sein!)");
define("formLabelEndtime", "<u>B</u>is"); 
define("formLabelTooltipRecurring", "Wiederkehrend (Optional)");
define("formLabelTooltip2Recurring", "Wiederkehrendes Ereignis; Geburtstag, Feiertag etc.");
define("formLabelRecurring", "Wiederk<u>e</u>hrend");
define("formLabelTooltipColor", "Farbe (Optional)");
define("formLabelTooltip2Color", "Eine Farbe für das Ereignis festlegen");
define("formLabelColor", "Fa<u>r</u>be");
define("formLabelTooltipPrivate", "Privates Ereignis (Optional)");
define("formLabelTooltip2Private", "Dieses Ereignis wird erst nach dem Login angezeigt.");
define("formLabelPrivate", "Priv<u>a</u>t");
define("formLabelTooltipNotification", "Benachrichtigung (Optional)");
define("formLabelTooltip2Notification", "Sende eine Benachrichtigung per EMail");
define("formLabelNotification", "Bena<u>c</u>hrichtigung");
define("formLabelTooltipDescription", "Beschreibung (Optional)");
define("formLabelTooltip2Description", "Sende eine Benachrichtigung per EMail");
define("formLabelDescription", "Be<u>s</u>chreibung");
define("formLabelTooltipAddEvent", "Ereignis hinzufügen");
define("formLabelAddEvent", "H<u>i</u>nzufügen"); 

//Form - Edit
define("formSummaryTooltipEditEvent", "Ereignis bearbeiten"); 
define("formSummaryLabelEditEvent", "Ere<u>i</u>gnis bearbeiten");
define("formLabelTooltipEditSingleEvent", "Ereignis (Erforderlich) - ID"); 
define("formLabelEditSingleEvent", "Ere<u>i</u>gnis");
define("formLabelTooltipEditSingleEventDate", "Datum");
define("formLabelEditSingleEventDate", "<u>D</u>atum");
define("formCheckboxLabelTooltipEditSingleEventHoliday", "<u>D</u>atum");
define("formLabelEditSingleEventRecurring", "Wiederk<u>e</u>hrend");
define("formLabelTooltipEditSingleEventRecurring", "Wiederkehrend (Optional)");
define("formLabelTooltip2EditSingleEventRecurring", "Wiederkehrendes Ereignis; Geburtstag, Feiertag etc.");
define("formLabelEditSingleEventStarttime", "<u>V</u>on");
define("formLabelTooltipEditSingleEventStarttime", "Startzeit (Optional, darf nicht leer sein!)");
define("formLabelTooltip2EditSingleEventStarttime", "Auf '00:00' setzen um einen Tagestermin oder eine Serie zu definieren.");
define("formLabelEditSingleEventEndtime", "<u>B</u>is");
define("formLabelTooltipEditSingleEventEndtime", "Ende-Zeit (Optional, darf nicht leer sein!)");
define("formLabelTooltipEditSingleEventColor", "Farbe (Optional)");
define("formLabelTooltip2EditSingleEventColor", "Eine Farbe für das Ereignis festlegen");
define("formLabelEditSingleEventColor", "Fa<u>r</u>be");
define("formLabelTooltipEditSingleEventPrivate", "Privates Ereignis (Optional)");
define("formLabelTooltip2EditSingleEventPrivate", "Dieses Ereignis wird erst nach dem Login angezeigt.");
define("formLabelEditSingleEventPrivate", "Priv<u>a</u>t");
define("formLabelTooltipEditSingleEventNotification", "Benachrichtigung (Optional)");
define("formLabelTooltip2EditSingleEventNotification", "Sende eine Benachrichtigung per EMail");
define("formLabelEditSingleEventNotification", "Bena<u>c</u>hrichtigung");
define("formLabelEditSingleEventTooltipDescription", "Beschreibung (Optional)");
define("formLabelEditSingleEventTooltip2Description", "Sende eine Benachrichtigung per EMail");
define("formLabelEditSingleEventDescription", "Be<u>s</u>chreibung");
define("formLabelEditSingleEventPlaceholderDescription", "Beschreibung eingeben (Optional)");
define("formLabelEditSingleEventTooltipAddEvent", "Ereignis hinzufügen");
define("formLabelEditSingleEventCopy", "Kop<u>i</u>eren");
define("formLabelEditSingleEventTooltipCopy", "Kopie erstellen (Optional)");
define("formLabelEditSingleEventTooltip2Copy", "Kopiert das Ereignis zum angegebenen Datum");
define("formLabelEditSingleEventDelete", "<u>L</u>öschen");
define("formLabelEditSingleEventTooltipDelete", "Ereignis löschen (Optional)");
define("formLabelEditSingleEventTooltip2Delete", "Löscht das Ereignis");
define("formLabelEditSingleEventTooltipApplyChanges", "Änderungen speichern."); 
define("formLabelEditSingleEventApplyChanges", "S<u>p</u>eichern"); 

//Form - select Calendar
define("formTitleHeaderSelectCalendar", "Wähle Kalender");
define("formTitleHeaderTooltipSelectCalendar", "Änderungen speichern."); 
define("formLabelSelectCalendarApplyChanges", "S<u>p</u>eichern");
define("formLabelSelectCalendarMonth", "<u>M</u>onat");
define("formLabelTooltipSelectCalendarMonth", "Monat auswählen");
define("formLabelTooltip2SelectCalendarMonth", "Es kann auch das Mausrad verwendet werden.");
define("formLabelSelectCalendarYear", "<u>J</u>ahr");
define("formLabelTooltipSelectCalendarYear", "Jahr auswählen");
define("formLabelTooltip2SelectCalendarYear", "Es kann auch das Mausrad verwendet werden."); 
define("formLabelShowSelectedCalendar", "<u>A</u>nzeigen");
define("formLabelTooltipShowSelectedCalendar", "Kalender anzeigen");

//Form - Login
define("formTitleLogin", "Anmelden"); 
define("formLabelLoginName", "<u>B</u>enutzername");
define("formLabelLoginPassword", "<u>P</u>asswort");
define("formLabelLogin", "<u>A</u>nmelden");
define("formButtonHeaderLogin", "Anmelden");
define("formTitleLogout", "Abmelden"); 
define("formLabelLogoutMessage", "wirklich abmelden?");
define("formButtonLabelLogout", "A<u>b</u>melden");
define("formButtonTooltipLogout", "Abmelden");
