<?php 
include('../includes/initialize.php');
if (isset($_POST['sid'])) {
    $sid = $_POST['sid'];
    $u = "SELECT * FROM user WHERE userid = '$sid' ";
    $uQ = mysqli_query($con, $u);

    while ( $r = mysqli_fetch_assoc($uQ) ) {
        $firstname = $r['firstname'];
        $lastname = $r['lastname'];
        $m_numb = $r['m_numb'];
        $email = $r['email'];
    }

    echo "
    <form>
        <div class='form-group'>
            <label for='userid'>USER ID</label>
            <input class='form-control' value='{$sid}' style='border: 1px solid #ccc !important; padding-left: .8rem;'>
        </div>
        <div class='form-group'>
            <label for='userid'>FIRSTNAME</label>
            <input class='form-control' value='{$firstname}' style='border: 1px solid #ccc !important; padding-left: .8rem;'>
        </div>
        <div class='form-group'>
            <label for='userid'>LAST NAME</label>
            <input class='form-control' value='{$lastname}' style='border: 1px solid #ccc !important; padding-left: .8rem;'>
        </div>
        <div class='form-group'>
            <label for='userid'>MOBILE NUMBER</label>
            <input class='form-control' value='{$m_numb}' style='border: 1px solid #ccc !important; padding-left: .8rem;'>
        </div>
        <div class='form-group'>
            <label for='userid'>EMAIL</label>
            <input class='form-control' value='{$email}' style='border: 1px solid #ccc !important; padding-left: .8rem;'>
        </div>
    </form>
    ";
}

