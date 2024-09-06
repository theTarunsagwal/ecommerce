<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css_admin_page/Order.css">
    <title>Order Details</title>
</head>
<body>
    <?php include 'header.php'?>

    <div class="container mx-auto w-full mb-5 py-6 bg-gray-100" style="margin-top:4rem">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-center bg-white p-4 rounded shadow">
            <!-- Delivery Address -->
            <div class="text-left mb-4 md:mb-0">
                <h2 class="text-xl font-semibold">Delivery Address</h2>
                <p>Kunal</p>
                <p>Gali no.8, house no.18, first floor...</p>
                <p>New Delhi - 110044</p>
                <p>Phone number: 8376905677</p>
            </div>
            <!-- Rewards Section -->
            <div class="text-center mb-4 md:mb-0">
                <h2 class="text-xl font-semibold">Your Rewards</h2>
                <p>12 SuperCoins Cashback</p>
                <p>Early Access to this Sale</p>
            </div>
            <!-- Actions Section -->
            <div class="text-right">
                <h2 class="text-xl font-semibold">More Actions</h2>
                <button class="bg-blue-500 text-white px-4 py-2 rounded">Download Invoice</button>
            </div>
        </div>

        <!-- Order Tracking Section -->
        <div class="bg-white p-4 mt-4 rounded shadow">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <!-- Product Information -->
                <div class="flex flex-col items-center md:items-start">
                    <img src="../Images/Product_images/61bqww99XnL._SY741_.jpg" alt="Product" class="w-40 h-40 rounded">
                    <p class="font-semibold mt-2">YIXTY Resistance Bands Set for Exercise</p>
                    <p>₹334 <span class="text-green-500">2 Offers Applied</span></p>
                </div>

                <!-- Order Tracker -->
                <div class="w-full md:w-auto max-w-2xl mx-auto mt-4 md:mt-0">
                    <div class="tracker" role="list">
                        <div class="step completed" role="listitem" aria-label="Step 1: Order Confirmed" tabindex="0">
                            <div class="circle" aria-label="Completed Step 1">1
                                <div class="tooltip">Order Confirmed</div>
                            </div>
                            <div class="step-text">Tue, 9th Jul</div>
                        </div>
                        <div class="step completed" role="listitem" aria-label="Step 2: Shipped" tabindex="0">
                            <div class="circle" aria-label="Completed Step 2">2
                                <div class="tooltip">Shipped</div>
                            </div>
                            <div class="step-text">Tue, 9th Jul</div>
                        </div>
                        <div class="step active" role="listitem" aria-label="Step 3: Out for Delivery" tabindex="0">
                            <div class="circle" aria-label="Active Step 3">3
                                <div class="tooltip">Out for Delivery</div>
                            </div>
                            <div class="step-text">Wed, 10th Jul</div>
                        </div>
                        <div class="step" role="listitem" aria-label="Step 4: Delivered" tabindex="0">
                            <div class="circle" aria-label="Upcoming Step 4">4
                                <div class="tooltip">Delivered</div>
                            </div>
                            <div class="step-text">Wed, 10th Jul</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Buttons Section -->
            <div class="flex justify-between items-center mt-4">
                <button class="text-blue-500">Rate & Review Product</button>
                <button class="text-blue-500">Chat with us</button>
            </div>
        </div>
    </div>
    
    <?php include 'Footer.php'?>
</body>
</html>
