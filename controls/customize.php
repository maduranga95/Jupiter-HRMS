<?php session_start();?>
<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11/27/2018
 * Time: 6:45 PM
 */

require 'db.php';

$column_name = $mysqli->escape_string($_POST['column_name']);
$data_type = $mysqli->escape_string($_POST['data_type']);

switch ($data_type) {
    case "varchar":
        $type =  'varchar(50)' ;
        break;
    case "char":
        $type =  'char(10)';
        break;
    case "text":
        $type =  'text';
        break;
    case "int":
        $type =  'int(10)';
        break;
    case "boolean":
        $type =  'tinyint(1)';
        break;
}



$sql=("ALTER TABLE employment_details ADD $column_name $type");

    if($mysqli->query($sql)===TRUE){
        header("Location:../Views/HR/HR_manager.php?mssg=success");
    } else {
        header("Location:../Views/HR/HR_manager.php?mssg=failed");
    }
