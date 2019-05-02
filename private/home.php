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
$uid = $_SESSION['userid'];
$pr = "SELECT SUM(amount) FROM pin_req WHERE `user_id` = '$uid' ";
$prQ = mysqli_query( $con , $pr );

$prResult = mysqli_num_rows( $prQ );

if( $prResult   > 0 ) {

    while ( $r = mysqli_fetch_assoc( $prQ ) ) {
        $selfRemoteQuantity = $r['amount'];
    
    }
}
?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_balance_wallet</i>
                        </div>
                        <div class="content">
                            <div class="text">CURRENT INCOME</div>
                            <div class="number count-to" data-from="0" data-to="" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">dashboard</i>
                        </div>
                        <div class="content">
                            <div class="text">LEVEL INCOME</div>
                            <div class="number count-to" data-from="0" data-to="" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_box</i>
                        </div>
                        <div class="content">
                            <div class="text">SELF REMOTE QUANTITY</div>
                            <div class="number count-to" data-from="0" 
                            data-to=
                            "<?php 
                                $sr = "SELECT * FROM pin_req WHERE `user_id` = '$uid' && `status` = 'done' ";

                                $srQ = mysqli_query($con, $sr);

                                $self_remoteQuantity = mysqli_num_rows($srQ);

                                echo $self_remoteQuantity;
                            ?>" 
                            data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">group</i>
                        </div>
                        <div class="content">
                            <div class="text">TEAM REMOTE QUANTITY</div>
                            <div class="number count-to" data-from="0" data-to="
                            <?php 
                                // $sr = "SELECT u.sponsered as sponsered , p.user_id as user_id FROM user as u join pin_req as p on p.user_id = user_id";

                                // $srQ = mysqli_query($con, $sr);
                                // $team_remoteQuantity = mysqli_num_rows($srQ);

                                // echo $team_remoteQuantity;
                            ?>
                            " data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_balance_wallet</i>
                        </div>
                        <div class="content">
                            <div class="text">Wallet</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->

            </div>
        </div>

        <section>
            
            <div class="container-fluid">
            
                <div class="row">

                    <!-- Account Details -->
                    <div class="col-md-6">
                        
                        <div class="ac_det_box">
                            <div class="ac_det_box_heading">
                                <h5>Account Details</h5>
                            </div>

                            <h5 class='text-center'>Welcome User :- <?php echo $_SESSION['userid'];?></h5>
                            
                            <div class="row text-center ac_det_r">
                                <div class="col-md-6">
                                    Name :-
                                </div>
                                <div class="col-md-6">
                                <?php echo strtoupper($_SESSION['firstname']) . " " . strtoupper($_SESSION['lastname']); ?>
                                </div>
                            </div>

                            <div class="row text-center ac_det_r">
                                <div class="col-md-6">
                                    Joining Date :-
                                </div>
                                <div class="col-md-6">
                                    <?php echo $_SESSION['joining_date']; ?>
                                </div>
                            </div>

                            <div class="row text-center ac_det_r">
                                <div class="col-md-6">
                                    Renewal Date :-
                                </div>
                                <div class="col-md-6">
                                    <?php 
                                       $exp_date =  $_SESSION['exp_date'];
                                        echo  substr($exp_date, 0, strpos($exp_date, ' '));
                                    ?>
                                </div>
                            </div>

                            <div class="row text-center ac_det_r">
                                <div class="col-md-6">
                                    Email ID :-
                                </div>
                                <div class="col-md-6">
                                    <?php 
                                    

                                    if (empty( $_SESSION['email'] )) {

                                        echo "<a style='color: #ff0000;' href='profile.php' >
                                            Please add an Email.
                                        </a>";

                                    } else {
                                        echo $_SESSION['email']; 
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="row text-center ac_det_r">
                            <div class="col-md-6">
                                    Mobile Number :-
                                </div>
                                <div class="col-md-6">
                                <?php echo $_SESSION['m_numb']; ?>
                                </div>
                            </div>

                            <div class="row text-center ac_det_r">
                                <div class="col-md-6">
                                    Sponser Name :-
                                </div>
                                <div class="col-md-6">
                                    <?php 
                                    $sponserd = $_SESSION['sponsered'];
                                    if ($sponserd == 'Eremote') {
                                        echo $sponserd;
                                    } else {
                                        $sq = "SELECT * FROM user WHERE `userid` =  '$sponserd' ";
                                            $sqQ = mysqli_query($con , $sq);
                                            $res = mysqli_num_rows( $sqQ );
                                          
                                            while ( $r = mysqli_fetch_assoc( $sqQ ) ) {
                                                $sponser_f_name = $r['firstname'];
                                                $sponser_l_name = $r['lastname'];
                                                $sponser_id = $r['userid'];
                                            }

                                            echo strtoupper($sponser_f_name) .' ' . strtoupper($sponser_l_name) ;
                                    }

                                    ?>
                                </div>
                            </div>

                            <div class="row text-center ac_det_r">
                                <div class="col-md-6">
                                    Sponser ID :-
                                </div>
                                <div class="col-md-6">
                                    <?php 

                                        if ($sponserd == 'Eremote') {
                                            echo $sponserd;
                                        } else {
                                            $sq = "SELECT * FROM user WHERE `userid` =  '$sponserd' ";
                                                $sqQ = mysqli_query($con , $sq);
                                                $res = mysqli_num_rows( $sqQ );
                                            
                                                while ( $r = mysqli_fetch_assoc( $sqQ ) ) {
                                                    $sponser_name = $r['sponsered'];
                                                    $sponser_id = $r['userid'];
                                                }

                                                echo $sponser_id;
                                        }
                                    ?>
                                </div>
                            </div>

                            <div class="row text-center ac_det_r">
                                <div class="col-md-6">
                                    ID Status :-
                                </div>
                                <div class="col-md-6">

                                <?php
                                    $status = $_SESSION['status']; 
                                    
                                    if ( $status == 'pending' ) {
                                        $status = strtoupper($status);
                                        echo "<button class='btn btn-warning'>$status</button>";
                                    } elseif ( $status == 'active' ) {
                                        $status = strtoupper($status);
                                        echo "<button class='btn btn-success'>$status</button>";
                                    } elseif($status == 'inactive') {
                                        $status = strtoupper($status);
                                        
                                        echo "<button class='btn btn-danger'>{$status}</button>";
                                    } 
                                ?>

                                </div>
                            </div>
                        
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="t_d">

                            <div class="row">
                            
                                <div class="col-md-6">
                                
                                    <div class="ac_t">
                                        <i class="fa fa-user"></i><span>Team</span>
                                        <div class="numb count-to" data-from="0" data-to="
                                        <?php 
                                            $s = "SELECT * FROM user WHERE `sponsered` = '$uid' ";
                                            $sQ = mysqli_query($con, $s);
                                            $count = mysqli_num_rows($sQ);

                                            echo $count;
                                        ?>
                                        " data-speed="800" data-fresh-interval="1">
                                           0
                                        </div> 
                                    </div>

                                </div>
                                
                                <div class="col-md-6">
                                
                                    <div class="ac_t">
                                        <i class="fa fa-user"></i><span>Active Team</span>
                                        <div class="numb count-to" data-from="0" data-to="
                                        <?php 
                                             $s = "SELECT * FROM user WHERE `sponsered` = '$uid' && `status` != 'inactive' ";
                                             $sQ = mysqli_query($con, $s);
                                             $count = mysqli_num_rows($sQ);
 
                                             echo $count;
                                        ?>
                                        " data-speed="800" data-fresh-interval="1">
                                            0
                                        </div> 
                                    </div>
                                
                                </div>
                            
                            </div>

                        </div>

                    </div>

                </div>
                        
            </div>

        </section>

    </section>
<?php 
include "includes/footer.php";
?>