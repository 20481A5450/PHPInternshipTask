<?php
$mysqli = new mysqli("localhost", "root", "", "fullstack");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if the users table exists, if not, create it
$createTableQuery = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL
)";

if ($mysqli->query($createTableQuery) === FALSE) {
    echo "Error creating table: " . $mysqli->error;
    exit;
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$address = $_POST['address'];
$phone = $_POST['phone'];

// Regular expression pattern for a valid email address
$emailPattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";

// Regular expression pattern for a strong password (at least 8 characters, including at least one uppercase letter, one lowercase letter, one digit, and one special character)
$passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

// Validate email using the regular expression
if (!preg_match($emailPattern, $email)) {
    echo "Invalid email format";
} else {
    // Validate password using the regular expression
    if (!preg_match($passwordPattern, $_POST['password'])) {
        echo "Invalid password format";
    } else {
        $query = "INSERT INTO users (name, email, password, address, phone) VALUES ('$name', '$email', '$password', '$address', '$phone')";
    
        if ($mysqli->query($query) === TRUE) {
            // Redirect to the login page after successful registration
            header("Location: login.html");
            exit;
        } else {
            echo "Error: " . $query . "<br>" . $mysqli->error;
        }
    }
}

$mysqli->close();
?>

