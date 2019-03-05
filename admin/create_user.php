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

            <div class="row">

                <div class="col-md-8 col-md-offset-2">

                    <div class="p_text">
                    <h4 class="text-center p_title">User Profile</h4>
                    </div>

                    <div id="profile">
                    
                        <form action="" method="post">

                        <?php 
                        
                            if(isset($_POST['sub_u'])) {
                                $uid = $_POST['userid'];
                            }
                        
                        
                        ?>
                        
                            <div class="form-group">

                                <label for="userid">USER ID</label>
                                <input type="text" name="userid" class="form-control" id="userid"  placeholder="user id" value="">
                            </div>

                            <div class="form-group">

                                <label for="userid">First Name</label>
                                <input type="text" name="firstname" class="form-control" id="firstname"  placeholder="Firstname" value="">

                            </div>

                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <input type="text" id="lastname" name="lastname"  placeholder="Lastname" class="form-control" value="">
                            </div>
                            
                            <div class="form-group">
                                <label for="m_numb">Mobile Number</label>
                                <input type="text" id="m_numb" name="m_numb"  placeholder="Mobile Number" class="form-control" value="">
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email"  placeholder="Email ID" class="form-control" value="">
                            </div>
                            
                        <div class="form-group">
                            <input type="submit" name='sub_u' value="Create User" class="btn btn-primary btn-block" style="padding: .5rem;">
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
