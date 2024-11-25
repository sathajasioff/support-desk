<?php 
    require 'conn.php';

    // Initialize variables
    $Fullname = $Email = $Address = $Zipcode = $Nameoncard = $Creditcardnumber = $Expmonth = $Expyear = $CVV = '';

    // Check if 'update' parameter is set in the URL
    if(isset($_GET['update'])) {
        $paymentid = $_GET['update'];

        // Fetch payment information from the database
        $sql = "SELECT * FROM payment WHERE paymentid = $paymentid";
        $result = $connection->query($sql);

        if ($result && $result->num_rows > 0) {
            // Fetch the first row
            $row = $result->fetch_assoc();

            // Assign values to variables
            $Fullname = $row['fullname'];
            $Email = $row['email'];
            $Address = $row['address'];
            $Zipcode = $row['zipCode'];  
            $Nameoncard = $row['nameoncard'];
            $Creditcardnumber = $row['creditcardnumber'];
            $Expmonth = $row['expmonth'];
            $Expyear = $row['expyear'];
            $CVV = $row['cvv'];
        }
        else {
            // Handle if no record found
            echo "No record found with ID: $paymentid";
            exit;
        }
    }
    else {
        // Handle if 'update' parameter is not set
        echo "No Payment ID provided for update";
        exit;
    }

    // Check if the form is submitted
    if(isset($_POST['submit'])) {  
        // Retrieve form data
        $Fullname= $_POST['fullname'];
        $Email = $_POST['email'];
        $Address = $_POST['address'];  
        $Zipcode = $_POST['zipCode']; 
        $Nameoncard = $_POST['nameoncard'];
        $Creditcardnumber = $_POST['creditcardnumber'];
        $Expmonth = $_POST['expmonth'];
        $Expyear = $_POST['expyear'];
        $CVV = $_POST['cvv']; 

        // Update the record in the database
        $sql = "UPDATE payment SET fullname='$Fullname', email='$Email', address='$Address', zipCode='$Zipcode', nameoncard='$Nameoncard', creditcardnumber='$Creditcardnumber', expmonth='$Expmonth', expyear='$Expyear', cvv='$CVV' WHERE paymentid=$paymentid";
        $result = $connection->query($sql);

        if($result) {
            header("Location: paydetails.php");
            exit;
        }
        else {
            echo "Error: " . $connection->error;
        }
    }

    // Close the database connection
    $connection->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
    <style>
         body 
        {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container
        {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label
        {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .box
        {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        #button
        {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover 
        {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
    <form method="post" action="payedit.php?update=<?php echo $paymentid; ?>">
            <!-- Fixed 'name' attributes of input fields -->
            <h1>EDIT DETAILS</h1>
                    <label for="fullname"></label>
                    <input class="box" type="text" name="fullname" placeholder="Full name" value="<?php echo $Fullname; ?>"> <br>
                    <label for="email"></label>
                    <input class="box" type="text" name="email" placeholder="Email" value="<?php echo $Email; ?>"> <br>
                    <label for="address"></label>
                    <input type="text" class="box" name="address" placeholder="Address" value="<?php echo $Address; ?>"> <br>
                    <label for="zipcode"></label>
                    <input class="box" type="text" name="zipcode" placeholder="Zipcode" value="<?php echo $Zipcode; ?>"> <br> 
                    <label for="nameoncard"></label>
                    <input class="box" type="text" name="nameoncard" placeholder="Nameoncard" value="<?php echo $Nameoncard; ?>"> <br> 
                    <label for="creditcardnumber"></label>
                    <input class="box" type="text" name="creditcardnumber" placeholder="Creditcardnumber" value="<?php echo $Creditcardnumber; ?>">
                    <label for="expmonth"></label>
                    <input class="box" type="text" name="expmonth" placeholder="expmonth" value="<?php echo $Expmonth; ?>"> <br> 
                    <label for="expyear"></label>
                    <input class="box" type="text" name="expyear" placeholder="expyear" value="<?php echo $Expyear; ?>"> <br> 
                    <label for="cvv"></label>
                    <input class="box" type="text" name="cvv" placeholder="cvv" value="<?php echo $CVV; ?>"> <br> 
                       
            <button type="submit" id="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>
