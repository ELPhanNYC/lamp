<?php
require_once __DIR__ . '/../app/controllers/AuthController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $message = AuthController::login($email, $password);
    echo $message;
    header("Location: ../public/index.php");
    exit();
}
?>
