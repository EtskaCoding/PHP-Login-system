<?php

session_start();
$dbhost = "";//YOUR DB HOST HERE
$dbusername = "";//YOUR DB USERNAME HERE
$dbpassword = "";//DB PASSWORD HERE
$dbport = 3306;//DB PORT HERE
$dbname = "";//YOUR DB NAME HERE

$conn = new mysqli($dbhost, $dbusername, $dbpassword, $dbname, $dbport);
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
}

function register() {
    global $conn;
    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = mysqli_escape_string($conn, $_POST['password']);
    $password2 = mysqli_escape_string($conn, $_POST['password2']);
    if ($password = !$password2) {
        $_SESSION['error'] = "Password is not same!";
    } else {
        $password = md5($password);
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
        mysqli_query($conn, $sql);
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header("Location: index.php");
    }
}

function login() {
    global $conn;
    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = mysqli_escape_string($conn, $_POST['password']);
    $password = md5($password);
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header("Location: index.php");
    } else {
        $_SESSION['error'] = "Password or email doen't match database!";
    }
}
