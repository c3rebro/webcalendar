<?php
declare(strict_types=1);

// Months
define("MONTHS", [
    1 => 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
]);

// Weekdays
define("WEEKDAYS", [
    1 => 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'
]);

//Common Names
define("labelHeaderTime", "Hora"); 
define("labelHeaderUntil", "hasta"); 

//TitleBars
define("formTitleBarHeader", "Calendario"); 

//Navs and Buttons
define("navLinkHeaderClose", "Cerrar"); 
define("navLinkHeaderHotkey", "Tecla");
define("navLinkHeaderCtrl", "Ctrl");
define("navLinkHeaderLeftarrow", "Flecha izquierda");
define("navLinkHeaderRightarrow", "Flecha derecha");
define("navLinkHeaderUparrow", "Flecha arriba");
define("navLinkHeaderDownarrow", "Flecha abajo");
define("navLinkHeaderNavigationGoback", "Retroceder un mes"); 
define("navLinkHeaderNavigationGofwd", "Avanzar un mes");
define("navLinkHeaderNavigationGobackYear", "Retroceder un año"); 
define("navLinkHeaderNavigationGofwdYear", "Avanzar un año");
define("navLinkHeaderNavigationMonth", "Mes");
define("navLinkHeaderNavigationYear", "Año"); 
define("navLinkHeaderNavigationSelectMonth", "Seleccionar mes");
define("navLinkHeaderNavigationSelectYear", "Seleccionar año");
define("navLinkHeaderNavigationCurrentCalendar", "Ir a 'Hoy'");
define("navLinkHeaderFooterTooltipShowWeekNr", "Ocultar / Mostrar semana del calendario");
define("navLinkHeaderFooterShowWeekNr", "Semana");
define("navLinkHeaderFooterTooltipCalendarSelect", "Seleccionar calendario...");
define("navLinkHeaderFooterCalendarSelect", "Calendario");
define("navLinkHeaderFooterTooltipLogout", "Cerrar sesión del calendario");
define("navLinkHeaderFooterTooltipLogin", "Iniciar sesión en el calendario");
define("navLinkHeaderFooterLogin", "Iniciar sesión");
define("navLinkHeaderFooterLogout", "Cerrar sesión");

//Calendar table
define("tableColumnHeaderWeek", "Semana");
define("tableColumnHeaderQuarter", "Trimestre");

//BBCode description
define("tooltipBBCodesHeader", "Usa los siguientes BBCode"); 
define("tooltipBBCodesBold", "Negrita");
define("tooltipBBCodesItalic", "Cursiva"); 
define("tooltipBBCodesQuote", "Cita");
define("tooltipBBCodesUnderlined", "Subrayado"); 
define("tooltipBBCodesStrikethrough", "Tachado");
define("tooltipBBCodesColor", "Color"); 
define("tooltipBBCodesBackground", "Fondo"); 
define("tooltipBBCodesCentered", "Centrado"); 
define("tooltipBBCodesURLFormatted", "Los enlaces y saltos de línea se formatearán.");

//Form - Add
define("formHeaderAddEvent", "Nuevo Evento"); 
define("formLabelTooltipEventname", "Nombre para mostrar (Requerido)");
define("formLabelEventname", "<u>E</u>vento");
define("formInputPlaceholderEventname", "Denominación"); 
define("formLabelTooltipStartdate", "Fecha de inicio (Requerido)");
define("formLabelStartdate", "<u>F</u>echa de inicio");
define("formLabelTooltipEnddate", "Fecha de finalización (Requerido)");
define("formLabelEnddate", "<u>F</u>echa de finalización"); 
define("formLabelTooltipStarttime", "Hora de inicio (Opcional, no debe estar vacío!)");
define("formLabelTooltip2Starttime", "Establecer a '00:00' para definir un evento de día completo o una serie.");
define("formLabelStarttime", "<u>D</u>esde");
define("formLabelTooltipEndtime", "Hora de finalización (Opcional, no debe estar vacío!)");
define("formLabelEndtime", "<u>H</u>asta"); 
define("formLabelTooltipRecurring", "Recurrente (Opcional)");
define("formLabelTooltip2Recurring", "Evento recurrente; cumpleaños, festivo, etc.");
define("formLabelRecurring", "Recu<u>r</u>rente");
define("formLabelTooltipColor", "Color (Opcional)");
define("formLabelTooltip2Color", "Establecer un color para el evento");
define("formLabelColor", "Col<u>o</u>r");
define("formLabelTooltipPrivate", "Evento privado (Opcional)");
define("formLabelTooltip2Private", "Este evento solo será visible después de iniciar sesión.");
define("formLabelPrivate", "Priv<u>a</u>do");
define("formLabelTooltipNotification", "Notificación (Opcional)");
define("formLabelTooltip2Notification", "Enviar una notificación por correo electrónico");
define("formLabelNotification", "Notifi<u>c</u>ación");
define("formLabelTooltipDescription", "Descripción (Opcional)");
define("formLabelTooltip2Description", "Enviar una notificación por correo electrónico");
define("formLabelDescription", "Descr<u>i</u>pción");
define("formLabelTooltipAddEvent", "Agregar evento");
define("formLabelAddEvent", "Agreg<u>a</u>r"); 

