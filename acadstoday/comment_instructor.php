<?php
	/* $uid = $_SESSION['uid']*/
	$uid = '7';
	$comment = $_POST['comment'];
	$inst_id = $_POST['inst_id'];
	include("db-connect.php");
	$stmt = mysqli_stmt_init($con);
	mysqli_stmt_prepare($stmt, "INSERT INTO Instr_Comments (inst_id, user_id, comment) VALUES (?, ?, ?)") or die(mysqli_error());
	mysqli_stmt_bind_param($stmt,'sis', $inst_id, $uid, $comment);
	mysqli_stmt_execute($stmt);
	include("db-disconnect.php");
	header('location:instructor_page.php?inst_id=' . $inst_id );
?>


