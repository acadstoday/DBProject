<!-- redirect to this page after a user successfully logs in -->
<?php
//session_start();
//if(!isset($_SESSION['uid'])) header("location:login_page.php");
?>
<html>
	<head>
		<title>AcadsToday Home</title>
		<link rel="stylesheet" type="text/css" href="css/global.css" />
	</head>
	<body>
		<!-- connecting to database -->
		<?php include("db-connect.php"); ?>
		<!-- header code -->
		<?php include("header.php"); ?>
		
		<?php
			$sqlstr = mysql_query("SELECT * FROM user");
			if (mysql_numrows($sqlstr) != 0) {
				while ($row = mysql_fetch_array($sqlstr)) {
		?>
					<p><?= $row['user_name'] ?> | <?= $row['gender'] ?> | <?= $row['dept'] ?></p>
		<?php
				}
			}
		?>
		
		
		
		
		<!-- left panel starts which consist DP and -->
		<div id="leftpanel">
			<div id="pic"><img /></div>
			<div id="info">
				<p>About Me:</p>
				
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
		
		<!-- footer code -->
		<?php include("footer.php"); ?>
	</body>
</html>
