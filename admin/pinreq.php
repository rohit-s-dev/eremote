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

    <section class="content">
        <div class="container-fluid">

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
                                    <th>User ID</th>
                                    <th>Full Name</th>
                                    <th>Amount</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Buttons</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                
                                $sql = "SELECT * FROM pin_req ORDER BY id DESC" ;
                                $result = mysqli_query($con, $sql);

                            while($row = mysqli_fetch_assoc( $result )) {

                                $id = $row['id'];
                                $user_id = $row['user_id'];
                                $email = $row['email'];
                                $amount = $row['amount'];
                                
                                $status = $row['status'];
                                $date = $row['date'];

                            ?>
                            
                            <tr>
                                <td><?php echo $id; ?></td>

                                <td><?php echo $user_id; ?></td>
                                <td>
                                    <?php 
                                    
                                    $f_ = "SELECT * FROM user WHERE `userid` = '$user_id' ";
                                    $f_Q = mysqli_query($con, $f_);

                                    while ($r = mysqli_fetch_assoc($f_Q)) {

                                        $firstname = $r['firstname'];
                                        $lastname = $r['lastname'];

                                    }

                                        $fullname = $firstname . ' ' . $lastname; 
                                        echo strtoupper( $fullname );
                                    ?>
                                </td>
                                <td><?php echo $amount; ?></td>

                                <td><?php echo pin_quantity($amount); ?></td>

                                <td>
                                    <?php 
                                    
                                    if($status == 'pending') {
                                        // $status = strtoupper($status);
                                        echo "<button  class='pb text-capitalize btn btn-warning btn-block'> $status </button>";
                                    } elseif($status == 'done') {
                                        // $status = strtoupper($status);
                                        echo "<button class='btn text-capitalize btn-success btn-block'> $status </button>";
                                    }
                                    
                                    ?>
                                </td>

                                <td><?php echo $date; ?></td>

                                <td>
                                    <?php 
                                       if ($status == 'pending' ) {
                                        echo "
                                        <a href='$user_id'  class='done btn btn-block btn-success'>
                                            Done
                                        </a>
                                        ";
                                       }
                                    ?>
                                </td>
                                
                            </tr>
                        
                        <?php } ?>

                            </tbody>
                        </table>
                        <div class='shm'></div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

<?php 
include "includes/footer.php";
?>