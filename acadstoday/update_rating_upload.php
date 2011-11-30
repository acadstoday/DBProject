<?php
session_start();
if(!(isset($_SESSION['uid']))) {header("location:login.php");}
$uid = $_SESSION['uid'];

?>
<?php
	$rating = $_POST['rating'];
	$upload_id = $_POST['upload_id'];
	include("db-connect.php");
	$stmt = mysqli_stmt_init($con);
	mysqli_stmt_prepare($stmt, "INSERT INTO Upload_Rating (upload_id, user_id, rating) VALUES (?, ?, ?)") or die(mysqli_error());
	mysqli_stmt_bind_param($stmt,'iis', $upload_id, $uid, $rating);
	mysqli_stmt_execute($stmt);
	include("db-disconnect.php");
	header('location:upload_page.php?upload_id=' . $upload_id );
?>



