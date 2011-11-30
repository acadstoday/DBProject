<?php
session_start();
if(!(isset($_SESSION['uid']))) {header("location:login.php");}
$uid = $_SESSION['uid'];

?>
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
			<div id="content">
			<!-- left panel code -->
			<?php include("left_panel.php"); ?>
			
			<div id="center" class="leftpad">
				<h3>Search Result for Query "<?php echo $_GET["search_text"]; ?>"</h3>
				<div>
				<!--Start of the Tabmenu 1 -->
				<div id="easytab1" class="menu">
					<ul>
						<li><a href="#" onmouseover="easytabs('1', '1');" onfocus="easytabs('1', '1');"  onclick="easytabs('1', '1');" title="" id="tablink1">Courses</a></li>
						<li><a href="#" onmouseover="easytabs('1', '2');" onfocus="easytabs('1', '2');"  onclick="easytabs('1', '2');" title="" id="tablink2">Instructors</a></li>
						<li><a href="#" onmouseover="easytabs('1', '3');" onfocus="easytabs('1', '3');"  onclick="easytabs('1', '3');" title="" id="tablink3">Users</a></li>
						<li><a href="#" onmouseover="easytabs('1', '4');" onfocus="easytabs('1', '4');"  onclick="easytabs('1', '4');" title="" id="tablink4">Uploads</a></li>
					</ul>
				</div>
				<div id="tabcontent1">
					<?php
						$stmt = mysqli_stmt_init($con);
						$search_query = "%" . $_GET["search_text"] . "%";
						mysqli_stmt_prepare($stmt, "SELECT course_id, course_name, dept_name, course_info FROM Course WHERE lower(course_name) like ? OR lower(dept_name) like ? OR lower(course_info) like ?") or die(mysqli_error());
						mysqli_stmt_bind_param($stmt,'sss', $search_query, $search_query, $search_query);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt) == 0){
							echo "No Search Results";
						}
						else{
							mysqli_stmt_bind_result($stmt, $id, $name, $dept, $info);
							while (mysqli_stmt_fetch($stmt)) {
									echo "<div class='teachbox'><p><a href='course_page.php?course_id=" . $id . "'><b>" . $id . "</b></a> : ";
									echo $name . "</p>";
									echo "<p class='smalltext'><i>Info</i> : " . $info . "</p></div>";
							}
						}
					?>
				</div>
				
				<div id="tabcontent2">
					<?php
						mysqli_stmt_prepare($stmt, "SELECT inst_id, inst_name, dept_name, inst_info FROM Instructor WHERE lower(inst_name) like ? OR lower(dept_name) like ?") or die(mysqli_error());
						mysqli_stmt_bind_param($stmt,'ss', $search_query, $search_query);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt) == 0){
							echo "No Search Results";
						}
						else{
							mysqli_stmt_bind_result($stmt, $id, $name, $dept, $info);
							while (mysqli_stmt_fetch($stmt)) {
									echo "<div class='teachbox'><p><a href='instructor_page.php?inst_id=" . $id . "'><b>" . $name . "</b></a></p>";
									echo "<p class='smalltext'><b>Department</b> : " . $dept . "<br/><b>Info</b> : " . $info . "</p></div>";
							}
						}
					?>
				</div>
				
				<div id="tabcontent3">
					<?php
						mysqli_stmt_prepare($stmt, "SELECT user_id, user_name, dept_name, prog_name, profile_pic FROM User WHERE lower(user_name) like ? OR (dept_name) like ? OR lower(prog_name) like ?") or die(mysqli_error());
						mysqli_stmt_bind_param($stmt,'sss', $search_query, $search_query, $search_query);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt) == 0){
							echo "No search results";
						}
						else{
							mysqli_stmt_bind_result($stmt, $id, $user, $dept, $prog, $pic);
							echo "<div>";
							while (mysqli_stmt_fetch($stmt)) {
								echo "<div class='follow_block'><div class='follow_pic'>";
								echo "<img src='user/" . $id . "/" . $pic . "' alt='pic missing' width='75px' />";
								echo "</div><div class='follow_text'>";
								echo "<a href='user_page.php?user_id=" . $id . "'>" . $user . "</a><br/>";
								echo "<p class='smalltext'>Dept : " . $dept . "</br>";
								echo "Program : " . $prog . "</p></div></div>";
							}
							echo "</div>";
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
							echo "<div>";
							while (mysqli_stmt_fetch($stmt)) {
								echo "<div class='follow_block'><div class='follow_text'>";
								echo "<a href='upload_page.php?upload_id=" . $upload_id . "'><b>" . $upload_title . "</b></a><br/>";
								echo "<p class='smalltext'><b>Info</b> : " . $upload_info . "</br></br>";
								echo "<b>Uploaded by</b> : <a href='user_page.php?user_id=" . $user_id . "'>" . $user_name;
								echo "</a> | <b>in</b> : <a href='course_page.php?course_id=" . $course_id . "'>" . $course_id;
								echo "</a> | <b>Type</b> : " . $type . " | <b>Format</b> : " . $format ."</p></div></div>";
							}
							echo "</div>";
						}
						mysqli_stmt_close($stmt);
					?>
				</div>
				</div>
			</div>
			<!-- right panel code -->
			<?php include("right_panel.php"); ?>
			</div>
			<div class="push"></div>
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>

