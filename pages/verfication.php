<?php
session_start();
if (isset($_SESSION['name'])) {
    $user_ver = $_SESSION['name'];
    $con = mysqli_connect('localhost', 'root', '', 'ecommerce');
    $qurys = mysqli_query($con, "SELECT * FROM user_data WHERE name='$user_ver'");
    $user_data = mysqli_fetch_assoc($qurys);
    if(isset($_POST['sub'])){
        header("Location:password.php");
    }else{
        echo "
            <script>
                alert('Please Enter a Valid OTP')
            </script>
        ";
    }
} else {
    header("Location: check_username.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <link rel="stylesheet" href="./css_admin_page/verfication.css">
</head>
<body>
    <div class="logo">
        <img src="./img/logo_black.png" alt="">
    </div>
    <div class="main">
    <form method="POST" class="form"> 
        <div class="title">OTP</div> 
    <div class="title">Verification Code</div> 
    <p class="message">We have sent a verification code to your mobile number</p> 
    <div class="inputs"> 
        <input id="input1" type="text" maxlength="1"> 
    <input id="input2" type="text" maxlength="1"> 
    <input id="input3" type="text" maxlength="1"> 
    <input id="input4" type="text" maxlength="1"> 
</div> 
    <button class="action" name="sub">verify me</button>

</form>
    </div>
</body>
</html>
