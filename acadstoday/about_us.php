<html>
	<head>
		<title>About Us</title>
		<?php include("header-head.php"); ?>
	</head>
	<body>
		<div class="wrapper">
			<!-- connecting to database -->
			<?php include("db-connect.php"); ?>
			<!-- header code -->
			<?php include("header-body.php"); ?>
			
			<div class="addForm">
				<h2>About Us</h2>
				<p>This is a Project for course CS-387 i.e. <i>Database and Information Systems Lab</i>.</p>
				<p>Project Guide is our course instructor Prof. Sudarshan.</p>
				<p>The Core Team of AcadsToday is :</p>
				<ul>
					<li>Saurabh Bhola (09005022)</li>
					<li>Gaurav Choudhary (09005026)</li>
					<li>Ashish Tajane (09005027)</li>
					<li>Shikhar Paliwal (09005029)</li>
				</ul>
			</div>
			
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>

