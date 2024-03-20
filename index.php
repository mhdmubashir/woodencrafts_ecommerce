<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woodcraft Items</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
    <script src="script.js"></script> <!-- Include your custom JavaScript file -->
</head>

<body>
    <header>
        <h1>Welcome to our Wooden Crafts Store</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="sell_item.php">Sell Item</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="about.php">Cart</a></li>
                <?php if (isset ($_SESSION['email'])): ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.html">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <section class="item-container">
        <?php
        // Include the database connection file
        include_once 'db_connect.php';

        // Query to fetch product data from the database
        $query = "SELECT * FROM products";
        $result = mysqli_query($connection, $query);

        // Check if there are any products
        if (mysqli_num_rows($result) > 0) {
            // Loop through each row in the result set
            while ($row = mysqli_fetch_assoc($result)) {
                // Output HTML content for each product
                echo '<div class="item">';
                echo '<img src="' . $row['images'] . '" alt="' . $row['name'] . '">';
                echo '<h3>' . $row['name'] . '</h3>';
                echo '<p>' . $row['description'] . '</p>';
                echo '<p>$' . $row['price'] . '</p>';
                echo '<div class="buttons">';
                echo '<button class="buy-now-btn">Buy Now</button>';
                echo '<button class="add-to-cart-btn">Add to Cart</button>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            // No products found
            echo 'No products available.';
        }

        // Close the database connection
        mysqli_close($connection);
        ?>
    </section>

    <footer>
        <p>&copy; 2024 Wooden Crafts Store. All rights reserved.</p>
    </footer>
</body>

</html>