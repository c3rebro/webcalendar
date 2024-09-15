<?php
declare(strict_types=1);

// Months
define("MONTHS", [
    1 => 'Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'
]);

// Weekdays
define("WEEKDAYS", [
    1 => 'Lunedì', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato', 'Domenica'
]);

//Common Names
define("labelHeaderTime", "Ora"); 
define("labelHeaderUntil", "fino a"); 

//TitleBars
define("formTitleBarHeader", "Calendario"); 

//Navs and Buttons
define("navLinkHeaderClose", "Chiudi"); 
define("navLinkHeaderHotkey", "Tasto");
define("navLinkHeaderCtrl", "Ctrl");
define("navLinkHeaderLeftarrow", "Freccia sinistra");
define("navLinkHeaderRightarrow", "Freccia destra");
define("navLinkHeaderUparrow", "Freccia su");
define("navLinkHeaderDownarrow", "Freccia giù");
define("navLinkHeaderNavigationGoback", "Vai indietro di un mese"); 
define("navLinkHeaderNavigationGofwd", "Vai avanti di un mese");
define("navLinkHeaderNavigationGobackYear", "Vai indietro di un anno"); 
define("navLinkHeaderNavigationGofwdYear", "Vai avanti di un anno");
define("navLinkHeaderNavigationMonth", "Mese");
define("navLinkHeaderNavigationYear", "Anno"); 
define("navLinkHeaderNavigationSelectMonth", "Seleziona mese");
define("navLinkHeaderNavigationSelectYear", "Seleziona anno");
define("navLinkHeaderNavigationCurrentCalendar", "Vai a 'Oggi'");
define("navLinkHeaderFooterTooltipShowWeekNr", "Nascondi / Mostra settimana del calendario");
define("navLinkHeaderFooterShowWeekNr", "Settimana");
define("navLinkHeaderFooterTooltipCalendarSelect", "Seleziona calendario...");
define("navLinkHeaderFooterCalendarSelect", "Calendario");
define("navLinkHeaderFooterTooltipLogout", "Disconnettersi dal calendario");
define("navLinkHeaderFooterTooltipLogin", "Accedi al calendario");
define("navLinkHeaderFooterLogin", "Accedi");
define("navLinkHeaderFooterLogout", "Disconnetti");

//Calendar table
define("tableColumnHeaderWeek", "Settimana");
define("tableColumnHeaderQuarter", "Trimestre");

//BBCode description
define("tooltipBBCodesHeader", "Usa i seguenti BBCode"); 
define("tooltipBBCodesBold", "Grassetto");
define("tooltipBBCodesItalic", "Corsivo"); 
define("tooltipBBCodesQuote", "Citazione");
define("tooltipBBCodesUnderlined", "Sottolineato"); 
define("tooltipBBCodesStrikethrough", "Barrato");
define("tooltipBBCodesColor", "Colore"); 
define("tooltipBBCodesBackground", "Sfondo"); 
define("tooltipBBCodesCentered", "Centrato"); 
define("tooltipBBCodesURLFormatted", "I link e le interruzioni di riga verranno formattati.");

//Form - Add
define("formHeaderAddEvent", "Nuovo Evento"); 
define("formLabelTooltipEventname", "Nome visualizzato (Obbligatorio)");
define("formLabelEventname", "<u>E</u>vento");
define("formInputPlaceholderEventname", "Denominazione"); 
define("formLabelTooltipStartdate", "Data di inizio (Obbligatorio)");
define("formLabelStartdate", "<u>D</u>ata di inizio");
define("formLabelTooltipEnddate", "Data di fine (Obbligatorio)");
define("formLabelEnddate", "<u>D</u>ata di fine"); 
define("formLabelTooltipStarttime", "Ora di inizio (Opzionale, non deve essere vuoto!)");
define("formLabelTooltip2Starttime", "Imposta su '00:00' per definire un evento o una serie di un giorno.");
define("formLabelStarttime", "<u>D</u>a");
define("formLabelTooltipEndtime", "Ora di fine (Opzionale, non deve essere vuoto!)");
define("formLabelEndtime", "<u>A</u>"); 
define("formLabelTooltipRecurring", "Ricorrente (Opzionale)");
define("formLabelTooltip2Recurring", "Evento ricorrente; compleanno, festività, ecc.");
define("formLabelRecurring", "Rico<u>r</u>rente");
define("formLabelTooltipColor", "Colore (Opzionale)");
define("formLabelTooltip2Color", "Imposta un colore per l'evento");
define("formLabelColor", "Col<u>o</u>re");
define("formLabelTooltipPrivate", "Evento privato (Opzionale)");
define("formLabelTooltip2Private", "Questo evento sarà visibile solo dopo l'accesso.");
define("formLabelPrivate", "Priv<u>a</u>to");
define("formLabelTooltipNotification", "Notifica (Opzionale)");
define("formLabelTooltip2Notification", "Invia una notifica via Email");
define("formLabelNotification", "Notifi<u>c</u>a");
define("formLabelTooltipDescription", "Descrizione (Opzionale)");
define("formLabelTooltip2Description", "Invia una notifica via Email");
define("formLabelDescription", "Descr<u>i</u>zione");
define("formLabelTooltipAddEvent", "Aggiungi evento");
define("formLabelAddEvent", "Aggi<u>u</u>ngi"); 

