<?php
session_start();
if(isset($_SESSION['adminname'])){
$con = mysqli_connect('localhost', 'root', '', 'ecommerce');
$data = mysqli_query($con, 'SELECT * FROM user_data');

if(isset($_POST['del'])) {
    $email = $_POST['del'];
    $del = mysqli_query($con, "DELETE FROM user_data WHERE email='$email'");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>
<body>
    <a href="logout.php">
<button class="Btn">
  <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
  
  <div class="text">Logout</div>
</button>
</a>


    <h1 class="titel">Welcome Admin <span class="titel_admin" > <?php echo $_SESSION['adminname']; ?> </span></h1>
    <form method="POST" class="form">
        <input type="text" name="text" placeholder="enter name" />
        <input type="submit" name="sub" />
    </form>
    <table class="table">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Email</td>
            <td>Password</td>
            <td>Action</td>
        </tr>
        <?php
        if (isset($_REQUEST['sub'])) {
            $search = $_POST['text'];
            $qury = mysqli_query($con, "SELECT * FROM user_data WHERE name LIKE '%$search%'");
            while ($srch = mysqli_fetch_array($qury)) {
                ?>
                <tr>
                    <td><?php echo $srch['id']; ?></td>
                    <td><?php echo $srch['name']; ?></td>
                    <td><?php echo $srch['email']; ?></td>
                    <td><?php echo $srch['password']; ?></td>
                    <td>
                        <form method="post">
                            <button class="button" type="submit" value="<?php echo $srch['email']; ?>" name="del">
        <svg viewBox="0 0 448 512" class="svgIcon"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path></svg>
      </button>
                        </form>
                    </td>
                </tr>
                <?php
            }
        }else {
            while ($comp = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?php echo $comp['id']; ?></td>
                    <td><?php echo $comp['name']; ?></td>
                    <td><?php echo $comp['email']; ?></td>
                    <td><?php echo $comp['password']; ?></td>
                    <td>
                        <form method="post">
                            <button class="button" type="submit" value="<?php echo $comp['email']; ?>" name="del">
        <svg viewBox="0 0 448 512" class="svgIcon"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path></svg>
      </button>
                        </form>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</body>
</html>
<?php
}else{
    header('location:loging.php');
}
?>