<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11/21/2018
 * Time: 11:01 PM
 */

require '../../controls/db.php';
$department = $mysqli->escape_string($_GET['department']);

$result_department = $mysqli->query("SELECT * FROM department where name ='$department' ");
$department_id_result = $result_department->fetch_assoc();
$department_id = $department_id_result['department_id'];



$result = $mysqli->query("SELECT * FROM employee left join employment_details on employee.id=employment_details.employ_id where department_id ='$department_id' ");


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
<section id="two">
    <div class="inner">
        <article>
            <div class="content" style="display:inline-block">
                <header>
                    <h3>Employee Details Report</h3>
                </header>
            </div>
            <ul class="actions">
                <li><a id="myBtn0" class="button alt">CHECK REPORT</a></li>
            </ul>
        </article>
        <article class="alt">
            <div class="content">
                <header>
                    <h3>Budget Report</h3>
                </header>
            </div>
            <ul class="actions">
                <li><a id="myBtn1" class="button alt">CHECK REPORT</a></li>
            </ul>
        </article>
        <article class="alt">
            <div class="content">
                <header>
                    <h3>Total Leave Report</h3>
                </header>
            </div>
            <ul class="actions">
                <li><a id="myBtn3" class="button alt">CHECK REPORT</a></li>
            </ul>
        </article>
    </div>
</section>

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

<!-- The Modal -->
<div id="myModal0" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2 style="color:black">Employee Details Report</h2>
        </div>
        <div class="modal-body">
            <table id="myTable">
                <tr>
                <th>
                    ID
                </th>
                <th>
                    Name
                </th>
                </tr>
                <?php foreach ($records as $r) { ?>
                    <tr>
                    <td><?php echo $r->id; ?></td>
                    <td><?php echo $r->name; ?></td>
                    </tr>
                <?php } ?>
            </table>
            <br>
        </div>
        <div class="modal-footer">
            <h3 style="color:white">JUPITER HRMS</h3>
        </div>
    </div>

</div>

<!-- The Modal -->
<div id="myModal1" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2 style="color:black">Budget Report</h2>
        </div>
        <div class="modal-body">
            <p>According to our Latestst Finantial Statements the budget of this Department for thi year is stated below.</p>
            <div1>$68768.00</div1>    <!-- Enter budget value taken from the database here -->
            <br><br><br>
        </div>
        <div class="modal-footer">
            <h3 style="color:white">JUPITER HRMS</h3>
        </div>
    </div>

</div>

<!-- The Modal -->
<div id="myModal2" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2 style="color:black">Employee Details Report</h2>
        </div>
        <div class="modal-body">
            <table id="myTable">
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Total Leaves
                    </th>
                </tr>

            </table>
            <br>
        </div>
        <div class="modal-footer">
            <h3 style="color:white">JUPITER HRMS</h3>
        </div>
    </div>

</div>




<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
<script>
    // Get the modal
    var modal0 = document.getElementById('myModal0');

    // Get the button that opens the modal
    var btn0 = document.getElementById("myBtn0");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn0.onclick = function () {
        modal0.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal0.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal0) {
            modal0.style.display = "none";
        }
    }
</script>

<script>
    // Get the modal
    var modal1 = document.getElementById('myModal1');

    // Get the button that opens the modal
    var btn1 = document.getElementById("myBtn1");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[1];

    // When the user clicks the button, open the modal
    btn1.onclick = function () {
        modal1.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal1.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal1) {
            modal1.style.display = "none";
        }
    }
</script>

<script>
    // Get the modal
    var modal2 = document.getElementById('myModal2');

    // Get the button that opens the modal
    var btn2 = document.getElementById("myBtn2");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[2];

    // When the user clicks the button, open the modal
    btn2.onclick = function () {
        modal2.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal2.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal2) {
            modal2.style.display = "none";
        }
        if (event.target == modal1) {
            modal1.style.display = "none";
        }
        if (event.target == modal0) {
            modal0.style.display = "none";
        }
    }
</script>

</body>
</html>
