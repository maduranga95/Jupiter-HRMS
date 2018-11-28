<?php session_start();?>
<?php
require '../../controls/db.php';

if(isset($_POST['job_title'])){

    $job_title = (string)$_POST['job_title'];
    $result = $mysqli->query("SELECT employee.id,employee.name,employment_details.job_title,department.name,payroll_information.pay_grade_level 
    FROM employee left join employment_details on employee.id = employment_details.employ_id 
    left join payroll_information on employee.id = payroll_information.employ_id left join department 
    on employment_details.department_id=department.department_id where employment_details.job_title='$job_title'");




}

elseif (isset($_POST['pay_grade'])){
    $pay_grade = $_POST['pay_grade'];
    $result = $mysqli->query("SELECT employee.id,employee.name,employment_details.job_title,department.name,payroll_information.pay_grade_level 
FROM employee left join employment_details on employee.id = employment_details.employ_id left join payroll_information on employee.id = payroll_information.employ_id 
left join department on employment_details.department_id=department.department_id
 where payroll_information.pay_grade_level='$pay_grade'");
}

else {

    $result = $mysqli->query("SELECT employee.id,employee.name,employment_details.job_title,department.name,payroll_information.pay_grade_level 
FROM employee left join employment_details on employee.id = employment_details.employ_id 
left join payroll_information on employee.id = payroll_information.employ_id 
left join department on employment_details.department_id=department.department_id");

}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_object()) {
        $records[] = $row;
    }
    $result->free();

} else {
    header("location:../error.php");

}

?>




<!DOCTYPE HTML>
<!--
	Introspect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
    <title>JUPITER Department</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0, 0, 0); /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
        -webkit-animation-name: fadeIn; /* Fade in the background */
        -webkit-animation-duration: 0.4s;
        animation-name: fadeIn;
        animation-duration: 0.4s
    }

    /* Modal Content */
    .modal-content {
        position: fixed;
        bottom: 0;
        background-color: #fefefe;
        width: 100%;
        -webkit-animation-name: slideIn;
        -webkit-animation-duration: 0.4s;
        animation-name: slideIn;
        animation-duration: 0.4s
    }

    /* The Close Button */
    .close {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-header {
        padding: 2px 16px;
        background-color: red;
        color: white;
    }

    .modal-body {
        padding: 2px 16px;
    }

    .modal-footer {
        padding: 2px 16px;
        background-color: red;
        color: white;
    }

    div1 {
        width: 320px;
        padding: 10px;
        border: 5px solid gray;
        margin: 0;
    }

    /* Add Animation */
    @-webkit-keyframes slideIn {
        from {
            bottom: -300px;
            opacity: 0
        }
        to {
            bottom: 0;
            opacity: 1
        }
    }

    @keyframes slideIn {
        from {
            bottom: -300px;
            opacity: 0
        }
        to {
            bottom: 0;
            opacity: 1
        }
    }

    @-webkit-keyframes fadeIn {
        from {
            opacity: 0
        }
        to {
            opacity: 1
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0
        }
        to {
            opacity: 1
        }
    }
a.button3{
display:inline-block;
padding:0.3em 1.2em;
margin:0 0.3em 0.3em 0.9;
margin-left:20px;
border-radius:2em;
box-sizing: border-box;
text-decoration:none;
font-family:'Roboto',sans-serif;
font-weight:300;
color:#FFFFFF;
background-color:#4eb5f1;
text-align:center;
transition: all 0.2s;
}
a.button3:hover{
background-color:#4095c6;
}
@media all and (max-width:30em){
a.button3{
display:block;
margin:0.2em auto;
}
}

	


</style>
<body>

<!-- Header -->
<header id="header">
    <div class="inner">
        <a href="HR_manager.html" class="logo">JUPITER</a>
        <nav id="nav">
            <a href="department_reports.php">Home</a>
            <a href="generic.html">Generic</a>
            <a href="elements.html">Elements</a>
			<a href="../../logout.php">LogOut</a>
        </nav>
    </div>
</header>
<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

<!-- Banner -->
<section id="banner">
    <div class="inner">
        <h1>JUPITER: <span>A free + fully responsive HR MANAGEMENT SYSTEM<br/>
					 by TEAMTEAM</span></h1>
        <ul class="actions">
            <li><a href="#" class="button alt">Get Started</a></li>
        </ul>
    </div>
</section>

<!-- One -->
<br>
<hr>
<form action="../employee_report/employee_report.php" method="post">
<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>  &nbsp;  Order By Job Title </label>
								<select name="job_title">
									<option value="none" selected="" disabled="">Select job title</option>
									<option value="hr_manager">hr_manager</option>
									<option value="softwere_engineer">software_engineering</option>
									<option value="quality_assuarance_engineer">quality_assuarance_engineer</option>
									<option value="programmer">programmer</option>
									<option value="software_architecturer">software_architecturer</option>


								</select>
							</span>
							<div class="button-container">
  <br>
<input type="submit" value="submit" class="button3">
						</div>
						<hr>
    <form action="../employee_report/employee_report.php" method="post">
<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label> &nbsp;   Order By PayGrade </label>
								<select name="pay_grade">
									<option value="none" selected="" disabled="">Select paygrade</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									

								</select>
							</span>
							<br>
							<input type="submit" value="submit" class="button3"> </input>
	</div>
						<br>
						<hr>

<br><br><br>
<div>
<h2 style="text-align:center"> EMPLOYEE REPORT</h2>
<table id="myTable">
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Job Title
                    </th>
                    <th>
                        Department
                    </th>
                    <th>
                        Pay Grade
                    </th>

                </tr>
    <?php foreach ($records as $r) { ?>
        <tr>
            <td><?php echo $r->id; ?></td>
            <td><?php echo $r->name; ?></td>
            <td><?php echo $r->job_title; ?></td>
            <td><?php echo $r->name; ?></td>
            <td><?php echo $r->pay_grade_level; ?></td>
        </tr>
    <?php } ?>

            </table>
            <br>
</div>
<!-- Footer -->
<section id="footer">
    <div class="inner">
        <header>
            <h2>Get in Touch</h2>
        </header>
        <form method="post" action="#">
            <div class="field half first">
                <label for="name">Name</label>
                <input type="text" name="name" id="name"/>
            </div>
            <div class="field half">
                <label for="email">Email</label>
                <input type="text" name="email" id="email"/>
            </div>
            <div class="field">
                <label for="message">Message</label>
                <textarea name="message" id="message" rows="6"></textarea>
            </div>
            <ul class="actions">
                <li><input type="submit" value="Send Message" class="alt"/></li>
            </ul>
        </form>

    </div>
</section>



