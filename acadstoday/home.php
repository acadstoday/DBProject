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
				<div id="pic"><img /></div>
				<div id="info">
					<?php
						//$user_id = $_SESSION['uid'];   //use this actually
						$user_id = '55739';
						$stmt = mysqli_stmt_init($con);
						mysqli_stmt_prepare($stmt, "SELECT user_name, gender, dept_name FROM user WHERE user_id = ?") or die(mysqli_error());
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
						//$row = mysql_fetch_array( $result ); //old MySQL code
						/*echo "Name: ".$row['user_name']."<br />";
						echo "Gender: ".$row['gender']."<br />";
						echo "Department: ".$row['dept_name']; //show 'about me' here or other useful links*/
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
							$user_id = '55739';
							$stmt = mysqli_stmt_init($con);
							mysqli_stmt_prepare($stmt, "SELECT user.user_name FROM user, user_follow WHERE user.user_id = user_follow.follower_id AND user_follow.user_id = ?") or die(mysqli_error());
							mysqli_stmt_bind_param($stmt, 's', $user_id);
							mysqli_stmt_execute($stmt);
							/* bind result variables */
							mysqli_stmt_bind_result($stmt, $name);
							/*if(mysqli_stmt_num_rows($stmt) == '0'){
								echo "You Don't follow any users";
							}
							else{
								/* fetch value */
								echo "<ui>";
								while ( mysqli_stmt_fetch($stmt) ) {
									echo "<li>" . $name . "</li>";
								}
								echo "</ui>";
							//}
							mysqli_stmt_close($stmt);
						?>
					</div>
					<div class="tabbertab" title="Instructors">
						<?php
							//$user_id = $_SESSION['uid'];   //use this actually
							$user_id = '55739';
							$stmt = mysqli_stmt_init($con);
							mysqli_stmt_prepare($stmt, "SELECT inst_name FROM inst_follow NATURAL JOIN instructor WHERE user_id = ?") or die(mysqli_error());
							mysqli_stmt_bind_param($stmt, 's', $user_id);
							mysqli_stmt_execute($stmt);
							/* bind result variables */
							mysqli_stmt_bind_result($stmt, $name);
							/*if(mysqli_stmt_num_rows($stmt) == '0'){
								echo "You Don't follow any users";
							}
							else{
								/* fetch value */
								echo "<ui>";
								while ( mysqli_stmt_fetch($stmt) ) {
									echo "<li>" . $name . "</li>";
								}
								echo "</ui>";
							//}
							mysqli_stmt_close($stmt);
						?>
					</div>
					<div class="tabbertab" title="Courses">
						<p>Tab 3 content.</p>
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
