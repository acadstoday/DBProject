<?php
session_start();
if(!(isset($_SESSION['uid']))) {header("location:login.php");}
$uid = $_SESSION['uid'];

?>
<?php
$upload_id = $_GET['upload_id'];
$num_of_comments = 0;
?>

<html>
	<head>
		<title>Upload Page</title>
		<?php include("header-head.php"); ?>
		<!-- this css is for rating stars display -->
		<style type="text/css">
		<!--
		.restaurant-stars { display:block; width:250px; height:47px; background:url('images/blankStar.png') no-repeat; }
		-->
		</style>
	</head>
	<body>
		<div class="wrapper">
			<!-- connecting to database -->
			<?php include("db-connect.php"); ?>
			<!-- header code -->
			<?php include("header-body.php"); ?>
			
			<?php
                $stmt = mysqli_stmt_init($con);
                
                mysqli_stmt_prepare($stmt, "SELECT upload_title, upload_info, format, type, time_stamp, link , user_id, user_name, course_id, tot_downloads FROM Upload NATURAL JOIN User WHERE upload_id = ?") or die(mysqli_error());
                mysqli_stmt_bind_param($stmt,'i', $upload_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $upload_title, $upload_info, $upload_format, $upload_type, $upload_date, $upload_link , $user_id, $user_name, $course_id,  $tot_downloads);
                while (mysqli_stmt_fetch($stmt)) {}

                mysqli_stmt_prepare($stmt, "SELECT count(user_id) FROM Upload_Rating WHERE upload_id = ?") or die(mysqli_error());
                mysqli_stmt_bind_param($stmt,'i', $upload_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $votes);
                while (mysqli_stmt_fetch($stmt)) {}

                if ($votes != 0){
                    mysqli_stmt_prepare($stmt, "SELECT avg(rating) FROM Upload_Rating WHERE upload_id = ?") or die(mysqli_error());
                    mysqli_stmt_bind_param($stmt,'i', $upload_id);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt, $upload_rating);
                    while (mysqli_stmt_fetch($stmt)) {}
                    $upload_rating = number_format($upload_rating, 2, '.', '');
                }
                else {
                    $upload_rating = 0.00;
                }
                
                mysqli_stmt_prepare($stmt, "SELECT count(comment) FROM Upload_Comments WHERE upload_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'i', $upload_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $num_of_comments);
				while (mysqli_stmt_fetch($stmt)) {}
				
				mysqli_stmt_prepare($stmt, "SELECT rating FROM Upload_Rating WHERE upload_id = ? AND user_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt,'ii', $upload_id, $uid);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $upload_rating_flag); 
				$course_rating_flag = 0;
				while (mysqli_stmt_fetch($stmt)) {}
            ?>
			<div id="page">
				<div id="top-part">
					<?php echo "<h2>" . $upload_title . "</h2>"; ?>
					<div class="restaurant-stars">
						<div class="restaurant-stars-rating" title="rating" style="display:block; width:<?php echo $upload_rating*50 ?>px; height:47px; background:url('images/colorStar.png') no-repeat;">             
							&nbsp;
						</div>
						<center><?php echo $upload_rating." (".$votes." Votes)" ?></center>
					</div>
					<?php
						echo "<br/><b>type</b> : " . $upload_type . " | ";
						echo "<b>format</b> : " . $upload_format . " | ";
						echo "<b>uploaded by</b> : <a href='user_page.php?user_id=" . $user_id . "'>" . $user_name . "</a> | ";
						echo "<b>on</b> : " . $upload_date . " | ";
						echo "<b>in</b> : <a href='course_page.php?course_id=" . $course_id . "'>" . $course_id . "</a>";
						echo "<p class='smalltext'><b>info</b>" . $upload_info . "</p>";
					?>
					
					
				</div>
					<h3>Comments</h3>
					<div id="upload-comment">
					<?php
						mysqli_stmt_prepare($stmt, "SELECT user_id, user_name, comment_id, comment, time_stamp FROM Upload_Comments NATURAL JOIN User WHERE upload_id = ? ORDER BY time_stamp DESC") or die(mysqli_error());
						mysqli_stmt_bind_param($stmt,'i', $upload_id);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt) == 0){
							echo "Currently No Comments to Show";
						}
						else{
							mysqli_stmt_bind_result($stmt, $user_id, $user_name, $comment_id, $comment, $timestamp);
							while ( mysqli_stmt_fetch($stmt) ) {
								echo "<div class='commentbox'>";
								if ($user_id == $uid){
									echo "<a href='delete_comment.php?type=upload&id=" . $upload_id . "&comment_id=" . $comment_id . "'><img src='images/close_x.png' class='delete-comment' alt='delete' /></a>";
								}
								echo "<p><a href='user_page.php?user_id=" . $user_id . "'> " . $user_name . "</a> wrote:</br>";
								echo "" . $comment . "</p>";
								echo "<p class='smalltext'><i>on</i> " . $timestamp . "</p>";
								echo "</div>";
							}
						}
					?>
					</div>
			</div>
			
			<div id="sidebar">
				<table border="0" id="rightlist">
				<?php
					echo "<tr><th> Total Downloads so far : " . $tot_downloads . "</th></tr>"; 
					echo "<tr><th><a href=''>Download</a> this material</th></tr>";
				?>
				<?php
					if ($upload_rating_flag != 0) {
						echo "<tr><th><p>Your rating : " . $upload_rating_flag . "</p></th></tr>"; 
					}
					else {
				?>
					<tr><th>
						<form action="update_rating_upload.php" method="post">
							Rate The Uploaded Material : <br/>
							<select name="rating" value="5">
								<option>5</option>
								<option>4</option>
								<option>3</option>
								<option>2</option>
								<option>1</option>
							</select>
							<?php echo "<input type='hidden' name='upload_id' value='" . $upload_id . "'/>"; ?>
							<input type="submit" value="Rate" />
						</form>
					</th></tr>
				<?php
					}
				?>
				<tr><th>
					<form action="comment_upload.php" method="post">
						<textarea name="comment" rows="3" cols="34" onfocus="if (this.value == 'Comment Here') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Comment Here';}">Comment Here</textarea>
						<?php echo "<input type='hidden' name='upload_id' value='" . $upload_id . "'/>"; ?>
						<input type="submit" value="Submit" />
					</form>
				</th></tr>
				</table>
			</div>
			<div class="push"></div>
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>