//Form - Edit
define("formSummaryTooltipEditEvent", "Editar evento"); 
define("formSummaryLabelEditEvent", "Editar <u>E</u>vento");
define("formLabelTooltipEditSingleEvent", "Evento (Requerido) - ID"); 
define("formLabelEditSingleEvent", "Even<u>t</u>o");
define("formLabelTooltipEditSingleEventDate", "Fecha");
define("formLabelEditSingleEventDate", "<u>F</u>echa");
define("formCheckboxLabelTooltipEditSingleEventHoliday", "<u>F</u>echa");
define("formLabelEditSingleEventRecurring", "Recu<u>r</u>rente");
define("formLabelTooltipEditSingleEventRecurring", "Recurrente (Opcional)");
define("formLabelTooltip2EditSingleEventRecurring", "Evento recurrente; cumpleaños, festivo, etc.");
define("formLabelEditSingleEventStarttime", "<u>D</u>esde");
define("formLabelTooltipEditSingleEventStarttime", "Hora de inicio (Opcional, no debe estar vacío!)");
define("formLabelTooltip2EditSingleEventStarttime", "Establecer a '00:00' para definir un evento de día completo o una serie.");
define("formLabelEditSingleEventEndtime", "<u>H</u>asta");
define("formLabelTooltipEditSingleEventEndtime", "Hora de finalización (Opcional, no debe estar vacío!)");
define("formLabelTooltipEditSingleEventColor", "Color (Opcional)");
define("formLabelTooltip2EditSingleEventColor", "Establecer un color para el evento");
define("formLabelEditSingleEventColor", "Col<u>o</u>r");
define("formLabelTooltipEditSingleEventPrivate", "Evento privado (Opcional)");
define("formLabelTooltip2EditSingleEventPrivate", "Este evento solo será visible después de iniciar sesión.");
define("formLabelEditSingleEventPrivate", "Priv<u>a</u>do");
define("formLabelTooltipEditSingleEventNotification", "Notificación (Opcional)");
define("formLabelTooltip2EditSingleEventNotification", "Enviar una notificación por correo electrónico");
define("formLabelEditSingleEventNotification", "Notifi<u>c</u>ación");
define("formLabelEditSingleEventTooltipDescription", "Descripción (Opcional)");
define("formLabelEditSingleEventTooltip2Description", "Enviar una notificación por correo electrónico");
define("formLabelEditSingleEventDescription", "Descr<u>i</u>pción");
define("formLabelEditSingleEventPlaceholderDescription", "Ingrese descripción (Opcional)");
define("formLabelEditSingleEventTooltipAddEvent", "Agregar evento");
define("formLabelEditSingleEventCopy", "Cop<u>i</u>ar");
define("formLabelEditSingleEventTooltipCopy", "Crear una copia (Opcional)");
define("formLabelEditSingleEventTooltip2Copy", "Copia el evento a la fecha especificada");
define("formLabelEditSingleEventDelete", "<u>E</u>liminar");
define("formLabelEditSingleEventTooltipDelete", "Eliminar evento (Opcional)");
define("formLabelEditSingleEventTooltip2Delete", "Elimina el evento");
define("formLabelEditSingleEventTooltipApplyChanges", "Guardar cambios."); 
define("formLabelEditSingleEventApplyChanges", "Gu<u>a</u>rdar"); 

//Form - select Calendar
define("formTitleHeaderSelectCalendar", "Seleccionar Calendario");
define("formTitleHeaderTooltipSelectCalendar", "Guardar cambios."); 
define("formLabelSelectCalendarApplyChanges", "Gu<u>a</u>rdar");
define("formLabelSelectCalendarMonth", "<u>M</u>es");
define("formLabelTooltipSelectCalendarMonth", "Seleccionar mes");
define("formLabelTooltip2SelectCalendarMonth", "También se puede usar la rueda del ratón.");
define("formLabelSelectCalendarYear", "<u>A</u>ño");
define("formLabelTooltipSelectCalendarYear", "Seleccionar año");
define("formLabelTooltip2SelectCalendarYear", "También se puede usar la rueda del ratón."); 
define("formLabelShowSelectedCalendar", "<u>M</u>ostrar");
define("formLabelTooltipShowSelectedCalendar", "Mostrar calendario");

//Form - Login
define("formTitleLogin", "Iniciar sesión"); 
define("formLabelLoginName", "<u>N</u>ombre de usuario");
define("formLabelLoginPassword", "<u>C</u>ontraseña");
define("formLabelLogin", "<u>I</u>niciar sesión");
define("formButtonHeaderLogin", "Iniciar sesión");
define("formTitleLogout", "Cerrar sesión"); 
define("formLabelLogoutMessage", "¿Realmente cerrar sesión?");
define("formButtonLabelLogout", "Cerr<u>a</u>r sesión");
define("formButtonTooltipLogout", "Cerrar sesión");
