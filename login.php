<?php
    // obtain necessary functions from the auth.php file
    require "../Models/auth.php";

    // check if form is submitted with a POST request
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // obtaining form values and storing them into variables
        $email = $_POST['email'];
        $password = $_POST['password'];
        // calling login function from auth.php, collecting its return value for processing
        $status = login($email, $password);
        // redirect to home page
        if ($status == 200) {
            // redirecting to home page
            header("Location: /index.php");
            exit();
        } else {
            header("Location: /login.html?error=Invalid username or password. Try again.");
            exit();
        }
    }
?>