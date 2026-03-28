/**
 * Author : Alexander Perlock
 * MACID : perlocka
 * Date Created : 27 03 26
 * Date Modified : 28 03 26
 * 
 * Handles login logic for index.php and login.php
 */

window.addEventListener("load", function() {
    const button = document.getElementById("submit");
    
    /**
     * Handles Swapping from login form to move to play.php form
     */
    function login_success() {
        const email = document.getElementById("email").value;

        const container = document.getElementById("container");
        container.innerHTML = null;

        const form = document.createElement("form");
        form.setAttribute("method", "POST");
        form.setAttribute("action", "./play.php");

        const hidden_e = document.createElement("input");
        hidden_e.setAttribute("type", "email");
        hidden_e.setAttribute("value", email);
        hidden_e.setAttribute("name", "email");

        const submit = document.createElement("input");
        submit.setAttribute("type", "submit");

        form.appendChild(submit);
        container.appendChild(form);
    }

    /**
     * Handles the return from the AJAX fetch
     * 
     * @param {string} key the echo'd information from login.php.
     *  Either :    0 -> Password and Email do not match.
     *              1 -> Password matches Email.
     *              2 -> Email not recognised, new user added.
     */
    function fetch_success(key) {
        const display = document.getElementById("feedback");
        console.log(key)
        switch (parseInt(key)) {
            case 0:  
                document.getElementById("email").style.backgroundColor = "rgba(190, 70, 70, 1)";
                document.getElementById("birthdate").style.backgroundColor = "rgba(190, 70, 70, 1)";
                display.innerText = "Login Unsuccessful, please check your password and account name and try again.";
                break;
            case 1: 
                login_success();
                display.innerText = "Login Sucessful. Welcome Back To MAZE";
                break;
            case 2:
                login_success();
                display.innerText = "Login Sucessful. Welcome To MAZE";
                break;
        }
    }

    /**
     * Determines if the email meets basic critera.
     * 
     * @param {string} email the email to validate
     * 
     * @return 0 (email invalid) or 1 (email valid)
     */
    function validate_email(email) {
        if (!email.includes(".")) { return 0 }
        return 1;
    }
   
    /**
     * Handles sending the AJAX request if critera met.
     */
    button.addEventListener("click", () => {
        const email = document.getElementById("email");

        if (!validate_email(email.value)) { return }

        const birthdate = document.getElementById("birthdate");

        if (!birthdate.value) { return }

        let url = "./login.php?email=" + email.value + "&birthdate=" + birthdate.value;
        console.log(url);
        fetch(url)
            .then(response => response.text())
            .then(fetch_success)

    });
});