<?php
    include('./db.php');
    $name = $_POST['userName'];
    $email = $_POST['email'];
    $id = $_POST['id'];

    $sql = "UPDATE user_info SET user_name='$name',email='$email' WHERE id='$id'";

    $retval = mysqli_query($conn , $sql);
    if(!$retval){
        die('error occured cannot update: ' . mysqli_error($conn));
    }

    mysqli_close($conn);

    header("location: view.php");

    


?>