<?php 
    include "includes/header.php";
    ?>

    <!-- Top Bar -->
    <?php 
    include "includes/topbar.php";    
    ?>
    <!-- #Top Bar -->

    <!-- Right and Left Sidebar -->
    <?php 
    include "includes/sidebar.php";
    ?>
    <!-- End Right and Left Sidebar -->

    
<?php 
include("includes/ref_link.php");
?>

<?php 
$uid = $_SESSION['userid']  ;
$email = $_SESSION['email']  ;
$ti = $_SESSION['total_inc'];
                
$no_of_pin = floor($ti/$pin_am);

if($ti >= $pin_am ) {
    $i = 1;

    for($i; $i<=$no_of_pin; $i++ ) {
        $i;       
    }
}

if ( isset( $_POST['prsub'] ) ) {

    $amount = escape( $con, $_POST['p_r'] );


    if ( $amount!='' ) {

        if( $amount >= $pin_am ) {

            if ( $ti < $pin_am || $ti < $amount) {

                echo "<script>
                swal({
                    title: 'Sorry ! You Cannot Buy Pin',
                    text: 'Don\'t Have Enough Money'+'  '+ $ti,
                    type: 'error'
                });
                </script>";

            } else {

                $pin_sq = "INSERT INTO pin_req (`user_id`, `email`, `amount` , `date` ) VALUES ('$uid', '$email', '$amount', now() ) ";

                $pin_sqQ = mysqli_query( $con , $pin_sq);

                if( $pin_sqQ ) {

                    // Total Income Validation Of Total Income
                    $total_income_less = ($amount / $pin_am);
                    $total_income_lessNP = floor($total_income_less);

                    $total_income_lessAM = $total_income_lessNP * $pin_am;
                    $total_income_less = $ti - $total_income_lessAM;

                    $total_income_minus = "UPDATE user SET `total_inc` = '$total_income_less' WHERE `userid`  = '$uid' ";

                    $total_income_minusQ = mysqli_query( $con, $total_income_minus );

                    if ( $total_income_minusQ ) {

                        echo "
                            <script>
                                swal({
                                    title: 'Pin Request Sent',
                                    type: 'success'
                                });
                            </script>
                        ";
                
                        $_SESSION['total_inc'] = $total_income_less;
                        // header("Location: pin_req.php");

                    }
                }

            }

        } else {
            echo "<script>
                swal({
                    title: 'Please Check Your Amount',
                    type: 'error'
                });
            </script>";
        }

        
    } else {
        echo "<script>
        swal({
            title: 'Please Enter The Amount',
            type: 'error'
        });
        </script>";
    }
        
}

?>



    <section class="content">
        <div class="container-fluid">

            <section class='pr' style='background-color: #fff; padding:2rem;'>
                <div class="row">

                    <div class="col-md-12">
                    <h4>Request For Pin</h4>
                        <form action="" method='post' id='pr'>
                            <div class="form-group">
                                <?php 
                                    $mulitply =  $pin_am * $no_of_pin ;
                                    $mulitply = number_format($mulitply, 2);
                                    echo "
                                        <p style='color:red;'>Note: 1 Pin = Rs. 3100 </p>
                                        <p style='color:red;'>You Have Money For Only : $no_of_pin Pin ( $pin_am X $no_of_pin = $mulitply )</p>
                                    ";
                                ?>    
                            </div>
                            <div class="form-group">

                                <label for='p_r'>Pin Request Amount</label>
                                <input type="text" name="p_r" id="p_r" class="" style='border: 1px solid #000; border-radius: 3px; padding-left: .3rem; margin-right: .3rem;'>

                                <input type="submit" value="Submit" name='prsub' class='btn btn-primary' class='prsub'>

                            </div>

                        </form>
                    </div>
                    <div class="al_pr">
                    
                    </div>
                </div>
            </section>


            <!-- Pin Request Tables -->
            
        </div>
    </section>

<?php 
include "includes/footer.php";
?>