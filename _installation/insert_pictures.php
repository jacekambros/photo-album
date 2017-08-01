<?php
/**
 * Created by PhpStorm.
 * User: cgpe
 * Date: 2017-07-24
 * Time: 15:34
 */

// Insert pictures from a file system location into mysql table

$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$sql = "SELECT picture_file FROM pictures WHERE picture_file = '" . $plik . "';";
$result_of_login_check = $db_connection->query($sql);

if ($result_of_login_check->num_rows < 1) {
    $sql = "INSERT INTO pictures (picture_file) VALUES('" . $plik . "');";
    $query_new_user_insert = $db_connection->query($sql);
}

