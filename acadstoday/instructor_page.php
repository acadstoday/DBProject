<?php 
//given instr_id in $_GET

/*write queries to get the following details in the given variables
$inst_id = $_GET['inst_id']
$inst_name
$inst_dept
$inst_info
$inst_rating
$votes //number of people who have rated

*below details will be displayed in tabs
$inst_teaches [array]
$inst_comments [array]
$inst_projects [array]
$inst_followers [array]
$num_of_followers

*flags
$inst_follow_flag - 1 if user is following this course else 0
$inst_rating_flag - -1 if user has not rated this course else user's rating
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

