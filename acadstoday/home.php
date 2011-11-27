<!-- redirect to this page after a user successfully logs in -->
<?php
//session_start();
//if(!isset($_SESSION['uid'])) header("location:login.php");
?>
<html>
	<head>
		<title>Home</title>
		<?php include("header-head.php"); ?>
		<script type="text/javascript" src="js/easytab_home.js"></script>
		<link rel="stylesheet" type="text/css" href="css/easytab_home.css" />
		
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
				
				<!-- central area starts which is showing name and details of user and all notifications like FB wall -->
				<div id="center">
					<?php
						echo "<h2>Welcome, " . $name . "</h2>"; 
					?>
					<h3>Wall</h3>
					
					<!--Start of the Tabmenu 1 -->
					<div id="easytab1" class="menu">
						<ul>
							<li><a href="#" onmouseover="easytabs('1', '1');" onfocus="easytabs('1', '1');"  onclick="easytabs('1', '1');" title="" id="tablink1">Users</a></li>
							<li><a href="#" onmouseover="easytabs('1', '2');" onfocus="easytabs('1', '2');"  onclick="easytabs('1', '2');" title="" id="tablink2">Instructors</a></li>
							<li><a href="#" onmouseover="easytabs('1', '3');" onfocus="easytabs('1', '3');"  onclick="easytabs('1', '3');" title="" id="tablink3">Courses</a></li>
						</ul>
					</div>
					<div id="tabcontent1">
						<?php
						$test = 1;
						while ($test < 60){
							echo "user " . $test . "<br />";
							$test += 1;
						}
						?>
					</div>
					<div id="tabcontent2">
					</div>
					<div id="tabcontent3">
					</div>
					
				</div>
				<!-- central area ends-->
				
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
