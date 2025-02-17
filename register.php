<?php
    // obtaining functions from the auth.php file
    require "auth.php";

    // check if form is submitted with a POST request
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // obtaining form values and storing them into variables
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        // calling register function from auth.php, collecting its return value for processing
        $status = register( email: $email, username: $username, password: $password);
        // conditional redirect
        if ($status == 200) {
            // redirecting to home page
            header("Location: /login.html");
            exit();
        } else {
            header("Location: /register.html?error=Invalid form submission. Try again.");
            exit();
        }
    }
?>