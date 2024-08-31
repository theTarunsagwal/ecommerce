<?php
$con_wish = mysqli_connect("localhost", "root", "", "wishlist_user");

session_start();
$wish_face = "wish_name_" . $_SESSION['id'];
if (isset($_POST['product_id']) && isset($_SESSION['name'])) {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user_id']; // Assuming user_id is stored in the session

    // Check if product is already in wishlist
    $check_wishlist = mysqli_query($con_wish, "SELECT * FROM $wish_face WHERE product_id = '$product_id' AND user_id = '$user_id'");
    
    if (mysqli_num_rows($check_wishlist) > 0) {
        // If exists, remove from wishlist
        mysqli_query($con_wish, "DELETE FROM $wish_face WHERE product_id = '$product_id' AND user_id = '$user_id'");
        echo 'removed';
    } else {
        // If not, add to wishlist
        mysqli_query($con_wish, "INSERT INTO $wish_face (user_id, product_id) VALUES ('$user_id', '$product_id')");
        echo 'added';
    }
}
?>