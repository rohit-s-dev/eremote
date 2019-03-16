<?php

require_once("db.php");

// Conncetion
function db_con() {
    $connection = mysqli_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
    return $connection;
}

// disconnection
// function dis_con() {
//     if(isset($connection)) {
//         mysqli_close($connection);
//     }
// }