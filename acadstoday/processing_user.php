<?php
session_start();
if(!(isset($_SESSION['uid']))) {header("location:login.php");}
$uid = $_SESSION['uid'];

?>
<?php
	$user_id = $_GET['user_id'];
	$action = $_GET['action'];
	include("db-connect.php");
	$stmt = mysqli_stmt_init($con);
	if ($action == "follow"){
		mysqli_stmt_prepare($stmt, "INSERT INTO User_Follow (followed_id, user_id) VALUES (?, ?)") or die(mysqli_error());
	}
	else if ($action == "unfollow"){
		mysqli_stmt_prepare($stmt, "DELETE FROM User_Follow WHERE followed_id = ? AND user_id = ? ") or die(mysqli_error());
	}
	else{
		include("db-disconnect.php");
		header( 'Location: user_page.php?user_id=' . $user_id );
	}
	mysqli_stmt_bind_param($stmt,'si', $user_id, $uid);
	mysqli_stmt_execute($stmt);
	include("db-disconnect.php");
	header( 'Location: user_page.php?user_id=' . $user_id );
?>


