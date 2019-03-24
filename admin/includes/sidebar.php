<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!-- <?php echo strtoupper($_SESSION['f_name']); ?> -->
                    </div>
                    <div class="email"><span>User ID :-</span> 
                    <!-- <?php echo $_SESSION['user_id']; ?>  -->
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="active">
                        <a href="home.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="profile.php">
                            <i class="material-icons">person</i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="doc.php">
                            <i class="material-icons">list</i>
                            <span>Documents</span>
                        </a>
                    </li>
                    <li>
                        <a href="reports.php">
                            <i class='material-icons'>assignment</i>
                            <span>Reports</span>
                            <span class='badge text-white' style='background: #ff9600; color: #fff;'>
                            <?php 
                                
                                $b = "SELECT * FROM user WHERE status = 'pending' ";
                                $bQ = mysqli_query( $con, $b );
                                $pending_requests = mysqli_num_rows( $bQ );

                                echo $pending_requests;

                                ?>
                        </span>
                            <span class='badge text-white' style='background: #1f91f3;); color: #fff;'>
                            <?php 
                                
                                $b = "SELECT * FROM user WHERE status = 'inactive' ";
                                $bQ = mysqli_query( $con, $b );
                                $pending_requests = mysqli_num_rows( $bQ );

                                echo $pending_requests;

                                ?>
                        </span>
                        </a>
                    </li>
                    <li>
                        <a href="pinreq.php">
                            <i class='material-icons'>assignment</i>
                            <span>Pin Request</span>
                            <span class='badge text-white' style='background: #ff9600; color: #fff;'>
                                <?php 
                                
                                $b = "SELECT * FROM pin_req WHERE status = 'pending' ";
                                $bQ = mysqli_query( $con, $b );
                                $pending_requests = mysqli_num_rows( $bQ );
                                // $res = mysqli_affected_rows( $con );

                                echo $pending_requests;

                                ?>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span>Admin</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="create_user.php">
                                    <span>Create User</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span>All Admin Users</span>
                                </a>
                            </li>
                  
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2019 <a href="http://eremoteworld.com/">E-Remote World</a>.
                </div>
            </div>
        </aside>
    </section>