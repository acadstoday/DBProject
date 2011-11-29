<?php
	/* $uid = $_SESSION['uid']*/
	$uid = '7';
	$inst_id = $_GET['inst_id'];
	$action = $_GET['action'];
	include("db-connect.php");
	$stmt = mysqli_stmt_init($con);
	if ($action == "follow"){
		mysqli_stmt_prepare($stmt, "INSERT INTO Instr_Follow (inst_id, user_id) VALUES (?, ?)") or die(mysqli_error());
	}
	else if ($action == "unfollow"){
		mysqli_stmt_prepare($stmt, "DELETE FROM Instr_Follow WHERE inst_id = ? AND user_id = ? ") or die(mysqli_error());
	}
	else{
		include("db-disconnect.php");
		header( 'Location: instructor_page.php?inst_id=' . $inst_id );
	}
	mysqli_stmt_bind_param($stmt,'si', $inst_id, $uid);
	mysqli_stmt_execute($stmt);
	include("db-disconnect.php");
	header( 'Location: instructor_page.php?inst_id=' . $inst_id );
?>

