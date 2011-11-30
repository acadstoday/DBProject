<?php
session_start();
if(!(isset($_SESSION['uid']))) {header("location:login.php");}
$uid = $_SESSION['uid'];

?>

<?php
	$id = $_GET['id'];
	$comment_id = $_GET['comment_id'];
	$type = $_GET['type'];
	include("db-connect.php");
	$stmt = mysqli_stmt_init($con);
	if($type == "course"){
		mysqli_stmt_prepare($stmt, "DELETE FROM Course_Comments WHERE comment_id = ? ") or die(mysqli_error());
		mysqli_stmt_bind_param($stmt,'i', $comment_id);
		mysqli_stmt_execute($stmt);
		include("db-disconnect.php");
		header( 'Location: course_page.php?course_id=' . $id );
	}
	else if ($type == "instructor"){
		mysqli_stmt_prepare($stmt, "DELETE FROM Instr_Comments WHERE comment_id = ? ") or die(mysqli_error());
		mysqli_stmt_bind_param($stmt,'i', $comment_id);
		mysqli_stmt_execute($stmt);
		include("db-disconnect.php");
		header( 'Location: instructor_page.php?inst_id=' . $id );
	}
	else if ($type == "upload"){
		mysqli_stmt_prepare($stmt, "DELETE FROM Upload_Comments WHERE comment_id = ? ") or die(mysqli_error());
		mysqli_stmt_bind_param($stmt,'i', $comment_id);
		mysqli_stmt_execute($stmt);
		include("db-disconnect.php");
		header( 'Location: upload_page.php?upload_id=' . $id );
	}
	else{
		include("db-disconnect.php");
		header( 'Location: home.php' );
	}
?>


