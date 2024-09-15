<?php
declare(strict_types=1);

// Months
define("MONTHS", [
    1 => 'Ιανουάριος', 'Φεβρουάριος', 'Μάρτιος', 'Απρίλιος', 'Μάιος', 'Ιούνιος', 'Ιούλιος', 'Αύγουστος', 'Σεπτέμβριος', 'Οκτώβριος', 'Νοέμβριος', 'Δεκέμβριος'
]);

// Weekdays
define("WEEKDAYS", [
    1 => 'Δευτέρα', 'Τρίτη', 'Τετάρτη', 'Πέμπτη', 'Παρασκευή', 'Σάββατο', 'Κυριακή'
]);

//Common Names
define("labelHeaderTime", "Ώρα"); 
define("labelHeaderUntil", "έως"); 

//TitleBars
define("formTitleBarHeader", "Ημερολόγιο"); 

//Navs and Buttons
define("navLinkHeaderClose", "Κλείσιμο"); 
define("navLinkHeaderHotkey", "Πλήκτρο");
define("navLinkHeaderCtrl", "Ctrl");
define("navLinkHeaderLeftarrow", "Αριστερό βέλος");
define("navLinkHeaderRightarrow", "Δεξί βέλος");
define("navLinkHeaderUparrow", "Πάνω βέλος");
define("navLinkHeaderDownarrow", "Κάτω βέλος");
define("navLinkHeaderNavigationGoback", "Πήγαινε έναν μήνα πίσω"); 
define("navLinkHeaderNavigationGofwd", "Πήγαινε έναν μήνα μπροστά");
define("navLinkHeaderNavigationGobackYear", "Πήγαινε έναν χρόνο πίσω"); 
define("navLinkHeaderNavigationGofwdYear", "Πήγαινε έναν χρόνο μπροστά");
define("navLinkHeaderNavigationMonth", "Μήνας");
define("navLinkHeaderNavigationYear", "Έτος"); 
define("navLinkHeaderNavigationSelectMonth", "Επιλογή μήνα");
define("navLinkHeaderNavigationSelectYear", "Επιλογή έτους");
define("navLinkHeaderNavigationCurrentCalendar", "Πήγαινε στο 'Σήμερα'");
define("navLinkHeaderFooterTooltipShowWeekNr", "Απόκρυψη / Εμφάνιση εβδομάδας ημερολογίου");
define("navLinkHeaderFooterShowWeekNr", "Εβδομάδα");
define("navLinkHeaderFooterTooltipCalendarSelect", "Επιλογή ημερολογίου...");
define("navLinkHeaderFooterCalendarSelect", "Ημερολόγιο");
define("navLinkHeaderFooterTooltipLogout", "Αποσύνδεση από το ημερολόγιο");
define("navLinkHeaderFooterTooltipLogin", "Σύνδεση στο ημερολόγιο");
define("navLinkHeaderFooterLogin", "Σύνδεση");
define("navLinkHeaderFooterLogout", "Αποσύνδεση");

//Calendar table
define("tableColumnHeaderWeek", "Εβδομάδα");
define("tableColumnHeaderQuarter", "Τρίμηνο");

//BBCode description
define("tooltipBBCodesHeader", "Χρησιμοποιήστε τους παρακάτω BBCode"); 
define("tooltipBBCodesBold", "Έντονα");
define("tooltipBBCodesItalic", "Πλάγια"); 
define("tooltipBBCodesQuote", "Παράθεση");
define("tooltipBBCodesUnderlined", "Υπογραμμισμένα"); 
define("tooltipBBCodesStrikethrough", "Διαγραμμένα");
define("tooltipBBCodesColor", "Χρώμα"); 
define("tooltipBBCodesBackground", "Φόντο"); 
define("tooltipBBCodesCentered", "Κεντραρισμένα"); 
define("tooltipBBCodesURLFormatted", "Οι σύνδεσμοι και οι αλλαγές γραμμής θα μορφοποιηθούν.");

