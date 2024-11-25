<?php 
    require 'config.php';

    // Check if 'update' parameter is set in the URL
    if(isset($_GET['update'])) {
        $StuID = $_GET['update'];

        // Fetch student information from the database
        $sql = "SELECT * FROM register WHERE StuID = $StuID";
        $result = $connection->query($sql);

        if ($result && $result->num_rows > 0) {
            // Fetch the first row
            $row = $result->fetch_assoc();

            // Assign values to variables
            $fname = $row['firstname'];
            $lname = $row['lastname'];
            $uni = $row['University'];  
            $email = $row['email'];
            $phonenum = $row['phonenum'];
            $password = $row['password'];
        }
        else {
            // Handle if no record found
            echo "No record found with ID: $StuID";
            exit;
        }
    }
    else {
        // Handle if 'update' parameter is not set
        echo "No student ID provided for update";
        exit;
    }

    // Check if the form is submitted
    if(isset($_POST['submit'])) {  
        // Retrieve form data
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $uni = $_POST['uni'];  
        $email = $_POST['email'];
        $phonenum = $_POST['phonenum'];
        $password = $_POST['pwd']; // Changed from 'password'

        // Update the record in the database
        $sql = "UPDATE register SET firstname='$fname', lastname='$lname', University='$uni', email='$email', phonenum='$phonenum', password='$password' WHERE StuID=$StuID";
        $result = $connection->query($sql);

        if($result) {
            // Redirect to CRUD page after successful update
            header("Location: sdetails.php");
            exit;
        }
        else {
            echo "Error: " . $connection->error;
        }
    }

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

        .formdec
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
        <form method="post" action="update.php?update=<?php echo $StuID; ?>">
            <!-- Fixed 'name' attributes of input fields -->
            <label>First Name</label><br>
            <input type="text" required class="formdec" id="firstname" name="fname" value="<?php echo $fname; ?>"><br>
            <label>Last Name</label><br>
            <input type="text" required class="formdec" id="lastname" name="lname" value="<?php echo $lname; ?>"><br>
            <label>University</label><br>
            <input type="text" required class="formdec" id="uni" name="uni" value="<?php echo $uni; ?>"><br>
            <label>Email</label><br>
            <input type="text" required class="formdec" id="email" name="email" value="<?php echo $email; ?>"><br>
            <label>Contact Number</label><br>
            <input type="tel" required maxlength="10" class="formdec" id="phonenum" name="phonenum" value="<?php echo $phonenum; ?>"><br>
            <label>Password</label><br>
            <input type="password" class="formdec" id="pwd" name="pwd" value="<?php echo $password; ?>"><br>
            <button type="submit" id="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>
