/*
 *  Event Calendar (SQLite) - javascript.js (utf-8)
 * by Werner Zenk
 */

"use strict";
const zcalendar = `https://raw.githubusercontent.com/c3rebro/webcalendar/refs/heads/master/webcalendar.php`;
const today = new Date();

// Call calendar after the page loads
window.addEventListener(
        "DOMContentLoaded",
        () => {
            if (document.getElementById("zenk-calendar")) {
                document.getElementById("zenk-calendar").textContent = `Loading calendar ...`;
                showCalendar(today.getFullYear(), today.getMonth() + 1);

                // Keyboard instructions (passive: false!)
                window.addEventListener("keydown", keyboardInstructions);
                window.addEventListener("resize", windowPosition);
            }
        },
        {passive: true}
);

// Show calendar
const showCalendar = (year, month, lang) => {
    // Switch month and year
    year = parseInt(year);
    month = parseInt(month);
    year = month < 1 ? (year -= 1) : month > 12 ? (year += 1) : year;
    month = month < 1 ? 12 : month > 12 ? 1 : month;

    // Send request
    fetch(`${zcalendar}?calendar&year=${year}&month=${month}`, {
        method: "GET",
    })
            .then((response) => {
                return response.text();
            })
            .then((response) => {
                document.getElementById("zenk-calendar").innerHTML = response;

                // Show month image
                if (document.getElementById("month-image")) {
                    var mb = document.getElementById("month-image").dataset.imageName;
                    document.getElementById("month-image").style = `background: url(${mb})`;
                }

                // Register event listeners (Navigation)
                document.getElementById("monthMinus").addEventListener("click", () => {
                    month--;
                    showCalendar(year, month);
                });

                document.getElementById("monthPlus").addEventListener("click", () => {
                    month++;
                    showCalendar(year, month);
                });

                document.getElementById("calendarCurrent").addEventListener("click", () => {
                    showCalendar(today.getFullYear(), today.getMonth() + 1);
                });

                document.getElementById("yearMinus").addEventListener("click", () => {
                    year--;
                    showCalendar(year, month);
                });

                document.getElementById("yearPlus").addEventListener("click", () => {
                    year++;
                    showCalendar(year, month);
                });

                // Month days
                let days = document.querySelectorAll(".day");
                days.forEach((day) => {
                    day.addEventListener("click", (e) => {
                        let parts = e.target.dataset.monthDay.split("-");
                        showForm("add", parts[2], parts[1], parts[0]);
                    });
                });

                // Events
                let events = document.querySelectorAll(".event");
                events.forEach((event) => {
                    // Color the event
                    let parts = event.dataset.color.split("|");
                    event.style = `background: ${parts[0]}; color: ${parts[1]};`;
                    event.addEventListener("click", (e) => {
                        showForm("edit", 0, 0, 0, e.target.dataset.event);
                    });
                });

                // Select calendar
                let elems = document.querySelectorAll("#month,#year,#calendarSelect");
                elems.forEach((elem) => {
                    document.getElementById(elem.id).addEventListener("click", () => {
                        showForm(
                                "calendarSelect",
                                1,
                                document.getElementById("month").dataset.month,
                                document.getElementById("year").dataset.year
                                );
                    });
                });

                // Login and logout
                if (document.getElementById("log")) {
                    document.getElementById("log").addEventListener("click", () => {
                        showForm("login", 1, month, year);
                    });
                }
                
                // Hide week numbers
                document.getElementById("showWeekNrSelect").addEventListener("click", showWeekNumbers);
                let weeks = document.querySelectorAll(".week");
                weeks.forEach((week) => {
                    week.classList.add("showWeek");
                });
            });
};

// Show form
const showForm = (form, day, month, year, id = 0) => {
    // Set active event
    activeEvent(id);

    // Send request
    fetch(`${zcalendar}?${form}&day=${day}&month=${month}&year=${year}&id=${id}`, {
        method: "GET",
    })
            .then((response) => {
                return response.text();
            })
            .then((response) => {
                output(response);
            });         
};

