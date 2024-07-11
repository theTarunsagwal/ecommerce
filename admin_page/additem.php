<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Simulate fetching item details from the database
    // Replace this with actual database queries to fetch item details
    $con = mysqli_connect("localhost", "root", "", "ecommerce");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch item details based on the id from appropriate table
    $item_query = "SELECT * FROM decor_art WHERE decor_name = '$id'";
    $item_result = mysqli_query($con, $item_query);
    $item = mysqli_fetch_assoc($item_result);

    if (!$item) {
        // If no item found in decor_art, try other tables
        $item_query = "SELECT * FROM wood WHERE image_name = '$id'";
        $item_result = mysqli_query($con, $item_query);
        $item = mysqli_fetch_assoc($item_result);

        if (!$item) {
            $item_query = "SELECT * FROM dining_room WHERE dining_name = '$id'";
            $item_result = mysqli_query($con, $item_query);
            $item = mysqli_fetch_assoc($item_result);

            if (!$item) {
                $item_query = "SELECT * FROM new_product WHERE name = '$id'";
                $item_result = mysqli_query($con, $item_query);
                $item = mysqli_fetch_assoc($item_result);
            }
        }
    }

    if ($item) {
        // Structure the item details
        $cart_item = [
            'id' => $id,
            'name' => $item['decor_name'] ?? $item['image_name'] ?? $item['dining_name'] ?? $item['name'],
            'price' => $item['decor_price'] ?? $item['price'] ?? $item['dining_price'] ?? $item['price'],
            'img' => $item['decor_img'] ?? $item['image'] ?? $item['dining_image'] ?? $item['img'],
            'quantity' => 1
        ];

        // Check if the item already exists in the cart
        $item_exists = false;
        foreach ($_SESSION['cart'] as &$cart_item_existing) {
            if ($cart_item_existing['id'] === $cart_item['id']) {
                $cart_item_existing['quantity'] += 1;
                $item_exists = true;
                break;
            }
        }

        // If the item doesn't exist in the cart, add it
        if (!$item_exists) {
            $_SESSION['cart'][] = $cart_item;
        }
    } else {
        echo "Item not found.";
        exit();
    }

    // Redirect back to the item page or cart page
    header('Location: item_page.php?id=' . $id);
    exit();
} else {
    // Handle the case where the item ID is not provided
    echo "Invalid item ID.";
}
?>
