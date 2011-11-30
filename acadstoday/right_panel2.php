<!-- right panel starts which has search box and togglable list of courses taken/instructors followed etc. --> 
<?php
session_start();
if(!(isset($_SESSION['uid']))) {header("location:login.php");}
$uid = $_SESSION['uid'];

?>
<div id="rightpanel">
	<form class="searchform" action="search.php" method="get">
		<input class="searchfield" name="search_text" type="text" value="Search Here" onfocus="if (this.value == 'Search Here') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search Here';}" />
		<input class="searchbutton" type="submit" value="Go" />
	</form>
	<h3>Follower Lists</h3>
	<div id="easytab2" class="menu">
		<ul>
			<li><a href="#" onmouseover="easytabs('1', '1');" onfocus="easytabs('1', '1');"  onclick="easytabs('1', '1');" title="" id="anotherlink1">Users</a></li>
			<li><a href="#" onmouseover="easytabs('1', '2');" onfocus="easytabs('1', '2');"  onclick="easytabs('1', '2');" title="" id="anotherlink2">Instructors</a></li>
			<li><a href="#" onmouseover="easytabs('1', '3');" onfocus="easytabs('1', '3');"  onclick="easytabs('1', '3');" title="" id="anotherlink3">Courses</a></li>
		</ul>
	</div>


	<div id="anothercontent1">
		<?php
			$stmt = mysqli_stmt_init($con);
			mysqli_stmt_prepare($stmt, "SELECT User.user_name, User.user_id FROM User, User_Follow WHERE User.user_id = User_Follow.followed_id AND User_Follow.user_id = ?") or die(mysqli_error());
			mysqli_stmt_bind_param($stmt, 'i', $uid);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt) == '0'){
				echo "You Don't follow any Users";
				echo "<br/>Follow users <a href='user_list.php'>Here</a>";
			}
			else{
				mysqli_stmt_bind_result($stmt, $name, $id);
				echo "<ul>";
				while ( mysqli_stmt_fetch($stmt) ) {
					echo "<li><a href='user_page.php?user_id=" . $id . "'>" . $name . "</a></li>";
				}
				echo "</ul>";
				echo "<br/>Follow more users <a href='user_list.php'>Here</a>";
			}
			mysqli_stmt_close($stmt);
		?>
	</div>
	<div id="anothercontent2">
		<?php
			$stmt = mysqli_stmt_init($con);
			mysqli_stmt_prepare($stmt, "SELECT inst_name, inst_id FROM Instr_Follow NATURAL JOIN Instructor WHERE user_id = ?") or die(mysqli_error());
			mysqli_stmt_bind_param($stmt, 'i', $uid);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt) == '0'){
				echo "You Don't follow any Instructors";
				echo "<br/>Follow instructors <a href='instructor_list.php'>Here</a>";
			}
			else{
				mysqli_stmt_bind_result($stmt, $name, $id);
				echo "<ul>";
				while ( mysqli_stmt_fetch($stmt) ) {
					echo "<li><a href='instructor_page.php?inst_id=" . $id . "'>" . $name . "</a></li>";
				}
				echo "</ul>";
				echo "<br/>Follow more instructors <a href='instructor_list.php'>Here</a>";
			}
			mysqli_stmt_close($stmt);
		?>
	</div>
	<div id="anothercontent3">
		<?php
			$stmt = mysqli_stmt_init($con);
			mysqli_stmt_prepare($stmt, "SELECT course_name, course_id FROM Course_Follow NATURAL JOIN Course WHERE user_id = ?") or die(mysqli_error());
			mysqli_stmt_bind_param($stmt, 'i', $uid);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt) == '0'){
				echo "You Don't follow any Courses";
				echo "<br/>Follow courses <a href='course_list.php'>Here</a>";
			}
			else{
				mysqli_stmt_bind_result($stmt, $name, $id);
				echo "<ul>";
				while ( mysqli_stmt_fetch($stmt) ) {
					echo "<li><a href='course_page.php?course_id=" . $id . "'>" . $name . "</a></li>";
				}
				echo "</ul>";
				echo "<br/>Follow more courses <a href='course_list.php'>Here</a>";
			}
			mysqli_stmt_close($stmt);
		?>
	</div>
</div>
<!-- right panel ends-->
