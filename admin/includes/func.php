<?php


// escaping htmentities
function h($value= '') {
    return htmlspecialchars($value);
}

// mysqli escaping
function escape($con, $value) {
    return mysqli_real_escape_string($con, $value);
}

// less than
function less_than($value , $max) {
    $length = strlen($value);
    return $length < $max ;
}


// random user id
function rand_user_id() {
    $rand = random_int(1,999999999);
    return 'eremote'.$rand;
}

// email validation preg
function e_valid($value) {
    $match = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix';
    if(preg_match($match, $value)) {
        return  true;
    } else {
        return false;
    }
}

// mobile_number validation
function m_numb($value) {
    $match = '/^[0-9]{10}+$/';
    if(preg_match($match, $value)) {
        return  true;
    }  else {
        return false;
    }
}

// photo image validation
function pp($tmp_file, $file_name, $file_sz, $w, $h, $d, $u_id, $con, $v, $v_f) {

    $file_info = getimagesize($tmp_file);
    
    $width = $file_info[0];
    $height = $file_info[1];

    $allowed_file_ext = array(

        "jpg",
        "jpeg",
        "png"

    );

    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

    // Validating File 
    if(empty($file_name) || !file_exists($tmp_file)) {

        echo "
                            
            <script>
        

            swal({

                type: 'error',
                title: 'Error',
                text: 'Please Choose An Image Or Try To Rename Your File'

            });
        
        
            </script>
                            
                            
        ";

    } elseif(!in_array($file_ext, $allowed_file_ext)) {
        echo "swal({

            title: 'Error'
            text: 'Please Upload jpg, jpeg or png format image',
            type: 'error'
        });";
    } elseif ($file_sz > 1000000) {
        echo "
        <script>
            
            swal({

                title: 'Error',
                text: 'Image Size Greater Than 1mb',
                type: 'error'

            });
        
        </script>
        
        ";
    } elseif ($width > $w && $height > $h) {
        echo "swal({

            title: 'Error',
            text: 'Image Width Or Image Height Is Greater Than 200px Please Upload 200x200 px Image',
            type: 'error'
        
        })";
    
    } else {

        $sq = "UPDATE user SET $v = '$v_f' WHERE userid = '$u_id'";
        $q_q = mysqli_query($con, $sq);


        if($q_q) {
            $moved = move_uploaded_file($tmp_file, "$d/$file_name");

            if($moved) {
                echo "
                
                <script>
                
                swal({
    
                    title: 'Success',
                    text: 'Uploaded Succesfuly',
                    type: 'success'
    
                });
                
                </script>
                
                ";
            } else{
                echo "
                
                <script>
                
                swal({
    
                    title: 'Error',
                    text: 'Something Went Wrong Please Try Again',
                    type: 'warning'
    
                });
                
                </script>
                
                ";
            }
        }
        
    }

}

// Pin Quantity
function pin_quantity($amount) {
    $pin = 3100;

    $quantity = $amount / 3100;
    return $quantity;

}