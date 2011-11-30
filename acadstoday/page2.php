<?php
session_start();
include("db-connect.php");

if(isset($_POST['submit']))
{
	$user_name = $_POST['user_id'];
	$password = $_POST['pwd'];
	
	$stmt = mysqli_stmt_init($con);
	mysqli_stmt_prepare($stmt, "SELECT user_id, password FROM User WHERE user_name = ?") or die(mysqli_error());
	mysqli_stmt_bind_param($stmt, 's', $user_name);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $user_id, $pwd);
	while ( mysqli_stmt_fetch($stmt) ) {}
	if ($pwd == $password){
		$_SESSION['uid'] = $user_id;
		header('location: home.php');
	}
	
	
}

include("db-disconnect.php");

?>
