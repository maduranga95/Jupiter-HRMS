<?php session_start();?>
<?php
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections

require 'db.php';

$username = $mysqli->escape_string($_POST['username']);
$result = $mysqli->query("SELECT * FROM user WHERE username='$username'");


if ( $result->num_rows == 0 ){ // User doesn't exist
    header("location:../views/login_fail.php");
}
else { // User exists
    $user = $result->fetch_assoc();


    $pass = md5($_POST['pass']);

    if ( $pass == $user['password']) {


        $_SESSION['user_id'] = $user['user_id'];


            if($user['user_type']== 'hr_manager') {

                header("location:../views/HR/HR_manager.php");
            }
            else if ($user['user_type']== 'employee')
            {
                header("location:../views/employee_home/employee_home.php");
            }
            else{
                header("location: ../login_fail.php");
            }
        }



    else {
        header("location: ../login_fail.php");
    }
}

