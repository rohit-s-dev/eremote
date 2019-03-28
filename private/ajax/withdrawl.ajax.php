<?php

include('../includes/initialize.php');

$uid = $_SESSION['userid'];
if ( $_POST['amount'] ) {

    // echo $uid;

    $amount = mysqli_escape_string( $con, $_POST['amount'] );
    
    $sq = " INSERT INTO wallet (`userid` , `amount` , `date`) ";
    $sq .= "  VALUES ( '$uid' , '$amount' , `now()` ) ";
    
    $sqQ = mysqli_query( $con, $sq );

 if ( $sqQ ) {

    echo "
    
    <script>
        swal({

            title: 'Succes',
            type: 'succes',
            text: 'Withdrawl Request Has Been Sent'
        
        });
    </script>

    ";

 } else {
    echo "
    <script>
        swal({
            title: 'Something Went Wrong',
            type: 'error',
            text: 'error'
        });
    </script>
    ";
 }
}
 
if (isset($_POST['am_ch'])) {
    
    $am_ch = $_POST['am_ch'];

    if ( !is_int($am_ch) ) {
        echo "Please use number";
    }
}
