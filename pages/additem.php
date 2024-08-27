<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="./css_admin_page/additem.css">
    <style>

    </style>
</head>
<body>
    
    <?php
  session_start();
  ob_start();
     $con = mysqli_connect("localhost","root","","ecommerce");
$con_userside = mysqli_connect('localhost', 'root', '', 'user_side');

if(isset($_SESSION['name'])) {
    $user = $_SESSION['name'];
    $table_name = 'user_name_' . $user;
 ?>
 <?php include "header.php" ?>
 <div class="cart-container">
    <h1>Hello, <?php echo $user; ?></h1>
    <?php
    // Handle item deletion
    if (isset($_POST['del'])) {
        $delete = $_POST['del'];
        $dstry = mysqli_query($con_userside, "DELETE FROM $table_name WHERE id='$delete'");
    }

    // Fetch items from the user's cart
    $qury_user = mysqli_query($con_userside, "SELECT * FROM $table_name");

    // Initialize total price variable
    $total_price = 0;

    if (mysqli_num_rows($qury_user) == 0) {
        echo "<div class='empty-set'>
        <img class='img_error' src='./img_ecommerce/img_ecommerce43.jpg'>
        <p>Please add items to the cart</p>
        </div>";
    } else {
        echo '<div class="cart-items">';
        while ($row = mysqli_fetch_array($qury_user)) {
            $item_id = $row['id'];
            $item_price = $row['price'];

            // Add the item price to the total
            $total_price += $item_price;
            ?>
            <div class="cart-item">
                <img src="./upload/<?php echo $row['image']; ?>" alt="">
                <div class="item-details">
                    <h2><?php echo $row['name']; ?></h2>
                    <p>Price: $<?php echo $item_price; ?></p>
                    <p>Quantity: 1</p>
                </div>
                <form method="post">
                    <div class="item-actions">
                        <button class="remove-btn" name="del" value="<?php echo $item_id; ?>">Remove</button>
                    </div>
                </form>
            </div>
            <?php
        }
        echo '</div>';
    }
    ?>
    <!-- Cart Summary Section -->
    <div class="cart-summary">
        <h2>Total: $<?php echo number_format($total_price, 2); ?></h2>
        <button class="checkout-btn">Proceed to Checkout</button>
    </div>
</div>

    <?php include 'footer.php' ?>
    <?php
}else{
  header('location:loging.php');
}
ob_end_flush();
?>
</body>
</html>
