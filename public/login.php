<?php 
include("inc/header.php");
?>
	
	<?php 
	include("inc/b_s.php");
	?>
        <!-- =====>> Start SignUp <<===== 
		============================= -->

        <section class="sign_in">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 m-auto">
                        <form action="" method="post" id="form_">
							<h3 class="my-4"> Login  </h3>

							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label for="mobile">Mobile No. </label>
									</div>
									<div class="col-md-10">
										<input class="f_s_i" type="text" name="mobile" id="mobile" placeholder="Mobile No." data-toggle="tooltip" data-placement="right" title="Your Mobile No">
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
											<input class="f_s_i" type="password" name="pwd" id="pwd" placeholder="Password" data-toggle="tooltip" data-placement="right" title="Type Your Password">
											<!-- <i class="fa fa-eye ps_show"></i>
											<i class="fa fa-eye ps_hide"></i> -->
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" value="Login" name="login" class="btn submit-btn hvr-right mt-30 w-100">Register</button>
							</div>
						</form>
						<div class="sign_in_box text-center my-3">
							<a href="signup.php"><p>Not a member ? sign up here ?</p></a>
							<a href="forgot.php"><p>Forgot password ?</p></a>
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