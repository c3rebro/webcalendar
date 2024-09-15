<?php
declare(strict_types=1);

// Months
define("MONTHS", [
    1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
]);

// Weekdays
define("WEEKDAYS", [
    1 => 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'
]);

//Common Names
define("labelHeaderTime", "Time"); 
define("labelHeaderUntil", "until"); 

//TitleBars
define("formTitleBarHeader", "Calendar"); 

//Navs and Buttons
define("navLinkHeaderClose", "Close"); 
define("navLinkHeaderHotkey", "Key");
define("navLinkHeaderCtrl", "Ctrl");
define("navLinkHeaderLeftarrow", "Left arrow");
define("navLinkHeaderRightarrow", "Right arrow");
define("navLinkHeaderUparrow", "Up arrow");
define("navLinkHeaderDownarrow", "Down arrow");
define("navLinkHeaderNavigationGoback", "Go back one month"); 
define("navLinkHeaderNavigationGofwd", "Go forward one month");
define("navLinkHeaderNavigationGobackYear", "Go back one year"); 
define("navLinkHeaderNavigationGofwdYear", "Go forward one year");
define("navLinkHeaderNavigationMonth", "Month");
define("navLinkHeaderNavigationYear", "Year"); 
define("navLinkHeaderNavigationSelectMonth", "Select Month");
define("navLinkHeaderNavigationSelectYear", "Select Year");
define("navLinkHeaderNavigationCurrentCalendar", "Go to 'Today'");
define("navLinkHeaderFooterTooltipShowWeekNr", "Hide / Show calendar week");
define("navLinkHeaderFooterShowWeekNr", "Week");
define("navLinkHeaderFooterTooltipCalendarSelect", "Select calendar...");
define("navLinkHeaderFooterCalendarSelect", "Calendar");
define("navLinkHeaderFooterTooltipLogout", "Log out from the calendar");
define("navLinkHeaderFooterTooltipLogin", "Log in to the calendar");
define("navLinkHeaderFooterLogin", "Login");
define("navLinkHeaderFooterLogout", "Logout");

//Calendar table
define("tableColumnHeaderWeek", "Week");
define("tableColumnHeaderQuarter", "Quarter");

//BBCode description
define("tooltipBBCodesHeader", "Use the following BBCodes"); 
define("tooltipBBCodesBold", "Bold");
define("tooltipBBCodesItalic", "Italic"); 
define("tooltipBBCodesQuote", "Quote");
define("tooltipBBCodesUnderlined", "Underlined"); 
define("tooltipBBCodesStrikethrough", "Strikethrough");
define("tooltipBBCodesColor", "Color"); 
define("tooltipBBCodesBackground", "Background"); 
define("tooltipBBCodesCentered", "Centered"); 
define("tooltipBBCodesURLFormatted", "Links and line breaks will be formatted.");

//Form - Add
define("formHeaderAddEvent", "New Event"); 
define("formLabelTooltipEventname", "Display name (Required)");
define("formLabelEventname", "<u>E</u>vent");
define("formInputPlaceholderEventname", "Designation"); 
define("formLabelTooltipStartdate", "Start date (Required)");
define("formLabelStartdate", "<u>S</u>tart date");
define("formLabelTooltipEnddate", "End date (Required)");
define("formLabelEnddate", "<u>E</u>nd date"); 
define("formLabelTooltipStarttime", "Start time (Optional, must not be empty!)");
define("formLabelTooltip2Starttime", "Set to '00:00' to define an all-day event or series.");
define("formLabelStarttime", "<u>F</u>rom");
define("formLabelTooltipEndtime", "End time (Optional, must not be empty!)");
define("formLabelEndtime", "<u>T</u>o"); 
define("formLabelTooltipRecurring", "Recurring (Optional)");
define("formLabelTooltip2Recurring", "Recurring event; birthday, holiday etc.");
define("formLabelRecurring", "Recurri<u>n</u>g");
define("formLabelTooltipColor", "Color (Optional)");
define("formLabelTooltip2Color", "Set a color for the event");
define("formLabelColor", "Co<u>l</u>or");
define("formLabelTooltipPrivate", "Private event (Optional)");
define("formLabelTooltip2Private", "This event will only be visible after login.");
define("formLabelPrivate", "Priv<u>a</u>te");
define("formLabelTooltipNotification", "Notification (Optional)");
define("formLabelTooltip2Notification", "Send a notification via Email");
define("formLabelNotification", "Notifi<u>c</u>ation");
define("formLabelTooltipDescription", "Description (Optional)");
define("formLabelTooltip2Description", "Send a notification via Email");
define("formLabelDescription", "Des<u>c</u>ription");
define("formLabelTooltipAddEvent", "Add event");
define("formLabelAddEvent", "Add<u> </u>"); 

