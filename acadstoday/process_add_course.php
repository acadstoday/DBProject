<?php
session_start();
if(!(isset($_SESSION['uid']))) {header("location:login.php");}
$uid = $_SESSION['uid'];

?>

<?php
	$course_id = $_POST['course_id'];
	echo "COURSE ID IS " . $course_id;
	include("db-connect.php");
	$stmt = mysqli_stmt_init($con);
	mysqli_stmt_prepare($stmt, "INSERT INTO Takes (course_id, user_id) VALUES (?, ?)") or die(mysqli_error());
	mysqli_stmt_bind_param($stmt,'si', $course_id, $uid);
	mysqli_stmt_execute($stmt);
	include("db-disconnect.php");
	header( 'Location: course_page.php?course_id=' . $course_id );
?>


