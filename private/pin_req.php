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
                // Total Income Validation Of Total Income
                $total_income_less = ($amount / $pin_am);
                $total_income_lessNP = floor($total_income_less);

                $total_income_lessAM = $total_income_lessNP * $pin_am;
                $total_income_less = $ti - $total_income_lessAM;

                $total_income_minus = "UPDATE user SET `total_inc` = '$total_income_less' WHERE `userid`  = '$uid' ";

                $total_income_minusQ = mysqli_query( $con, $total_income_minus );

                $pin_sq = "INSERT INTO pin_req (`user_id`, `email`, `amount` , `date` ) VALUES ('$uid', '$email', '$total_income_lessAM', now() ) ";

                $pin_sqQ = mysqli_query( $con , $pin_sq);

                if( $total_income_minusQ ) {

                    if ( $pin_sq ) {
                
                        $_SESSION['total_inc'] = $total_income_less;
                        // sleep(2);
                        // header("Location: pin_req.php");
                        
                        echo "
                        <script>
                            swal({
                                title: 'Pin Request Sent',
                                type: 'success'
                            });
                        </script>
                    ";
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
            <div class="card">
                <div class="header">
                    <h2>
                        Requested Pin
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <style>
                                    th {
                                        font-size: 1.2rem;
                                    }
                                </style>
                                <tr>
                                    <th>S.No</th>
                                    <th>Amount</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                
                                $sql = "SELECT * FROM `pin_req` WHERE `user_id` = '$uid' ";
                                $result = mysqli_query($con, $sql);

                            while($row = mysqli_fetch_assoc( $result )) {

                                $id = $row['id'];
                                $email = $row['email'];
                                $amount = $row['amount'];
                                // $quantity = $row['quantity'];
                                $status = $row['status'];
                                $date = $row['date'];

                            ?>
                            <?php

                            $p_q = $amount/$pin_am;
                            $quantity = floor($p_q);
                            
                            ?>

                            <tr>
                                <td><?php echo $id; ?></td>

                                <td><?php echo $amount; ?></td>

                                <td><?php echo $quantity; ?></td>

                                <td>
                                    <?php 
                                    
                                    if($status == 'pending') {
                                        $status = strtoupper($status);
                                        echo "<button class='btn btn-warning'>$status</button>";
                                    } elseif($status == 'done') {
                                        $status = strtoupper($status);
                                        echo "<button class='btn btn-success'>$status</button>";
                                    }
                                    
                                    ?>
                                </td>

                                <td><?php echo $date; ?></td>
                                
                            </tr>
                        
                        <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php 
include "includes/footer.php";
?>