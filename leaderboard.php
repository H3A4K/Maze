<?php 
/**
 * Author : Alexander Perlock
 * MACID  : perlocka
 * 
 * Date Created  : 27 03 26
 * Date Modified : 27 03 26
 * 
 * Leaderboard page
 */

include "./php/connect.php";

/**
 * Adds a score to the database
 * 
 * @param PDO $dbh The database to add to
 * @param string $user the user's email (works as ID)
 * @param int $rooms the power of 10 of the number of rooms played, ex. 100 = 10^2, rooms = 2
 * @param string $controller the method of controls the user used
 * @param int $time the time it took for the round
 */
function add_score(PDO $dbh, string $user, int $rooms, string $controller, int $time) {
    $cmd = "INSERT INTO `scores` VALUES (?, ?, ?, ?)";
    $stmt = $dbh->prepare(($cmd));
    $stmt->execute([$user, $rooms - 1, $controller === "Keyboard", $time]);
}

/**
 * Gets the user's last n games' average time per room
 * 
 * @param PDO $dbh The database to reference
 * @param string $user the user's email (works as ID)
 * @param int $limit the max number of games returned (if null, takes all games)
 * 
 * @return double the average time per room
 */
function get_user_ave(PDO $dbh, string $user, ?int $limit) {
    $cmd = "SELECT `rooms`, `time` FROM `scores` WHERE `userID`=? LIMIT=?";
    $stmt = $dbh->prepare($cmd);

    if (!$$stmt->execute([$user, $limit])) { return -1; } // error code

    // TODO get average of rows
}

/**
 * Gets the user's last n games' average time per room
 * 
 * @param PDO $dbh The database to reference
 * @param int $limit the max number of users returned (if null, takes top 10)
 * 
 * @return list the best users
 */
function get_best_users(PDO $dbh, int $limit = 10) {
    $cmd = "SELECT DISTINCT * from `scores` ORDER BY `time` LIMIT=?";
    $stmt = $dbh->prepare($cmd);

    if (!$$stmt->execute([$limit])) { return []; } // error code

    // TODO get rows as list
}