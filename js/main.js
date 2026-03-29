/**
 * Author : Alexander Perlock
 * MACID : perlocka
 * Date Created : 28 03 26
 * Date Modified : 28 03 26
 * 
 * Main event and page handling
 */


import {main as login} from "./login.js";
import {main as game} from "./game.js";

window.addEventListener("load", function() {
    const container = document.getElementById("container");

    /**
     * Handles Swapping from login form to move to play.php form
     * 
     * @param {HTMLElement} container
     */
    function send_to_page(inner_page, main) {
        container.innerHTML = "";
        console.log(inner_page)
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
    function login_success(container, email) {
        if (!email) {
            email = document.getElementById("email").value;
        }

        const b = document.createElement("input");
        b.setAttribute("type", "button");
        b.setAttribute("value", "START MAZE");
        send_to_page(b);

        b.addEventListener("click", () => {
            let url = "play.php?email=" + email;
            console.log("A")
            fetch(url)
                .then(response => response.text())
                .then((text) => send_to_page(text, game));
        });
    }

    function validate_session(text) {
        if (text) {
            document.getElementById("email").value = text;
            document.getElementById("feedback").innerText = "Login Sucessful. Welcome Back To MAZE";
            login_success(container, text);
        } else {
            login(() => login_success(container));
        }
    }

    fetch("session.php")
        .then(response => response.text())
        .then(validate_session);

    login(() => login_success(container));

});