<?php
//check wether user exists and verify his password if he is already registered
//and forward him to his profile
session_start();
require('err.php');
include("db-connect.php");

/*
if(isset($_POST['user_id']))
{*/
	$user = $_POST['user_id'];
	$password = $_POST['pwd'];
	if($user == '') {
		$err[] = 'Username missing';
		$errflag = true;
	}
	if($password == '') {
		$err[] = 'Password missing';
		$errflag = true;
	}
	err_chk('login.php');
	
	$stmt = mysqli_stmt_init($con);
	mysqli_stmt_prepare($stmt, "SELECT password FROM User WHERE user_id = ?") or die(mysqli_error());
	mysqli_stmt_bind_param($stmt, 's', $user);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_store_result($stmt);
	if(mysqli_stmt_num_rows($stmt) == '0'){
		$err[] = 'Wrong Username';
		$errflag = true;
		err_chk('login.php');
	}
	else{
		mysqli_stmt_bind_result($stmt, $pwd);
		while ( mysqli_stmt_fetch($stmt) ) {
			$db_pwd = $pwd;
		}
		if ($password == $db_pwd){
			$_SESSION['uid'] = $user;
			echo "hello";
			header("location:home.php");
		}
		else {
			$err[] = 'Wrong Password';
			$errflag = true;
			err_chk('login.php')
		}
	}
	mysqli_stmt_close($stmt);
	
	include("db-disconnect.php");
//}
header("location:login.php");
?>
