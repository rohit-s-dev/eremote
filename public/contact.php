<?php 
include("inc/header.php");
?>

<section class="contct">
    <div class="container">
    <div class="table_title my-5">
            <h4 class="text-center mt-2">CONTACT US</h4>
            <p class="text-center my-2" >Got any questions for us ?</p>
        </div>
    <div class="row">
        <div class="col-md-6">
            <div class="ct_add_box">
                <div class="add_box">
                    <h5 class="add_box_t">Address</h5>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugiat, exercitationem.</p>
                    <div class="ic_b">
                        <i class="fa fa-home"></i>
                    </div>
                </div>
                <div class="add_box">
                    <h5 class="add_box_t">Email</h5>
                    <p><a href="mailto:support@eremoteworld.com">support@eremoteworld.com</a></p>
                    <div class="ic_b">
                        <i class="fa fa-envelope"></i>
                    </div>
                </div>
                <div class="add_box">
                    <h5 class="add_box_t">Contact</h5>
                    <p><a href="tel:+91-8210762399">+91-8210762399</a></p>
                    <div class="ic_b">
                        <i class="fa fa-phone"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="c_form">
                <form action="" method="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="f_n">First Name</label>
                                <input type="text" class="form-control" name="f_n" placeholder="First Name" id="f_n">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="l_n">Last Name</label>
                                <input type="text" class="form-control" name="l_n" placeholder="Last Name" id="l_n">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Your Email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="ct_no">Contact No .</label>
                        <input type="text" class="form-control" name="ct_no" placeholder="Contact No ." id="ct_no">
                    </div>
                    <div class="form-group">
                        <label for="ct_msg">Message .</label>
                        <textarea type="text" class="form-control" name="ct_msg" placeholder="Message" id="ct_msg" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                    <button type="submit" value="contact" name="contact" class="btn submit-btn hvr-right mt-30 w-100 btn_bg text-white">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</section>

<?php 
include("inc/footer.php");
?>