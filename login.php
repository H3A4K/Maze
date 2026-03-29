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

/**
 * Gets the userID from the given email
 * 
 * @param PDO $dbh The database in which to do queries from/to
 * @param string $email the given email
 * 
 * @return int the user's ID OR 0 if no user matches
 */
function get_user(PDO $dbh, string $email) {
    // $cmd = "SELECT `userID` FROM `players` WHERE `email`=?";
    // $stmt = $dbh->prepare($cmd);
    // $stmt->execute([$email]);

    // $user = $stmt->fetchColumn();

    return $email === null ? 0 : $email;
}

/**
 * Adds the user to the database
 * 
 * @param PDO $dbh The database in which to do queries from/to
 * @param string $email the user's email
 * @param string $birthdate the user's "password"
 * 
 * @return int the new user's ID
 */
function add_user(PDO $dbh, string $email, string $birthdate) {
    $cmd = "INSERT INTO `players` VALUES (?, null, ?, null)";
    $stmt = $dbh->prepare($cmd);
    $stmt->execute([$email, $birthdate]);

    return get_user($dbh, $email);
}

/**
 * Checks the user's stored "password" against the given one
 * 
 * @param PDO $dbh The database in which to do queries from/to
 * @param int $userID the user's ID
 * @param string $birthdate the "password" to check
 * 
 * @return bool if the user's password is equal to the given password
 */
function check_password(PDO $dbh, int $userID, string $birthdate) {
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

