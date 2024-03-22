<?php
session_start();

// Check if user is logged in
if (!isset ($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Include database connection
require_once "db_connect.php";

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Retrieve products added by the current user
$query = "SELECT * FROM products WHERE seller_id = $user_id";
$result = mysqli_query($connection, $query);

// Check if products are found
if (mysqli_num_rows($result) > 0) {
    // Display products
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="product">';
        echo '<h2>' . $row['name'] . '</h2>';
        echo '<p>Description: ' . $row['description'] . '</p>';
        echo '<p>Price: $' . $row['price'] . '</p>';
        echo '<p>Quantity: ' . $row['quantity'] . '</p>';
        echo '<img src="' . $row['images'] . '" alt="' . $row['name'] . '">';
        // Add more details or actions as needed
        echo '</div>';
    }
} else {
    // No products found
    echo 'You have not added any products yet.';
}

// Close the database connection
mysqli_close($connection);
?>