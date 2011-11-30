<!-- left panel starts which consist DP and other links-->
<?php
session_start();
if(!(isset($_SESSION['uid']))) {header("location:login.php");}
$uid = $_SESSION['uid'];

?>

<div id="leftpanel">
	
	<table border="0" width="95%" id="leftlist" cellspacing="5">
	
	<?php
		
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
		
	?>
	<tr><th class='home'><a href="home.php">Home</a></th></tr>
	<tr><th class='home'><a href="user_page.php?user_id=<?php echo $uid;?>">Profile</a></th></tr>
	<tr><th class='home'><a href="news.php">News</a></th></tr>
	</table>
</div>
<!-- left panel ends-->
