<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Simulate fetching item details from the database
    // You should replace this with actual database queries
    $item = [
        'id' => $id,
        'name' => $id, // Replace with actual item name from database
        'price' => 100, // Replace with actual item price from database
        'quantity' => 1
    ];

    // Check if the item already exists in the cart
    $item_exists = false;
    foreach ($_SESSION['cart'] as &$cart_item) {
        if ($cart_item['id'] === $item['id']) {
            $cart_item['quantity'] += 1;
            $item_exists = true;
            break;
        }
    }

    // If the item doesn't exist in the cart, add it
    if (!$item_exists) {
        $_SESSION['cart'][] = $item;
    }

    // Redirect back to the item page or cart page
    header('Location: item_page.php?id=' . $id);
    exit();
} else {
    // Handle the case where the item ID is not provided
    echo "Invalid item ID.";
}
?>

?>