// php code for view budget by department

<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11/21/2018
 * Time: 11:01 PM
 */


require 'db.php';
$department_budget = $mysqli->escape_string($_GET['department']);
$result_department_budget = $mysqli->query("SELECT  budget FROM department where name ='$department_budget' ");


if ($result_department_budget->num_rows > 0) {
    $budget_result = $result_department_budget->fetch_assoc();

    $budget = $budget_result['budget'];


} else {
    header("location:../error.php");

} ?>

//php code for employe report table

<?php

require 'db.php';
$result = $mysqli->query("SELECT  employee.id,employee.name,employment_details.job_title,department.name,payroll_information.pay_grade_level FROM employee left join employee_details on employee.id = employee_details.id ");

?>

// php code for apply leave

<?php

require 'db.php';

$username = $mysqli->escape_string($_POST['username']);

$result = $mysqli->query("SELECT * FROM employee where name ='$username' ");
$id_result = $result->fetch_assoc(); // employ become arry with employ data
$employee_id = $id_result['id'];


$reason = $mysqli->escape_string($_POST['reason']);
$type = $mysqli->escape_string($_POST['type']);
$start_date = $mysqli->escape_string($_POST['start_date']);
$end_date = $mysqli->escape_string($_POST['end_date']);

$datetime1 = new DateTime($start_date);
$datetime2 = new DateTime($end_date);

$length = 1 + $datetime2->diff($datetime1)->d;

$sql = "INSERT INTO leave_application (id, reason,start_date, end_date,length,type) "
    . "VALUES ('$employee_id','$reason', '$start_date', '$end_date','$length','$type')";

?>

// php code for approve leave table

<?php





require 'db.php';

$result = $mysqli->query("SELECT * FROM leave_application ");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_object()) {
        $records[] = $row;
    }
    $result->free();

} else {
    header("location:../error.php");

}


foreach ($records as $r) { ?>
    <tr>
        <form action="../controls/alter_leave_application.php" method="post">
        <td><?php echo $r->id; ?></td>
        <td><?php echo $r->name; ?></td>
        <td><?php echo $r->reason; ?></td>
        <td><?php echo $r->start_date; ?></td>
        <td><?php echo $r->end_date; ?></td>
        <td><?php echo $r->length; ?></td>
        <td><?php echo $r->available_duration; ?></td>
            <td><input class="btn btn-dark text-light" type="submit" value="Accept"
                       name="accept"></td>
            <td><input class="btn btn-dark text-light" type="submit" value="Reject"
                       name="reject"></td>
            <td><input type="hidden" value="<?php echo $r->application_id; ?>" name="leave_id">
            <td>
        </form>
    </tr>
<?php } ?>






