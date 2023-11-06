<?php
// Database connection details
$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$username = $_POST['uname'];
$password = $_POST['password'];
$email = $_POST['email'];

// Create a connection to the database
$conn = new mysqli('localhost', 'root', '', 'signuptest');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Hash the password

// Prepare and execute an SQL query to insert user data into a table
$sql = "INSERT INTO user_test (firstName, lastName, username, pass, email) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $firstName, $lastName, $username, $password, $email);

if ($stmt->execute()) {
    echo '<!DOCTYPE html>
        <html>
        <head>
          <title>Registration Successful</title>
          <link rel="stylesheet" href="signup.css">
        </head>
        <body>
        <div class="wrapper">
          <div class="navbar">
            <div class="icon">
              <h2 class="logo1">Org-anizer</h2>
            </div>
            <div class="menu">
              <ul>
                <li><a href="#">ABOUT</a></li>
                <li><a href="#">SERVICE</a></li>
                <li><a href="#">CONTACT</a></li>
              </ul>
            </div>
          </div>
        </div>  
          <div class="container">
            <div class="orglogo">
              <img src="system.png" alt="system">
            </div>
            <h2>User Registered Successfully!</h2>
            <div class="form-group">
              <a href="index.html">Back to Login Page</a>
            </div>
          </div>
          <div class="footer">
            <p>Follow us on:</p>
            <nav>
              <div class="logo2">
                <img src="bxl-facebook-circle.png" alt="Facebook">
                <img src="bxl-twitter.png" alt="Twitter">
                <img src="bxl-instagram.png" alt="Instagram">
              </div>
            </nav>
            <p>&copy; 2023 Org-anizer. All rights reserved.</p>
          </div>
        </body>
        </html>';
} else {
    echo '<!DOCTYPE html>
        <html>
        <head>
          <title>Registration Successful</title>
          <link rel="stylesheet" href="signup.css">
        </head>
        <body>
        <div class="wrapper">
          <div class="navbar">
            <div class="icon">
              <h2 class="logo1">Org-anizer</h2>
            </div>
            <div class="menu">
              <ul>
                <li><a href="#">ABOUT</a></li>
                <li><a href="#">SERVICE</a></li>
                <li><a href="#">CONTACT</a></li>
              </ul>
            </div>
          </div>
        </div>  
          <div class="container">
            <div class="orglogo">
              <img src="system.png" alt="system">
            </div>
            <h2>User Registered Failed!</h2>
            <div class="form-group">
              <a href="index.html">Back to Login Page</a>
            </div>
          </div>
          <div class="footer">
            <p>Follow us on:</p>
            <nav>
              <div class="logo2">
                <img src="bxl-facebook-circle.png" alt="Facebook">
                <img src="bxl-twitter.png" alt="Twitter">
                <img src="bxl-instagram.png" alt="Instagram">
              </div>
            </nav>
            <p>&copy; 2023 Org-anizer. All rights reserved.</p>
          </div>
        </body>
        </html>';
    exit();
}

$conn->close();
?>
