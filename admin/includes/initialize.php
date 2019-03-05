<?php

// ob start
ob_start();

// Session Start
session_start();



//  files
// function 
require_once("func.php");

// random userid
$r_user_id =  rand_user_id();

// database
require_once("db.php");
require_once('connection.php');
                             
$con = db_con();

// if($con) {
//     echo "connected";
// }

