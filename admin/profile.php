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
                    
                        <form action="" post="get">
                        
                            <div class="form-group">

                                <label for="userid">USER ID</label>
                                <input type="text" name="userid" class="form-control" id="userid" required placeholder="user id" value="<?php echo $_SESSION['userid']; ?>">

                            </div>

                            <div class="form-group">

                                <label for="userid">First Name</label>
                                <input type="text" name="firstname" class="form-control" id="firstname" required placeholder="Firstname" value="<?php echo $_SESSION['firstname']; ?>">

                            </div>

                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <input type="text" id="lastname" name="lastname" required placeholder="Lastname" class="form-control" value="<?php echo $_SESSION['lastname']; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="m_numb">Mobile Number</label>
                                <input type="text" id="m_numb" name="m_numb" required placeholder="Mobile Number" class="form-control" value="<?php echo $_SESSION['m_numb']; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" required placeholder="Email ID" class="form-control" value="<?php echo $_SESSION['email']; ?>">
                            </div>
                            
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="state">State</label>
                                    <input type="text" id="state" name="state" required placeholder="State" class="form-control" value="<?php echo $_SESSION['state']; ?>">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="district">District</label>
                                        <input type="text" id="district" name="district" required placeholder="District" class="form-control"
                                        value="<?php echo $_SESSION['district']; ?>">
                                    </div>
                                </div>
                            
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <input type="text" id="country" name="country" required placeholder="Country" class="form-control" value="<?php echo $_SESSION['country']; ?>">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="pincode">Pincode</label>
                                        <input type="text" id="pincode" name="pincode" required placeholder="Pincode" class="form-control"
                                        value="<?php echo $_SESSION['pincode']; ?>">
                                    </div>
                                </div>                            
                        </div>

                        <div class="form-group">
                            <label for="pancard">Pancard</label>
                            <input type="text" id="pancard" name="pancard" required placeholder="Pancard Number" value="<?php echo $_SESSION['pancard']; ?>" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="b_acc_numb">Bank Account Number</label>
                            <input type="text" id="b_acc_numb" name="b_acc_numb" required placeholder="Bank Account Number" class="form-control" 
                            value="<?php echo $_SESSION['bank_acc_numb']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="ifsc">IFSC</label>
                            <input type="text" id="ifsc" name="ifsc" required placeholder="IFSC Code" class="form-control" 
                            value="<?php echo $_SESSION['ifsc']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="bank_name">Bank Name</label>
                            <input type="text" id="bank_name" name="bank_name" required placeholder="Bank Name" class="form-control" 
                            value="<?php echo $_SESSION['bank_name']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="bank_branch">Bank Branch</label>
                            <input type="text" id="bank_branch" name="bank_branch" required placeholder="Bank Branch" class="form-control" 
                            value="<?php echo $_SESSION['bank_branch']; ?>">
                        </div>

                        <div class="form-group">
                            <button  class="btn btn-primary" data-toggle="modal" data-target="#myModal">GET OTP</button>
                            <input type="text" name="otp" placeholder="otp" >
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Update Profile" class="btn btn-primary btn-block" style="padding: .5rem;">
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


<!-- OTP MODAL -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm center">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>OTP HAS BEEN SENT ON YOUR MAIL AND MOBILE NUMBER</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
