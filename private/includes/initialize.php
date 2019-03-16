<?php

// ob start
ob_start();

// Session Start
session_start();

// default date timezone
$timezone = date_default_timezone_set('Asia/Kolkata');

//  files
// function 
require_once("func.php");

// random userid
$r_user_id =  rand_user_id();

// database
require_once("db.php");
require_once('connection.php');
                             
$con = db_con();

// All sessions Variables
