<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woodcraft Items</title>
    <link rel="stylesheet" href="styles.css">
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
                <?php if (isset($_SESSION['email'])): ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.html">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <section class="item-container">
        <div class="item">
            <img src="woodcraft1.jpg" alt="Woodcraft 1">
            <h3>Woodcraft Item 1</h3>
            <p>Price: $20</p>
        </div>
        <div class="item">
            <img src="woodcraft2.jpg" alt="Woodcraft 2">
            <h3>Woodcraft Item 2</h3>
            <p>Price: $30</p>
        </div>
        <div class="item">
            <img src="woodcraft3.jpg" alt="Woodcraft 3">
            <h3>Woodcraft Item 3</h3>
            <p>Price: $25</p>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Wooden Crafts Store. All rights reserved.</p>
    </footer>
</body>

</html>