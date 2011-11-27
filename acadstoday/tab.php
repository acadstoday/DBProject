<html>
	<head>
		<title>Title</title>
		<!--<link rel="stylesheet" type="text/css" href="css/global.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />-->
		<link rel="stylesheet" type="text/css" href="css/tabtastic.css" />
		<script type="text/javascript" src="js/tabtastic.js"></script>
		<script type="text/javascript" src="js/attachevent.js"></script>
		<script type="text/javascript" src="js/addclasskillclass.js"></script>
		<script type="text/javascript" src="js/addcss.js"></script>
	</head>
	<body>
		<div class="wrapper">
			<!-- connecting to database -->
			<?php include("db-connect.php"); ?>
			<!-- header code -->
			<?php /*include("header-body.php"); */?>
			
			
			<!-- ***************** All Content Here **************** -->
			
			
			<ul class="tabset_tabs">
			   <li><a href="#tab1" class="active">Tab 1</a></li>
			   <li><a href="#tab2">Tab 2</a></li>
			   <li><a href="#tab3">Tab 3</a></li>
			</ul>

			<div id="tab1" class="tabset_content">
			   <h2 class="tabset_label">Tab 1</h2>
			   <p>Tab 1 Content</p>
			</div>

			<div id="tab2" class="tabset_content">
			   <h2 class="tabset_label">Tab 2</h2>
			   <p>Tab 2 Content</p>
			</div>

			<div id="tab3" class="tabset_content">
			   <h2 class="tabset_label">Tab 3</h2>
			   <p>Tab 3 Content</p>
			</div>
			
			
			
			
			
			
			
			
			
			
			<div class="push"></div>
		</div>
			<!-- footer code -->
			<?php /*include("footer.php");*/ ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>
