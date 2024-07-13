<?php 
session_start();
include "header.php";
$con = mysqli_connect("localhost","root","","ecommerce");

if(isset($_SESSION['name'])) {
    $user = $_SESSION['name'];
    $table_name = 'user_name_' . $user;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../admin_page/css_admin_page/additem.css">
</head>
<body>
    <div class="cart-card">
    <?php
    if(isset($_POST['del'])){
        $delete=$_POST['del'];
        $dstry= mysqli_query($con,"DELETE FROM $table_name WHERE id='$delete'");
    }
    
    $qury_user = mysqli_query($con, "SELECT * FROM $table_name");
    if(mysqli_num_rows($qury_user) == 0) {
        echo "<div class='empty-set'>
        <img class='img_error' src='../img_ecommerce/img_ecommerce43.jpg'>
        <p>Please add items to the cart</p>
        </div>
        ";
    } else {
        while($row = mysqli_fetch_array($qury_user)) {
            $item_id = $row['id'];
        ?>
        <div class="cart-card-item">
            <div class="cart-img-item">
                <img src="./upload/<?php echo $row['image'];?>" alt="">
            </div>
            <div class="cart-info-item">
                <h1 class="fs-3 fw-bolder"><?php echo $row['name'] ?></h1>
                <h3 class="fs-5">Price: $<span id="price-value-<?php echo $item_id; ?>"><?php echo $row['price']; ?></span></h3>
            </div>
            <div class="count-btn">
                <button type="button" onclick="changeQuantity(<?php echo $item_id; ?>, -1)">-</button>
                <input type="text" id="quantity-<?php echo $item_id; ?>" value="1" readonly>
                <button type="button" onclick="changeQuantity(<?php echo $item_id; ?>, 1)">+</button>
            </div>
            <a class="fancy mt-2" href="#">
                <span class="top-key"></span>
                <span class="text">Buy Now</span>
                <span class="bottom-key-1"></span>
                <span class="bottom-key-2"></span>
            </a>
            <form method="post">
            <button class="bin-button mt-2" name="del" value="<?php echo $row['id'] ?>" >
  <svg
    class="bin-top"
    viewBox="0 0 39 7"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
  >
    <line y1="5" x2="39" y2="5" stroke="white" stroke-width="4"></line>
    <line
      x1="12"
      y1="1.5"
      x2="26.0357"
      y2="1.5"
      stroke="white"
      stroke-width="3"
    ></line>
  </svg>
  <svg
    class="bin-bottom"
    viewBox="0 0 33 39"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
  >
    <mask id="path-1-inside-1_8_19" fill="white">
      <path
        d="M0 0H33V35C33 37.2091 31.2091 39 29 39H4C1.79086 39 0 37.2091 0 35V0Z"
      ></path>
    </mask>
    <path
      d="M0 0H33H0ZM37 35C37 39.4183 33.4183 43 29 43H4C-0.418278 43 -4 39.4183 -4 35H4H29H37ZM4 43C-0.418278 43 -4 39.4183 -4 35V0H4V35V43ZM37 0V35C37 39.4183 33.4183 43 29 43V35V0H37Z"
      fill="white"
      mask="url(#path-1-inside-1_8_19)"
    ></path>
    <path d="M12 6L12 29" stroke="white" stroke-width="4"></path>
    <path d="M21 6V29" stroke="white" stroke-width="4"></path>
  </svg>
</button>

            </form>
        </div>
        
        <script>
            const basePrice<?php echo $item_id; ?> = <?php echo $row["price"]; ?>;
            const priceElement<?php echo $item_id; ?> = document.getElementById('price-value-<?php echo $item_id; ?>');
            const quantityInput<?php echo $item_id; ?> = document.getElementById('quantity-<?php echo $item_id; ?>');

            function changeQuantity(item_id, change) {
                let quantityInput = document.getElementById('quantity-' + item_id);
                let priceElement = document.getElementById('price-value-' + item_id);
                let quantity = parseInt(quantityInput.value) + change;
                if (quantity < 1) {
                    quantity = 1;
                }
                quantityInput.value = quantity;
                updatePrice(item_id, quantity);
            }

            function updatePrice(item_id, quantity) {
                let basePrice = eval('basePrice' + item_id);
                let priceElement = document.getElementById('price-value-' + item_id);
                const newPrice = basePrice * quantity;
                priceElement.textContent = newPrice.toFixed(2);
            }
        </script>
        <?php
        }
    }
    ?>
    </div>
</body>
</html>
<?php
}else{
  header('location:loging.php');
}
?>

