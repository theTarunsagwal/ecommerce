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
    </head>
<body>
    <?php include 'header.php'; ?>
  <div class="container " style="margin-top: 6rem;  margin-bottom: 5rem;">
    <h1 class="mb-4">Order Details</h1>
    <?php
    $user_id =  $_SESSION['id'];
    $qury = mysqli_query($con_pro, "SELECT * FROM order_product WHERE user_id= $user_id");
    while($row = mysqli_fetch_array($qury)){
    // $arry_find = json_decode($row['address'],true);
    $arry_find = json_decode($row['address'], true);

    // Check if it's an array or a single object
    
    ?>
    <!-- Shipping Information -->
    <div class="card mb-4 mt-4">
      <div class="card-header">
        Shipping Information
      </div>
      <div class="card-body">
        <p><strong>Name:</strong> <?php echo $arry_find['fname']." ".$arry_find['lname']; ?> </p>
        <p><strong>Address:</strong> <?php echo $arry_find['address']." ".$arry_find['address2']." ".$arry_find['city']." ".$arry_find['state']." ".$arry_find['zip_code']." ".$arry_find['country']; ?></p>
        <p><strong>Phone:</strong> <?php echo $arry_find['phone'] ?></p>
      </div>
    </div>

    <!-- Products Table -->
    <div class="card mb-4">
      <div class="card-header">
        Products in Order
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Product</th>
              <th scope="col">Quantity</th>
              <th scope="col">Unit Price</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
   
          <tbody>
          <?php
    $product_find = json_decode($row['product_id'], true);
    $qty_find = json_decode($row['qty'], true);
    $total_price = 0;
    foreach ($product_find as $index => $product_id) {
      $match_arr = mysqli_query($con_pro, "SELECT * FROM product WHERE id = $product_id");
      $row_match = mysqli_fetch_assoc($match_arr);
      $qty_id = $qty_find[$index];
      $total = $qty_id * $row_match['price'];
?>
            <tr>
              <td><?php echo $row_match['name']; ?></td>
              <td><?php echo $qty_id; ?></td>
              <td>₹<?php echo $row_match['price'] ; ?></td>
              <td>₹<?php echo $total;?></td>
            </tr>
            
          </tbody>
          <?php
   $total_price += $total;
    }

?>
          <tfoot>
            <tr>
              <th colspan="3" class="text-end">Total</th>
              <th>₹<?php echo $total_price ?></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
    <!-- Order Summary -->
    <div class="card mb-4">
      <div class="card-header">
        Order Status
      </div>
      <div class="card-body">
        <p><strong>Order Date:</strong> <?php echo $row['order_date']; ?></p>
        <p><strong>Status:</strong> Shipped</p>
        <p><strong>Total Amount:</strong> ₹<?php echo $total_price ?></p>
      </div>
    </div>

    <!-- Order Actions -->
    <div class="d-flex justify-content-end">
      <a href="#" class="btn btn-secondary me-2">Print Invoice</a>
      <a href="#" class="btn btn-primary">Track Order</a>
    </div>  
<?php 
  }
 ?>
     
  </div>

  <?php include 'footer.php'; ?> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
