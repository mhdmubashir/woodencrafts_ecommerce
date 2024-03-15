<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    require_once "db_connect.php";

    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the user exists in the database
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
        // User found, set session variable and redirect to home page
        $_SESSION["email"] = $email;
        header("Location: index.php");
        exit();
    } else {
        // Invalid credentials, redirect back to login page with error message
        header("Location: login.html?error=invalid_credentials");
        exit();
    }
}
?>