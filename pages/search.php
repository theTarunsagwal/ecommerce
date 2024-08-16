<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../pages/css_admin_page/search.css">
</head>
<body>
    <?php include "header.php" ?>
  <?php include "profile_user.php" ?>

    <div class="serach-container">
        <h2 class="text-black fs-3 fw-bold text-center" >Search results</h2>
        <div class="search-result">
            <?php
            if(isset($_POST['sub'])){
                $search=$_POST['search'];
                $query = mysqli_query($con_pro,"SELECT * FROM product WHERE name LIKE '%$search%'");

                if($query){
                    if(isset($_GET['name'])){
                        $idjump = $_GET['name'];
                        $rowsjump = mysqli_query($con, "SELECT * FROM product WHERE name = $idjump");
                        $row_jump = mysqli_fetch_assoc($rowsjump);
                        if($row_jump){
                            $_SESSION['id'] = $row_jump['name'];
                        }
                    }
        while($row = mysqli_fetch_array($query)){
            ?>
        <div class="result-tab">
            <a href="addtocart.php?id=<?php echo $row['name']; ?>" value="<?php echo $row['name'];?>">
                <div class="img-item">
                    <img src="./upload/<?php echo $row['img']?>" alt="loading....">
                </div>
                <div class="price-name">
                    <h5 class="card-title "><?php echo $row['name'] ?></h5>
                    <p class="card-price">$<?php echo $row['price'] ?></p>
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