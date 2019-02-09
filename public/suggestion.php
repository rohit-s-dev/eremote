<?php 
include("inc/header.php");
?>
<section class="su_f">
    <div class="container">
    <div class="table_title">
            <h4 class="text-center mt-2">Help us improve our website !</h4>
            <p class="text-center my-2" >Fill the form for any suggestion .</p>
        </div>
        <div class="row">
            <div class="col-md-8 m-auto">
                <form action="" method="" id="su_f">
                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="example@example.com">
                    </div>
                    <!-- Your Number -->
                    <div class="form-group">
                        <label for="number">Number</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="your number">
                    </div>
                    <!-- Email -->
                    <div class="form-group">
                        <label for="messg">Your Suggestion</label>
                        <textarea name="messg" id="messg" cols="30" rows="10" class="form-control" placeholder="Your Suggestion"></textarea>
                    </div>
                    <div class="form-group">
                    <button type="submit" value="suggestion" name="suggestion" class="btn submit-btn hvr-right mt-30 w-100">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php 
include("inc/footer.php");
?>