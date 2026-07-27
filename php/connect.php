<?php
/**
 * Author : Alexander Perlock
 * 
 * Date Created  : 27 03 26
 * Date Modified : 27 03 26
 * 
 * Connect to database
 */
try {
    $dbh = new PDO(
        "mysql:host=localhost;dbname=perlocka_db",
        "root", // perlocka_local
        "" // {FmD,8Pe
    );
} catch (Exception $e) {
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}
