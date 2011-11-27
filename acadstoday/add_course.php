<html>
	<head>
		<title>Add a Course</title>
		<?php include("header-head.php"); ?>
	</head>
	<body>
		<div class="wrapper">
			<!-- connecting to database -->
			<?php include("db-connect.php"); ?>
			<!-- header code -->
			<?php include("header-body.php"); ?>
			<div class="leftpad">
				<h2>Course Registration</h2>

				<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" >
					<table id="leftlist" border="0">
						<tr><td>Search: <input type="text" size="12" maxlength="12" name="course" value=""/></td></tr>
						<tr><td><input type="checkbox" name="option1" value="course_id" /> Search by Course ID</td></tr>
						<tr><td><input type="checkbox" name="option2" value="course_name" /> Search by Course Name</td></tr>
						<tr><td class="submit"><input type="submit" name="submit" value="Search" /></td></tr>
					</table>
				</form>

				<?php
				
				$stmt = mysqli_stmt_init($con);
				$help = 'help';
					
				if (isset($_REQUEST['course'])){
					
					if ($_REQUEST['course'] == null){
						echo "<div class='error'>Enter something to search</div>";
					}
					else{
						$search_query = "%" . $_REQUEST['course'] . "%";
					}
					if(isset($_REQUEST['option1']) && isset($_REQUEST['option2']) && $_REQUEST['option1'] == "course_id" && $_REQUEST['option2'] == "course_name"){
						mysqli_stmt_prepare($stmt, "SELECT course_id, course_name, dept_name FROM Course WHERE course_name like ? OR course_id like ?") or die(mysqli_error());
						mysqli_stmt_bind_param($stmt,'ss', $search_query, $search_query);
					}

					elseif(isset($_REQUEST['option1']) && $_REQUEST['option1'] == "course_id"){
						mysqli_stmt_prepare($stmt, "SELECT course_id, course_name, dept_name FROM Course WHERE lower(course_id) like ?") or die(mysqli_error());
						mysqli_stmt_bind_param($stmt,'s', $search_query);
					}

					elseif(isset($_REQUEST['option2']) && $_REQUEST['option2'] == "course_name"){
						mysqli_stmt_prepare($stmt, "SELECT course_id, course_name, dept_name FROM Course WHERE lower(course_name) like ?") or die(mysqli_error());
						mysqli_stmt_bind_param($stmt,'s', $search_query);
					}
					else{
						$help = "";
						if($_REQUEST['course'] != ""){
						echo "<div class='error'>Select whether to search by ID or name</div>";
						}
					}
					
					if ($_REQUEST['course'] != "" && $help != ""){
						echo "<hr />";
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt) == 0){
							echo "No Courses found";
						}
						else{
							mysqli_stmt_bind_result($stmt, $course_id, $course_name, $dept_name);
							echo "<form method='POST' action='' >";
							echo "<table id='list' border='0'>";
							echo "<tr><th>Select</th><th>Course ID</th><th>Course Name</th><th>Department Name</th></tr>";
							while (mysqli_stmt_fetch($stmt)) {
								
								echo "<tr>";
								echo "<td><input type='radio' name='group1' value='" . $course_id . "' ></td>";
								echo "<td>" . $course_id . "</td>";
								echo "<td>" . $course_name . "</td>";
								echo "<td>" . $dept_name . "</td>";
								echo "</tr>";
							}
							echo "<tr><td class='submit' colspan='4'><input type='submit' name='submit' value='Register' /></td></tr>";
							echo "</table>";
							echo "</form>";
						}
					}
					mysqli_stmt_close($stmt);
				}
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
