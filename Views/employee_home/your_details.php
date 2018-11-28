<?php
session_start();

require '../../controls/db.php';

$employ_id = $_SESSION['user_id'];

$result = $mysqli->query("SELECT employee.id,employee.name,employment_details.job_title,department.name,payroll_information.pay_grade_level 
FROM employee left join employment_details on employee.id = employment_details.employ_id 
left join payroll_information on employee.id = payroll_information.employ_id 
left join department on employment_details.department_id=department.department_id where employee.id=$employ_id");

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
        <a href="your_details.php" class="logo">JUPITER</a>
        <nav id="nav">
            <a href="department_reports.php">Your Details</a>
            <a href="generic.html">Generic</a>
            <a href="elements.html">Elements</a>
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

<h2 style="text-align:center"> Your Details</h2>
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
</body>
</html>