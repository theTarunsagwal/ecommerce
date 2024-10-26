
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="./css_admin_page/verfication.css">
</head>
<body>
<div class="logo">
    <img src="./img/logo_black.png" alt="">
</div>
<div class="main">
    <form method="POST" class="form"> 
        <div class="title"> Enter OTP</div> 
    <div class="title">Verification Code</div> 
    <p class="message">We have sent a verification code to your Email</p> 
    <div class="inputs"> 
    <input id="input1" name="otp1"  type="text" maxlength="1"> 
    <input id="input2" name="otp2"  type="text" maxlength="1"> 
    <input id="input3" name="otp3"  type="text" maxlength="1"> 
    <input id="input3" name="otp4"  type="text" maxlength="1"> 
    <input id="input3" name="otp5"  type="text" maxlength="1"> 
    <input id="input4" name="otp6"  type="text" maxlength="1"> 
</div> 
    <button class="action" name="verify">verify me</button>

</form>
    </div>
<?php
session_start();
if (isset($_POST['verify'])) {
    $entered_otp = $_POST['otp1'] . $_POST['otp2'] . $_POST['otp3'] . $_POST['otp4'] . $_POST['otp5'] . $_POST['otp6'] ;

    
    if ($entered_otp == $_SESSION['otp']) {
include 'connect.php';

        // $con = mysqli_connect('localhost', 'root', '', 'ecommerce');
        // $con_userside = mysqli_connect('localhost', 'root', '', 'user_side');
        // $con_wish = mysqli_connect('localhost', 'root', '', 'wishlist_user');

        $user_data = $_SESSION['user_data'];
        $user = $user_data['user'];
        $email = $user_data['email'];
        $pass = $user_data['pass'];
        $upload = $user_data['upload'];
        $upload_dir = $user_data['upload_dir'];

        $query = mysqli_query($con, "INSERT INTO user_data (name, email, password, image, created_at) VALUES ('$user', '$email', '$pass', '$upload', now())");

        if ($query) {
            $user_od = mysqli_insert_id($con);
            $table_name = 'user_name_' . mysqli_real_escape_string($con_userside, $user_od);

            $create_table_query = "
            CREATE TABLE IF NOT EXISTS $table_name (
                id INT UNIQUE AUTO_INCREMENT,
                pr_id INT,
                name VARCHAR(300) NOT NULL,
                image TEXT NOT NULL,
                price VARCHAR(30) NOT NULL,
                qty INT default 1,
                PRIMARY KEY (id)
            )";
            
            if (mysqli_query($con_userside, $create_table_query)) {
                $table_wish = 'wish_name_' . mysqli_real_escape_string($con_userside, $user_od);
                $create_table_wish = "
                CREATE TABLE IF NOT EXISTS $table_wish (
                    id INT UNIQUE,
                    name VARCHAR(300) NOT NULL,
                    product_img TEXT NOT NULL,
                    price int NOT NULL
                )";
                mysqli_query($con_wish, $create_table_wish);

                echo "<script>alert('User registered successfully!');</script>";
                header("Location: loging.php");
                exit();
            }
        } else {
            echo "<script>alert('Error registering user.');</script>";
        }

        mysqli_close($con);
    } else {
        echo "<script>alert('Invalid OTP');</script>";
    }
}
?>

</body>
</html>
