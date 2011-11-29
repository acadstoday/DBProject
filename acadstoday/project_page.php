<?php
$project_id = $_GET['project_id'];
/*$uid = $_SESSION['uid'];*/
$uid = '7';
?>


<html>
	<head>
		<title>Project Page</title>
		<?php include("header-head.php"); ?>
	</head>
	<body>
		<div class="wrapper">
			<!-- connecting to database -->
			<?php include("db-connect.php"); ?>
			<!-- header code -->
			<?php include("header-body.php"); ?>
			<?php
                $stmt = mysqli_stmt_init($con);
                
                mysqli_stmt_prepare($stmt, "SELECT user_id, user_name, inst_id, inst_name, course_id, topic, project_info, start_date, start_month, start_year, end_date, end_month, end_year FROM Project NATURAL JOIN User NATURAL JOIN Instructor WHERE project_id = ?") or die(mysqli_error());
                mysqli_stmt_bind_param($stmt,'i', $project_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $user_id, $user_name, $inst_id, $inst_name, $course_id, $topic, $project_info, $start_date, $start_month, $start_year, $end_date, $end_month, $end_year);
                while (mysqli_stmt_fetch($stmt)) {}
			?>
			<div class="project-leftpad">
				<h2>Project : <?php echo $topic ?></h2>
				<div id="project-content">
					<?php echo "<p><b>Info</b> : " . $project_info . "</p>"; ?>
					<table>
						<tr>
							<td><b>Start Date</b> : </td>
							<?php echo "<td>" . $start_date . "/" . $start_month . "/" . $start_year . "</td>"; ?>
						</tr>
						<tr>
							<td><b>End Date</b> : </td>
							<?php echo "<td>" . $end_date . "/" . $end_month . "/" . $end_year . "</td>"; ?>
						</tr>
						<tr>
							<td><b>Course ID</b> : </td>
							<?php echo "<td><a href='course_page.php?course_id=" . $course_id . "'>" . $course_id . "</a></td>"; ?>
						</tr>
						<tr>
							<td><b>User</b> : </td>
							<?php echo "<td><a href='user_page.php?user_id=" . $user_id . "'>" . $user_name . "</a></td>"; ?>
						</tr>
						<tr>
							<td><b>Instructor</b> : </td>
							<?php echo "<td><a href='instructor_page.php?inst_id=" . $inst_id . "'>" . $inst_id . "</a></td>"; ?>
						</tr>
					</table>
					
				</div>
			</div>
			
			
			
			<div class="push"></div>
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>

