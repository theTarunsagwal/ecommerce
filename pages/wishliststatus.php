<?php
// Example connection setup (replace with your own)
include 'connect.php'; // Include your database connection file
// $con_wish = mysqli_connect("localhost","root","","wishlist_user");

// Fetch the item ID from the POST request
$wish_id = $_POST['wish_id']; 

// Assuming you have a variable holding your wishlist table name
$wish_face = "wish_name_".$_SESSION['id'];


// Check if the item exists in the wishlist table
$qry_user_product = mysqli_query($con_wish, "SELECT * FROM $wish_face WHERE id = $wish_id");
if (mysqli_num_rows($qry_user_product) > 0) {
    echo "added";
} else {
    echo "removed";
}
?>
