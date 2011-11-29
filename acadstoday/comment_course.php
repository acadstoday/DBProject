<?php
	/* $uid = $_SESSION['uid']*/
	$uid = '7';
	$comment = $_POST['comment'];
	$course_id = $_POST['course_id'];
	include("db-connect.php");
	$stmt = mysqli_stmt_init($con);
	mysqli_stmt_prepare($stmt, "INSERT INTO Course_Comments (course_id, user_id, comment) VALUES (?, ?, ?)") or die(mysqli_error());
	mysqli_stmt_bind_param($stmt,'sis', $course_id, $uid, $comment);
	mysqli_stmt_execute($stmt);
	include("db-disconnect.php");
	header('location:course_page.php?course_id=' . $course_id );
?>

