<?php
	/* $uid = $_SESSION['uid']*/
	$uid = '7';
	$course_id = $_GET['course_id'];
	$action = $_GET['action'];
	include("db-connect.php");
	$stmt = mysqli_stmt_init($con);
	if ($action == "take"){
		mysqli_stmt_prepare($stmt, "INSERT INTO Takes (course_id, user_id) VALUES (?, ?)") or die(mysqli_error());
	}
	else if ($action == "drop"){
		mysqli_stmt_prepare($stmt, "DELETE FROM Takes WHERE course_id = ? AND user_id = ? ") or die(mysqli_error());
	}
	else if ($action == "follow"){
		mysqli_stmt_prepare($stmt, "INSERT INTO Course_Follow (course_id, user_id) VALUES (?, ?)") or die(mysqli_error());
	}
	else if ($action == "unfollow"){
		mysqli_stmt_prepare($stmt, "DELETE FROM Course_Follow WHERE course_id = ? AND user_id = ? ") or die(mysqli_error());
	}
	else{
		include("db-disconnect.php");
		header( 'Location: course_page.php?course_id=' . $course_id );
	}
	mysqli_stmt_bind_param($stmt,'si', $course_id, $uid);
	mysqli_stmt_execute($stmt);
	include("db-disconnect.php");
	header( 'Location: course_page.php?course_id=' . $course_id );
?>

