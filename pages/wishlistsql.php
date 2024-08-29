<?php
$con_wish = mysqli_connect("localhost", "root", "", "wishlist_user");
session_start(); // Make sure to start the session to access $_SESSION['user_id']

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['wish_id'];
    $user_id = $_SESSION['user_id']; // Assuming you have a logged-in user

    // Check if product is already in wishlist
    $check_query = mysqli_query($con_wish, "SELECT * FROM $wish_face WHERE product_id = $product_id AND user_id = $user_id");

    if (mysqli_num_rows($check_query) > 0) {
        // Remove from wishlist
        mysqli_query($con_wish, "DELETE FROM $wish_face WHERE product_id = $product_id AND user_id = $user_id");
        echo "removed";
    } else {
        // Add to wishlist
        $product_name = $_POST['wish_name'];
        $product_img = $_POST['wish_img'];
        $product_price = $_POST['wish_price'];
        mysqli_query($con_wish, "INSERT INTO $wish_face (user_id, product_id, name, img, price) VALUES ($user_id, $product_id, '$product_name', '$product_img', '$product_price')");
        echo "added";
    }
}
?>
