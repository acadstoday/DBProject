<html>
	<head>
		<title>News</title>
		<?php include("header-head.php"); ?>
	</head>
	<body>
		<div class="wrapper">
			<!-- connecting to database -->
			<?php include("db-connect.php"); ?>
			<!-- header code -->
			<?php include("header-body.php"); ?>
			
			<div class="leftpad">
				<h2>News</h2>
				<?php
					$stmt = mysqli_stmt_init($con);
					mysqli_stmt_prepare($stmt, "SELECT user_id, user_name, news, tags, time_stamp FROM News NATURAL JOIN User ORDER BY time_stamp DESC") or die(mysqli_error());
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					if(mysqli_stmt_num_rows($stmt) == 0){
						echo "Currently No News to Show";
					}
					else{
						/* bind result variables */
						mysqli_stmt_bind_result($stmt, $user_id, $user_name, $news, $tags, $timestamp);
						/* fetch value */
						while ( mysqli_stmt_fetch($stmt) ) {
							echo "<div class='newsitem'><div class='news'>" . $news . "</div><div>";
							echo "<p class='smalltext'><i>tags</i> " . $tags . "<br />";
							echo "<i>by</i><a href='user_page.php?user_id=" . $user_id . "'> " . $user_name . "</a> <i>on</i> " . $timestamp . "</p>";
							echo "</div></div>";
						}
					}
					mysqli_stmt_close($stmt);
				?>
			</div>
			<div class="push"></div>
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>
