<?php
declare(strict_types=1);

// Months
define("MONTHS", [
    1 => 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
]);

// Weekdays
define("WEEKDAYS", [
    1 => 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'
]);

//Common Names
define("labelHeaderTime", "Heure"); 
define("labelHeaderUntil", "jusqu'à"); 

//TitleBars
define("formTitleBarHeader", "Calendrier"); 

//Navs and Buttons
define("navLinkHeaderClose", "Fermer"); 
define("navLinkHeaderHotkey", "Touche");
define("navLinkHeaderCtrl", "Ctrl");
define("navLinkHeaderLeftarrow", "Flèche gauche");
define("navLinkHeaderRightarrow", "Flèche droite");
define("navLinkHeaderUparrow", "Flèche haut");
define("navLinkHeaderDownarrow", "Flèche bas");
define("navLinkHeaderNavigationGoback", "Reculer d'un mois"); 
define("navLinkHeaderNavigationGofwd", "Avancer d'un mois");
define("navLinkHeaderNavigationGobackYear", "Reculer d'un an"); 
define("navLinkHeaderNavigationGofwdYear", "Avancer d'un an");
define("navLinkHeaderNavigationMonth", "Mois");
define("navLinkHeaderNavigationYear", "Année"); 
define("navLinkHeaderNavigationSelectMonth", "Sélectionner le mois");
define("navLinkHeaderNavigationSelectYear", "Sélectionner l'année");
define("navLinkHeaderNavigationCurrentCalendar", "Aller à 'Aujourd'hui'");
define("navLinkHeaderFooterTooltipShowWeekNr", "Masquer / Afficher la semaine du calendrier");
define("navLinkHeaderFooterShowWeekNr", "Semaine");
define("navLinkHeaderFooterTooltipCalendarSelect", "Sélectionner le calendrier...");
define("navLinkHeaderFooterCalendarSelect", "Calendrier");
define("navLinkHeaderFooterTooltipLogout", "Se déconnecter du calendrier");
define("navLinkHeaderFooterTooltipLogin", "Se connecter au calendrier");
define("navLinkHeaderFooterLogin", "Connexion");
define("navLinkHeaderFooterLogout", "Déconnexion");

//Calendar table
define("tableColumnHeaderWeek", "Semaine");
define("tableColumnHeaderQuarter", "Trimestre");

//BBCode description
define("tooltipBBCodesHeader", "Utilisez les BBCodes suivants"); 
define("tooltipBBCodesBold", "Gras");
define("tooltipBBCodesItalic", "Italique"); 
define("tooltipBBCodesQuote", "Citation");
define("tooltipBBCodesUnderlined", "Souligné"); 
define("tooltipBBCodesStrikethrough", "Barré");
define("tooltipBBCodesColor", "Couleur"); 
define("tooltipBBCodesBackground", "Arrière-plan"); 
define("tooltipBBCodesCentered", "Centré"); 
define("tooltipBBCodesURLFormatted", "Les liens et les sauts de ligne seront formatés.");

//Form - Add
define("formHeaderAddEvent", "Nouvel Événement"); 
define("formLabelTooltipEventname", "Nom d'affichage (Obligatoire)");
define("formLabelEventname", "<u>É</u>vénement");
define("formInputPlaceholderEventname", "Désignation"); 
define("formLabelTooltipStartdate", "Date de début (Obligatoire)");
define("formLabelStartdate", "<u>D</u>ate de début");
define("formLabelTooltipEnddate", "Date de fin (Obligatoire)");
define("formLabelEnddate", "<u>D</u>ate de fin"); 
define("formLabelTooltipStarttime", "Heure de début (Optionnel, ne doit pas être vide!)");
define("formLabelTooltip2Starttime", "Réglez sur '00:00' pour définir un événement ou une série d'une journée.");
define("formLabelStarttime", "<u>D</u>e");
define("formLabelTooltipEndtime", "Heure de fin (Optionnel, ne doit pas être vide!)");
define("formLabelEndtime", "<u>À</u>"); 
define("formLabelTooltipRecurring", "Récurrent (Optionnel)");
define("formLabelTooltip2Recurring", "Événement récurrent; anniversaire, fête, etc.");
define("formLabelRecurring", "Récu<u>r</u>rent");
define("formLabelTooltipColor", "Couleur (Optionnel)");
define("formLabelTooltip2Color", "Définir une couleur pour l'événement");
define("formLabelColor", "Cou<u>l</u>eur");
define("formLabelTooltipPrivate", "Événement privé (Optionnel)");
define("formLabelTooltip2Private", "Cet événement ne sera visible qu'après connexion.");
define("formLabelPrivate", "Priv<u>é</u>");
define("formLabelTooltipNotification", "Notification (Optionnel)");
define("formLabelTooltip2Notification", "Envoyer une notification par Email");
define("formLabelNotification", "Notifi<u>c</u>ation");
define("formLabelTooltipDescription", "Description (Optionnel)");
define("formLabelTooltip2Description", "Envoyer une notification par Email");
define("formLabelDescription", "Des<u>c</u>ription");
define("formLabelTooltipAddEvent", "Ajouter un événement");
define("formLabelAddEvent", "Ajout<u>e</u>r"); 

