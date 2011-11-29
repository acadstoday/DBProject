
<?php
    /* $uid = $_SESSION['uid']*/
    $uid = '7';
    $followed_id = $_GET['user_id'];

    include("db-connect.php");
    $stmt = mysqli_stmt_init($con);
    mysqli_stmt_prepare($stmt, "INSERT INTO User_Follow (user_id, followed_id) VALUES (?, ?)") or die(mysqli_error());

    mysqli_stmt_bind_param($stmt,'ii', $uid, $followed_id);
    mysqli_stmt_execute($stmt);
    include("db-disconnect.php");
    header( 'Location: user_page.php?user_id=' . $followed_id );
?>
