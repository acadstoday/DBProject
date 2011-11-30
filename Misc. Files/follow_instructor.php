
<?php
    /* $uid = $_SESSION['uid']*/
    $uid = '7';
    $inst_id = $_GET['inst_id'];

    include("db-connect.php");
    $stmt = mysqli_stmt_init($con);
    mysqli_stmt_prepare($stmt, "INSERT INTO Instr_Follow (user_id, inst_id) VALUES (?, ?)") or die(mysqli_error());

    mysqli_stmt_bind_param($stmt,'si', $uid, $inst_id);
    mysqli_stmt_execute($stmt);
    include("db-disconnect.php");
    header( 'Location: instructor_page.php?inst_id=' . $inst_id );
?>