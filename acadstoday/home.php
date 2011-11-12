<!-- redirect to this page after a user successfully logs in -->
<?php
//session_start();
//if(!isset($_SESSION['uid'])) header("location:login_page.php");
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
						$user_id = '45678';
						$result = mysql_query("SELECT * FROM user where user_id = " . $user_id) or die(mysql_error());  
						$row = mysql_fetch_array( $result );
						echo "Name: ".$row['user_name']."<br />";
						echo "Gender: ".$row['gender']; //show 'about me' here or other useful links
					?>
				</div>
			</div>
			<!-- left panel ends-->
			
			<!-- central area starts which is showing name and details of user and all notifications like FB wall -->
			<div id="center">
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
			<!-- right panel ends-->
			<div class="push"></div>
		</div>
			
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>
