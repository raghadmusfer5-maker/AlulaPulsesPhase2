<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// CHECK IF EMAIL EXISTS FIRST
$check = $conn->query("SELECT * FROM user WHERE Email='$email'");

if ($check->num_rows > 0) {
    $_SESSION['emailErr'] = "Email already exists. Try logging in.";
    $_SESSION['old_email'] = $email;
    $_SESSION['old_name'] = $name;

    // 🔥 IMPORTANT: go back to your form page
    header("Location: ../index.php"); // or your signup page
    exit();
}

// INSERT IF NOT EXISTS
$sql = "INSERT INTO user (Name, Email, Password, UserType)
VALUES ('$name','$email','$password','tourist')";

if ($conn->query($sql)) {
    header("Location: ../Tourist.php");
    exit();
} else {
    echo "Error: " . $conn->error;
}
?>