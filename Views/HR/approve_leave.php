<?php

require '../../controls/db.php';




$result = $mysqli->query("SELECT employee.id,employee.name,leave_application.reason,leave_application.start_date,leave_application.End_date,leave_application.length, 
sum(personal_leave_details.annual+personal_leave_details.casual+personal_leave_details.no_pay+personal_leave_details.maternity) as duration 
FROM leave_application left join employee on leave_application.employ_id=employee.id 
left join personal_leave_details on leave_application.employ_id=personal_leave_details.Employ_id");

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
		<title>Approve Leave</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<style>


.button1 {
    background-color: white;

		color: black;
    border: 2px solid #4CAF50;
}

.button1:hover {
    background-color: #4CAF50;
    color: white;
}

.button2 {
    background-color: white;
    color: black;
    border: 2px solid #008CBA;
}

.button2:hover {
    background-color: #008CBA;
    color: white;
}

.button3 {
    background-color: white;
    color: black;
    border: 2px solid #f44336;
}

.button3:hover {
    background-color: #f44336;
    color: white;
}

.button4 {
    background-color: white;
    color: black;
    border: 2px solid #e7e7e7;
}

.button4:hover {background-color: #e7e7e7;}

.button5 {
    background-color: white;
    color: black;
    border: 2px solid #555555;
}

.button5:hover {
    background-color: #555555;
    color: white;
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
						<a href="approve_leave.html">Approve Leave</a>
						<a href="elements.html">Elements</a>
					</nav>
				</div>
			</header>
			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- Main -->
			<section id="main" >
				<div class="inner">
					<header class="major special">
						<h1>APPROVE  LEAVE  HERE</h1>
						<p>Check and approve the leave applicants' leaves.</p>
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
                        Reason
                    </th>
										<th>
                        Starting Date
                    </th>
										<th>
                        Ending Date
                    </th>
										<th>
                        Duration
                    </th>
										<th>
                        Available Duration
                    </th>
										<th>
                        Approve
                    </th>
										<th>
                        Decline
                    </th>
                </tr>
<!--								<tr>-->
<!--									<td>44555</td>-->
<!--									<td>Mauranga</td>-->
<!--									<td>sick with fever</td>-->
<!--									<td>2017-04-05</td>-->
<!--									<td>2017-04-07</td>-->
<!--									<td>2</td>-->
<!--									<td>5</td>-->
<!--									<td><button class="button1" > Approve</button></td>-->
<!--									<td><button class="button3"> Decline</button></td>-->
<!--								</tr>-->
                       <?php foreach ($records as $r) { ?>
                        <tr>
                            <form action="../controls/alter_leave_application.php" method="post">
                                <td><?php echo $r->id; ?></td>
                                <td><?php echo $r->name; ?></td>
                                <td><?php echo $r->reason; ?></td>
                                <td><?php echo $r->start_date; ?></td>
                                <td><?php echo $r->End_date; ?></td>
                                <td><?php echo $r->length; ?></td>
                                <td><?php echo $r->duration; ?></td>
                                <td><input class="btn btn-dark text-light" type="submit" value="Accept"
                                           name="accept"></td>
                                <td><input class="btn btn-dark text-light" type="submit" value="Reject"
                                           name="reject"></td>
                                <td><input type="hidden" value="<?php echo $r->application_id; ?>" name="leave_id">
                                <td>
                            </form>
                        </tr>
                        <?php } ?>

            </table>
            <br>
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