//Form - Add
define("formHeaderAddEvent", "Νέο Συμβάν"); 
define("formLabelTooltipEventname", "Όνομα εμφάνισης (Απαιτείται)");
define("formLabelEventname", "<u>Σ</u>υμβάν");
define("formInputPlaceholderEventname", "Ονομασία"); 
define("formLabelTooltipStartdate", "Ημερομηνία έναρξης (Απαιτείται)");
define("formLabelStartdate", "<u>Η</u>μερομηνία έναρξης");
define("formLabelTooltipEnddate", "Ημερομηνία λήξης (Απαιτείται)");
define("formLabelEnddate", "<u>Η</u>μερομηνία λήξης"); 
define("formLabelTooltipStarttime", "Ώρα έναρξης (Προαιρετικό, δεν πρέπει να είναι κενό!)");
define("formLabelTooltip2Starttime", "Ορίστε '00:00' για να ορίσετε ένα ολοήμερο συμβάν ή σειρά.");
define("formLabelStarttime", "<u>Α</u>πό");
define("formLabelTooltipEndtime", "Ώρα λήξης (Προαιρετικό, δεν πρέπει να είναι κενό!)");
define("formLabelEndtime", "<u>Έ</u>ως"); 
define("formLabelTooltipRecurring", "Επαναλαμβανόμενο (Προαιρετικό)");
define("formLabelTooltip2Recurring", "Επαναλαμβανόμενο συμβάν; γενέθλια, αργία κ.λπ.");
define("formLabelRecurring", "Επαναλαμβανόμεν<u>ο</u>");
define("formLabelTooltipColor", "Χρώμα (Προαιρετικό)");
define("formLabelTooltip2Color", "Ορίστε ένα χρώμα για το συμβάν");
define("formLabelColor", "Χρ<u>ώ</u>μα");
define("formLabelTooltipPrivate", "Ιδιωτικό συμβάν (Προαιρετικό)");
define("formLabelTooltip2Private", "Αυτό το συμβάν θα εμφανιστεί μόνο μετά τη σύνδεση.");
define("formLabelPrivate", "Ιδιωτικ<u>ό</u>");
define("formLabelTooltipNotification", "Ειδοποίηση (Προαιρετικό)");
define("formLabelTooltip2Notification", "Στείλτε ειδοποίηση μέσω Email");
define("formLabelNotification", "Ειδοποί<u>η</u>ση");
define("formLabelTooltipDescription", "Περιγραφή (Προαιρετικό)");
define("formLabelTooltip2Description", "Στείλτε ειδοποίηση μέσω Email");
define("formLabelDescription", "Περιγρ<u>α</u>φή");
define("formLabelTooltipAddEvent", "Προσθήκη συμβάντος");
define("formLabelAddEvent", "Προσθ<u>ή</u>κη"); 

