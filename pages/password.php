<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="./css_admin_page/loging.css">
</head>
<body>
<?php
 session_start();
include 'connect.php';
 
 if(isset($_SESSION['email'])) {
//   echo $_SESSION['name'];
if(isset($_POST['sub'])){
    $checkpswd=$_POST['pswd'];
    $check_pswd=$_POST['c_pswd'];
    if($checkpswd==$check_pswd){
        $username= $_SESSION['email'];
        $pswd=$_POST['pswd'];
        $update_qury=mysqli_query($con,"update user_data  SET password='$pswd' WHERE user_data.email='$username'");
        ?>
        <script>
            swal("success", "successfully updated $username your password", "success");
        </script>
        <?php
        header('location:loging.php');
    }else{
        ?>
        <script>
            swal("Password", "Passwords do not match", "error");
        </script>
        <?php
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