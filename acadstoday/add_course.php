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
			<div class="addForm">
				<h2>Course Registration</h2>

				<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
					Search: <input type="text" size="12" maxlength="12" name="course" value=""/><br>
					<input type="checkbox" name="option1" value="course_id" /> Search by Course ID<br>
					<input type="checkbox" name="option2" value="course_name" /> Search by Course Name<br>
					<input type="submit" name="submit" value="Search" />
				</form>

				<?php
					if ($_REQUEST['course'] == null){
						echo "<i>Enter something to search</i>";
					}
					if(isset($_REQUEST['option1']) && isset($_REQUEST['option2']) && $_REQUEST['option1'] == "course_id" && $_REQUEST['option2'] == "course_name"){
						$help = "SELECT * FROM course WHERE course_name like'%".$_REQUEST['course']."%' or course_id like '%".$_REQUEST['course']."%'";
					}

					elseif(isset($_REQUEST['option1']) && $_REQUEST['option1'] == "course_id"){
						$help = "SELECT * FROM course WHERE lower(course_id) like '%".$_REQUEST['course']."%'";
					}

					elseif(isset($_REQUEST['option2']) && $_REQUEST['option2'] == "course_name"){
						$help = "SELECT * FROM course WHERE lower(course_name) like '%".$_REQUEST['course']."%'";
					}
					else{
						$help = "";
						if($_REQUEST['course'] != ""){
						echo "<i>Select whether to search by ID or name<i>";
						}
					}
					//$query = sprintf($help);
					if ($_REQUEST['course'] != "" && $help != ""){
						$result = mysql_query($help);

						if (!$result) {
							$message  = 'Invalid query: ' . mysql_error() . "\n";
							$message .= 'Whole query: ' . $query;
							die($message);
						}
						if(mysql_num_rows($result) == 0){
							echo "No Courses found";
						}
					else{
						echo "<hr>";
						echo "<form>";
						while ($row = mysql_fetch_assoc($result)) {
							echo "<input type=\"radio\" name=\"group1\" value=\"".$row['course_id']." \">";
							echo $row['course_id'];
							echo "&nbsp&nbsp&nbsp";
							echo $row['course_name'];
							echo "&nbsp&nbsp&nbsp";
							echo $row['dept_name'];
							echo "</br>";
						}
						echo "</br>";
						echo "<input type=\"submit\" name=\"submit\" value=\"Register\" />";
						echo "</form>";
					}
					mysql_free_result($result);
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
