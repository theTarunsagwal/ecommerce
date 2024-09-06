<?php
session_start();
         $con = mysqli_connect("localhost", "root", "", "ecommerce");
if (isset($_POST['name']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['gender']) && isset($_POST['mobile'])) {
    $name = $_POST['name'] . " " . $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];

    $user = $_SESSION['name'];
    $user_email = $_SESSION['email'];

    $query = mysqli_query($con, "UPDATE user_data SET name='$name', email='$email', gender='$gender', phone='$mobile' WHERE name='$user' OR email='$user_email'");

    if ($query) {
        echo "Data Updated Successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
