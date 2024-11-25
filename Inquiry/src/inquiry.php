<?php
    session_start();
    include("connect.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $id = $_POST['id'];
        $category = $_POST['category'];
        $message1 = $_POST['message1'];
        $message2= $_POST['message2'];
        
        
    // Assuming $con is your database connection object
    if(!empty($id) && !empty($category) && !empty($message1) && !empty($category))
    {
       
        
        // Assuming $con is your database connection object
        $query = "INSERT INTO inquiry (email,types,inquiry,support) VALUES ('$id', '$category', '$message1', '$message2')";
        
        
        if(mysqli_query($conn, $query)) {
            echo "<script type='text/javascript'> alert('Successfully Submitted')</script>";
        } else {
            echo "<script type='text/javascript'> alert('Error: " . mysqli_error($con) . "')</script>";
        }
    }
    else {
        echo "<script type='text/javascript'> alert('Please enter valid information')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiry</title>
    <link rel="stylesheet" href="css/inquiry.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="js/inquiryscript.js"></script>
    <style>
        .content{
            background-image: url('../Images/bgn3.gif');
            background-size:cover;
             background-repeat: no-repeat;
             background-image: linear-gradient(rgba(126, 112, 112, 0.7));
            background-position: center;
        
        }    
        .navbar{
            background-color: rgba(0, 0, 0, 0.199);
        }
    </style>
</head>
<body>
    <div class="content">
        
        <div class="navbar">
            <h1>WE SUPPORT</h1>
            <nav>
                <ul>
                <li><a href="../../../Final/home.php">Home</a></li>
                <li><a href="../../../Final/home.php">About</a></li>
                <li><a href="../../../Final/contact.php">Contact</a></li>
                <li><a href="#">Inquiry</a></li>
                </ul>
            </nav>
            <div class="btn">
                
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Inquiry Form</h1>
                

                    <button class="exiting" type="submit"  ><a target="_self" href="ClerinCrudApp.php"><img src="../Images/form-svgrepo-com.svg" id="svg">    View existing inquiry</a></button>
            </div>
            <div class="formreg">
                <h1>Enter your inquiry</h1>
                <hr>
                <form class="reg" action="#" method="POST" name="formfill" onsubmit="return validation()">
                    <div class="txt">
                        <br>
                        <label for="id" >Enter your E-mail </label>
                        <input class="inputbox" type="email" name="id" id="sId" required> <br><br>
                        <label for="type">What kind of inquiry do you have?</label><br><br>
                        <select id="category" name="category" required>
                            <option value="" disabled selected>Select an option</option>
                            <option value="general">General Inquiry</option>
                            <option value="feedback">Feedback</option>
                            <option value="support">Support</option>
                            <option value="other">Other</option>
                        </select><br><br><p id="result1"></p><br>
                        <label for="message1">What's your inquiry?</label><br>
                        <textarea id="message" name="message1" rows="4" placeholder="Type your message..."></textarea> <br> 
                        <p id="result2"></p> <br>
                        <label for="message2">How can we help?</label> <br>
                        <textarea id="help" name="message2" rows="4" placeholder="Type your message..."></textarea> <br> <br>
                        
                    </div>
                    <button class="submit" type="submit" name="submit" >Submit</button>
                
                    
                    
                    
                </form>
        </div>
        
    </div>
</body>
</html>
