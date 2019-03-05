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
                <h2>User Full Detail</h2>
            </div>
        </div>


        <?php 
        
        if(isset($_GET['id'])) {
            $userid = $_GET['id'];

            $sql_r = "SELECT * FROM user WHERE userid = '$userid' ";
            $sql_result = mysqli_query($con , $sql_r);

            while($rows = mysqli_fetch_assoc($sql_result)) {
                $userid = $rows['userid'];
                $firstname = $rows['firstname'];
                $lastname = $rows['lastname'];
                $joining_date = $rows['joining_date'];
                $exp_date = $rows['exp_date'];
                $m_numb = $rows['m_numb'];
                $email = $rows['email'];
                $district = $rows['district'];
                $state = $rows['state'];
                $pincode = $rows['pincode'];
                $country = $rows['country'];
                $pancard = $rows['pancard'];
                $bank_acc_numb = $rows['bank_acc_numb'];
                $ifsc = $rows['ifsc'];
                $bank_name = $rows['bank_name'];
                $bank_branch = $rows['bank_branch'];
            }
        }
        
        ?>


        <div class="section">
            <!-- User Detail -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                User ID : <?php echo $userid; ?>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="firstname">First Name</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name='firstname' placeholder="FIRST NAME" value="<?php echo strtoupper($firstname); ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="lastname">Last Name</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name='lastname' placeholder="LAST NAME" value="<?php echo strtoupper($lastname); ?>">
                                        </div>
                                    </div>


                                    <!-- Dates -->
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="joining_date">Joining Date</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name='joining_date' placeholder="JOINING DATE" value="<?php echo $joining_date; ?>">
                                        </div>

                                        <div class="col-md-3">
                                            <label for="exp_date">Exp Date</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name='exp_date' placeholder="EXP DATE" value="<?php echo $exp_date; ?>" >
                                        </div>
                                    </div>

                                    <!-- Heading -->
                                    <div class="bg-deep-purple" style="margin: 1rem 0; padding: .12px; padding-left: 15px;">
                                        <h5>Contact Details</h5>
                                    </div>

                                    <!-- Contacts -->
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="m_numb">Mobile Number</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name='m_numb' placeholder="MOBILE NUMBER" value="<?php echo $m_numb; ?>">
                                        </div>

                                        <div class="col-md-3">
                                            <label for="email">Email</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name='email' placeholder="EMAIL" value="<?php echo $email; ?>">
                                        </div>
                                    </div>

                                    <!-- Contacts -->
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="district">District</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name='district' placeholder="DISTRICT" value="<?php echo $district; ?>">
                                        </div>

                                        <div class="col-md-3">
                                            <label for="state">State</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name='state' placeholder="STATE" value="<?php echo $state; ?>">
                                        </div>
                                    </div>

                                    <!-- Contacts -->
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="pincode">Pincode</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name='pincode' placeholder="PINCODE" value="<?php echo $pincode; ?>">
                                        </div>

                                        <div class="col-md-3">
                                            <label for="country">Country</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name='country' placeholder="COUNTRY" value="<?php echo $country; ?>">
                                        </div>
                                    </div>

                                    <!-- Proofs -->
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="pancard">Pancard</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name='pancard' placeholder="PANCARD" value="<?php echo $pancard; ?>">
                                        </div>

                                        <div class="col-md-3">
                                            <label for="bank_acc">Bank Acc Number</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name='bank_acc' placeholder="BANK ACCOUNT NUMBER" value="<?php echo $bank_acc_numb; ?>">
                                        </div>
                                    </div>

                                    <!-- Proofs -->
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="ifsc">IFSC</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name='ifsc' placeholder="IFSC CODE" value="<?php echo $ifsc; ?>">
                                        </div>

                                        <div class="col-md-3">
                                            <label for="bank_name">Bank Name</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name='bank_name' placeholder="BANK NAME" value="<?php echo $bank_name; ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                           <label for="bank_branch">Bank Branch</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="bank_branch" id="bank_branch" class="form-control" value="<?php echo $bank_branch; ?>">
                                        </div>
                                    </div>

                                    
                                    <!-- Heading -->
                                    <div class="bg-deep-purple" style="margin: 1rem 0; padding: .12px; padding-left: 15px;">
                                        <h5>Document Images</h5>
                                    </div>
                                    
                                  <section>
                                      <div class="row">
                                          <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                          <div id="aniimated-thumbnials" class="list-unstyled row clearfix">

                                          <?php 
                                          
                                          $sql = "SELECT * FROM user WHERE userid = '$userid' ";
                                          $result = mysqli_query($con, $sql);
                              
                                          while ($row = mysqli_fetch_assoc($result)) {
                              
                                              $pp =  $row['profile_pic'];
                                              $ac = $row['aadhar_card_img'];
                                              $pc = $row['pan_card_img'];
                                              $bi = $row['bank_acc_img'];                                          
                                        } 
                                        
                                        ?>

                                        <style>
                                        
                                        .img_pic img {
                                            position: relative;
                                            overflow: hidden;
                                        }

                                        .img_pic span {
                                            position: absolute;
                                            bottom: 0;
                                            background: #000;
                                            color: #fff;
                                            padding: .4rem;
                                            width: 70%;
                                        }
                                        
                                        </style>

                                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">

                                            <?php 
                                                
                                                if (empty($pp)) {
                                                    echo "
                                                    <a class='img_pic' href='images/no-image-found.jpg'>
                                                    <img class='img-responsive thumbnail' src='images/no-image-found.jpg'>
                                                    <span>Profile Photo</span>
                                                    ";

                                                } else {

                                                    echo "
                                                    <a class='img_pic' href='images/$userid/$pp' data-sub-html='Profile Pic'>
                                                    <img class='img-responsive thumbnail' src='images/$userid/$pp'>
                                                    <span>Profile Picture</span>
                                                    </a>

                                                    ";
                                                }
                                                
                                                
                                                ?>                                             
                                            </div>

                                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">

                                                <?php 
                                                
                                                if (empty($ac)) {
                                                    echo "
                                                    <a class='img_pic' href='images/no-image-found.jpg'>
                                                    <img class='img-responsive thumbnail' src='images/no-image-found.jpg'>
                                                    <span>Aadhar Card</span>
                                                    
                                                    ";
                                                } else {
                                                    echo "
                                                    <a  class='img_pic' href='images/$userid/$ac?>' data-sub-html='Aadhar Card'>
                                                    <img class='img-responsive thumbnail' src='images/$userid/$ac'>
                                                    <span>Aadhar Card</span>
                                                </a>
                                                    ";
                                                }

                                            ?>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">

                                            <?php 
                                            
                                            if(empty($pc)) {
                                                echo "<a class='img_pic' href='images/no-image-found.jpg'>
                                                <img class='img-responsive thumbnail' src='images/no-image-found.jpg'>
                                                <span>Pan Card</span>";
                                            } else {
                                                echo "
                                                <a href='images/$userid/$pc' data-sub-html='Pan Card'>
                                                    <img class='img-responsive thumbnail' src='images/$userid/$pc'>
                                                </a>
                                                <span>Pan Card</span>";
                                            }
                                            
                                            ?>
                                          </div>
                                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">

                                            <?php 
                                            
                                            if(empty($bi)) {
                                                echo "
                                                <a class='img_pic' href='images/no-image-found.jpg'>
                                                <img class='img-responsive thumbnail' src='images/no-image-found.jpg'>
                                                <span>Bank Passbook Front </span>
                                                ";
                                            } else {
                                                echo "
                                                
                                                <a href='images/$userid/$bi; ?>' data-sub-html='Bank Passbook Front Page'>
                                                <img class='img-responsive thumbnail' src='images/$userid/$bi'>
                                            </a>
                                                ";
                                            
                                            }
                                            ?>
                                            </div>
                                          </div>
                                          </div>
                                      </div>
                                  </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
<?php 
include "includes/footer.php";
?>