<?php
session_start();
if(!(isset($_SESSION['uid']))) {header("location:login.php");}
$uid = $_SESSION['uid'];

?>
<html>
	<head>
		<title>Title</title>
		<?php include("header-head.php"); ?>
	</head>
	<body>
		<div class="wrapper">
			<!-- connecting to database -->
			<?php include("db-connect.php"); ?>
			<!-- header code -->
			<?php include("header-body.php"); ?>


<form method="post" action="upload1.php" >

	<table>

        <tr>
		<td><b>Upload Title:  </b>
		<input type="text" size="50" name="filename2" id="filename2" value=""/></td>
		</tr>
		<tr>
		<td><b>Folder Name: </b>
			<input type="text" size="50" name="folderName" id="folderName" value=""/></td>
	    </tr>
		<tr>
							<td><b>Upload Type:</b>
							<select name="type" >							          
										<option value= 'assignment'>assignment</option>													
										<option value= 'ebook'>ebook</option>
										<option value= 'exam-papers'>exam-paper</option>
										<option value= 'lectures'>lectures</option>
										<option value= 'notes'>notes</option>
                                        <option value= 'other'>other</option>									
							</select></td>
						</tr>
						
		    

		<tr>
		<td>
        <input name="uploadArray[]" type="file" id="uploadArray[]" size="50" />
        </td>
		</tr>
		

	     <tr>
         <td>
         <input type="submit" value="Upload" name="submit" />
         </td>
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
