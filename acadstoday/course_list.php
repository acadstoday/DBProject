<html>
	<head>
		<title>Course List</title>
		<?php include("header-head.php"); ?>
	</head>
	<body>
		<div class="wrapper">
			<!-- connecting to database -->
			<?php include("db-connect.php"); ?>
			<!-- header code -->
			<?php include("header-body.php"); ?>
			<div id="list" class="leftpad">
				<h2>List of Courses</h2>
				<?php
					$stmt = mysqli_stmt_init($con);
					mysqli_stmt_prepare($stmt, "SELECT course_id, course_name, dept_name FROM Course") or die(mysqli_error());
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					if(mysqli_stmt_num_rows($stmt) == 0){
						echo "Currently No Courses are running to follow or register";
					}
					else{
						/* bind result variables */
						mysqli_stmt_bind_result($stmt, $course_id, $course_name, $dept_name);
						/* fetch value */
						echo "<table border='0'>";
						echo "<tr><th>Course ID</th><th>Course Name</th><th>Department Name</th></tr>";
						while ( mysqli_stmt_fetch($stmt) ) {
							echo "<tr>";
							echo "<td>" . $course_id . "</td>";
							echo "<td>" . $course_name . "</td>";
							echo "<td>" . $dept_name . "</td>";
							echo "</tr>";
						}
						echo "</table>";
					}
					mysqli_stmt_close($stmt);
				?>
			</div>
			
			<div class="push"></div>
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>

