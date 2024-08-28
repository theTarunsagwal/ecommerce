<?php
$con = mysqli_connect('localhost', 'root', '', 'ecommerce');
$con_userside = mysqli_connect('localhost', 'root', '', 'user_side');
$con_wish = mysqli_connect('localhost', 'root', '', 'wishlist_user');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host = "smtp.gmail.com";
                    $mail->SMTPAuth = true;
                    $mail->Username = "tarunsagwal38@gmail.com";
                    $mail->Password = "nbzdfxjyeqydzwww";
                    $mail->SMTPSecure = "ssl";
                    $mail->Port = 465;
                    $mail->setFrom('tarunsagwal38@gmail.com', 'Megumi Shoplift');
                    $mail->addAddress($email);
                    $mail->Subject = "Welcome to Megumi Shoplift";
                    $mail->Body = "<h1>$user, thank you for joining Shoplift. We hope you have a great experience!</h1>";
                    $mail->send();
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }

                $qry_data = "select * from user_data where name='$user' and email='$email'";
                $result = mysqli_query($con, $qry_data);

                 if (mysqli_num_rows($result) > 0) {
                    echo "<script>alert('Write UNIQUE name and Email already inserted');</script>";
                 } else {
                $query = mysqli_query($con, "INSERT INTO user_data (name, email, password, image,created_at) VALUES ('$user', '$email', '$pass', '$upload', now())");
    
                if ($query) {
                    $user_od = mysqli_insert_id($con);
                    $table_name = 'user_name_' . mysqli_real_escape_string($con_userside, $user_od);
                    $create_table_query = "
                    CREATE TABLE IF NOT EXISTS $table_name (
                        id INT UNIQUE AUTO_INCREMENT,
                        name VARCHAR(300) NOT NULL,
                        image TEXT NOT NULL,
                        price VARCHAR(30) NOT NULL,
                        PRIMARY KEY (id)
                        )";
                        
                        if (mysqli_query($con_userside, $create_table_query)) {
                            echo "User registered and table $table_name created successfully.";
                            $user_od = mysqli_insert_id($con);
                    $table_wish = 'wish_name_' . mysqli_real_escape_string($con_userside, $user_od);

                        $create_table_wish = "
                        CREATE TABLE IF NOT EXISTS $table_wish (
                            id INT UNIQUE ,
                            name VARCHAR(300) NOT NULL,
                            product_img TEXT NOT NULL,
                            price int NOT NULL
                        )";
                        mysqli_query($con_wish,$create_table_wish);
                    } else {
                        echo "Error creating table: " . mysqli_error($con_userside);
                    }
                    header("Location: loging.php");
    
                    // echo "<script>alert('Thank you for joining');</script>";
                } else {
                    echo "<script>alert('Write UNIQUE Password and Email already inserted');</script>";
                } 
            }
            } else {
                echo "<script>alert('Error uploading file.');</script>";
            }
        } else {
            echo "<script>alert('No file selected.');</script>";
        }
    } else {
        echo "<script>alert('password are not match');</script>";
    }

    mysqli_close($con);
}
?>
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
</body>
</html>
