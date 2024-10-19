<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Addresses</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
</head>
<body>
<?php include "header.php"; ?>
<div class="container" style="margin-top: 6rem;">
    <h2 class="mb-4">Manage Your Addresses</h2>

    <!-- Form to add a new address -->
    <form id="address-form" class="mb-5">
        <div class="card">
            <div class="card-header">
                <h5>Add New Address</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <!-- Form fields here -->
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
                <button type="submit" class="btn btn-primary">Add Address</button>
            </div>
        </div>
    </form>

    <!-- Display existing addresses -->
    <h3>Your Saved Addresses</h3>
    <div class="row" id="address-list">
        <!-- Addresses will be appended here dynamically -->
    </div>
</div>

<script>
$(document).ready(function() {
    // Fetch and display addresses on page load
    fetchAddresses();

    // Handle form submission
    $('#address-form').on('submit', function(event) {
        event.preventDefault();
        var formData = $(this).serialize(); // Collect all form fields

        $.ajax({
            url: 'manage_addresses.php', // Point to the same PHP file
            type: 'POST',
            data: formData + '&action=add',
            success: function(response) {
                $('#address-form')[0].reset(); // Reset form fields
                fetchAddresses(); // Reload the address list

                // Use SweetAlert for success message
                swal({
                    title: "Success!",
                    text: response, // Message from the server
                    icon: "success",
                    button: "OK",
                });
            },
            error: function() {
                // Use SweetAlert for error message
                swal({
                    title: "Error!",
                    text: "An error occurred while adding the address.",
                    icon: "error",
                    button: "OK",
                });
            }
        });
    });

    // Function to fetch and display addresses
    function fetchAddresses() {
        $.ajax({
            url: 'manage_addresses.php', // PHP file handling fetching addresses
            type: 'POST',
            data: {action: 'fetch'},
            success: function(response) {
                $('#address-list').html(response); // Update the address list with response
            }
        });
    }

    // Handle address deletion
    $(document).on('click', '.delete-address', function() {
        var index = $(this).data('index'); // Get the index from data attribute

        $.ajax({
            url: 'manage_addresses.php',
            type: 'POST',
            data: {action: 'delete', index: index},
            success: function(response) {
                fetchAddresses(); // Reload the address list

                // Use SweetAlert for success message
                swal({
                    title: "Deleted!",
                    text: response, // Message from the server
                    icon: "success",
                    button: "OK",
                });
            },
            error: function() {
                // Use SweetAlert for error message
                swal({
                    title: "Error!",
                    text: "An error occurred while deleting the address.",
                    icon: "error",
                    button: "OK",
                });
            }
        });
    });
});

</script>
</body>
</html>
