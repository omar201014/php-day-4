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

    $host='localhost';
    $username = 'root';
    $password='';
    $dbname= 'users';

    $link = mysqli_connect($host, $username, $password, $dbname);

    if(!$link){
        die("Connection failed!" . mysqli_connect_error());
    }
    echo "all went good connected to database successfully ...";

    // insert data into from by mysql
    $mysql = "INSERT INTO user_info(user_name,email,gender,email_check) VALUES ('$name','$email','$gender','$check')";

    $retval = mysqli_query($link , $mysql);

    if(!$retval){
        die('Could not insert to table: ' . mysqli_error($conn));
    }else{

?>
<!DOCTYPE html>
<html lang="en">
<head>      
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <title>Users</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">  
</head>
<body>
    <div class="container mt-5">
        <header class="my-4">           
                <div>
                    <button class="btn btn-success"><a class="nav-link text-light" href="./index.html" target="_blank">Create new user</a></button>
                </div>            
        </header>
        <hr>
        <div class="row">
            <table class="table table-hover table-striped">
                <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Mail Status</th>
                </tr>
                </thead>
                <tbody>
                <?php         
                    //establishing connection parameters
                    $host ='localhost';
                    $username ='root';
                    $password ='';
                    $dbname ='users';
                
                    $con = mysqli_connect($host , $username , $password , $dbname);
                
                    if(!$con){
                        die("Connection failed!" . mysqli_connect_error());
                    }
                
                    //fetch and read data from database 
                
                    $sql = "SELECT * FROM user_info";
                
                    $result = mysqli_query($con , $sql);
                            
                    if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){               
                    echo "
                            <tr>
                                <th scope='row'>".$row['id']."</th>
                                <td>".$row['user_name']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['gender']."</td>
                                <td>".$row['email_check']."</td>
                            </tr>
                        ";
                            }
                        }
                    // close connection
                    mysqli_close($con);
                ?>                                      
                </tbody>
            </table>
        </div>
    </div>    
</body>

<?php
    }   
    // close connection
    mysqli_close($link);

?>