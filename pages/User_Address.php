<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "ecommerce");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch the current user's ID from the session
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
} else {
    die("Error: User ID not found in session.");
}

// Handle adding a new address
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

    // Create the new address array
    $newAddress = [
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

    // Fetch existing addresses
    $query = mysqli_query($con, "SELECT address FROM user_data WHERE id = $user_id");
    $row = mysqli_fetch_assoc($query);
    $existingAddresses = $row['address'];

    // Decode the existing addresses JSON and handle invalid JSON or empty string
    $addresses = json_decode($existingAddresses, true);
    
    if (!is_array($addresses)) {
        $addresses = [];  // Initialize as empty array if not valid
    }

    // Append the new address
    $addresses[] = $newAddress;

    // Re-encode the address array as JSON
    $updatedAddressesJson = json_encode($addresses);

    // Update the database
    $stmt = $con->prepare("UPDATE user_data SET address = ? WHERE id = ?");
    $stmt->bind_param("si", $updatedAddressesJson, $user_id);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Address added successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error adding address: " . $stmt->error . "</div>";
    }

    $stmt->close();
}

// Retrieve addresses for display
// $query = mysqli_query($con, "SELECT address FROM user_data WHERE id = $user_id");
// $row = mysqli_fetch_assoc($query);
// $user_addresses = json_decode($row['address'], true);
// echo $row['address'];
// $user_addresses = [];
// var_dump($user_addresses);
// // Handle case where decoding fails or no addresses exist
// if (!is_array($user_addresses)) {
//     echo "found it addresses";
// }else{
//     echo "no addresses";
// }

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Addresses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include "header.php" ?>
<div class="container " style="margin-top: 6rem;">
    <h2 class="mb-4">Manage Your Addresses</h2>

    <!-- Form to add a new address -->
    <form method="POST" class="mb-5">
        <div class="card">
            <div class="card-header">
                <h5>Add New Address</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="firstName" id="firstName" required>
                    </div>
                    <div class="col-md-6">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lastName" id="lastName" required>
                    </div>
                    <div class="col-md-12">
                        <label for="addressLine1" class="form-label">Address Line 1</label>
                        <input type="text" class="form-control" name="addressLine1" id="addressLine1" required>
                    </div>
                    <div class="col-md-12">
                        <label for="addressLine2" class="form-label">Address Line 2</label>
                        <input type="text" class="form-control" name="addressLine2">
                    </div>
                    <div class="col-md-4">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" name="city" id="city" required>
                    </div>
                    <div class="col-md-4">
                        <label for="state" class="form-label">State</label>
                        <input type="text" class="form-control" name="state" id="state" required>
                    </div>
                    <div class="col-md-4">
                        <label for="zipCode" class="form-label">Zip Code</label>
                        <input type="text" class="form-control" name="zipCode" id="zipCode" required>
                    </div>
                    <div class="col-md-6">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" name="country" id="country" required>
                    </div>
                    <div class="col-md-6">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" required>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" name="submit" class="btn btn-primary">Add Address</button>
            </div>
        </div>
    </form>

    <!-- Display existing addresses -->
    <h3>Your Saved Addresses</h3>
    
    <div class="row">
    <?php  
$query = mysqli_query($con, "SELECT address FROM user_data WHERE id = $user_id");
$row = mysqli_fetch_assoc($query);
$user_addresses = json_decode($row['address'], true);

// Check if $user_addresses is a valid array
if (is_array($user_addresses)) {
    // Loop through each item in the array
    foreach ($user_addresses as $key => $address) {
        // Skip any key that isn't a number (like 'fname', 'lname', etc.)
        if (is_numeric($key)) {
?>
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                              <?php
                               echo $address['fname'] . " " . $address['lname'] . "<br>";
                              ?>
                             </h5>
                            <p class="card-text">
                               <?php  
                                echo "Address: " . $address['address'] . "<br>";
                                echo "City: " . $address['city'] . "<br>";
                                echo "State: " . $address['state'] . "<br>";
                                echo "Country: " . $address['country'] . "<br>";
                                ?>
                                <strong>Phone:</strong> <?php
                                echo $address['phone'] . "<br><br>";
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            }
    }
} else {
    echo "No addresses found.";
}
?>
            <!-- <p>No addresses found. Please add one using the form above.</p> -->
    </div>
</div>
<?php include "footer.php" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>