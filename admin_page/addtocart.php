<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'ecommerce'); // Include your database connection

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    echo $id;
    echo 'hello';
    $result = mysqli_query($con, "SELECT * FROM wood WHERE id = $id");
    $data_wood = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto mt-10">
    <?php if (isset($data_wood)) { ?>
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="./upload/<?php echo $data_wood['image']; ?>" alt="" class="w-full h-64 object-cover">
            <div class="p-4">
                <h5 class="text-xl font-semibold mb-2"><?php echo $data_wood['wood_name']; ?></h5>
                <p class="text-gray-600"><?php echo $data_wood['description']; ?></p>
                <!-- Add more wood details as needed -->
            </div>
        </div>
    <?php } else { ?>
        <p>No data found.</p>
    <?php } ?>
</div>

</body>
</html>
