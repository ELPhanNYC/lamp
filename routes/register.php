<?php
require_once __DIR__ . '/../app/controllers/AuthController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $message = AuthController::register($username, $email, $password);
    if ($message === "Registration successful!") {
        header("Location: ../public/login.html");
        exit();
    } else {
        echo $message;
    }
}
?>
