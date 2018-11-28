<?php session_start();?>
<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11/27/2018
 * Time: 12:34 AM
 */

require 'db.php';

$username = $mysqli->escape_string($_POST['username']);

$result = $mysqli->query("SELECT * FROM employee where name ='$username' ");
$id_result = $result->fetch_assoc(); // employ become arry with employ data
$employee_id = $id_result['id'];


$reason = $mysqli->escape_string($_POST['reason']);
$type = $mysqli->escape_string($_POST['type']);
$start_date = $mysqli->escape_string($_POST['start_date']);
$end_date = $mysqli->escape_string($_POST['end_date']);


$source1 = $start_date;
$date1 = new DateTime($source1);
$source2 = $end_date;
$date2 = new DateTime($source2);
$start_date1 =  $date1->format('Y-m-d'); // 31-07-2012
$end_date1 =  $date2->format('Y-m-d');

$datetime1 = new DateTime($start_date);
$datetime2 = new DateTime($end_date);

$length = 1 + $datetime2->diff($datetime1)->d;


$stmt = $mysqli->("INSERT INTO leave_application (employ_id, reason,start_date, end_date,length,type)) "
    . "VALUES ('$employee_id','$reason', '$start_date1', '$end_date1','$length','$type')";


$stmt->bindparam(':na')




if($mysqli->query($sql)===TRUE){
    header("Location:../Views/leave_application/leave_application.php?mssg=success");
} else {
    header("Location:../Views/leave_application/leave_application.php?mssg=failed");
}

?>