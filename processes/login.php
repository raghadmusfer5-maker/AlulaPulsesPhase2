<?php 
session_start();
include "db.php";

$name = $_POST['name'];
$password = $_POST['password'];

$result = $conn->query("SELECT * FROM user WHERE Name='$name'");

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['Password'])) {

        $_SESSION['user'] = $user;

        if ($user['UserType'] == 'Manager') {
            header("Location: ../manager.php");
        } else {
            header("Location: ../Tourist.php");
        }

    } else {
        header("Location: ../index.php?error=wrong_password");
        exit();
    }

} else {
    header("Location: ../index.php?error=user_not_found");
    exit();
}
?>