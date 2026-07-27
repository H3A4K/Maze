<?php 
/**
 * Author : Alexander Perlock
 * 
 * Date Created  : 29 03 26
 * Date Modified : 29 03 26
 * 
 * Returns -1 if there is no actively logged in session, the user's email if there is one;
 */
include "./php/connect.php";

session_start();

if (isset($_SESSION["user"])) {
    echo $_SESSION["user"];
} else {
    echo -1;
}
