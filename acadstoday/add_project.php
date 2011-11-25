<html>
	<head>
		<title>Add a Project</title>
		<?php include("header-head.php"); ?>
	</head>	
	<body>
		<div class="wrapper">
			<!-- connecting to database -->
			<?php include("db-connect.php"); ?>
			<!-- header code -->
			<?php include("header-body.php"); ?>
			<div class="leftpad">
				<h2>Project Registration</h2>

				<form method="POST" action="" >
					<table>
						<tr>
							<td>Project:</td>
							<td><input type="text" name="project"/></td>
						</tr></br>
						<tr>
							<td>Instructor:</td>
							<td><select name="instructor">
							<?php
								$stmt = mysqli_stmt_init($con);
								mysqli_stmt_prepare($stmt, "SELECT inst_id, inst_name FROM instructor") or die(mysqli_error());
								mysqli_stmt_execute($stmt);
								mysqli_stmt_bind_result($stmt, $inst_id, $inst_name);
								while (mysqli_stmt_fetch($stmt)) {
									echo "<option value=\"" . $inst_id . "\">";
									echo $inst_name;
									echo "</option>\n";
								}
					
							?>
							</select></td>
						</tr>
						<tr><td>Course:</td>
						<td><select name="course">
				
						<?php
					
							mysqli_stmt_prepare($stmt, "SELECT course_id, course_name FROM course") or die(mysqli_error());
							mysqli_stmt_execute($stmt);
							mysqli_stmt_bind_result($stmt, $course_id, $course_name);
							while (mysqli_stmt_fetch($stmt)) {
								echo "<option value=\"" . $course_id . "\">";
								echo $course_name;
								echo "</option>\n";
							}
							mysqli_stmt_close($stmt);
						?>
				
						</select></td></tr>
						<tr><td>Project Desciption:</td>
						<td><textarea name="project_desciption"></textarea></td></tr>
						<tr><td>Start Date:</td>
						<td><input type="text" name="start_date" value="ddmmyyyy" onfocus="if (this.value == 'ddmmyyyy') {this.value = '';}" onblur="if (this.value == '') {this.value = 'ddmmyyyy';}"/></td></tr>
						<tr><td>End Date:</td>
						<td><input type="text" name="end_date" value="ddmmyyyy" onfocus="if (this.value == 'ddmmyyyy') {this.value = '';}" onblur="if (this.value == '') {this.value = 'ddmmyyyy';}"/></td></tr>
					</table>
					<input type="submit" name="submit" value="Register" />
				</form>
			</div>
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
		
	</body>
</html>
