<?php
$new_rating = $_GET['new_rating'];
$course_id = $_GET['course_id'];
//write update query here...
header( 'Location: course_page.php?course_id='.$course_id);
?>