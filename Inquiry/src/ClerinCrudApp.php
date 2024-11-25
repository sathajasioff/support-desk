<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiry</title>
    <link rel="stylesheet" href="crudAppStyleClerin.css">
    <style>
    body{
    background-image: url('white.gif');
}
</style>
</head>
<body id="body">
    <div class="container">
        <div class="crudBox">
            <div class="cardHeader">
                <h1 id="h1">Inquiry Details</h1>
            </div>
            <div class="addBtn">
                <button class="button-Add"><a href="inquiry.php">Add New</a></button>
            </div>
            <div class="cardBody">
                <table class="table">
                    <thead>
                        <tr>
                            <th>InquityID</th>
                            <th>Email</th>
                            <th>Types</th>
                            <th>Inquiry</th>
                            <th>Support</th>
                            <th>Options</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                            require 'Clerinconfig.php';
                            $sql = "select * from inquiry";
                            $result = $connection->query($sql);

                            if($result){
                                while($row = $result->fetch_assoc()){
                                    $inquiryid = $row['inquiryid'];
                                    $email = $row['email'];
                                    $types = $row['types'];
                                    $inquiry = $row['inquiry'];  
                                    $support = $row['support'];
                                    

                                    echo '<tr>
                                    <td>'.$inquiryid.'</td>
                                    <td>'.$email.'</td>
                                    <td>'.$types.'</td>
                                    <td>'.$inquiry.'</td>
                                    <td>'.$support.'</td>
                                    
        
                                    <td>
                                        <div class="btn">
                                            <div class="edit-btn">
                                            <button> <a href="ClerinUpdate.php?update='.$inquiryid.'">Edit</a></button>
                                            </div>
                                            <div class="delete-btn">
                                            <button> <a href="ClerinDelete.php?delete='.$inquiryid.'">Delete</a></button>
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

