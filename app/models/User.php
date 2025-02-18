<?php
require_once __DIR__ . '/../../config/db.php';
$conn = getdb();

class User {
    public static function findByEmail($email) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public static function create($username, $email, $hashedPassword) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username,$email, $hashedPassword);
        $success = $stmt->execute();

        if (!$success) {
            die("Error inserting user: " . $stmt->error);
        }

        return $success;
    }
}
?>
