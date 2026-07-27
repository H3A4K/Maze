/**
 * Author : Alexander Perlock
 *  
 * Date Created : 28 03 26
 * Date Modified : 28 03 26
 * 
 * Main event and page handling
 */


import { main as login } from "./login.js";
import { main as game } from "./game.js";
import * as AJAX from "./ajax.js";

window.addEventListener("load", function () {
    const container = document.getElementById("container");

    /**
     * Handles Swapping from login form to move to play.php form
     * 
     * @param {HTMLElement} container
     */
    function send_to_page(inner_page, main) {
        container.innerHTML = "";
        // console.log(inner_page)
        if (inner_page instanceof Array) {
            inner_page.forEach(part => container.appendChild(part));
        } else if (inner_page instanceof HTMLElement) {
            container.appendChild(inner_page);
        } else {
            container.innerHTML = inner_page;
        }

        if (main) {
            main();
        }
    }

    /**
     * Handles Swapping from login form to move to play.php form
     * 
     * @param {HTMLElement} container
     */
    function login_success(email) {
        if (!email) {
            email = document.getElementById("email").value;
        }

        const b = document.createElement("h1");
        // b.setAttribute("type", "button");
        b.innerText = "START MAZE";
        // .setAttribute("value", "START MAZE");
        // b.setAttribute("id", "")
        b.classList.add("clickable");
        b.classList.add("title");
        send_to_page(b);

        b.addEventListener("mousedown", () => {
            // console.log(email)
            AJAX.POST("play.php", { email: email })
                .then(response => response.text())
                .then((text) => send_to_page(text, game));
        });
    }

    function validate_session(text) {
        if (text != -1) {
            document.getElementById("email").value = text;
            document.getElementById("feedback").innerText = "Login Sucessful. Welcome Back To MAZE";
            login_success(text);
        } else {
            login(login_success);
        }
    }

    fetch("session.php") // no need for POST
        .then(response => response.text())
        .then(validate_session);

    // login(() => login_success(container));

});