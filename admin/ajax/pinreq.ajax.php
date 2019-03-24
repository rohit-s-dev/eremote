<?php
include('../includes/initialize.php');
if ( isset($_POST['user_id']) ) {
    $userid = $_POST['user_id'];
    
    $done = " SELECT * FROM pin_req";
    $doneQ = mysqli_query( $con , $done );
    while ($r = mysqli_fetch_assoc( $doneQ )) {
        $date = $r['date'];
    }

    $updatD = "UPDATE pin_req SET `status` = 'done' WHERE `user_id` = '$userid' ";
    $updateDQ = mysqli_query( $con, $updatD );

    if( $updateDQ ) {
        echo "
        <script>
                            
            swal({
                title: 'Sent',
                type: 'success',
                text: 'Pin Request Of $userid Has Been Done'
            });
            setInterval( function(){
                window.location.href = 'pinreq.php' ;
            }, 1000 );
        </script>
        
        ";
    }
}