<?php
declare(strict_types=1);

// Months
define("MONTHS", [
    1 => 'Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień'
]);

// Weekdays
define("WEEKDAYS", [
    1 => 'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota', 'Niedziela'
]);

//Common Names
define("labelHeaderTime", "Czas"); 
define("labelHeaderUntil", "do"); 

//TitleBars
define("formTitleBarHeader", "Kalendarz"); 

//Navs and Buttons
define("navLinkHeaderClose", "Zamknij"); 
define("navLinkHeaderHotkey", "Klawisz");
define("navLinkHeaderCtrl", "Ctrl");
define("navLinkHeaderLeftarrow", "Strzałka w lewo");
define("navLinkHeaderRightarrow", "Strzałka w prawo");
define("navLinkHeaderUparrow", "Strzałka w górę");
define("navLinkHeaderDownarrow", "Strzałka w dół");
define("navLinkHeaderNavigationGoback", "Cofnij o miesiąc"); 
define("navLinkHeaderNavigationGofwd", "Przejdź o miesiąc do przodu");
define("navLinkHeaderNavigationGobackYear", "Cofnij o rok"); 
define("navLinkHeaderNavigationGofwdYear", "Przejdź o rok do przodu");
define("navLinkHeaderNavigationMonth", "Miesiąc");
define("navLinkHeaderNavigationYear", "Rok"); 
define("navLinkHeaderNavigationSelectMonth", "Wybierz miesiąc");
define("navLinkHeaderNavigationSelectYear", "Wybierz rok");
define("navLinkHeaderNavigationCurrentCalendar", "Przejdź do 'Dzisiaj'");
define("navLinkHeaderFooterTooltipShowWeekNr", "Ukryj / Pokaż tydzień kalendarzowy");
define("navLinkHeaderFooterShowWeekNr", "Tydzień");
define("navLinkHeaderFooterTooltipCalendarSelect", "Wybierz kalendarz...");
define("navLinkHeaderFooterCalendarSelect", "Kalendarz");
define("navLinkHeaderFooterTooltipLogout", "Wyloguj się z kalendarza");
define("navLinkHeaderFooterTooltipLogin", "Zaloguj się do kalendarza");
define("navLinkHeaderFooterLogin", "Zaloguj");
define("navLinkHeaderFooterLogout", "Wyloguj");

//Calendar table
define("tableColumnHeaderWeek", "Tydzień");
define("tableColumnHeaderQuarter", "Kwartał");

//BBCode description
define("tooltipBBCodesHeader", "Użyj następujących BBCode"); 
define("tooltipBBCodesBold", "Pogrubiony");
define("tooltipBBCodesItalic", "Kursywa"); 
define("tooltipBBCodesQuote", "Cytat");
define("tooltipBBCodesUnderlined", "Podkreślony"); 
define("tooltipBBCodesStrikethrough", "Przekreślony");
define("tooltipBBCodesColor", "Kolor"); 
define("tooltipBBCodesBackground", "Tło"); 
define("tooltipBBCodesCentered", "Wyśrodkowany"); 
define("tooltipBBCodesURLFormatted", "Linki i podziały wiersza będą formatowane.");

//Form - Add
define("formHeaderAddEvent", "Nowe Wydarzenie"); 
define("formLabelTooltipEventname", "Nazwa wyświetlana (Wymagana)");
define("formLabelEventname", "<u>W</u>ydarzenie");
define("formInputPlaceholderEventname", "Nazwa"); 
define("formLabelTooltipStartdate", "Data rozpoczęcia (Wymagana)");
define("formLabelStartdate", "<u>D</u>ata rozpoczęcia");
define("formLabelTooltipEnddate", "Data zakończenia (Wymagana)");
define("formLabelEnddate", "<u>D</u>ata zakończenia"); 
define("formLabelTooltipStarttime", "Czas rozpoczęcia (Opcjonalne, nie może być puste!)");
define("formLabelTooltip2Starttime", "Ustaw na '00:00', aby zdefiniować wydarzenie całodniowe lub serię.");
define("formLabelStarttime", "<u>O</u>d");
define("formLabelTooltipEndtime", "Czas zakończenia (Opcjonalne, nie może być puste!)");
define("formLabelEndtime", "<u>D</u>o"); 
define("formLabelTooltipRecurring", "Powtarzające się (Opcjonalne)");
define("formLabelTooltip2Recurring", "Powtarzające się wydarzenie; urodziny, święto itp.");
define("formLabelRecurring", "Powtarz<u>a</u>jące się");
define("formLabelTooltipColor", "Kolor (Opcjonalne)");
define("formLabelTooltip2Color", "Ustaw kolor dla wydarzenia");
define("formLabelColor", "K<u>o</u>lor");
define("formLabelTooltipPrivate", "Prywatne wydarzenie (Opcjonalne)");
define("formLabelTooltip2Private", "To wydarzenie będzie widoczne dopiero po zalogowaniu.");
define("formLabelPrivate", "Prywat<u>n</u>e");
define("formLabelTooltipNotification", "Powiadomienie (Opcjonalne)");
define("formLabelTooltip2Notification", "Wyślij powiadomienie przez Email");
define("formLabelNotification", "Powiadom<u>i</u>enie");
define("formLabelTooltipDescription", "Opis (Opcjonalne)");
define("formLabelTooltip2Description", "Wyślij powiadomienie przez Email");
define("formLabelDescription", "Op<u>i</u>s");
define("formLabelTooltipAddEvent", "Dodaj wydarzenie");
define("formLabelAddEvent", "Dod<u>a</u>j"); 

