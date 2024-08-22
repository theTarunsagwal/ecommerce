<?php
session_start();
ob_start();
$con_userside = mysqli_connect('localhost', 'root', '', 'user_side');
$con_pro = mysqli_connect('localhost', 'root','','product');
$con_wish = mysqli_connect("localhost","root","","wishlist_user");

if(isset($_SESSION['name'])) {
    $user = $_SESSION['name'];
    include "header.php";
    $wish_face = "wish_name_".$_SESSION['name'];
	if (isset($_POST['heart_submit'])) {
		$wish_id = $_POST['wish_id'];
		$wish_name = $_POST['item_name'];
		$wish_img = $_POST['item_img'];
		$wish_price = $_POST['item_price'];

		$qry_wish_user = "INSERT INTO  $wish_face (`id`, `name`, `product_img`, `price`) VALUES ($wish_id, '$wish_name','$wish_img',$wish_price)";
		mysqli_query($con_wish,$qry_wish_user);
	}
	if(isset($_POST['remove'])){
		$remove = $_POST['remove'];
		$qry_remove = mysqli_query($con_wish,"DELETE FROM $wish_face WHERE id=$remove");
	}
	if (isset($_POST['heart_del'])) {
		$wish_id = $_POST['wish_id'];
		$delete_wish_user = "delete from $wish_face where id = $wish_id";

		if (mysqli_query($con_wish,$delete_wish_user)) {
			echo "Wish delete successfully!";
		}
	}

    if(isset($_GET['name'])){
        $titel = $_GET['name'];
        $head_titel = mysqli_query($con_pro, "SELECT * FROM product WHERE name = '$titel'");
        $row_jump = mysqli_fetch_assoc($head_titel);
        if($row_jump){
            $_SESSION['id'] = $row_jump['name'];
           }
       }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../pages/css_admin_page/addtocart.css">
	<link rel="stylesheet" href="./css_admin_page/wishlist.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .carousel-indicators img{
            width: 70px;
            display:block;
        }

        .carousel-indicators button{
            width: max-content !important;
        }

        .carousel-indicators{
            position: unset;
        }

        .carousel-indicators button.active img{
            border:2px solid #f9f8fe;
        }
    </style>
</head>

<body>
<?php include "profile_user.php" ?>
<div class="wishlist wishlist-closed" id="wishlist">
    <h2 class="text-black fw-bolder fs-6">My Favorites</h2>
    <?php 
	    $wish_face = "wish_name_".$_SESSION['name'];
       
        $qry_select = mysqli_query($con_wish,"SELECT * from $wish_face");
        ?>
    <ul class="d-flex  gap-2" style="flex-direction: column;">
        <?php
        while($row_add = mysqli_fetch_array($qry_select)){
			if(mysqli_num_rows($qry_select) == 0){
				echo "<div>
			<img class='img_fav' src='./img_ecommerce/fav.jpg'>
			<p>Please add items to the wishlist</p>
			</div>
			";
			}else{
        ?>
        <li class="mt-3" style="cursor:pointer;">
           <a href="addtocart.php?id=<?php echo $row_add['name'] ?>">
		        <div class="product-details d-flex gap-3 align-items-center">
                
                     <div class="img">
                         <img src="upload/<?php echo $row_add['product_img']; ?>"  alt="Product 1">
                     </div>
                    <div class="wish-product ">
                        <h3 style="font-size: 1rem; margin:0%;"><?php echo $row_add['name']; ?></h3>
                        <span class="fw-semibold" style="font-size:.6rem;">price:-</span>
                        <span class="text-success fw-light" style="font-size:1.1rem;">$<?php echo $row_add['price']; ?></span>
                        <form action="" method="POST">
                             <button name="remove" value="<?php echo $row_add['id']; ?>" class="remove-btn" style="border: none; background: transparent;">
                                 <i class='bx bx-x-circle'></i>
                             </button>
                        </form>
                    </div>
                 </div>
		   </a>
        </li>
        <?php
        }
    }
        ?>
    </ul>
