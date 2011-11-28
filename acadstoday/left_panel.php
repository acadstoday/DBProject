<!-- left panel starts which consist DP and other links-->
<div id="leftpanel">
	<!-- retrieve the link of profile pic of user and then show that pic below -->
	<table border="0" width="95%" id="leftlist">
	
	<?php
		//$user_id = $_SESSION['uid'];   //use this actually
		$user_id = '5';
		$stmt = mysqli_stmt_init($con);
		mysqli_stmt_prepare($stmt, "SELECT profile_pic, user_name FROM User WHERE user_id = ?") or die(mysqli_error());
		mysqli_stmt_bind_param($stmt, 'i', $user_id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		if(mysqli_stmt_num_rows($stmt) == 0){}
		else{
			/* bind result variables */
			mysqli_stmt_bind_result($stmt, $pic, $name);
			/* fetch value */
			while ( mysqli_stmt_fetch($stmt) ) {}
		}
		echo "<tr><td class='pic'><img src='user/" . $user_id . "/" . $pic . "' alt='pic missing' width='175px' /></td></tr>";
		mysqli_stmt_close($stmt);
	?>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><th><a href="news.php">News</a></th></tr>
	</table>
</div>
<!-- left panel ends-->
