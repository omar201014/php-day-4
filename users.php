<?php
    if(isset($_POST['submit'])){
        $name = $_POST['userName'];
        $email = $_POST['userMail'];
        $gender = $_POST['gender'];
        if(empty($_POST['emailCheck'])){
            $check = "no";
        }else{
            $check = $_POST['emailCheck'];
        }
    }

    // database linking

    include('./db.php');

    if(!$conn){
        die("Connection failed!" . mysqli_connect_error());
    }
    echo "all went good connected to database successfully ...";

    // insert data into from by mysql
    $mysql = "INSERT INTO user_info(user_name,email,gender,email_check) VALUES ('$name','$email','$gender','$check')";

    $retval = mysqli_query($conn , $mysql);

    if(!$retval){
        die('Could not insert to table: ' . mysqli_error($conn));
    }
            
    // close connection
    mysqli_close($conn);

    // navigate to view 
    header("location: view.php");

?>