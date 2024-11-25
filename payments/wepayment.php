<?php

// Establish connection to MySQL database
$conn = new mysqli("localhost", "root", "", "iwt");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect user input from the form
$fullName = isset($_POST['fullName']) ? $_POST['fullName'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$zipCode = isset($_POST['zipCode']) ? $_POST['zipCode'] : '';
$nameOnCard = isset($_POST['nameOnCard']) ? $_POST['nameOnCard'] : '';
$cardNumber = isset($_POST['cardNumber']) ? $_POST['cardNumber'] : '';
$expMonth = isset($_POST['expMonth']) ? $_POST['expMonth'] : '';
$expYear = isset($_POST['expYear']) ? $_POST['expYear'] : '';
$cvv = isset($_POST['cvv']) ? $_POST['cvv'] : '';

// Prepare and execute the SQL statement to insert data into the table
$stmt = $conn->prepare("INSERT INTO payment (`fullname`, `email`, `address`, `zipCode`, `nameoncard`, `creditcardnumber`, `expmonth`, `expyear`, `cvv`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Bind parameters to the prepared statement
$stmt->bind_param("ssssssiii", $fullName, $email, $address, $zipCode, $nameOnCard, $cardNumber, $expMonth, $expYear, $cvv);

// Execute the prepared statement
$execval = $stmt->execute();

// Check if execution was successful
if ($execval) {
    // Redirect to a page after successful registration using JavaScript
    echo "<script type='text/javascript'> alert('Successfully Registered'); window.location.href = '../home.php'; </script>";
    exit(); // Make sure to exit after redirection
} else {
    echo "Error during registration: " . $stmt->error;
}

// Close the prepared statement and the database connection
$stmt->close();
$conn->close();

?>
