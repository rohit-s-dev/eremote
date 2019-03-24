<?php
include('../includes/initialize.php');
// active

if ( isset( $_POST['ac_uid'] ) ) {
    $ac_uid = escape( $con, $_POST['ac_uid'] ) ;

    $ac = "UPDATE user SET status = 'active' WHERE `userid` = '$ac_uid' ";

    $acQ = mysqli_query( $con, $ac );

    if ( $acQ ) {

        echo "
            <script>
                swal({
                    title: 'Activated',
                    type: 'success',
                    text: '$ac_uid has been activated '
                });
            </script>
        ";

    } else {
        echo "
            <script>
                swal({
                    title: 'Error',
                    type: 'error',
                    text: 'something went wrong'
                });
                setInterval( function(){
                    window.location.href = 'reports.php' ;
                }, 1000 );
                
            </script>
        ";
    }


}


// Inactive
if ( isset( $_POST['inactive'] ) ) {
    $inacuid = $_POST['inactive'];
    

    $inac = "UPDATE user SET status = 'inactive' WHERE `userid` = '$inacuid' ";

    $inacQ = mysqli_query( $con, $inac );

    if ( $inacQ ) {

        echo "
            <script>
                swal({
                    title: 'Activated',
                    type: 'success',
                    text: '$inacuid has been activated '
                });
                setInterval( function(){
                    window.location.href = 'reports.php' ;
                }, 1000 );
            </script>
        ";

    } else {
        echo "
            <script>
                swal({
                    title: 'Error',
                    type: 'error',
                    text: 'something went wrong'
                });    
            </script>
        ";
    }
}

// Delete

if ( isset( $_POST['dbtnuid'] ) ) {
    $dbtnuid = $_POST['dbtnuid'];
    

    $delete = "DELETE FROM user WHERE userid = '$dbtnuid'";

    $deleteQ = mysqli_query( $con, $delete );

    if ( $deleteQ ) {

        echo "
            <script>
                swal({
                    title: 'Deleted',
                    type: 'success',
                    text: '$dbtnuid has been deleted '
                });
                setInterval( function(){
                    window.location.href = 'reports.php' ;
                }, 1000 );
            </script>
        ";

    } else {
        echo "
            <script>
                swal({
                    title: 'Error',
                    type: 'error',
                    text: 'something went wrong'
                });    
            </script>
        ";
    }
}