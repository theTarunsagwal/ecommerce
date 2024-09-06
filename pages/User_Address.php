<?php
    session_start();
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
    <?php include 'header.php'?>
    <?php
        // session_start();
        ob_start();

         $con = mysqli_connect("localhost", "root", "", "ecommerce");
         
         if (isset($_SESSION['name']) && isset($_SESSION['email'])) {
             $user = $_SESSION['name'];
             $user_email = $_SESSION['email'];
             $qury_user = mysqli_query($con, "SELECT * FROM user_data WHERE name = '$user' OR email = '$user_email'");
         ?>  
    <div class="min-h-screen flex" style="margin-top: 3.2rem;">
        <!-- Sidebar -->
        <div class="bg-white shadow-md w-64 mt-6 p-6">
        <?php
            if ($qury_user) {
               if (mysqli_num_rows($qury_user) > 0) {
                   while ($row = mysqli_fetch_array($qury_user)) {
                       ?>
            <div class="flex items-center mb-8">
                <img class="w-12 h-12 rounded-full" src="./upload/<?php echo $row['image']; ?>" alt="User Avatar">
                <div>
                    <h2 class="text-xl font-semibold"><?php echo $_SESSION['name']?></h2>
                </div>
            </div>
            <?php } } } ?>

            <nav>
                <ul class="space-y-4">
                    <li>
                        <a href="#" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
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
        <div class="flex-1 p-6" style="margin-top: 3.2rem;">
            <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md p-6">
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
                            <label class="block text-gray-700">Name</label>
                            <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Kunal">
                        </div>
                        <div>
                            <label class="block text-gray-700">10-digit mobile number</label>
                            <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="8376905677">
                        </div>
                        <div>
                            <label class="block text-gray-700">Pincode</label>
                            <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="110044">
                        </div>
                        <div>
                            <label class="block text-gray-700">Locality</label>
                            <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Molarband market, Badarpur">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-gray-700">Address (Area and Street)</label>
                            <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Gali no.8, house no.18, first floor, molarband ext, badarpur">
                        </div>
                        <div>
                            <label class="block text-gray-700">City/District/Town</label>
                            <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="New Delhi">
                        </div>
                        <div>
                            <label class="block text-gray-700">State</label>
                            <select class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>Delhi</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
</body>
</html>
