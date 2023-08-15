<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "fullstack");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

// Regular expression pattern for a valid email address
$emailPattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";

// Regular expression pattern for a strong password (at least 8 characters, including at least one uppercase letter, one lowercase letter, one digit, and one special character)
$passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

// Validate password using the regular expression
if (!preg_match($passwordPattern, $password)) {
    echo "Invalid password format";
} else {
    // Validate email using the regular expression
    if (!preg_match($emailPattern, $email)) {
        echo "Invalid email format";
    } else {
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = $mysqli->query($query);

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                echo "Login successful";
            } else {
                echo "Incorrect password";
            }
        } else {
            echo "User not found";
        }
    }
}

$mysqli->close();
?>