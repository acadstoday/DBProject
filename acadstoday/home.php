<!-- redirect to this page after a user successfully logs in -->
<?php
//session_start();
//if(!isset($_SESSION['uid'])) header("location:login.php");
?>
<html>
	<head>
		<title>Home</title>
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
				<table border="0" width="95%" id="leftlist">
				<tr id="pic"><td><img src="" alt="profile pic"/></td></tr>
					<?php
						//$user_id = $_SESSION['uid'];   //use this actually
						$user_id = '44553';
						$stmt = mysqli_stmt_init($con);
						mysqli_stmt_prepare($stmt, "SELECT user_name, gender, dept_name FROM User WHERE user_id = ?") or die(mysqli_error());
						mysqli_stmt_bind_param($stmt, 's', $user_id);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt) == 0){
							echo "<tr>No Detail of you to show!</tr>";
						}
						else{
							/* bind result variables */
							mysqli_stmt_bind_result($stmt, $name, $gender, $dept);
							/* fetch value */
							while ( mysqli_stmt_fetch($stmt) ) {
								echo "<tr><td>Name: " . $name . "</td></tr>";
								echo "<tr><td>Gender: " . $gender . "</td></tr>";
								echo "<tr><td>Department: " . $dept . "</td></tr>";
							}
						}
						mysqli_stmt_close($stmt);
					?>
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr><th><a href="news.php">News</a></th></tr>
				</table>
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
				<form class="searchform" action="search.php" method="get">
					<input class="searchfield" name="search_text" type="text" value="Search Here" onfocus="if (this.value == 'Search Here') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search Here';}" />
					<input class="searchbutton" type="submit" value="Go" />
				</form>
				
				<h3>Follower Lists</h3>
				<div class="tabber">
					<div class="tabbertab" title="Users">
						<?php
							//$user_id = $_SESSION['uid'];   //use this actually
							$user_id = '44553';
							$stmt = mysqli_stmt_init($con);
							mysqli_stmt_prepare($stmt, "SELECT User.user_name FROM User, User_Follow WHERE User.user_id = User_Follow.followed_id AND User_Follow.user_id = ?") or die(mysqli_error());
							mysqli_stmt_bind_param($stmt, 's', $user_id);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_store_result($stmt);
							if(mysqli_stmt_num_rows($stmt) == '0'){
								echo "You Don't follow any Users";
								echo "Follow new users <a href='user_list.php'>Here</a>";
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
								echo "Follow more users <a href='user_list.php'>Here</a>";
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
								echo "Follow new instructors <a href='instructor_list.php'>Here</a>";
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
								echo "Follow more instructors <a href='instructor_list.php'>Here</a>";
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
								echo "Follow new courses <a href='course_list.php'>Here</a>";
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
								echo "Follow more courses <a href='course_list.php'>Here</a>";
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
