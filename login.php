<?php
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["user_username"];
    $password = $_POST["user_password"];

    // Validate user credentials (adjust as needed)
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Login successful, redirect to dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }
}

$conn->close();