</div>


<section>
        <div class="item-container" style="position: relative;">
            <?php
            if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
                if(isset($_POST['btn'])){
                    $item_name = $_POST['item_name'];
                    $item_img = $_POST['item_img'];
                    $item_price = $_POST['item_price'];
                    $table_name = 'user_name_' . $user ;
                    $qury_user= mysqli_query($con_userside, "insert into $table_name (name,image,price) values ('$item_name','$item_img','$item_price') ");
                    if ($qury_user) {
                        header("Location: additem.php");
                        exit(); 
                    } else {
                        echo "Error: " . mysqli_error($con_userside);
                    }
                    ob_end_flush();
                }
                // $queries = [];



    // Second query
    $queries_re = [];
    // echo $id;
    $query_re = mysqli_query($con_pro, "SELECT id,name,price, about, img, img1,img2,img3 FROM product LEFT JOIN relative_img ON product.id = relative_img.id_img WHERE product.name = '$id' ;");
    while ($row_re = mysqli_fetch_assoc($query_re)) {
        $queries_re[] = $row_re;
    }

    foreach ($queries_re as $query) {
                        ?>
                        <form method="post">
                            <input type="hidden" name="item_name" value="<?php echo  $query['name']; ?>">
                            <input type="hidden" name="item_img" value="<?php echo $query['img']; ?>">
                            <input type="hidden" name="item_price" value="<?php echo  $query['price']; ?>">
                            <input type="hidden" value="<?php echo $query['id']; ?>" name="wish_id">

                            <div class="item-card ">
                                <div id="carouselDemo" class="carousel slide  w-100" style="height: 100vh" >
                                    <div class="carousel-inner">
                                        <div class="carousel-item active w-100 h-100" >
                                            <img src="upload/<?php echo $query['img']; ?>" class="d-block h-100 w-100" alt="...">
                                        </div>
                                        <div class="carousel-item w-100 h-100" >
                                            <img src="upload/<?php echo $query['img1']; ?>" class="d-block h-100 w-100" alt="...">
                                        </div>
                                        <div class="carousel-item w-100 h-100">
                                            <img src="upload/<?php echo $query['img2']; ?>" class="d-block h-100 w-100" alt="...">
                                        </div>
                                        <div class="carousel-item w-100 h-100">
                                            <img src="upload/<?php echo $query['img3']; ?>" class="d-block h-auto w-100" alt="...">
                                        </div>
                                        
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselDemo" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselDemo" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                                            <img src="upload/<?php echo $query['img']; ?>" >
                                        </button>
                                        <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="1" aria-label="Slide 2">
                                            <img src="upload/<?php echo $query['img1']; ?>" >
                                        </button>
                                        <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="2" aria-label="Slide 3">
                                        <img src="upload/<?php echo $query['img2']; ?>" >
                                        </button>
                                        <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="3" class="active" aria-current="true" aria-label="Slide 4">
                                            <img src="upload/<?php echo $query['img3']; ?>" >
                                        </button>
                                    </div>
                                </div>
                                                           
                                <div class="item-info">
                                    <h1><?php echo  $query['name']; ?></h1>
                                    <p>Most of us are familiar with the iconic design of the egg-shaped chair floating in the air. The Hanging Egg Chair is a critically acclaimed design that has enjoyed praise worldwide ever since the distinctive.</p>
                                    <h3>$<?php echo $query['price']; ?>.00</h3>
                                    <div class="add-to-cart">
                                        <div class="count-btn">
                                            <button type="button" class="minus" onclick="changeQuantity(this, -1)">-</button>
                                            <input type="text" name="quantity" class="form-control text-center" value="1" readonly>
                                            <button type="button" class="plus" onclick="changeQuantity(this, 1)">+</button>
                                        </div>
                                        <button class="buy-btn" name="btn">Add to Cart</button>
                                        <button class="buy-btn">Buy it Now</button>
                                    </div>
                                    <div class="availability-stock">
                                        <a class="text-black" href="">Availability: <span class="text-success fw-bolder">In Stock</span></a>
                                        <a class="text-black" href="">SKU: <span>N/A</span></a>
                                        <a class="text-black" href="">Vendor: <span><?php echo $query['about']; ?></span></a>
                                        <a class="text-black" href="">Categories: <span>Bar Furniture</span></a>
                                        <a class="text-black icon-btn" href="">Share: <i class='bx bxl-instagram'></i> <i class='bx bxl-twitter'></i> <i class='bx bxl-github'></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="fav-item block2-txt-child2 flex-r p-t-3">
                            		<?php
                            		$wish_id_product= $query['id'];
                            		// $qry_match_product = mysqli_query($con_pro,"select * from wish_product where wish_id = $wish_id_product ");
                            		$qry_user_product = mysqli_query($con_wish,"select * from $wish_face where id = $wish_id_product ");
                            		if($is_wishlist = mysqli_num_rows($qry_user_product) > 0 ){
                            		?>
                            		<button type="submit" name="heart_del">
                            			<i class='bx bxs-heart' id="heart" style="font-size:1.5rem; cursor:pointer;"></i>
                            		</button>
                            		<?php }else{
                            			?>
                            			<button type="submit" name="heart_submit">
                            				<i class='bx bx-heart' id="heart" style="font-size:1.5rem; cursor:pointer;"></i>
                            			</button>
                            		<?php } ?>
                            </div>
                        </form>
                        <?php
                    }
                // }
            } else {
                echo "Product ID is not specified or invalid.";
            }
            ?>
        </div>
