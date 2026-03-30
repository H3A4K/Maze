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

?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MAZE - LOGIN</title>

    <link rel="stylesheet" href="./assets/css/global.css">

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
        <input type="email", id="email", placeholder="Example@gmail.com">
        <input type="date", id="birthdate">
        <input type="button", id="submit", value="Login">
    </div>
    <p id="feedback"></p>
    <footer></footer>
</body>

</html>