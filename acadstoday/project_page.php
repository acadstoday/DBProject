<?php 
//given project_id in $_GET

/*write queries to get the following details in the given variables
$_project_id = $_GET['project_id']
$project_topic
$project_info
$start_date
$end_date
$project_user
$project_course //-1 if null
$project_inst //-1 if null
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

