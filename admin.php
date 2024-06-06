<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'ecommerce');
$data = mysqli_query($con, 'SELECT * FROM user_data');

if (isset($_POST['del'])) {
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
</head>
<body>
    <h1>name<?php echo $_SESSION['name']; ?></h1>
    <form method="POST">
        <input type="text" name="text" placeholder="enter name" />
        <input type="submit" name="sub" />
    </form>
    <table border="1">
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
                            <button type="submit" value="<?php echo $srch['email']; ?>" name="del">delete</button>
                        </form>
                    </td>
                </tr>
                <?php
            }
        } else {
            while ($comp = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?php echo $comp['id']; ?></td>
                    <td><?php echo $comp['name']; ?></td>
                    <td><?php echo $comp['email']; ?></td>
                    <td><?php echo $comp['password']; ?></td>
                    <td>
                        <form method="post">
                            <button type="submit" value="<?php echo $comp['email']; ?>" name="del">delete</button>
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
