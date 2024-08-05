<?php
session_start();
if(isset($_SESSION['adminname'])){
 $con = mysqli_connect('localhost','root','','ecommerce');
 $qury = mysqli_query($con,'select * from contect ');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>megumi shoplift</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css_admin_page/header.css">
    <link rel="stylesheet" href="./css_admin_page/tabal.css">
    <link rel="stylesheet" href="./css_admin_page/form.css">
</head>

<body>
<?php include "profile_user.php" ?>

    <header>
        <div class="logo">
        <img src="./logo.png" alt="">
        </div>
        <div class="menu">
            <ul>
                <!-- <li><a href="index.php">Home</a></li> -->
                <li><a href="admin.php">user</a></li>
                <li><a href="wood.php">wood</a></li>
                <li><a href="contect.php" class="use">contect</a></li>
            </ul>
        </div>
        <i class='bx bx-menu' onclick="menu()"></i>
        <a href="logout.php">
            <button class="Btn">
                <div class="sign"><svg viewBox="0 0 512 512">
                        <path
                            d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z">
                        </path>
                    </svg></div>
                <div class="text">Logout</div>
            </button>
        </a>
    </header>
    <div class="menu_box">
            <ul>
                <li><a href="admin.php">user</a></li>
                <li><a href="wood.php">wood</a></li>
                <li><a href="contect.php" class="use">contect</a></li>
            </ul>
        </div>
    <section>
    <form method="POST" class="form_search">
            <input type="text" name="search" class="search_edit" placeholder="enter name" />
            <input type="submit" value="search" class="search_btn_edit" name="submit" />
        </form>
    <table class="table">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Email</td>
        </tr>
        <?php
        if(isset($_REQUEST['submit'])){
            $srch=$_POST['search'];
            $sub_srch=mysqli_query($con,"select * from contect where name like '%$srch%'");
            while($row=mysqli_fetch_array($sub_srch)){
        ?>
        <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['email']?></td>
        </tr>
        <?php
            }
        }else{
            while($data=mysqli_fetch_array($qury)){
        ?>
        <tr>
            <td><?php echo $data['id']?></td>
            <td><?php echo $data['name']?></td>
            <td><?php echo $data['email']?></td>
        </tr>
        <?php
            }
        }
        ?>
        </table>
    </section>
    <script src="wood.js"></script>
</body>
</html>
<?php
}else{
    header('location:loging.php');
}
?>