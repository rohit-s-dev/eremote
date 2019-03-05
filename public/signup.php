<?php 
include("inc/header.php");
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

					$pwd = escape($con, h($_POST['pwd']));

					$c_pwd = escape($con, h($_POST['c_pwd']));

					$hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

					$q = "SELECT * FROM user";
					$q_r = mysqli_query($con, $q);

					while($r = mysqli_fetch_assoc($q_r)) {
						$mobile_c = $r['m_numb'];
						$u_id = $r['userid'];
					}

					

					
					if(empty($mobile) || empty($pwd) || empty($c_pwd) || empty($firstname) || empty($lastname)) {
						
						
						echo "<script>
						
						swal({

							title: 'Error',
							text: 'Fields Cannot Be Empty',
							type: 'error',
							

						});
						
						
						</script>";

					} elseif($d_h_s_id === 'Direct' && !empty($sponser_id)){
						
						echo '
						<script>
						swal({
							
							title: "Error",
							text: "Sponser ID Must Be Empty If Do not have Sponser ID ",
							icon: "warning"
						
						})
						</script>
						';

					} elseif ($d_h_s_id === 'Sponsered' && empty($sponser_id)) {
						echo '
						<script>
						swal({
							
							title: "Error",
							text: "Please Type Sponser ID",
							type: "error"
						
						})
						</script>
						';
					} elseif($pwd !== $c_pwd) {
						echo "<div class='alert alert-danger alert-dismissable fade show'>
							<button type='button' class='close' data-dismiss='alert'>
							&times;</button>
							<strong>Password Didn't Matched</strong>						
						</div>";

					} elseif($mobile === $mobile_c) {
						echo "<div class='alert alert-danger alert-dismissable fade show'>
						<button type='button' class='close' data-dismiss='alert'>
						&times;</button>
						<strong>User Already Exist</strong>						
					</div>";

					} else {
						$r_user_id;

						if(!isset($_GET['ref_id'])) {
							$user_id = 'Direct';
						} 

						$q_i = "INSERT INTO user(userid, firstname, lastname, password, m_numb, sponsered, direct, added_by ) VALUES('$r_user_id', '$firstname', '$lastname', '$hashedpwd' , '$mobile' ,'$sponser_id', '$d_h_s_id', '$user_id')";

						$q_i_res = mysqli_query($con, $q_i);

						if($q_i_res) {
							
							echo "<script>
							
								swal({
									title: 'User Created',
									text: 'Your User ID: $r_user_id',
									type: 'success',
									button: 'OK'
								});

							</script>";

						} else {
							echo "<div class='alert alert-danger alert-dismissable 	fade show'>
								<button type='button' class='close' data-dismiss='alert'>
								&times;</button>
								<strong> Something Went Wrong </strong>
							</div>";
						}

					}
					
				}

				?>




                <div class="row">
                    <div class="col-md-8 m-auto">
                        <form action="" method="post" id="form_">
							<h3 class="my-4"> Sponser ID </h3>
							<div class="form-group">
								<div class="sp_id">
									<label for="d_h_s_id">Do not have sponser ID ? </label>
								<select name="d_h_s_id" id="d_h_s_id">

									<?php 
									if(isset($_GET['ref_id'])) {
										echo '<option value="Sponsered">Yes</option>';
									} else {
										echo '<option value="Sponsered">Yes</option>
										<option value="Direct">No</option>';
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
								<input class="f_s_i" type="text" name="sponser_id" id="sponser_id" placeholder="Sponser ID"  data-toggle="tooltip" data-placement="right" title="Sponser ID if you have ." value="<?php if (isset($_GET['ref_id'])) { echo $rf_id;} ?>">
							</div>
						</div>
					</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label for="firstname">First Name</label>
									</div>
									<div class="col-md-10">
										<input class="f_s_i" type="text" name="firstname" id="firstname" placeholder="Your First Name" data-toggle="tooltip" data-placement="right" title="Your First Name">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label for="lastname">Last Name</label>
									</div>
									<div class="col-md-10">
										<input class="f_s_i" type="text" name="lastname" id="lastname" placeholder="Your Last Name" data-toggle="tooltip" data-placement="right" title="Your Last Name">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label for="mobile">Mobile No. </label>
									</div>
									<div class="col-md-10">
										<input class="f_s_i" type="text" name="mobile" id="mobile" placeholder="Mobile No." data-toggle="tooltip" data-placement="right" title="Your Mobile No (mobile number must include +91 and does not contain spaces between them .)" maxlength="10"  onkeypress="if(event.keyCode<48 || event.keyCode>57)event.returnValue=false;">
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
											<input class="f_s_i" type="password" name="pwd" id="pwd" placeholder="Password" data-toggle="tooltip" data-placement="right" title="Password must contain one letter and and a symbol and length should be more than 4 characters">
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
											<input class="f_s_i" type="password" name="c_pwd" id="c_pwd" placeholder="Confirm Password" data-toggle="tooltip" data-placement="right" title="password should match ">
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