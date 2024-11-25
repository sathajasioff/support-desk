<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pay details</title>
    <link rel="stylesheet" href="crudAppStyle.css">
</head>
<body>
    <div class="container">
        <div class="crudBox">
            <div class="cardHeader">
                <h2>Payment Details</h2>
            </div>
            <div class="addBtn">
                <button class="button-Add"><a href="wspaymentshtml.php">Add New Payment</a></button>
            </div>
            <div class="cardBody">
                <table class="table">
                    <thead>
                        <tr>
                            <th>PayID</th>
                            <th>fullname</th>
                            <th>email</th>
                            <th>address</th>
                            <th>zipcode</th>
                            <th>nameoncard</th>
                            <th>creditcardnumber</th>
                            <th>expmonth</th>
                            <th>expyear</th>
                            <th>cvv</th>
                            <th>Actions</th>
                         </tr>
                    </thead>
                    <tbody>

                        <?php 
                            require 'conn.php';
                            $sql = "select * from payment";
                            $result = $connection->query($sql);

                            if($result){
                                while($row = $result->fetch_assoc()){
                                    $paymentid = $row['paymentid'];
                                    $Fullname = $row['fullname'];
                                    $Email= $row['email'];
                                    $Address = $row['address'];
                                    $Zipcode = $row['zipCode'];  
                                    $Nameoncard = $row['nameoncard'];
                                    $Creditcardnumber = $row['creditcardnumber'];
                                    $Expmonth = $row['expmonth'];
                                    $Expyear = $row['expyear'];
                                    $CVV = $row['cvv'];
                                
                                    

                                    echo '<tr>
                                    <td>'.$paymentid.'</td>
                                    <td>'.$Fullname.'</td>
                                    <td>'.$Email.'</td>
                                    <td>'.$Address.'</td>
                                    <td>'.$Zipcode.'</td>
                                    <td>'.$Nameoncard.'</td>
                                    <td>'.$Creditcardnumber.'</td>
                                    <td>'.$Expmonth.'</td>
                                    <td>'.$Expyear.'</td>
                                    <td>'.$CVV.'</td>
                        
                                    
        
                                    <td>
                                        <div class="btn">
                                            <div class="edit-btn">
                                            <button> <a href="payedit.php?update='.$paymentid.'">Edit</a></button>
                                            </div>
                                            <div class="delete-btn">
                                            <button> <a href="delete.php?delete='.$paymentid.'">Delete</a></button>
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

