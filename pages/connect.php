<?php 
$con_userside = mysqli_connect('localhost', 'root', '', 'user_side');
$con_pro = mysqli_connect("localhost","root","","product_data");
$con = mysqli_connect("localhost","root","","ecommerce");
$con_wish = mysqli_connect("localhost","root","","wishlist_user");
$conn = new mysqli("localhost", "root", "", "product_data");

?>