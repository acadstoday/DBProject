<html>
	<head>
		<title>Add a Project</title>
		<?php include("header-head.php"); ?>
	</head>	
	<body>
		<div class="wrapper">
			<h2>Project Registration</h2>
			<?php
				   //change user and pwd while connecting to your local database
				   $host = "localhost"; //database location
				   $user = "root"; //database username
				   $pwd = ""; //database password
				   $db_name = "acadstoday"; //database name

				   //database connection
				   $link = mysql_connect($host, $user, $pwd);
				   
				   mysql_select_db($db_name);
				   //sets encoding to utf8
				   mysql_query("SET NAMES utf8");
				   
						$help2 = "SELECT * FROM Instructor";
						$help3 = "SELECT * FROM course";

					//$query = sprintf($help);
					$result2 = mysql_query($help2);
					$result3 = mysql_query($help3);

					if (!$result2 || !$result3) {
						$message  = 'Invalid query: ' . mysql_error() . "\n";
						$message .= 'Whole query: ' . $query;
						die($message);
					}
					else{

						echo "<form>";
						echo "<table>";
						echo "<tr><td>Project:</td>";
						echo "<td><input type=\"text\" name=\"project\"/></td></tr>";
						//echo "</br>";
						echo "<tr><td>Instructor:</td>";
						echo "<td><select name=\"instructor\">";
						while ($row = mysql_fetch_assoc($result2)) {
							echo "<option value=\"".$row['inst_id']."\">";
							echo $row['inst_name'];
							echo "</option>\n";
						}
						echo "</select></td></tr>";
						//echo "</br>";
						echo "<tr><td>Course:</td>";
						echo "<td><select name=\"course\">";
						while ($row = mysql_fetch_assoc($result3)) {
							echo "<option value=\"".$row['course_id']."\">";
							echo $row['course_name'];
							echo "</option>\n";
						}
						echo "</select></td></tr>";
						//echo "</br>";
						echo "<tr><td>Project Desciption:</td>";
						echo "<td><textarea name=\"project_desciption\"></textarea></td></tr>";
						echo "<tr><td>Start Date:</td>";
						echo "<td><input type=\"text\" name=\"start_date\" value=\"ddmmyyyy\"/></td></tr>";
						echo "<tr><td>End Date:</td>";
						echo "<td><input type=\"text\" name=\"end_date\" value=\"ddmmyyyy\"/></td></tr>";
						echo "</table>";
						echo "<input type=\"submit\" name=\"submit\" value=\"Register\" />";
						echo "</form>";
					mysql_free_result($result2);
					mysql_free_result($result3);
					}
			?>
		</div>
	</body>
</html>
