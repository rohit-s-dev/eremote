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


    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>All Reports</h2>
            </div>
        </div>

        <?php 
        
        // Activation
        if(isset($_GET['act'])) {
            $act = $_GET['act'];

            $s_c = "SELECT * FROM user WHERE userid = '$act' ";
            $s_c_q = mysqli_query($con, $s_c);

            $sql = "UPDATE user SET status = 1 WHERE userid = '$act' ";
            $sql_q = mysqli_query($con, $sql);
            // $result = mysqli_num_rows($sql_q);


                if($sql_q) {
                    echo "<script>
                    swal({
                        title: 'User Activated',
                        text: 'user can login now',
                        type: 'success'
                    }); 
                    </script>";
                } else {
                    echo "<script>
                    swal({
                        title: 'Error',
                        text: 'Something Went Wrong Please Try Again or Contact To Support Team',
                        type: 'error'
                    });
                    </script>
                    ";
                }
           
        }

        // Deactivation
        if(isset($_GET['deact'])) {
            $deact = $_GET['deact'];

            $d_c = "UPDATE user SET status = 0 WHERE userid = '$deact' ";
            $d_c_s = mysqli_query($con, $d_c);

            if($d_c_s) {
                echo "
                <script>
                    swal({
                        title: 'User Deactivated',
                        text: 'User now cannot login',
                        type: 'success'
                    });
                </script>";
            } else {
                echo "<script>
                
                swal({
                    title: 'Error',
                    text: 'Something Went Wrong Please Try Again or Contact To Support Team',
                    type: 'error'
                });
                
                </script>";
            }
        }
        
        ?>

        <div class="section">
            <!-- Newest User -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                New Users
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
                                            <th>User ID</th>
                                            <th>Full Name</th>
                                            <th>Sponser ID</th>
                                            <!-- <th>Sponser Name</th> -->
                                            <th>Level</th>
                                            <th>Level Income</th>
                                            <th>Current Income</th>
                                            <th>Self Remote Quantity</th>
                                            <th>Team Remote Quantity</th>
                                            <th>Joining Date</th>
                                            <th>Status</th>
                                            <th>Buttons</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        // All Values Form User Table-----------------------
                                        $sql = "SELECT * FROM user";
                                        $result = mysqli_query($con, $sql);

                                    while($row = mysqli_fetch_assoc($result)) {

                                        $id = $row['id'];
                                        $userid = $row['userid'];
                                        $firstname = $row['firstname'];
                                        $lastname = $row['lastname'];
                                        $sponsered = $row['sponsered'];
                                        $level = $row['level'];
                                        $level_income = $row['l_income'];
                                        $current_income = $row['c_income'];
                                        $team_remote_quantity = $row['t_remo_quantity'];
                                        $j_dat = $row['joining_date'];
                                        $status = $row['status'];

                                    ?>  
                                     

                                        <?php
                                        

                                        // Remote Quantity
                                        $sr = "SELECT * FROM pin_req WHERE `user_id` = '$userid' && `status` = 'done' ";
                                        $srQ = mysqli_query($con, $sr);
                                        $self_remoteQuantity = mysqli_num_rows($srQ);

                                        ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td>
                                            <a class='' href="view_user.php?id=<?php echo $userid; ?>">
                                                <?php echo $userid; ?>
                                            </a>
                                        </td>
                                        <td>
                                        <?php 
                                        echo strtoupper($firstname).' '. strtoupper($lastname);
                                        ?>
                                        </td>
                                        <td><?php echo $sponsered; ?></td>
                                        
                                        <!-- <td>
                                            <?php 
                                                $sp_name = "SELECT firstname FROM user WHERE sponsered = 'ER145730923' ";
                                                
                                                $sp_nameQ = mysqli_query( $con, $sp_name );

                                                while( $sp_r = mysqli_fetch_assoc( $sp_nameQ ) ) {
                                                    $sp_firstname = $sp_r['firstname'];
                                                    
                                                }

                                                echo $sp_firstname;
                                            ?>
                                        </td> -->
                                        
                                        <td><?php echo $level; ?></td>
                                        <td><?php echo $level_income; ?></td>
                                        <td><?php echo $current_income; ?></td>
                                        <td><?php echo $self_remoteQuantity; ?></td>
                                        <td><?php echo $team_remote_quantity; ?></td>
                                        <td><?php echo $j_dat; ?></td>
                                        <td>
                                            <?php  
                                            
                                            if($status === 'pending') {
                                                echo "
                                                <button class='pb btn btn-warning'>
                                                Pending
                                                </button>
                                                ";
                                            } elseif($status === 'active') {
                                                echo "
                                                <button class='btn btn-success '>
                                                    Active
                                                </button>
                                                
                                                ";
                                            } elseif ($status === 'inactive') {
                                                echo "<button class='btn btn btn-danger'>Inactive</button>";
                                            } elseif ($status === 'deactivate') {
                                                echo "<button class='btn btn-danger'></button>";
                                            }

                                            ?>
                                        </td>
                                        <td>
                                            <div class='btn-group btn-group-sm' role='group'>

                                            <a href='<?php echo $userid; ?>' class='active btn-block btn btn-success'>
                                                Active
                                            </a>

                                            <a href='<?php echo $userid; ?>' class='inactive btn-block btn btn-primary'>
                                                Inactive
                                            </a>

                                            </div>
                                        </td>
                                        <td>
                                            <a href='<?php echo $userid; ?>' class='delete btn-block btn btn-danger'>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="main"></div>
                </div>
            </div>
        </div>
    </section>
<?php 
include "includes/footer.php";
?>