//Form - Edit
define("formSummaryTooltipEditEvent", "Edytuj wydarzenie"); 
define("formSummaryLabelEditEvent", "Edytuj <u>W</u>ydarzenie");
define("formLabelTooltipEditSingleEvent", "Wydarzenie (Wymagane) - ID"); 
define("formLabelEditSingleEvent", "Wyd<u>a</u>rzenie");
define("formLabelTooltipEditSingleEventDate", "Data");
define("formLabelEditSingleEventDate", "<u>D</u>ata");
define("formCheckboxLabelTooltipEditSingleEventHoliday", "<u>D</u>ata");
define("formLabelEditSingleEventRecurring", "Powtarz<u>a</u>jące się");
define("formLabelTooltipEditSingleEventRecurring", "Powtarzające się (Opcjonalne)");
define("formLabelTooltip2EditSingleEventRecurring", "Powtarzające się wydarzenie; urodziny, święto itp.");
define("formLabelEditSingleEventStarttime", "<u>O</u>d");
define("formLabelTooltipEditSingleEventStarttime", "Czas rozpoczęcia (Opcjonalne, nie może być puste!)");
define("formLabelTooltip2EditSingleEventStarttime", "Ustaw na '00:00', aby zdefiniować wydarzenie całodniowe lub serię.");
define("formLabelEditSingleEventEndtime", "<u>D</u>o");
define("formLabelTooltipEditSingleEventEndtime", "Czas zakończenia (Opcjonalne, nie może być puste!)");
define("formLabelTooltipEditSingleEventColor", "Kolor (Opcjonalne)");
define("formLabelTooltip2EditSingleEventColor", "Ustaw kolor dla wydarzenia");
define("formLabelEditSingleEventColor", "K<u>o</u>lor");
define("formLabelTooltipEditSingleEventPrivate", "Prywatne wydarzenie (Opcjonalne)");
define("formLabelTooltip2EditSingleEventPrivate", "To wydarzenie będzie widoczne dopiero po zalogowaniu.");
define("formLabelEditSingleEventPrivate", "Prywat<u>n</u>e");
define("formLabelTooltipEditSingleEventNotification", "Powiadomienie (Opcjonalne)");
define("formLabelTooltip2EditSingleEventNotification", "Wyślij powiadomienie przez Email");
define("formLabelEditSingleEventNotification", "Powiadom<u>i</u>enie");
define("formLabelEditSingleEventTooltipDescription", "Opis (Opcjonalne)");
define("formLabelEditSingleEventTooltip2Description", "Wyślij powiadomienie przez Email");
define("formLabelEditSingleEventDescription", "Op<u>i</u>s");
define("formLabelEditSingleEventPlaceholderDescription", "Wprowadź opis (Opcjonalne)");
define("formLabelEditSingleEventTooltipAddEvent", "Dodaj wydarzenie");
define("formLabelEditSingleEventCopy", "Ko<u>p</u>iuj");
define("formLabelEditSingleEventTooltipCopy", "Utwórz kopię (Opcjonalne)");
define("formLabelEditSingleEventTooltip2Copy", "Kopiuje wydarzenie na podaną datę");
define("formLabelEditSingleEventDelete", "<u>U</u>suń");
define("formLabelEditSingleEventTooltipDelete", "Usuń wydarzenie (Opcjonalne)");
define("formLabelEditSingleEventTooltip2Delete", "Usuwa wydarzenie");
define("formLabelEditSingleEventTooltipApplyChanges", "Zapisz zmiany."); 
define("formLabelEditSingleEventApplyChanges", "Z<u>a</u>pisz"); 

//Form - select Calendar
define("formTitleHeaderSelectCalendar", "Wybierz Kalendarz");
define("formTitleHeaderTooltipSelectCalendar", "Zapisz zmiany."); 
define("formLabelSelectCalendarApplyChanges", "Z<u>a</u>pisz");
define("formLabelSelectCalendarMonth", "<u>M</u>iesiąc");
define("formLabelTooltipSelectCalendarMonth", "Wybierz miesiąc");
define("formLabelTooltip2SelectCalendarMonth", "Można również użyć kółka myszy.");
define("formLabelSelectCalendarYear", "<u>R</u>ok");
define("formLabelTooltipSelectCalendarYear", "Wybierz rok");
define("formLabelTooltip2SelectCalendarYear", "Można również użyć kółka myszy."); 
define("formLabelShowSelectedCalendar", "<u>P</u>okaż");
define("formLabelTooltipShowSelectedCalendar", "Pokaż kalendarz");

//Form - Login
define("formTitleLogin", "Zaloguj się"); 
define("formLabelLoginName", "<u>N</u>azwa użytkownika");
define("formLabelLoginPassword", "<u>H</u>asło");
define("formLabelLogin", "<u>Z</u>aloguj się");
define("formButtonHeaderLogin", "Zaloguj się");
define("formTitleLogout", "Wyloguj się"); 
define("formLabelLogoutMessage", "na pewno wylogować?");
define("formButtonLabelLogout", "Wylog<u>u</u>j się");
define("formButtonTooltipLogout", "Wyloguj się");
