<?php
    include('./db.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM user_info WHERE id='$id'";
    $retval = mysqli_query($conn ,$sql);
    if(!$retval){
        die('Could not delete from table: ' . mysqli_error($conn));
    }
    mysqli_close($conn);
    header("location: view.php");
?>