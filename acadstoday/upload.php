<?php
session_start();
if(!(isset($_SESSION['uid']))) {header("location:login.php");}
$uid = $_SESSION['uid'];

?>
<?php
$course_id = $_GET['course_id'];

?>

<html>
	<head>
		<title>Upload Page</title>
		<?php include("header-head.php"); ?>
	</head>
	<body>
		<div class="wrapper">
			<!-- connecting to database -->
			<?php include("db-connect.php"); ?>
			<!-- header code -->
			<?php include("header-body.php"); ?>

			<br/><br/>
			<form method="post" action="processing_upload.php" enctype="multipart/form-data">
				<table cellspacing="10px">
					<tr>
						<td><b>Course ID : </b></td>
						<td><?php echo $course_id; ?></td>
					</tr>
					<tr>
						<td><label for="filename2"><b>Upload Title : </b></label></td>
						<td><input type="text" size="30" name="filename2" id="filename2" value=""/></td>
					</tr>
					<tr>
						<td><label for="folderName"><b>Folder Name : </b></label></td>
						<td><input type="text" size="30" name="folderName" id="folderName" value=""/>
						<br /><div class="smalltext">(This could be same as Upload Type or any other as per what User wants)</div></td>
					</tr>
					<tr>
						<td><b>Upload Type :</b></td>
						<td>
							<select name="type" >							          
								<option value= 'assignment'>assignment</option>													
								<option value= 'ebook'>ebook</option>
								<option value= 'exam-papers'>exam-paper</option>
								<option value= 'lectures'>lectures</option>
								<option value= 'notes'>notes</option>
								<option value= 'other'>other</option>									
							</select>
						</td>
					</tr>
					<tr>
						<td><b>Upload Link : </b></td>
						<td><input name="uploadArray[]" type="file" id="uploadArray[]" size="30" /></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" value="Upload" name="submit" /></td>
					</tr>
				</table>
			</form>



			<div class="push"></div>
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>
