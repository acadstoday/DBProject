<?php 
//given course_id in $_GET

/*write queries to get the following details in the given variables
$course_id = $_GET['course_id'] #
$course_name #
$course_dept #
$course_info #
$course_rating #
$votes # //number of people who have rated

*below details will be displayed in tabs
$course_teachers [array]
$course_uploads [array]
$course_comments [array]
$course_projects [array]
$course_prereqs [array]
$course_followers [array]
$num_of_followers

*flags
$couse_taken_flag - 1 if user has taken this course else 0
$course_follow_flag - 1 if user is following this course else 0
$course_rating_flag - 0 if user has not rated this course else user's rating
*/

$course_id = $_GET['course_id'];
/*$uid = $_SESSION['uid'];*/
$uid = '7';
?>

<html>
	<head>
		<title><?php $course_id ?></title>
		<?php include("header-head.php"); ?>
		<!-- this css is for rating stars display -->
		<style type="text/css">
		<!--
		.restaurant-stars { display:block; width:250px; height:47px; background:url('images/blankStar.png') no-repeat; }
		-->
		</style>
		<script type="text/javascript">
			function set_rating(new_rating){
				document.getElementById('rating_display').innerHTML = "Your rating = " + new_rating;
			}
			function update_rating(){
				<!--
				window.location = "update_rating.php?new_rating=" + document.getElementById('rating_select').value + "&course_id=" + document.getElementById('courseId').innerHTML;
				//-->
			}
		</script>
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
				
				mysqli_stmt_prepare($stmt, "SELECT count(comments) FROM Course_Comments WHERE course_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'s', $course_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $num_of_comments);
				while (mysqli_stmt_fetch($stmt)) {}
				
				mysqli_stmt_prepare($stmt, "SELECT count(project_id) FROM Project WHERE course_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'s', $course_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $num_of_projects);
				while (mysqli_stmt_fetch($stmt)) {}
				
				mysqli_stmt_prepare($stmt, "SELECT count(project_id) FROM Course_Comments WHERE course_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'s', $course_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $num_of_projects);
				while (mysqli_stmt_fetch($stmt)) {}
			?>
			
			<div id="page">
				<?php echo "<h2>" . $course_id . " : " . $course_name . "</h2>"; ?>
				<?php echo "<h3>" . $dept_name . "</h3>"; ?>
				<?php echo "<p>" . $course_info . "</p>"; ?>
				<div class="restaurant-stars">
					<div class="restaurant-stars-rating" title="rating" style="display:block; width:<?php echo $course_rating*50 ?>px; height:47px; background:url('images/colorStar.png') no-repeat;">              
						&nbsp;
					</div><br/>
					<center><?php echo $course_rating . " (" . $votes . " Votes)" ?></center>
				</div>
				
				<div id="wall">
					<div id="easytab1" class="menu">
						<ul>
							<li><a href="#" onmouseover="easytabs('1', '1');" onfocus="easytabs('1', '1');"  onclick="easytabs('1', '1');" title="" id="tablink1">Comments</a></li>
							<li><a href="#" onmouseover="easytabs('1', '2');" onfocus="easytabs('1', '2');"  onclick="easytabs('1', '2');" title="" id="tablink2">Uploads</a></li>
							<li><a href="#" onmouseover="easytabs('1', '3');" onfocus="easytabs('1', '3');"  onclick="easytabs('1', '3');" title="" id="tablink3">Projects</a></li>
							<li><a href="#" onmouseover="easytabs('1', '4');" onfocus="easytabs('1', '4');"  onclick="easytabs('1', '4');" title="" id="tablink4">Followers(<?php echo $num_of_followers?>)</a></li>
						</ul>
					</div>
					<div id="tabcontent1">
						<?php
							mysqli_stmt_prepare($stmt, "SELECT user_id, user_name, comment, time_stamp FROM Course_Comments NATURAL JOIN User ORDER BY time_stamp DESC") or die(mysqli_error());
							mysqli_stmt_execute($stmt);
							mysqli_stmt_store_result($stmt);
							if(mysqli_stmt_num_rows($stmt) == 0){
								echo "Currently No Comments to Show";
							}
							else{
								/* bind result variables */
								mysqli_stmt_bind_result($stmt, $user_id, $user_name, $comment, $timestamp);
								/* fetch value */
								while ( mysqli_stmt_fetch($stmt) ) {
									echo "<div class='commentbox'><p><a href='user_page.php?user_id=" . $user_id . "> " . $user_name . "</a></p>";
									echo "<p>" . $comment . "</p>";/*
									echo "<p class='smalltext'><i>on</i>" . $timestamp . "</p>";*/
									echo "</div>";
								}
							}
						?>
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
					</div>
					<div id="tabcontent2">
					</div>
					<div id="tabcontent3">
					</div>
					<div id="tabcontent4">
						<?php
							foreach ($course_followers as $follower_id) {
								mysqli_stmt_prepare($stmt, "SELECT user_name, dept_name, prog_name, profile_pic FROM User WHERE user_id = ?") or die(mysqli_error());
								mysqli_stmt_bind_param($stmt,'i', $follower_id);
								mysqli_stmt_execute($stmt);
								mysqli_stmt_store_result($stmt);
								if(mysqli_stmt_num_rows($stmt) == 0){
									echo "<div>No Search Results</div>";
								}
								else{
									mysqli_stmt_bind_result($stmt, $user, $dept, $prog, $pic);
									echo "<div>";
									while (mysqli_stmt_fetch($stmt)) {
										echo "<div class='follow_block'><div class='follow_pic'>";
										echo "<img src='user/" . $follower_id . "/" . $pic . "' alt='pic missing' width='75px' />";
										echo "</div><div class='follow_text'>";
										echo "<a href='user_page.php?user_id=" . $follower_id . "'>" . $user . "</a><br/>";
										echo "<p class='smalltext'>Dept :" . $dept . "</br>";
										echo "Program :" . $prog . "</p></br></div></div>";
									}
									echo "</div>";
								}
							}
						?>
					</div>
				</div>
			</div>
			
			
			
			
			<div id="sidebar">
				<table border="0" id="rightlist">
				<?php
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
					while (mysqli_stmt_fetch($stmt)) {}
					if ($course_taken_flag == 1) {
						echo "<tr><th><a href=drop_course.php?course_id=" . $course_id . ">Drop</a> this course</th></th>"; 
					}
					else {
						echo "<tr><th><a href=take_course.php?course_id=" . $course_id . ">Take</a> this course</th></th>";
					}
				?>
				<?php
					mysqli_stmt_prepare($stmt, "SELECT course_id FROM Course_Follow WHERE course_id = ? AND user_id = ?") or die(mysqli_error());
					$userid = 12345;//$_SESSION['uid']);
					mysqli_stmt_bind_param($stmt,'sd', $course_id, $userid);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					if(mysqli_stmt_num_rows($stmt) == 0){
						$course_follow_flag = 0;
					}
					else{
						$course_follow_flag = 1;
					}
					while (mysqli_stmt_fetch($stmt)) {}
					if ($course_follow_flag == 1) {
						echo "<tr><th><a href=unfollow_course.php?course_id=" . $course_id . ">Unfollow</a> this course</th></th>"; 
					}
					else {
						echo "<tr><th><a href=follow_course.php?course_id=" . $course_id . ">Follow</a> this course</th></th>";
					}
				?>
				<?php
					echo "<tr><th><a href=upload.php?course_id=" . $course_id . ">Upload</a> some material</th></th>";
				?>
				<?php
					mysqli_stmt_prepare($stmt, "SELECT rating FROM Course_Rating WHERE course_id = ? AND user_id = ?") or die(mysqli_error());
					$userid = 12345;//$_SESSION['uid']);
					mysqli_stmt_bind_param($stmt,'sd', $course_id, $userid);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt, $course_rating_flag); 
					$course_rating_flag = 0;
					while (mysqli_stmt_fetch($stmt)) {}
					if ($course_rating_flag != 0) {
						echo "<tr><th><p id='rating_display'>Your rating : " . $course_rating_flag . "</p></th></th>"; 
					}
					else {
				?>
					<tr><th>
						Rate The Course : 
						<select id="rating_select" value="5">
							<option>5</option>
							<option>4</option>
							<option>3</option>
							<option>2</option>
							<option>1</option>
						</select>
					<!--<input type="range"  min="1" max="5" id="rating_select" value = "<?php if ($course_rating_flag != 0) echo $course_rating_flag;?>" onchange="javascript:set_rating(this.value)"/>-->
					<input type="button" value="Rate" onclick="javascript:update_rating()"/>
					</th></tr>
				<?php
					}
				?>
				<tr><th>
					<textarea name="project_desciption" rows="3" cols="34" onfocus="if (this.value == 'Comment Here') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Comment Here';}">Comment Here</textarea>
					<input type="submit" value="Submit" onclick="javascript:update_comment()" />
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
			
			<!-- ***************** All Content Here **************** -->
			
			<div class="push"></div>
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
			<p id="courseId" style="visibility:hidden"><?php echo $course_id ?></p>
	</body>
</html>

