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
$uid = $_SESSION['userid'];


?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>TOTAL DOWNLINE</h2>
            </div>
            <style>
                .dl .dl_h {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    cursor: pointer;
                    padding: .5rem 2rem;
                    position: relative;
                    z-index: 9; 
                }

                .dl_h::before {
                    background: #eee;
                    width: 0;
                    height: 100%;
                    content: '';
                    position: absolute;   
                    left: 0;
                    top:0;
                    z-index: -1;  
                    transition: all .3s ease;        
                }

                .dl_h:hover::before {
                    width: 100%;
                }

                .dl > ul {
                    margin-top:1rem;
                    list-style: none;
                    padding: 1rem auto;
                    display: block;
                }
                .plus::after {
                content: '+';
                position: relative;
                right: 0;
                }

                .minus::after {
                content: '-';
                position: relative;
                right: 0;
                }
                
                .s_s {
                    margin: 1rem 0;
                }
            </style>
            <section class='pr' style='background-color: #fff; border-radius: 5px; overflow: hidden;'>
                <div class="dl">

                    <div class="dl_h">
                        <h5>
                        <?php 
                                $td = "SELECT * FROM user WHERE `sponsered` = '$uid' ";
                                $tdQ = mysqli_query($con, $td);

                                $count = mysqli_num_rows($tdQ);
                        ?>
                           Your Total Downline 
                        </h5>
                        <span></span>
                    </div>
                    
                    <ul id="downline">
                        <li>
                            <?php 
                                echo $uid;
                            ?>
                            <div style="border-bottom:1px solid #eee;padding-bottom: 5px; margin-bottom:10px; "></div>
                            <ul>
                                <?php
                                while($r = mysqli_fetch_assoc( $tdQ ) ) {

                                    $m = $r['userid'];
                                    $f = strtoupper($r['firstname']);
                                    $l = strtoupper($r['lastname']);

                                    ?>


                                    <?php 
                                    
                                    echo "<li class='s_s dropdown-divider '>
                                    {$m} ( {$f} {$l} ) <button data-toggle='modal' data-target='#siModal' value='$m' class='btn btn-primary btn-sm dn_i'>View Profile</button>
                                    </li>";
                                    ?>
                                
                            <?php } ?>
                                
                            </ul>
                        </li>
                    </ul>
                </div>     
            </section>
            
                    <div id='siModal' class='modal fade' role='dialog'>
            <div class='modal-dialog'>

                <!-- Modal content-->
                <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h4 class='modal-title'>User detail</h4>
                </div>
                <div class='modal-body'>
                <div class='td_res'>
                    <div class="img_loader text-center">
                    <img src="images/loading.gif" class="img-responsive text-center" alt="" width="32px" srcset="">
                    </div>
                </div>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                </div>
                </div>

            </div>
            </div>
        </div>
    </section>
<?php 
include "includes/footer.php";
?>