// Output
const output = (response) => {
    if (response.indexOf("|") == 4 && response.length <= 7) {
        // Show calendar
        let parts = response.split("|");
        showCalendar(parts[0], parts[1]);
    } else {
        // Create window
        document.getElementById("zenk-calendar").appendChild(document.createElement("div")).setAttribute("id", "display");
        document.getElementById("display").innerHTML = response;

        // Window position and move window
        windowPosition();
        moveWindow("#form", "#title");

        // Color the event
        if (document.getElementById("eventText")) {
            let parts = document.getElementById("eventText").dataset.color.split("|");
            document.getElementById("eventText").style = `background: ${parts[0]}; color: ${parts[1]};`;
        }

        // Register event listeners
        if (document.getElementById("close")) {
            document.getElementById("close").addEventListener("click", () => {
                document.getElementById("display").remove();
                activeEvent();
            });
        }

        // Scroll dropdown list when turning the mouse wheel
        if (document.getElementById("selMonth")) {
            document.getElementById("selMonth").addEventListener("wheel", changeDropdownList, {passive: false});
            document.getElementById("selYear").addEventListener("wheel", changeDropdownList, {passive: false});
        }

        // Send form
        if (document.getElementById("submit")) {
            document.getElementById("submit").addEventListener("click", () => {
                // Check form (required fields)
                if (document.getElementById("form").reportValidity()) {
                    // Submit form
                    fetch(`${zcalendar}`, {
                        method: "POST",
                        body: new FormData(document.getElementById("form")),
                    })
                            .then((response) => {
                                return response.text();
                            })
                            .then((response) => {
                                output(response);
                            });
                }
            });
        }
        
                // Send form
        if (document.getElementById("export-ics")) {
            document.getElementById("export-ics").addEventListener("click", () => {
                // Check form (required fields)
                fetch(`${zcalendar}`, {
                        method: "POST",
                        body: new FormData(document.getElementById("form")),
                    })
                            .then((response) => {
                                return response.blob();
                            })
                            .then(blob => {
                                const url = window.URL.createObjectURL(blob);
                                const a = document.createElement('a');
                                a.style.display = 'none';
                                a.href = url;
                                a.download = 'event.ics';
                                document.body.appendChild(a);
                                a.click();
                                window.URL.revokeObjectURL(url);
                            })
                            .catch(error => console.error('Error:', error));
            });
        }
        
    }
};

// Keyboard instructions
// https://developer.mozilla.org/en-US/docs/Web/API/KeyboardEvent
// https://omatsuri.app/events-keycode
const keyboardInstructions = (e) => {
    // Prevent keyboard instructions for forms
    if (!document.getElementsByTagName("form")[0]) {
        let month = document.getElementById("month").dataset.month;
        let year = document.getElementById("year").dataset.year;

        // [CTRL] + [Arrow Right] One month forward
        if (e.getModifierState("Control") && e.code === "ArrowRight") {
            document.getElementById("monthPlus").click();
        }

        // [CTRL] + [Arrow Left] One month back
        if (e.getModifierState("Control") && e.code === "ArrowLeft") {
            document.getElementById("monthMinus").click();
        }

        // [CTRL] + [Arrow Up] One year forward
        if (e.getModifierState("Control") && e.code === "ArrowUp") {
            e.preventDefault();
            document.getElementById("yearPlus").click();
        }

        // [CTRL] + [Arrow Down] One year back
        if (e.getModifierState("Control") && e.code === "ArrowDown") {
            e.preventDefault();
            document.getElementById("yearMinus").click();
        }

        // [A] Login/Logout
        if (e.code === "KeyA") {
            showForm("login", 1, month, year);
        }

        // [D] Print
        if (e.code === "KeyD") {
            self.print();
        }

        // [K] Select calendar
        if (e.code === "KeyK") {
            showForm("calendar", 1, month, year);
        }

        // [N] Add new event
        if (e.code === "KeyN") {
            document.getElementById("log").textContent == "Logout"
                    ? showForm("add", today.getDate(), today.getMonth(), today.getFullYear())
                    : showForm("login", 1, month, year);
        }

        // [O] Scroll to calendar
        if (e.code === "KeyO") {
            document.getElementById("zenk-calendar").scrollIntoView({
                behavior: "smooth",
                block: "start",
            });
        }

        // [W] Show week numbers
        if (e.code === "KeyW") {
            showWeekNumbers();
        }

        // [X] Current calendar
        if (e.code === "KeyX") {
            showCalendar(today.getFullYear(), today.getMonth() + 1);
        }
    }

    // [ESC] Close display
    if (e.code === "Escape") {
        if (document.getElementById("display")) {
            document.getElementById("display").remove();
            activeEvent();
        }
    }
};