//Form - Edit
define("formSummaryTooltipEditEvent", "Modifier l'événement"); 
define("formSummaryLabelEditEvent", "Modifier l'<u>É</u>vénement");
define("formLabelTooltipEditSingleEvent", "Événement (Obligatoire) - ID"); 
define("formLabelEditSingleEvent", "Év<u>é</u>nement");
define("formLabelTooltipEditSingleEventDate", "Date");
define("formLabelEditSingleEventDate", "<u>D</u>ate");
define("formCheckboxLabelTooltipEditSingleEventHoliday", "<u>D</u>ate");
define("formLabelEditSingleEventRecurring", "Récu<u>r</u>rent");
define("formLabelTooltipEditSingleEventRecurring", "Récurrent (Optionnel)");
define("formLabelTooltip2EditSingleEventRecurring", "Événement récurrent; anniversaire, fête, etc.");
define("formLabelEditSingleEventStarttime", "<u>D</u>e");
define("formLabelTooltipEditSingleEventStarttime", "Heure de début (Optionnel, ne doit pas être vide!)");
define("formLabelTooltip2EditSingleEventStarttime", "Réglez sur '00:00' pour définir un événement ou une série d'une journée.");
define("formLabelEditSingleEventEndtime", "<u>À</u>");
define("formLabelTooltipEditSingleEventEndtime", "Heure de fin (Optionnel, ne doit pas être vide!)");
define("formLabelTooltipEditSingleEventColor", "Couleur (Optionnel)");
define("formLabelTooltip2EditSingleEventColor", "Définir une couleur pour l'événement");
define("formLabelEditSingleEventColor", "Cou<u>l</u>eur");
define("formLabelTooltipEditSingleEventPrivate", "Événement privé (Optionnel)");
define("formLabelTooltip2EditSingleEventPrivate", "Cet événement ne sera visible qu'après connexion.");
define("formLabelEditSingleEventPrivate", "Priv<u>é</u>");
define("formLabelTooltipEditSingleEventNotification", "Notification (Optionnel)");
define("formLabelTooltip2EditSingleEventNotification", "Envoyer une notification par Email");
define("formLabelEditSingleEventNotification", "Notifi<u>c</u>ation");
define("formLabelEditSingleEventTooltipDescription", "Description (Optionnel)");
define("formLabelEditSingleEventTooltip2Description", "Envoyer une notification par Email");
define("formLabelEditSingleEventDescription", "Des<u>c</u>ription");
define("formLabelEditSingleEventPlaceholderDescription", "Entrez la description (Optionnel)");
define("formLabelEditSingleEventTooltipAddEvent", "Ajouter un événement");
define("formLabelEditSingleEventCopy", "Co<u>p</u>ier");
define("formLabelEditSingleEventTooltipCopy", "Créer une copie (Optionnel)");
define("formLabelEditSingleEventTooltip2Copy", "Copie l'événement à la date spécifiée");
define("formLabelEditSingleEventDelete", "<u>S</u>upprimer");
define("formLabelEditSingleEventTooltipDelete", "Supprimer l'événement (Optionnel)");
define("formLabelEditSingleEventTooltip2Delete", "Supprime l'événement");
define("formLabelEditSingleEventTooltipApplyChanges", "Enregistrer les modifications."); 
define("formLabelEditSingleEventApplyChanges", "Enreg<u>i</u>strer"); 

//Form - select Calendar
define("formTitleHeaderSelectCalendar", "Sélectionner le Calendrier");
define("formTitleHeaderTooltipSelectCalendar", "Enregistrer les modifications."); 
define("formLabelSelectCalendarApplyChanges", "Enreg<u>i</u>strer");
define("formLabelSelectCalendarMonth", "<u>M</u>ois");
define("formLabelTooltipSelectCalendarMonth", "Sélectionner le mois");
define("formLabelTooltip2SelectCalendarMonth", "La molette de la souris peut également être utilisée.");
define("formLabelSelectCalendarYear", "<u>A</u>nnée");
define("formLabelTooltipSelectCalendarYear", "Sélectionner l'année");
define("formLabelTooltip2SelectCalendarYear", "La molette de la souris peut également être utilisée."); 
define("formLabelShowSelectedCalendar", "<u>A</u>fficher");
define("formLabelTooltipShowSelectedCalendar", "Afficher le calendrier");

//Form - Login
define("formTitleLogin", "Connexion"); 
define("formLabelLoginName", "<u>N</u>om d'utilisateur");
define("formLabelLoginPassword", "<u>M</u>ot de passe");
define("formLabelLogin", "<u>C</u>onnexion");
define("formButtonHeaderLogin", "Connexion");
define("formTitleLogout", "Déconnexion"); 
define("formLabelLogoutMessage", "vraiment se déconnecter?");
define("formButtonLabelLogout", "Déconn<u>e</u>xion");
define("formButtonTooltipLogout", "Déconnexion");
