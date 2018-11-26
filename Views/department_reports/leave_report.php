
<?php

require '../../controls/db.php';
$department_id = $mysqli->escape_string($_GET['department_id']);



$result = $mysqli->query("SELECT employee.name,leave_application.employ_id,leave_application.length 
from leave_application left join employee on leave_application.employ_id=employee.id 
LEFT JOIN employment_details on employee.id=employment_details.employ_id 
WHERE employment_details.department_id =$department_id");

$result_sum = $mysqli->query("SELECT sum(leave_application.length ) as sum1
from leave_application left join employee on leave_application.employ_id=employee.id
 LEFT JOIN employment_details on employee.id=employment_details.employ_id
  WHERE employment_details.department_id =1");


if ($result->num_rows > 0) {
    while ($row = $result->fetch_object()) {
        $records[] = $row;
    }
    $result->free();

    $sum = $result_sum->fetch_object();

} else {

    header("location:../error.php");
}


?>
<html>
	<head>
		<title>Approve Leave</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<style>
		div1 {
        width: 320px;
        padding: 10px;
        border: 5px solid gray;
        margin: 0;
    }
		</style>

	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.html" class="logo">JUPITER</a>
					<nav id="nav">
						<a href="HR_manager.php">Home</a>
						<a href="../HR/approve_leave.php">Approve Leave</a>
						<a href="elements.html">Elements</a>
					</nav>
				</div>
			</header>
			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- Main -->
			<section id="main" >
				<div class="inner">
					<header class="major special">
						<h1 style="text-align:center">LEAVE REPORT</h1>
						<p>Check and see the leaves taken in this department.</p>
					</header>
					<table id="myTable">
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Number of Days
                    </th>

                </tr>

                                    <?php foreach ($records as $r) { ?>
                        <tr>
                            <td><?php echo $r->employ_id; ?></td>
                            <td><?php echo $r->name; ?></td>

                            <td><?php echo $r->length; ?></td>
                        </tr>
                        <?php } ?>


            </table>
            <br>

						<h2> Total number of leaves by all employees from this department</h2>
						<div1 style="margin-left:520px"><?php echo $sum->sum1 ?> </div1>    <!-- Enter total leaves taken from the database here -->
            <br><br><br>


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
							<input type="text" name="name" id="name" />
						</div>
						<div class="field half">
							<label for="email">Email</label>
							<input type="text" name="email" id="email" />
						</div>
						<div class="field">
							<label for="message">Message</label>
							<textarea name="message" id="message" rows="6"></textarea>
						</div>
						<ul class="actions">
							<li><input type="submit" value="Send Message" class="alt" /></li>
						</ul>
					</form>
					<div class="copyright">
						&copy; Untitled Design: <a href="https://templated.co/">TEMPLATED</a>. Images <a href="https://unsplash.com/">Unsplash</a>
					</div>
				</div>
			</section>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
