<!-- <?php
session_start();

// Include database connection
require_once "db_connect.php";

// Check if the item ID is provided via POST
if (isset ($_POST['id'])) {
    $item_id = $_POST['id'];

    // Check if the item exists in the database
    $query = "SELECT * FROM products WHERE id = $item_id";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
        // Fetch the item details
        $item = mysqli_fetch_assoc($result);

        // Add the item to the user's cart (you will need to adjust this logic based on your database structure)
        // For example, you could insert the item ID into a 'cart' table along with the user ID

        // Assuming the user is logged in and their user ID is stored in $_SESSION['user_id']
        $user_id = $_SESSION['user_id'];

        // Insert the item into the user's cart
        $insert_query = "INSERT INTO cart (user_id, item_id) VALUES ($user_id, $item_id)";
        mysqli_query($connection, $insert_query);

        // Send a success response
        echo json_encode(array('success' => true, 'message' => 'Item added to cart successfully.'));
    } else {
        // Item not found
        echo json_encode(array('success' => false, 'message' => 'Item not found.'));
    }
} else {
    // Item ID not provided
    echo json_encode(array('success' => false, 'message' => 'Item ID not provided.'));
}

// Close the database connection
mysqli_close($connection);
?> -->