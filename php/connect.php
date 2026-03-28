<?php
/**
 * 
 */
try {
    $dbh = new PDO(
        "mysql:host=local_host;dbname=perlocka_db",
        "root",
        ""
    );
} catch (Exception $e) {
    die("ERROR: Could Not Connect To Database. {$e->getMessage()}");
}