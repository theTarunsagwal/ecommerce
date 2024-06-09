<?php
session_start();
if(isset($_SESSION['name'])){
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>megumi shoplift</title>
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>megumi shoplift</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="mobile.php">mobile</a></li>
                    <li><a href="grocery.php">grocery</a></li>
                    <li><a href="fashion.php">fashion</a></li>
                    <li><a href="electronics.php">electronics</a></li>
                    <li><a href="contact.php">beauty,toy & more</a></li>
                </ul>
            </nav>
            <form method="POST">
                <input type="search" name="search" placeholder="search" />
                <input type="submit" name="sub" value="search" />
            </form>
            <div class="icon_header">
                <i class='bx bx-user-circle' ></i>
                <i class='bx bx-menu' ></i>
            </div>
        </div>
    </header>
</body>

</html>

<?php
}else{
    header("location:loging.php");
}
?>