<?php 
	$inst_id = $_GET['inst_id'];
	/*$uid = $_SESSION['uid'];*/
	$uid = '7';
	$num_of_followers = 0;
	$num_of_projects = 0;
	$num_of_comments = 0;
	$num_of_teaches = 0;
?>


<html>
	<head>
		<title>Instructor</title>
		<?php include("header-head.php"); ?>
		<!-- this css is for rating stars display -->
		<style type="text/css">
		<!--
		.restaurant-stars { display:block; width:250px; height:47px; background:url('images/blankStar.png') no-repeat; }
		-->
		</style>
		<script type="text/javascript" src="js/easytab_inst.js"></script>
		<link rel="stylesheet" type="text/css" href="css/easytab_inst.css" />
	</head>
	<body>
		<div class="wrapper">
			<!-- connecting to database -->
			<?php include("db-connect.php"); ?>
			<!-- header code -->
			<?php include("header-body.php"); ?>
			
			<?php
				$stmt = mysqli_stmt_init($con);

				mysqli_stmt_prepare($stmt, "SELECT inst_name, inst_info, dept_name FROM Instructor WHERE inst_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'s', $inst_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $inst_name, $inst_info, $dept_name); 
				while (mysqli_stmt_fetch($stmt)) {}
				
				
				mysqli_stmt_prepare($stmt, "SELECT count(user_id) FROM Instr_Rating WHERE inst_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'s', $inst_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $votes); 
				while (mysqli_stmt_fetch($stmt)) {}

				if ($votes != 0){
					mysqli_stmt_prepare($stmt, "SELECT avg(rating) FROM Instr_Rating WHERE inst_id = ?") or die(mysqli_error());
					mysqli_stmt_bind_param($stmt,'s', $inst_id);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt, $inst_rating); 
					while (mysqli_stmt_fetch($stmt)) {}
					$inst_rating = number_format($inst_rating, 2, '.', '');
				}
				else {
					$inst_rating = 0.00;
				}
				
				mysqli_stmt_prepare($stmt, "SELECT user_id FROM Instr_Follow WHERE inst_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'s', $inst_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $user_id);
				$num_of_followers = 0;
				$inst_followers = array();
				while (mysqli_stmt_fetch($stmt)) {
					$inst_followers[] = $user_id;
					$num_of_followers += 1;
				}
				
				mysqli_stmt_prepare($stmt, "SELECT count(comment) FROM Instr_Comments WHERE inst_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'s', $inst_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $num_of_comments);
				while (mysqli_stmt_fetch($stmt)) {}
				
				mysqli_stmt_prepare($stmt, "SELECT count(DISTINCT project_id) FROM Project WHERE inst_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'s', $inst_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $num_of_projects);
				while (mysqli_stmt_fetch($stmt)) {}
				
				mysqli_stmt_prepare($stmt, "SELECT count(course_id) FROM Teaches WHERE inst_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'s', $inst_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $num_of_teaches);
				while (mysqli_stmt_fetch($stmt)) {}
				
				mysqli_stmt_prepare($stmt, "SELECT inst_id FROM Instr_Follow WHERE inst_id = ? AND user_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'si', $inst_id, $uid);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				if(mysqli_stmt_num_rows($stmt) == 0){
					$inst_follow_flag = 0;
				}
				else{
					$inst_follow_flag = 1;
				}
				
				mysqli_stmt_prepare($stmt, "SELECT rating FROM Instr_Rating WHERE inst_id = ? AND user_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'si', $inst_id, $uid);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $inst_rating_flag); 
				$inst_rating_flag = 0;
				while (mysqli_stmt_fetch($stmt)) {}
			?>
			
			<div id="page">
				<?php
					echo "<h2>" . $inst_name . "</h2>";
					echo "<h3>" . $dept_name . "</h3>";
					echo "<p>" . $inst_info . "</p>";
				?>
				
				<div class="restaurant-stars">
					<div class="restaurant-stars-rating" title="rating" style="display:block; width:<?php echo $inst_rating*50 ?>px; height:47px; background:url('images/colorStar.png') no-repeat;">              
						&nbsp;
					</div><br/>
					<center><?php echo $inst_rating . " (" . $votes . " Votes)" ?></center>
				</div>
				
				<div id="wall">
					<div id="easytab1" class="menu">
						<ul>
							<li><a href="#" onmouseover="easytabs('1', '1');" onfocus="easytabs('1', '1');"  onclick="easytabs('1', '1');" title="" id="tablink1">Comments(<?php echo $num_of_comments ?>)</a></li>
							<li><a href="#" onmouseover="easytabs('1', '2');" onfocus="easytabs('1', '2');"  onclick="easytabs('1', '2');" title="" id="tablink2">Projects(<?php echo $num_of_projects ?>)</a></li>
							<li><a href="#" onmouseover="easytabs('1', '3');" onfocus="easytabs('1', '3');"  onclick="easytabs('1', '3');" title="" id="tablink3">Followers(<?php echo $num_of_followers ?>)</a></li>
							<li><a href="#" onmouseover="easytabs('1', '4');" onfocus="easytabs('1', '4');"  onclick="easytabs('1', '4');" title="" id="tablink4">Teaches(<?php echo $num_of_teaches ?>)</a></li>
						</ul>
					</div>
					<div id="tabcontent1">
						<?php
							mysqli_stmt_prepare($stmt, "SELECT user_id, user_name, comment, time_stamp FROM Instr_Comments NATURAL JOIN User WHERE inst_id = ? ORDER BY time_stamp DESC") or die(mysqli_error());
							mysqli_stmt_bind_param($stmt,'s', $inst_id);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_store_result($stmt);
							if(mysqli_stmt_num_rows($stmt) == 0){
								echo "Currently No Comments to Show";
							}
							else{
								mysqli_stmt_bind_result($stmt, $user_id, $user_name, $comment, $timestamp);
								while ( mysqli_stmt_fetch($stmt) ) {
									echo "<div class='commentbox'><p><a href='user_page.php?user_id=" . $user_id . "'> " . $user_name . "</a> wrote:</br>";
									echo "" . $comment . "</p>";
									echo "<p class='smalltext'><i>on</i> " . $timestamp . "</p>";
									echo "</div>";
								}
							}
						?>
					</div>
					<div id="tabcontent2">
						<?php
							mysqli_stmt_prepare($stmt, "SELECT topic, project_info FROM Project WHERE inst_id = ? ") or die(mysqli_error());
							mysqli_stmt_bind_param($stmt,'s', $inst_id);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_store_result($stmt);
							if(mysqli_stmt_num_rows($stmt) == 0){
								echo "Currently No Projects to Show";
							}
							else{
								mysqli_stmt_bind_result($stmt, $topic, $info);
								while ( mysqli_stmt_fetch($stmt) ) {
									echo "<div class='projectbox'><p><b>Topic</b> : " . $topic . "</br>";
									echo "<b>Info</b> : " . $info . "</p></div>";
								}
							}
						?>
					</div>
					<div id="tabcontent3">
						<?php
							if ($num_of_followers == 0){
								echo "Currently No Followers to Show";
							}
							else{
								foreach ($inst_followers as $follower_id) {
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
					<div id="tabcontent4">
						<?php
							mysqli_stmt_prepare($stmt, "SELECT course_id, course_name, course_info FROM Teaches NATURAL JOIN Course WHERE inst_id = ?") or die(mysqli_error());
							mysqli_stmt_bind_param($stmt,'s', $inst_id);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_store_result($stmt);
							if(mysqli_stmt_num_rows($stmt) == 0){
								echo "Currently, The instructor doesn't teach any courses";
							}
							else{
								mysqli_stmt_bind_result($stmt, $id, $name, $info);
								while ( mysqli_stmt_fetch($stmt) ) {
									echo "<div class='teachbox'><p><a href='course_page.php?course_id=" . $id . "'><b>" . $id . "</b></a> : ";
									echo $name . "</p>";
									echo "<p class='smalltext'><i>Info</i> : " . $info . "</p></div>";
								}
							}
						?>
					</div>
				</div>
			</div>

			<div id="sidebar">
				<table border="0" id="rightlist">
				<?php
					if ($inst_follow_flag == 1) {
						echo "<tr><th><a href=processing_instructor.php?inst_id=" . $inst_id . "&action=unfollow>Unfollow</a> this instructor</th></tr>"; 
					}
					else {
						echo "<tr><th><a href=processing_instructor.php?inst_id=" . $inst_id . "&action=follow>Follow</a> this instructor</th></tr>";
					}
				?>
				<?php
					if ($inst_rating_flag != 0) {
						echo "<tr><th><p>Your rating : " . $inst_rating_flag . "</p></th></tr>"; 
					}
					else {
				?>
					<tr><th>
						<form action="update_rating_instructor.php" method="post">
							Rate The Instructor : 
							<select name="rating" value="5">
								<option>5</option>
								<option>4</option>
								<option>3</option>
								<option>2</option>
								<option>1</option>
							</select>
							<?php echo "<input type='hidden' name='inst_id' value='" . $inst_id . "'/>"; ?>
							<input type="submit" value="Rate" />
						</form>
					</th></tr>
				<?php
					}
				?>
				<tr><th>
					<form action="comment_instructor.php" method="post">
						<textarea name="comment" rows="3" cols="34" onfocus="if (this.value == 'Comment Here') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Comment Here';}">Comment Here</textarea>
						<?php echo "<input type='hidden' name='inst_id' value='" . $inst_id . "'/>"; ?>
						<input type="submit" value="Submit" />
					</form>
				</th></tr>
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

