<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Username</title>
    <link rel="stylesheet" href="./css_admin_page/loging.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <div class="logo">
        <a href="loging.php"><img src="./img/logo_black.png" alt=""></a>
    </div>
    <div class="container">
        <div class="form-container">
            <p class="title">Check Email</p>
            <form class="form" method="POST">
                <div class="input-group">
                    <label for="username">Email</label>
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
    <?php
session_start();
include 'connect.php';
// $con = mysqli_connect('localhost', 'root', '', 'ecommerce');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/Exception.php";
require "PHPMailer/src/SMTP.php";

if (isset($_POST['sub'])) {
    $checkname = mysqli_real_escape_string($con, $_POST['user']);
    $qurys = mysqli_query($con, "SELECT * FROM user_data WHERE email='$checkname'");

    if ($fetch = mysqli_fetch_array($qurys)) {
        $_SESSION["email"] = $fetch['email'];
        $_SESSION["name"] = $fetch['name'];

        // Generate OTP
        $otp = rand(100000, 999999);
        $_SESSION["otp"] = $otp;

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "tarunsagwal38@gmail.com"; // Replace with your email
            $mail->Password = "plbpjvdztqmriksx";  // Replace with your email password or app-specific password
            $mail->SMTPSecure = "ssl";
            $mail->Port = 465;
            $mail->setFrom('megumi35guro@gmail.com', 'Megumi Shoplift'); // Replace with your email and name
            $mail->addAddress($checkname);
            $mail->isHTML(true);
            $mail->Subject = "Your OTP for Megumi Shoplift";
            $mail->Body = "<h1>Your OTP is: $otp</h1>";

            $mail->send();
            echo "OTP has been sent to your email.";

            header("Location: verfication.php");
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        ?>
        <script>
               swal("Email not Match", "Please Enter a Valid Email", "error");
           </script>
           <?php
        // echo "<script>alert('Please Enter a Valid username or email');</script>";
    }
}
?>
</body>
</html>
