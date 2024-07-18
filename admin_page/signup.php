<?php
  $con = mysqli_connect('localhost','root','','ecommerce');
//   $qury =mysqli_query($con,'select * from user_data');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/Exception.php";
require "PHPMailer/src/SMTP.php";

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['sub'])) {
    $user = $_POST['user'];
    $email = $_POST['email'];
    $pass = $_POST['pswd'];
    
    $mail= new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->SMTPAuth=true;
    $mail->Username="tarunsagwal38@gmail.com";
    $mail->Password="nbzdfxjyeqydzwww";
    $mail->SMTPSecure="ssl";
    $mail->Port=465;
    $mail->setFrom('tarunsagwal38@gmail.com','Megumi Shoplift');
    $mail->addAddress($email);
    $mail->Subject="Welcome to Megumi shoplift";
    $mail->Body="<h1>  $user  thankyou to join a shoplift <br> I give you better experience </h1>"; 
    $mail->send();
    $query = mysqli_query($con, "INSERT INTO user_data (name, email, password) VALUES ('$user', '$email', '$pass')");

    if ($query) {
        // Sanitize the email to create a valid table name
        $table_name = 'user_name_' . $user ;

        // Create a table for the user
        $create_table_query = "
            CREATE TABLE IF NOT EXISTS $table_name (
                id INT UNIQUE AUTO_INCREMENT,
                name VARCHAR(300) NOT NULL,
                image TEXT NOT NULL,
                price VARCHAR(30) NOT NULL,
                PRIMARY KEY (id)
            )
        ";

        if (mysqli_query($con, $create_table_query)) {
            echo "User registered and table $table_name created successfully.";
        } else {
            echo "Error creating table: " . mysqli_error($con);
        }

        echo "<script>alert('Thank you for joining');</script>";
        header("Location: loging.php");
    } else {
        echo "Error inserting user: " . mysqli_error($con);
        echo "<script>alert('Write UNIQUE Password and Email already insert');</script>";
    }

    mysqli_close($con);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>megumi shoplift</title>
    <link rel="stylesheet" href="./css_admin_page/loging.css">
</head>
<body>
<div class="logo">
<img src="./img/logo_black.png" alt="">
	</div>
<div class="container">
<div class="form-container">
	<p class="title">Sign Up</p>
	<form class="form" method="POST">
		<div class="input-group">
			<label for="username">Username</label>
			<input type="text" name="user" id="username" placeholder="">
		</div>
        <div class="input-group">
			<label for="username">Email</label>
			<input type="email" name="email" id="username" placeholder="">
		</div>
		<div class="input-group">
			<label for="password">Password</label>
			<input type="password" name="pswd" id="password" placeholder="">
			</div>
		<div class="input-group">
            <label for="password">Confirm Password</label>
			<input type="password" name="cpswd" id="password" placeholder="">
		</div>
		<button class="sign" name="sub">submit</button>
	</form>
	
	<p class="signup">Already have a account?
		<a rel="noopener noreferrer" href="loging.php" class="">login</a>
	</p>
</div>
</div>

</body>
</html>