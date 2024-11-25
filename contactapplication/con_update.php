<?php 
    require 'con_config.php';

    // Check if 'update' parameter is set in the URL
    if(isset($_GET['update'])) {
        $contactID = $_GET['update'];

        // Fetch student information from the database
        $sql = "SELECT * FROM contact WHERE contactid = $contactID";
        $result = $connection->query($sql);

        if ($result && $result->num_rows > 0) {
            // Fetch the first row
            $row = $result->fetch_assoc();

            // Assign values to variables
            $name = $row['name'];  
            $email = $row['email'];
            $subject = $row['subject'];
            $message = $row['message'];
        }
        else {
            // Handle if no record found
            echo "No record found with ID: $contactID";
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
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message= $_POST['message']; // Changed from 'password'

        // Update the record in the database
        $sql = "UPDATE contact SET name='$name', email='$email', subject='$subject', message='$message' WHERE contactid =$contactID";
        $result = $connection->query($sql);

        if($result) {
            // Redirect to CRUD page after successful update
            header("Location: contactApp.php");
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
        <h1>EDIT CONTACTS</h1>
        <form method="post" action="con_update.php?update=<?php echo $contactID; ?>">
            <!-- Fixed 'name' attributes of input fields -->
            <label>Name</label><br>
            <input type="text" required class="formdec" id="firstname" name="name" value="<?php echo $name; ?>"><br>
            <label>Email</label><br>
            <input type="text" required class="formdec" id="email" name="email" value="<?php echo $email; ?>"><br>
            <label>Subject</label><br>
            <input type="text" required maxlength="10" class="formdec" id="subject" name="subject" value="<?php echo $subject; ?>"><br>
            <label>Message</label><br>
            <input type="text" class="formdec" id="message" name="message" value="<?php echo $message; ?>"><br>
            <button type="submit" id="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>
