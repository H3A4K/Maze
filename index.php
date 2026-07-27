<?php 
/**
 * Author : Alexander Perlock
 * 
 * Date Created  : 27 03 26
 * Date Modified : 27 03 26
 * 
 * Main index page for PHP assignment
 */

// include "./connect.php";

// for testing
// session_start();
// session_destroy();
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MAZE - LOGIN</title>

    <link rel="stylesheet" href="./assets/css/main.css">

    <script type="module" src="./js/page_class.js"></script>
    <script type="module" src="./js/map.js"></script>
    <script type="module" src="./js/controls.js"></script> 
    <script type="module" src="./js/pages.js"></script>
    <script type="module" src="./js/maze.js"></script>
    <script type="module" src="./js/game.js"></script>
    <script type="module" src="./js/login.js"></script>
    <script type="module" src="./js/main.js"></script>

</head>

<body>
    <header><img src="./assets/images/exit.png" id="exit" width="64px" height="64px" class="hidden"><h1>Maze</h1></header>
    <div id="container">
        <p style="display: inline;" class="login">Email : </p>
        <input type="email" id="email" placeholder="Example@gmail.com" class="login">
        <br>
        <p style="display: inline;" class="login">Birthdate : </p>
        <input type="date" id="birthdate" class="login">
        <br>
        <input type="button" id="submit" class="clickable login" value="Login">
    </div>
    <p id="feedback"></p>
    <footer></footer>
</body>

</html>