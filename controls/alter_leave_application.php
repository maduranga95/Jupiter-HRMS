<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11/22/2018
 * Time: 5:44 PM
 */

require 'db.php';

if (isset($_POST)) {
    if (isset($_POST['accept'])) {
        if (isset($_POST['leave_id'])) {
            $leave_id = $_POST['leave_id'];



            $leave_result1 = $mysqli->query("select leave_application.type,leave_application.length from leave_application 
where leave_application.application_id = $leave_id");


            $leave_result2 = $leave_result1->fetch_assoc();
            $type = (string)$leave_result2['type'];
            $applied_length = $leave_result2['length'];
            $employ_id = $_POST['id'];



            $leave_result3 = $mysqli->query("select $type from personal_leave_details WHERE personal_leave_details.Employ_id=$employ_id");

            $leave_result4 = $leave_result3->fetch_assoc();

            $available_length = $leave_result4[$type];


            $new_length = $available_length-$applied_length;
            $leave_result = "update leave_application,personal_leave_details set leave_application.approve_status=1,personal_leave_details.$type=$new_length
                              where leave_application.application_id=$leave_id and personal_leave_details.Employ_id= $employ_id" ;

            if($mysqli->query($leave_result)){
                header("location:../Views/HR/approve_leave.php");
            }
            else{
                header("location:../Views/error.php");
            }



            }}

        if (isset($_POST['reject'])) {
            if (isset($_POST['leave_id'])) {
                $leave_id = $_POST['leave_id'];
                $leave_result = "update leave_application set leave_application.approve_status=2
                                  where leave_application.application_id=$leave_id" ;



            }

            if($mysqli->query($leave_result)){
                header("location:../Views/HR/approve_leave.php");
            }
            else{
                header("location:../Views/error.php");
            }

        }
    }



            ?>