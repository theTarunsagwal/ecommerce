<?php
session_start();
// $con = mysqli_connect("localhost", "root", "", "ecommerce");
include 'connect.php';

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

// Handle fetching addresses
if (isset($_POST['action']) && $_POST['action'] === 'fetch') {
    $addresses = get_user_addresses($con, $user_id);

    if (is_array($addresses) && !empty($addresses)) {
        foreach ($addresses as $key => $address) {
            echo '<div class="col-md-6 mb-3">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . htmlspecialchars($address['fname']) . ' ' . htmlspecialchars($address['lname']) . '</h5>';
            echo '<p class="card-text">';
            echo '<strong>Address: </strong>' . htmlspecialchars($address['address']) . '<br>';
            echo '<strong>City: </strong>' . htmlspecialchars($address['city']) . '<br>';
            echo '<strong>State: </strong>' . htmlspecialchars($address['state']) . '<br>';
            echo '<strong>Country: </strong>' . htmlspecialchars($address['country']) . '<br>';
            echo '<strong>Phone: </strong>' . htmlspecialchars($address['phone']) . '<br>';
            echo '</p>';
            echo '<button class="btn btn-danger delete-address" data-index="' . $key . '">Delete</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "<p>No addresses found.</p>";
    }
    exit;
}

// Handle adding a new address
if (isset($_POST['action']) && $_POST['action'] === 'add') {
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
        echo "You can only have a maximum of 3 addresses.";
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
            echo "Address added successfully!";
        } else {
            echo "Error adding address: " . $updateStmt->error;
        }

        $updateStmt->close();
    }

    $stmt->close();
    exit;
}

// Handle deleting an address
if (isset($_POST['action']) && $_POST['action'] === 'delete') {
    $delete_index = intval($_POST['index']);

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
            echo "Address deleted successfully!";
        } else {
            echo "Error deleting address: " . $updateStmt->error;
        }

        $updateStmt->close();
    }

    $stmt->close();
    exit;
}

// Function to get user addresses
function get_user_addresses($con, $user_id) {
    $stmt = $con->prepare("SELECT address FROM user_data WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return json_decode($row['address'], true);
}
?>