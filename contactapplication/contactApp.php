<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact APP</title>
    <link rel="stylesheet" href="crudAppStyle.css">
</head>
<body>
    <div class="container">
        <div class="crudBox">
            <div class="cardHeader">
                <h2>Messages</h2>
            </div>
            <div class="addBtn">
                <button class="button-Add"><a href="../contact.php">Add New</a></button>
            </div>
            <div class="cardBody">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ContactID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            require 'con_config.php';
                            $sql = "select * from contact";
                            $result = $connection->query($sql);

                            if($result){
                                while($row = $result->fetch_assoc()){
                                    $contactID = $row['contactid'];
                                    $name = $row['name'];  
                                    $email = $row['email'];
                                    $subject = $row['subject'];
                                    $message = $row['message'];
                                    
                                    echo '<tr>
                                    <td>'.$contactID.'</td>
                                    <td>'.$name.'</td>
                                    <td>'.$email.'</td>
                                    <td>'.$subject.'</td>
                                    <td>'.$message.'</td>
                                    <td>
                                        <div class="btn">
                                            <div class="edit-btn">
                                                <button> <a href="con_update.php?update='.$contactID.'">Edit</a></button>
                                            </div>
                                            <div class="delete-btn">
                                                <button> <a href="con_del.php?delete='.$contactID.'">Delete</a></button>
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


