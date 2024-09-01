<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Megumi Shoplift</title>
    <link rel="stylesheet" href="./css_admin_page/loging.css">
</head>
<body>
<div class="logo">
    <img src="./img/logo_black.png" alt="">
</div>
<div class="container">
    <div class="form-container">
        <p class="title">Sign Up</p>
        <form class="form" method="POST" enctype="multipart/form-data">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="user" id="username" placeholder="" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="pswd" id="password" placeholder="" required>
            </div>
            <div class="input-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" name="cpswd" id="cpassword" placeholder="" required>
            </div>
            <div class="input-group">
                <label for="pfile">Upload Image</label>
                <input type="file" name="pfile" id="pfile" required>
            </div>
            <button class="sign" name="sub">Submit</button>
        </form>
        <p class="signup">Already have an account?
            <a rel="noopener noreferrer" href="loging.php">Login</a>
        </p>
    </div>
</div>
<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$con = mysqli_connect('localhost', 'root', '', 'ecommerce');
$con_userside = mysqli_connect('localhost', 'root', '', 'user_side');
$con_wish = mysqli_connect('localhost', 'root', '', 'wishlist_user');

require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/Exception.php";
require "PHPMailer/src/SMTP.php";

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['sub'])) {
    $user = $_POST['user'];
    $email = $_POST['email'];
    $pass = $_POST['pswd'];
    $c_pass = $_POST['cpswd'];
    
    if($pass == $c_pass){
        if (isset($_FILES['pfile'])) {
            $upload = $_FILES['pfile']['name'];
            $tmp_upload = $_FILES['pfile']['tmp_name'];
            $upload_dir = 'upload/' . $upload;
            
            if (move_uploaded_file($tmp_upload, $upload_dir)) {
                $qry_data = "SELECT * FROM user_data WHERE name='$user' OR email='$email'";
                $result = mysqli_query($con, $qry_data);

                if (mysqli_num_rows($result) > 0) {
                    echo "<script>alert('Username or Email already exists');</script>";
                } else {
                    // Generate OTP
                    $otp = rand(100000, 999999);
                    $_SESSION['otp'] = $otp;
                    $_SESSION['user_data'] = array(
                        'user' => $user,
                        'email' => $email,
                        'pass' => $pass,
                        'upload' => $upload,
                        'tmp_upload' => $tmp_upload,
                        'upload_dir' => $upload_dir,
                    );

                    // Send OTP email
                    $mail = new PHPMailer(true);
                    try {
                        $mail->isSMTP();
                        $mail->Host = "smtp.gmail.com";
                        $mail->SMTPAuth = true;
                        $mail->Username = "tarunsagwal38@gmail.com";
                        $mail->Password = "plbpjvdztqmriksx"; 
                        $mail->SMTPSecure = "ssl";
                        $mail->Port = 465;
                        $mail->setFrom('megumi35guro@gmail.com', 'Megumi Shoplift');
                        $mail->addAddress($email);
                        $mail->Subject = "Your OTP for Megumi Shoplift";
                        $mail->Body = "<h1>Your OTP is: $otp</h1>";
                        $mail->send();

                        header("Location: verify_otp.php");
                        exit();
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                }
            } else {
                echo "<script>alert('Error uploading file.');</script>";
            }
        } else {
            echo "<script>alert('No file selected.');</script>";
        }
    } else {
        echo "<script>alert('Passwords do not match');</script>";
    }
}
mysqli_close($con);
?>

</body>
</html>
