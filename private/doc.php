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

                    <?php
                    
                    
                        // profile Photo Upload
                        if(isset($_POST['pp_sub'])) {

                        $pp = $_FILES['pp']['name'];
                        $pp_tmp = $_FILES['pp']['tmp_name'];
                        $pp_sze = $_FILES['pp']['size'];

                        $d = "../upload/".$_SESSION['userid'];
                        if(!file_exists($d)) {
                            mkdir($d, 0755);
                        }

                        $w = '200';
                        $h = '200';
                        $u_id = $_SESSION['userid'];
                        $v = 'profile_pic';
                        $v_f = $pp;

                        $pp_up = pp($pp_tmp, $pp, $pp_sze, $w, $h, $d, $u_id, $con, $v, $v_f);

                        }


                        // Pan Card Image Upload
                        if(isset($_POST['pan_sub'])) {

                            $pan = $_FILES['pan']['name'];
                            $pan_tmp = $_FILES['pan']['tmp_name'];
                            $pan_sze = $_FILES['pan']['size'];
    
                            $d = "../upload/".$_SESSION['userid'];
                            if(!file_exists($d)) {
                                mkdir($d);
                            }
    
                            $w = '2000';
                            $h = '2000';
                            $u_id = $_SESSION['userid'];
                            $v = 'pan_card_img';
                            $v_f = $pan;
    
                            $pan_up = pp($pan_tmp, $pan, $pan_sze, $w, $h, $d, $u_id, $con, $v, $v_f);
    
                        }


                        // Aadhar Card Image Upload
                        if(isset($_POST['ac_sub'])) {

                            $ac = $_FILES['ac']['name'];
                            $ac_tmp = $_FILES['ac']['tmp_name'];
                            $ac_sze = $_FILES['ac']['size'];
    
                            $d = "../upload/".$_SESSION['userid'];
                            if(!file_exists($d)) {
                                mkdir($d);
                            }
    
                            $w = '2000';
                            $h = '2000';
                            $u_id = $_SESSION['userid'];
                            $v = 'aadhar_card_img';
                            $v_f = $ac;
    
                            $ac_up = pp($ac_tmp, $ac, $ac_sze, $w, $h, $d, $u_id, $con, $v, $v_f);
    
                        }

                        // Bank Image Upload
                        if(isset($_POST['pc_f_c_sub'])) {

                            $pc_f_c = $_FILES['pc_f_c']['name'];
                            $pc_f_c_tmp = $_FILES['pc_f_c']['tmp_name'];
                            $pc_f_c_sze = $_FILES['pc_f_c']['size'];
    
                            $d = "../upload/".$_SESSION['userid'];
                            if(!file_exists($d)) {
                                mkdir($d);
                            }
    
                            $w = '2000';
                            $h = '2000';
                            $u_id = $_SESSION['userid'];
                            $v = 'bank_acc_img';
                            $v_f = $pc_f_c;
    
                            $b_up = pp($pc_f_c_tmp, $pc_f_c, $pc_f_c_sze, $w, $h, $d, $u_id, $con, $v, $v_f);
    
                        }


                        $id = $_SESSION['userid'];
                        // quering
                        $sql = "SELECT * FROM user WHERE userid = '$id' ";
                        $result = mysqli_query($con, $sql);

                        while($r = mysqli_fetch_assoc($result)) {
                            $profile_pic = $r['profile_pic'];
                            $pan_card_img = $r['pan_card_img'];
                            $aadhar_card_img = $r['aadhar_card_img'];
                            $bank_acc_img = $r['bank_acc_img'];
                        }
                        
                    ?>




                <div class="col-md-12">

                    <div class="p_text">
                        <h4 class="text-center p_title">Documnets</h4>
                    </div>

                    <table class="table" style="background: #fff;">
                        <thead>
                            <tr>
                                <th>Document</th>
                                <th>Upload Image</th>
                                <th>Submit</th>
                                <th>View Image</th>
                                <!-- <th>Update Image</th> -->
                                <!-- <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Email</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Photo -->
                            <tr>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <td>Photo</td>

                                    <td><input type="file" name="pp"></td>
                                    <td><input type="submit" class='btn btn-primary' name='pp_sub' value="Submit"></td>
                                </form>
                                <td>
                                    <?php 
                                        
                                        if(!empty($profile_pic)) {

                                            echo "

                            <a href='../upload/$id/$profile_pic'>View Image</a>";
                                        } else {
                                            echo "No Image";
                                        }
                                    ?>
                                </td>
                                
                            </tr>
                            <!-- Pancard -->
                            <tr>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <td>Pan Card</td>
                                    <td><input type="file" name="pan"></td>
                                    <td><input type="submit" class='btn btn-primary' name='pan_sub' value="Submit"></td>
                                </form>
                                <td>
                                <?php 
                                        
                                if(!empty($pan_card_img)) {

                                    echo "

                                    <a href='../upload/$id/$pan_card_img'>View Image</a>";
                                } else {
                                    echo "No Image";
                                }


                                    ?>
                                </td>
                                <!-- <td><a href="">Update</a></td> -->
                            </tr>
                            <!-- Photo -->
                            <tr>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <td>Aadhar Card</td>
                                    <td><input type="file" name="ac"></td>
                                    <td><input type="submit" class='btn btn-primary' name='ac_sub' value="Submit"></td>
                                </form>
                                <td>
                                <?php 
                                        
                                        if(!empty($aadhar_card_img)) {

                                            echo "

                            <a href='../upload/$id/$aadhar_card_img'>View Image</a>";
                                        } else {
                                            echo "No Image";
                                        }
                                        
                                    ?>
                                </td>
                                <!-- <td><a href="">Update</a></td> -->
                            </tr>
                            <!-- Photo -->
                            <tr>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <td>Passbook First Page</td>
                                    <td><input type="file" name="ps_f_c"></td>
                                    <td><input type="submit" class='btn btn-primary' name='pc_f_c_sub' value="Submit"></td>
                                </form>
                                <td><?php 
                                        
                                        if(!empty($bank_acc_img)) {

                                            echo "

                            <a href='../upload/$id/$bank_acc_img'>View Image</a>";
                                        } else {
                                            echo "No Image";
                                        }


                                    ?></td>
                                <!-- <td><a href="">Update</a></td> -->
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>

            <div class='dc'>
                <ul>
                    <li>Profile Photo must be less than 1mb and sqaure </li>
                    <li>Profile Photo must be in 200 x 200  </li>
                    <li>All Documents must be less than 1 mb </li>
                    <li>Documents should be in png, jpg, jpeg format and clear</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Documents Related Info -->

<?php 
include "includes/footer.php";
?>