// Show week numbers
const showWeekNumbers = () => {
    let weeks = document.querySelectorAll(".week");
    weeks.forEach((week) => {
        week.classList.toggle("showWeek");
    });
};

// Change the dropdown list when turning the mouse wheel
const changeDropdownList = (e) => {
    e.preventDefault();
    let id = e.target.id;
    let va = Math.floor(e.deltaY);
    let le = document.getElementById(id).length - 1;
    let si = Number(document.getElementById(id).selectedIndex);
    si = va >= 0 ? si : (si -= 1);
    si = va <= 0 ? si : (si += 1);
    si = si > 0 ? si : (si = 0);
    si = si < le ? si : (si = le);
    document.getElementById(id).selectedIndex = si;
};

// Active event
const activeEvent = (id = 0) => {
    if (document.getElementsByClassName("active-event")[0]) {
        document.getElementsByClassName("active-event")[0].classList.remove("active-event");
    }
    if (id != 0) {
        document.querySelector(`[data-event="${id}"]`).classList.add("active-event");
}
};

// Show window centered
const windowPosition = () => {
    var form = document.getElementById("form");
    var table = document.getElementById("table");
    if (form) {
        let width = form.offsetWidth / 2 - 8;
        let left = table.offsetWidth / 2 - width;
        let height = form.offsetHeight / 3;
        let top = table.offsetTop + height / 2;
        form.style = `left: ${left}px; top: ${top}px;`;
    }
};

// Move window
// https://blog.pliszko.com/2021-04-10-draggable-elements-in-javascript-without-external-libraries/
const moveWindow = (elementSelector, handleSelector) => {
    const elements = document.querySelectorAll(elementSelector);

    const getCursorPositionFromEvent = (e) => {
        if (e.touches && e.touches.length > 0) {
            return {
                x: e.touches[0].clientX,
                y: e.touches[0].clientY,
            };
        } else {
            return {
                x: e.clientX,
                y: e.clientY,
            };
        }
    };

    for (let element of elements) {
        let handle;
        if (handleSelector) {
            handle = element.querySelector(handleSelector);
        }

        element.style.position = "absolute";
        let cursorPositionX = 0;
        let cursorPositionY = 0;
        const start = (e) => {
            e.preventDefault();

            // Get cursor position
            const cursorPosition = getCursorPositionFromEvent(e);
            cursorPositionX = cursorPosition.x;
            cursorPositionY = cursorPosition.y;

            document.addEventListener("mousemove", dragging);
            document.addEventListener("touchmove", dragging);

            document.addEventListener("mouseup", stop);
            document.addEventListener("touchend", stop);
            document.addEventListener("touchcancel", stop);
        };

        const dragging = (e) => {
            // Get new cursor position
            const cursorPosition = getCursorPositionFromEvent(e);

            // Calculate position change
            const positionChangeX = cursorPositionX - cursorPosition.x;
            const positionChangeY = cursorPositionY - cursorPosition.y;

            // Save cursor position
            cursorPositionX = cursorPosition.x;
            cursorPositionY = cursorPosition.y;

            // Set new position of the element
            element.style = `left: ${element.offsetLeft - positionChangeX}px;
       top: ${element.offsetTop - positionChangeY}px`;
        };

        const stop = () => {
            document.removeEventListener("mousemove", dragging);
            document.removeEventListener("touchmove", dragging);

            document.removeEventListener("mouseup", stop);
            document.removeEventListener("touchend", stop);
            document.removeEventListener("touchcancel", stop);
        };

        if (handleSelector && handle) {
            handle.addEventListener("mousedown", start);
            handle.addEventListener("touchstart", start, {passive: false});
        } else {
            element.addEventListener("mousedown", start);
            element.addEventListener("touchstart", start);
        }
    }
};

// export to ics function. created from chatgpt 4
const exportToICS = (eventId) => {
    const formData = new FormData();
    formData.append('export_ics', true);
    formData.append('event_id', eventId);

    fetch(`${zcalendar}`, {
        method: "POST",
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.blob();
    })
    .then(response => response.blob())
    .then(blob => {
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.style.display = 'none';
        a.href = url;
        a.download = 'event.ics';
        document.body.appendChild(a);
        a.click();
        window.URL.revokeObjectURL(url);
    })
    .catch(error => console.error('Error:', error));
};
