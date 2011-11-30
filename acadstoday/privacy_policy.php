<html>
	<head>
		<title>Privacy Policy</title>
		<?php include("header-head.php"); ?>
	</head>
	<body>
		<div class="wrapper">
			<!-- connecting to database -->
			<?php include("db-connect.php"); ?>
			<!-- header code -->
			<?php include("header-body.php"); ?>
			
			<div class="leftpad">
				<h2>Privacy Policy</h2>
				<p>We don't disclose or sell any of your private and sensitive information to any individual or organisation like Facebook does.</p>
				<p>Other than that, some of your information and your activities will be visible to other users,
				after all, you all are here to connect and restricting this nullifies the basic purpose of the website! :P</p>
				<p>Also, Detailed policy is in the making so you (user) will be notified once it is finalised.</p>
			</div>
			<div class="push"></div>
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>

