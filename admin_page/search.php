<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../admin_page/css_admin_page/search.css">
</head>
<body>
    <?php include "header.php" ?>
    <div class="serach-container">
        <h2 class="text-black fs-3 fw-bold text-center" >Search results"<span class="fw-light fs-5"><?php ?></span>"</h2>
        <div class="search-result">
            <?php
            if(isset($_POST['sub'])){
                $con= mysqli_connect("localhost","root","","ecommerce");
                $search=$_POST['search'];
                $query = mysqli_query($con,"SELECT * FROM wood WHERE image_name LIKE '%$search%'");
                $query2 = mysqli_query($con,"SELECT * FROM decor_art WHERE decor_name LIKE '%$search%'");
                $query3 = mysqli_query($con,"SELECT * FROM dining_room WHERE dining_name LIKE '%$search%'");

                if($query || $query2 || $query3){
                    if(isset($_GET['id_em'])){
                     $id_jum = $_GET['id_em'];
                     $data_id= mysqli_query($con, "SELECT * FROM decor_art WHERE id = $id_jum");
                     $row_jump = mysqli_fetch_assoc($data_id);
                    if($row_jump){
                    $_SESSION['id'] = $row_jump['id'];
                    }
                    }
                    while($row = mysqli_fetch_array($query)){
            ?>
            <div class="result-tab">
                <a href="addtocart.php?id=<?php echo $row['id']?>" value="<?php echo $row['id']?>" name="id_em">hello</a>
                <div class="img-item">
                    <img src="./upload/<?php echo $row['image']?>" alt="loading....">
                </div>
                <div class="price-name">
                        <h5 class="card-title fs-4"><?php echo $row['image_name'] ?></h5>
                        <p class="card-text"><?php echo $row['about'] ?></p>
                        <p class="card-price">$<?php echo $row['price'] ?></p>
                </div>
            </div>
            <?php
                }
                while($row2 = mysqli_fetch_array($query2)){
                    ?>
                <div class="result-tab">
                <div class="img-item">
                    <img src="./upload/<?php echo $row2['decor_img']?>" alt="loading....">
                </div>
                <div class="price-name">
                        <h5 class="card-title"><?php echo $row2['decor_name'] ?></h5>
                        <p class="card-text"><?php echo $row2['decor_about'] ?></p>
                        <p class="card-price">$<?php echo $row2['decor_price'] ?></p>
                </div>
            </div>
            <?php
            }
            while($row3 = mysqli_fetch_array($query3)){
                ?>
             <div class="result-tab">
                <div class="img-item">
                    <img src="./upload/<?php echo $row3['dining_image']?>" alt="loading....">
                </div>
                <div class="price-name">
                        <h5 class="card-title"><?php echo $row3['dining_name'] ?></h5>
                        <p class="card-text"><?php echo $row3['dining_about'] ?></p>
                        <p class="card-price">$<?php echo $row3['dining_price'] ?></p>
                </div>
            </div>
        <?php
        }
        }else{
            echo "<h3>No result found</h3>";
        }
    }
        ?>
        </div>
    </div>
    <?php include "item.php" ?>
</body>
</html>