<?php 
require_once("includes/initialize.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Admin Panel</title>
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

    <!-- Sweet Alert CSS -->
    <link rel="stylesheet" href="plugins/sweetalert/sweetalert.css">	
    
    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!--Sweet Alert JS -->
    <script src="plugins/sweetalert/sweetalert.min.js"></script>	

</head>

<body class="login-page">

    <div class="f_l">
        <div class="f_l_img">
            <img src="images/e-remote-logo_footer.png" alt="">
        </div>
    </div>
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">E<b>Remote</b><br><span>Admin Panel</span></a>
            
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Sign in</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="userid" placeholder="Userid" autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" >
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

                        $sql = "SELECT * FROM `admin` WHERE `user_id` = '$username_log' ";
                        $q = mysqli_query($con, $sql);
                        $result = mysqli_num_rows($q);
                        
                        if($result < 1) {

                            echo "<div class='alert alert-danger'>
                                     No userid found 
                                </div>";

                        } else {
                            if($r = mysqli_fetch_assoc($q)) {

                                $username = $r['user_id'];
                                $password = $r['pass'];
                                // $firstname = $r['firstname'];
                                // $lastname = $r['lastname'];
                               
                                        
                                // $hashedPwdCheck = password_verify($password_log, $password);

                            }
                            
                            // validation
    
                            if( $username_log == $username && $password_log == $password ) {
    
                                $_SESSION['user_id'] = $username;
                               
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
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

 

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <!-- <script src="plugins/jquery-validation/jquery.validate.js"></script> -->

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>