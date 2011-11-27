<!-- right panel starts which has search box and togglable list of courses taken/instructors followed etc. --> 
<div id="rightpanel">
	<form class="searchform" action="search.php" method="get">
		<input class="searchfield" name="search_text" type="text" value="Search Here" onfocus="if (this.value == 'Search Here') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search Here';}" />
		<input class="searchbutton" type="submit" value="Go" />
	</form>
	<h3>Follower Lists</h3>
	<div id="tabber2" class="tabber">
		<div class="tabbertab" title="Users">
			<?php
				//$user_id = $_SESSION['uid'];   //use this actually
				$user_id = '44553';
				$stmt = mysqli_stmt_init($con);
				mysqli_stmt_prepare($stmt, "SELECT User.user_name, User.user_id FROM User, User_Follow WHERE User.user_id = User_Follow.followed_id AND User_Follow.user_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt, 's', $user_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				if(mysqli_stmt_num_rows($stmt) == '0'){
					echo "You Don't follow any Users";
					echo "<br/>Follow new users <a href='user_list.php'>Here</a>";
				}
				else{
					/* bind result variables */
					mysqli_stmt_bind_result($stmt, $name, $id);
					/* fetch value */
					echo "<ui>";
					while ( mysqli_stmt_fetch($stmt) ) {
						echo "<li><a href='user_page.php?user_id=" . $id . "'>" . $name . "</a></li>";
					}
					echo "</ui>";
					echo "<br/>Follow more users <a href='user_list.php'>Here</a>";
				}
				mysqli_stmt_close($stmt);
			?>
		</div>
		<div class="tabbertab" title="Instructors">
			<?php
				//$user_id = $_SESSION['uid'];   //use this actually
				$user_id = '44553';
				$stmt = mysqli_stmt_init($con);
				mysqli_stmt_prepare($stmt, "SELECT inst_name, inst_id FROM Instr_Follow NATURAL JOIN Instructor WHERE user_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt, 's', $user_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				if(mysqli_stmt_num_rows($stmt) == '0'){
					echo "You Don't follow any Instructors";
					echo "<br/>Follow new instructors <a href='instructor_list.php'>Here</a>";
				}
				else{
					/* bind result variables */
					mysqli_stmt_bind_result($stmt, $name, $id);
					/* fetch value */
					echo "<ui>";
					while ( mysqli_stmt_fetch($stmt) ) {
						echo "<li><a href='instructor_page.php?inst_id=" . $id . "'>" . $name . "</a></li>";
					}
					echo "</ui>";
					echo "<br/>Follow more instructors <a href='instructor_list.php'>Here</a>";
				}
				mysqli_stmt_close($stmt);
			?>
		</div>
		<div class="tabbertab" title="Courses">
			<?php
				//$user_id = $_SESSION['uid'];   //use this actually
				$user_id = '44553';
				$stmt = mysqli_stmt_init($con);
				mysqli_stmt_prepare($stmt, "SELECT course_name, course_id FROM Course_Follow NATURAL JOIN Course WHERE user_id = ?") or die(mysqli_error());
				mysqli_stmt_bind_param($stmt, 's', $user_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				if(mysqli_stmt_num_rows($stmt) == '0'){
					echo "You Don't follow any Courses";
					echo "<br/>Follow new courses <a href='course_list.php'>Here</a>";
				}
				else{
					/* bind result variables */
					mysqli_stmt_bind_result($stmt, $name, $id);
					/* fetch value */
					echo "<ui>";
					while ( mysqli_stmt_fetch($stmt) ) {
						echo "<li><a href='course_page.php?course_id=" . $id . "'>" . $name . "</a></li>";
					}
					echo "</ui>";
					echo "<br/>Follow more courses <a href='course_list.php'>Here</a>";
				}
				mysqli_stmt_close($stmt);
			?>
		</div>
	</div>
</div>
<!-- right panel ends-->
