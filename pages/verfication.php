

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <link rel="stylesheet" href="./css_admin_page/verfication.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <div class="logo">
        <img src="./img/logo_black.png" alt="">
    </div>
    <div class="main">
    <form method="POST" class="form"> 
        <div class="title">OTP</div> 
    <div class="title">Verification Code</div> 
    <p class="message">We have sent a verification code to your email</p> 
    <div class="inputs"> 
    <input id="input1" name="otp1"  type="text" maxlength="1"> 
    <input id="input2" name="otp2"  type="text" maxlength="1"> 
    <input id="input3" name="otp3"  type="text" maxlength="1"> 
    <input id="input3" name="otp4"  type="text" maxlength="1"> 
    <input id="input3" name="otp5"  type="text" maxlength="1"> 
    <input id="input4" name="otp6"  type="text" maxlength="1"> 
</div> 
    <button class="action" name="sub">verify me</button>
</form>
    </div>
    <?php
session_start();
if (isset($_SESSION['email'])) {
    $otp = $_SESSION['otp'];
    $user_ver = $_SESSION['email'];
include 'connect.php';

    // $con = mysqli_connect('localhost', 'root', '', 'ecommerce');
    $qurys = mysqli_query($con, "SELECT * FROM user_data WHERE name='$user_ver'");
    $user_data = mysqli_fetch_assoc($qurys);
      if (isset($_POST['sub'])) {
        $entered_otp = $_POST['otp1'] . $_POST['otp2'] . $_POST['otp3'] . $_POST['otp4'] . $_POST['otp5'] . $_POST['otp6'] ;

        if ($entered_otp == $otp) {
            header("Location: password.php");
            exit();
        } else {
            echo "not found";
            ?>
            <script>
                swal("OTP Worng", "You clicked the button!", "error");
            </script>
            <?php
            
        }
    }
} else {
    header("Location: check_username.php");
    exit();
}
?>
</body>
</html>
