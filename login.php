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
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // Verify password
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variable and redirect to home page
            $_SESSION["email"] = $email;
            header("Location: index.php");
            exit();
        } else {
            // Invalid password, redirect back to login page with error message
            header("Location: login.html?error=invalid_password");
            exit();
        }
    } else {
        // User not found, redirect back to login page with error message
        header("Location: login.html?error=user_not_found");
        exit();
    }
}
?>