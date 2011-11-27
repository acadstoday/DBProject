<html>
	<head>
		<title>Search Results of '<?php echo $_GET["search_text"]; ?>'</title>
		<?php include("header-head.php"); ?>
		
		<script type="text/javascript" src="js/tabber.js"></script>
		<!-- <script type="text/javascript" src="js/tabber-minimized.js"></script> -->
		<link rel="stylesheet" type="text/css" href="css/tabber.css" />
		<style type="text/css">
		td.datacellone {
			background-color: #EAF2D3; color: #000000;
		}
		td.datacelltwo {
			background-color: #ffffff; color: #000000;
		}
		td, th 
		{
		font-size:1em;
		border:1px solid #98bf21;
		padding:3px 7px 2px 7px;
		}
		</style>
	</head>
	<body>
		<div class="wrapper">
			<!-- connecting to database -->
			<?php include("db-connect.php"); ?>
			<!-- header code -->
			<?php include("header-body.php"); ?>
			
			<div id="center">
				<h3>Search Result for Query "<?php echo $_GET["search_text"]; ?>"</h3>
				<div class="tabber">
					<div class="tabbertab" title="Courses">
					
						<table>
						<?php
						$stmt = mysqli_stmt_init($con);
						$search_query = "%" . $_GET["search_text"] . "%";
						mysqli_stmt_prepare($stmt, "SELECT course_id, course_name, dept_name FROM Course WHERE lower(course_name) like ? OR lower(dept_name) like ?") or die(mysqli_error());
						mysqli_stmt_bind_param($stmt,'ss', $search_query, $search_query);
						mysqli_stmt_execute($stmt);
						//mysqli_stmt_store_result($stmt);
						mysqli_stmt_bind_result($stmt, $course_id, $course_name, $dept_name);
						$count = 0;
						while (mysqli_stmt_fetch($stmt)) {
								if ($count %2 == 0){
									echo "<tr><td class=\"datacellone\">";
								}
								else{
									echo "<tr><td class=\"datacelltwo\">";
								}
								echo "<a href=\"course_page.php?course_id=".$course_id."\">";
								echo $course_id;
								echo "</td>";
								if ($count %2 == 0){
									echo "<td class=\"datacelltwo\">";
								}
								else{
									echo "<td class=\"datacellone\">";
								}
								echo $course_name;
								echo "</td>";
								if ($count %2 == 0){
									echo "<td class=\"datacellone\">";
								}
								else{
									echo "<td class=\"datacelltwo\">";
								}
								echo $dept_name;
								echo "</a>";
								echo "</td></tr>";
								$count = $count + 1;
						}
						?>
						</table>
					</div>
					<div class="tabbertab" title="Instructors">
						<table>
						<?php

						mysqli_stmt_prepare($stmt, "SELECT inst_id,inst_name, dept_name FROM Instructor WHERE lower(inst_name) like ? OR lower(dept_name) like ?") or die(mysqli_error());
						mysqli_stmt_bind_param($stmt,'ss', $search_query, $search_query);
						mysqli_stmt_execute($stmt);
						//mysqli_stmt_store_result($stmt);
						mysqli_stmt_bind_result($stmt, $inst_id,$inst_name, $dept_name);
						while (mysqli_stmt_fetch($stmt)) {
								if ($count %2 == 0){
									echo "<tr><td class=\"datacellone\">";
								}
								else{
									echo "<tr><td class=\"datacelltwo\">";
								}
								echo "<a href=\"instructor_page.php?inst_id=".$inst_id."\">";
								echo $inst_name;
								echo "</td>";
								if ($count %2 == 0){
									echo "<td class=\"datacelltwo\">";
								}
								else{
									echo "<td class=\"datacellone\">";
								}

								echo $dept_name;
								echo "</a>";
								echo "</td></tr>";
								$count = $count + 1;
						}
						?>
						</table>
					</div>
					<div class="tabbertab" title="Users">
						<table>
						<?php
						mysqli_stmt_prepare($stmt, "SELECT user_id,user_name, dept_name FROM User WHERE lower(user_name) like ? OR (dept_name) like ?") or die(mysqli_error());
						mysqli_stmt_bind_param($stmt,'ss', $search_query, $search_query);
						mysqli_stmt_execute($stmt);
						//mysqli_stmt_store_result($stmt);
						mysqli_stmt_bind_result($stmt, $user_id,$user_name, $dept_name);
						while (mysqli_stmt_fetch($stmt)) {
								if ($count %2 == 0){
									echo "<tr><td class=\"datacellone\">";
								}
								else{
									echo "<tr><td class=\"datacelltwo\">";
								}
								echo "<a href=\"user_page.php?user_id=".$user_id."\">";
								echo $user_name;
								echo "</td>";
								if ($count %2 == 0){
									echo "<td class=\"datacelltwo\">";
								}
								else{
									echo "<td class=\"datacellone\">";
								}

								echo $dept_name;
								echo "</a>";
								echo "</td></tr>";
								$count = $count + 1;
						}
						?>
						</table>
						
					</div>
					<div class="tabbertab" title="Upload">
						SEARCH WITH NAME - NOT DONE</br>
						<table>
						<?php
						mysqli_stmt_prepare($stmt, "SELECT upload_id, format, type, course_id FROM Upload NATURAL JOIN Uploader WHERE lower(format) like ? OR lower(type) like ? OR lower(course_id) like ?");
						mysqli_stmt_bind_param($stmt,'sss', $search_query, $search_query, $search_query);
						mysqli_stmt_execute($stmt);
						//mysqli_stmt_store_result($stmt);
						mysqli_stmt_bind_result($stmt, $upload_id,$format, $type, $course_id);
						while (mysqli_stmt_fetch($stmt)) {
								if ($count %2 == 0){
									echo "<tr><td class=\"datacellone\">";
								}
								else{
									echo "<tr><td class=\"datacelltwo\">";
								}
								echo "<a href=\"upload_page.php?upload_id=".$upload_id."\">";
								echo $upload_id;
								echo "</td>";
								if ($count %2 == 0){
									echo "<td class=\"datacelltwo\">";
								}
								else{
									echo "<td class=\"datacellone\">";
								}

								echo $format;
								echo "</td>";
								if ($count %2 == 0){
									echo "<td class=\"datacellone\">";
								}
								else{
									echo "<td class=\"datacelltwo\">";
								}

								echo $type;
								echo "</td>";
								if ($count %2 == 0){
									echo "<td class=\"datacelltwo\">";
								}
								else{
									echo "<td class=\"datacellone\">";
								}

								echo $course_id;
								echo "</a>";
								echo "</td></tr>";
								$count = $count + 1;
						}
						?>
						</table>
					</div>
				</div>
			</div>
			
			
			
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>

