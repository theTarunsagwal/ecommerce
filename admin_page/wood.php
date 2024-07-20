<?php
 session_start();
 if(isset($_SESSION['adminname'])){
 $con =mysqli_connect('localhost','root','','ecommerce');   
$data = mysqli_query($con, 'SELECT * FROM wood');
$data_dining = mysqli_query($con, 'SELECT * FROM dining_room');
$data_decor = mysqli_query($con, 'SELECT * FROM decor_art');
$data_product = mysqli_query($con, 'SELECT * FROM new_product');
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
if(isset($_POST['del_product'])){
    $delete_product=$_POST['del_product'];
    $dstry_product= mysqli_query($con,"delete from new_product where  id='$delete_product' ");
}

if (isset($_POST['save'])) {
    // Sanitize and retrieve form data
    $id = $_POST['save'];
    $name = isset($_POST['ed_name']) ? mysqli_real_escape_string($con, $_POST['ed_name']) : '';
    $image = isset($_POST['ed_image']) ? mysqli_real_escape_string($con, $_POST['ed_image']) : '';
    $about = isset($_POST['ed_about']) ? mysqli_real_escape_string($con, $_POST['ed_about']) : '';
    $price = isset($_POST['ed_price']) ? mysqli_real_escape_string($con, $_POST['ed_price']) : '';

    // Update query
    $query = "UPDATE wood SET image_name='$name', image='$image', about='$about', price='$price' WHERE id='$id'";
    
    // Execute query
    $result = mysqli_query($con, $query);
    
    // Check for errors
    if (!$result) {
        die('Error updating wood: ' . mysqli_error($con));
    } else {
        echo "Wood updated successfully.";
    }
}

if (isset($_POST['save_de'])) {
    // Sanitize and retrieve form data
    $id = $_POST['save_de'];
    $name = isset($_POST['ed_name_decor']) ? mysqli_real_escape_string($con, $_POST['ed_name_decor']) : '';
    $image = isset($_POST['ed_image_decor']) ? mysqli_real_escape_string($con, $_POST['ed_image_decor']) : '';
    $about = isset($_POST['ed_about_decor']) ? mysqli_real_escape_string($con, $_POST['ed_about_decor']) : '';
    $price = isset($_POST['ed_price_decor']) ? mysqli_real_escape_string($con, $_POST['ed_price_decor']) : '';

    // Update query
    $query_de = "UPDATE decor_art SET decor_name='$name', decor_img='$image', decor_about='$about', decor_price='$price' WHERE id='$id'";
    
    // Execute query
    $result_de = mysqli_query($con, $query_de);
    
    // Check for errors
    if (!$result_de) {
        die('Error updating decor: ' . mysqli_error($con));
    } else {
        echo "Decor updated successfully.";
    }
}

if (isset($_POST['save_di'])) {
    // Sanitize and retrieve form data
    $id = $_POST['save_di'];
    $name = isset($_POST['ed_name_dining']) ? mysqli_real_escape_string($con, $_POST['ed_name_dining']) : '';
    $image = isset($_POST['ed_image_dining']) ? mysqli_real_escape_string($con, $_POST['ed_image_dining']) : '';
    $about = isset($_POST['ed_about_dining']) ? mysqli_real_escape_string($con, $_POST['ed_about_dining']) : '';
    $price = isset($_POST['ed_price_dining']) ? mysqli_real_escape_string($con, $_POST['ed_price_dining']) : '';

    // Update query
    $query_di = "UPDATE dining_room SET dining_name='$name', dining_image='$image', dining_about='$about', dining_price='$price' WHERE id='$id'";
    
    // Execute query
    $result_di = mysqli_query($con, $query_di);
    
    // Check for errors
    if (!$result_di) {
        die('Error updating dining room item: ' . mysqli_error($con));
    } else {
        echo "Dining room item updated successfully.";
    }
}

if (isset($_POST['save_new'])) {
    // Sanitize and retrieve form data
    $id = $_POST['save_new'];
    $name = isset($_POST['ed_name_new']) ? mysqli_real_escape_string($con, $_POST['ed_name_new']) : '';
    $image = isset($_POST['ed_image_new']) ? mysqli_real_escape_string($con, $_POST['ed_image_new']) : '';
    $about = isset($_POST['ed_about_new']) ? mysqli_real_escape_string($con, $_POST['ed_about_new']) : '';
    $price = isset($_POST['ed_price_new']) ? mysqli_real_escape_string($con, $_POST['ed_price_new']) : '';

    // Update query
    $query_new = "UPDATE new_product SET name='$name', img='$image', price='$price' WHERE id='$id'";
    
    // Execute query
    $result_new = mysqli_query($con, $query_new);
    
    // Check for errors
    if (!$result_new) {
        die('Error updating product  item: ' . mysqli_error($con));
    } else {
        echo "product item updated successfully.";
    }
}

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>megumi shoplift</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css_admin_page/header.css">
    <link rel="stylesheet" href="./css_admin_page/form.css ">
    <link rel="stylesheet" href="./css_admin_page/tabal.css ">
</head>

<body>
    <header>
        <div class="logo">
        <img src="./img/logo.png" alt="">
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
        <input type="text" name="search" class="search_edit" placeholder="Enter name">
        <input type="submit" value="Search" class="search_btn_edit" name="submit">
    </form>

    <table class="table">
        <tr>
            <td>ID</td>
            <td>Image Name</td>
            <td>Image</td>
            <td>About</td>
            <td>Price</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
        <?php
        if (isset($_POST['submit'])) {
            $search = $_POST['search'];
            $query = mysqli_query($con, "SELECT * FROM wood WHERE image_name LIKE '%$search%'");
        } else {
            $query = mysqli_query($con, "SELECT * FROM wood");
        }

        while ($row = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <form method="POST" enctype="multipart/form-data">
                    <td><?php echo $row['id']; ?></td>
                    <td><input type="text" name="ed_name" value="<?php echo $row['image_name']; ?>" readonly></td>
                    <td>
                        <div class="img_handl">
                            <div class="img_view">
                                <img src="upload/<?php echo $row['image']; ?>" alt="" class="img_view_img">
                            </div>
                            <input type="text" name="ed_image" value="<?php echo $row['image']; ?>" readonly>
                        </div>
                    </td>
                    <td><input type="text" name="ed_about" value="<?php echo $row['about']; ?>" readonly></td>
                    <td><input type="number" name="ed_price" value="<?php echo $row['price']; ?>" readonly></td>
                    <td>
                        <button type="button" class="submit edit-btn">Edit</button>
                        <button type="submit" class="submit save-btn" name="save" value="<?php echo $row['id']; ?>" style="display:none;">Save</button>
                    </td>
                    <td>
                        <button class="button" type="submit" value="<?php echo $row['id']; ?>" name="del">
                            <svg viewBox="0 0 448 512" class="svgIcon">
                                <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
                            </svg>
                        </button>
                    </td>
                </form>
            </tr>
            <?php
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
    <input type="text" name="search_decor" class="search_edit" placeholder="Enter name">
    <input type="submit" value="Search" class="search_btn_edit" name="submit_decor">
</form>

<!-- Table to display decor items -->
<table class="table">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Image</td>
        <td>About</td>
        <td>Price</td>
        <td>Actions</td>
    </tr>
    <?php
    if (isset($_POST['submit_decor'])) {
        $search = mysqli_real_escape_string($con, $_POST['search_decor']);
        $query_decor = "SELECT * FROM decor_art WHERE decor_name LIKE '%$search%'";
    } else {
        $query_decor = "SELECT * FROM decor_art";
    }
    $result_decor = mysqli_query($con, $query_decor);
    if (!$result_decor) {
        die('Error fetching decor items: ' . mysqli_error($con));
    }
    while ($row_decor = mysqli_fetch_array($result_decor)) {
        ?>
        <tr>
            <form method="POST" enctype="multipart/form-data">
                <td><?php echo $row_decor['id']; ?></td>
                <td><input type="text" name="ed_name_decor" value="<?php echo $row_decor['decor_name']; ?>" readonly></td>
                <td>
                    <div class="img_handl">
                        <div class="img_view">
                            <img src="upload/<?php echo $row_decor['decor_img']; ?>" alt="" class="img_view_img">
                        </div>
                        <input type="text" name="ed_image_decor" value="<?php echo $row_decor['decor_img']; ?>" readonly>
                    </div>
                </td>
                <td><input type="text" name="ed_about_decor" value="<?php echo $row_decor['decor_about']; ?>" readonly></td>
                <td><input type="text" name="ed_price_decor" value="<?php echo $row_decor['decor_price']; ?>" readonly></td>
                <td>
                <button type="button" class="submit edit-btn">Edit</button>
                <button type="submit" class="submit save-btn" name="save_de" value="<?php echo $row_decor['id']; ?>" style="display:none;">Save</button>
                </td>
                <td>
                    <form method="post">
                        <button class="button" type="submit" value="<?php echo $row_decor['id']; ?>" name="del">
                            <svg viewBox="0 0 448 512" class="svgIcon">
                                <path
                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                </path>
                            </svg>
                        </button>
                    </form>
                </td>
            </form>
        </tr>
        <?php
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
            <td>ID</td>
            <td>Name</td>
            <td>Image</td>
            <td>About</td>
            <td>Price</td>
            <td>Actions</td>
        </tr>
        <?php
        // Fetch and display dining items
        if (isset($_POST['submit_dining'])) {
            $search = mysqli_real_escape_string($con, $_POST['search_dining']);
            $query_dining = "SELECT * FROM dining_room WHERE dining_name LIKE '%$search%'";
        } else {
            $query_dining = "SELECT * FROM dining_room";
        }
        $result_dining = mysqli_query($con, $query_dining);
        if (!$result_dining) {
            die('Error fetching dining room items: ' . mysqli_error($con));
        }
        while ($row_dining = mysqli_fetch_array($result_dining)) {
            ?>
            <tr>
                <form method="POST" enctype="multipart/form-data">
                    <td><?php echo $row_dining['id']; ?></td>
                    <td><input type="text" name="ed_name_dining" value="<?php echo $row_dining['dining_name']; ?>" readonly></td>
                    <td>
                        <div class="img_handl">
                            <div class="img_view">
                                <img src="upload/<?php echo $row_dining['dining_image']; ?>" alt="" class="img_view_img">
                            </div>
                            <input type="text" name="ed_image_dining" value="<?php echo $row_dining['dining_image']; ?>" readonly>
                        </div>
                    </td>
                    <td><input type="text" name="ed_about_dining" value="<?php echo $row_dining['dining_about']; ?>" readonly></td>
                    <td><input type="text" name="ed_price_dining" value="<?php echo $row_dining['dining_price']; ?>" readonly></td>
                    <td>
                        <button type="button" class="submit edit-btn" onclick="enableEditing(this)">Edit</button>
                        <button type="submit" class="submit save-btn" name="save_di" value="<?php echo $row_dining['id']; ?>" style="display:none;">Save</button>
                    </td>
                    <td>
                        <form method="post">
                            <button class="button" type="submit" value="<?php echo $row_dining['id']; ?>" name="del">
                                <svg viewBox="0 0 448 512" class="svgIcon">
                                    <path
                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                    </path>
                                </svg>
                            </button>
                        </form>
                    </td>
                </form>
            </tr>
            <?php
        }
        ?>
    </table>
</section>
    </section>
    <section>
        <div class="Bar_Furniture">
            <h1>New product</h1>
            <div class="container">
                <div class="form-container">
                    <?php
                        if(isset($_POST['sub_product'])){
                            $product_name= $_POST['product_name'];  
                            $product_price = $_POST['product_price'];
                            if(isset($_FILES['product'])){
                                $upload_product = $_FILES['product']['name'];
                                $tmp_product =$_FILES['product']['tmp_name'];
                                move_uploaded_file($tmp_product,'upload/'.$upload_product);
                            $qurry_product = mysqli_query($con,"INSERT INTO new_product (name,price,img) VALUES ('$product_name','$product_price','$upload_product');");
                            if($qurry_product){
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
                            <label for="username">product Name:-</label>
                            <input type="text" name="product_name" id="username" placeholder="enter image name">
                        </div>
                        <div class="input-group">
                            <label for="password">product Price:-</label>
                            <input type="number" name="product_price" id="password" placeholder="enter price">
                        </div>
                        <div class="input-group">
                            <label for="img">product Upload:-</label>
                            <input type="file" name="product" id="password" placeholder="">
                        </div>
                        <div class="form-btn">
                            <button class="submit"  name='sub_product'>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section>
    <form method="POST" class="form_search">
        <input type="text" name="search_new" class="search_edit" placeholder="enter name" />
        <input type="submit" value="search" class="search_btn_edit" name="submit_new" />
    </form>

    <table class="table">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Image</td>
            <td>Price</td>
            <td>Actions</td>
        </tr>
        <?php
        // Fetch and display dining items
        if (isset($_POST['submit_new'])) {
            $search = mysqli_real_escape_string($con, $_POST['search_new']);
            $query_new = "SELECT * FROM new_product WHERE name LIKE '%$search%'";
        } else {
            $query_new = "SELECT * FROM new_product";
        }
        $result_new = mysqli_query($con, $query_new);
        if (!$result_new) {
            die('Error fetching new room items: ' . mysqli_error($con));
        }
        while ($row_new = mysqli_fetch_array($result_new)) {
            ?>
            <tr>
                <form method="POST" enctype="multipart/form-data">
                    <td><?php echo $row_new['id']; ?></td>
                    <td><input type="text" name="ed_name_new" value="<?php echo $row_new['name']; ?>" readonly></td>
                    <td>
                        <div class="img_handl">
                            <div class="img_view">
                                <img src="upload/<?php echo $row_new['img']; ?>" alt="" class="img_view_img">
                            </div>
                            <input type="text" name="ed_image_new" value="<?php echo $row_new['img']; ?>" readonly>
                        </div>
                    </td>
                    <td><input type="text" name="ed_price_new" value="<?php echo $row_new['price']; ?>" readonly></td>
                    <td>
                        <button type="button" class="submit edit-btn" onclick="enableEditing(this)">Edit</button>
                        <button type="submit" class="submit save-btn" name="save_new" value="<?php echo $row_new['id']; ?>" style="display:none;">Save</button>
                    </td>
                    <td>
                        <form method="post">
                            <button class="button" type="submit" value="<?php echo $row_new['id']; ?>" name="del">
                                <svg viewBox="0 0 448 512" class="svgIcon">
                                    <path
                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                    </path>
                                </svg>
                            </button>
                        </form>
                    </td>
                </form>
            </tr>
            <?php
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