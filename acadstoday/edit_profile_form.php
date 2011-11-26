<?php
//User is forwarded to this page after he signups for the first time [update database]
//It is also used to change other details later by the user [update database]
//**these attribs have already been stored
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>techchorus.net Dojo Date Picker Example</title>
		<style type="text/css">
				@import "http://o.aolcdn.com/dojo/1.0/dijit/themes/tundra/tundra.css";
				@import "http://o.aolcdn.com/dojo/1.0/dojo/resources/dojo.css"
		</style>
		<script type="text/javascript" src="http://o.aolcdn.com/dojo/1.0/dojo/dojo.xd.js"
				djConfig="parseOnLoad: true">
		</script>
		<script type="text/javascript">
				dojo.require("dijit.form.DateTextBox");
		</script>
	</head>

	<body class="tundra">
		<h1>Edit Profile</h1>
		<form name="edit_profile_form" action="edit_profile.php" method="post">
		<table>
		<tr><td>USERNAME&nbsp;</td><td> <input name="user_name" value="<?php //echo $_SESSION['user_name'] ?>"/></td></tr>
		<tr><td>GENDER&nbsp; </td><td><input type="radio" name="user_gender" value="Male"> Male &nbsp; <input type="radio" name="user_gender" value="Female"> Female </td></tr>
		<tr><td>DOB&nbsp; </td><td><input type="text" name="user_dob"  dojoType="dijit.form.DateTextBox" required="true" /></td></tr>
		<tr><td>EmailID&nbsp; </td><td><input type="text" name="user_email"/></td></tr>
		<tr><td>ABOUT ME&nbsp; </td><td><textarea rows="5" cols="20"></textarea></td></tr>
		<tr><td><input type="submit" value="Save"></td><td></td></tr>
		</table>
		</form>
	</body>
</html>

