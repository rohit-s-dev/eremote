<?php
include('../includes/initialize.php');

if ( isset( $_POST['sponser_id'] ) ) {
    
    $spnser_id = escape($con, $_POST['sponser_id']);

    if ( !empty($spnser_id) ) {

        $query = "SELECT * FROM user where userid LIKE '%$spnser_id%' LIMIT 2";
        $queryQ = mysqli_query( $con , $query );
        $res = mysqli_num_rows($queryQ);

        
        if ( $res > 0 ) {

            while ( $r = mysqli_fetch_assoc( $queryQ ) ) {

                $sponser_id = $r['userid'];
                $firstname = strtoupper($r['firstname']);
                $lastname = strtoupper($r['lastname']);

            ?>

            <?php 
                echo "$firstname  $lastname ($sponser_id)";
            ?>
            
           <?php } 
        } else {
            echo "Invalid Sponser ID" ;
        }
    } 
}

