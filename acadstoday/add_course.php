<?php
session_start();
if(!(isset($_SESSION['uid']))) {header("location:login.php");}
$uid = $_SESSION['uid'];

?>

<?php
require('err.php');
?>
<html>
	<head>
		<title>Add a Course</title>
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
						mysqli_stmt_prepare($stmt, "SELECT course_id, course_name, dept_name, course_info FROM Course WHERE course_name like ? OR course_id like ?") or die(mysqli_error());
						mysqli_stmt_bind_param($stmt,'ss', $search_query, $search_query);
					}

					elseif(isset($_REQUEST['option1']) && $_REQUEST['option1'] == "course_id"){
						mysqli_stmt_prepare($stmt, "SELECT course_id, course_name, dept_name, course_info FROM Course WHERE lower(course_id) like ?") or die(mysqli_error());
						mysqli_stmt_bind_param($stmt,'s', $search_query);
					}

					elseif(isset($_REQUEST['option2']) && $_REQUEST['option2'] == "course_name"){
						mysqli_stmt_prepare($stmt, "SELECT course_id, course_name, dept_name, course_info FROM Course WHERE lower(course_name) like ?") or die(mysqli_error());
						mysqli_stmt_bind_param($stmt,'s', $search_query);
					}
					else{
						$help = "";
						if($_REQUEST['course'] != ""){
						echo "<div class='error'>Select whether to search by ID or name</div>";
						}
					}
					
					if ($_REQUEST['course'] != "" && $help != ""){
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt) == 0){
							echo "No Courses found";
						}
						else{
							mysqli_stmt_bind_result($stmt, $id, $name, $dept, $info);
							echo "<form method='POST' action='process_add_course.php' >";
							echo "<div id='list-result-add'>";
							echo "<table id='list' border='0'>";
							echo "<tr><th>Select</th><th>Course Details</th></tr>";
							
							while (mysqli_stmt_fetch($stmt)) {
								echo "<tr><td><input type='radio' name='course_id' value='" . $id . "' ></td>";
								echo "<td><div class='teachbox'><p><a href='course_page.php?course_id=" . $id . "'><b>" . $id . "</b></a> : ";
								echo $name . "</p>";
								echo "<p class='smalltext'><i>Info</i> : " . $info . "</p></div></td></tr>";

							}
							echo "</table>";
							echo "</div>";
							echo "<br /><input type='submit' name='submit' value='Register' />";
							echo "</form>";
						}
					}
					mysqli_stmt_close($stmt);
				}
				?>
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
