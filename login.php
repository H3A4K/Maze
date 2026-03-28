<?php
/**
 * Author : Alexander Perlock
 * MACID  : perlocka
 * 
 * Date Created  : 27 03 26
 * Date Modified : 28 03 26
 * 
 * Fetches the user from the data base, 
 * If the user is not already present, the user is added.
 */
include "./php/connect.php";

function add_user($dbh, $email, $birthdate) {
    $cmd = "INSERT INTO `players` VALUES (?, null, ?, null)";
    $stmt = $dbh->prepare($cmd);
    $stmt->execute([$email, $birthdate]);

    return get_user($dbh, $email);
}

function get_user($dbh, $email) {
    $cmd = "SELECT `userID` FROM `players` WHERE `email`=?";
    $stmt = $dbh->prepare($cmd);
    $stmt->execute([$email]);

    $user = $stmt->fetchColumn();

    return $user === null ? 0 : $user;
}

function check_password($dbh, $userID, $birthdate) {
    $cmd = "SELECT `birthdate` FROM `players` WHERE `userID`=?";
    $stmt = $dbh->prepare($cmd);
    $stmt->execute([$userID]);

    $dbh_bd = $stmt->fetchColumn();

    return $dbh_bd === $birthdate;
}

$email = filter_input(INPUT_GET, "email", FILTER_VALIDATE_EMAIL);
$birthdate = filter_input(INPUT_GET, "birthdate", FILTER_DEFAULT);

$user = get_user($dbh, $email);

if (!$user) {
    $_SESSION["user"] = add_user($dbh, $email, $birthdate);
    echo 2;
} else if (check_password($dbh, $user, $birthdate)) {
    $_SESSION["user"] = $user;
    echo 1;
} else {
    echo 0;
}

