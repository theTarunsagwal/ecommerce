<?php
  $con = mysqli_connect('localhost','root','','ecommerce');
//   $qury =mysqli_query($con,'select * from user_data');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/Exception.php";
require "PHPMailer/src/SMTP.php";

  if(isset($_POST['sub'])){
	$user=$_POST['user'];
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

	
	$query= mysqli_query($con,"insert into user_data (name,email,password) values ('$user','$email','$pass')");
	if($query){
		echo "<script>alert('thankyou for join')</script>";
		header("Location:loging.php");
	}
	else{
		echo "<script>alert('Write UNIQUE Password and Email already insert ')</script>";
	}
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
<img src="./img/logo.png" alt="">
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