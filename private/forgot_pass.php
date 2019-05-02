<?php 

require_once("includes/initialize.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Eremote :: Forgot Pass </title>
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

    <!-- Sweet Alert CSS -->
    <link rel="stylesheet" href="plugins/sweetalert/sweetalert.css">	
    <!--Sweet Alert JS -->
    <script src="plugins/sweetalert/sweetalert.min.js"></script>	


    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/my-style.css">
</head>

<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);">E<b>Remote</b></a>
            
        </div>
        <div class="card">
            <div class="body">
                <form id="forgot_password" method="POST">
                    <div class="msg">
                        Enter your email address that you used to login. We'll send you an email with your username and a
                        link to reset your password.
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="userid" placeholder="userid" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                        </div>
                    </div>

                    <?php 
                    
                    if(isset($_POST['r_sub'])) {
                        $uid = escape($con, h($_POST['userid']));
                        $email = escape($con, h($_POST['email']));

                        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

                        if(empty($uid) || empty($email) ) {

                            echo "<script>
                            swal({
                               title: 'Please provide all information',
                               text: 'Try again',
                               type: 'error'
                            });
                        </script>";

                        } elseif (!$email) {
                            echo "<script>
                            swal({
                               title: 'Please check your mail',
                               text: 'Try again',
                               type: 'error'
                            });
                        </script>";

                        } else {
                            
                            // quering
                            $q  = "SELECT * FROM user WHERE userid = '$uid' AND email = '$email' ";
                            $q_r = mysqli_query($con, $q);
                            $result = mysqli_num_rows($q_r);

                            // Checking for user exist or not
                            if($result < 0) {
                                echo "<script>
                                    swal({
                                    title: 'No user found please check your user id or email',
                                    text: 'Try again',
                                    type: 'error'
                                    });
                                </script>";
                            } else {
                                // fetching all data 
                                if($row = mysqli_fetch_assoc($q_r)) {
                                    $firstname = $row['userid'];
                                    $lastname = $row['email'];
                                }

                                $expFormat = mktime( date('H'), date('i'), date('s'), date('m'), date('d')+1, date('y') );

                                $expDate = date("Y-m-d H:i:s", $expFormat);
                                
                                $key = md5( 2418*2 + intval($email) );
                                $addkey = substr( md5(uniqid(rand(),1)) , 3, 10 );
                                $key =  $key.$addkey;

                                $emailPassRand = e_rand();
                                
                                // insert to database
                                $sql = "INSERT INTO `pass_reset_temp`(`user_id`, `email`, `key`, `exp_date`, `secret_code`) VALUES('$uid', '$email' , '$key', '$expDate', '$emailPassRand') ";

                                $sql_r =  mysqli_query($con, $sql);

                                if($sql_r) {

                                    // Fetching Data From database
                                    $f_user = "SELECT * FROM `pass_reset_temp`";
                                    $f_userQ = mysqli_query($con, $f_user);
                                    
                                    while ( $rF = mysqli_fetch_assoc( $f_userQ ) ) {

                                        $f_user_id = $rF['user_id'];
                                        $f_user_email = $rF['email'];
                                        $f_user_key = $rF['key'];
                                        $f_user_expDate = $rF['expDate'];

                                    }

                                    $mailLink = 'http://eremote.eremoteworld.com/confirmation.php?key='.$f_user_key.'&email='.$f_user_email.'&userid='.$f_user_id;

                                    


                                    $body = 'Your Password Reset Email: '. $mailLink. "\n"."<br>";

                                    $body .= 'Your Password Reset Email: '. $emailPassRand. "\n"."<br>";

                                    $subject = 'Password Reset Link Request';

                                    $passwordResetEmail = u_s($f_user_email, $body, $subject);


                                    echo "<script>

                                    swal({
                                        title: 'Password Reset Link Has Been Sent To Your Email Address',
                                        text: '',
                                        type: 'success'
                                    });
                                    
                                    </script>";
                                    
                                } else {
                                    echo "<script>

                                    swal({
                                        title: 'Something went wrong',
                                        text: 'error',
                                        type: 'error'
                                    });
                                    </script>";
                                }

                            

                            }
                        }

                       
                    }
                    
                    ?>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit" name='r_sub'>RESET MY PASSWORD</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="index.php">Sign In!</a>
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