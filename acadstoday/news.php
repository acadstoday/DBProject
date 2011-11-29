<html>
	<head>
		<title>News</title>
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
			
			<div id="center" class="leftpad">
				<h2>News</h2>
				<div id="list-result">
				<?php
					$stmt = mysqli_stmt_init($con);
					mysqli_stmt_prepare($stmt, "SELECT user_id, user_name, news, time_stamp FROM News NATURAL JOIN User ORDER BY time_stamp DESC") or die(mysqli_error());
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					if(mysqli_stmt_num_rows($stmt) == 0){
						echo "Currently No News to Show";
					}
					else{
						/* bind result variables */
						mysqli_stmt_bind_result($stmt, $user_id, $user_name, $news, $timestamp);
						/* fetch value */
						while ( mysqli_stmt_fetch($stmt) ) {
							echo "<div class='newsitem'><div class='news'>" . $news . "</div><div>";/*
							echo "<p class='smalltext'><i>tags</i> " . $tags . "<br />";*/
							echo "<p class='smalltext'><i>by</i><a href='user_page.php?user_id=" . $user_id . "'> " . $user_name . "</a> <i>on</i> " . $timestamp . "</p>";
							echo "</div></div>";
						}
					}
					mysqli_stmt_close($stmt);
				?>
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
