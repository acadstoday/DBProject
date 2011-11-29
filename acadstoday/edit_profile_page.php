<?php
//User is forwarded to this page after he signups for the first time [update database]
//It is also used to change other details later by the user [update database]
//**these attribs have already been stored
?>

<html>
	<head>
		<title>Edit Profile</title>
		<?php include("header-head.php"); ?>
	</head>

	<body>
		<div class="wrapper">
			<!-- connecting to database -->
			<?php include("db-connect.php"); ?>
			<!-- header code -->
			<?php include("header-body.php"); ?>
			<div class="leftpad" id="list-result">
			<h2>Edit Profile</h2>
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
			<div class="push"></div>
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>