//Form - Edit
define("formSummaryTooltipEditEvent", "Επεξεργασία συμβάντος"); 
define("formSummaryLabelEditEvent", "Επεξεργασία <u>Σ</u>υμβάντος");
define("formLabelTooltipEditSingleEvent", "Συμβάν (Απαιτείται) - ID"); 
define("formLabelEditSingleEvent", "Συμβ<u>ά</u>ν");
define("formLabelTooltipEditSingleEventDate", "Ημερομηνία");
define("formLabelEditSingleEventDate", "<u>Η</u>μερομηνία");
define("formCheckboxLabelTooltipEditSingleEventHoliday", "<u>Η</u>μερομηνία");
define("formLabelEditSingleEventRecurring", "Επαναλαμβανόμεν<u>ο</u>");
define("formLabelTooltipEditSingleEventRecurring", "Επαναλαμβανόμενο (Προαιρετικό)");
define("formLabelTooltip2EditSingleEventRecurring", "Επαναλαμβανόμενο συμβάν; γενέθλια, αργία κ.λπ.");
define("formLabelEditSingleEventStarttime", "<u>Α</u>πό");
define("formLabelTooltipEditSingleEventStarttime", "Ώρα έναρξης (Προαιρετικό, δεν πρέπει να είναι κενό!)");
define("formLabelTooltip2EditSingleEventStarttime", "Ορίστε '00:00' για να ορίσετε ένα ολοήμερο συμβάν ή σειρά.");
define("formLabelEditSingleEventEndtime", "<u>Έ</u>ως");
define("formLabelTooltipEditSingleEventEndtime", "Ώρα λήξης (Προαιρετικό, δεν πρέπει να είναι κενό!)");
define("formLabelTooltipEditSingleEventColor", "Χρώμα (Προαιρετικό)");
define("formLabelTooltip2EditSingleEventColor", "Ορίστε ένα χρώμα για το συμβάν");
define("formLabelEditSingleEventColor", "Χρ<u>ώ</u>μα");
define("formLabelTooltipEditSingleEventPrivate", "Ιδιωτικό συμβάν (Προαιρετικό)");
define("formLabelTooltip2EditSingleEventPrivate", "Αυτό το συμβάν θα εμφανιστεί μόνο μετά τη σύνδεση.");
define("formLabelEditSingleEventPrivate", "Ιδιωτικ<u>ό</u>");
define("formLabelTooltipEditSingleEventNotification", "Ειδοποίηση (Προαιρετικό)");
define("formLabelTooltip2EditSingleEventNotification", "Στείλτε ειδοποίηση μέσω Email");
define("formLabelEditSingleEventNotification", "Ειδοποί<u>η</u>ση");
define("formLabelEditSingleEventTooltipDescription", "Περιγραφή (Προαιρετικό)");
define("formLabelEditSingleEventTooltip2Description", "Στείλτε ειδοποίηση μέσω Email");
define("formLabelEditSingleEventDescription", "Περιγρ<u>α</u>φή");
define("formLabelEditSingleEventPlaceholderDescription", "Εισάγετε περιγραφή (Προαιρετικό)");
define("formLabelEditSingleEventTooltipAddEvent", "Προσθήκη συμβάντος");
define("formLabelEditSingleEventCopy", "Αντ<u>ι</u>γραφή");
define("formLabelEditSingleEventTooltipCopy", "Δημιουργία αντιγράφου (Προαιρετικό)");
define("formLabelEditSingleEventTooltip2Copy", "Αντιγράφει το συμβάν στην καθορισμένη ημερομηνία");
define("formLabelEditSingleEventDelete", "<u>Δ</u>ιαγραφή");
define("formLabelEditSingleEventTooltipDelete", "Διαγραφή συμβάντος (Προαιρετικό)");
define("formLabelEditSingleEventTooltip2Delete", "Διαγράφει το συμβάν");
define("formLabelEditSingleEventTooltipApplyChanges", "Αποθήκευση αλλαγών."); 
define("formLabelEditSingleEventApplyChanges", "Αποθ<u>ή</u>κευση"); 

//Form - select Calendar
define("formTitleHeaderSelectCalendar", "Επιλογή Ημερολογίου");
define("formTitleHeaderTooltipSelectCalendar", "Αποθήκευση αλλαγών."); 
define("formLabelSelectCalendarApplyChanges", "Αποθ<u>ή</u>κευση");
define("formLabelSelectCalendarMonth", "<u>Μ</u>ήνας");
define("formLabelTooltipSelectCalendarMonth", "Επιλογή μήνα");
define("formLabelTooltip2SelectCalendarMonth", "Μπορείτε επίσης να χρησιμοποιήσετε τον τροχό του ποντικιού.");
define("formLabelSelectCalendarYear", "<u>Έ</u>τος");
define("formLabelTooltipSelectCalendarYear", "Επιλογή έτους");
define("formLabelTooltip2SelectCalendarYear", "Μπορείτε επίσης να χρησιμοποιήσετε τον τροχό του ποντικιού."); 
define("formLabelShowSelectedCalendar", "<u>Ε</u>μφάνιση");
define("formLabelTooltipShowSelectedCalendar", "Εμφάνιση ημερολογίου");

//Form - Login
define("formTitleLogin", "Σύνδεση"); 
define("formLabelLoginName", "<u>Ό</u>νομα χρήστη");
define("formLabelLoginPassword", "<u>Κ</u>ωδικός πρόσβασης");
define("formLabelLogin", "<u>Σ</u>ύνδεση");
define("formButtonHeaderLogin", "Σύνδεση");
define("formTitleLogout", "Αποσύνδεση"); 
define("formLabelLogoutMessage", "πραγματικά αποσύνδεση;");
define("formButtonLabelLogout", "Αποσύνδ<u>ε</u>ση");
define("formButtonTooltipLogout", "Αποσύνδεση");
