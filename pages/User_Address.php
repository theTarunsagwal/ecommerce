<?php
    session_start();
    $con = mysqli_connect("localhost","root","","ecommerce");
    if (isset($_SESSION['name'])) {
        $user_id = $_SESSION['name'];
    } else {
        die("Error: User ID not found in session.");
    }
    
    $user_id = $_SESSION['id'];
    echo $user_id;  
    if (isset($_POST['submit'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $address1 = $_POST['addressLine1'];
        $address2 = $_POST['addressLine2'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zipCode = $_POST['zipCode'];
        $country = $_POST['country'];
        $phone = $_POST['phoneNumber'];
    
        // $fullAddress = $address1 . ' ' . $address2;
        $customerData = [
            'fname' => $firstName,
            'lname' => $lastName,
            'address' => $address1,
            'address2' => $address2,
            'city' => $city,
            'state' => $state,
            'zip_code' => $zipCode,
            'country' => $country,
            'phone' => $phone
        ];
    
        // Convert array to JSON string
        $customerJson = json_encode($customerData);
        // echo $customerJson;
        // Use a prepared statement to avoid SQL injection
        $stmt = $con->prepare("UPDATE user_data SET address = ? WHERE id = ?");
        $stmt->bind_param("si", $customerJson, $user_id);
    
        // Execute the query
        if ($stmt->execute()) {
            echo "User address updated successfully.";
        } else {
            echo "Error updating record: " . $stmt->error;
        }
    
        $stmt->close();
    }
    
    // Close the database connection


   echo $id_user = $_SESSION['id'];
    $query = mysqli_query($con,"SELECT address FROM user_data where id = $id_user ");
    $row = mysqli_fetch_array($query);
    $user_address = json_decode($row['address'], true);
    // print_r($user_address);

    
    $con->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Addresses</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans antialiased">
    <?php include 'header.php'; ?>
    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="bg-white shadow-md w-full mt-6 md:w-64 p-6">
            <div class="flex items-center shadow-xl space-x-4 mb-8">
            <div class="w-14 h-14 bg-gray-300 rounded-full overflow-hidden flex items-center justify-center">
                            <?php
                                
                            ?>
                        </div>
                <div>
                    <h2 class="text-xl font-semibold">Puneet Kumar</h2>
                </div>
            </div>
            <nav>
                <ul class="space-y-4">
                    <li>
                        <a href="./MyOrders.php" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
                            <i class='bx bx-home'></i>
                            <span>My Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="./User_info.php" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
                            <i class='bx bx-user'></i>
                            <span>Profile Information</span>
                        </a>
                    </li>
                    <li class="text-blue-600">
                        <a href="#" class="flex items-center space-x-2">
                            <i class='bx bx-map'></i>
                            <span>Manage Addresses</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <form class="flex-1 lg:p-6 md:p-4 p-2" method="POST">
            <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md lg:p-6 md:p-4 p-2">
                <h2 class="text-2xl font-semibold mb-4">Manage Addresses</h2>
                <button class="mb-6 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    + Add a New Address
                </button>

                <div class="bg-blue-50 p-6 rounded-lg shadow-inner">
                    <h3 class="text-xl font-semibold mb-4">Edit Address</h3>
                    <button class="px-4 py-2 mb-6 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Use my current location
                    </button>

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                         <div>
                             <label class="block text-gray-700">First Name</label>
                             <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="firstName" placeholder="<?php echo isset($user_address['fname']) ? $user_address['fname'] : 'Enter your first name'; ?>">
                         </div>
                         <div>
                             <label class="block text-gray-700">Last Name</label>
                             <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="lastName" placeholder="<?php echo isset($user_address['lname']) ? $user_address['lname'] : 'Enter your last name'; ?>">
                         </div>
                         <div>
                             <label class="block text-gray-700">10-digit mobile number</label>
                             <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="phoneNumber" placeholder="<?php echo isset($user_address['phone']) ? $user_address['phone'] : 'Enter your mobile number'; ?>">
                         </div>
                         <div>
                             <label class="block text-gray-700">Pincode</label>
                             <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="zipCode" placeholder="<?php echo isset($user_address['zip_code']) ? $user_address['zip_code'] : 'Enter your pincode'; ?>">
                         </div>
                         <div>
                             <label class="block text-gray-700">Locality</label>
                             <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="country" placeholder="<?php echo isset($user_address['country']) ? $user_address['country'] : 'Enter your locality'; ?>">
                         </div>
                         <div class="md:col-span-2">
                             <label class="block text-gray-700">Address1 (Area and Street)</label>
                             <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="addressLine1" placeholder="<?php echo isset($user_address['address']) ? $user_address['address'] : 'Enter your address'; ?>">
                         </div>
                         <div class="md:col-span-2">
                             <label class="block text-gray-700">Address2 (Area and Street)</label>
                             <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="addressLine2" placeholder="<?php echo isset($user_address['address2']) ? $user_address['address2'] : 'Enter your address (optional)'; ?>">
                         </div>
                         <div>
                             <label class="block text-gray-700">City/District/Town</label>
                             <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="city" placeholder="<?php echo isset($user_address['city']) ? $user_address['city'] : 'Enter your city'; ?>">
                         </div>
                         <div>
                             <label class="block text-gray-700">State</label>
                             <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="state" placeholder="<?php echo isset($user_address['state']) ? $user_address['state'] : 'Enter your state'; ?>">
                         </div>
                    </div>

                    <!-- Save Button -->
                    <div class="mt-6 flex justify-end">
                        <button name="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </form>
    </div>
</body>
</html>