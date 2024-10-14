<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "ecommerce");

if (!$con) {
    die("Connection failed: Please try again later.");
}

if (isset($_SESSION['id'])) {
    $user_id = intval($_SESSION['id']);
} else {
    die("Error: User ID not found in session.");
}

// Function to sanitize inputs
function sanitize_input($data) {
    return htmlspecialchars(trim($data));
}

// Handle adding a new address
if (isset($_POST['submit'])) {
    $firstName = sanitize_input($_POST['firstName']);
    $lastName = sanitize_input($_POST['lastName']);
    $address1 = sanitize_input($_POST['addressLine1']);
    $address2 = sanitize_input($_POST['addressLine2']);
    $city = sanitize_input($_POST['city']);
    $state = sanitize_input($_POST['state']);
    $zipCode = sanitize_input($_POST['zipCode']);
    $country = sanitize_input($_POST['country']);
    $phone = sanitize_input($_POST['phoneNumber']);

    $stmt = $con->prepare("SELECT address FROM user_data WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $existingAddresses = $row['address'];
    $addresses = json_decode($existingAddresses, true);
    if (!is_array($addresses)) {
        $addresses = [];
    }

    // Check if the user has 3 addresses
    if (count($addresses) >= 3) {
        echo "<div class='alert alert-danger'>You can only have a maximum of 3 addresses.</div>";
    } else {
        // Add the new address
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

        $addresses[] = $newAddress;
        $updatedAddressesJson = json_encode($addresses);

        $updateStmt = $con->prepare("UPDATE user_data SET address = ? WHERE id = ?");
        $updateStmt->bind_param("si", $updatedAddressesJson, $user_id);

        if ($updateStmt->execute()) {
            echo "<div class='alert alert-success'>Address added successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error adding address: " . $updateStmt->error . "</div>";
        }

        $updateStmt->close();
    }

    $stmt->close();
}

// Handle address deletion
if (isset($_POST['delete'])) {
    $delete_index = intval($_POST['delete']);

    $stmt = $con->prepare("SELECT address FROM user_data WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $addresses = json_decode($row['address'], true);
    if (is_array($addresses) && isset($addresses[$delete_index])) {
        // Remove the address from the array
        unset($addresses[$delete_index]);
        $addresses = array_values($addresses); // Re-index the array

        // Update the addresses in the database
        $updatedAddressesJson = json_encode($addresses);

        $updateStmt = $con->prepare("UPDATE user_data SET address = ? WHERE id = ?");
        $updateStmt->bind_param("si", $updatedAddressesJson, $user_id);

        if ($updateStmt->execute()) {
            echo "<div class='alert alert-success'>Address deleted successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error deleting address: " . $updateStmt->error . "</div>";
        }

        $updateStmt->close();
    }

    $stmt->close();
}

function get_user_addresses($con, $user_id) {
    $stmt = $con->prepare("SELECT address FROM user_data WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return json_decode($row['address'], true);
}

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
<?php include "header.php"; ?>
<div class="container" style="margin-top: 6rem;">
    <h2 class="mb-4">Manage Your Addresses</h2>

    <!-- Form to add a new address -->
    <form method="POST" class="mb-5">
        <div class="card">
            <div class="card-header">
                <h5>Add New Address</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <!-- Form fields here (as in your original code) -->
                  
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
    $user_addresses = get_user_addresses($con, $user_id);

    // Check if $user_addresses is a valid array
    if (is_array($user_addresses) && !empty($user_addresses)) {
        foreach ($user_addresses as $key => $address) {
            ?>
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($address['fname']) . " " . htmlspecialchars($address['lname']) ?></h5>
                        <p class="card-text">
                            <?= "Address: " . htmlspecialchars($address['address']) ?><br>
                            <?= "City: " . htmlspecialchars($address['city']) ?><br>
                            <?= "State: " . htmlspecialchars($address['state']) ?><br>
                            <?= "Country: " . htmlspecialchars($address['country']) ?><br>
                            <strong>Phone:</strong> <?= htmlspecialchars($address['phone']) ?><br>
                        </p>
                        <!-- Delete button -->
                        <form method="POST" class="text-end">
                            <input type="hidden" name="delete" value="<?= $key ?>">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<p>No addresses found.</p>";
    }
    ?>
    </div>
</div>

<?php include "footer.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>