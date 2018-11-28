<?php session_start();?>
<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
            if (isset($_GET['mssg']) && $_GET['mssg']=='success') {
                echo "<script type='text/javascript'>alert('Successfully Applied for leave!');</script>";
}
else if  (isset($_GET['mssg']) && $_GET['mssg']=='failed') {
    echo "<script type='text/javascript'>alert('Application process failed');</script>";
}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>

<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Event Registration Form Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- //custom-theme -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- font-awesome-icons -->
<!-- //font-awesome-icons -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
</head>
<body>

<!-- banner -->
<section>
	<div class="center-container">
		<div class="main">
			<h1 class="w3layouts_head">Leave Application Form</h1>
				<div class="w3layouts_main_grid">
					<form action="../../controls/apply_leave.php" method="post" class="w3_form_post">
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Username </label>
								<input type="text" name="username" placeholder="Your Name" required="">
							</span>
						</div>
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Leave Type </label>
								<select name="type">
									<option value="none" selected="" disabled="">Select type</option>
									<option value="annual">Annual</option>
									<option value="casual">Casual</option>
									<option value="no_pay">Nopay</option>
									<option value="maternity		">Maternity</option>

								</select>
							</span>
						</div>

						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Reason for Leave </label>
								<input type="text" name="reason" placeholder="Your Reason" required="">
							</span>
						</div>

						<div class="agileits_w3layouts_main_grid w3ls_main_grid">
							<span class="agileinfo_grid">
								<label>Start Date </label>
								<div class="agileits_w3layouts_main_gridl">
									<input class="date" id="datepicker" name="start_date" type="text" value="mm/dd/yy       yy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required="">
								</div>

									<div class="clear"> </div>
							</span>
						</div>

						<div class="agileits_w3layouts_main_grid w3ls_main_grid">
							<span class="agileinfo_grid">
								<label>End Date </label>
								<div class="agileits_w3layouts_main_gridl">
									<input class="date" id="datepicker1" name="end_date" type="text" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required="">
								</div>

									<div class="clear"> </div>
							</span>
						</div>


					<div class="content-w3ls">


						<div class="clear"></div>
					</div>
					<div class="w3_main_grid">
						<div class="w3_main_grid_right">
							<input type="submit" value="Submit">
						</div>
					</div>
				</form>
			</div>
		<!-- Calendar -->
			<link rel="stylesheet" href="css/jquery-ui.css" />
				<script src="js/jquery-ui.js"></script>
					<script>
						$(function() {
							$( "#datepicker" ).datepicker();
						});
					</script>

					<link rel="stylesheet" href="css/jquery-ui.css" />
						<script src="js/jquery-ui.js"></script>
							<script>
								$(function() {
									$( "#datepicker1" ).datepicker();
								});
							</script>
		<!-- //Calendar -->
			<div class="w3layouts_copy_right">
				<div class="container">

				</div>
			</div>
		</div>
	</div>
</section>
<!-- //footer -->
</body>
</html>
