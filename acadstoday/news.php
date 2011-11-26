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
					mysqli_stmt_prepare($stmt, "SELECT user_id, news, tags, date FROM News ORDER BY date DESC") or die(mysqli_error());
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					if(mysqli_stmt_num_rows($stmt) == 0){
						echo "Currently No Users to follow";
					}
					else{
						/* bind result variables */
						mysqli_stmt_bind_result($stmt, $user_name, $dept_name, $prog_name);
						/* fetch value */
						/*echo "<table border='0'>";
						echo "<tr><th>User Name</th><th>Department Name</th><th>Program Name</th></tr>";
						while ( mysqli_stmt_fetch($stmt) ) {
							echo "<tr>";
							echo "<td>" . $user_name . "</td>";
							echo "<td>" . $dept_name . "</td>";
							echo "<td>" . $prog_name . "</td>";
							echo "</tr>";
						}
						echo "</table>";
					*/}
					mysqli_stmt_close($stmt);
				?>
			</div>
			
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>