//Form - Edit
define("formSummaryTooltipEditEvent", "Edit event"); 
define("formSummaryLabelEditEvent", "Edit <u>E</u>vent");
define("formLabelTooltipEditSingleEvent", "Event (Required) - ID"); 
define("formLabelEditSingleEvent", "Eve<u>n</u>t");
define("formLabelTooltipEditSingleEventDate", "Date");
define("formLabelEditSingleEventDate", "<u>D</u>ate");
define("formCheckboxLabelTooltipEditSingleEventHoliday", "<u>D</u>ate");
define("formLabelEditSingleEventRecurring", "Recurri<u>n</u>g");
define("formLabelTooltipEditSingleEventRecurring", "Recurring (Optional)");
define("formLabelTooltip2EditSingleEventRecurring", "Recurring event; birthday, holiday etc.");
define("formLabelEditSingleEventStarttime", "<u>F</u>rom");
define("formLabelTooltipEditSingleEventStarttime", "Start time (Optional, must not be empty!)");
define("formLabelTooltip2EditSingleEventStarttime", "Set to '00:00' to define an all-day event or series.");
define("formLabelEditSingleEventEndtime", "<u>T</u>o");
define("formLabelTooltipEditSingleEventEndtime", "End time (Optional, must not be empty!)");
define("formLabelTooltipEditSingleEventColor", "Color (Optional)");
define("formLabelTooltip2EditSingleEventColor", "Set a color for the event");
define("formLabelEditSingleEventColor", "Co<u>l</u>or");
define("formLabelTooltipEditSingleEventPrivate", "Private event (Optional)");
define("formLabelTooltip2EditSingleEventPrivate", "This event will only be visible after login.");
define("formLabelEditSingleEventPrivate", "Priv<u>a</u>te");
define("formLabelTooltipEditSingleEventNotification", "Notification (Optional)");
define("formLabelTooltip2EditSingleEventNotification", "Send a notification via Email");
define("formLabelEditSingleEventNotification", "Notifi<u>c</u>ation");
define("formLabelEditSingleEventTooltipDescription", "Description (Optional)");
define("formLabelEditSingleEventTooltip2Description", "Send a notification via Email");
define("formLabelEditSingleEventDescription", "Des<u>c</u>ription");
define("formLabelEditSingleEventPlaceholderDescription", "Enter description (Optional)");
define("formLabelEditSingleEventTooltipAddEvent", "Add event");
define("formLabelEditSingleEventCopy", "Co<u>p</u>y");
define("formLabelEditSingleEventTooltipCopy", "Create copy (Optional)");
define("formLabelEditSingleEventTooltip2Copy", "Copies the event to the specified date");
define("formLabelEditSingleEventDelete", "<u>D</u>elete");
define("formLabelEditSingleEventTooltipDelete", "Delete event (Optional)");
define("formLabelEditSingleEventTooltip2Delete", "Deletes the event");
define("formLabelEditSingleEventTooltipApplyChanges", "Save changes."); 
define("formLabelEditSingleEventApplyChanges", "S<u>a</u>ve"); 

//Form - select Calendar
define("formTitleHeaderSelectCalendar", "Select Calendar");
define("formTitleHeaderTooltipSelectCalendar", "Save changes."); 
define("formLabelSelectCalendarApplyChanges", "S<u>a</u>ve");
define("formLabelSelectCalendarMonth", "<u>M</u>onth");
define("formLabelTooltipSelectCalendarMonth", "Select month");
define("formLabelTooltip2SelectCalendarMonth", "The mouse wheel can also be used.");
define("formLabelSelectCalendarYear", "<u>Y</u>ear");
define("formLabelTooltipSelectCalendarYear", "Select year");
define("formLabelTooltip2SelectCalendarYear", "The mouse wheel can also be used."); 
define("formLabelShowSelectedCalendar", "<u>S</u>how");
define("formLabelTooltipShowSelectedCalendar", "Show calendar");

//Form - Login
define("formTitleLogin", "Login"); 
define("formLabelLoginName", "<u>U</u>sername");
define("formLabelLoginPassword", "<u>P</u>assword");
define("formLabelLogin", "<u>L</u>ogin");
define("formButtonHeaderLogin", "Login");
define("formTitleLogout", "Logout"); 
define("formLabelLogoutMessage", "really logout?");
define("formButtonLabelLogout", "L<u>o</u>gout");
define("formButtonTooltipLogout", "Logout");
