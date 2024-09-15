<?php
declare(strict_types=1);

// Months
define("MONTHS", [
    1 => 'Januari', 'Februari', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'December'
]);

// Weekdays
define("WEEKDAYS", [
    1 => 'Maandag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrijdag', 'Zaterdag', 'Zondag'
]);

//Common Names
define("labelHeaderTime", "Tijd"); 
define("labelHeaderUntil", "tot"); 

//TitleBars
define("formTitleBarHeader", "Kalender"); 

//Navs and Buttons
define("navLinkHeaderClose", "Sluiten"); 
define("navLinkHeaderHotkey", "Toets");
define("navLinkHeaderCtrl", "Ctrl");
define("navLinkHeaderLeftarrow", "Pijl naar links");
define("navLinkHeaderRightarrow", "Pijl naar rechts");
define("navLinkHeaderUparrow", "Pijl omhoog");
define("navLinkHeaderDownarrow", "Pijl omlaag");
define("navLinkHeaderNavigationGoback", "Ga een maand terug"); 
define("navLinkHeaderNavigationGofwd", "Ga een maand vooruit");
define("navLinkHeaderNavigationGobackYear", "Ga een jaar terug"); 
define("navLinkHeaderNavigationGofwdYear", "Ga een jaar vooruit");
define("navLinkHeaderNavigationMonth", "Maand");
define("navLinkHeaderNavigationYear", "Jaar"); 
define("navLinkHeaderNavigationSelectMonth", "Selecteer maand");
define("navLinkHeaderNavigationSelectYear", "Selecteer jaar");
define("navLinkHeaderNavigationCurrentCalendar", "Ga naar 'Vandaag'");
define("navLinkHeaderFooterTooltipShowWeekNr", "Verberg / Toon kalenderweek");
define("navLinkHeaderFooterShowWeekNr", "Week");
define("navLinkHeaderFooterTooltipCalendarSelect", "Selecteer kalender...");
define("navLinkHeaderFooterCalendarSelect", "Kalender");
define("navLinkHeaderFooterTooltipLogout", "Uitloggen van de kalender");
define("navLinkHeaderFooterTooltipLogin", "Inloggen op de kalender");
define("navLinkHeaderFooterLogin", "Inloggen");
define("navLinkHeaderFooterLogout", "Uitloggen");

//Calendar table
define("tableColumnHeaderWeek", "Week");
define("tableColumnHeaderQuarter", "Kwartaal");

//BBCode description
define("tooltipBBCodesHeader", "Gebruik de volgende BBCodes"); 
define("tooltipBBCodesBold", "Vet");
define("tooltipBBCodesItalic", "Cursief"); 
define("tooltipBBCodesQuote", "Citaat");
define("tooltipBBCodesUnderlined", "Onderstreept"); 
define("tooltipBBCodesStrikethrough", "Doorgehaald");
define("tooltipBBCodesColor", "Kleur"); 
define("tooltipBBCodesBackground", "Achtergrond"); 
define("tooltipBBCodesCentered", "Gecentreerd"); 
define("tooltipBBCodesURLFormatted", "Links en regeleinden worden geformatteerd.");

//Form - Add
define("formHeaderAddEvent", "Nieuw Evenement"); 
define("formLabelTooltipEventname", "Weergavenaam (Vereist)");
define("formLabelEventname", "<u>E</u>venement");
define("formInputPlaceholderEventname", "Naam"); 
define("formLabelTooltipStartdate", "Startdatum (Vereist)");
define("formLabelStartdate", "<u>S</u>tartdatum");
define("formLabelTooltipEnddate", "Einddatum (Vereist)");
define("formLabelEnddate", "<u>E</u>inddatum"); 
define("formLabelTooltipStarttime", "Starttijd (Optioneel, mag niet leeg zijn!)");
define("formLabelTooltip2Starttime", "Stel in op '00:00' om een hele dag of serie te definiëren.");
define("formLabelStarttime", "<u>V</u>an");
define("formLabelTooltipEndtime", "Eindtijd (Optioneel, mag niet leeg zijn!)");
define("formLabelEndtime", "<u>T</u>ot"); 
define("formLabelTooltipRecurring", "Terugkerend (Optioneel)");
define("formLabelTooltip2Recurring", "Terugkerend evenement; verjaardag, feestdag etc.");
define("formLabelRecurring", "Ter<u>u</u>rkerend");
define("formLabelTooltipColor", "Kleur (Optioneel)");
define("formLabelTooltip2Color", "Stel een kleur in voor het evenement");
define("formLabelColor", "K<u>l</u>eur");
define("formLabelTooltipPrivate", "Privé evenement (Optioneel)");
define("formLabelTooltip2Private", "Dit evenement wordt pas na inloggen weergegeven.");
define("formLabelPrivate", "Pr<u>i</u>vé");
define("formLabelTooltipNotification", "Melding (Optioneel)");
define("formLabelTooltip2Notification", "Stuur een melding via E-mail");
define("formLabelNotification", "Meld<u>i</u>ng");
define("formLabelTooltipDescription", "Beschrijving (Optioneel)");
define("formLabelTooltip2Description", "Stuur een melding via E-mail");
define("formLabelDescription", "Bes<u>c</u>hrijving");
define("formLabelTooltipAddEvent", "Evenement toevoegen");
define("formLabelAddEvent", "Toevoegen"); 

