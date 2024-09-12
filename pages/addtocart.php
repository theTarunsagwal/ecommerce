<?php
session_start();
// echo $_SESSION['id'];
ob_start();
$con_userside = mysqli_connect('localhost', 'root', '', 'user_side');
$con_pro = mysqli_connect('localhost', 'root','','product_data');
$con_wish = mysqli_connect("localhost","root","","wishlist_user");

if(isset($_SESSION['name'])) {
    $user = $_SESSION['id'];
    include "header.php";
    $wish_face = "wish_name_".$_SESSION['id'];
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="wishlist wishlist-closed" id="wishlist">
        <h2 class="text-black fw-bolder fs-6">My Favorites</h2>
        <?php 
	    $wish_face = "wish_name_".$_SESSION['id'];
       
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
                            <img src="upload/<?php echo $row_add['product_img']; ?>" alt="Product 1">
                        </div>
                        <div class="wish-product ">
                            <h3 style="font-size: 1rem; margin:0%;">
                                <?php echo $row_add['name']; ?>
                            </h3>
                            <span class="fw-semibold" style="font-size:.6rem;">price:-</span>
                            <span class="text-success fw-light" style="font-size:1.1rem;">$
                                <?php echo $row_add['price']; ?>
                            </span>
                            <form action="" method="POST">
                                <button name="remove" value="<?php echo $row_add['id']; ?>" class="remove-btn"
                                    style="border: none; background: transparent;">
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

    <?php
if (isset($_POST['sub_rating'])) {
    $product_rating_id = $_POST['product_id'];
    $product_rating_name = $_POST['product_name'];
    $rating = $_POST['star-radio'];
    $comment =  mysqli_real_escape_string($con_pro,$_POST['comment-box']);
    $user_email = $_SESSION['email'];

    // Check if the user has already rated this product
    $check_rating = "SELECT * FROM ratings WHERE user_email = '$user_email' AND product_id = $product_rating_id";
    $result = mysqli_query($con_pro, $check_rating);

    if (mysqli_num_rows($result) > 0) {
        // Update existing rating and comment
        $qry_rating = "UPDATE ratings SET rating = $rating, comment_box = '$comment', pr_name = '$product_rating_name' WHERE user_email = '$user_email' AND product_id = $product_rating_id";
    } else {
        // Insert new rating and comment
        $qry_rating = "INSERT INTO ratings (user_email, product_id, rating, comment_box, pr_name) VALUES ('$user_email', $product_rating_id, $rating, '$comment', '$product_rating_name')";
    }

    if (mysqli_query($con_pro, $qry_rating)) {
        echo "success";
    } else {
        echo "Error: " . mysqli_error($con_pro);
    }
}

?>
    <section>
        <div class="item-container" style="position: relative;">
            <?php
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = $_GET['id'];
                $_SESSION['product_name'] = $id;
                // echo $_SESSION['product_name'];
            
                if (isset($_POST['btn'])) {
                    $item_name = $_POST['item_name'];
                    $item_img = $_POST['item_img'];
                    $item_price = $_POST['item_price'];
                    $pro_user = $_SESSION['id'];
                    $qty = $_POST['quantity'];
                   echo $table_name = 'user_name_' . $pro_user;
            
                    $check_query = mysqli_query($con_userside, "SELECT * FROM $table_name WHERE name='$item_name'");
                    
                    if (mysqli_num_rows($check_query) > 0) {
                        echo "<script>
                            alert('Product is already in the cart.')
                        </script>";
                    } else {
                        $qury_user = mysqli_query($con_userside, "INSERT INTO $table_name (name, image, price,qty) VALUES ('$item_name', '$item_img', '$item_price','$qty')");
                        
                        if ($qury_user) {
                            header("Location: additem.php");
                            exit();
                        } else {
                            echo "Error: " . mysqli_error($con_userside);
                        }
                    }
                    ob_end_flush();
                }            
                               $queries_re = [];
                               $query_re = mysqli_query($con_pro, "SELECT id,name,price,about,img,img1,img2,img3,cat_name FROM product LEFT JOIN relative_img ON product.id = relative_img.id_img LEFT JOIN category ON product.category = category.cat_id WHERE product.name = '$id';");
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

                <div class="product-container mt-5">
                    <div class="product-slider">
                        <div class="thumbnails">
                            <img src="upload/<?php echo $query['img'] ?>" alt="Thumbnail 1" onmouseover="changeImage(this)">
                            <img src="upload/<?php echo $query['img1'] ?>" alt="Thumbnail 2" onmouseover="changeImage(this)">
                            <img src="upload/<?php echo $query['img2'] ?>" alt="Thumbnail 3" onmouseover="changeImage(this)">
                            <img src="upload/<?php echo $query['img3'] ?>" alt="Thumbnail 4" onmouseover="changeImage(this)">
                        </div>
                        <div class="main-image">
                            <img id="currentImage" src="upload/<?php echo $query['img'] ?>" alt="Main Image">
                        </div>
                    </div>
                    <div class="item-info">
                        <h1><?php echo  $query['name']; ?></h1>
                        <p><?php echo  $query['about']; ?></p>
                        <h3>$<?php echo  $query['price']; ?></h3>
                        <div class="add-to-cart">
                            <!-- <a href="PaymentOrder.php">Link</a> -->
                            <div class="count-btn">
                                <button type="button" class="minus">-</button>
                                <input type="text" name="quantity" class="form-control text-center" value="1" readonly>
                                <button type="button" class="plus">+</button>
                            </div>
                            <button class="buy-btn" name="btn">Add to Cart</button>
                            <button id="bttn" class="buy-btn">
                                <a class="buy-btn" href="PaymentOrder.php">
                                Buy it Now
                            </a>
                            </button>
                        </div>
                        <div class="availability-stock">
                            <a href="">Availability: <span class="text-success fw-bolder">In Stock</span></a>
                            <a href="">SKU: <span>N/A</span></a>
                            <a href="">Vendor: <span>Nothing Says Sporty Versatility</span></a>
                            <a href="">Categories: <span><?php echo  $query['cat_name']; ?></span></a>
                            <a class="text-black d-flex icon-btn" href="">Share: <i class='bx bxl-instagram'></i> <i
                                    class='bx bxl-twitter'></i> <i class='bx bxl-github'></i>
                                <div class="fav-item block2-txt-child2 flex-r">
                                    <?php
                     $wish_id_product= $query['id'];
                                 $qry_user_product = mysqli_query($con_wish,"select * from $wish_face where id = $wish_id_product ");
                     if($is_wishlist = mysqli_num_rows($qry_user_product) > 0 ){
                     ?>
                                    <button type="submit" style="padding-top: .3rem;" name="heart_del">
                                        <i class='bx bxs-heart' id="heart"
                                            style="font-size:1.5rem; cursor:pointer;"></i>
                                    </button>
                                    <?php }else{
                     	?>
                                    <button type="submit" style="padding-top: .3rem;" name="heart_submit">
                                        <i class='bx bx-heart' id="heart" style="font-size:1.5rem; cursor:pointer;"></i>
                                    </button>
                                    <?php } ?>
                                </div>
                            </a>
                            <?php
                                            $qry_rating_id = $query['id'];
                                            $qry_rating_avg="SELECT AVG(rating) AS average_rating FROM ratings WHERE product_id = $qry_rating_id ";
                                             $result_rating_avg = mysqli_query($con_pro,$qry_rating_avg);
                                             $row_rating_avg = mysqli_fetch_assoc($result_rating_avg);
                                             $averga = isset($row_rating_avg['average_rating']) ? number_format($row_rating_avg['average_rating'], 1) : 'N/A'; 
                                             if($averga !== "N/A"){
                                                if($averga == 5){
                                                    echo "
                                                       <h6 class='text-black icon-btn' style='cursor:pointer;' id='rating-inp'>rating: <span class='fw-bolder' style='color:yellow;'> $averga</span></h6>
                                                    ";
                                                    ?>
                            <div class="d-flex gap-1">
                                <i class='bx bxs-star' style="color:#FFD700;"></i>
                                <i class='bx bxs-star' style="color:#FFD700;"></i>
                                <i class='bx bxs-star' style="color:#FFD700;"></i>
                                <i class='bx bxs-star' style="color:#FFD700;"></i>
                                <i class='bx bx-star' style="color:#FFD700;"></i>
                            </div>
                            <?php
                                                } else if($averga >= 4.5 && $averga < 5 ){
                                                    echo "
                                                       <h6 class='text-black  icon-btn' style='cursor:pointer;' id='rating-inp'>rating: <span class='fw-bolder' style='color:green;'> $averga</span></h6>
                                                    ";
                                                    ?>
                            <div class="d-flex gap-1">
                                <i class='bx bxs-star' style="color:#FFD700;"></i>
                                <i class='bx bxs-star' style="color:#FFD700;"></i>
                                <i class='bx bxs-star' style="color:#FFD700;"></i>
                                <i class='bx bxs-star' style="color:#FFD700;"></i>
                                <i class='bx bxs-star-half' style="color:#FFD700;"></i>
                            </div>
                            <?php
                                                } else if($averga >= 4 && $averga < 4.5 ){
                                                    echo "
                                                       <h6 class='text-black  icon-btn' style='cursor:pointer;' id='rating-inp'>rating: <span class='fw-bolder' style='color:green;'> $averga</span></h6>
                                                    ";
                                                    ?>
                            <div class="d-flex gap-1">
                                <i class='bx bxs-star' style="color:#FFD700;"></i>
                                <i class='bx bxs-star' style="color:#FFD700;"></i>
                                <i class='bx bxs-star' style="color:#FFD700;"></i>
                                <i class='bx bxs-star' style="color:#FFD700;"></i>
                                <i class='bx bx-star' style="color:#000;"></i>
                            </div>
                            <?php
                                                }else if($averga >= 3.5 && $averga < 4 ){
                                                    echo "
                                                       <h6 class='text-black  icon-btn' style='cursor:pointer;' id='rating-inp'>rating: <span class='fw-bolder' style='color:purple;'> $averga</span></h6>
                                                    ";
                                                    ?>
                            <div class="d-flex gap-1">
                                <i class='bx bxs-star' style="color:#FFD700;"></i>
                                <i class='bx bxs-star' style="color:#FFD700;"></i>
                                <i class='bx bxs-star' style="color:#FFD700;"></i>
                                <i class='bx bxs-star-half' style="color:#FFD700;"></i>
                                <i class='bx bx-star' style="color:#000;"></i>
                            </div>
                            <?php
                                            }else if($averga >= 3 && $averga < 3.5 ){
                                                echo "
                                                   <h6 class='text-black  icon-btn' style='cursor:pointer;' id='rating-inp'>rating: <span class='fw-bolder' style='color:purple;'> $averga</span></h6>
                                                ";
                                                ?>
                            <div class="d-flex gap-1">
                                <i class='bx bxs-star' style="color:#FFD700;"></i>
                                <i class='bx bxs-star' style="color:#FFD700;"></i>
                                <i class='bx bxs-star' style="color:#FFD700;"></i>
                                <i class='bx bx-star' style="color:#000;"></i>
                                <i class='bx bx-star' style="color:#000;"></i>
                            </div>
                            <?php
                                            }else if($averga >= 2.5 && $averga < 3 ){
                                                echo "
                                                   <h6 class='text-black  icon-btn' style='cursor:pointer;' id='rating-inp'>rating: <span class='fw-bolder' style='color:red;'> $averga</span></h6>
                                                ";
                                                ?>
                            <div class="d-flex gap-1">
                                <i class='bx bxs-star' style="color:#FFD700;"></i>
                                <i class='bx bxs-star' style="color:#FFD700;"></i>
                                <i class='bx bxs-star-half' style="color:#FFD700;"></i>
                                <i class='bx bx-star' style="color:#000;"></i>
                                <i class='bx bx-star' style="color:#000;"></i>
                            </div>
                            <?php
                                            }else if($averga >= 2 && $averga < 2.5 ){
                                                echo "
                                                   <h6 class='text-black  icon-btn' style='cursor:pointer;' id='rating-inp'>rating: <span class='fw-bolder' style='color:red;'> $averga</span></h6>
                                                ";
                                                ?>
                            <div class="d-flex gap-1">
                                <i class='bx bxs-star' style="color:#FFD700;"></i>
                                <i class='bx bxs-star' style="color:#FFD700;"></i>
                                <i class='bx bx-star' style="color:#000;"></i>
                                <i class='bx bx-star' style="color:#000;"></i>
                                <i class='bx bx-star' style="color:#000;"></i>
                            </div>
                            <?php
                                            }
                                             }else{
                                                echo "
                                                       <h6 class='text-black  icon-btn' style='cursor:pointer;' id='rating-inp'>rating: <span> $averga</span></h6>
                                                    ";
                                             }
                                        ?>
                        </div>
                    </div>
                </div>
                <!-- rating box -->
                <div class="rating-box">
                    <div class="rating-pop d-flex align-items-center justify-content-center flex-column gap-3">
                        <h1 class="fs-3 text-black fw-bolder text-center">Give a rating</h1>
                        <form action="" method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $query['id']; ?>">
                            <input type="hidden" name="product_name" value="<?php echo $query['name']; ?>">
                            <div class="rating" id="rating">
                                <input type="radio" id="star-1" name="star-radio" value="5">
                                <label for="star-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path pathLength="360"
                                            d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
                                        </path>
                                    </svg>
                                </label>
                                <input type="radio" id="star-2" name="star-radio" value="4">
                                <label for="star-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path pathLength="360"
                                            d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
                                        </path>
                                    </svg>
                                </label>
                                <input type="radio" id="star-3" name="star-radio" value="3">
                                <label for="star-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path pathLength="360"
                                            d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
                                        </path>
                                    </svg>
                                </label>
                                <input type="radio" id="star-4" name="star-radio" value="2">
                                <label for="star-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path pathLength="360"
                                            d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
                                        </path>
                                    </svg>
                                </label>
                                <input type="radio" id="star-5" name="star-radio" value="1">
                                <label for="star-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path pathLength="360"
                                            d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
                                        </path>
                                    </svg>
                                </label>
                            </div>
                            <div class="d-flex gap-2">
                                <label for="comment-box">comment :-</label>
                                <textarea name="comment-box" cols="30" placeholder="Enter your thought"></textarea>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn-rating" id="btn-rating"
                                    name="sub_rating"><span>Rating</span></button>
                                <button type="submit" class="back-rating" id="btn-rating"><span>Back</span></button>
                        </form>
                    </div>
                </div>
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
    <script>
        $(document).ready(function () {
            $('.btn-rating').hide();
            $('.rating-box').hide();
            $("#rating-inp").click(function () {
                $('.rating-box').show();
            })
            $("#rating").click(function () {
                $('.btn-rating').show();
            })
            $(".back-rating").click(function () {
                $('.rating-box').hide();
            })
        })
    </script>
    <script>
        function changeImage(element) {
            const newSrc = element.src;
            const currentImage = document.getElementById('currentImage');

            // Update the main image source
            currentImage.src = newSrc;

            // Remove 'active' class from all thumbnails
            document.querySelectorAll('.thumbnails img').forEach(img => img.classList.remove('active'));

            // Add 'active' class to the hovered thumbnail
            element.classList.add('active');
        }

        // Initialize the thumbnails
        const initialSrc = document.getElementById('currentImage').src;
        document.querySelectorAll('.thumbnails img').forEach(img => {
            if (img.src === initialSrc) {
                img.classList.add('active');
            }
        });
    </script>

    <section>
        <div class="description-container" style="margin-top: 10%;">
            <div class="container-main">
                <div class="container-line"></div>
                <h2>Description</h2>
                <h2>shipping & return</h2>
                <a href="#reviews">
                    <h2>reviews</h2>
                </a>
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
            <div class="container-main">
                <div class="container-line"></div>
                <h2>reviews</h2>
                <div class="container-line"></div>
            </div>
            <iframe id="reviews" src="./review.php" class="mt-3" frameborder="0"
                style="height: 50vh; width: 100%;"></iframe>
        </div>
    </section>
    <?php include "./footer.php" ?>
    
    <script>
        $(document).ready(function () {
            // Function to increase quantity
            $('.plus').on('click', function () {
                var $input = $(this).siblings('input[name="quantity"]');
                var currentValue = parseInt($input.val());
                $input.val(currentValue + 1);
            });

            // Function to decrease quantity
            $('.minus').on('click', function () {
                var $input = $(this).siblings('input[name="quantity"]');
                var currentValue = parseInt($input.val());

                if (currentValue > 1) {
                    $input.val(currentValue - 1);
                }
            });
        });
    </script>
    <script src="./vendor/slick/slick.js"></script>
    <script src="./vendor/slick/slick.min.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>



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