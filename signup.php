<?php
session_start();
// Include database connection
require_once "db_connect.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validate password
    if ($password != $confirm_password) {
        // Passwords don't match, redirect back to signup page with error message
        header("Location: signup.html?error=password_mismatch");
        exit();
    }

    // Insert new user into the database
    $query = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
    if (mysqli_query($connection, $query)) {
        // User successfully registered, redirect to login page
        header("Location: login.html");
        exit();
    } else {
        // Error inserting user into the database, redirect back to signup page with error message
        header("Location: signup.html?error=database_error");
        exit();
    }
}
?>