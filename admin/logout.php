<?php
session_start();

$_SESSION['userid'] = null;
$_SESSION['f_name'] = null;
$_SESSION['pass'] = null;
$_SESSION['email'] = null;
$_SESSION['user_pic'] = null;
$_SESSION['status'] = null;


header("Location: index.php");
