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
        <h2 class="text-black fs-3 fw-bold text-center" >Search results</h2>
        <div class="search-result">
            <?php
            if(isset($_POST['sub'])){
                $con= mysqli_connect("localhost","root","","ecommerce");
                $search=$_POST['search'];
                $query = mysqli_query($con,"SELECT * FROM wood WHERE image_name LIKE '%$search%'");
                $query2 = mysqli_query($con,"SELECT * FROM decor_art WHERE decor_name LIKE '%$search%'");
                $query3 = mysqli_query($con,"SELECT * FROM dining_room WHERE dining_name LIKE '%$search%'");

                if($query || $query2 || $query3){
                    if(isset($_GET['image_name'])){
                        $idjump = $_GET['image_name'];
                        $rowsjump = mysqli_query($con, "SELECT * FROM wood WHERE image_name = $idjump");
                        $row_jump = mysqli_fetch_assoc($rowsjump);
                        if($row_jump){
                            $_SESSION['id'] = $row_jump['image_name'];
                        }
                    }
                    while($row = mysqli_fetch_array($query)){
                ?>
            <div class="result-tab">
                <a href="addtocart.php?id=<?php echo $row['image_name']; ?>" value="<?php echo $row['image_name'];?>">
                    <div class="img-item">
                        <img src="./upload/<?php echo $row['image']?>" alt="loading....">
                    </div>
                    <div class="price-name">
                        <h5 class="card-title "><?php echo $row['image_name'] ?></h5>
                        <p class="card-text"><?php echo $row['about'] ?></p>
                        <p class="card-price">$<?php echo $row['price'] ?></p>
                    </div>
                </a>
            </div>
            <?php
                }
                while($row2 = mysqli_fetch_array($query2)){
                    ?>
                <div class="result-tab">
                <a href="addtocart.php?id=<?php echo $row2['decor_name']; ?>" value="<?php echo $row2['decor_name']; ?>">
                    <div class="img-item">
                        <img src="./upload/<?php echo $row2['decor_img']?>" alt="loading....">
                    </div>
                    <div class="price-name">
                        <h5 class="card-title"><?php echo $row2['decor_name'] ?></h5>
                        <p class="card-text"><?php echo $row2['decor_about'] ?></p>
                        <p class="card-price">$<?php echo $row2['decor_price'] ?></p>
                    </div>
                </a>
            </div>
            <?php
            }
            while($row3 = mysqli_fetch_array($query3)){
                ?>
             <div class="result-tab">
             <a href="addtocart.php?id=<?php echo $row3['dining_name']; ?>" value="<?php echo $row3['dining_name']; ?>">
                 <div class="img-item">
                     <img src="./upload/<?php echo $row3['dining_image']?>" alt="loading....">
                    </div>
                    <div class="price-name">
                        <h5 class="card-title"><?php echo $row3['dining_name'] ?></h5>
                        <p class="card-text"><?php echo $row3['dining_about'] ?></p>
                        <p class="card-price">$<?php echo $row3['dining_price'] ?></p>
                    </div>
                </a>
            </div>
        <?php
        }
        }else{
            echo "<h3>No result found</h3>";
        }
    }
    else{
    echo "<h6>Please enter search keyword</h6>";
}
        ?>
        </div>
    </div>
    <?php include "item.php" ?>
</body>
</html>