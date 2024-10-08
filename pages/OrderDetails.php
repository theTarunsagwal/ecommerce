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
    <?php
     ?>
<body>
    <?php include 'header.php'; ?>
  <div class="container " style="margin-top: 6rem;  margin-bottom: 5rem;">
    <h1 class="mb-4">Order Details</h1>
    <!-- Order Summary -->
    <div class="card mb-4">
      <div class="card-header">
        Order #12345
      </div>
      <div class="card-body">
        <p><strong>Order Date:</strong> October 3, 2024</p>
        <p><strong>Status:</strong> Shipped</p>
        <p><strong>Total Amount:</strong> $120.00</p>
      </div>
    </div>

    <!-- Shipping Information -->
    <div class="card mb-4">
      <div class="card-header">
        Shipping Information
      </div>
      <div class="card-body">
        <p><strong>Name:</strong> John Doe</p>
        <p><strong>Address:</strong> 123 Main St, Springfield, IL</p>
        <p><strong>Phone:</strong> (555) 123-4567</p>
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
            <tr>
              <td>Product 1</td>
              <td>2</td>
              <td>$30.00</td>
              <td>$60.00</td>
            </tr>
            <tr>
              <td>Product 2</td>
              <td>1</td>
              <td>$60.00</td>
              <td>$60.00</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <th colspan="3" class="text-end">Total</th>
              <th>$120.00</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>

    <!-- Order Actions -->
    <div class="d-flex justify-content-end">
      <a href="#" class="btn btn-secondary me-2">Print Invoice</a>
      <a href="#" class="btn btn-primary">Track Order</a>
    </div>
  </div>

  <?php include 'footer.php'; ?> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
