/*
 *  Event-Kalender (SQLite) - javascript.js (utf-8)
 * von Werner Zenk
 */

"use strict";
const kalender = `..//..//webcalendar//calendar.php`;
const heute = new Date();

// Kalender nach dem laden der Seite aufrufen
window.addEventListener(
  "DOMContentLoaded",
  () => {
    document.getElementById("kalender").textContent = `Kalender wird geladen ...`;
    zeigeKalender(heute.getFullYear(), heute.getMonth() + 1);

    // Tastaturanweisungen (passive: false!)
    window.addEventListener("keydown", tastaturAnweisungen);
    window.addEventListener("resize", fensterPosition);
  },
  { passive: true }
);

// Kalender anzeigen
const zeigeKalender = (jahr, monat) => {
  // Monat und Jahr weiterschalten
  jahr = parseInt(jahr);
  monat = parseInt(monat);
  jahr = monat < 1 ? (jahr -= 1) : monat > 12 ? (jahr += 1) : jahr;
  monat = monat < 1 ? 12 : monat > 12 ? 1 : monat;

  // Anfrage senden
  fetch(`${kalender}?kalender&jahr=${jahr}&monat=${monat}`, {
    method: "GET",
  })
    .then((antwort) => {
      return antwort.text();
    })
    .then((antwort) => {
      document.getElementById("kalender").innerHTML = antwort;

      // Monatsbild anzeigen
      if (document.getElementById("monatsbild")) {
        var mb = document.getElementById("monatsbild").dataset.bildname;
        document.getElementById("monatsbild").style = `background: url(${mb})`;
      }

      // Eventlistener registrieren (Navigation)
      document.getElementById("monatMinus").addEventListener("click", () => {
        monat--;
        zeigeKalender(jahr, monat);
      });

      document.getElementById("monatPlus").addEventListener("click", () => {
        monat++;
        zeigeKalender(jahr, monat);
      });

      document.getElementById("kalenderAktuell").addEventListener("click", () => {
        zeigeKalender(heute.getFullYear(), heute.getMonth() + 1);
      });

      document.getElementById("jahrMinus").addEventListener("click", () => {
        jahr--;
        zeigeKalender(jahr, monat);
      });

      document.getElementById("jahrPlus").addEventListener("click", () => {
        jahr++;
        zeigeKalender(jahr, monat);
      });

      // Monatstage
      let tage = document.querySelectorAll(".tag");
      tage.forEach((tag) => {
        tag.addEventListener("click", (e) => {
          let teil = e.target.dataset.monatstag.split("-");
          zeigeFormular("eintragen", teil[2], teil[1], teil[0]);
        });
      });

      // Events
      let evts = document.querySelectorAll(".event");
      evts.forEach((evt) => {
        // Event einfärben
        let teil = evt.dataset.farbe.split("|");
        evt.style = `background: ${teil[0]}; color: ${teil[1]};`;
        evt.addEventListener("click", (e) => {
          zeigeFormular("bearbeiten", 0, 0, 0, e.target.dataset.event);
        });
      });

      // Kalender auswählen
      let elem = document.querySelectorAll("#monat,#jahr,#calendar");
      elem.forEach((ele) => {
        document.getElementById(ele.id).addEventListener("click", () => {
          zeigeFormular(
            "calendar",
            1,
            document.getElementById("monat").dataset.monat,
            document.getElementById("jahr").dataset.jahr
          );
        });
      });

      // An.- und Abmeldung
      if (document.getElementById("log")) {
        document.getElementById("log").addEventListener("click", () => {
          zeigeFormular("anmeldung", 1, monat, jahr);
        });
      }

      // Wochennummern ausblenden
      document.getElementById("wochennr").addEventListener("click", zeigeWochennummern);
      let wochen = document.querySelectorAll(".woche");
      wochen.forEach((woche) => {
        woche.classList.add("zeigeWoche");
      });
    });
};

// Formular anzeigen
const zeigeFormular = (form, tag, monat, jahr, id = 0) => {
  // Aktiven Event setzen
  aktivEvent(id);

  // Anfrage senden
  fetch(`${kalender}?${form}&tag=${tag}&monat=${monat}&jahr=${jahr}&id=${id}`, {
    method: "GET",
  })
    .then((antwort) => {
      return antwort.text();
    })
    .then((antwort) => {
      ausgabe(antwort);
    });
};

// Ausgabe
const ausgabe = (antwort) => {
  if (antwort.indexOf("|") == 4 && antwort.length <= 7) {
    // Kalender anzeigen
    let teil = antwort.split("|");
    zeigeKalender(teil[0], teil[1]);
  } else {
    // Fenster erstellen
    document.getElementById("kalender").appendChild(document.createElement("div")).setAttribute("id", "anzeige");
    document.getElementById("anzeige").innerHTML = antwort;

    // Fenster Position und Fenster bewegen
    fensterPosition();
    fensterBewegen("#form", "#titel");

    // Event einfärben
    if (document.getElementById("eventtext")) {
      let teil = document.getElementById("eventtext").dataset.farbe.split("|");
      document.getElementById("eventtext").style = `background: ${teil[0]}; color: ${teil[1]};`;
    }

    // Eventlistener registrieren
    if (document.getElementById("schliessen")) {
      document.getElementById("schliessen").addEventListener("click", () => {
        document.getElementById("anzeige").remove();
        aktivEvent();
      });
    }

    // Auswahlliste scrollen beim drehen mit dem Mausrad
    if (document.getElementById("selMonat")) {
      document.getElementById("selMonat").addEventListener("wheel", auswahllisteAendern, { passive: false });
      document.getElementById("selJahr").addEventListener("wheel", auswahllisteAendern, { passive: false });
    }

    // Formular senden
    if (document.getElementById("absenden")) {
      document.getElementById("absenden").addEventListener("click", () => {
        // Formular (Pflichtfelder) überprüfen
        if (document.getElementById("form").reportValidity()) {
          // Formular absenden
          fetch(`${kalender}`, {
            method: "POST",
            body: new FormData(document.getElementById("form")),
          })
            .then((antwort) => {
              return antwort.text();
            })
            .then((antwort) => {
              ausgabe(antwort);
            });
        }
      });
    }
  }
};

