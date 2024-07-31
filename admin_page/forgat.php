<?php
$con = mysqli_connect('localhost','root','','ecommerce');
if(isset($_POST['sub'])){
    $checkname=$_POST['user'];
	$qurys = mysqli_query($con,"select * from user_data where name='$checkname'");
    if($fetch = mysqli_fetch_array($qurys)){
        $_SESSION["user_data"] = $fetch['name'];
        header("Location:password.php?name='$checkname'");
    }else{
        echo "
				<script>
				alert('Please Enter a Valid username or email')
	</script>
			";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="./css_admin_page/loging.css">
</head>
<body>
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
					<label for="username">Username</label>
					<input type="text" name="user" id="username" placeholder="">
				</div>
				<button class="sign" name='sub'>Submit</button>
			</form>

			<p class="signup">Do you have an account?
				<a rel="noopener noreferrer" href="loging.php" class="">Login</a> oR
				<a rel="noopener noreferrer" href="signup.php" class="">Sign up</a>
			</p>
		</div>
	</div>

</body>
</html>