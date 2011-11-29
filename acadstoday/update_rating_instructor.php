<?php
	/* $uid = $_SESSION['uid']*/
	$uid = '7';
	$rating = $_POST['rating'];
	$inst_id = $_POST['inst_id'];
	include("db-connect.php");
	$stmt = mysqli_stmt_init($con);
	mysqli_stmt_prepare($stmt, "INSERT INTO Instr_Rating (inst_id, user_id, rating) VALUES (?, ?, ?)") or die(mysqli_error());
	mysqli_stmt_bind_param($stmt,'sis', $inst_id, $uid, $rating);
	mysqli_stmt_execute($stmt);
	include("db-disconnect.php");
	header('location:instructor_page.php?inst_id=' . $inst_id );
?>


