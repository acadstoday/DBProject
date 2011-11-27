<!-- left panel starts which consist DP and other links-->
<div id="leftpanel">
	<!-- retrieve the link of profile pic of user and then show that pic below -->
	<table border="0" width="95%" id="leftlist">
	<tr><td class="pic"><img src="profile_pic/44553.gif" alt="profile_pic" width="175px" /></td></tr>
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
					/*echo "<tr><td>Name: " . $name . "</td></tr>";
					echo "<tr><td>Gender: " . $gender . "</td></tr>";
					echo "<tr><td>Department: " . $dept . "</td></tr>";*/
				}
			}
			mysqli_stmt_close($stmt);
		?>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><th><a href="news.php">News</a></th></tr>
	</table>
</div>
<!-- left panel ends-->
