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
    return 'ER'.$rand;
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


function sendto() {
    return $send_to = 'support@eremoteworld.com';
}

// multi mail function
function multi_attach_mail($to, $subject, $message, $senderMail, $senderName, $files){
    $to = sendto();
    $senderName = 'Incomehouse Webiste Portal';
    $from = $senderName." <".$senderMail.">"; 
    $headers = "From: $from";

    // boundary 
    $semi_rand = md5(time()); 
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

    // headers for attachment 
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

    // multipart boundary 
    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
    "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n"; 

    // preparing attachments
    if(count($files) > 0){
        for($i=0;$i<count($files);$i++){
            if(is_file($files[$i])){
                $message .= "--{$mime_boundary}\n";
                $fp =    @fopen($files[$i],"rb");
                $data =  @fread($fp,filesize($files[$i]));
                @fclose($fp);
                $data = chunk_split(base64_encode($data));
                $message .= "Content-Type: application/octet-stream; name=\"".basename($files[$i])."\"\n" . 
                "Content-Description: ".basename($files[$i])."\n" .
                "Content-Disposition: attachment;\n" . " filename=\"".basename($files[$i])."\"; size=".filesize($files[$i]).";\n" . 
                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
            }
        }
    }

    $message .= "--{$mime_boundary}--";
    $returnpath = "-f" . $senderMail;

    //send email
    $mail = @mail($to, $subject, $message, $headers, $returnpath); 

    //function return true, if email sent, otherwise return false
    if($mail){ return TRUE; } else { return FALSE; }

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

// Mail Function


// Pin Request 
$pin_am = 3100;

// Default Value
$def_spon = 'Eremote';