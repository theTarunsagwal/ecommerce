<?php
session_start();
if(isset($_SESSION['name'])) {
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $con = mysqli_connect("localhost", "root", "", "ecommerce");
        if(!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        $query = "SELECT * FROM wood WHERE id = $id";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "<h1>Product ID: " . $row['id'] . "</h1>";
            echo "<p>Name: " . $row['image_name'] . "</p>";
            echo "<p>Price: $" . $row['price'] . ".00</p>";
        } else {
            echo "No product found with ID: $id";
        }
        
        mysqli_close($con);
    } else {
        echo "Product ID is not specified or invalid.";
    }
} else {
    header("location: loging.php");
}
?>
