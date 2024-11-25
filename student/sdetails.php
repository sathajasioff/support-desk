<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sdetails.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Student</title>
</head>
<body>
    <div class="contain">
        <div class="navbar">
            <h1>WE SUPPORT ADMIN PAGE</h1>
            <nav>
                <ul>
                    <li><a class="active" href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#Contact">Contact</a></li>
                    <li><a href="#">Inquiry</a></li>
                </ul>
            </nav>
            <div class="icon">
                <a href="#"><i class='bx bx-user-circle'></i></a>
            </div>
    </div>
    <div class="container">
        <div class="crudBox">
            <div class="cardHeader">
                <h2>REGISTERED STUDENT DETAILS</h2>
            </div>
            <div class="addBtn">
                <button class="button-Add"><a href="../register.php">Add New</a></button>
            </div>
            <div class="cardBody">
                <table class="table">
                    <thead>
                        <tr>
                            <th>STUID</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>University</th>
                            <th>Email</th>
                            <th>Phonenum</th>
                            <th>password</th>
                            <th>Opreation</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                            require 'config.php';
                            $sql = "select * from register";
                            $result = $connection->query($sql);

                            if($result){
                                while($row = $result->fetch_assoc()){
                                    $StuID = $row['StuID'];
                                    $fname = $row['firstname'];
                                    $lname = $row['lastname'];
                                    $uni = $row['University'];  
                                    $email = $row['email'];
                                    $phonenum = $row['phonenum'];
                                    $password = $row['password'];
                                    

                                    echo '<tr>
                                    <td>'.$StuID.'</td>
                                    <td>'.$fname.'</td>
                                    <td>'.$lname.'</td>
                                    <td>'.$uni.'</td>
                                    <td>'.$email.'</td>
                                    <td>'.$phonenum.'</td>
                                    <td>'.$password.'</td>
                                    
        
                                    <td>
                                        <div class="btn">
                                            <div class="edit-btn">
                                            <button> <a href="update.php?update='.$StuID.'">Edit</a></button>
                                            </div>
                                            <div class="delete-btn">
                                            <button> <a href="delete.php?delete='.$StuID.'">Delete</a></button>
                                            </div>
                                        </div>
                            
                                    </td>
                                </tr>';
                                }
                            }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>