<?php
include 'connect.php';

// Assuming connection to the database is already established in $con_wish
// $con_wish = mysqli_connect("localhost", "root", "", "wishlist_user");

session_start();
$wish_face = "wish_name_" . $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $wish_id = $_POST['wish_id'];

    // Check if the item is already in the wishlist
    $check_query = "SELECT * FROM $wish_face WHERE id = $wish_id";
    $result = mysqli_query($con_wish, $check_query);

    if (mysqli_num_rows($result) > 0) {
        // Item exists, so remove it from the wishlist
        $delete_query = "DELETE FROM $wish_face WHERE id = $wish_id";
        mysqli_query($con_wish, $delete_query);
        echo "removed";
    } else {
        // Item does not exist, so add it to the wishlist
        $wish_name = $_POST['wish_name'];
        $wish_img = $_POST['wish_img'];
        $wish_price = $_POST['wish_price'];

        $insert_query = "INSERT INTO $wish_face (id, name, product_img, price) VALUES ($wish_id, '$wish_name', '$wish_img', $wish_price)";
        mysqli_query($con_wish, $insert_query);
        echo "added";
    }
}


