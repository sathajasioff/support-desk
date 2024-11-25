<?php 
require 'Clerinconfig.php';

// Check if 'update' parameter is set in the URL
if(isset($_GET['update'])) {
    $inquiryid = $_GET['update'];

    // Fetch inquiry information from the database
    $sql = "SELECT * FROM inquiry WHERE inquiryid = $inquiryid";
    $result = $connection->query($sql);

    if ($result && $result->num_rows > 0) {
        // Fetch the first row
        $row = $result->fetch_assoc();

        // Assign values to variables
        $email = $row['email'];
        $types = $row['types'];
        $inquiry = $row['inquiry'];  
        $support = $row['support'];
      
    }
    else {
        // Handle if no record found
        echo "No record found with ID: $inquiryid";
        exit;
    }
}
else {
    // Handle if 'update' parameter is not set
    echo "No Inquiry ID provided for update";
    exit;
}

// Check if the form is submitted
if(isset($_POST['submit'])) {  
    // Retrieve form data
    $email = $_POST['email'];
    $types = $_POST['category'];  
    $inquiry = $_POST['message1'];
    $support = $_POST['message2'];

    // Update the record in the database
    $sql = "UPDATE inquiry SET email='$email', types='$types', inquiry='$inquiry', support='$support'  WHERE inquiryid=$inquiryid";
    $result = $connection->query($sql);

    if($result) {
        // Redirect to CRUD page after successful update
        header("Location: ClerinCrudApp.php");
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
            background-image:url("jk.gif");
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

        #button:hover 
        {
            color:red;
            cursor: pointer;
        }
        
        textarea
        {
            resize: none; /* Disable resizing by the user */
            overflow-y: hidden; /* Hide scrollbar */
        }

    </style>
</head>
<body>
    <div class="container">
        <form method="post" action="ClerinUpdate.php?update=<?php echo $inquiryid; ?>">
            <!-- Fixed 'name' attributes of input fields -->
            <label>Enter your E-mail </label><br>
            <input type="email" required class="formdec" id="email" name="email" value="<?php echo $email; ?>"><br>
            <label>What kind of inquiry do you have?</label><br><br>
            <select id="category" name="category" required>
                <option value="" disabled>Select an option</option>
                <option value="general" <?php if($types == 'general') echo 'selected'; ?>>General Inquiry</option>
                <option value="feedback" <?php if($types == 'feedback') echo 'selected'; ?>>Feedback</option>
                <option value="support" <?php if($types == 'support') echo 'selected'; ?>>Support</option>
                <option value="other" <?php if($types == 'other') echo 'selected'; ?>>Other</option>
            </select><br><br>
            <label>What's your inquiry?</label><br>
            <textarea required class="formdec" id="message1" rows="4" placeholder="Type your message..." name="message1"><?php echo $inquiry; ?></textarea><br>
            <label>How can we help?</label><br>
            <textarea required class="formdec" id="message2" rows="4" placeholder="Type your message..." name="message2"><?php echo $support; ?></textarea><br>
            <br>
            <button type="submit" id="button" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>
