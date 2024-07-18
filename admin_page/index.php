<?php
session_start();
// if(isset($_SESSION['name'])){
    $con = mysqli_connect("localhost","root","","ecommerce");
    // $qurry=mysqli_query($con,"select * from new_product");
    $data_product = mysqli_query($con, 'SELECT * FROM new_product');
    $data_wood = mysqli_query($con, 'SELECT * FROM wood');
    $data_art = mysqli_query($con, 'SELECT * FROM decor_art');
    $data_room = mysqli_query($con, 'SELECT * FROM dining_room');
    

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Megumi shoplift</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css_admin_page/index.css">
</head>

<body>
    <?php include "header.php" ?>
    <?php include "profile_user.php" ?>


    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../img_ecommerce/img_ecommerce34.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../img_ecommerce/img_ecommerce09.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../img_ecommerce/img_ecommerce10.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class=" btn carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="btn carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <section>
        <div class="scale_card">
            <?php        
        $rows = mysqli_query($con, "SELECT * FROM new_product WHERE id IN (4, 5, 6)");
        while($row_woods=mysqli_fetch_assoc($rows)){
        ?>
        <?php
        if(isset($_GET['name'])){
            $titel = $_GET['name'];
            $head_titel = mysqli_query($con, "SELECT * FROM new_product WHERE name = '$titel'");
            $row_jump = mysqli_fetch_assoc($head_titel);
            if($row_jump){
                $_SESSION['id'] = $row_jump['name'];
            }
        }
        ?>
        <a href="product.php?id=<?php echo $row_woods['name'] ?>">
            <div class="scale_card_menu">
                <img src="./upload/<?php echo $row_woods['img']?>" alt="">
            </div>
        </a>
            <?php
        }
        ?>
        </div>

        <div class="multi_card">
            <div class="chair_card">
                <?php
            $img=mysqli_query($con,"select * from dining_room where id in (6)");
            while ($row=mysqli_fetch_assoc($img)){
            ?>
             <?php
        if(isset($_GET['image_name'])){
            $titel = $_GET['image_name'];
            $head_titel = mysqli_query($con, "SELECT * FROM dining_room WHERE dining_name = '$titel'");
            $row_jump = mysqli_fetch_assoc($head_titel);
            if($row_jump){
                $_SESSION['id'] = $row_jump['image_name'];
            }
        }
        ?>
        <a href="product.php?id=<?php echo $row['dining_name'] ?>">
            <img src="./upload/<?php echo $row['dining_image'];?>" alt="">
            <h3>
                <?php echo $row['dining_name'];}?>
            </h3>
        </a> 
            </div>
            <div class="adjest">
                <div class="clock_decor">
                    <div class="decor">
                        <?php
            $img=mysqli_query($con,"select * from decor_art where id in (4)");
            while ($row=mysqli_fetch_assoc($img)){
            ?>
            <?php
            if(isset($_GET['image_name'])){
            $titel = $_GET['image_name'];
            $head_titel = mysqli_query($con, "SELECT * FROM decor_art WHERE decor_name = '$titel'");
            $row_jump = mysqli_fetch_assoc($head_titel);
            if($row_jump){
                $_SESSION['id'] = $row_jump['image_name'];
            }
        }
        ?>
        <a href="product.php?id=<?php echo $row['decor_name'] ?>">
                        <img src="./upload/<?php echo $row['decor_img'];?>" alt="">
                        <h3>
                            <?php echo $row['decor_name'];}?>
                        </h3>
                    </a>
                    </div>
                    <div class="wall_clock">
                        <?php
            $img=mysqli_query($con,"select * from dining_room where id in (7)");
            while ($row=mysqli_fetch_assoc($img)){
            ?>
            <?php
            if(isset($_GET['image_name'])){
                $titel = $_GET['image_name'];
                $head_titel = mysqli_query($con, "SELECT * FROM dining_room WHERE dining_name = '$titel'");
                $row_jump = mysqli_fetch_assoc($head_titel);
                if($row_jump){
                    $_SESSION['id'] = $row_jump['image_name'];
                }
            }
            ?>
            <a href="product.php?id=<?php echo $row['dining_name'] ?>">
                        <img src="./upload/<?php echo $row['dining_image'];?>" alt="">
                        <h3>
                            <?php echo $row['dining_name'];}?>
                        </h3>
                    </div>
                </div>
                <div class="kitchen">
                    <?php
            $img=mysqli_query($con,"select * from dining_room where id in (8)");
            while ($row=mysqli_fetch_assoc($img)){
                ?>
                    <img src="./upload/<?php echo $row['dining_image'];}?>" alt="">
                </a>
                </div>
            </div>
        </div>
    </section>

    <?php include "item.php" ?>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="dropdown.js"></script>

</body>

</html>

