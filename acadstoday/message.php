<?php
session_start();
if(!(isset($_SESSION['uid']))) {header("location:login.php");}
$uid = $_SESSION['uid'];

?>

<?php
$message = $_POST['message'];
?>

<html>
	<head>
		<title>Message</title>
		<?php include("header-head.php"); ?>
		<script type="text/javascript" src="js/easytab_rightpanel.js"></script>
		<link rel="stylesheet" type="text/css" href="css/easytab_rightpanel.css" />
	</head>

	<body>
		<div class="wrapper">
			<!-- connecting to database -->
			<?php include("db-connect.php"); ?>
			<!-- header code -->
			<?php include("header-body.php"); ?>
			<div id="content">
			<!-- left panel code -->
			<?php include("left_panel.php"); ?>
			
			<div id="center" class="leftpad">
				<p><?php echo $message ;?></p>
			</div>
			<!-- right panel code -->
			<?php include("right_panel2.php"); ?>
			</div>
			<div class="push"></div>
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>


