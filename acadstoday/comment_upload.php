<?php
	/* $uid = $_SESSION['uid']*/
	$uid = '7';
	$comment = $_POST['comment'];
	$upload_id = $_POST['upload_id'];
	include("db-connect.php");
	$stmt = mysqli_stmt_init($con);
	mysqli_stmt_prepare($stmt, "INSERT INTO Upload_Comments (upload_id, user_id, comment) VALUES (?, ?, ?)") or die(mysqli_error());
	mysqli_stmt_bind_param($stmt,'iis', $upload_id, $uid, $comment);
	mysqli_stmt_execute($stmt);
	include("db-disconnect.php");
	header('location:upload_page.php?upload_id=' . $upload_id );
?>


