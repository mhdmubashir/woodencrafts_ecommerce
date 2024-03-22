<?php
session_start();

// Check if 'user_id' is set in the session
if (isset ($_SESSION['user_id'])) {
    // Retrieve the user ID from the session
    $user_id = $_SESSION['user_id'];

    // Proceed with your code that uses $user_id
} else {
    // Handle the case where 'user_id' is not set in the session
    echo "User ID not found in session!";
    // You may redirect the user to the login page or handle the error in other ways
}

// Include database connection
require_once "db_connect.php";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $quantity = $_POST["quantity"];
    $user_id = $_SESSION["user_id"]; // Assuming you store user ID in session

    // File upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Insert product into database
    $insert_query = "INSERT INTO products (name, price, description, quantity, image, user_id)
                VALUES ('$name', '$price', '$description', '$quantity', '$target_file', '$user_id')";
    $result = mysqli_query($connection, $insert_query);

    if ($result) {
        // Product added successfully
        $_SESSION["success_msg"] = "Product added successfully";
        header("Location: sell_item.php");
        exit();
    } else {
        // Error occurred while adding product
        $_SESSION["error_msg"] = "An error occurred while adding the product";
        header("Location: sell_item.php");
        exit();
    }
}

?>