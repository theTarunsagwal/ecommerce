<?php
  // session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Payment Processing</title>
    <style>
        /* Slide-in animation for the price details section */
        @keyframes slideIn {
            from {
                transform: translateY(100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-slide-in {
            animation: slideIn 0.6s ease-out forwards;
        }

        /* Radio button animation */
        input[type="radio"]:checked + label::before {
            transform: scale(1.2);
            background-color: #2563eb; /* Blue-600 */
        }

        /* Pay button hover effect */
        .pay-button:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.4);
        }
    </style>
</head>
<body class="bg-gray-50">
  <div class="fixed w-full ">
  <?php include 'header.php '?>
  </div>
    <div class="container mx-auto p-4 py-[120px]">
        <!-- Order Summary -->
        <div class="border-b pb-4 mb-4">
          <h2 class="text-xl font-semibold">Order Summary</h2>
          <div class="flex items-center justify-between mt-4">
            <div class="flex items-center">
              <!-- Product Image -->
              <img src="./Images/Product_images/61bqww99XnL._SY741_.jpg" alt="Product Image" class="w-24 h-24 mr-4 rounded-md">
              <div>
                <p class="font-semibold">YIXTY Resistance Bands Set for Exercise</p>
                <p class="text-sm text-gray-500">1 item</p>
              </div>
            </div>
            <p class="font-semibold">₹334</p>
          </div>
        </div>
      
        <!-- Delivery Address -->
        <div class="border-b pb-4 mb-4">
          <h2 class="text-xl font-semibold">Delivery Address</h2>
          <div class="mt-2">
            <p>Kunal</p>
            <p>Gali no.8, house no.18, first floor...</p>
            <p>New Delhi - 110044</p>
            <p>Phone number: 8376905677</p>
          </div>
        </div>
      
        <!-- Payment Options -->
        <div class="border-b pb-4 mb-4">
          <h2 class="text-xl font-semibold">Payment Options</h2>
          <p class="text-sm text-red-500 mb-4">Complete payment in <span id="timer">00:13:55</span></p>
          
          <div class="space-y-4">
            <!-- UPI Payment Option -->
            <div class="flex items-center">
              <input id="upi" type="radio" name="payment" class="h-4 w-4 text-blue-600 focus:ring-blue-500">
              <label for="upi" class="ml-3 block text-sm font-medium text-gray-700">UPI</label>
            </div>
            <div class="ml-7">
              <select class="w-full p-2 border border-gray-300 rounded-md">
                <option>PhonePe</option>
                <option>Your UPI ID</option>
              </select>
            </div>
            
            <!-- Wallets -->
            <div class="flex items-center">
              <input id="wallets" type="radio" name="payment" class="h-4 w-4 text-blue-600 focus:ring-blue-500">
              <label for="wallets" class="ml-3 block text-sm font-medium text-gray-700">Wallets</label>
            </div>
      
            <!-- Credit/Debit Card -->
            <div class="flex items-center">
              <input id="card" type="radio" name="payment" class="h-4 w-4 text-blue-600 focus:ring-blue-500">
              <label for="card" class="ml-3 block text-sm font-medium text-gray-700">Credit / Debit / ATM Card</label>
            </div>
      
            <!-- Net Banking -->
            <div class="flex items-center">
              <input id="net-banking" type="radio" name="payment" class="h-4 w-4 text-blue-600 focus:ring-blue-500">
              <label for="net-banking" class="ml-3 block text-sm font-medium text-gray-700">Net Banking</label>
            </div>
          </div>
        </div>
      
        <!-- Price Details -->
        <div class="p-4 bg-gray-100 rounded-md animate-slide-in">
          <h2 class="text-xl font-semibold mb-4">Price Details</h2>
          <div class="flex justify-between">
            <p>Price (1 item)</p>
            <p>₹1,599</p>
          </div>
          <div class="flex justify-between">
            <p>Delivery Charges</p>
            <p class="text-green-500">FREE</p>
          </div>
          <div class="flex justify-between">
            <p>Platform Fee</p>
            <p>₹3</p>
          </div>
          <hr class="my-4">
          <div class="flex justify-between text-lg font-semibold">
            <p>Amount Payable</p>
            <p>₹1,602</p>
          </div>
          <div class="text-xs text-gray-500 mt-2">
            <p>Safe and Secure Payments. Easy returns. 100% Authentic products.</p>
          </div>
        </div>
      
        <!-- Pay Button -->
        <div class="mt-6">
          <button class="w-full bg-blue-600 text-white p-3 rounded-md text-lg font-semibold hover:bg-blue-700 transition duration-200 pay-button">
            Pay ₹1,602
          </button>
        </div>
      </div>
</body>
</html>
