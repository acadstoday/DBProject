<?php 
//given user_id in $_GET
/*write queries to get the following details in the given variables
$user_id = $_GET['user_id']
$user_name
$date_of_joining
$user_info

If followed display the following info
$email
$user_followers [array]
$num_of_followers
$user_prog
$user_news [array]
$taken_course [array]
$followed_inst [array]
$followed_course [array]
$user_projects [array]
$user_uploads [array]

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