</section>


    <section>
        <div class="description-container">
            <div class="container-main">
                <div class="container-line"></div>
                <h2>Description</h2>
                <h2>shipping & return</h2>
                <h2>reviews</h2>
                <div class="container-line"></div>
            </div>
            <div class="container-pargraf">
                <p>Most of us are familiar with the iconic design of the egg shaped chair floating in the air. The
                    Hanging Egg Chair is a critically acclaimed design that has enjoyed praise worldwide ever since the
                    distinctive sculptural shape was created.</p>
                <p>[SHORTDESCRIPTION]</p>
                <p>Most of us are familiar with the iconic design of the egg shaped chair floating in the air. The
                    Hanging Egg Chair is a critically acclaimed design that has enjoyed praise worldwide ever since the
                    distinctive sculptural shape was created.</p>
                <p>the design of the Hanging Egg Chair has long since been dubbed timeless whereas the material rattan
                    had its golden age in the 1960s when skilled wicker makers and architects crafted beautifully
                    sculptured furniture out of the challenging material. However, at the moment rattan is becoming more
                    and more popular concurrent with consumer demands for sustainable products.</p>
                <div>
                    <h6 class="fw-bold">Dimensions:</h6>
                    <p>Chair: W:85 x D:75 x H:125cm Stand: W:104 x D:109 x H:207cm (seat height:45cm)</p>
                </div>
                <div>
                    <h6 class="fw-bold">Materials:</h6>
                    <p>Indoor chair: natural fiber (rattan) Outdoor chair: synthetic fiber Stand: powder coated iron
                        (only for indoor use)</p>
                </div>
            </div>
        </div>
    </section>
    <script>
        function add() {
            let input = document.getElementById('numberInput');
            let currentValue = parseInt(input.value);
            currentValue++;
            input.value = currentValue;
            if (currentValue == 10) {
                alert("stock quantity is not greater than")
                input.value = 0;
            }
        }

        function subtract() {
            let input = document.getElementById('numberInput');
            let currentValue = parseInt(input.value);
            if (currentValue > 0) {
                currentValue--;
                input.value = currentValue;
            }
        }
    </script>
    <script src="./vendor/slick/slick.js"></script>
    <script src="./vendor/slick/slick.min.js"></script>
</body>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>

<?php
} else {
    echo "
				<script>
				alert('Please loging first')
	</script>
			";
            header("Location: loging.php");
    exit();
}
?>