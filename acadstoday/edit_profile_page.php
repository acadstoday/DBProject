<?php
session_start();
if(!(isset($_SESSION['uid']))) {header("location:login.php");}
$uid = $_SESSION['uid'];

?>

<html>
	<head>
		<title>Edit Profile</title>
		<?php include("header-head.php"); ?>
		<script type="text/javascript" src="js/easytab_rightpanel.js"></script>
		<link rel="stylesheet" type="text/css" href="css/easytab_rightpanel.css" />
	</head>

	<body>
		<div class="wrapper">
			<!-- connecting to database -->
			<?php include("db-connect.php"); ?>
			<!-- header code -->
			<?php include("header-body.php"); ?>
			<div id="content">
			<!-- left panel code -->
			<?php include("left_panel.php"); ?>
			
			<div id="center" class="leftpad">
				<h2>Edit Profile</h2>
				<div id="list-result">
				<form name="edit_profile_form" action="edit_profile.php" method="post">
					<table id="protable">
						<tr><td>Username: </td></tr>
						<tr><td>Password: </td><td> <input name="user_name" value="<?php //echo $_SESSION['user_name'] ?>"/></td></tr>
						<tr><td>Gender: </td><td><input type="radio" name="user_gender" value="Male"> Male &nbsp; <input type="radio" name="user_gender" value="Female"> Female </td></tr>
						<tr><td>Date of Birth: </td>
							<td>
								<input type="text" name="dob_date" value="dd" size="2" maxlength="2" onfocus="if (this.value == 'dd') {this.value = '';}" onblur="if (this.value == '') {this.value = 'dd';}"/>
								<input type="text" name="dob_month" value="mm" size="2" maxlength="2" onfocus="if (this.value == 'mm') {this.value = '';}" onblur="if (this.value == '') {this.value = 'mm';}"/>
								<input type="text" name="dob_year" value="yyyy" size="4" maxlength="4" onfocus="if (this.value == 'yyyy') {this.value = '';}" onblur="if (this.value == '') {this.value = 'yyyy';}"/>
							</td>
						</tr>
						<tr><td>Department Name: </td><td></td></tr>
						<tr><td>Program Name: </td><td></td></tr>
						<tr><td>Email Id: </td><td><input type="text" name="user_email"/></td></tr>
						<tr><td>About Me: </td><td><textarea rows="5" cols="30"></textarea></td></tr>
						<tr><td><input type="submit" value="Save"></td><td></td></tr>
					</table>
				</form>
				</div>
			</div>
			<!-- right panel code -->
			<?php include("right_panel2.php"); ?>
			</div>
			<div class="push"></div>
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>

