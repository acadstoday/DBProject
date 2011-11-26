<!-- redirect to this page after a user successfully logs in -->
<?php
//session_start();
//if(!isset($_SESSION['uid'])) header("location:login.php");
?>
<html>
	<head>
		<title>AcadsToday Home</title>
		<?php include("header-head.php"); ?>
		<link rel="stylesheet" type="text/css" href="css/home.css" />
		
		
		<script type="text/javascript" src="js/tabber.js"></script>
		<!-- <script type="text/javascript" src="js/tabber-minimized.js"></script> -->
		<link rel="stylesheet" type="text/css" href="css/tabber.css" />
		
		
	</head>
	<body>
		<div class="wrapper">
			<!-- connecting to database -->
			<?php include("db-connect.php"); ?>
			<!-- header code -->
			<?php include("header-body.php"); ?>
			
			
			<!-- left panel starts which consist DP and other links-->
			<div id="leftpanel">
				<!-- retrieve the link of profile pic of user and then show that pic below -->
				<div id="pic"></div>
				<div id="info">
					<?php
						//$user_id = $_SESSION['uid'];   //use this actually
						$user_id = '44553';
						$stmt = mysqli_stmt_init($con);
						mysqli_stmt_prepare($stmt, "SELECT user_name, gender, dept_name FROM User1 WHERE user_id = ?") or die(mysqli_error());
						mysqli_stmt_bind_param($stmt, 's', $user_id);
						mysqli_stmt_execute($stmt);
						/* bind result variables */
						mysqli_stmt_bind_result($stmt, $name, $gender, $dept);
						/*if(mysqli_stmt_num_rows($stmt) == 0){
							echo "No Detail of you to show!";
						}
						else{
							/* fetch value */
							while ( mysqli_stmt_fetch($stmt) ) {
								echo "Name: " . $name . "<br />";
								echo "Gender: " . $gender . "<br />";
								echo "Department: " . $dept . "<br />";
							}
						//}
						mysqli_stmt_close($stmt);
					?>
				</div>
			</div>
			<!-- left panel ends-->
			
			<!-- central area starts which is showing name and details of user and all notifications like FB wall -->
			<div id="center">
				<h3>Wall</h3>
				<div class="tabber">
					<div class="tabbertab" title="Courses">
						<p>Tab 1 content.</p>
					</div>
					<div class="tabbertab" title="Instructors">
						<p>Tab 2 content.</p>
					</div>
					<div class="tabbertab" title="Users">
						<p>Tab 3 content.</p>
					</div>
				</div>
			</div>
			<!-- central area ends-->
			
			<!-- right panel starts which has search box and togglable list of courses taken/instructors followed etc. --> 
			<div id="rightpanel">
				<form class="searchform">
					<input class="searchfield" type="text" value="Search Here" onfocus="if (this.value == 'Search Here') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search Here';}" />
					<input class="searchbutton" type="button" value="Go" />
				</form>
				
				<h3>Follower Lists</h3>
				<div class="tabber">
					<div class="tabbertab" title="Users">
						<?php
							//$user_id = $_SESSION['uid'];   //use this actually
							$user_id = '44553';
							$stmt = mysqli_stmt_init($con);
							mysqli_stmt_prepare($stmt, "SELECT User1.user_name FROM User1, User_Follow WHERE User1.user_id = User_Follow.followed_id AND User_Follow.user_id = ?") or die(mysqli_error());
							mysqli_stmt_bind_param($stmt, 's', $user_id);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_store_result($stmt);
							if(mysqli_stmt_num_rows($stmt) == '0'){
								echo "You Don't follow any Users";
							}
							else{
								/* bind result variables */
								mysqli_stmt_bind_result($stmt, $name);
								/* fetch value */
								echo "<ui>";
								while ( mysqli_stmt_fetch($stmt) ) {
									echo "<li>" . $name . "</li>";
								}
								echo "</ui>";
							}
							mysqli_stmt_close($stmt);
						?>
					</div>
					<div class="tabbertab" title="Instructors">
						<?php
							//$user_id = $_SESSION['uid'];   //use this actually
							$user_id = '44553';
							$stmt = mysqli_stmt_init($con);
							mysqli_stmt_prepare($stmt, "SELECT inst_name FROM Instr_Follow NATURAL JOIN Instructor WHERE user_id = ?") or die(mysqli_error());
							mysqli_stmt_bind_param($stmt, 's', $user_id);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_store_result($stmt);
							if(mysqli_stmt_num_rows($stmt) == '0'){
								echo "You Don't follow any Instructors";
							}
							else{
								/* bind result variables */
								mysqli_stmt_bind_result($stmt, $name);
								/* fetch value */
								echo "<ui>";
								while ( mysqli_stmt_fetch($stmt) ) {
									echo "<li>" . $name . "</li>";
								}
								echo "</ui>";
							}
							mysqli_stmt_close($stmt);
						?>
					</div>
					<div class="tabbertab" title="Courses">
						<?php
							//$user_id = $_SESSION['uid'];   //use this actually
							$user_id = '44553';
							$stmt = mysqli_stmt_init($con);
							mysqli_stmt_prepare($stmt, "SELECT course_name FROM Course_Follow NATURAL JOIN Course WHERE user_id = ?") or die(mysqli_error());
							mysqli_stmt_bind_param($stmt, 's', $user_id);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_store_result($stmt);
							if(mysqli_stmt_num_rows($stmt) == '0'){
								echo "You Don't follow any Courses";
							}
							else{
								/* bind result variables */
								mysqli_stmt_bind_result($stmt, $name);
								/* fetch value */
								echo "<ui>";
								while ( mysqli_stmt_fetch($stmt) ) {
									echo "<li>" . $name . "</li>";
								}
								echo "</ui>";
							}
							mysqli_stmt_close($stmt);
						?>
					</div>
				</div>
			</div>
			<!-- right panel ends-->
			<div class="push"></div>
		</div>
			
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>
