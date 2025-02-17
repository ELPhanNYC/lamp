<?php
    // require db.php to ensure DB connection for auth
    include "db.php";
    $conn = getdb();
    // create functions for each auth task
    // Code: 200 = Success, 400 = Failure
    function login(string $email, string $password){
        global $conn;
        $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            if ($row && password_verify($password, $row['password'])) {
                echo "Login successful!";
            } else {
                echo "Invalid email or password.";
            }
            return 200;
        } else {
            echo "Error: " . $stmt->error;
            $stmt->close();
            return 400;
        }
    }
    function logout(){
        return null;
    }
    function register(string $email, string $username, string $password){
        global $conn;
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("sss", $username, $email, $hashed);
        if ($stmt->execute()) {
            echo "User registered successfully!";
            $stmt->close();
            return 200;
        } else {
            echo "Error: " . $stmt->error;
            $stmt->close();
            return 400;
        }
    }
?>