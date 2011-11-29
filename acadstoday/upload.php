<?php
//given upload_id in $_GET

/*write queries to get the following details in the given variables
$upload_id = $_GET['upload_id']
$upload_title
$upload_info
$upload_format
$upload_type
$upload_date
$upload_tot_downloads
$upload_link //FOR DOWNLOAD LINK
$userid
$upload_rating
$votes //number of people who have rated

*$upload comments [array]

*$upload_rating_flag [flag]

$upload_id = $_GET['upload_id'];
*/
$upload_id = '4';
?>


           
<html>
    <head>
        <title>Title</title>
        <?php include("header-head.php"); ?>
        <style type="text/css">
        <!--
        .restaurant-stars { display:block; width:250px; height:47px; background:url('images/blankStar.png') no-repeat; }
        -->
        </style>
        <script type="text/javascript">
            function set_rating(new_rating){
                document.getElementById('rating_display').innerHTML = "Your rating = " + new_rating;
            }
            function update_rating(){
                <!--
                window.location = "update_rating.php?new_rating=" + document.getElementById('rating_select').value + "&upload_id=" + document.getElementById('uploadId').innerHTML;
                //-->
            }
        </script>
    </head>
    <body>
        <div class="wrapper">
        <!-- connecting to database -->
            <?php include("db-connect.php"); ?>
            <!-- header code -->
            <?php include("header-body.php"); ?>
           
            <?php
                $stmt = mysqli_stmt_init($con);
                
                mysqli_stmt_prepare($stmt, "SELECT upload_title, upload_info, format, type, time_stamp, link , user_id FROM Upload WHERE upload_id = ?") or die(mysqli_error());
                mysqli_stmt_bind_param($stmt,'i', $upload_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $upload_title, $upload_info, $upload_format, $upload_type, $upload_date, $upload_link , $user_id);
                while (mysqli_stmt_fetch($stmt)) {}

                mysqli_stmt_prepare($stmt, "SELECT count(user_id) FROM Upload_Rating WHERE upload_id = ?") or die(mysqli_error());
                mysqli_stmt_bind_param($stmt,'i', $upload_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $votes);
                while (mysqli_stmt_fetch($stmt)) {}

                if ($votes != 0){
                    mysqli_stmt_prepare($stmt, "SELECT avg(rating) FROM Upload_Rating WHERE upload_id = ?") or die(mysqli_error());
                    mysqli_stmt_bind_param($stmt,'i', $upload_id);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt, $upload_rating);
                    while (mysqli_stmt_fetch($stmt)) {}
                    $upload_rating = number_format($upload_rating, 2, '.', '');
                }
                else {
                    $upload_rating = 0.00;
                }
            ?>
            <div name="left" style="width:70%;float:left">
            <p id="uploadId" style="visibility:hidden"><?php echo $upload_id ?></p>
            <?php echo "<h1>$upload_id : $upload_title</h1>"; ?>
            <?php echo "<h2>$upload_type</h2>"; ?>
            <?php echo "<h2>$upload_format</h2>"; ?>
            <?php echo "<h2>$upload_link</h2>"; ?>
            <?php echo "<p>$upload_info</p>"; ?>
            <?php echo "<p>$upload_date</p>"; ?>
            <?php echo "<p>$user_id</p>"; ?>
           
            <div class="restaurant-stars">
                <div class="restaurant-stars-rating" title="rating" style="display:block; width:<?php echo $upload_rating*50 ?>px; height:47px; background:url('images/colorStar.png') no-repeat;">             
                    &nbsp;
                </div>
                <center><?php echo $upload_rating." (".$votes." Votes)" ?></center>
            </div>
           
            <?php $num_of_followers = 0; ?>
           
            <!-- ***************** All Content Here **************** -->
            <div id="center">
            </div>
            </div>
            <div name="right">
                <?php
                mysqli_stmt_prepare($stmt, "SELECT rating FROM Upload_Rating WHERE upload_id = ? AND user_id = ?") or die(mysqli_error());
                $userid = 12345;//$_SESSION['user_id']);
                mysqli_stmt_bind_param($stmt,'sd', $upload_id,$userid);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $upload_rating_flag);
                $upload_rating_flag = 0;
                while (mysqli_stmt_fetch($stmt)) {}
                ?>
                <input type="range"  min="1" max="5" id="rating_select" value = "<?php if ($upload_rating_flag != 0) echo $upload_rating_flag;?>" onchange="javascript:set_rating(this.value)"/>
                <input type="button" value="Rate" onclick="javascript:update_rating()"/>
                <?php
                if ($upload_rating_flag == 0) {
                        echo "<p id='rating_display'>You have not rated this upload. </p>";
                }
                else{
                        echo "<p id=\"rating_display\">Your rating = $upload_rating_flag</p>";
                }
                ?>
            </div>
           
                       
            <!-- ***************** All Content Here **************** -->
           
           
        </div>
            <!-- footer code -->
            <?php include("footer.php"); ?>
           
            <!-- disconnect the database connection-->
            <?php include("db-disconnect.php"); ?>
    </body>
</html>
</html>
