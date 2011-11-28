<html>
	<head>
		<title>Search Results of '<?php echo $_GET["search_text"]; ?>'</title>
		<?php include("header-head.php"); ?>
		<script type="text/javascript" src="js/easytab_search.js"></script>
		<link rel="stylesheet" type="text/css" href="css/easytab_search.css" />
	</head>
	<body>
		<div class="wrapper">
			<!-- connecting to database -->
			<?php include("db-connect.php"); ?>
			<!-- header code -->
			<?php include("header-body.php"); ?>
			
			<div class="leftpad">
				<h3>Search Result for Query "<?php echo $_GET["search_text"]; ?>"</h3>
				
				<!--Start of the Tabmenu 1 -->
				<div class="menu">
					<ul>
						<li><a href="#" onmouseover="easytabs('1', '1');" onfocus="easytabs('1', '1');"  onclick="easytabs('1', '1');" title="" id="tablink1">Courses</a></li>
						<li><a href="#" onmouseover="easytabs('1', '2');" onfocus="easytabs('1', '2');"  onclick="easytabs('1', '2');" title="" id="tablink2">Instructors</a></li>
						<li><a href="#" onmouseover="easytabs('1', '3');" onfocus="easytabs('1', '3');"  onclick="easytabs('1', '3');" title="" id="tablink3">Users</a></li>
						<li><a href="#" onmouseover="easytabs('1', '4');" onfocus="easytabs('1', '4');"  onclick="easytabs('1', '4');" title="" id="tablink4">Upload</a></li>
					</ul>
				</div>
				<div id="tabcontent1">
					<?php
						$stmt = mysqli_stmt_init($con);
						$search_query = "%" . $_GET["search_text"] . "%";
						mysqli_stmt_prepare($stmt, "SELECT course_id, course_name, dept_name FROM Course WHERE lower(course_name) like ? OR lower(dept_name) like ?") or die(mysqli_error());
						mysqli_stmt_bind_param($stmt,'ss', $search_query, $search_query);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt) == 0){
							echo "No Search Results";
						}
						else{
							mysqli_stmt_bind_result($stmt, $course_id, $course_name, $dept_name);
							echo "<table border='0' id='list'>";
							echo "<tr><th>Course ID</th><th>Course Name</th><th>Department Name</th></tr>";
							while (mysqli_stmt_fetch($stmt)) {
									echo "<tr><td><a href='course_page.php?course_id=" . $course_id . "'>" . $course_id . "</a></td>";
									echo "<td>" . $course_name . "</td>";
									echo "<td>" . $dept_name . "</td></tr>";
							}
							echo "</table>";
						}
					?>
				</div>
				
				<div id="tabcontent2">
					<?php
						mysqli_stmt_prepare($stmt, "SELECT inst_id, inst_name, dept_name FROM Instructor WHERE lower(inst_name) like ? OR lower(dept_name) like ?") or die(mysqli_error());
						mysqli_stmt_bind_param($stmt,'ss', $search_query, $search_query);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt) == 0){
							echo "No Search Results";
						}
						else{
							mysqli_stmt_bind_result($stmt, $inst_id, $inst_name, $dept_name);
							echo "<table border='0' id='list'>";
							echo "<tr><th>Instructor Name</th><th>Department Name</th></tr>";
							while (mysqli_stmt_fetch($stmt)) {
									echo "<tr><td><a href='instructor_page.php?inst_id=" . $inst_id . "'>" . $inst_name . "</a></td>";
									echo "<td>" . $dept_name . "</td></tr>";
							}
							echo "</table>";
						}
					?>
				</div>
				
				<div id="tabcontent3">
					<?php
						mysqli_stmt_prepare($stmt, "SELECT user_id, user_name, dept_name, prog_name FROM User WHERE lower(user_name) like ? OR (dept_name) like ? OR lower(prog_name) like ?") or die(mysqli_error());
						mysqli_stmt_bind_param($stmt,'sss', $search_query, $search_query, $search_query);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt) == 0){
							echo "No Search Results";
						}
						else{
							mysqli_stmt_bind_result($stmt, $user_id, $user_name, $dept_name, $prog_name);
							echo "<table border='0' id='list'>";
							echo "<tr><th>User Name</th><th>Department Name</th><th>Program Name</th></tr>";
							while (mysqli_stmt_fetch($stmt)) {
									echo "<tr><td><a href='user_page.php?user_id=" . $user_id . "'>" . $user_name . "</a></td>";
									echo "<td>" . $dept_name . "</td>";
									echo "<td>" . $prog_name . "</td></tr>";
							}
							echo "</table>";
						}
					?>
				</div>
				
				<div id="tabcontent4">
					<?php
						mysqli_stmt_prepare($stmt, "SELECT upload_id, upload_title, upload_info, format, type, course_id, user_id, user_name FROM Upload  NATURAL JOIN User WHERE lower(format) like ? OR lower(type) like ? OR lower(course_id) like ? OR lower(user_name) like ? OR lower(upload_title) like ? OR lower(upload_info) like ?");
						mysqli_stmt_bind_param($stmt,'ssssss', $search_query, $search_query, $search_query, $search_query, $search_query, $search_query);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt) == 0){
							echo "No Search Results";
						}
						else{
							mysqli_stmt_bind_result($stmt, $upload_id, $upload_title, $upload_info, $format, $type, $course_id, $user_id, $user_name);
							echo "<table border='0' id='list'>";
							echo "<tr><th>Upload</th><th>Details</th><th>Format</th><th>Type</th><th>Course Id</th><th>User Name</th></tr>";
							while (mysqli_stmt_fetch($stmt)) {
									echo "<tr><td><a href='upload_page.php?upload_id=" . $upload_id . "'>" . $upload_title . "</a></td>";
									echo "<td>" . $upload_info . "</td>";
									echo "<td>" . $format . "</td>";
									echo "<td>" . $type . "</td>";
									echo "<td><a href='course_page.php?course_id=" . $course_id . "'>" . $course_id . "</a></td>";
									echo "<td><a href='user_page.php?user_id=" . $user_id . "'>" . $user_id . "</a></td></tr>";
							}
							echo "</table>";
						}
						mysqli_stmt_close($stmt);
					?>
				</div>
			</div>
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>

