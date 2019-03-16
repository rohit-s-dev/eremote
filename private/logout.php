<?php
session_start();

$_SESSION['userid'] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
$_SESSION['sponsered'] = null;
$_SESSION['direct'] = null;
$_SESSION['joining_date'] = null;
$_SESSION['exp-date'] = null;
$_SESSION['total-inc'] = null;
$_SESSION['level'] = null;
$_SESSION['added-by'] = null;
$_SESSION['email'] = null;
$_SESSION['m_numb'] = null;
$_SESSION['id_status'] = null;
$_SESSION['city'] = null;
$_SESSION['state'] = null;
$_SESSION['pincode'] = null;
$_SESSION['country'] = null;
$_SESSION['pancard'] = null;
$_SESSION['bank_acc_numb'] = null;
$_SESSION['ifsc'] = null;
$_SESSION['bank_name'] = null;
$_SESSION['bank_branch'] = null;

$_SESSION['profile_pic'] = null;
$_SESSION['aadhar_card_img'] = null;
$_SESSION['pan_card_img'] = null;
$_SESSION['bank_acc_img'] = null;

header("Location: index.php");
