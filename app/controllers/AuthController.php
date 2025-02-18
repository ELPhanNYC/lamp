<?php
require_once dirname(__DIR__) . '/models/User.php';
require_once __DIR__ . '/../../core/Session.php'; // Load session management

class AuthController {
    
    public static function login($email, $password) {
        $user = User::findByEmail($email);
        
        if (!$user) {
            return "User not found.";
        }

        if (!password_verify($password, $user['password'])) {
            return "Invalid password.";
        }

        // Start session and store user info
        Session::start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];

        return "Login successful!";
    }

    public static function register($username, $email, $password) {
        if (User::findByEmail($email)) {
            return "Email already exists.";
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $success = User::create($username, $email, $hashedPassword);

        return $success ? "Registration successful!" : "Registration failed.";
    }
}
?>
