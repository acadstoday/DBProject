<!-- redirect to this page after a user successfully logs in -->
<?php
//session_start();
//if(!isset($_SESSION['uid'])) header("location:login.php");
?>
<html>
	<head>
		<title>Home</title>
		<?php include("header-head.php"); ?>
		
	</head>
	<body>
		<div class="wrapper">
			<!-- connecting to database -->
			<?php include("db-connect.php"); ?>
			<!-- header code -->
			<?php include("header-body.php"); ?>
			
			<!-- left panel code -->
			<?php include("left_panel.php"); ?>
			
			<!-- central area starts which is showing name and details of user and all notifications like FB wall -->
			<div id="center">
				<?php
					echo "<h2>Welcome, " . $name . "</h2>"; 
				?>
				<h3>Wall</h3>
				<div id="tabber2" class="tabber">
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
			
			<!-- right panel code -->
			<?php include("right_panel.php"); ?>
			
			<div class="push"></div>
		</div>
			
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>
