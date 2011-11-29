<?php
session_start();
require('err.php');
?>
<html>
	<head>
		<title>Login Page</title>
		<script type="text/javascript" src="js/login.js"></script>
		<link rel="stylesheet" type="text/css" href="css/global.css" />
		<link rel="stylesheet" type="text/css" href="css/login.css" />
		<link rel="stylesheet" type="text/css" href="css/header.css" />
	</head>
	<body>
		<div class="wrapper" style="min-height:600px;">
			<div id="content">
				<div><h1>AcadsToday</h1></div>
				<div class="desc">
					<p>This is a Project for course CS-387 i.e. <i>Database and Information Systems Lab</i>.</p>
				</div>
			</div>
			<div id="formNerror">
				<div id="forms">
					<div id="form1">
						<form method="POST" action="login_page.php">
							<table cellspacing="0">
								<tr>
									<td><label for="user_id">Username</label></td>
									<td><input type="text" name="user_id" id="user_id" tabindex="1" /></td></tr>
								<tr>
									<td><label for="pwd">Password</label></td>
									<td><input type="password" name="pwd" id="pwd" tabindex="2" /></td></tr>
								<tr>
									<td></td>
									<td><br/><input value="Sign In" tabindex="3" type="submit" /></td></tr>
								<tr>
									<td colspan="2"><br/>New User? Sign Up <a href="javascript:void" title="Sign Up" id="showform2" onclick="toggleForm1();">Here</a></td></tr>
							</table>
						</form>
					</div>
					<div id="form2" style="display:none">
						<form method="POST" action="register_page.php">
							<table cellspacing="0">
								<tr>
									<td><label for="ldap_id">LDAP Username</label></td>
									<td><input type="text" name="ldap_id" id="ldap_id" tabindex="1"/></td></tr>
								<tr>
									<td><label for="ldap_pwd">LDAP Password</label></td>
									<td><input type="password" name="ldap_pwd" id="ldap_pwd" tabindex="2" /></td></tr>
								<tr>
									<td><label for="pwd1">Your New Password</label></td>
									<td><input type="password" name="pwd1" id="pwd1" tabindex="3" /></td></tr>
								<tr>
									<td></td>
									<td><br/><input value="Sign Up" tabindex="5" type="submit" /></td></tr>
								<tr>
									<td colspan="2"><br/>Already a member? Sign In <a href="javascript:void" title="Sign In" id="showform1" onclick="toggleForm2();">Here</a></td></tr>
							</table>
						</form>
					</div>
				</div>
				<div class="error">
						<?php err_print(); ?>
				</div>
			</div>
			<div class="push"></div>
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
	</body>
</html>

