
// php code for view employee by department

<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11/21/2018
 * Time: 11:01 PM
 */

require 'db.php';
$result = $mysqli->query("SELECT * FROM employee left join employment_details on employee.id=employment_details.id where department =' ' ");


if ($result->num_rows > 0) {
    while ($row = $result->fetch_object()) {
        $records[] = $row;
    }
    $result->free();

}
else{
    header("location:../error.php");

}


foreach ($records as $r) {?>

    <td><?php echo $r->id; ?></td>
    <td><?php echo $r->name; ?></td>

<?php } ?>


// php code budget report by department


