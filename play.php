<?php
/**
 * Author : Alexander Perlock
 * MACID  : perlocka
 * 
 * Date Created  : 27 03 26
 * Date Modified : 27 03 26
 * 
 * Main game page
 */

$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

if ($email !== null) {
    ?>
    <canvas id="banner" class="main"></canvas>
    <div id="display"></div>
    <div id="controls"></div>
    <input type="email" id="email" value="<?= $email ?>" class="hidden">

<?php }
?>