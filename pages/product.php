<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="css_admin_page/product.css">
	<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
	<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
	<script src="./vendor/jquery/jquery-3.2.1.min.js"></script>
<!-- or -->
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.7.1.js"
		integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
	<link rel="stylesheet" href="./css_admin_page/wishlist.css">
</head>

<body>
	<?php
session_start();
if(isset($_SESSION['name'])) {
	// echo $_SESSION['name'];
	$con_wish = mysqli_connect("localhost","root","","wishlist_user");
	$wish_face = "wish_name_".$_SESSION['id'];
	$qry_count = mysqli_query($con_wish,"
	 SELECT COUNT(*) AS total_rows FROM $wish_face
");
if ($qry_count) {
    $row = mysqli_fetch_assoc($qry_count);
    echo $row['total_rows'];
} else {
    echo "Error: " . mysqli_error($con_wish);
}

	 include "header.php";
	 ?>
	<div class="wishlist wishlist-closed" id="wishlist">
	    <h2 class="text-black fw-bolder fs-6">My Favorites</h2>
	    <ul id="wishlist-container" class="d-flex gap-2" style="flex-direction: column;"></ul>
    </div>

	<?php
     $con_pro = mysqli_connect("localhost", "root", "", "product_data");
	 
      if(isset($_GET['id']) && !empty($_GET['id'])){
	?>
	<section class="product-container bg0  ">
		<div class="container mt-5 " id='container'>
			<div class="p-b-10 mb-2">
				<h3 class=" ltext-100 cl5">
					New Product & Trending Category
					<span class=" text-secondary ltext-103 cl5 text-decoration-underline ">
						<?php echo $_GET['id'];?>
					</span>
				</h3>
			</div>
			<div class="flex-w flex-l-m filter-tope-group brand-filter m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Brand
					</button>
					<?php
					if($_GET['id'] == 'men' || $_GET['id'] == 'women'){
					?>
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".nike">
						Nike
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".Zara">
						Zara
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
						Men
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".LouisVuitton">
						Louis Vuitton
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".Gucci">
						Gucci
					</button>
					<?php 
					}else if($_GET['id'] == 'watch' || $_GET['id'] == 'Phone'){
						?>
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".apple">
							Apple
						</button>
	
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".samsung">
							Samsung
						</button>
	
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".iqoo">
							IQOO
						</button>
	
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".redmi">
							Redmi
						</button>
	
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".google">
							Google
						</button>
						<?php 
					}
					?>
				</div>
			<div class="row isotope-grid mt-3">
				<?php
                              $id = $_GET['id'];
                              $qury = mysqli_query($con_pro,"SELECT id,name,price,about,img,cat_name,p_name FROM product LEFT JOIN product_brand ON product.brand_name = product_brand.p_id LEFT JOIN category ON product.category = category.cat_id WHERE  category.cat_name = '$id'");
                              while ($row = mysqli_fetch_array($qury)){
                             ?>

				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $row['cat_name']; ?> <?php echo $row['p_name']; ?>">
					<!-- Block2 -->
					<a href="addtocart.php?id=<?php echo $row['name']; ?>">
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img style="height: 365px;" src="upload/<?php echo $row['img']; ?>" alt="IMG-PRODUCT">

								<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
								    Quick View
							    </a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="addtocart.php?id=<?php echo $row['name']; ?>"
										class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										<?php echo $row['name']; ?>
									</a>

									<span class="stext-105 cl3">
										$
										<?php echo $row['price']; ?>
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<form method="POST" id="wish_form_<?php echo $row['id']; ?>" class="wish_form">
										<input type="hidden" value="<?php echo $row['id']; ?>" name="wish_id"
											class="wish_id">
										<input type="hidden" value="<?php echo $row['name']; ?>" name="wish_name"
											class="wish_name">
										<input type="hidden" value="<?php echo $row['img']; ?>" name="wish_img"
											class="wish_img">
										<input type="hidden" value="<?php echo $row['price']; ?>" name="wish_price"
											class="wish_price">
										<button type="button" name="heart_sub" class="heart-btn"
											data-id="<?php echo $row['id']; ?>">
											<?php
                                                 $wish_id_product = $row['id'];
                                                 $qry_user_product = mysqli_query($con_wish, "SELECT * FROM $wish_face WHERE id = $wish_id_product");
                                                 if (mysqli_num_rows($qry_user_product) > 0) {
                                            ?>
											<i class='bx bxs-heart heart' style="font-size:1.5rem; cursor:pointer;"></i>
											<?php } else { ?>
											<i class='bx bx-heart heart' style="font-size:1.5rem; cursor:pointer;"></i>
											<?php } ?>
										</button>
									</form>
								</div>
							</div>
						</div>
					</a>
				</div>
				<?php
				               }
                           }
						   ?>
			</div>
		</div>
	</section>
	<script>
		$(document).ready(function(){
		var	$btn_filter = $(".brand-filter");
		var $section_filter = $(".isotope-grid");
		 $btn_filter.each(function (){
			$btn_filter.on('click', 'button', function() {
				var filter_work = $(this).attr('data-filter');
				$section_filter.isotope({filter:filter_work});
			})
		 })
		});
	</script>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function () {
			$('.heart-btn').on('click', function (e) {
				e.preventDefault(); // Prevent the default form submission

				var formId = $(this).data('id');
				var formData = $('#wish_form_' + formId).serialize();

				console.log(formData); // Debugging: check if data is being serialized correctly

				$.ajax({
					url: './wishlistsql.php',
					type: 'POST',
					data: formData,
					success: function (response) {
						console.log(response); // Debugging: check the response from the server
						if (response.trim() === "added") {
							$('#wish_form_' + formId).find('.heart').removeClass('bx-heart').addClass('bxs-heart');
							swal("Add successful", "Thankyou for add me", "success");
						} else if (response.trim() === "removed") {
							$('#wish_form_' + formId).find('.heart').removeClass('bxs-heart').addClass('bx-heart');
							swal("remove successful", "why are remove me", "success");
						}
					},
					error: function (xhr, status, error) {
						console.error(xhr.responseText); // Debugging: check for errors in the response
					}
				});
			});
		});
       $(document).ready(function () {
    // Fetch wishlist items when the page loads
    fetchWishlist();

    // Fetch the wishlist data from PHP via AJAX every 2 seconds (2000 ms)
    setInterval(fetchWishlist, 2000);

    // Fetch the wishlist data from PHP via AJAX
    function fetchWishlist() {
        $.ajax({
            url: 'wishlist.php',
            method: 'POST',
            data: { action: 'get_wishlist' },
            success: function (response) {
                $('#wishlist-container').html(response);
                bindRemoveButtons(); // Bind click events to remove buttons
            },
            error: function () {
                alert('Failed to fetch wishlist data.');
            }
        });
    }

    // Bind remove button click events
    function bindRemoveButtons() {
        $('.remove-btn').click(function (e) {
            e.preventDefault();
            const productId = $(this).val();

            $.ajax({
                url: 'wishlist.php',
                method: 'POST',
                data: { action: 'remove', remove: productId },
                success: function (response) {
                    alert(response); // Display message on successful removal
                    fetchWishlist(); // Refresh the wishlist immediately after removing
                },
                error: function () {
                    alert('Failed to remove item from wishlist.');
                }
            });
        });
    }
});

    </script>




	<?php include "footer.php" ?>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
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
	<script src="js/main.js"></script>

	<?php
}else{
	header("location: ./loging.php");
}
?>
</body>

</html>