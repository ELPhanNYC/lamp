<?php
require_once __DIR__ . '/../app/controllers/AuthController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'login') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $message = AuthController::login($email, $password);
    echo $message;
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'register') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $message = AuthController::register($username, $email, $password);
    if ($message === "Registration successful!") {
        header("Location: login.html");
        exit();
    } else {
        echo $message;
    }
}

?>
