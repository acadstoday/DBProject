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
			
			
			<?php
						$stmt = mysqli_stmt_init($con);
						$uid =  '1';
//Only if the form is submitted
if(isset($_POST['submit'])) {

	//Create folder name with the username followed by the submitted name as given by user or by the name of the option selected from drop down list
	$folderStr = $_REQUEST['uid'];
	if($_REQUEST['folderName'] == null){
	
    $folderStr1 = $_REQUEST['type'];
	}
	else{
	$folderStr1 = $_REQUEST['folderName'];
	}
	$upload_folder = 	preg_replace("'\s+'", '-', $folderStr1);

//final destination of upload
	$upload_path = './'.$uid."/".$upload_folder.'/';

	//Check whether folder exists or create with the name supplied
	if(is_dir($upload_path))
	echo 'directory exists';
	else{
	mkdir('./'.$uid.'/', 777);
    mkdir('./'.$uid."/".$upload_folder.'/', 777);
}
	//$_FILES['uploadArray']['name']; = upload file name
	//for example upload file name sample.jpg . $path will be upload_files/{folderStr}/sample.jpg

// rename the file
	$filename1 = $_FILES['uploadArray']['name'][0];
	$file_ext = substr($filename1, strripos($filename1, '.')); // strip name
	$filesize = $_FILES['uploadArray']['size'][0];
	if (($file_ext == ".pdf" || $file_ext == ".doc" || $file_ext == ".ppt" || $file_ext == ".jpg"  )  &&  ($filesize < 2000000)) {
		// rename file
		$newfilename = $_REQUEST['filename2'] . $file_ext;
	}
	
	$path1= $upload_path.$newfilename;

	
	
	if($_FILES['uploadArray']['size'][0]>0)	{
		copy($_FILES['uploadArray']['tmp_name'][0], $path1);
		
		echo "File Name :".$newfilename."<BR/>";
		echo "File Size :".$_FILES['uploadArray']['size'][0]."<BR/>";
		echo "<P>";
	}

}
	?>		
			
		<div class="push"></div>
		</div>
			<!-- footer code -->
			<?php include("footer.php"); ?>
			
			<!-- disconnect the database connection-->
			<?php include("db-disconnect.php"); ?>
	</body>
</html>