//Form - Edit
define("formSummaryTooltipEditEvent", "Evenement bewerken"); 
define("formSummaryLabelEditEvent", "Bewerk <u>E</u>venement");
define("formLabelTooltipEditSingleEvent", "Evenement (Vereist) - ID"); 
define("formLabelEditSingleEvent", "Even<u>e</u>ment");
define("formLabelTooltipEditSingleEventDate", "Datum");
define("formLabelEditSingleEventDate", "<u>D</u>atum");
define("formCheckboxLabelTooltipEditSingleEventHoliday", "<u>D</u>atum");
define("formLabelEditSingleEventRecurring", "Ter<u>u</u>rkerend");
define("formLabelTooltipEditSingleEventRecurring", "Terugkerend (Optioneel)");
define("formLabelTooltip2EditSingleEventRecurring", "Terugkerend evenement; verjaardag, feestdag etc.");
define("formLabelEditSingleEventStarttime", "<u>V</u>an");
define("formLabelTooltipEditSingleEventStarttime", "Starttijd (Optioneel, mag niet leeg zijn!)");
define("formLabelTooltip2EditSingleEventStarttime", "Stel in op '00:00' om een hele dag of serie te definiëren.");
define("formLabelEditSingleEventEndtime", "<u>T</u>ot");
define("formLabelTooltipEditSingleEventEndtime", "Eindtijd (Optioneel, mag niet leeg zijn!)");
define("formLabelTooltipEditSingleEventColor", "Kleur (Optioneel)");
define("formLabelTooltip2EditSingleEventColor", "Stel een kleur in voor het evenement");
define("formLabelEditSingleEventColor", "K<u>l</u>eur");
define("formLabelTooltipEditSingleEventPrivate", "Privé evenement (Optioneel)");
define("formLabelTooltip2EditSingleEventPrivate", "Dit evenement wordt pas na inloggen weergegeven.");
define("formLabelEditSingleEventPrivate", "Pr<u>i</u>vé");
define("formLabelTooltipEditSingleEventNotification", "Melding (Optioneel)");
define("formLabelTooltip2EditSingleEventNotification", "Stuur een melding via E-mail");
define("formLabelEditSingleEventNotification", "Meld<u>i</u>ng");
define("formLabelEditSingleEventTooltipDescription", "Beschrijving (Optioneel)");
define("formLabelEditSingleEventTooltip2Description", "Stuur een melding via E-mail");
define("formLabelEditSingleEventDescription", "Bes<u>c</u>hrijving");
define("formLabelEditSingleEventPlaceholderDescription", "Voer beschrijving in (Optioneel)");
define("formLabelEditSingleEventTooltipAddEvent", "Evenement toevoegen");
define("formLabelEditSingleEventCopy", "Ko<u>p</u>iëren");
define("formLabelEditSingleEventTooltipCopy", "Maak een kopie (Optioneel)");
define("formLabelEditSingleEventTooltip2Copy", "Kopieert het evenement naar de opgegeven datum");
define("formLabelEditSingleEventDelete", "<u>V</u>erwijderen");
define("formLabelEditSingleEventTooltipDelete", "Evenement verwijderen (Optioneel)");
define("formLabelEditSingleEventTooltip2Delete", "Verwijdert het evenement");
define("formLabelEditSingleEventTooltipApplyChanges", "Wijzigingen opslaan."); 
define("formLabelEditSingleEventApplyChanges", "Ops<u>l</u>aan"); 

//Form - select Calendar
define("formTitleHeaderSelectCalendar", "Selecteer Kalender");
define("formTitleHeaderTooltipSelectCalendar", "Wijzigingen opslaan."); 
define("formLabelSelectCalendarApplyChanges", "Ops<u>l</u>aan");
define("formLabelSelectCalendarMonth", "<u>M</u>aand");
define("formLabelTooltipSelectCalendarMonth", "Selecteer maand");
define("formLabelTooltip2SelectCalendarMonth", "Het muiswiel kan ook worden gebruikt.");
define("formLabelSelectCalendarYear", "<u>J</u>aar");
define("formLabelTooltipSelectCalendarYear", "Selecteer jaar");
define("formLabelTooltip2SelectCalendarYear", "Het muiswiel kan ook worden gebruikt."); 
define("formLabelShowSelectedCalendar", "<u>T</u>onen");
define("formLabelTooltipShowSelectedCalendar", "Kalender tonen");

//Form - Login
define("formTitleLogin", "Inloggen"); 
define("formLabelLoginName", "<u>G</u>ebruikersnaam");
define("formLabelLoginPassword", "<u>W</u>wachtwoord");
define("formLabelLogin", "<u>I</u>nloggen");
define("formButtonHeaderLogin", "Inloggen");
define("formTitleLogout", "Uitloggen"); 
define("formLabelLogoutMessage", "echt uitloggen?");
define("formButtonLabelLogout", "Uitlog<u>g</u>en");
define("formButtonTooltipLogout", "Uitloggen");
