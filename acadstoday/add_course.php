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
					Search: <input type="text" size="12" maxlength="12" name="course" value=""/><br>
					<input type="checkbox" name="option1" value="course_id" /> Search by Course ID<br>
					<input type="checkbox" name="option2" value="course_name" /> Search by Course Name<br>
					<input type="submit" name="submit" value="Search" />
				</form>

				<?php
				
				$stmt = mysqli_stmt_init($con);
				$help = 'help';
					
				if (isset($_REQUEST['course'])){
					
					if ($_REQUEST['course'] == null){
						echo "<i>Enter something to search</i>";
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
						echo "<i>Select whether to search by ID or name<i>";
						}
					}
					
					if ($_REQUEST['course'] != "" && $help != ""){
						mysqli_stmt_execute($stmt);
						//mysqli_stmt_store_result($stmt);
						mysqli_stmt_bind_result($stmt, $course_id, $course_name, $dept_name);
						
						echo "<hr />";
						/*if(mysqli_stmt_num_rows($stmt) == 0){
							echo "No Courses found";
						}
						else{*/
							echo "<form method='POST' action='' >";
							while (mysqli_stmt_fetch($stmt)) {
								echo "<input type='radio' name='group1' value='" . $course_id . "' >";
								echo $course_id;
								echo "&nbsp&nbsp&nbsp";
								echo $course_name;
								echo "&nbsp&nbsp&nbsp";
								echo $dept_name;
								echo "</br>";
							}
							echo "</br>";
							echo "<input type='submit' name='submit' value='Register' />";
							echo "</form>";
						//}
					}
					mysqli_stmt_close($stmt);
				}
				?>
			</div>
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>
