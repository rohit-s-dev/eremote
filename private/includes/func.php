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


function phoneNumbervalidation($mobile){
if(preg_match('/^(\+[\d]{1,5}|0)?[7-9]\d{9}$/', $mobile,$matches)){
// print_r($matches);
return true;
}
else
return false;
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





// Mailer Function

function u_s($email, $body) {
$subject = "Your Details";
$body ='';
$body .='';
// Enter Your Email Address Here To Receive Email
$email_to = $email;
 
$email_from = "test@utglobe.com"; // Enter Sender Email
$sender_name = "Eremoteworld"; // Enter Sender Name
require("PHPMailer/PHPMailer/PHPMailerAutoload.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "mail.eremoteworld.com"; // Enter Your Host/Mail Server
$mail->SMTPAuth = true;
$mail->Username = "noreply@eremoteworld.com"; // Enter Sender Email
$mail->Password = "Rohit@utsav1";
//If SMTP requires TLS encryption then remove comment from below
$mail->SMTPSecure = "tls";
$mail->Port = 587;
$mail->IsHTML(true);
$mail->From = $email_from;
$mail->FromName = $sender_name;
$mail->Sender = $email_from; // indicates ReturnPath header
$mail->AddReplyTo($email_from, "No Reply"); // indicates ReplyTo headers
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AddAddress($email_to);
// If you know receiver name use following
//$mail->AddAddress($email_to, "Recepient Name");
// To send CC remove comment from below
//$mail->AddCC('username@email.com', "Recepient Name");
// To send attachment remove comment from below
//$mail->AddAttachment('files/readme.txt');
/*
Please note file must be available on your
host to be attached with this email.
*/
 
$mail->send();

// if( $mail->send() ) {
//     echo "
//     <script>
//         swal({
//             title: 'Check Your Mail',
//             type: 'success'
//         });
//     </script>
//     ";
// } else {
//     echo "
//     <script>
//         swal({
//             title: 'Error',
//             type: 'error'
//         });
//     </script>
//     ";
// }

}




// OTP Send

function otp($mob, $mes) {
    
//Change your configurations here.
//---------------------------------
$username="eremote";
$api_password="chacha@420";
$sender="EREMOT";
$domain="www.hellopatna.com";
$priority="2";
$method="POST";

//---------------------------------
	$username=urlencode($username);
	// $password=urlencode($password);
	$sender=urlencode($sender);
	$mes=urlencode($mes);
	
	$parameters="username=$username&password=$api_password&senderid=$sender&to=$mob&message=$mes&route=$priority&flash=0&nonenglish=0";

	if($method=="POST")
	{
		$opts = array(
		  'http'=>array(
			'method'=>"$method",
			'content' => "$parameters",
			'header'=>"Accept-language: en\r\n" .
					  "Cookie: foo=bar\r\n"
		  )
		);

		$context = stream_context_create($opts);

		$fp = fopen("http://$domain/smsapi/sendsms?", "r", false, $context);
	}
	else
	{
		$fp = fopen("http://$domain/smsapi/sendsms?$parameters", "r");
	}

	$response = stream_get_contents($fp);
	fpassthru($fp);
	fclose($fp);


	if($response=="")
	echo "Process Failed, Please check domain, username and password.";
	else
	echo "$response";

}


// Pin Request 
$pin_am = 3100;

// Default Value
$def_spon = 'Eremote';


// Exp Date-------------------------------------------------------------------------

$e_date =  date('z');



// Clear Browser Cache
