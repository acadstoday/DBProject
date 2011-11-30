<?php
session_start();
if(!(isset($_SESSION['uid']))) {header("location:login.php");}
$uid = $_SESSION['uid'];

?>
<html>
	<head>
		<title>User List</title>
		<?php include("header-head.php"); ?>
		<script type="text/javascript" src="js/easytab_rightpanel.js"></script>
		<link rel="stylesheet" type="text/css" href="css/easytab_rightpanel.css" />
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
			
			<div id="center">
			<div id="list" class="leftpad">
				<h2>List of Users</h2>
				<div id="list-result">
				<?php
					$stmt = mysqli_stmt_init($con);
					mysqli_stmt_prepare($stmt, "SELECT user_id, user_name, dept_name, prog_name, profile_pic FROM User") or die(mysqli_error());
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					if(mysqli_stmt_num_rows($stmt) == 0){
						echo "<div class='follow_block'>Currently No users in database</div>";
					}
					else{
						mysqli_stmt_bind_result($stmt, $id, $user, $dept, $prog, $pic);
						echo "<div>";
						while (mysqli_stmt_fetch($stmt)) {
							if($uid == $id) continue;
							echo "<div class='follow_block'><div class='follow_pic'>";
							echo "<img src='user/" . $id . "/" . $pic . "' alt='pic missing' width='75px' />";
							echo "</div><div class='follow_text'>";
							echo "<a href='user_page.php?user_id=" . $id . "'>" . $user . "</a><br/>";
							echo "<p class='smalltext'>Dept : " . $dept . "</br>";
							echo "Program : " . $prog . "</p></div></div>";
						}
						echo "</div>";
					}
					mysqli_stmt_close($stmt);
				?>
				</div>
			</div>
			</div>
			
			<!-- right panel code -->
			<?php include("right_panel2.php"); ?>
			</div>
			
			<div class="push"></div>
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>


