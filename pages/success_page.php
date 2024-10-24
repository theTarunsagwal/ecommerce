<?php
session_start();
$con = new mysqli("localhost", "root", "", "ecommerce");
$con_userside = new mysqli('localhost', 'root', '', 'user_side');
$con_wish = new mysqli('localhost', 'root', '', 'wishlist_user');

if (!isset($_SESSION['google_loggedin'])) {
    header('Location: signup.php');
    exit;
}

try {
    $full_details = $_SESSION['full_details'];
    $sub = $full_details['sub'];
    $name = $full_details['name'];
    $given = $full_details['given_name'];
    $pic = $full_details['picture'];
    $email = $full_details['email'];
    $email_v = $full_details['email_verified'];

    // Check if Google user exists
    $check_user = $con->prepare("SELECT * FROM google_user WHERE email = ? OR sub = ?");
    $check_user->bind_param("ss", $email, $sub);
    $check_user->execute();
    $google_user_result = $check_user->get_result();

    if ($google_user_result->num_rows) {
        // Existing user
        $existing_google_user = $google_user_result->fetch_assoc();
        $_SESSION['id'] = $existing_google_user['id'];
        $_SESSION['name'] = $existing_google_user['name'];
        $_SESSION['email'] = $existing_google_user['email'];

        // Fetch the corresponding record from user_data
        $fetch_user_data = $con->prepare("SELECT * FROM user_data WHERE email = ?");
        $fetch_user_data->bind_param("s", $email);
        $fetch_user_data->execute();
        $user_data_result = $fetch_user_data->get_result();

        if ($user_data_result->num_rows) {
            $user_data = $user_data_result->fetch_assoc();
            $_SESSION['id'] = $user_data['id'];
            $_SESSION['name'] = $user_data['name'];
            $_SESSION['email'] = $user_data['email'];
        } else {
            // If user data is missing, insert it
            $insert_user = $con->prepare("INSERT INTO user_data (name, image, email) VALUES (?,?,?)");
            $insert_user->bind_param("sss", $name, $pic, $email);
            if ($insert_user->execute()) {
                $_SESSION['id'] = $con->insert_id;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
            } else {
                throw new Exception("Error inserting user data: " . $insert_user->error);
            }
        }

        echo "<script>alert('Welcome back! Redirecting to index page.');</script>";
    } else {
        // New user registration
        $g_user = $con->prepare("INSERT INTO google_user (sub, name, given_name, picture, email, email_verify) VALUES (?,?,?,?,?,?)");
        $g_user->bind_param("ssssss", $sub, $name, $given, $pic, $email, $email_v);
        if (!$g_user->execute()) {
            throw new Exception("Error inserting Google user: " . $g_user->error);
        }

        $insert_user = $con->prepare("INSERT INTO user_data (name, image, email) VALUES (?,?,?)");
        $insert_user->bind_param("sss", $name, $pic, $email);
        if (!$insert_user->execute()) {
            throw new Exception("Error inserting user data: " . $insert_user->error);
        }

        // Get inserted user's ID
        $user_od = $con->insert_id;
        $_SESSION['id'] = $user_od;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;

        $table_name = 'user_name_' . mysqli_real_escape_string($con_userside, $user_od);

        // Create user-specific table
        $create_table_query = "
            CREATE TABLE IF NOT EXISTS `$table_name` (
                id INT UNIQUE AUTO_INCREMENT,
                pr_id INT,
                name VARCHAR(300) NOT NULL,
                image TEXT NOT NULL,
                price VARCHAR(30) NOT NULL,
                qty INT default 1,
                PRIMARY KEY (id)
            )";
        
        if ($con_userside->query($create_table_query)) {
            $table_wish = 'wish_name_' . mysqli_real_escape_string($con_wish, $user_od);
            $create_table_wish = "
                CREATE TABLE IF NOT EXISTS `$table_wish` (
                    id INT UNIQUE,
                    name VARCHAR(300) NOT NULL,
                    product_img TEXT NOT NULL,
                    price INT NOT NULL
                )";
            $con_wish->query($create_table_wish);

            echo "<script>alert('User registered successfully! Redirecting to index page.');</script>";
        } else {
            throw new Exception("Error creating user-specific tables.");
        }
    }

    // Redirect all successfully logged-in users (new or existing) to index.php
    header("Location: index.php");
    exit();

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $con->close();
    $con_userside->close();
    $con_wish->close();
}
?>