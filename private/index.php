<?php 

require_once("includes/initialize.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | E-Remote Dasboard</title>
    <!-- Favicon-->
    <link rel="icon" href="images/favicon/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/my-style.css">
</head>

<body class="login-page">

    <div class="f_l">
        <div class="f_l_img">
            <img src="images/e-remote-logo_footer.png" alt="">
        </div>
    </div>

    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">E<b>Remote</b></a>
        </div>
        <div class="card">
            <div class="body">
                <form method="POST">
                    <div class="msg">Sign in</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="userid" placeholder="Userid" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-cyan waves-effect" type="submit" name="submit">SIGN IN</button>
                        </div>
                    </div>

                    <?php
                     
                     if(isset($_POST['submit'])) {
                        
                        $username_log =  $_POST['userid'];
                        $password_log = $_POST['password'];

                        // quering database

                        $sql = "SELECT * FROM user WHERE userid = '$username_log' ";
                        $q = mysqli_query($con, $sql);
                        $result = mysqli_num_rows($q);
                        
                        if($result < 1) {

                            echo "<div class='alert alert-danger'>
                                     No userid found 
                                </div>";

                        } else {
                            if($rows = mysqli_fetch_assoc($q)) {

                                $username = $rows['userid'];
                                $password = $rows['password'];
                                $firstname = $rows['firstname'];
                                $lastname = $rows['lastname'];
                                $sponsered = $rows['sponsered'];
                                $joining_date = $rows['joining_date'];
                                $exp_date = $rows['exp_date'];
                                $total_inc = $rows['total_inc'];
                                $level = $rows['level'];
                                $added_by = $rows['added_by'];
                                $email = $rows['email'];
                                $m_numb = $rows['m_numb'];
                                $status = $rows['status'];
                                $district = $rows['district'];
                                $state = $rows['state'];
                                $city = $rows['city'];
                                $pincode = $rows['pincode'];
                                $country = $rows['country'];
                                $pancard = $rows['pancard'];
                                $bank_acc_numb = $rows['bank_acc_numb'];
                                $ifsc = $rows['ifsc'];
                                $bank_name = $rows['bank_name'];
                                $bank_branch = $rows['bank_branch'];
    
                                $profile_pic = $rows['profile_pic'];
                                $aadhar_card_img = $rows['aadhar_card_img'];
                                $pan_card_img = $rows['pan_card_img'];
                                $bank_acc_img = $rows['bank_acc_img'];

                                        
                                $hashedPwdCheck = password_verify($password_log, $password);

                            }
                            
                            // validation
    
                            if( $username_log == $username && $hashedPwdCheck == true ) {
    
                                $_SESSION['userid'] = $username;
                                $_SESSION['firstname'] = $firstname;
                                $_SESSION['lastname'] = $lastname;
                                $_SESSION['sponsered'] = $sponsered;
                                $_SESSION['joining_date'] = $joining_date;
                                $_SESSION['exp-date'] = $exp_date;
                                $_SESSION['total_inc'] = $total_inc;
                                $_SESSION['level'] = $level;
                                // $_SESSION['added-by'] = $added_by;
                                $_SESSION['email'] = $email;
                                $_SESSION['m_numb'] = $m_numb;
                                $_SESSION['status'] = $status;
                                $_SESSION['city'] = $city;
                                $_SESSION['district'] = $district;
                                $_SESSION['state'] = $state;
                                $_SESSION['pincode'] = $pincode;
                                $_SESSION['country'] = $country;
                                $_SESSION['pancard'] = $pancard;
                                $_SESSION['bank_acc_numb'] = $bank_acc_numb;
                                $_SESSION['ifsc'] = $ifsc;
                                $_SESSION['bank_name'] = $bank_name;
                                $_SESSION['bank_branch'] = $bank_branch;
    
                                $_SESSION['profile_pic'] = $profile_pic;
                                $_SESSION['aadhar_card_img'] = $aadhar_card_img;
                                $_SESSION['pan_card_img'] = $pan_card_img;
                                $_SESSION['bank_acc_img'] = $bank_acc_img;
                                
                                header("Location: home.php");

                            } else {

                                echo "<div class='alert alert-danger'>
                                    username or password invalid
                                </div>";
                            
                            }
                        }
                     } 
                     
                    ?>

                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="../public/signup.php">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot_pass.php">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>