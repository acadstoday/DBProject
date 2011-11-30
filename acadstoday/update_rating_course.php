<?php
session_start();
if(!(isset($_SESSION['uid']))) {header("location:login.php");}
$uid = $_SESSION['uid'];

?>
<?php
	$rating = $_POST['rating'];
	$course_id = $_POST['course_id'];
	include("db-connect.php");
	$stmt = mysqli_stmt_init($con);
	mysqli_stmt_prepare($stmt, "INSERT INTO Course_Rating (course_id, user_id, rating) VALUES (?, ?, ?)") or die(mysqli_error());
	mysqli_stmt_bind_param($stmt,'sis', $course_id, $uid, $rating);
	mysqli_stmt_execute($stmt);
	include("db-disconnect.php");
	header('location:course_page.php?course_id=' . $course_id );
?>


