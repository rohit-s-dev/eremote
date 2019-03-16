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
                    
                        <form action="" method="post">
                        <?php 
                        $uid = $_SESSION['userid'];

                        if( isset( $_POST['b_up']) ) {

                        $b_acc_numb = $_POST['b_acc_numb'];
                        $ifsc = $_POST['ifsc'];
                        $bank_name = $_POST['bank_name'];
                        $bank_branch = $_POST['bank_branch'];
                        // $b_acc_numb = $_POST['b_acc_numb'];
                        // $b_acc_numb = $_POST['b_acc_numb'];
                                
                            $inf = " UPDATE user SET ";
                            $inf .= " bank_acc_numb = '$b_acc_numb' , ";
                            $inf .= " ifsc = '$ifsc' , ";
                            $inf .= " bank_name = '$bank_name' , ";
                            $inf .= " bank_branch = '$bank_branch'  ";
                            $inf .= " WHERE userid = '$uid' ";

                            $inf_q = mysqli_query( $con, $inf );
                            
                            if( $inf_q ) {
                                
                                echo "
                            
                                <script>
                                
                                    swal({
                                        title: 'Success',
                                        type: 'success',
                                        text: 'Bank Detail Updated'
                                    });
                                    
                                </script>
                                
                                ";
                                
                                $_SESSION['b_acc_numb'] = $b_acc_numb;
                                $_SESSION['ifsc'] = $ifsc;
                                $_SESSION['bank_name'] = $bank_name;
                                $_SESSION['bank_branch'] = $bank_branch;

                        } else {
                            echo mysqli_error($con);
                             echo "
                                
                                <script>
                                
                                    swal({
                                        title: 'Error',
                                        type: 'error',
                                        text: 'Something Went Wrong'
                                    });
                                    
                                </script>
                                
                                ";
                            }
                        }

                    ?>
                        <!-- Bank Details -->
                        
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

                        <!-- <div class="form-group">
                            <button  class="btn btn-primary" data-toggle="modal" data-target="#myModal">GET OTP</button>
                            <input type="text" name="otp" placeholder="otp" >
                        </div> -->

                        <div class="form-group">
                            <input type="submit" value="Update Profile" name='b_up' class="btn btn-primary btn-block" style="padding: .5rem;">
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
