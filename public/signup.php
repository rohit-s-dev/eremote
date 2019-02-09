<?php 
include("inc/header.php");
?>
	
        
        <!-- =====>> Start SignUp <<===== 
		============================= -->

        <section class="sign_up">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 m-auto">
                        <form action="" method="post" id="form_">
							<h3 class="my-4"> Sponser ID </h3>
							<div class="form-group">
								<div class="sp_id">
									<label for="d_h_s_id">Do not have sponser ID ? </label>
							<input type="checkbox" name="d_h_s_id" id="d_h_s_id" place>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label for="sponser_id">Sponser ID </label>
									</div>
									<div class="col-md-10">
										<input class="f_s_i" type="text" name="sponser_id" id="sponser_id" placeholder="Sponser ID"  data-toggle="tooltip" data-placement="right" title="Sponser ID if you have .">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label for="name">Your Name</label>
									</div>
									<div class="col-md-10">
										<input class="f_s_i" type="text" name="name" id="name" placeholder="Your Name" data-toggle="tooltip" data-placement="right" title="Your Full Name">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label for="mobile">Mobile No. </label>
									</div>
									<div class="col-md-10">
										<input class="f_s_i" type="text" name="mobile" id="mobile" placeholder="Mobile No." data-toggle="tooltip" data-placement="right" title="Your Mobile No (mobile number must include +91 and does not contain spaces between them .)">
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
								<input class="f_s_itext-right mx-1" type="checkbox" name="t_c_ag" id="t_c_ag">
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