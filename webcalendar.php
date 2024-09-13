<?php

/*
 *  Event Calendar (SQLite) - calendar.php (utf-8)
 * by Werner Zenk
 */

// Usernames and passwords
$NAME_PASS["user"] = "0000";
// $NAME_PASS["user2"] = "0002";
// Send notification via email
// An email address registered with the provider.
// See file: read_me.txt
$EMAIL = "";

/*
 * Program-specific settings
 */

// Session configuration statement
session_start();

// HTTP charset parameter
header('Content-type: text/html; charset=utf-8');

// PHP error messages (show under localhost)
if (isset($_SERVER["SERVER_NAME"])) {

    error_reporting($_SERVER["SERVER_NAME"] == 'localhost' ? E_ALL : E_ALL);
}

// Timezone - https://www.php.net/manual/en/timezones.php
date_default_timezone_set("Europe/Berlin");

// Path to the database file
$database = __DIR__ . "/db/database.db";

// Create database file if it does not exist
if (!file_exists($database)) {

    $db = new PDO('sqlite:' . $database);
    $db->exec("CREATE TABLE `calendar`(
  id INTEGER PRIMARY KEY,
  groupid INTEGER,
  event TEXT,
  description TEXT,
  color TEXT,
  private INTEGER,
  holiday INTEGER,
  notification INTEGER,
  date_today TEXT,
  date_begin TEXT,
  date_end TEXT,
  time_begin TEXT,
  time_end TEXT)");
} else {

    // Establish connection
    $db = new PDO('sqlite:' . $database);
}

// Define user
define("USER", (isset($_SESSION["name"])) ? true : false);

// SQL - Show private events
define("USER_PRIVATE", (USER) ? ' AND `private` >= 0 ' : ' AND `private` = 0 ');

// Months
define("MONTHS", [
    1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
]);

// Weekdays
define("WEEKDAYS", [
    1 => 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'
]);

// Form
define(
        "FORM",
        '<form id="form" accept-charset="utf-8" autocomplete="on" spellcheck="true">
 <div id="title-bar">
  <div id="title">Appointment Calendar</div>
  <div id="close" class="navLink" title="Close&#10;Key: ESC">&#10761;</div>
 </div>' . PHP_EOL . '
 <div id="form-block">'
);

define("FORM_", PHP_EOL . '</div>' . PHP_EOL . '</form>');

// BBCode - Info
define(
        "BBCODE",
        '<span class="tool">?<span class="tip">Use BBCodes:<br>
    [b]Bold[/b]&emsp; [i]Italic[/i]&emsp; [q]Quote[/q]<br>
    [u]Underlined[/u]&emsp; [s]Strikethrough[/s]<br>
    [c=red]Color[/c]&emsp; [bc=blue]Background[/bc]<br>
    [g=image.jpg][/g]&emsp; [z]Centered[/z]<br>
    [a=audio.mp3][/a]&emsp; [v=video.mp4][/v]<br>
    URL and line breaks will be formatted.</span></span>'
);

// Color palette (for Chromium based browsers)
define(
        "COLOR_PALETTE",
        '<datalist id="colors">
    <option>#BBDAF9</option> <option>#FFCACA</option> <option>#FFFFBF</option>
    <option>#C4FFC4</option> <option>#FFD2FF</option> <option>#CAFFFF</option>
    <option>#F5F5F5</option> <option>#FFFFFF</option> <option>#1578DB</option>
    <option>#E10000</option> <option>#DFDF00</option> <option>#00DF00</option>
    <option>#DF00DF</option> <option>#00DDDD</option> <option>#7F7F7F</option>
   </datalist>'
);

// Set month and year
$current = date_create("now");
$month = $_GET["month"] ?? date_format($current, "n");
$year = $_GET["year"] ?? date_format($current, "Y");
$selected = date_create($year . "-" . $month . "-01 00:00:00");

/*
 * Read data
 */

