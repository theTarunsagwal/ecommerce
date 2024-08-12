<?php
session_start();
// if(isset($_SESSION['name'])){
    $con = mysqli_connect("localhost","root","","ecommerce");
    $con_userside = mysqli_connect('localhost', 'root', '', 'user_side');


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

    <link rel="stylesheet" type="text/css" href="./vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./wood.php">
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
    <?php include "footer.php" ?>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="dropdown.js"></script>

    <script src="./vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="./vendor/animsition/js/animsition.min.js"></script>
	<script src="./vendor/bootstrap/js/popper.js"></script>
	<script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="./vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function () {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<script src="./vendor/daterangepicker/moment.min.js"></script>
	<script src="./vendor/daterangepicker/daterangepicker.js"></script>
	<script src="./vendor/slick/slick.min.js"></script>
	<script src="./js/slick-custom.js"></script>
	<script src="./vendor/parallax100/parallax100.js"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<script src="./vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
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
	<script src="./vendor/isotope/isotope.pkgd.min.js"></script>
	<script src="./vendor/sweetalert/sweetalert.min.js"></script>
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
	<script src="./vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
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

