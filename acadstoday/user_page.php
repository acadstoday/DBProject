
<?php
session_start();
if(!(isset($_SESSION['uid']))) {header("location:login.php");}
$uid = $_SESSION['uid'];

?>
<?php 
$user_id = $_GET['user_id'];
$home = 0;
if ($uid == $user_id){
	$home = 1;
}
$num_of_uploads = 0;
$num_of_projects = 0;
$num_of_taken_courses = 0;
$num_of_followed_courses = 0;
$num_of_instructors = 0;
$num_of_followed = 0;
?>

<html>
	<head>
		<title>Title</title>
		<?php include("header-head.php"); ?>
		<script type="text/javascript" src="js/easytab_user.js"></script>
		<link rel="stylesheet" type="text/css" href="css/easytab_user.css" />
	</head>
	<body>
		<div class="wrapper">
			<!-- connecting to database -->
			<?php include("db-connect.php"); ?>
			<!-- header code -->
			<?php include("header-body.php"); ?>
			
			<div id="leftpanel">
				
				<table border="0" width="95%" id="leftlist" cellspacing="5">
				
				<?php
				
					$stmt = mysqli_stmt_init($con);
					
					mysqli_stmt_prepare($stmt, "SELECT user_name, dept_name, prog_name, gender, dob_date, dob_month, dob_year, user_info FROM User WHERE user_id = ?") or die(mysqli_error());
					mysqli_stmt_bind_param($stmt,'i', $user_id);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt, $user_name, $dept_name, $prog_name, $gender, $dob_date, $dob_month, $dob_year, $user_info);
					while (mysqli_stmt_fetch($stmt)) {}
					
					mysqli_stmt_prepare($stmt, "SELECT count(upload_id) FROM Upload WHERE user_id = ?") or die(mysqli_error());
					mysqli_stmt_bind_param($stmt,'i', $user_id);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt, $num_of_uploads);
					while (mysqli_stmt_fetch($stmt)) {}
					
					mysqli_stmt_prepare($stmt, "SELECT count(project_id) FROM Project WHERE user_id = ?") or die(mysqli_error());
					mysqli_stmt_bind_param($stmt,'i', $user_id);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt, $num_of_projects);
					while (mysqli_stmt_fetch($stmt)) {}
					
					mysqli_stmt_prepare($stmt, "SELECT count(course_id) FROM Takes WHERE user_id = ?") or die(mysqli_error());
					mysqli_stmt_bind_param($stmt,'i', $user_id);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt, $num_of_taken_courses);
					while (mysqli_stmt_fetch($stmt)) {}
					
					mysqli_stmt_prepare($stmt, "SELECT count(course_id) FROM Course_Follow WHERE user_id = ?") or die(mysqli_error());
					mysqli_stmt_bind_param($stmt,'i', $user_id);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt, $num_of_followed_courses);
					while (mysqli_stmt_fetch($stmt)) {}
					
					mysqli_stmt_prepare($stmt, "SELECT count(inst_id) FROM Instr_Follow WHERE user_id = ?") or die(mysqli_error());
					mysqli_stmt_bind_param($stmt,'i', $user_id);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt, $num_of_instructors);
					while (mysqli_stmt_fetch($stmt)) {}
					
					mysqli_stmt_prepare($stmt, "SELECT count(user_id) FROM User_Follow WHERE user_id = ?") or die(mysqli_error());
					mysqli_stmt_bind_param($stmt,'i', $user_id);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt, $num_of_followed);
					while (mysqli_stmt_fetch($stmt)) {}
					
					mysqli_stmt_prepare($stmt, "SELECT user_id FROM User_Follow WHERE user_id = ? AND followed_id = ?") or die(mysqli_error());
					mysqli_stmt_bind_param($stmt,'ii', $uid, $user_id);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					if(mysqli_stmt_num_rows($stmt) == 0){
						$user_follow_flag = 0;
					}
					else{
						$user_follow_flag = 1;
					}
					
					mysqli_stmt_prepare($stmt, "SELECT profile_pic, user_name FROM User WHERE user_id = ?") or die(mysqli_error());
					mysqli_stmt_bind_param($stmt, 'i', $user_id);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					if(mysqli_stmt_num_rows($stmt) == 0){}
					else{
						mysqli_stmt_bind_result($stmt, $pic, $name);
						while ( mysqli_stmt_fetch($stmt) ) {}
					}
					echo "<tr><td class='pic'><img src='user/" . $user_id . "/" . $pic . "' alt='pic missing' width='173px' /></td></tr>";
					
					
					if ($home == 1) {
						echo "<tr><th><a href='edit_profile_page.php'>Edit Profile</a></th></tr>";
					}
					else {
						if ($user_follow_flag == 1) {
							echo "<tr><th><a href=processing_user.php?user_id=" . $user_id . "&action=unfollow>Unfollow</a> this user</th></tr>"; 
						}
						else {
							echo "<tr><th><a href=processing_user.php?user_id=" . $user_id . "&action=follow>Follow</a> this user</th></tr>";
						}
					}
				?>
				</table>
			</div>
			<div id="rightpanel" class="user">
				
				<div id="top-part">
					<?php
						echo "<h2>User : " . $user_name . "</h2>";
						echo "<br/><b>department</b> : " . $dept_name . " | ";
						echo "<b>program</b> : " . $prog_name . " | ";
						echo "<b>gender</b> : " . $gender . " | ";
						echo "<b>DoB</b> : " . $dob_date . "/" . $dob_month . "/" . $dob_year;
						echo "<p class='smalltext'><b>user info</b> : " . $user_info . "</p>";
					?>
				</div>
				
				<div>
					<div id="easytab1" class="menu">
						<ul>
							<li><a href="#" onmouseover="easytabs('1', '1');" onfocus="easytabs('1', '1');"  onclick="easytabs('1', '1');" title="" id="tablink1">Uploads(<?php echo $num_of_uploads ?>)</a></li>
							<li><a href="#" onmouseover="easytabs('1', '2');" onfocus="easytabs('1', '2');"  onclick="easytabs('1', '2');" title="" id="tablink2">Projects(<?php echo $num_of_projects ?>)</a></li>
							<li><a href="#" onmouseover="easytabs('1', '3');" onfocus="easytabs('1', '3');"  onclick="easytabs('1', '3');" title="" id="tablink3">Taken Courses(<?php echo $num_of_taken_courses ?>)</a></li>
							<li><a href="#" onmouseover="easytabs('1', '4');" onfocus="easytabs('1', '4');"  onclick="easytabs('1', '4');" title="" id="tablink4">Followed Courses(<?php echo $num_of_followed_courses ?>)</a></li>
							<li><a href="#" onmouseover="easytabs('1', '5');" onfocus="easytabs('1', '5');"  onclick="easytabs('1', '5');" title="" id="tablink5">Followed Instructors(<?php echo $num_of_instructors ?>)</a></li>
							<li><a href="#" onmouseover="easytabs('1', '6');" onfocus="easytabs('1', '6');"  onclick="easytabs('1', '6');" title="" id="tablink6">Followed Users(<?php echo $num_of_followed ?>)</a></li>
						</ul>
					</div>
					
					<div id="tabcontent1">
						<?php
							mysqli_stmt_prepare($stmt, "SELECT upload_id, upload_title, upload_info, format, type, course_id FROM Upload WHERE user_id = ?") or die(mysqli_error());
							mysqli_stmt_bind_param($stmt,'i', $user_id);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_store_result($stmt);
							if(mysqli_stmt_num_rows($stmt) == 0){
								echo "Currently No uploads to Show";
							}
							else{
								mysqli_stmt_bind_result($stmt, $upload_id, $upload_title, $upload_info, $format, $type, $course_id);
								echo "<div>";
								while (mysqli_stmt_fetch($stmt)) {
									echo "<div class='follow_block'><div class='follow_text'>";
									echo "<a href='upload_page.php?upload_id=" . $upload_id . "'><b>" . $upload_title . "</b></a><br/>";
									echo "<p class='smalltext'><b>Info</b> : " . $upload_info . "</br></br>";
									echo "<b>Uploaded in</b> : <a href='course_page.php?course_id=" . $course_id . "'>" . $course_id;
									echo "</a> | <b>Type</b> : " . $type . " | <b>Format</b> : " . $format ."</p></div></div>";
								}
								echo "</div>";
							}
						?>
					</div>
					
					<div id="tabcontent2">
						<?php
							mysqli_stmt_prepare($stmt, "SELECT project_id, topic, project_info FROM Project WHERE user_id = ? ") or die(mysqli_error());
							mysqli_stmt_bind_param($stmt,'i', $user_id);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_store_result($stmt);
							if(mysqli_stmt_num_rows($stmt) == 0){
								echo "Currently No Projects to Show";
							}
							else{
								mysqli_stmt_bind_result($stmt, $id, $topic, $info);
								while ( mysqli_stmt_fetch($stmt) ) {
									echo "<div class='projectbox'><p><b>Topic</b> : <a href='project_page.php?project_id=" . $id . "'>" . $topic . "</a></br>";
									echo "<b>Info</b> : " . $info . "</p></div>";
								}
							}
						?>
					</div>
					
					<div id="tabcontent3">
						<?php
							mysqli_stmt_prepare($stmt, "SELECT course_id, course_name, dept_name, course_info FROM Takes NATURAL JOIN Course WHERE user_id = ? ") or die(mysqli_error());
							mysqli_stmt_bind_param($stmt,'i', $user_id);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_store_result($stmt);
							if(mysqli_stmt_num_rows($stmt) == 0){
								echo "Currently No Courses are taken";
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
					
					<div id="tabcontent4">
						<?php
							mysqli_stmt_prepare($stmt, "SELECT course_id, course_name, dept_name, course_info FROM Course_Follow NATURAL JOIN Course WHERE user_id = ? ") or die(mysqli_error());
							mysqli_stmt_bind_param($stmt,'i', $user_id);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_store_result($stmt);
							if(mysqli_stmt_num_rows($stmt) == 0){
								echo "Currently No Courses are being followed";
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
					
					<div id="tabcontent5">
						<?php
							mysqli_stmt_prepare($stmt, "SELECT inst_id, inst_name, dept_name, inst_info FROM Instr_Follow NATURAL JOIN Instructor WHERE user_id = ? ") or die(mysqli_error());
							mysqli_stmt_bind_param($stmt,'i', $user_id);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_store_result($stmt);
							if(mysqli_stmt_num_rows($stmt) == 0){
								echo "Currently No Instructors are being followed";
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
					
					<div id="tabcontent6">
						<?php
							mysqli_stmt_prepare($stmt, "SELECT User_Follow.followed_id, User.user_name, User.dept_name, User.prog_name, User.profile_pic FROM User_Follow, User WHERE User_Follow.user_id = ? AND User.user_id = User_Follow.followed_id") or die(mysqli_error());
							mysqli_stmt_bind_param($stmt,'i', $user_id);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_store_result($stmt);
							if(mysqli_stmt_num_rows($stmt) == 0){
								echo "Currently No Users are being followed";
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

