<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css_admin_page/Order.css">
    <title>Order Details</title>
    <style>
        .img{
            height: 3rem;
            width: 3rem;
            border-radius: 50%;
        }
    </style>
</head>
<body bg-gray-100>
    <?php include 'header.php'?>

    <div class="min-h-screen flex flex-col md:flex-row " style="margin-top:5rem">
      
    <div class="xyz flex-1 p-6">
        <!-- Delivery Address Section -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
            <h2 class="text-lg font-semibold mb-4">Delivery Address</h2>
            <p>Kunal</p>
            <p>Gali No.8, House No.18, First Floor...</p>
            <p>New Delhi - 110044</p>
            <p>Phone Number: 8376905677</p>

            <!-- Rewards Section -->
            <h2 class="text-lg font-semibold mt-6 mb-4">Your Rewards</h2>
            <p>12 SuperCoins Cashback</p>
            <p>Early Access To This Sale</p>

            <!-- More Actions Button -->
            <div class="mt-6">
                <button class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">Download Invoice</button>
            </div>
        </div>

        <!-- Product Section -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
            <div class="flex items-center">
                <img src="product-placeholder.png" alt="Product" class="w-16 h-16 object-cover mr-4">
                <div>
                    <h2 class="font-semibold">YIXTY Resistance Bands Set For Exercise</h2>
                    <p class="text-gray-600">₹334 <span class="text-green-500">2 Offers Applied</span></p>
                </div>
            </div>

            <!-- Delivery Status -->
            <div class="mt-6 flex justify-between items-center">
                <div class="flex space-x-4">
                    <!-- Delivery Steps -->
                    <div class="text-center">
                        <div class="bg-green-500 text-white w-8 h-8 rounded-full flex items-center justify-center">1</div>
                        <p class="text-sm mt-2">Tue, 9th Jul</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-green-500 text-white w-8 h-8 rounded-full flex items-center justify-center">2</div>
                        <p class="text-sm mt-2">Tue, 9th Jul</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-yellow-500 text-white w-8 h-8 rounded-full flex items-center justify-center">3</div>
                        <p class="text-sm mt-2">Wed, 10th Jul</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-gray-300 text-white w-8 h-8 rounded-full flex items-center justify-center">4</div>
                        <p class="text-sm mt-2">Wed, 10th Jul</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    
    <?php include 'Footer.php'?>
</body>
</html>
