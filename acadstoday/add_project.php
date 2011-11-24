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

				<form>
				<table>
				<tr><td>Project:</td>
				<td><input type="text" name="project"/></td></tr>
				</br>
				<tr><td>Instructor:</td>
				<td><select name="instructor">
				
				<?php
					$stmt = mysqli_prepare($con,"SELECT * FROM instructor");
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);
					while (mysqli_stmt_fetch($result)) {
						echo "<option value=\"".$inst_id."\">";
						echo $inst_name;
						echo "</option>\n";
					}
					
				?>
				
				</select></td></tr>
				<tr><td>Course:</td>
				<td><select name="course">
					
				<?php
					
					$stmt = mysqli_prepare($con,"SELECT * FROM instructor");
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);
					while (mysqli_stmt_fetch($result)) {
						echo "<option value=\"".$course_id."\">";
						echo $course_name;
						echo "</option>\n";
					}
					
					mysqli_stmt_close($stmt);
				?>
				
				</select></td></tr>
				<tr><td>Project Desciption:</td>
				<td><textarea name="project_desciption"></textarea></td></tr>
				<tr><td>Start Date:</td>
				<td><input type="text" name="start_date" value="ddmmyyyy"/></td></tr>
				<tr><td>End Date:</td>
				<td><input type="text" name="end_date" value="ddmmyyyy"/></td></tr>
				</table>
				<input type="submit" name="submit" value="Register" />
				</form>
				
				WRITE CODE TO REGISTER HERE
			</div>
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
		
	</body>
</html>