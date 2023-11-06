<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'signuptest');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['uname']);
    $password = validate($_POST['password']);

    $sql = "SELECT * FROM user_test WHERE username = '$username' AND pass = '$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if($row['username'] === $username && $row['password'] === $pass){
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            header("Location: dashboard.html");
            exit();
    }
    else{
       header("Location: index.html?error=Incorrect Password");
    }
}
else{
    header("Location: index.html?error=Username does not exist");
}
}

$conn->close();
?>