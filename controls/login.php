<?php
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections

require 'db.php';

$username = $mysqli->escape_string($_POST['username']);
$result = $mysqli->query("SELECT * FROM user WHERE username='$username'");



if ( $result->num_rows == 0 ){ // User doesn't exist
    header("location:../views/login_fail.html");
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( $_POST['pass'] == $user['password']) {


            if($user['user_type']== 'hr_manager') {

                header("location:../views/HR/HR_manager.html");
            }
            else if ($user['user_type']== 'employee')
            {
                header("location:../views/employee/employee.html");
            }
            else{
                header("location: ../login_fail.html");
            }
        }



    else {
        header("location: ../login_fail.html");
    }
}

