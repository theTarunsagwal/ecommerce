<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'ecommerce');

if (isset($_POST['sub'])) {
    $checkname = mysqli_real_escape_string($con, $_POST['user']);
    $qurys = mysqli_query($con, "SELECT * FROM user_data WHERE name='$checkname' || email='$checkname'");

    if ($fetch = mysqli_fetch_array($qurys)) {
        $_SESSION["name"] = $fetch['name'];
        header("Location: verfication.php");
        exit();
    } else {
        echo "<script>alert('Please Enter a Valid username or email')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Username</title>
    <link rel="stylesheet" href="./css_admin_page/loging.css">
</head>
<body>
    <div class="logo">
        <a href="loging.php"><img src="./img/logo_black.png" alt=""></a>
    </div>
    <div class="container">
        <div class="form-container">
            <p class="title">Check username</p>
            <form class="form" method="POST">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" name="user" id="username" placeholder="">
                </div>
                <button class="sign" name='sub'>Submit</button>
            </form>
            <p class="signup">
                Do you have an account?
                <a href="loging.php">Login</a> or
                <a href="signup.php">Sign up</a>
            </p>
        </div>
    </div>
</body>
</html>
