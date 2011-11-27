<?php
//given upload_id in $_GET 

/*write queries to get the following details in the given variables
$upload_id = $_GET['upload_id']
$upload_title
$upload_info
$upload_format
$upload_type
$upload_date
$upload_tot_downloads
$upload_link //FOR DOWNLOAD LINK
$upload_uploader
$upload_rating
$votes //number of people who have rated

*$upload comments [array]

*$upload_rating_flag [flag]

*/

?>

<html>
	<head>
		<title>Title</title>
		<?php include("header-head.php"); ?>
	</head>
	<body>
		<div class="wrapper">
			<!-- connecting to database -->
			<?php include("db-connect.php"); ?>
			<!-- header code -->
			<?php include("header-body.php"); ?>
			
			
			<!-- ***************** All Content Here **************** -->
			
			
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>