// Tastaturanweisungen
// https://developer.mozilla.org/en-US/docs/Web/API/KeyboardEvent
// https://omatsuri.app/events-keycode
const tastaturAnweisungen = (e) => {
  // Tastaturanweisungen bei Formularen verhindern
  if (!document.getElementsByTagName("form")[0]) {
    let monat = document.getElementById("monat").dataset.monat;
    let jahr = document.getElementById("jahr").dataset.jahr;

    // [STRG] + [Pfeil Rechts] Einen Monat weiter
    if (e.getModifierState("Control") && e.code === "ArrowRight") {
      document.getElementById("monatPlus").click();
    }

    // [STRG] + [Pfeil Links] Einen Monat zurück
    if (e.getModifierState("Control") && e.code === "ArrowLeft") {
      document.getElementById("monatMinus").click();
    }

    // [STRG] + [Pfeil Auf] Ein Jahr weiter
    if (e.getModifierState("Control") && e.code === "ArrowUp") {
      e.preventDefault();
      document.getElementById("jahrPlus").click();
    }

    // [STRG] + [Pfeil Ab] Ein Jahr zurück
    if (e.getModifierState("Control") && e.code === "ArrowDown") {
      e.preventDefault();
      document.getElementById("jahrMinus").click();
    }

    // [A] Anmeldung/Abmeldung
    if (e.code === "KeyA") {
      zeigeFormular("anmeldung", 1, monat, jahr);
    }

    // [D] Drucken
    if (e.code === "KeyD") {
      self.print();
    }

    // [K] Kalender auswählen
    if (e.code === "KeyK") {
      zeigeFormular("calendar", 1, monat, jahr);
    }

    // [N] Neuen Event eintragen
    if (e.code === "KeyN") {
      document.getElementById("log").textContent == "Abmelden"
        ? zeigeFormular("eintragen", heute.getDate(), heute.getMonth(), heute.getFullYear())
        : zeigeFormular("anmeldung", 1, monat, jahr);
    }

    // [O] Zum Kalender scrollen
    if (e.code === "KeyO") {
      document.getElementById("kalender").scrollIntoView({
        behavior: "smooth",
        block: "start",
      });
    }

    // [W] Wochennummern anzeigen
    if (e.code === "KeyW") {
      zeigeWochennummern();
    }

    // [X] Aktueller Kalender
    if (e.code === "KeyX") {
      zeigeKalender(heute.getFullYear(), heute.getMonth() + 1);
    }
  }

  // [ESC] Anzeige schließen
  if (e.code === "Escape") {
    if (document.getElementById("anzeige")) {
      document.getElementById("anzeige").remove();
      aktivEvent();
    }
  }
};

// Wochennummern anzeigen
const zeigeWochennummern = () => {
  let wochen = document.querySelectorAll(".woche");
  wochen.forEach((woche) => {
    woche.classList.toggle("zeigeWoche");
  });
};

// Die Auswahlliste beim drehen mit dem Mausrad verändern
const auswahllisteAendern = (e) => {
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

// Aktiver Event
const aktivEvent = (id = 0) => {
  if (document.getElementsByClassName("aktivevent")[0]) {
    document.getElementsByClassName("aktivevent")[0].classList.remove("aktivevent");
  }
  if (id != 0) {
    document.querySelector(`[data-event="${id}"]`).classList.add("aktivevent");
  }
};

// Fenster zentriert anzeigen
const fensterPosition = () => {
  var form = document.getElementById("form");
  var tabelle = document.getElementById("tabelle");
  if (form) {
    let breite = form.offsetWidth / 2 - 8;
    let links = tabelle.offsetWidth / 2 - breite;
    let hoehe = form.offsetHeight / 3;
    let oben = tabelle.offsetTop + hoehe / 2;
    form.style = `left: ${links}px; top: ${oben}px;`;
  }
};

// Fenster bewegen
// https://blog.pliszko.com/2021-04-10-draggable-elements-in-javascript-without-external-libraries/
const fensterBewegen = (elementSelector, handleSelector) => {
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

      // Cursorposition abrufen
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
      // Hole die neue Cursorposition
      const cursorPosition = getCursorPositionFromEvent(e);

      // Positionsänderung berechnen
      const positionChangeX = cursorPositionX - cursorPosition.x;
      const positionChangeY = cursorPositionY - cursorPosition.y;

      // Speichere die Cursorposition
      cursorPositionX = cursorPosition.x;
      cursorPositionY = cursorPosition.y;

      // Festlegen der neuen Position des Elements
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
      handle.addEventListener("touchstart", start, { passive: false });
    } else {
      element.addEventListener("mousedown", start);
      element.addEventListener("touchstart", start);
    }
  }
};
