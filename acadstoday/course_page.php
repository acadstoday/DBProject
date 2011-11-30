<?php
session_start();
if(!(isset($_SESSION['uid']))) {header("location:login.php");}
$uid = $_SESSION['uid'];

?>

<?php 
$course_id = $_GET['course_id'];
$num_of_followers = 0;
$num_of_projects = 0;
$num_of_uploads = 0;
$num_of_comments = 0;
?>

<html>
	<head>
		<title><?php echo $course_id ?>'s Page</title>
		<?php include("header-head.php"); ?>
		<!-- this css is for rating stars display -->
		<style type="text/css">
		<!--
		.restaurant-stars { display:block; width:250px; height:47px; background:url('images/blankStar.png') no-repeat; }
		-->
		</style>
		<script type="text/javascript" src="js/easytab_course.js"></script>
		<link rel="stylesheet" type="text/css" href="css/easytab_course.css" />
	</head>
	<body>
		<div class="wrapper">
		<!-- connecting to database -->
			<?php include("db-connect.php"); ?>
			<!-- header code -->
			<?php include("header-body.php"); ?>
			
			<?php 
				$stmt = mysqli_stmt_init($con);
				
				mysqli_stmt_prepare($stmt, "SELECT course_name, course_info, dept_name FROM Course WHERE course_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'s', $course_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $course_name, $course_info, $dept_name); 
				while (mysqli_stmt_fetch($stmt)) {}

				mysqli_stmt_prepare($stmt, "SELECT count(user_id) FROM Course_Rating WHERE course_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'s', $course_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $votes); 
				while (mysqli_stmt_fetch($stmt)) {}

				if ($votes != 0){
					mysqli_stmt_prepare($stmt, "SELECT avg(rating) FROM Course_Rating WHERE course_id = ?") or die(mysqli_error());
					mysqli_stmt_bind_param($stmt,'s', $course_id);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt, $course_rating); 
					while (mysqli_stmt_fetch($stmt)) {}
					$course_rating = number_format($course_rating, 2, '.', '');
				}
				else {
					$course_rating = 0.00;
				}
				
				mysqli_stmt_prepare($stmt, "SELECT user_id FROM Course_Follow WHERE course_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'s', $course_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $user_id);
				$num_of_followers = 0;
				$course_followers = array();
				while (mysqli_stmt_fetch($stmt)) {
					$course_followers[] = $user_id;
					$num_of_followers += 1;
				}
				
				mysqli_stmt_prepare($stmt, "SELECT user_id FROM Takes WHERE course_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'s', $course_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $user_id);
				$num_of_students = 0;
				$course_students = array();
				while (mysqli_stmt_fetch($stmt)) {
					$course_students[] = $user_id;
					$num_of_students += 1;
				}
				
				mysqli_stmt_prepare($stmt, "SELECT count(comment) FROM Course_Comments WHERE course_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'s', $course_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $num_of_comments);
				while (mysqli_stmt_fetch($stmt)) {}
				
				mysqli_stmt_prepare($stmt, "SELECT count(project_id) FROM Project WHERE course_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'s', $course_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $num_of_projects);
				while (mysqli_stmt_fetch($stmt)) {}
				
				mysqli_stmt_prepare($stmt, "SELECT count(upload_id) FROM Upload WHERE course_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'s', $course_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $num_of_uploads);
				while (mysqli_stmt_fetch($stmt)) {}
				
				mysqli_stmt_prepare($stmt, "SELECT course_id FROM Takes WHERE course_id = ? AND user_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'si', $course_id, $uid);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				if(mysqli_stmt_num_rows($stmt) == 0){
					$course_taken_flag = 0;
				}
				else{
					$course_taken_flag = 1;
				}
				
				mysqli_stmt_prepare($stmt, "SELECT course_id FROM Course_Follow WHERE course_id = ? AND user_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'si', $course_id, $uid);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				if(mysqli_stmt_num_rows($stmt) == 0){
					$course_follow_flag = 0;
				}
				else{
					$course_follow_flag = 1;
				}
				
				
				mysqli_stmt_prepare($stmt, "SELECT rating FROM Course_Rating WHERE course_id = ? AND user_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'si', $course_id, $uid);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $course_rating_flag); 
				$course_rating_flag = 0;
				while (mysqli_stmt_fetch($stmt)) {}
			?>
			
			<div id="page">
				<div id="top-part">
					<?php echo "<h2>" . $course_id . " : " . $course_name . "</h2>"; ?>
					<div class="restaurant-stars">
						<div class="restaurant-stars-rating" title="rating" style="display:block; width:<?php echo $course_rating*50 ?>px; height:47px; background:url('images/colorStar.png') no-repeat;">
						</div><br/>
						<center><?php echo $course_rating . " (" . $votes . " Votes)" ?></center>
					</div>
					<?php
						echo "<br/><br/><b>dept</b> : " . $dept_name;
						echo "<p class='smalltext'><b>info</b> : " . $course_info . "</p>";
					?>
					
					
				</div>
				
				<div>
					<div id="easytab1" class="menu">
						<ul>
							<li><a href="#" onmouseover="easytabs('1', '1');" onfocus="easytabs('1', '1');"  onclick="easytabs('1', '1');" title="" id="tablink1">Comments(<?php echo $num_of_comments ?>)</a></li>
							<li><a href="#" onmouseover="easytabs('1', '2');" onfocus="easytabs('1', '2');"  onclick="easytabs('1', '2');" title="" id="tablink2">Uploads(<?php echo $num_of_uploads ?>)</a></li>
							<li><a href="#" onmouseover="easytabs('1', '3');" onfocus="easytabs('1', '3');"  onclick="easytabs('1', '3');" title="" id="tablink3">Projects(<?php echo $num_of_projects ?>)</a></li>
							<li><a href="#" onmouseover="easytabs('1', '4');" onfocus="easytabs('1', '4');"  onclick="easytabs('1', '4');" title="" id="tablink4">Followers(<?php echo $num_of_followers ?>)</a></li>
							<li><a href="#" onmouseover="easytabs('1', '5');" onfocus="easytabs('1', '5');"  onclick="easytabs('1', '5');" title="" id="tablink5">Students(<?php echo $num_of_students ?>)</a></li>
						</ul>
					</div>
					<div id="tabcontent1">
						<?php
							mysqli_stmt_prepare($stmt, "SELECT comment_id, user_id, user_name, comment, time_stamp FROM Course_Comments NATURAL JOIN User WHERE course_id = ? ORDER BY time_stamp DESC") or die(mysqli_error());
							mysqli_stmt_bind_param($stmt,'s', $course_id);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_store_result($stmt);
							if(mysqli_stmt_num_rows($stmt) == 0){
								echo "Currently No Comments to Show";
							}
							else{
								mysqli_stmt_bind_result($stmt, $comment_id, $user_id, $user_name, $comment, $timestamp);
								while ( mysqli_stmt_fetch($stmt) ) {
									echo "<div class='commentbox'>";
									if ($user_id == $uid){
										echo "<a href='delete_comment.php?type=course&id=" . $course_id . "&comment_id=" . $comment_id . "'><img src='images/close_x.png' class='delete-comment' alt='delete' /></a>";
									}
									echo "<p><a href='user_page.php?user_id=" . $user_id . "'> " . $user_name . "</a> wrote:</br>";
									echo "" . $comment . "</p>";
									echo "<p class='smalltext'><i>on</i> " . $timestamp . "</p>";
									echo "</div>";
									
								}
							}
						?>
					</div>
					<div id="tabcontent2">
						<?php
							mysqli_stmt_prepare($stmt, "SELECT upload_id, upload_title, upload_info, format, type, user_id, user_name FROM Upload NATURAL JOIN User WHERE course_id = ?") or die(mysqli_error());
							mysqli_stmt_bind_param($stmt,'s', $course_id);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_store_result($stmt);
							if(mysqli_stmt_num_rows($stmt) == 0){
								echo "Currently No uploads to Show";
							}
							else{
								mysqli_stmt_bind_result($stmt, $upload_id, $upload_title, $upload_info, $format, $type, $user_id, $user_name);
								echo "<div>";
								while (mysqli_stmt_fetch($stmt)) {
									echo "<div class='follow_block'><div class='follow_text'>";
									echo "<a href='upload_page.php?upload_id=" . $upload_id . "'><b>" . $upload_title . "</b></a><br/>";
									echo "<p class='smalltext'><b>Info</b> : " . $upload_info . "</br></br>";
									echo "<b>Uploaded by</b> : <a href='user_page.php?user_id=" . $user_id . "'>" . $user_name;
									echo "</a> | <b>Type</b> : " . $type . " | <b>Format</b> : " . $format ."</p></div></div>";
								}
								echo "</div>";
							}
						?>
					</div>
					<div id="tabcontent3">
						<?php
							mysqli_stmt_prepare($stmt, "SELECT project_id, topic, project_info FROM Project WHERE course_id = ? ") or die(mysqli_error());
							mysqli_stmt_bind_param($stmt,'s', $course_id);
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
					<div id="tabcontent4">
						<?php
							if ($num_of_followers == 0){
								echo "Currently No Followers to Show";
							}
							else{
								foreach ($course_followers as $follower_id) {
									mysqli_stmt_prepare($stmt, "SELECT user_name, dept_name, prog_name, profile_pic FROM User WHERE user_id = ?") or die(mysqli_error());
									mysqli_stmt_bind_param($stmt,'i', $follower_id);
									mysqli_stmt_execute($stmt);
									mysqli_stmt_store_result($stmt);
									if(mysqli_stmt_num_rows($stmt) == 0){
										echo "<div class='follow_block'>Error in retrieving the follower details</div>";
									}
									else{
										mysqli_stmt_bind_result($stmt, $user, $dept, $prog, $pic);
										echo "<div>";
										while (mysqli_stmt_fetch($stmt)) {
											echo "<div class='follow_block'><div class='follow_pic'>";
											echo "<img src='user/" . $follower_id . "/" . $pic . "' alt='pic missing' width='75px' />";
											echo "</div><div class='follow_text'>";
											echo "<a href='user_page.php?user_id=" . $follower_id . "'>" . $user . "</a><br/>";
											echo "<p class='smalltext'>Dept : " . $dept . "</br>";
											echo "Program : " . $prog . "</p></div></div>";
										}
										echo "</div>";
									}
								}
							}
						?>
					</div>
					<div id="tabcontent5">
						<?php
							if ($num_of_students== 0){
								echo "Currently No Students to Show";
							}
							else{
								foreach ($course_students as $student_id) {
									mysqli_stmt_prepare($stmt, "SELECT user_name, dept_name, prog_name, profile_pic FROM User WHERE user_id = ?") or die(mysqli_error());
									mysqli_stmt_bind_param($stmt,'i', $student_id);
									mysqli_stmt_execute($stmt);
									mysqli_stmt_store_result($stmt);
									if(mysqli_stmt_num_rows($stmt) == 0){
										echo "<div class='follow_block'>Error in retrieving the Student details</div>";
									}
									else{
										mysqli_stmt_bind_result($stmt, $user, $dept, $prog, $pic);
										echo "<div>";
										while (mysqli_stmt_fetch($stmt)) {
											echo "<div class='follow_block'><div class='follow_pic'>";
											echo "<img src='user/" . $student_id . "/" . $pic . "' alt='pic missing' width='75px' />";
											echo "</div><div class='follow_text'>";
											echo "<a href='user_page.php?user_id=" . $student_id . "'>" . $user . "</a><br/>";
											echo "<p class='smalltext'>Dept : " . $dept . "</br>";
											echo "Program : " . $prog . "</p></div></div>";
										}
										echo "</div>";
									}
								}
							}
						?>
					</div>
				</div>
			</div>
			
			<div id="sidebar">
				<table border="0" id="rightlist">
				<?php
					if ($course_taken_flag == 1) {
						echo "<tr><th><a href=processing_course.php?course_id=" . $course_id . "&action=drop>Drop</a> this course</th></tr>"; 
					}
					else {
						echo "<tr><th><a href=processing_course.php?course_id=" . $course_id . "&action=take>Take</a> this course</th></tr>";
					}
				?>
				<?php
					if ($course_follow_flag == 1) {
						echo "<tr><th><a href=processing_course.php?course_id=" . $course_id . "&action=unfollow>Unfollow</a> this course</th></tr>"; 
					}
					else {
						echo "<tr><th><a href=processing_course.php?course_id=" . $course_id . "&action=follow>Follow</a> this course</th></tr>";
					}
				?>
				<?php
					echo "<tr><th><a href=upload.php?course_id=" . $course_id . ">Upload</a> some material</th></tr>";
				?>
				<?php
					if ($course_rating_flag != 0) {
						echo "<tr><th><p>Your rating : " . $course_rating_flag . "</p></th></tr>"; 
					}
					else {
				?>
					<tr><th>
						<form action="update_rating_course.php" method="post">
							Rate The Course : 
							<select name="rating" value="5">
								<option>5</option>
								<option>4</option>
								<option>3</option>
								<option>2</option>
								<option>1</option>
							</select>
							<?php echo "<input type='hidden' name='course_id' value='" . $course_id . "'/>"; ?>
							<input type="submit" value="Rate" />
						</form>
					</th></tr>
				<?php
					}
				?>
				<tr><th>
					<form action="comment_course.php" method="post">
						<textarea name="comment" rows="3" cols="34" onfocus="if (this.value == 'Comment Here') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Comment Here';}">Comment Here</textarea>
						<?php echo "<input type='hidden' name='course_id' value='" . $course_id . "'/>"; ?>
						<input type="submit" value="Submit" />
					</form>
				</th></tr>
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr><td>
					<div id="easytab2" class="menu">
						<ul>
							<li><a href="#" onmouseover="easytabs('2', '1');" onfocus="easytabs('2', '1');"  onclick="easytabs('2', '1');" title="" id="anotherlink1" >Instructors</a></li>
							<li><a href="#" onmouseover="easytabs('2', '2');" onfocus="easytabs('2', '2');"  onclick="easytabs('2', '2');" title="" id="anotherlink2" >Perequisite Couses</a></li>
						</ul>
					</div>
					
					<div id="anothercontent1">
						<?php
							mysqli_stmt_prepare($stmt, "SELECT inst_id, inst_name FROM Teaches NATURAL JOIN Instructor WHERE course_id = ?") or die(mysqli_error());
							mysqli_stmt_bind_param($stmt,'s', $course_id);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_store_result($stmt);
							if(mysqli_stmt_num_rows($stmt) == 0){
								echo "Currently, there are no instructors to this course.";
							}
							else{
								mysqli_stmt_bind_result($stmt, $inst_id, $inst_name);
								echo "<ul>";
								while (mysqli_stmt_fetch($stmt)) {
										echo "<li><a href='instructor_page.php?inst_id=" . $inst_id . "'>" . $inst_name . "</a></li>";
								}
								echo "</ul>";
							}
						?>
					</div>
					
					<div id="anothercontent2">
						<?php
							mysqli_stmt_prepare($stmt, "SELECT prereq_id FROM Prereq WHERE course_id = ?") or die(mysqli_error());
							mysqli_stmt_bind_param($stmt,'s', $course_id);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_store_result($stmt);
							if(mysqli_stmt_num_rows($stmt) == 0){
								echo "There are No Prerequisites to this course.";
							}
							else{
								mysqli_stmt_bind_result($stmt, $prereq_id);
								echo "<ul>";
								while (mysqli_stmt_fetch($stmt)) {
										echo "<li><a href='course_page.php?course_id=" . $prereq_id . "'>" . $prereq_id . "</a></li>";
								}
								echo "</ul>";
							}
						?>
					</div>
				</td></tr>
				
				</table>
			</div>
			
			<div class="push"></div>
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>

