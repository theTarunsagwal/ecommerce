<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

.cart-container {
    max-width: 800px;
    margin: 0 auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333;
}

.cart-items {
    margin-top: 20px;
}

.cart-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
    padding: 15px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.cart-item:hover {
    transform: scale(1.02);
}

.cart-item img {
    width: 100px;
    border-radius: 8px;
}

.item-details h2 {
    margin: 0;
    color: #444;
    font-size: 18px;
}

.item-details p {
    margin: 5px 0;
    color: #777;
}

.item-actions {
    display: flex;
    align-items: center;
}

.remove-btn {
    background-color: #ff4d4d;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.remove-btn:hover {
    background-color: #ff1a1a;
}

.cart-summary {
    text-align: right;
    margin-top: 20px;
}

.cart-summary h2 {
    color: #333;
    margin-bottom: 20px;
}

.checkout-btn {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.checkout-btn:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <?php include "header.php" ?>
    <div class="cart-container">
        <h1>Your Shopping Cart</h1>
        <div class="cart-items">
            <div class="cart-item">
                <img src="path-to-your-product-image1.jpg" alt="Product Image">
                <div class="item-details">
                    <h2>Product Name</h2>
                    <p>Price: $99.00</p>
                    <p>Quantity: 1</p>
                </div>
                <div class="item-actions">
                    <button class="remove-btn">Remove</button>
                </div>
            </div>

            <!-- Repeat the .cart-item for each product in the cart -->
        </div>
        <div class="cart-items">
            <div class="cart-item">
                <img src="path-to-your-product-image1.jpg" alt="Product Image">
                <div class="item-details">
                    <h2>Product Name</h2>
                    <p>Price: $99.00</p>
                    <p>Quantity: 1</p>
                </div>
                <div class="item-actions">
                    <button class="remove-btn">Remove</button>
                </div>
            </div>

            <!-- Repeat the .cart-item for each product in the cart -->
        </div>
        <div class="cart-items">
            <div class="cart-item">
                <img src="path-to-your-product-image1.jpg" alt="Product Image">
                <div class="item-details">
                    <h2>Product Name</h2>
                    <p>Price: $99.00</p>
                    <p>Quantity: 1</p>
                </div>
                <div class="item-actions">
                    <button class="remove-btn">Remove</button>
                </div>
            </div>

            <!-- Repeat the .cart-item for each product in the cart -->
        </div>
        <div class="cart-summary">
            <h2>Total: $198.00</h2>
            <button class="checkout-btn">Proceed to Checkout</button>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>
