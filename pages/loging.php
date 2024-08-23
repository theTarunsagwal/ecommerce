<?php
session_start();
$con = mysqli_connect('localhost','root','','ecommerce');
$con_userside = mysqli_connect('localhost', 'root', '', 'user_side');

if(isset($_POST['sub'])){
	$user = $_POST['user'];
	$pswd= $_POST['pswd'];
	$qury = mysqli_query($con,"select * from admin where email='$user' and password='$pswd'");
	$qurys = mysqli_query($con,"select * from user_data where (name='$user' || email='$user') and password='$pswd'");
	$qury_set="update user_data set last_login = now() where name='$user' || email='$user' ";
	$qury_admin="update admin set last_login = now() where name='$user' || email='$user' ";
	if($qury || $qurys){
		if($fetch = mysqli_fetch_array($qury)){
			$_SESSION['adminname']= $fetch['name'];
			$qury_time = mysqli_query($con,$qury_admin);
			header('location:../dist/index.php');
		}else if($fetchs = mysqli_fetch_array($qurys)){
            $_SESSION['name'] = $fetchs['name'];
            $_SESSION['id'] = $fetchs['id'];
            $_SESSION['email'] = $fetchs['email'];

			$qury_time = mysqli_query($con,$qury_set);
			header('location: index.php');
			exit();
		}
		else{
			echo "
				<script>
				alert('Please Enter a Valid Email & Password')
	</script>
			";
		}
	} 
	else{
		echo "Error";
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
	<a href="index.php">
	<img src="./img/logo_black.png" alt="">
	</a>
	</div>
	<div class="container">
		<div class="form-container">
			<p class="title">Login</p>
			<form class="form" method="POST">
				<div class="input-group">
					<label for="username">Username</label>
					<input type="text" name="user" id="username" placeholder="">
				</div>
				<div class="input-group">
					<label for="password">Password</label>
					<input type="password" name="pswd" id="password" placeholder="">
					<div class="forgot">
						<a rel="noopener noreferrer" href="forgat.php">Forgot Password ?</a>
					</div>
				</div>
				<button class="sign" name='sub'>Sign in</button>
			</form>

			<p class="signup">Don't have an account?
				<a rel="noopener noreferrer" href="signup.php" class="">Sign up</a>
			</p>
		</div>
	</div>

</body>

</html>