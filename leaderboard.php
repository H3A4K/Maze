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
 * @param string $date the date the game was played on
 * @param string $time_completed the time the game ended
 */
function add_score(PDO $dbh, string $user, int $rooms, string $controller, int $time, string $date, string $time_completed) {
    $cmd = "INSERT INTO `scores` (`email`, `rooms`, `time`, `controller`, `date`, `time_completed`) VALUES (?, CAST(? AS UNSIGNED), ?, ?, ?, ?)";
    $stmt = $dbh->prepare(($cmd));
    $stmt->execute([$user, $rooms - 1, $time, $controller === "Keyboard", $date, $time_completed]);

        // echo $user, " ", $rooms - 1, " ", $time, " ", $controller === "Keyboard", " ", $date, " ", $time_completed;

    $cmd2 = "UPDATE `players` SET `average`=?, `total_games`=`total_games`+1 WHERE `email`=?";
    $stmt2 = $dbh->prepare($cmd2);
    $stmt2->execute([get_user_ave($dbh, $user), $user]);
}

/**
 * Gets the user's last n games' average time per room
 * 
 * @param PDO $dbh The database to reference
 * @param string $user the user's email (works as ID)
 * @param int $limit the max number of games returned (if null, takes all games)
 * 
 * @return float the average time per room
 */
function get_user_ave(PDO $dbh, string $user, int $limit = -1) {
    if ($limit < 0) {
        $cmd = "SELECT `rooms`, `time` FROM `scores` WHERE `email`=?";
        $params = [$user];
    } else {
        $cmd = "SELECT `rooms`, `time` FROM `scores` WHERE `email`=? LIMIT ?";
        $params = [$user, $limit];
    }
    $stmt = $dbh->prepare($cmd);

    if (!$stmt->execute($params)) { return -1; } // error code

    $total = 0;
    $num_rooms = 0;
    $num = 0; // created here to avoid another dbh reference
    while ($row = $stmt->fetch()) {
        $num_rooms += 10 ** ($row["rooms"] + 1);
        $total += $row["time"];
        $num++;
    }

    return round($total / $num_rooms / $num / 1000, 3);
}

/**
 * Formats the user's info into a table row
 * 
 * @param mixed $row the user's database row
 * 
 * @return string formated user
 */
function format_user(mixed $row) {
    $out = "<tr><td>";
    
    $out .= "$row[email]</td><td>$row[total_games]</td><td>$row[average]</td>";

    $out .= "</tr>";

    return $out;
}

/**
 * Begins and ends a user table
 * 
 * @param bool $header true returns the begining of the table string, false returns the closing tag
 * 
 * @return string formated table header / footer
 */
function format_table(bool $header) {
    if ($header) {
        return "<table><tr><th>Email</th><th>Total Games Played</th><th>Average Time Per Room</th></tr>";
    }
    return "</table>";
}

/**
 * Gets the n best players in terms of average time
 * 
 * @param PDO $dbh The database to reference
 * @param int $limit the max number of users returned (if null, takes top 10)
 * 
 * @return string the best users in table format
 */
function get_best_users(PDO $dbh, int $limit = 10) {
    if ($limit <= 0) { return ""; } // error code

    $cmd = "SELECT `email`, `total_games`, `average` FROM `players` ORDER BY `average` LIMIT ?";

    $stmt = $dbh->prepare($cmd);
    $stmt->bindValue(1, $limit, PDO::PARAM_INT);

    if (!$stmt->execute()) { return ""; } // error code

    $out = format_table(true);
    while ($row = $stmt->fetch()) {
        $out .= format_user($row);
    }

    $out .= format_table(false);
    
    return $out;
}

/**
 * Gets the user's last n games' average time per room
 * 
 * @param PDO $dbh The database to reference
 * @param int $limit the max number of users returned (if null, takes top 10)
 * 
 * @return string the best users in table format
 */
function get_user_info(PDO $dbh, string $user) {
    $cmd = "SELECT `email`, `total_games`, `average` FROM `players` WHERE `email`=?";
    $stmt = $dbh->prepare($cmd);

    if (!$stmt->execute([$user])) { return ""; } // error code

    return format_table(true) . format_user($stmt->fetch()) . format_table(false);
}

// $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

session_start();

$email = isset($_SESSION["user"]) ? $_SESSION["user"] : null;

// echo $email;

$data = filter_input(INPUT_POST, "results", FILTER_DEFAULT);
$results = json_decode($data, true, 32);

// $results = json_decode($_POST['results'], true);

if ($email !== null) {
    if ($results !== null) {
        add_score($dbh, $email, $results["rooms"], $results["controller"], $results["score"], $results["date"], $results["time_completed"]);
    }

    echo "<h1 class='title'>User Stats</h1>";

    echo get_user_info($dbh, $email);

    echo "<h1 class='title'>Best Players</h1>";

    echo get_best_users($dbh, 2);
}