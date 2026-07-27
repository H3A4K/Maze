/**
 * Author : Alexander Perlock
 *  
 * Date Created : 27 03 26
 * Date Modified : 28 03 26
 * 
 * Handles login logic for index.php and login.php
 */

import * as AJAX from "./ajax.js";

/**
 * Main program logic for login
 * 
 * @param {function} login_success
 */
export function main(login_success) {
    const button = document.getElementById("submit");

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
        // console.log(key);
        switch (parseInt(key.trim())) {
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
        // console.log(email.lastIndexOf("."), email.lastIndexOf("@"))
        if (!email.includes(".") || email.indexOf("@") > email.lastIndexOf(".") - 1) { 
            const display = document.getElementById("feedback");
            display.innerText = "Email Address Invalid. A valid email address requires an \"@\", and a \".\" that follows";
            return 0;
        }
        return 1;
    }

    /**
     * Handles sending the AJAX request if critera met.
     */
    button.addEventListener("click", () => {
        const email = document.getElementById("email");

        if (!validate_email(email.value)) { return }

        const birthdate = document.getElementById("birthdate");

        if (!birthdate.value) { 
            const display = document.getElementById("feedback");
            display.innerText = "No Birthday Entered. Please enter in the correct birthday to continue"
            return 
        }

        let url = "./login.php";
        // console.log(email.value, birthdate.value);
        AJAX.POST(url, { email : email.value, birthdate : birthdate.value})
        // fetch(url + "?email=" + email.value + "&birthdate=" + birthdate.value)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error, status: ${response.status}`);
                }

                return response.text();
            })
            .then(fetch_success)
            .catch(error => {
                console.error('Fetch error:', error);
            })
    });
}

// window.addEventListener("load", main);