<?php 
/**
 * Author : Alexander Perlock
 * MACID  : perlocka
 * 
 * Date Created  : 27 03 26
 * Date Modified : 27 03 26
 * 
 * Main index page for PHP assignment
 */

// include "./connect.php";

session_start();
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MAZE - LOGIN</title>

    <script src="./js/login.js"></script>

</head>

<body>
    <div id="container">
        <input type="email", id="email", placeholder="Example@gmail.com">
        <input type="date", id="birthdate">
        <input type="button", id="submit", value="Login">
    </div>
</body>

</html>