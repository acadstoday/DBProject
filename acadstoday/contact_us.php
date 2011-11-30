<html>
	<head>
		<title>Contact Us</title>
		<?php include("header-head.php"); ?>
	</head>
	<body>
		<div class="wrapper">
			<!-- connecting to database -->
			<?php include("db-connect.php"); ?>
			<!-- header code -->
			<?php include("header-body.php"); ?>
			
			<div class="leftpad">
				<h2>Contact Us</h2>
				<ul>
					<li><h3>Saurabh Bhola (09005022)</h3>
					<b>Work</b> : [roll no][at]iitb[dot]ac[dot]in<br/>
					<b>Private</b> : saurabhbhola[dot]iitb[at]gmail[dot]com</li><br/>
					<li><h3>Gaurav Choudhary (09005026)</h3>
					<b>Work</b> : [roll no][at]iitb[dot]ac[dot]in<br/>
					<b>Private</b> : gaurav[dot]cse[dot]iitb[at]gmail[dot]com</li><br/>
					<li><h3>Ashish Tajane (09005027)</h3>
					<b>Work</b> : [roll no][at]iitb[dot]ac[dot]in<br/>
					<b>Private</b> : ashishtajane[at]gmail[dot]com</li><br/>
					<li><h3>Shikhar Paliwal (09005029)</h3>
					<b>Work</b> : [roll no][at]iitb[dot]ac[dot]in<br/>
					<b>Private</b> : shikhar[dot]paliwal[at]gmail[dot]com</li>
				</ul>
			</div>
			<div class="push"></div>
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>


