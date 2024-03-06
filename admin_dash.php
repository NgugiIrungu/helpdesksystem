<?php
// Include your database connection file
include 'db_connection.php';

// Start a session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to the login page if not logged in
    header('Location: admin_login.php');
    exit;
}

// Fetch data from the database or perform other backend tasks as needed

// Fetch user information
$users = [];
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

// Fetch issue information
$issues = [];
$query = "SELECT * FROM issues";
$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $issues[] = $row;
    }
}

// Fetch program information
$program_info = [];
$query = "SELECT * FROM program_info";
$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $program_info = mysqli_fetch_assoc($result);
}

// Close the database connection
mysqli_close($conn);
?>