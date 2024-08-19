<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Megumi shoplift</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css_admin_page/wishlist.css">
</head>
<body>
<div class="wishlist wishlist-closed" id="wishlist">
    <h2 class="text-black fw-bolder fs-6">My Favorites</h2>
    <?php 
    if(isset($_SESSION['name'])) {
	    $wish_face = "wish_name_".$_SESSION['name'];
        $con_wish = mysqli_connect("localhost","root","","wishlist_user");
        $qry_select = mysqli_query($con_wish,"SELECT * from $wish_face");
        if(isset($_POST['remove'])){
            $remove = $_POST['remove'];
            $qry_remove = mysqli_query($con_wish,"DELETE FROM $wish_face WHERE id=$remove");
        }
        ?>
    <ul class="d-flex  gap-2" style="flex-direction: column;">
        <?php
        if(mysqli_num_rows($qry_select) == 0){
            echo "<div>
        <img class='img_fav' src='./img_ecommerce/fav.jpg'>
        <p>Please add items to the wishlist</p>
        </div>
        ";
        }else{
        while($row = mysqli_fetch_array($qry_select)){
        ?>
        <li class="mt-3">
            <div class="product-details d-flex gap-3 align-items-center">
                <div class="img">
                    <img src="product/<?php echo $row['product_img']; ?>"  alt="Product 1">
                </div>
               <div class="wish-product ">
                   <h3 style="font-size: 1rem; margin:0%;"><?php echo $row['name']; ?></h3>
                   <span class="fw-semibold" style="font-size:.6rem;">price:-</span>
                   <span class="text-success fw-light" style="font-size:1.1rem;">$<?php echo $row['price']; ?></span>
                   <form action="" method="POST">
                        <button name="remove" value="<?php echo $row['id'] ?>" class="remove-btn" style="border: none; background: transparent;">
                            <i class='bx bx-x-circle'></i>
                        </button>
                   </form>
               </div>
            </div>
        </li>
        <?php
        }
    }
        ?>
    </ul>
    <?php } else {
        header("Location: login.php");
    } 
    ?>
</div>
</body>
</html>