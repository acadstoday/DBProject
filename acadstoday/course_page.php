<?php 
//given course_id in $_GET

/*write queries to get the following details in the given variables
$course_id = $_GET['course_id'] #
$course_name #
$course_dept #
$course_info #
$course_rating #
$votes # //number of people who have rated

*below details will be displayed in tabs
$course_teachers [array]
$course_uploads [array]
$course_comments [array]
$course_projects [array]
$course_prereqs [array]
$course_followers [array]
$num_of_followers

*flags
$couse_taken_flag - 1 if user has taken this course else 0
$course_follow_flag - 1 if user is following this course else 0
$course_rating_flag - 0 if user has not rated this course else user's rating
*/

?>

<html>
	<head>
		<title>Title</title>
		<?php include("header-head.php"); ?>
		<script type="text/javascript" src="js/tabber.js"></script>
		<!-- <script type="text/javascript" src="js/tabber-minimized.js"></script> -->
		<link rel="stylesheet" type="text/css" href="css/tabber.css" />
		<!-- this css is for rating stars display -->
		<style type="text/css">
		<!--
		.restaurant-stars { display:block; width:250px; height:47px; background:url('images/blankStar.png') no-repeat; }
		-->
		</style>
		<script type="text/javascript">
			function set_rating(new_rating){
				document.getElementById('rating_display').innerHTML = "Your rating = " + new_rating;
			}
			function update_rating(){
				<!--
				window.location = "update_rating.php?new_rating=" + document.getElementById('rating_select').value + "&course_id=" + document.getElementById('courseId').innerHTML;
				//-->
			}
		</script>
	</head>
	<body>
		<div class="wrapper">
		<!-- connecting to database -->
			<?php include("db-connect.php"); ?>
			<!-- header code -->
			<?php include("header-body.php"); ?>
			
			<?php 
				$stmt = mysqli_stmt_init($con);
				
				$course_id = $_GET['course_id'];

				mysqli_stmt_prepare($stmt, "SELECT course_name, course_info, dept_name FROM course WHERE course_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'s', $course_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $course_name, $course_info, $dept_name); 
				while (mysqli_stmt_fetch($stmt)) {}

				mysqli_stmt_prepare($stmt, "SELECT count(user_id) FROM course_rating WHERE course_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'s', $course_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $votes); 
				while (mysqli_stmt_fetch($stmt)) {}

				if ($votes != 0){
					mysqli_stmt_prepare($stmt, "SELECT avg(rating) FROM course_rating WHERE course_id = ?") or die(mysqli_error());
					mysqli_stmt_bind_param($stmt,'s', $course_id);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt, $course_rating); 
					while (mysqli_stmt_fetch($stmt)) {}
					$course_rating = number_format($course_rating, 2, '.', '');
				}
				else {
					$course_rating = 0.00;
				}
			?>
			<div name="left" style="width:70%;float:left">
			<p id="courseId" style="visibility:hidden"><?php echo $course_id ?></p>
			<?php echo "<h1>$course_id : $course_name</h1>"; ?>
			<?php echo "<h2>$dept_name</h2>"; ?>
			<?php echo "<p>$course_info</p>"; ?> 
			
			<div class="restaurant-stars">
				<div class="restaurant-stars-rating" title="rating" style="display:block; width:<?php echo $course_rating*50 ?>px; height:47px; background:url('images/colorStar.png') no-repeat;">              
					&nbsp;
				</div>
				<center><?php echo $course_rating." (".$votes." Votes)" ?></center>
			</div>
			
			<?php $num_of_followers = 0; ?>
			
			<!-- ***************** All Content Here **************** -->
			<div id="center">
				<h3>PNA</h3>
				<div class="tabber">
					<div class="tabbertab" title="Comments">
						<p>Tab 1 content.</p>
					</div>
					<div class="tabbertab" title="Uploads">
						<p>Tab 2 content.</p>
					</div>
					<div class="tabbertab" title="Teachers">
						<p>Tab 3 content.</p>
					</div>
					<div class="tabbertab" title="Projects">
						<p>Tab 3 content.</p>
					</div>
					<div class="tabbertab" title="Prereq">
						<p>Tab 3 content.</p>
					</div>
					<div class="tabbertab" title="Followers(<?php echo $num_of_followers?>)">
						<p>Tab 3 content.</p>
					</div>
				</div>
			</div>
			</div>
			<div name="right"><br/><br/><br/><br/><br/><br/>
				<center>
				<!-- TAKEN -->
				<!-- FOLLOW -->
				<!-- RATING -->
				<?php
				mysqli_stmt_prepare($stmt, "SELECT rating FROM course_rating WHERE course_id = ? AND user_id = ?") or die(mysqli_error());
				$userid = 12345;//$_SESSION['user_id']);
				mysqli_stmt_bind_param($stmt,'sd', $course_id,$userid);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $course_rating_flag); 
				$course_rating_flag = 0;
				while (mysqli_stmt_fetch($stmt)) {}
				?>
				<input type="range"  min="1" max="5" id="rating_select" value = "<?php if ($course_rating_flag != 0) echo $course_rating_flag;?>" onchange="javascript:set_rating(this.value)"/>
				<input type="button" value="Rate" onclick="javascript:update_rating()"/>
				<?php 
				if ($course_rating_flag == 0) {
						echo "<p id=\"rating_display\">You have not rated this course. </p>"; 
				}
				else{
						echo "<p id=\"rating_display\">Your rating = $course_rating_flag</p>"; 
				}
				?>
				</center>
			</div>
			
			<!-- ***************** All Content Here **************** -->
			
			
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>

