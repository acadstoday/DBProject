<!-- redirect to this page after a user successfully logs in -->
<?php
//session_start();
//if(!isset($_SESSION['uid'])) header("location:login_page.php");
?>
<html>
	<head>
		<title>AcadsToday Home</title>
		<?php include("header-head.php"); ?>
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
						$user_id = '45678';
						$result = mysql_query("SELECT * FROM user where user_id = " . $user_id) or die(mysql_error());  
						$row = mysql_fetch_array( $result );
						echo "Name: ".$row['user_name']."<br />";
						echo "Gender: ".$row['gender']; //show 'about me' here
					?>
				</div>
			</div>
			<!-- left panel ends-->
			
			<!-- central area starts which is showing name and details of user and all notifications like FB wall -->
			<div id="center">
				
			</div>
			<!-- central area ends-->
			
			<!-- right panel starts which has search box and togglable list of courses taken/instructors followed etc. --> 
			<div id="rightpanel">
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
