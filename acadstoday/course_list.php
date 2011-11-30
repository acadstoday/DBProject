<?php
session_start();
if(!(isset($_SESSION['uid']))) {header("location:login.php");}
$uid = $_SESSION['uid'];

?>


<html>
	<head>
		<title>Course List</title>
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
			
			<div id="center">
			<div id="list" class="leftpad">
				<h2>List of Courses</h2>
				<div id="list-result">
				<?php
					$stmt = mysqli_stmt_init($con);
					mysqli_stmt_prepare($stmt, "SELECT course_id, course_name, dept_name, course_info FROM Course ORDER BY dept_name, course_id") or die(mysqli_error());
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					if(mysqli_stmt_num_rows($stmt) == 0){
						echo "Currently No Courses are running to follow or register";
					}
					else{
						mysqli_stmt_bind_result($stmt, $id, $name, $dept, $info);
						while ( mysqli_stmt_fetch($stmt) ) {
							echo "<div class='teachbox'><p><a href='course_page.php?course_id=" . $id . "'><b>" . $id . "</b></a> : ";
							echo $name . "</p>";
							echo "<p class='smalltext'><i>Info</i> : " . $info . "</p></div>";
						}
					}
					mysqli_stmt_close($stmt);
				?>
				</div>
			</div>
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

