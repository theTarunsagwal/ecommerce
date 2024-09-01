<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="./css_admin_page/loging.css">
</head>
<body>
<?php
 session_start();
 $con = mysqli_connect('localhost','root','','ecommerce');
 if(isset($_SESSION['email'])) {
//   echo $_SESSION['name'];
if(isset($_POST['sub'])){
    $checkpswd=$_POST['pswd'];
    $check_pswd=$_POST['c_pswd'];
    if($checkpswd==$check_pswd){
        $username= $_SESSION['email'];
        $pswd=$_POST['pswd'];
        $update_qury=mysqli_query($con,"update user_data  SET password='$pswd' WHERE user_data.email='$username'");
        echo "
        <script>
        alert('successfully updated $username your password');
        </script>
        ";
        header('location:loging.php');
    }else{
        echo "
        <script>
        alert('Passwords do not match');
        </script>
        ";
    }
}
   ?>


	<div class="logo">
<a href="loging.php">
	<img src="./img/logo_black.png" alt="">

</a>
	</div>
	<div class="container">
		<div class="form-container">
			<p class="title">Check username</p>
			<form class="form" method="POST">
				<div class="input-group">
					<label for="username">Password</label>
					<input type="text" name="pswd" id="username" placeholder="">
				</div>
                <div class="input-group">
					<label for="username">Confirm Password</label>
					<input type="text" name="c_pswd" id="username" placeholder="">
				</div>
				<button class="sign" name='sub'>Submit</button>
			</form>
		</div>
	</div>
<?php } ?>
</body>
</html>