if (isset($_GET["calendar"])) {

    // Read events of the selected month
    $select = $db->prepare("SELECT `id`, `event`, `description`, `color`, `private`, `holiday`, `notification`, `date_today`, `date_begin`, `date_end`, `time_begin`, `time_end`
                          FROM `calendar`
                          WHERE STRFTIME('%Y', `date_today`) = :year AND STRFTIME('%m', `date_today`) = :month
                          " . USER_PRIVATE . "
                          OR STRFTIME('%m', `date_today`) = :month AND `holiday` = 1 " . USER_PRIVATE . "
                          ORDER BY `date_today` ASC");
    if ($select->execute([
                ':year' => $year,
                ':month' => sprintf("%02s", $_GET["month"])
            ])) {
        $events = $select->fetchAll();

        // Collect events
        $data = [];
        foreach ($events as $event) {

            // Date and time
            sscanf($event["date_today"], "%4s-%2u-%2u", $dbYear, $dbMonth, $dbDay);
            sscanf($event["date_end"], "%4s-%2u-%2u", $dbYearEnd, $dbMonthEnd, $dbDayEnd);
            sscanf($event["date_begin"], "%4s-%2u-%2u", $dbYearBegin, $dbMonthBegin, $dbDayBegin);
            sscanf($event["time_begin"], "%5s", $dbTimeBegin);
            sscanf($event["time_end"], "%5s", $dbTimeEnd);

            $dateToShow = customDate($dbDay, $dbMonth, $dbYear);
            $end_date = customDate($dbDayEnd, $dbMonthEnd, $dbYearEnd);

            $time = ($dbTimeBegin == '00:00') ? '' : $dbTimeBegin . ' ' . $dbTimeEnd;

            // HTML title attribute
            $ttime = !empty($time) ? ' - ' . $time . 'Time' : $time;
            $options = ($event["private"] == 1 ? '| Private ' : '') . ($event["holiday"] == 1 ? '| Holiday ' : '') . ($event["notification"] == 1 ? '| Notification ' : '');
            $title = 'title="' . $dateToShow . $ttime . (!empty($options) ? ' ' . $options : '') . '&#10;' . " " . $event["event"] .
                    (!empty($event["description"]) ? '&#10;' . stripBBCode($event["description"]) : '') . '"';

            // Text color depending on background color
            $textColor = blackOrWhite($event["color"]);

            // Add events to the array
            $button = '<button type="button" class="event" data-event="' . $event["id"] . '" data-color="' . $event["color"] . '|' . $textColor . '" ' . $title . '>' . $time . '<br>' . htmlspecialchars($event["event"]) . '</button>';
            isset($data[$dbDay]) ? $data[$dbDay] .= $button : $data[$dbDay] = $button;
        }

        /*
         * Create calendar (HTML table)
         */

        // Show month images (remove HTML comment <!-- -->)
        $monthImage = '<!-- <div id="month-image" data-image-name="img/' . $month . '.png"></div> -->' . PHP_EOL;

        // Navigation
        $table = $monthImage . '<table id="table">
    <thead>
    <tr>
    <th colspan="8" id="navigation">
    <span class="navLink" id="monthMinus" title="Go back one month&#10;CTRL + Left Arrow">&#10092;</span>
    <span class="navLink" id="month" data-month="' . $month . '" title="Month: ' . MONTHS[$month] . '&#10;Select calendar&#10;Key: K">' . MONTHS[$month] . '</span>
    <span class="navLink" id="monthPlus" title="Go forward one month&#10;CTRL + Right Arrow">&#10093;</span>
    <span class="navLink" id="calendarCurrent" title="Current calendar&#10;Key: X">&#9711;</span>
    <span class="navLink" id="yearMinus" title="Go back one year&#10;CTRL + Down Arrow">&#10092;</span>
    <span class="navLink" id="year" data-year="' . $year . '" title="Year: ' . $year . '&#10;Select calendar&#10;Key: K">' . $year . '</span>
    <span class="navLink" id="yearPlus" title="Go forward one year&#10;CTRL + Up Arrow">&#10093;</span>
    </th>
    </tr>
    <tr>
    <th class="week column" title="Week&#10;Key: W">W</th>' . PHP_EOL;

        // Weekdays
        foreach (WEEKDAYS as $weekday) {
            $table .= '  <th width="14.285714%" class="columns ' . $weekday . '"><span title="' . $weekday . '">' .
                    mb_substr($weekday, 0, 2) . '</span><span class="abbrWeekday">' . mb_substr($weekday, 2) . '</span>' . '</th>' . PHP_EOL;
        }

        $table .= ' </tr>
    </thead>
    <tbody>';

        // Length of the current month
        $monthLength = date_format($selected, "t");

        // Length of the previous month
        $prevMonthLength = date_format(date_modify(clone $selected, '-1 month'), "t");

        // First weekday in the current month
        $firstWeekday = date_format(date_modify(clone $selected, 'first day of this month'), "w");
        $firstWeekday = ($firstWeekday == 0) ? 7 : $firstWeekday;

        // First week in the month
        $week = week('1', $month, $year);
        $table .= PHP_EOL . ' <tr data-week="' . $week . '">' . PHP_EOL . '  <th class="week" title="Week ' . $week . '">' . $week . '</th>';

        // Calendar days of the previous month
        for ($i = 1; $i < $firstWeekday; $i++) {
            $table .= PHP_EOL . '  <td class="no-day"><div class="no-selection">' . ($prevMonthLength - ($firstWeekday - 1) + $i) . '</div></td>';
        }

        // Calendar days of the current month
        for ($day = 1; $day <= $monthLength; $day++) {
            $rest = ($day + $firstWeekday - 1) % 7;

            // HTML title attribute
            $title = customDate($day, $month, $year) .
                    '&#10;Week: ' . week($day, $month, $year) .
                    ' | Quarter: ' . quarter($month);

            // Today - CSS marking
            $today = (sprintf("%s%02s%02s", $year, $month, $day) == date_format($current, "Ymd") ? ' today' : '');

            // Add calendar day
            $weekday = weekday($day, $month, $year);
            $table .= PHP_EOL . '  <td class="one-day' . $today . '" data-day="' . sprintf("%02s.%02s.%s", $day, $month, $year) . '" data-weekday="' . $weekday . '">' .
                    '<div class="' . (USER ? 'day navLink' : 'no-selection') . '" data-month-day="' . sprintf("%s-%02s-%02s", $year, $month, $day) . '" title="' . $title . '">' . $day . '</div>';

            // Add existing data to the table
            if (isset($data[$day])) {
                $table .= $data[$day];
            }

            $table .= '</td>';

            // Start next table row
            if ($rest == 0) {
                if ($day <= ($monthLength - 1)) {
                    $week = week($day + 1, $month, $year);
                    $table .= PHP_EOL . ' </tr>' . PHP_EOL . ' <tr data-week="' . $week . '">' . PHP_EOL . ' <th class="week"><span title="Week ' . $week . '">' . $week . '</span></th>';
                }
            }
        }

        // Calendar days of the next month
        if ($rest > 0) {
            for ($i = 1; $i <= (7 - $rest); $i++) {
                $table .= PHP_EOL . '  <td class="no-day"><div class="no-selection">' . $i . '</div></td>';
            }
        }

        // Menu
        $login = (USER) ?
                '<span id="log" class="navLink logout" title="Log out from Event Calendar&#10;Key: A">Logout</span>' :
                '<span id="log" class="navLink" title="Log in to Event Calendar&#10;Key: A">Login</span>';

        $table .= PHP_EOL . '  </tr>
</tbody>
<tfoot>
  <tr>
   <td colspan="8" id="menu">
   <span id="showWeekNrSelect" class="navLink" title="Show week numbers&#10;Key: W">Week</span> |
   <span id="calendarSelect" class="navLink" title="Select calendar&#10;Key: K">Calendar</span> |
  ' . $login . '
   </td>
 </tr>
</tfoot>
</table>';

        echo $table;
    }
}

/*
 * Forms
 */

// Add entry
if (isset($_GET["add"]) && USER) {
    echo FORM . '
  <div id="headline">Add Event</div>

  <p>
   <label title="Event (Required)&#10;Access key: E"><u>E</u>vent:
   <input type="text" name="event" maxlength="50" placeholder="Enter event" accesskey="e" class="event-field" required autofocus></label>
  </p>

  <p>
   <label title="Start date (Required)&#10;Access key: D"><u>S</u>tart date: 
   <input type="date" name="date_begin" value="' . $_GET["year"] . '-' . sprintf("%02s", $_GET["month"]) . '-' . sprintf("%02s", $_GET["day"]) . '"
    min="0001-01-01" max="2500-01-01" accesskey="d" required></label>&emsp;
   <label title="Time (Optional, must not be empty!)&#10;Set: &#34;00:00&#34; for an all-day event.&#10;Access key: U"><u>T</u>ime:
   <input type="time" name="time_begin" value="00:00" accesskey="u" required></label>&emsp;
  </p>

  <p>
   <label title="End date (Required)&#10;Access key: D"><u>E</u>nd date: 
   <input type="date" name="date_end" value="' . $_GET["year"] . '-' . sprintf("%02s", $_GET["month"]) . '-' . sprintf("%02s", $_GET["day"]) . '"
    min="0001-01-01" max="2500-01-01" accesskey="d" required></label>&emsp;
   <label title="Time until (Optional, must not be empty!)&#10;Access key: S"> Time u<u>n</u>til:
   <input type="time" name="time_end" value="00:00" accesskey="s" required></label>
  </p>
  
<!--
  <p>
   <input type="checkbox" name="holiday" id="holiday" accesskey="t">
   <label for="holiday" title="Recurring (Optional)&#10;A fixed day in the year for holidays, birthdays, etc.&#10;Access key: k">Recurri<u>n</u>g</label>
  </p>
-->  

  <p>
   <label title="Color (Optional)&#10;Mark the event with a specific color.&#10;Access key: F"><u>C</u>olor:
   <input type="color" name="color" value="#D5E8FB" list="colors" accesskey="f"></label>
   ' . COLOR_PALETTE . '&nbsp;
   <input type="checkbox" name="private" id="private" accesskey="p">
   <label for="private" title="Private event (Optional)&#10;This event will only be shown after login.&#10;Access key: P"><u>P</u>rivate</label>&nbsp;
   <input type="checkbox" name="notification" id="notification" accesskey="n">
   <label for="notification" title="Notification (Optional)&#10;Send a notification via email.&#10;Access key: N"><u>N</u>otification</label>
  </p>

  <p>
   <label for="description" title="Description (Optional)&#10;Access key: B"><u>D</u>escription:</label> 
   ' . BBCODE . '<br>
   <textarea name="description" id="description" placeholder="Description (Optional)" accesskey="b"></textarea>
  </p>

  <p class="paragraph">
   <input type="hidden" name="action" value="add">
   <button type="button" id="submit" accesskey="e" title="Add event&#10;Access key: E"><u>A</u>dd</button>
  </p>
  ' . FORM_;
}

// Show / edit event
if (isset($_GET["edit"])) {

    $select = $db->prepare("SELECT `id`, `event`, `description`, `color`, `private`,`holiday`, `notification`, `date_today`, `date_begin`, `date_end`, `time_begin`, `time_end`
                            FROM `calendar`
                            WHERE `id` = :id");

    $select->execute([':id' => $_GET["id"]]);
    $event = $select->fetch();

    // Date and time
    sscanf($event["date_today"], "%4s-%2s-%2s", $dbYearToday, $dbMonthToday, $dbDayToday);
    sscanf($event["date_end"], "%4s-%2s-%2s", $dbYearEnd, $dbMonthEnd, $dbDayEnd);
    sscanf($event["date_begin"], "%4s-%2s-%2s", $dbYearBegin, $dbMonthBegin, $dbDayBegin);
    sscanf($event["time_begin"], "%5s", $dbTimeBegin);
    sscanf($event["time_end"], "%5s", $dbTimeEnd);

    $date_today = shortDate($dbDayToday, $dbMonthToday, $dbYearToday);
    $start_date = shortDate($dbDayBegin, $dbMonthBegin, $dbYearBegin);
    $end_date = shortDate($dbDayEnd, $dbMonthEnd, $dbYearEnd);

    $start_time = $dbTimeBegin . ' Time';
    $end_time = $dbTimeEnd . ' Time';

    //$end_time = ($event["time"] == '00:00') ? '' : ' - ' . $event["time"];
    //$time = ($dbTime != '00:00') ? '<br> ' . $dbTime . $end_time . ' Time' : '';
    // Text color depending on background color
    $textColor = blackOrWhite($event["color"]);

    // Set checkbox values
    $cxHoliday = $event["holiday"] == 1 ? ' checked' : '';
    $cxPrivate = $event["private"] == 1 ? ' checked' : '';
    $cxNotification = $event["notification"] == 1 ? ' checked' : '';

    echo FORM . '
  <div id="headline">
  ' . $start_date . ' - ' . $start_time . '<br> 
  until<br> 
  ' . $end_date . ' - ' . $end_time . '
  </div>

  <p>
  <div id="event-text" class="event" data-color="' . $event["color"] . '|' . $textColor . '">' . $event["event"] . '</div>
  </p>' .
    (!empty($event["description"]) ? '<div id="description">' . textFormatting($event["description"]) . '</div>' : '');

    // Edit event by the user
    if (USER) {

        echo '<details>
  <summary accesskey="r" title="Edit event&#10;Access key: R">Edit <u>e</u>vent</summary>

  <p>
   <label title="Event (Required) - ID: ' . $event["id"] . '&#10;Access key: E"><u>E</u>vent:
   <input type="text" name="event" value="' . $event["event"] . '" maxlength="50" placeholder="Enter event" class="event-field" accesskey="e" required></label>
  </p>

  <p>
   <label title="Date (Required)&#10;Access key: D"><u>D</u>ate:
   <input type="date" name="date_today" value="' . $dbYearToday . '-' . $dbMonthToday . '-' . $dbDayToday . '" min="0001-01-01" max="2500-01-01" accesskey="d" required></label>&emsp;
   <input type="checkbox" name="holiday" id="holiday"' . $cxHoliday . ' accesskey="t">
   <label for="holiday" title="Holiday (Optional)&#10;A fixed day in the year for holidays, birthdays, etc.&#10;Access key: T">Holida<u>y</u></label>
  </p>

  <p>
   <label title="Time (Optional, must not be empty!)&#10;Set: &#34;00:00&#34; for an all-day event.&#10;Access key: U"><u>T</u>ime:
   <input type="time" name="time_begin" value="' . $dbTimeBegin . '" accesskey="u" required></label>&emsp;
   <label title="Time until (Optional, must not be empty!)&#10;Access key: S"> u<u>n</u>til:
   <input type="time" name="time_end" value="' . $event["time_end"] . '" accesskey="s" required></label>
  </p>

  <p>
   <label title="Color (Optional)&#10;Mark the event with a specific color.&#10;Access key: F"><u>C</u>olor:
   <input type="color" name="color" value="' . $event["color"] . '" list="colors" accesskey="f"></label>
   ' . COLOR_PALETTE . '&nbsp;
   <input type="checkbox" name="private" id="private"' . $cxPrivate . ' accesskey="p">
   <label for="private" title="Private event (Optional)&#10;This event will only be shown after login.&#10;Access key: P"><u>P</u>rivate</label>&nbsp;
   <input type="checkbox" name="notification" id="notification"' . $cxNotification . ' accesskey="n">
   <label for="notification" title="Notification (Optional)&#10;Send a notification via email.&#10;Access key: N"><u>N</u>otification</label>
  </p>

  <p>
   <label for="description" title="Description (Optional)&#10;Access key: B"><u>D</u>escription:</label>
  ' . BBCODE . '<br>
   <textarea name="description" id="description" placeholder="Description (Optional)" accesskey="b">' . $event["description"] . '</textarea>
  </p>

  <p>
   <input type="checkbox" name="copy" id="copy" accesskey="k">
   <label for="copy" id="copy" title="Copy event (Optional)&#10;Copy the event to the selected date.&#10;Access key: K">Copy e<u>v</u>ent</label> &emsp;
   <input type="checkbox" name="delete" id="delete" accesskey="l">
   <label for="delete" id="delete" title="Delete event (Optional)&#10;Deleting the event cannot be undone and requires confirmation.&#10;Access key: L">Delete e<u>v</u>ent</label>
  </p>

  <p class="paragraph">
   <input type="hidden" name="id" value="' . $_GET["id"] . '">
   <input type="hidden" name="action" value="edit">
   <button type="button" id="submit" accesskey="a" title="Apply changes&#10;Access key: A"><u>A</u>pply</button>
  </p>
  </details>';
    }

    echo FORM_;
}

// Select calendar
if (isset($_GET["calendarSelect"])) {

    // Dropdown list for the month
    $selectMonth = PHP_EOL . '  <select name="month" id="selMonth" autofocus accesskey="m">' . PHP_EOL;
    foreach (MONTHS as $monthNumber => $month) {
        $selectMonth .= '   <option value="' . $monthNumber . '"' . ($monthNumber == $_GET["month"] ? ' selected' : '') . '>' . $monthNumber . ' - ' . $month . '</option>' . PHP_EOL;
    }
    $selectMonth .= '  </select>';

    // Dropdown list for the year
    $_GET["year"] = ($_GET["year"] < 1 || $_GET["year"] > 2500) ? date_format($current, "Y") : $_GET["year"];
    $years = range($_GET["year"] - 100, $_GET["year"] + 100);
    $selectYear = PHP_EOL . '  <select name="year" id="selYear" accesskey="j">' . PHP_EOL;
    foreach ($years as $year) {
        $selectYear .= '   <option value="' . $year . '"' . ($year == $_GET["year"] ? ' selected' : '') . '>' . $year . '</option>' . PHP_EOL;
    }
    $selectYear .= '  </select>';

    echo FORM . '
  <div id="headline">Select Calendar</div>

  <p class="paragraph">
   <label title="Select month&#10;For example, scroll with the mouse wheel.&#10;Access key: M"><u>M</u>onth: 
   ' . $selectMonth . '</label>&emsp;
   <label title="Select year&#10;For example, scroll with the mouse wheel.&#10;Access key: J"><u>J</u>ear:
    ' . $selectYear . '</label>
  </p>

  <p class="paragraph">
   <input type="hidden" name="action" value="calendar">
   <button type="button" id="submit" accesskey="a" title="Show calendar&#10;Access key: A"><u>S</u>how</button>
  </p>
  ' . FORM_;
}

// Login
if (isset($_GET["login"])) {

    echo FORM;

    if (!USER) {
        echo '
  <div id="headline">Login</div>

  <p>
   <label><u>N</u>ame:<br>
   <input type="text" name="name" autocomplete="username" accesskey="n" required></label>
  </p>

  <p>
   <label><u>P</u>assword:<br>
   <input type="password" name="password" autocomplete="current-password" accesskey="p" required></label>
  </p>

  <p class="paragraph">
   <input type="hidden" name="action" value="login">
   <button type="button" id="submit" accesskey="a" autofocus title="Login&#10;Access key: A"><u>L</u>ogin</button>
  </p>
  ';
    } else {

        // Logout
        echo '
  <div id="headline">Logout</div>

  <p class="paragraph">
  <em>' . htmlspecialchars($_SESSION["name"]) . '</em>, are you sure you want to log out?
  </p>

  <p class="paragraph">
   <input type="hidden" name="action" value="logout">
   <button type="button" id="submit" accesskey="a" autofocus title="Logout&#10;Access key: A"><u>L</u>ogout</button>
  </p>
  ';
    }

    echo '<input type="hidden" name="year" value="' . $_GET["year"] . '"> <input type="hidden" name="month" value="' . $_GET["month"] . '">' . FORM_;
}

// Form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Set checkbox values
    $holiday = isset($_POST["holiday"]) ? 1 : 0;
    $notification = isset($_POST["notification"]) ? 1 : 0;
    $private = isset($_POST["private"]) ? 1 : 0;

    // Add entry
    if ($_POST["action"] == "add" && USER) {

        $startDate = strtotime($_POST["date_begin"]);
        $endDate = strtotime($_POST["date_end"]);
        $datediff = round(($endDate - $startDate) / (60 * 60 * 24));
        $nextDay = $_POST["date_begin"];

        $add = $db->prepare("INSERT INTO `calendar` (`groupid`, `event`, `description`, `color`, `private`, `holiday`, `notification`, `date_today`, `date_begin`, `date_end`, `time_begin`, `time_end`)
                               VALUES (:groupid, :event, :description, :color, :private, :holiday, :notification, :date_today, :date_begin, :date_end, :time_begin, :time_end)");

        for ($i = 0; $i <= $datediff; $i++) {
            $add->execute([
                ':groupid' => $startDate,
                ':event' => $_POST["event"],
                ':description' => $_POST["description"],
                ':color' => $_POST["color"],
                ':private' => $private,
                ':holiday' => $holiday,
                ':notification' => $notification,
                ':date_today' => $nextDay,
                ':date_begin' => $_POST["date_begin"],
                ':date_end' => $_POST["date_end"],
                ':time_begin' => $_POST["time_begin"],
                ':time_end' => $_POST["time_end"],
            ]);

            $nextDay = date('Y-m-d', strtotime($nextDay . " +1 days"));

            list($_POST["year"], $_POST["month"]) = explode("-", $nextDay);
        }
    }

    // Edit entry
    if ($_POST["action"] == "edit" && USER) {

        // Copy
        if (isset($_POST["copy"])) {

            $copy = $db->prepare("INSERT INTO `calendar` (`event`, `description`, `color`, `private`, `holiday`, `notification`, `date_today`, `end_date`, `time_today`, `end_time`)
                                VALUES (:event, :description, :color, :private, :holiday, :notification, :date_today, :end_date, :time_today, :end_time)");
            $copy->execute([
                ':event' => $_POST["event"],
                ':description' => $_POST["description"],
                ':color' => $_POST["color"],
                ':private' => $private,
                ':holiday' => $holiday,
                ':notification' => $notification,
                ':date_today' => $_POST["date_today"],
                ':date_end' => $_POST["end_date"]
            ]);
        } else {

            // Delete
            if (isset($_POST["delete"])) {

                $delete = $db->prepare("DELETE FROM `calendar` WHERE `id` = :id");
                $delete->execute([':id' => $_POST["id"]]);
            } else {

                // Update
                $update = $db->prepare("UPDATE `calendar`
                                       SET `event` = :event, `description` = :description, `color` = :color, `private` = :private,
                                           `holiday` = :holiday, `notification` = :notification, `date_today` = :date_today, `date_end` = :date_end, `time_end` = :time_end, `time_begin` = :time_begin
                                       WHERE `id` = :id");
                $update->execute([
                    ':event' => $_POST["event"],
                    ':description' => $_POST["description"],
                    ':color' => $_POST["color"],
                    ':private' => $private,
                    ':holiday' => $holiday,
                    ':notification' => $notification,
                    ':date_today' => $_POST["date_today"] . " " . $_POST["time_begin"],
                    ':time_today' => $_POST["time_begin"],
                    ':start_time' => $_POST["time_begin"],
                    ':end_time' => $_POST["time_end"],
                    ':id' => $_POST["id"]
                ]);
            }
        }

        list($_POST["year"], $_POST["month"]) = explode("-", $_POST["date_today"]);
    }

    // Login
    if ($_POST["action"] == "login") {
        if (
                isset($NAME_PASS[$_POST["name"]]) &&
                $NAME_PASS[$_POST["name"]] == $_POST["password"]
        ) {
            // Add session variable (user)
            $_SESSION["name"] = $_POST["name"];
        }
    }

    // Logout
    if ($_POST["action"] == "logout" && USER) {

        session_destroy();
    }

    // Return to JavaScript
    echo $_POST["year"] . "|" . floor($_POST["month"]);
}

/*
 * Send notifications via email
 */
if (isset($_GET["cron"])) {

    $select = $db->query("SELECT `event`, `description`, STRFTIME('%d.%m.%Y, %H:%M', date_today) AS DateFormat
                        FROM `calendar`
                        WHERE DATE(`date_today`) = DATE('now','+1 day')
                        AND `notification` = 1
                        ORDER BY `_today` ASC");
    $events = $select->fetchAll();

    // Collect events
    $notification = "";
    foreach ($events as $event) {
        $notification .= $event["DateFormat"] . ' Time' . PHP_EOL .
                $event["event"] . PHP_EOL . stripBBCode($event["description"]) . PHP_EOL . PHP_EOL;
    }

    // Send email
    if (!empty($notification)) {

        // Use PHP-Mailer or Swift-Mailer to send emails!
        mb_internal_encoding("UTF-8");
        $subject = mb_encode_mimeheader("Event Calendar", "UTF-8", "Q");
        $header = "From: " . mb_encode_mimeheader('"' . $_SERVER["HTTP_HOST"] . '"', "UTF-8", "Q") .
                " <$EMAIL>" . "\nMIME-Version: 1.0;\nContent-Type: text/plain; charset=UTF-8;\n";
        mail($EMAIL, $subject, $notification, $header);
    }
}

/*
 * Functions
 */

// Formatted date
function shortDate(string $day, string $month, string $year): string {

    return $day . '.' . $month . '.' . $year;
}

function customDate(string $day, string $month, string $year): string {

    return weekday($day, $month, $year) . ', ' . $day . ' ' . MONTHS[(int) $month] . ' ' . $year;
}

// Week (ISO: 8601)
function week(string $day, string $month, string $year): int {

    return date_format(date_create($year . "-" . $month . "-" . $day . " 00:00:00"), "W");
}

// Weekday
function weekday(string $day, string $month, string $year): string {

    $wd = date_format(date_create($year . "-" . $month . "-" . $day . " 00:00:00"), "N");
    return WEEKDAYS[$wd];
}

// Quarter
function quarter(int $month): int {

    return (int) (($month - 1) / 3) + 1;
}

// Text color depending on background color
function blackOrWhite(string $color): string {

    sscanf(substr($color, 1, 6), "%2s%2s%2s", $r, $g, $b);
    return ((hexdec($r) . hexdec($g) . hexdec($b)) <= "160160160") ? "#FFFFFF" : "#000000";
}

// BBCode - Text formatting
function textFormatting(string $text): string {

    $text = htmlspecialchars($text, ENT_HTML5 | ENT_QUOTES);
    $text = preg_replace_callback('#(( |^)(((http|https|)://)|www.)\S+)#mi', 'convertLink', $text); // Convert link
    $text = preg_replace('/\[b\](.*)\[\/b\]/Uism', '<b>$1</b>', $text); // [b] (bold)
    $text = preg_replace('/\[i\](.*)\[\/i\]/Uism', '<i>$1</i>', $text); // [i] (italic)
    $text = preg_replace('/\[s\](.*)\[\/s\]/Uism', '<s>$1</s>', $text); // [s] (strikethrough)
    $text = preg_replace('/\[q\](.*)\[\/q\]/Uism', '<q>$1</q>', $text); // [q] (quote)
    $text = preg_replace('/\[u\](.*)\[\/u\]/Uism', '<u>$1</u>', $text); // [u] (underlined)
    $text = preg_replace('/\[c=(.*)\](.*)\[\/c\]/Uism', '<span style=\'color:$1\'>$2</span>', $text); // [c=#FF0000] [c=green]
    $text = preg_replace('/\[bc=(.*)\](.*)\[\/bc\]/Uism', '<span style=\'background:$1\'>$2</span>', $text); // [bc=#FF0000] [bc=green]
    $text = preg_replace('/\[z\](.*)\[\/z\]/Uism', '<div style="text-align:center;">$1</div>', $text); // [z] (centered)
    $text = preg_replace('/\[g=(.*)\](.*)\[\/g\]/Uism', '<figure><img src="$1" alt="$2"><figcaption>$2</figcaption></figure>', $text); // [g=url] (image path)
    $text = preg_replace('/\[a=(.*)\](.*)\[\/a\]/Uism', '<figure><audio controls><source src="$1"></audio><figcaption>$2</figcaption></figure>', $text); // [a=url] (audio file)
    $text = preg_replace('/\[v=(.*)\](.*)\[\/v\]/Uism', '<figure><video controls><source src="$1"></video><figcaption>$2</figcaption></figure>', $text); // [v=url] (video file)
    return nl2br($text, true);
}

// Remove BBCode
function stripBBCode(string $text): string {

    return preg_replace('|[[\/\!]*?[^\[\]]*?]|si', '', $text);
}

// Convert link
function convertLink(array $hit): string {

    $url = trim($hit[1]);
    return ' <a href="' . $url . '" target="_blank" rel="noopener" class="link">' . $url . '</a>';
}
