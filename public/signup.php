<?php 
include("inc/header.php");
?>
	
	<?php 
	include("inc/b_s.php");
	?>
	
        <!-- =====>> Start SignUp <<===== 
		============================= -->

        <section class="sign_up">
            <div class="container">

			<?php 

				if(isset($_GET['ref_id'])) {

					$rf_id = $_GET['ref_id'];
				
					$q_res_ref = "SELECT * FROM user WHERE userid = '$rf_id'";
					$result = mysqli_query($con, $q_res_ref);

					while($row_ref = mysqli_fetch_assoc($result)) {
						$user_id = $row_ref['userid'];
						// echo $user_id;
					}
				}
			?>

			<?php 
				
				if(isset($_POST['register'])) {
					
					$d_h_s_id = $_POST['d_h_s_id'];

					$sponser_id = escape($con, h($_POST['sponser_id']));

					$firstname = escape($con, h($_POST['firstname']));

					$lastname = escape($con, h($_POST['lastname']));

					$mobile = escape($con, h($_POST['mobile']));

					$email = escape($con, h($_POST['email']));

					$pwd = escape($con, h($_POST['pwd']));

					$c_pwd = escape($con, h($_POST['c_pwd']));

					$hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
					$q = "SELECT * FROM user";
					$q_r = mysqli_query($con, $q);

					while($r = mysqli_fetch_assoc($q_r)) {
						$mobile_c = $r['m_numb'];
						$u_id = $r['userid'];
					}

					

					
					if(empty($mobile) || empty($pwd) || empty($c_pwd) || empty($firstname) || empty($lastname) || empty($sponser_id)) {
						 
						
						echo "<script>
						
						swal({

							title: 'Error',
							text: 'Fields Cannot Be Empty',
							type: 'error',
							

						});
						
						
						</script>";

					}/*elseif(!phoneNumbervalidation($mobile)){
					    echo '
						<script>
						swal({
							
							title: "Error",
							text: "Invalid Mobile Number",
							type: "error"
						
						})
						</script>
						';
					} */ elseif ($d_h_s_id === 'Sponsered' && empty($sponser_id)) {
						echo '
						<script>
						swal({
							
							title: "Error",
							text: "Please Type Sponser ID",
							type: "error"
						
						})
						</script>
						';
					}  elseif($pwd !== $c_pwd) {
						echo "<script>
                        swal({
                            title: 'Password Error',
                            text: 'Password Didn't Match',
                            type: 'error'
                        });    
                    </script>";

					}  else {

						if ($d_h_s_id === 'Sponsered') {

                            $sp_q = "SELECT userid FROM user WHERE userid = '$sponser_id' ";
                            $spQ = mysqli_query( $con, $sp_q );

                            $sp_res = mysqli_num_rows($spQ);

                            if ( $sp_res > 0 ) {

                                $q_i = "INSERT INTO user(userid, firstname, lastname, joining_date, password, m_numb, sponsered ) VALUES('$r_user_id', '$firstname', '$lastname', now() , '$hashedpwd' , '$mobile' ,'$sponser_id')";

                                $q_i_res = mysqli_query($con, $q_i);
    
                                if($q_i_res) {
                                
                                    $mob = $mobile;
                                    $mes = "WELCOME TO EREMOTEWORLD   ,";
                                    $mes .= "YOUR USER ID : $r_user_id   ," ;
                                    $mes .= "YOUR SPONSER ID : $sponser_id   ," ;
                                    $mes .= "YOUR PASS : $pwd  ";
                                    
                                    $m = otp($mob, wordwrap($mes, 70));
                                    
                                   
                                        echo "<script>
                                    
                                        swal({
                                            title: 'User Created',
                                            text: 'Your User ID: $r_user_id Please Check Your Mobile ',
                                            type: 'success',
                                            button: 'OK'
                                        });
    
									</script>";
                                  
									
                                }
                            } else {
                                echo "<script>
                                    
                                        swal({
                                            title: 'Error',
                                            text: 'Invalid Sponser ID',
                                            type: 'error',
                                            button: 'OK'
                                        });
    
                                </script>";
                            }

                        } else {

                            $q_i = "INSERT INTO user(userid, firstname, lastname, joining_date, password, m_numb, sponsered ) VALUES('$r_user_id', '$firstname', '$lastname', now() , '$hashedpwd' , '$mobile' ,'$sponser_id')";

                                $q_i_res = mysqli_query($con, $q_i);
    
                                if($q_i_res) {
                                    
                                    $mob = $mobile;
                                    $mes = "WELCOME TO EREMOTEWORLD  ,";
                                    $mes .= "YOUR USER ID : $r_user_id  ," ;
                                    $mes .= "YOUR SPONSER ID : Eremote  ," ;
                                    $mes .= "YOUR PASS : $pwd  ";
                                    
                                    $m = otp($mob, wordwrap($mes, 70));
                                    
                                    
                                        echo "<script>
                                    
                                        swal({
                                            title: 'User Created',
                                            text: 'Your User ID: $r_user_id Please Check Your Mobile ',
                                            type: 'success',
                                            button: 'OK'
                                        });
    
									</script>";
                               
									
                                }

                        }

					}
					
				}

				?>

                <div class="row">
                    <div class="col-md-8 m-auto">
                        <form action="" method="post" id="form_" autocomplete="off">
							<h3 class="my-4"> Sponser ID </h3>
							<div class="form-group">
								<div class="sp_id">
									<label for="d_h_s_id">Do you have sponser ID ? </label>
								<select name="d_h_s_id" id="d_h_s_id">

									<?php 
									if(isset($_GET['ref_id'])) {
										echo '<option value="Sponsered">Yes</option>';
									} else {
										echo '
										<option value="Direct">No</option>
										<option value="Sponsered">Yes</option>';
									}
									
									?>
									
								</select>
								</div>
							</div>


						

					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label for="sponser_id">Sponser ID </label>
							</div>
							<div class="col-md-10">
								<input autocomplete="false" class="f_s_i" type="text"  name="sponser_id" value='Eremote' id="sponser_id" placeholder="Sponser ID"  data-toggle="tooltip" value="<?php if (isset($_GET['ref_id'])) { echo $rf_id;} ?>">
							</div>
							
						</div>
					</div>
					
										<div class="form-group">
						<div class="row">

							<div class="col-md-2">
								<label id='s_nl' for="sponser_id">Sponser Name </label>
							</div>

							<div class="col-md-10">
								<input type="text" name="s_name" id="s_name" class='f_s_i' style='background-color:#f5f5f5'>
								<!-- <textarea name="s_name" id="s_name" class='f_s_i' cols="30" rows="10" style='background-color:#f5f5f5'></textarea> -->
							</div>

						</div>
					</div>
				
					<div id='showr'>
					</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label for="firstname">First Name</label>
									</div>
									<div class="col-md-10">
										<input class="f_s_i" type="text" name="firstname" id="firstname" placeholder="Your First Name">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label for="lastname">Last Name</label>
									</div>
									<div class="col-md-10">
										<input class="f_s_i" type="text" name="lastname" id="lastname" placeholder="Your Last Name" >
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label for="mobile">Mobile No. </label>
									</div>
									<div class="col-md-10">
									    <div class='input-grpup'>
									       <div class="input-group-prepend">
                                            <div class="input-group-text">+91</div>
											<input class="f_s_i" type="text" name="mobile" id="mobile" placeholder="Mobile No." maxlength="10"  onkeypress="if(event.keyCode<48 || event.keyCode>57)event.returnValue=false;">
										 </div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label for="email">Email </label>
									</div>
									<div class="col-md-10">
										<div class="ps">
											<input  autocomplete="false" class="f_s_i" type="email" name="email" id="" placeholder="Email">
											<!-- <i class="fa fa-eye ps_show"></i>
											<i class="fa fa-eye ps_hide"></i> -->
										</div>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label for="pwd">Password </label>
									</div>
									<div class="col-md-10">
										<div class="ps">
											<input autocomplete="false" class="f_s_i" type="password" name="pwd" id="pwd" placeholder="Password">
											<!-- <i class="fa fa-eye ps_show"></i>
											<i class="fa fa-eye ps_hide"></i> -->
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label for="c_pwd">Confirm Password </label>
									</div>
									<div class="col-md-10">
										<div class="ps">
											<input class="f_s_i" type="password" name="c_pwd" id="c_pwd" placeholder="Confirm Password" >
											<!-- <i class="fa fa-eye ps_show"></i>
											<i class="fa fa-eye-slash ps_hide" ></i> -->
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="t_c_box">
								<label for="t_c_ag">Agree with Terms & Conditions?  </label>
								<input class="f_s_itext-right mx-1" type="checkbox" name="" id="">
							</div>
							<div class="form-group">
								<button type="submit" value="Register" name="register" class="btn submit-btn hvr-right mt-30 w-100">Register</button>
							</div>
						</form>
						<div class="sign_in_box text-center my-3">
							<a href="login.php"><p>already a member ?</p></a>
						</div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- =====>> END Of SignUp  <<===== 
		============================= --> 
<?php 
include("inc/footer.php");
?>