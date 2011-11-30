<?php
session_start();

?>

<div id="bar">
	<div id="logo">
		<a href="home.php"><img src="images/logo.png" alt="AcadsToday"/></a>
	</div>
	<div id="container" >
		<?php
			if(isset($_SESSION['uid'])) {
		?>
		
		<div id="loginContainer">
			<a href="#" id="loginButton"><span>MyAccount</span><em></em></a>
			<div style="clear:both"></div>
			<div id="loginBox">                
				<form id="loginForm">
					<fieldset id="body">
						<fieldset>
							<!-- insert the appropriate links here -->
							<!-- we may have to reorder the below list or add/remove links-->
							<a href="edit_profile_page.php">Edit Profile</a><br/>
							<a href="add_course.php">Add Course</a><br/>
							<a href="add_project.php">Add Project</a><br/>
						</fieldset>
						<input type="button" id="login" value="Log Out" onclick="location.href='logout.php'" />
					</fieldset>
				</form>
			</div>
		</div>
		
		<?php
			}
			else{}
		?>
		
		
	</div>
</div>
