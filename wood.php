<?php
 session_start();
 if(isset($_SESSION['adminname'])){
 $con =mysqli_connect('localhost','root','','ecommerce');   
$data = mysqli_query($con, 'SELECT * FROM wood');
$data_dining = mysqli_query($con, 'SELECT * FROM dining_room');
$data_decor = mysqli_query($con, 'SELECT * FROM decor_art');
if(isset($_POST['del'])){
    $delete=$_POST['del'];
    $dstry= mysqli_query($con,"delete from wood where  id='$delete' ");
}
if(isset($_POST['del_decor'])){
    $delete_decor=$_POST['del_decor'];
    $dstry= mysqli_query($con,"delete from decor_art where  id='$delete_decor' ");
}
if(isset($_POST['del_dining'])){
    $delete_dining=$_POST['del_dining'];
    $dstry_dining= mysqli_query($con,"delete from dining_room where  id='$delete_dining' ");
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>megumi shoplift</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/form.css ">
    <link rel="stylesheet" href="./css/tabal.css ">
</head>

<body>
    <header>
        <div class="logo">
            <img src="./img_ecommerce/logo.png" alt="">
        </div>
        <div class="menu">
            <ul>
                <li><a href="admin.php">user</a></li>
                <li><a href="wood.php" class="use">wood</a></li>
                <li><a href="contect.php">contect</a></li>
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
                <li><a href="wood.php" class="use">wood</a></li>
                <li><a href="contect.php">contect</a></li>
            </ul>
        </div>
    <section>
        <div class="Bar_Furniture">
            <h1>Bar Furniture</h1>
            <div class="container">
                <div class="form-container">
                    <?php
                        if(isset($_POST['sub'])){
                            $imgname= $_POST['name'];  
                            $price = $_POST['price'];
                            $detale = $_POST['detale'];
                            if(isset($_FILES['upload'])){
                                $upload = $_FILES['upload']['name'];
                                $tmp_upload =$_FILES['upload']['tmp_name'];
                                move_uploaded_file($tmp_upload,'upload/'.$upload);
                            $qurry = mysqli_query($con,"INSERT INTO wood (image_name,price,image,about) VALUES ('$imgname','$price','$upload','$detale');");
                            if($qurry){
                                echo "<script>alert('upload scussefull')</script>";
                            }
                            else{
                                echo "<script>alert('Error')</script>";
                            }
                                }
                                else{
                                    echo "Error";
                                    }
                                
                        }
                    
                    ?>
                    <!-- <p class="title"></p> -->
                    <form class="form" method="POST" enctype="multipart/form-data">
                        <div class="input-group">
                            <label for="username">Image Name:-</label>
                            <input type="text" name="name" id="username" placeholder="enter image name">
                        </div>
                        <div class="input-group">
                            <label for="password">Price:-</label>
                            <input type="number" name="price" id="password" placeholder="enter price">
                        </div>
                        <div class="input-group">
                            <label for="img">Image detaile:-</label>
                            <textarea name="detale" placeholder="enter image name" rows="1" id="username"></textarea>
                        </div>
                        <div class="input-group">
                            <label for="img">Image Upload:-</label>
                            <input type="file" name="upload" id="password" placeholder="">
                        </div>
                        <div class="form-btn">
                            <button class="submit"  name='sub'>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section>
        <form method="POST" class="form_search">
            <input type="text" name="search" class="search_edit" placeholder="enter name" />
            <input type="submit" value="search" class="search_btn_edit" name="submit" />
        </form>

        <table class="table">
            <tr>
                <td>id</td>
                <td>image_name</td>
                <td>image</td>
                <td>about</td>
                <td>price</td>
                <td>delete</td>
            </tr>
            <?php
        if (isset($_REQUEST['submit'])) {
            $search = $_POST['search'];
            $qury = mysqli_query($con, "SELECT * FROM wood WHERE image_name LIKE '%$search%'");
            while ($row = mysqli_fetch_array($qury)) {
                ?>
            <tr>
                <td>
                    <?php echo $row['id']; ?>
                </td>
                <td>
                    <?php echo $row['image_name']; ?>
                </td>
                <td>
                    <?php echo $row['image']; ?>
                </td>
                <td>
                    <?php echo $row['about']; ?>
                </td>
                <td>
                    <?php echo $row['price']; ?>
                </td>
                <td>
                    <form method="post">
                        <button class="button" type="submit" value="<?php echo $row['id']; ?>" name="del">
                            <svg viewBox="0 0 448 512" class="svgIcon">
                                <path
                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                </path>
                            </svg>
                        </button>
                    </form>
                </td>
                <?php
            }
            }else {
                while ($comp = mysqli_fetch_array($data)) {
                ?>
            <tr>
                <td>
                    <?php echo $comp['id']; ?>
                </td>
                <td>
                    <?php echo $comp['image_name']; ?>
                </td>
                <td>
                    <?php echo $comp['image']; ?>
                </td>
                <td>
                    <?php echo $comp['about']; ?>
                </td>
                <td>
                    <?php echo $comp['price']; ?>
                </td>
                <td>
                    <form method="post">
                        <button class="button" type="submit" value="<?php echo $comp['id']; ?>" name="del">
                            <svg viewBox="0 0 448 512" class="svgIcon">
                                <path
                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                </path>
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
            <?php
            }
        }
        ?>
        </table>
    </section>
    <section>
        <div class="Bar_Furniture">
            <h1>Decor Art</h1>
            <div class="container">
                <div class="form-container">
                    <?php
                        if(isset($_POST['subs'])){
                            $de_name= $_POST['de_name'];  
                            $de_price = $_POST['de_price'];
                            $de_detale = $_POST['de_detale'];
                            if(isset($_FILES['decor'])){
                                $de_upload = $_FILES['decor']['name'];
                                $tmp_upload_decor =$_FILES['decor']['tmp_name'];
                                move_uploaded_file($tmp_upload_decor,'upload/'.$de_upload);
                            $qurry_de = mysqli_query($con,"INSERT INTO decor_art (decor_name,decor_price,decor_img,decor_about) VALUES ('$de_name','$de_price','$de_upload','$de_detale');");
                            if($qurry_de){
                                echo "<script>alert('upload scussefull')</script>";
                            }
                            else{
                                echo "<script>alert('Error')</script>";
                            }
                                }
                                else{
                                    echo "Error";
                                    }
                                
                        }
                    
                    ?>
                    <!-- <p class="title"></p> -->
                    <form class="form" method="POST" enctype="multipart/form-data">
                        <div class="input-group">
                            <label for="username">decor Name:-</label>
                            <input type="text" name="de_name" id="username" placeholder="enter image name">
                        </div>
                        <div class="input-group">
                            <label for="password">Price:-</label>
                            <input type="number" name="de_price" id="password" placeholder="enter price">
                        </div>
                        <div class="input-group">
                            <label for="img">decor detaile:-</label>
                            <textarea name="de_detale" placeholder="enter image name" rows="1" id="username"></textarea>
                        </div>
                        <div class="input-group">
                            <label for="img">decor Upload:-</label>
                            <input type="file" name="decor" id="password" placeholder="">
                        </div>
                        <div class="form-btn">
                            <button class="submit" name='subs'>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section>
        <form method="POST" class="form_search">
            <input type="text" name="search_decor" class="search_edit" placeholder="enter name" />
            <input type="submit" value="search" class="search_btn_edit" name="submit_decor" />
        </form>

        <table class="table">
            <tr>
                <td>id</td>
                <td>decor_name</td>
                <td>image</td>
                <td>about</td>
                <td>price</td>
                <td>delete</td>
            </tr>
            <?php
        if (isset($_REQUEST['submit_decor'])) {
            $search = $_POST['search_decor'];
            $qury_decor = mysqli_query($con, "SELECT * FROM decor_art WHERE decor_name LIKE '%$search%'");
            while ($row_decor = mysqli_fetch_array($qury_decor)) {
                ?>
            <tr>
                <td>
                    <?php echo $row_decor['id']; ?>
                </td>
                <td>
                    <?php echo $row_decor['decor_name']; ?>
                </td>
                <td>
                    <?php echo $row_decor['decor_img']; ?>
                </td>
                <td>
                    <?php echo $row_decor['decor_about']; ?>
                </td>
                <td>
                    <?php echo $row_decor['decor_price']; ?>
                </td>
                <td>
                    <form method="post">
                        <button class="button" type="submit" value="<?php echo $row_decor['id']; ?>" name="del_decor">
                            <svg viewBox="0 0 448 512" class="svgIcon">
                                <path
                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                </path>
                            </svg>
                        </button>
                    </form>
                </td>
                <?php
            }
            }else {
                while ($comp_decor = mysqli_fetch_array($data_decor)) {
                ?>
            <tr>
                <td>
                    <?php echo $comp_decor['id']; ?>
                </td>   
                <td>
                    <?php echo $comp_decor['decor_name']; ?>
                </td>
                <td>
                    <?php echo $comp_decor['decor_img']; ?>
                </td>
                <td>
                    <?php echo $comp_decor['decor_about']; ?>
                </td>
                <td>
                    <?php echo $comp_decor['decor_price']; ?>
                </td>
                <td>
                    <form method="post">
                        <button class="button" type="submit" value="<?php echo $comp_decor['id']; ?>" name="del_decor">
                            <svg viewBox="0 0 448 512" class="svgIcon">
                                <path
                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                </path>
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
            <?php
            }
        }
        ?>
        </table>
    </section>
    <section>
        <div class="Bar_Furniture">
            <h1>Dining room</h1>
            <div class="container">
                <div class="form-container">
                    <?php
                        if(isset($_POST['sub_dining'])){
                            $dining_name= $_POST['dining_name'];  
                            $dining_price = $_POST['dining_price'];
                            $dining_detale = $_POST['dining_detale'];
                            if(isset($_FILES['dining'])){
                                $dining_upload = $_FILES['dining']['name'];
                                $tmp_upload_dining =$_FILES['dining']['tmp_name'];
                                move_uploaded_file($tmp_upload_dining,'upload/'.$dining_upload);
                            $qurry_dining = mysqli_query($con,"INSERT INTO dining_room (dining_name,dining_price,dining_image,dining_about) VALUES ('$dining_name','$dining_price','$dining_upload','$dining_detale');");
                            if($qurry_dining){
                                echo "<script>alert('upload scussefull')</script>";
                            }
                            else{
                                echo "<script>alert('Error')</script>";
                            }
                                }
                                else{
                                    echo "Error";
                                    }
                                
                        }
                    
                    ?>
                    <!-- <p class="title"></p> -->
                    <form class="form" method="POST" enctype="multipart/form-data">
                        <div class="input-group">
                            <label for="username">dining Name:-</label>
                            <input type="text" name="dining_name" id="username" placeholder="enter image name">
                        </div>
                        <div class="input-group">
                            <label for="password">Price:-</label>
                            <input type="number" name="dining_price" id="password" placeholder="enter price">
                        </div>
                        <div class="input-group">
                            <label for="img">dining detaile:-</label>
                            <textarea name="dining_detale" placeholder="enter image name" rows="1" id="username"></textarea>
                        </div>
                        <div class="input-group">
                            <label for="img">dining Upload:-</label>
                            <input type="file" name="dining" id="password" placeholder="">
                        </div>
                        <div class="form-btn">
                            <button class="submit" name='sub_dining'>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section>
        <form method="POST" class="form_search">
            <input type="text" name="search_dining" class="search_edit" placeholder="enter name" />
            <input type="submit" value="search" class="search_btn_edit" name="submit_dining" />
        </form>

        <table class="table">
            <tr>
                <td>id</td>
                <td>decor_name</td>
                <td>image</td>
                <td>about</td>
                <td>price</td>
                <td>delete</td>
            </tr>
            <?php
        if (isset($_REQUEST['submit_dining'])) {
            $search_dining = $_POST['search_dining'];
            $qury_dining = mysqli_query($con, "SELECT * FROM dining_room WHERE dining_name LIKE '%$search_dining%'");
            while ($row_dining = mysqli_fetch_array($qury_dining)) {
                ?>
            <tr>
                <td>
                    <?php echo $row_dining['id']; ?>
                </td>
                <td>
                    <?php echo $row_dining['dining_name']; ?>
                </td>
                <td>
                    <?php echo $row_dining['dining_image']; ?>
                </td>
                <td>
                    <?php echo $row_dining['dining_about']; ?>
                </td>
                <td>
                    <?php echo $row_dining['dining_price']; ?>
                </td>
                <td>
                    <form method="post">
                        <button class="button" type="submit" value="<?php echo $row_dining['id']; ?>" name="del_dining">
                            <svg viewBox="0 0 448 512" class="svgIcon">
                                <path
                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                </path>
                            </svg>
                        </button>
                    </form>
                </td>
                <?php
            }
            }else {
                while ($comp_dining = mysqli_fetch_array($data_dining)) {
                ?>
            <tr>
                <td>
                    <?php echo $comp_dining['id']; ?>
                </td>   
                <td>
                    <?php echo $comp_dining['dining_name']; ?>
                </td>
                <td>
                    <?php echo $comp_dining['dining_image']; ?>
                </td>
                <td>
                    <?php echo $comp_dining['dining_about']; ?>
                </td>
                <td>
                    <?php echo $comp_dining['dining_price']; ?>
                </td>
                <td>
                    <form method="post">
                        <button class="button" type="submit" value="<?php echo $comp_dining['id']; ?>" name="del_dining">
                            <svg viewBox="0 0 448 512" class="svgIcon">
                                <path
                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                </path>
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
            <?php
            }
        }
        ?>
        </table>
    </section>
    <!-- Living Room     -->
     <script src="wood.js"></script>
</body>
</html>
<?php
 }else{
     header("location:loging.php");
 }
 ?>