//Form - Edit
define("formSummaryTooltipEditEvent", "Modifica evento"); 
define("formSummaryLabelEditEvent", "Modifica <u>E</u>vento");
define("formLabelTooltipEditSingleEvent", "Evento (Obbligatorio) - ID"); 
define("formLabelEditSingleEvent", "Even<u>t</u>o");
define("formLabelTooltipEditSingleEventDate", "Data");
define("formLabelEditSingleEventDate", "<u>D</u>ata");
define("formCheckboxLabelTooltipEditSingleEventHoliday", "<u>D</u>ata");
define("formLabelEditSingleEventRecurring", "Rico<u>r</u>rente");
define("formLabelTooltipEditSingleEventRecurring", "Ricorrente (Opzionale)");
define("formLabelTooltip2EditSingleEventRecurring", "Evento ricorrente; compleanno, festività, ecc.");
define("formLabelEditSingleEventStarttime", "<u>D</u>a");
define("formLabelTooltipEditSingleEventStarttime", "Ora di inizio (Opzionale, non deve essere vuoto!)");
define("formLabelTooltip2EditSingleEventStarttime", "Imposta su '00:00' per definire un evento o una serie di un giorno.");
define("formLabelEditSingleEventEndtime", "<u>A</u>");
define("formLabelTooltipEditSingleEventEndtime", "Ora di fine (Opzionale, non deve essere vuoto!)");
define("formLabelTooltipEditSingleEventColor", "Colore (Opzionale)");
define("formLabelTooltip2EditSingleEventColor", "Imposta un colore per l'evento");
define("formLabelEditSingleEventColor", "Col<u>o</u>re");
define("formLabelTooltipEditSingleEventPrivate", "Evento privato (Opzionale)");
define("formLabelTooltip2EditSingleEventPrivate", "Questo evento sarà visibile solo dopo l'accesso.");
define("formLabelEditSingleEventPrivate", "Priv<u>a</u>to");
define("formLabelTooltipEditSingleEventNotification", "Notifica (Opzionale)");
define("formLabelTooltip2EditSingleEventNotification", "Invia una notifica via Email");
define("formLabelEditSingleEventNotification", "Notifi<u>c</u>a");
define("formLabelEditSingleEventTooltipDescription", "Descrizione (Opzionale)");
define("formLabelEditSingleEventTooltip2Description", "Invia una notifica via Email");
define("formLabelEditSingleEventDescription", "Descr<u>i</u>zione");
define("formLabelEditSingleEventPlaceholderDescription", "Inserisci descrizione (Opzionale)");
define("formLabelEditSingleEventTooltipAddEvent", "Aggiungi evento");
define("formLabelEditSingleEventCopy", "Cop<u>i</u>a");
define("formLabelEditSingleEventTooltipCopy", "Crea una copia (Opzionale)");
define("formLabelEditSingleEventTooltip2Copy", "Copia l'evento alla data specificata");
define("formLabelEditSingleEventDelete", "<u>C</u>ancella");
define("formLabelEditSingleEventTooltipDelete", "Elimina evento (Opzionale)");
define("formLabelEditSingleEventTooltip2Delete", "Elimina l'evento");
define("formLabelEditSingleEventTooltipApplyChanges", "Salva le modifiche."); 
define("formLabelEditSingleEventApplyChanges", "Sal<u>v</u>a"); 

//Form - select Calendar
define("formTitleHeaderSelectCalendar", "Seleziona Calendario");
define("formTitleHeaderTooltipSelectCalendar", "Salva le modifiche."); 
define("formLabelSelectCalendarApplyChanges", "Sal<u>v</u>a");
define("formLabelSelectCalendarMonth", "<u>M</u>ese");
define("formLabelTooltipSelectCalendarMonth", "Seleziona mese");
define("formLabelTooltip2SelectCalendarMonth", "È possibile utilizzare anche la rotellina del mouse.");
define("formLabelSelectCalendarYear", "<u>A</u>nno");
define("formLabelTooltipSelectCalendarYear", "Seleziona anno");
define("formLabelTooltip2SelectCalendarYear", "È possibile utilizzare anche la rotellina del mouse."); 
define("formLabelShowSelectedCalendar", "<u>M</u>ostra");
define("formLabelTooltipShowSelectedCalendar", "Mostra calendario");

//Form - Login
define("formTitleLogin", "Accedi"); 
define("formLabelLoginName", "<u>N</u>ome utente");
define("formLabelLoginPassword", "<u>P</u>assword");
define("formLabelLogin", "<u>A</u>ccedi");
define("formButtonHeaderLogin", "Accedi");
define("formTitleLogout", "Disconnetti"); 
define("formLabelLogoutMessage", "davvero disconnettersi?");
define("formButtonLabelLogout", "Disconn<u>e</u>tti");
define("formButtonTooltipLogout", "Disconnetti");
