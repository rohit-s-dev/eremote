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

            <div class="row">

                <div class="col-md-8 col-md-offset-2">

                    <div class="p_text">
                    <h4 class="text-center p_title">User Profile</h4>
                    </div>

                    <div id="profile">
                    <?php 
                    $uid = $_SESSION['userid'];
                    
                    if(isset($_POST['p_sub'])){

                        $userid = escape($con, h($_POST['userid']));
                        $firstname = escape($con, h($_POST['firstname']));
                        $lastname = escape($con, h($_POST['lastname']));
                        $m_numb = escape($con, h($_POST['m_numb']));
                        $email = escape($con, h($_POST['email']));
                        $state = escape($con, h($_POST['state']));
                        $district = escape($con, h($_POST['district']));
                        $country = escape($con, h($_POST['country']));
                        $pincode = escape($con, h($_POST['pincode']));
                        $pancard = escape($con, h($_POST['pancard']));
                        $aadhar = escape($con, h($_POST['aadhar']));

                        // validation 
                        if( empty($firstname)  || empty($lastname) || empty($m_numb) ) {
                            echo "<script>
                                swal({
                    
                                    type: 'error',
                                    title: 'Empty Fields',
                                    text: 'Please fill all the fields'
                    
                                });
                            </script>";
                        
                        }elseif (less_than($firstname , 3) || less_than($lastname , 3) ) {
                            echo "<script>
                            swal({
                
                                type: 'error',
                                title: 'Characters should not be less than 3',
                                text: 'Invalid Details'
                
                            });
                        </script>";
                        
                        } else {
                            
                            $inf = " UPDATE user SET ";
                            $inf .= " firstname = '$firstname' , ";
                            $inf .= " lastname = '$lastname' , ";
                            $inf .= " m_numb = '$m_numb' , ";
                            $inf .= " email = '$email' , ";
                            $inf .= " state = '$state' , ";
                            $inf .= " district = '$district' , ";
                            $inf .= " country = '$country' , ";
                            $inf .= " pincode = '$pincode' , ";
                            $inf .= " pancard = '$pancard' , ";
                            $inf .= " aadhar_numb = '$aadhar'  ";
                            $inf .= " WHERE userid = '$uid' ";

                            $inf_q = mysqli_query($con, $inf);
                            
                            if($inf_q) {
                                echo "
                                
                                <script>
                                
                                    swal({
                                        title: 'Success',
                                        type: 'success',
                                        text: 'Profile Updated'
                                    });
                                    
                                </script>
                                
                                ";
                                $_SESSION['firstname'] = $firstname;
                                $_SESSION['lastname'] = $lastname;
                                $_SESSION['m_numb'] = $m_numb;
                                $_SESSION['email'] = $email;
                                $_SESSION['state'] = $state;
                                $_SESSION['district'] = $district;
                                $_SESSION['country'] = $country;
                                $_SESSION['pincode'] = $pincode;
                                $_SESSION['pancard'] = $pancard;

                            } else {
                                echo "<script>
                                    swal({
                        
                                        type: 'error',
                                        title: 'Error',
                                        text: 'Something Went wrong'
                        
                                    });
                                </script>";
                            }
                        }

                    }
                    
                    
                    ?>
                    
                        <form action="" method="post">
                        
                            <div class="form-group">

                                <label for="userid">USER ID</label>
                                <input type="text" name="userid" class="form-control" id="userid"  placeholder="user id" value="<?php echo $_SESSION['userid']; ?>" readonly>

                            </div>

                            <div class="form-group">

                                <label for="userid">First Name</label>
                                <input type="text" name="firstname" class="form-control" id="firstname"  placeholder="Firstname" value="<?php echo $_SESSION['firstname']; ?>">

                            </div>

                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <input type="text" id="lastname" name="lastname"  placeholder="Lastname" class="form-control" value="<?php echo $_SESSION['lastname']; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="m_numb">Mobile Number</label>
                                <input type="text" id="m_numb" name="m_numb"  placeholder="Mobile Number" class="form-control" value="<?php echo $_SESSION['m_numb']; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email"  placeholder="Email ID" class="form-control" value="<?php echo $_SESSION['email']; ?>">
                            </div>
                            
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="state">State</label>
                                    <input type="text" id="state" name="state"  placeholder="State" class="form-control" value="<?php echo $_SESSION['state']; ?>">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="district">District</label>
                                        <input type="text" id="district" name="district"  placeholder="District" class="form-control"
                                        value="<?php echo $_SESSION['district']; ?>">
                                    </div>
                                </div>
                            
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <input type="text" id="country" name="country"  placeholder="Country" class="form-control" value="<?php echo $_SESSION['country']; ?>">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="pincode">Pincode</label>
                                        <input type="text" id="pincode" name="pincode"  placeholder="Pincode" class="form-control"
                                        value="<?php echo $_SESSION['pincode']; ?>">
                                    </div>
                                </div>                      
                        </div>

                        <div class="form-group">
                            <label for="pancard">Pancard</label>
                            <?php 
                            if(empty($_SESSION['pancard']) ) {
                                
                                echo " 
                                <input type='text' id='pancard' name='pancard'  placeholder='Pancard Number' value='' class='form-control' >";
                            
                            } else {

                                echo "
                                <input type='text' id='pancard' name='pancard'  placeholder='Pancard Number' value='$_SESSION[pancard]'; readonly class='form-control'>";
                                
                            }

                            ?>
                            
                        </div>

                        
                        <div class="form-group">
                            <label for="aadhar">Aadhar Number</label>
                            <input type="text" id="aadhar" name="aadhar"  placeholder="Aadhar Number" class="form-control"
                            value="">
                        </div>
    
                        <div class="form-group">
                            <input type="submit" name='p_sub' value="Update Profile" class="btn btn-primary btn-block" style="padding: .5rem;">
                        </div>
                        </form>
                    
                    </div>
                
                </div>
            
            </div>

        </div>
    
    </section>

<?php 
include "includes/footer.php";
?>

