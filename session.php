<?php 
/**
 * Author : Alexander Perlock
 * MACID  : perlocka
 * 
 * Date Created  : 29 03 26
 * Date Modified : 29 03 26
 * 
 * Returns -1 if there is no actively logged in session, the user's email if there is one;
 */
include "./php/connect.php";

if (session_status() === PHP_SESSION_ACTIVE && $_SESSION["user"] !== null) {
    echo $_SESSION["user"];
} else {
    echo -1;
}