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
    
                <?php 
                

            if( isset($_GET['key']) && isset($_GET['email']) && isset($_GET['userid']) ) {

                    $key = escape($con, $_GET['key']); 
                    $email = escape($con, $_GET['email']); 
                    $userid = escape($con, $_GET['userid']); 


                    // $pCheck = "SELECT * FROM pass_reset_temp where key = '$key' ";
                    // $pCheckQ = mysqli_query($con, $pCheck);

                    // $pCheckResult = mysqli_num_rows($pCheckQ);

                    // if ( $pCheckResult > 0 ) {
                        
                    //     while($pR = mysqli_fetch_assoc($pCheckQ)) {
    
                    //         $pCheckKey = $pR['key'];
                    //         $pCheckEmail = $pR['email'];
                    //         $pCheckUserid = $pR['user_id'];
        
        
                    //     }
                    // } else {
                    //     echo "
                    //     <script>
                    //         swal({
                    //             title: 'You can reset twice with the same secret code',
                    //             text: 'Please request another password reset link',
                    //             type: 'error' 
                    //         });  
                    //         </script>; 
                    //     ";
                    // }

                

                

                    if (!empty($key) || !empty($email) || !empty($userid) ) {

                        $p_rS = "SELECT * FROM `pass_reset_temp` WHERE `key` = '$key' ";

                        $p_rSQ = mysqli_query($con, $p_rS);
    
                        $result = mysqli_num_rows($p_rSQ);
    
                        if ($result > 0) {
    
                            while($r_s = mysqli_fetch_assoc($p_rSQ) ) {
    
                                $s_code = $r_s['secret_code'];
                                $s_key = $r_s['key'];
                                $s_exp_date = $r_s['exp_date'];
                                
                            }
    
                        } else {
                            echo "
                            <script>
                            swal({
                                title: 'You are an intruder',
                                text: 'Please request another password request link',
                                type: 'error' 
                            });  
                            setInterval(function(){
                                window.location.href = 'index.php';
                            }, 2000);
                            </script>"; 
                        }

                    } else {
                        header("Location: index.php");
                    }

                } else {
                    header("Location: index.php");
                }
                

                if ( isset($_POST['secretcode']) ) {

                    $now = date('Y-m-d H:i:s');

                    $secretCode = escape($con, $_POST['secretcode']);
                    $n_pass = escape($con, $_POST['n_pass']);
                    $c_n_pass = escape($con, $_POST['c_n_pass']);

                    if( !empty($secretCode) || !empty($n_pass) || !empty($c_n_pass) ) {
                        
                        if ($n_pass === $c_n_pass) {
                            
                            if( $secretCode === $s_code ) {

                              if ( $now <= $s_exp_date ) {
                                $hashedpwd = password_hash($c_n_pass , PASSWORD_DEFAULT);

                                $p_user_up = "UPDATE user SET password =  '$hashedpwd' WHERE userid = '$userid'";
                                $p_user_upQ = mysqli_query($con, $p_user_up);

                                if ($p_user_upQ) {

                                    // Deleting table after change of password 
                                    $d_p_t = "DELETE FROM pass_reset_temp WHERE `key` = '$key' ";

                                   $d_p_tQ = mysqli_query($con, $d_p_t);


                                   if ($d_p_tQ) {


                                        

                                        echo "<script>
                                        swal({
                                        title: 'Password has been reset',
                                        type: 'success' 
                                        });  
                                        setInterval(function(){
                                            window.location.href= 'index.php';
                                        }, 3000);
                                        </script>";


                                        $subject = 'Your Eremote Password Has Been Reset';                                    
                                        $body = '<strong>'.'Your Password Has Been Reset'.'</strong>'.'<br>';

                                        $body .= '<p>'.'If You did not do that please contact Eremote Support'.'</p>'.'<br><br>';

                                        $body .= 'Your New Pass :' .$c_n_pass.'<br>';

                                        $pasResetMail = u_s($email, $body, $subject);
                                        

                                   } else {
                                       echo "
                                       <script>
                                       swal({
                                           title: 'Something went wrong',
                                           text: 'mysqli_connet'
                                           type: 'error'
                                       });
                                       </script>
                                       
                                       ";
                                       echo mysqli_connect_error($d_p_tQ);
                                   
                                    }


                                    // $subject = 'Your Eremote Password Has Been Reset';                                    
                                    // $body = '<strong>'.'Your Password Has Been Reset'.'</strong>'.'<br>';

                                    // $body .= '<p>'.'If You did not do that please contact Eremote Support'.'</p>'.'<br><br>';

                                    // $body .= 'Your New Pass :' .$c_n_pass.'<br>';


                                    
                                    // $pasResetMail = u_s($email, $body, $subject);
                                    
                                    // echo "<script>
                                    // swal({
                                    // title: 'Password has been reset',
                                    // type: 'success' 
                                    // });  
                                    // window.location.href= 'index.php';
                                    // </script>"; 

                                    
                                } else {
                                    echo "<script>
                                    swal({
                                    title: 'Something went wrong',
                                    type: 'error' 
                                    });  
                                    </script>";
                                }

                              } else {
                                echo "<script>
                                swal({
                                title: 'You secret code is expired',
                                type: 'error' 
                                });  
                                </script>";
                              }

                            } else {
                                echo "<script>
                                swal({
                                title: 'Secret Code Did not match',
                                type: 'error' 
                                });  
                                </script>";
                            }
                        
                        } else {
                            echo "<script>
                            swal({
                               title: 'Password Did not match',
                               type: 'error' 
                            });  
                            </script>";
                        }
                    } else {
                        
                        echo "<script>
                        swal({
                            title: 'Please fill all the fields',
                            type: 'error' 
                        });  
                        </script>";
                        
                    }
                
                }


                ?>
                    <div class="msg">
                        Please type your secret code to reset your password
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">fiber_new</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="n_pass" placeholder="Password" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">fiber_new</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="c_n_pass" placeholder="Confirm Password" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">fiber_pin</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="secretcode" placeholder="Your Secret Code" required autofocus>
                        </div>
                    </div>


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