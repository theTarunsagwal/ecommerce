<?php
    session_start();
    // echo $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Information</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        .img{
            height: 3rem;
            width: 3rem;
            border-radius: 50%;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div>
        <?php include 'header.php'; ?>
    </div>

    <div class="min-h-screen flex flex-col md:flex-row" style="margin-top:3rem">
        <!-- Sidebar -->
         <?php
         ob_start();

         $con = mysqli_connect("localhost", "root", "", "ecommerce");
         
         if (isset($_SESSION['name']) && isset($_SESSION['email'])) {
             $user = $_SESSION['name'];
             $user_email = $_SESSION['email'];
             $qury_user = mysqli_query($con, "SELECT * FROM user_data WHERE name = '$user' OR email = '$user_email'");
         ?>
        <div class="bg-white w-full md:w-64 p-6 mt-6">
        <?php
            if ($qury_user) {
               if (mysqli_num_rows($qury_user) > 0) {
                   while ($row = mysqli_fetch_array($qury_user)) {
                       ?>
            <div class="flex gap-2 items-center mb-8">
                <img class="img" src="./upload/<?php echo $row['image']; ?>" alt="loading...">
                <h2 class="text-xl font-light text-black"><?php echo $row['name']?></h2>
            <div>
                </div>
            </div>
            <?php } } } ?>
            <nav>
                <ul class="space-y-4">
                    <li>
                        <a href="OrderDetails.php" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
                            <i class='bx bx-home'></i>
                            <span>My Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
                            <i class='bx bx-user'></i>
                            <span class="text-blue-600">Profile Information</span>
                        </a>
                    </li>
                    <li>
                        <a href="./User_Address.php" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
                            <i class='bx bx-map'></i>
                            <span>Manage Addresses</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
    <?php
    $user = $_SESSION['name'];
    $user_email = $_SESSION['email'];
    $qury_edit = mysqli_query($con, "SELECT * FROM user_data WHERE name = '$user' OR email = '$user_email'");
    if ($qury_edit) {
        while ($edit_sec = mysqli_fetch_assoc($qury_edit)) {
    ?>
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md p-6 mt-6">
        <div class="d-flex align-items-center justify-between">
            <h2 class="text-2xl font-semibold">Personal Information</h2>
            <button type="button" id="editButton" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Edit
            </button>
        </div>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
                <label class="block text-gray-700">First Name</label>
                <input name="name" readonly type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo isset($edit_sec['name']) ? $edit_sec['name'] : 'Enter FirstName'; ?>">
            </div>
            <div>
                <label class="block text-gray-700">Mobile Number</label>
                <input name="mobile" readonly type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo isset($edit_sec['phone']) ? $edit_sec['phone'] : 'Enter phone number'; ?>">
            </div>
            <div>
                <label class="block text-gray-700">Email Address</label>
                <input name="email" readonly type="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo isset($edit_sec['email']) ? $edit_sec['email'] : 'Enter Email Address'; ?>">
            </div>
            <div>
                <label class="block text-gray-700">Password</label>
                <input name="lname" readonly type="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo isset($edit_sec['password']) ? $edit_sec['password'] : 'Enter LastName'; ?>">
            </div>
            <div>
                <label class="block text-gray-700">Your Gender :-<span class="ml-2">Male</span></label>
            </div>
        </div>
    </div>
    <?php } } ?>
    
    <form id="updateForm" class="hidden" method="POST">
        <div class="updateForm max-w-3xl mx-auto bg-white rounded-lg shadow-md p-6 mt-6">
            <h2 class="text-2xl font-semibold mb-4">Edit Personal Information</h2>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label class="block text-gray-700">First Name</label>
                    <input name="name" type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter FirstName">
                </div>
                <div>
                    <label class="block text-gray-700">Last Name</label>
                    <input name="lname" type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter LastName">
                </div>
                <div>
                    <label class="block text-gray-700">Your Gender</label>
                    <div class="flex space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="gender" value="Male">
                            <span class="ml-2">Male</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="gender" value="Female">
                            <span class="ml-2">Female</span>
                        </label>
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700">Email Address</label>
                    <input name="email" type="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Email@example.com">
                </div>
                <div>
                    <label class="block text-gray-700">Mobile Number</label>
                    <input name="mobile" type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Number">
                </div>
            </div>
            <button type="button" id="saveButton" class="mt-6 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Save Changes
            </button>
        </div>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#editButton').click(function() {
            $('#updateForm').toggleClass('hidden');
        });
        $('#saveButton').click(function(event) {
            event.preventDefault(); 
            $.ajax({
                url: 'update_user.php',
                type: 'POST',
                data: $('#updateForm').serialize(),
                success: function(response) {
                    alert('Update Success');
                },
                error: function(xhr, status, error) {
                    alert('Update Failed');
                }
            });
        });
    });
</script>
    </div>
    <?php }  ?>
</body>
</html>
