<!-- left panel starts which consist DP and other links-->
<div id="leftpanel">
	<!-- retrieve the link of profile pic of user and then show that pic below -->
	<table border="0" width="95%" id="leftlist" cellspacing="5">
	
	<?php
		//$user_id = $_SESSION['uid'];   //use this actually
		$uid = '5';
		$stmt = mysqli_stmt_init($con);
		mysqli_stmt_prepare($stmt, "SELECT profile_pic, user_name FROM User WHERE user_id = ?") or die(mysqli_error());
		mysqli_stmt_bind_param($stmt, 'i', $uid);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		if(mysqli_stmt_num_rows($stmt) == 0){}
		else{
			/* bind result variables */
			mysqli_stmt_bind_result($stmt, $pic, $name);
			/* fetch value */
			while ( mysqli_stmt_fetch($stmt) ) {}
		}
		echo "<tr><td class='pic'><img src='user/" . $uid . "/" . $pic . "' alt='pic missing' width='173px' /></td></tr>";
		mysqli_stmt_close($stmt);
	?>
	<tr><th class='home'><a href="home.php">Home</a></th></tr>
	<tr><th class='home'><a href="profile.php">Profile</a></th></tr>
	<tr><th class='home'><a href="news.php">News</a></th></tr>
	<tr><th class='home'><a href="course_list.php">List of Courses</a></th></tr>
	<tr><th class='home'><a href="instructor_list.php">List of Instructors</a></th></tr>
	<tr><th class='home'><a href="user_list.php">List of Users</a></th></tr>
	</table>
</div>
<!-- left panel ends-->
