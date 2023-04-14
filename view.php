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
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php         
                    //establishing connection parameters
                    include('./db.php');
                
                    if(!$conn){
                        die("Connection failed!" . mysqli_connect_error());
                    }
                
                    //fetch and read data from database 
                
                    $sql = "SELECT * FROM user_info";
                
                    $result = mysqli_query($conn , $sql);
                            
                    if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                              if($row['id']==$_GET['id']){
                                echo "<tr><form action='./update.php' method='POST'>";
                                    echo "<td></td>";
                                    echo "<td><input type='text' class='form-control' name='userName' value='".$row['user_name']."'</td>";
                                    echo "<td><input type='email' class='form-control' name='email' value='".$row['email']."'</td>";
                                    echo "<td></td>";
                                    echo "<td><button type='submit' class='btn btn-primary'>save</button></td>";
                                    echo "<td><input type='hidden' name='id' value='".$row['id']."'</td>";
                                echo "</form></tr>";
                              }else{                 
                                    echo "
                                            <tr>
                                                <th scope='row'>".$row['id']."</th>
                                                <td>".$row['user_name']."</td>
                                                <td>".$row['email']."</td>
                                                <td>".$row['gender']."</td>
                                                <td>".$row['email_check']."</td>
                                                <td><a class='btn btn-primary' href='view.php?id=".$row['id']."' role='button'>Update</a>
                                                <a class='btn btn-danger' href='delete.php?id=".$row['id']."' role='button'>Delete</a></td>
                                            </tr>
                                        ";
                                            }
                                        }
                        }
                    // close connection
                    mysqli_close($conn);
                ?>                                      
                </tbody>
            </table>
        </div>
    </div>    
</body>