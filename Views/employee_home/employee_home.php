<?php session_start();?>
<!DOCTYPE HTML>
<!--
	Introspect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>JUPITER HR MANAGER</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

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
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
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

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: red;
    color: white;
}

/* Add Animation */
@-webkit-keyframes slideIn {
    from {bottom: -300px; opacity: 0}
    to {bottom: 0; opacity: 1}
}

@keyframes slideIn {
    from {bottom: -300px; opacity: 0}
    to {bottom: 0; opacity: 1}
}

@-webkit-keyframes fadeIn {
    from {opacity: 0}
    to {opacity: 1}
}

@keyframes fadeIn {
    from {opacity: 0}
    to {opacity: 1}
}
</style>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="HR_manager.php" class="logo">JUPITER</a>
					<nav id="nav">
						<a href="HR_manager.php">Home</a>
						<a href="../HR/approve_leave.php">Approve Leave</a>
						<a href="elements.html">Elements</a>
						<a href="../../logout.php">LogOut</a>
					</nav>
				</div>
			</header>
			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h1>JUPITER: <span>A free + fully responsive HR MANAGEMENT SYSTEM<br />
					 by TEAMTEAM</span></h1>
					<ul class="actions">
						<li><a href="#" class="button alt">Get Started</a></li>
					</ul>
				</div>
			</section>

		<!-- One -->
			<section id="one">
				<div class="inner">
					<header>
						<h2>GET OUR PREMIUM SERVICES FOR FREE</h2>
					</header>
					<p>Human Resource Information Systems provide a means of acquiring, storing, analyzing and distributing information to various stakeholders.[2] HRIS enable improvement in traditional processes and enhance strategic decision-making.[2] The wave of technological advancement has revolutionized each and every space of life today, and HR in its entirety was not left untouched. Early systems were narrow in scope, typically focused on a single task, such as improving the payroll process or tracking employees' work hours. </p>
					<ul class="actions">
						<li><a href="#" class="button alt">Learn More</a></li>
					</ul>
				</div>
			</section>

		<!-- Two -->
			<section id="two">
				<div class="inner">
					<article>
						<div class="content">
							<header>
								<h3>Your Leave Application</h3>
							</header>
							<div class="image fit">
								<img src="images/pic01.jpg" alt="" />
							</div>
							<p>This includes your Leave Application. Visit here in order to apply for any Leave.  </p>
						</div>
						<ul class="actions">
							<li><a href="../leave_application/leave_application.php" class="button alt">LEAVE APPLICATION</a></li>
						</ul>
					</article>
					<article>
						<div class="content">
							<header>
								<h3>Your Employee Details</h3>
							</header>
							<div class="image fit">
								<img src="images/pic02.jpg" alt="" />
							</div>
							<p>This includes your your employee details. Visit here in order to view those.  </p>
						</div>
						<ul class="actions">
							<li><a href="your_details.php" class="button alt">Your Details</a></li>
						</ul>
					</article>


				</div>
			</section>

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
