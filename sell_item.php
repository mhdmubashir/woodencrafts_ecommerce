<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Item</title>
    <!-- Include CSS file if needed -->
</head>

<body>
    <h2>Sell Item</h2>
    <form action="sell_item_process.php" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required><br><br>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>

        <button type="submit" name="add_product">Add Product</button>
        <button type="button" onclick="location.href='index.php';">Cancel</button>
    </form>
</body>

</html>