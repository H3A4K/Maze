window.addEventListener("load", function() {
    const b = document.getElementById("submit");
    
    function login_success(text) {
        const container = document.getElementById("container");
        container.innerHTML = text;
    }

    function validate_email(email) {
        // console.log("checking")
        if (!email.value.includes(".")) {
            // console.log("Failed");
            return 0;
        }
        // console.log("Passed");
        return 1;
    }


    b.addEventListener("click", () => {
        const email = document.getElementById("email");

        if (!validate_email(email)) { return }

        const birthdate = document.getElementById("birthdate");

        if (!birthdate.value) { return }

        // console.log(birthdate.value);

        let url = "./login.php?email=" + email.value + "&birthdate=" + birthdate.value;
        console.log(url);
        fetch(url)
            .then(response => response.text())
            .then(login_success)

    });
});