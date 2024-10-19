<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Details</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            /* Additional styling for better visual effects */
            .card {
                border-radius: 10px;
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            }
            .order-id {
                font-weight: bold;
                font-size: 1.2rem;
            }
            .order-status.pending {
                color: #f0ad4e;
            }
            .order-status.shipped {
                color: #5cb85c;
            }
            .product-img {
                max-width: 80px;
                border-radius: 8px;
            }
            .btn {
                border-radius: 25px;
            }
        </style>
    </head>
<body>
    <?php include 'header.php'; ?>
    <div class="container" style="margin-top: 6rem; margin-bottom: 5rem;">
        <h1 class="mb-4">Order Details</h1>
        <?php
        $user_id = $_SESSION['id'];
        $total_price = 0;

        $qury = mysqli_query($con_pro, "SELECT * FROM order_product WHERE user_id= $user_id");
        while($row = mysqli_fetch_array($qury)){
            $arry_find = json_decode($row['address'], true);
            $total_price = 0;
            
        ?>
        <!-- Shipping Information -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="order-id">Order ID: <?php echo $row['order_id']; ?> .
                        <span class="order-status pending">Pending</span>
                    </h5>
                    <p class="card-text"><small>Date: <?php echo $row['order_date']; ?></small></p>
                </div>

                <!-- Contact and Shipping Info -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Contact</strong>
                        <p><?php echo $arry_find['fname']." ".$arry_find['lname']; ?><br>
                            Phone: <?php echo $arry_find['phone']; ?><br>
                            Email: <?php echo $_SESSION['email']; ?>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <strong>Shipping address</strong>
                        <p><?php echo $arry_find['address']." ".$arry_find['address2']; ?><br>
                            <?php echo $arry_find['city'].", ".$arry_find['state']." ".$arry_find['zip_code']."<br>".$arry_find['country']; ?>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <strong>Payment Id</strong>
                        <p><?php echo $row['payment_id'] ?></p>
                    </div>
                </div>

                <!-- Product List -->
                <div class="row">
                    <?php
                    $product_find = json_decode($row['product_id'], true);
                    $qty_find = json_decode($row['qty'], true);
                    foreach ($product_find as $index => $product_id): 
                        $match_arr = mysqli_query($con_pro, "SELECT * FROM product WHERE id = $product_id");
                        $row_match = mysqli_fetch_assoc($match_arr);
                        $qty_id = $qty_find[$index];
                        $total = $qty_id * $row_match['price'];
                        $total_price += $total +30;
                    ?>
                    <div class="col-md-3 d-flex align-items-center mb-3">
                        <img src="upload/<?php echo $row_match['img']; ?>" alt="<?php echo $row_match['name']; ?>" class="product-img me-3">
                        <div>
                            <p><?php echo $row_match['name']; ?><br>
                                <small>Quantity: <?php echo $qty_id; ?></small><br>
                                Price: ₹<?php echo $row_match['price']; ?><br>
                                <small> Shipping fee: ₹30</small><br>
                                Total: ₹<?php  echo $total_price ?>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Buttons for Actions -->
                <div class="d-flex justify-content-end">
                    <a href="#" class="btn btn-outline-danger me-2">Cancel Order</a>
                    <a href="#" class="btn btn-primary">Track Order</a>
                </div>
            </div>
        </div>

        <?php } ?>
    </div>

    <?php include 'footer.php'; ?> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
