<?php
session_start();
// if(isset($_SESSION['name'])){
    // $con = mysqli_connect("localhost","root","","ecommerce");
    // $con_userside = mysqli_connect('localhost', 'root', '', 'user_side');
    // $con_pro = mysqli_connect("localhost", "root", "", "product_data");
	// $con_wish = mysqli_connect("localhost","root","","wishlist_user");
    ?>

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
    <link rel="stylesheet" href="./css_admin_page/index.css">
    <link rel="stylesheet" href="./css_admin_page/wishlist.css">

    <link rel="stylesheet" type="text/css" href="./vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="./fonts/linearicons-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="./vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="./vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="./vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="./vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="./vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="./vendor/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="./vendor/MagnificPopup/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="./vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="./css/util.css">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>

<body class="animsition">
    <?php include "header.php" ?>
    <?php
     include "profile_user.php"
      ?>
    <!-- wishlist -->
	<div class="wishlist wishlist-closed" id="wishlist">
        <h2 class="text-black fw-bolder fs-6">My Favorites</h2>
        <?php
// session_start();
if(isset($_SESSION['name'])) {
	// echo $_SESSION['name'];
	$con_wish = mysqli_connect("localhost","root","","wishlist_user");
	 $wish_face = "wish_name_".$_SESSION['name'];
	if (isset($_POST['heart_submit'])) {
		$wish_id = $_POST['wish_id'];
		$wish_name = $_POST['wish_name'];
		$wish_img = $_POST['wish_img'];
		$wish_price = $_POST['wish_price'];

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
            $qry_select = mysqli_query($con_wish,"SELECT * from $wish_face");
        if(isset($_GET['name'])){
            $titel = $_GET['name'];
            $head_titel = mysqli_query($con_pro, "SELECT * FROM product WHERE name = '$titel'");
            $row_jump = mysqli_fetch_assoc($head_titel);
            if($row_jump){
                $_SESSION['id'] = $row_jump['name'];
            }
        }
        ?>
		<?php
}else{
	header("location: ./loging.php");
}
?>
    <ul class="d-flex gap-2" style="flex-direction: column;">
    <?php
    // session_start();

    if (isset($_SESSION['name'])) {
        if (mysqli_num_rows($qry_select) > 0) {
            while ($row_add = mysqli_fetch_array($qry_select)) {
    ?>
                <li class="mt-3" style="cursor:pointer;">
                    <a href="addtocart.php?id=<?php echo $row_add['name']; ?>">
                        <div class="product-details d-flex gap-3 align-items-center">
                            <div class="img">
                                <img src="upload/<?php echo $row_add['product_img']; ?>" alt="Product 1">
                            </div>
                            <div class="wish-product">
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
        } else {
            echo "<div>
                    <img class='img_fav' src='./img_ecommerce/fav.jpg'>
                    <p>Please add items to the wishlist</p>
                  </div>";
        }
    } else {
        echo "<div>
                <img class='img_fav' src='./img_ecommerce/fav.jpg'>
                <p>Please login to view your wishlist</p>
              </div>";
    }
    ?>
</ul>
</div>

    <section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url(./img_ecommerce/img_ecommerce11.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Women Collection 2018
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									NEW SEASON
								</h2>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="product.html"
									class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(./img_ecommerce/img_ecommerce09.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Men New-Season
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn"
								data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									Jackets & Coats
								</h2>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="product.html"
									class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(./img_ecommerce/img_ecommerce10.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft"
								data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Men Collection 2018
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight"
								data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									New arrivals
								</h2>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
								<a href="product.html"
									class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <section>
        <div class="scale_card">
            <?php        
        $rows = mysqli_query($con_pro, "SELECT * FROM product WHERE id IN (7, 5, 6)");
        while($row_woods=mysqli_fetch_array($rows)){
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
            $img=mysqli_query($con_pro,"select * from product where id in (19)");
            while ($row=mysqli_fetch_assoc($img)){
            ?>
             <?php
        if(isset($_GET['name'])){
            $titel = $_GET['name'];
            $head_titel = mysqli_query($con_pro, "SELECT * FROM product WHERE name = '$titel'");
            $row_jump = mysqli_fetch_assoc($head_titel);
            if($row_jump){
                $_SESSION['id'] = $row_jump['name'];
            }
        }
        ?>
        <a href="product.php?id=<?php echo $row['name'] ?>">
            <img src="./upload/<?php echo $row['img'];?>" alt="">
            <h3>
                <?php echo $row['name'];}?>
            </h3>
        </a> 
            </div>
            <div class="adjest">
                <div class="clock_decor">
                    <div class="decor">
                        <?php
                            $img=mysqli_query($con_pro,"select * from product where id in (20)");
                            while ($row=mysqli_fetch_assoc($img)){
                            ?>
                            <?php
                            if(isset($_GET['name'])){
                            $titel = $_GET['name'];
                            $head_titel = mysqli_query($con_pro, "SELECT * FROM product WHERE name = '$titel'");
                            $row_jump = mysqli_fetch_assoc($head_titel);
                            if($row_jump){
                                $_SESSION['id'] = $row_jump['name'];
                            }
                        }
                        ?>
                        <a href="product.php?id=<?php echo $row['name'] ?>">
                            <img src="./upload/<?php echo $row['img'];?>" alt="">
                            <h3>
                                <?php echo $row['name'];}?>
                            </h3>
                        </a>
                    </div>
                    <div class="wall_clock">
                        <?php
                        $img=mysqli_query($con_pro,"select * from product where id in (21)");
                        while ($row=mysqli_fetch_assoc($img)){
                        ?>
                        <?php
                        if(isset($_GET['name'])){
                            $titel = $_GET['name'];
                            $head_titel = mysqli_query($con_pro, "SELECT * FROM product WHERE name = '$titel'");
                            $row_jump = mysqli_fetch_assoc($head_titel);
                            if($row_jump){
                                $_SESSION['id'] = $row_jump['name'];
                            }
                        }
                        ?>
                        <a href="product.php?id=<?php echo $row['name'] ?>">
                            <img src="./upload/<?php echo $row['img'];?>" alt="">
                            <h3>
                                <?php echo $row['name'];}?>
                            </h3>
					    </a>
                    </div>
                </div>
                <div class="kitchen" style="height: 60vh; margin-top: 8%;">
                        <?php
                         $img=mysqli_query($con_pro,"select * from product where id in (22)");
                         while ($row=mysqli_fetch_assoc($img)){
                         ?>
					<a href="product.php?id=<?php echo $row['name'] ?>">
                        <img src="./upload/<?php echo $row['img'];}?>" alt="">
				    </a>
                </div>
            </div>
        </div>
    </section>


	<?php include "item.php" ?>
    <?php include "footer.php" ?>

    <script src="dropdown.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="./vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="./vendor/animsition/js/animsition.min.js"></script>
	<script src="./vendor/bootstrap/js/popper.js"></script>
	<script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="./vendor/select2/select2.min.js"></script>
	<script src="./vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="./vendor/isotope/isotope.pkgd.min.js"></script>
    <script src="./vendor/sweetalert/sweetalert.min.js"></script>
    <script src="./vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script src="./vendor/daterangepicker/moment.min.js"></script>
	<script src="./vendor/daterangepicker/daterangepicker.js"></script>
	<script src="./vendor/slick/slick.min.js"></script>
	<script src="./js/slick-custom.js"></script>
	<script src="./vendor/parallax100/parallax100.js"></script>
	<script>
		$(".js-select2").each(function () {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<script>
		$('.parallax100').parallax100();
		</script>
	<script>
		$('.gallery-lb').each(function () { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'image',
				gallery: {
					enabled: true
				},
				mainClass: 'mfp-fade'
			});
		});
		</script>
	<script>
		$('.js-addwish-b2').on('click', function (e) {
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function () {
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function () {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function () {
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function () {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function () {
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function () {
				swal(nameProduct, "is added to cart !", "success");
			});
		});

	</script>
	<!--===============================================================================================-->
	<script>
		$('.js-pscroll').each(function () {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function () {
				ps.update();
			})
		});
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>