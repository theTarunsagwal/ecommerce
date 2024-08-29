<section class="bg0 p-t-23 p-b-140">
	<div class="container">
		<div class="p-b-10">
			<h3 class="ltext-103 cl5">
				New Product & Trending Category
			</h3>
		</div>

		<div class="flex-w flex-sb-m p-b-52">
			<div class="flex-w flex-l-m filter-tope-group m-tb-10">
				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
					All Products
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
					Women
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
					Men
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".light">
					Light
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".shoes">
					Shoes
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".watch">
					Watches
				</button>
			</div>

			<div class="flex-w flex-c-m m-tb-10">
				<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
					<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
					<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
					Filter
				</div>
			</div>

			<!-- Filter -->
			<div class="dis-none panel-filter w-full p-t-10">
				<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
					<div class="filter-col1 p-r-15 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Sort By
						</div>

						<ul>
							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									Default
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									Popularity
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									Average rating
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
									Newness
								</a>
							</li>


						</ul>
					</div>

					<div class="filter-col2 p-r-15 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Price
						</div>
						<form action="" method="post">
							<ul>
								<li class="p-b-6">
									<button type="submit" value="all" name="price_range"
										class="filter-link stext-106 trans-04 filter-link-active">
										All
									</button>
								</li>

								<li class="p-b-6">
									<button type="submit" value="0-250" name="price_range"
										class="filter-link stext-106 trans-04">
										$0.00 - $250.00
									</button>
								</li>

								<li class="p-b-6">
									<button type="submit" value="250-500" name="price_range"
										class="filter-link stext-106 trans-04">
										$250.00 - $500.00
									</button>
								</li>

								<li class="p-b-6">
									<button type="submit" value="500-650" name="price_range"
										class="filter-link stext-106 trans-04">
										$500.00 - $650.00
									</button>
								</li>

								<li class="p-b-6">
									<button type="submit" value="650" name="price_range"
										class="filter-link stext-106 trans-04">
										$650.00+
									</button>
								</li>
								<li class="p-b-6">
									<button type="submit" value="Low to High" name="price_range"
										class="filter-link stext-106 trans-04">
										Price: Low to High
									</button>
								</li>

								<li class="p-b-6">
									<button type="submit" value="High to Low" name="price_range"
										class="filter-link stext-106 trans-04">
										Price: High to Low
									</button>
								</li>
							</ul>
						</form>
					</div>

				</div>
			</div>
		</div>
		<div class="row isotope-grid">

			<?php
					if(isset($_POST['price_range'])){
						$price_select = $_POST['price_range'];
						switch ($price_select) {
							case '0-250':
								$qury = " where price between 0 AND 250";
								break;
							case '250-500':
								$qury = " where price between 250 AND 500";
								break;
							case '500-650':
								$qury = " where price between 500 AND 650";
								break;
							case '650':
								$qury = " where price >= 650";
								break;
							case 'Low to High':
								$qury = "ORDER BY price ASC";
								break;
							case 'High to Low':
								$qury = "ORDER BY price DESC";
								break;	
							case"all":
							?>

			<?php
										  $qury_product = mysqli_query($con_pro,"SELECT id, name, price, img, cat_name FROM product LEFT JOIN category ON product.category = category.cat_id WHERE product.id BETWEEN 23 AND 500 ORDER BY product.id DESC;");
										  while($row_product = mysqli_fetch_assoc($qury_product)){
									  ?>
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $row_product['cat_name']?>">
				<!-- Block2 -->
				<a href="addtocart.php?id=<?php echo $row_product['name']?>">

					<div class="block2">
						<div class="block2-pic hov-img0">
							<img style="height: 365px;" src="upload/<?php echo $row_product['img']; ?>"
								alt="IMG-PRODUCT">
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php echo $row_product['name']; ?>
								</a>

								<span class="stext-105 cl3">
									$
									<?php echo $row_product['price']; ?>
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
							<form method="POST" id="wish_form_<?php echo $row_product['id']; ?>" class="wish_form">
    <input type="hidden" value="<?php echo $row_product['id']; ?>" name="wish_id" class="wish_id">
    <input type="hidden" value="<?php echo $row_product['name']; ?>" name="wish_name" class="wish_name">
    <input type="hidden" value="<?php echo $row_product['img']; ?>" name="wish_img" class="wish_img">
    <input type="hidden" value="<?php echo $row_product['price']; ?>" name="wish_price" class="wish_price">
    <button type="button" name="heart_sub" class="heart-btn" data-id="<?php echo $row_product['id']; ?>">
        <?php
        $wish_id_product = $row_product['id'];
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
			<?php } ?>

			<?php
								break;
								default:
								echo "no product found";
								break;
						}
						// echo $qury;
						$qry_merg = "SELECT id, name, price, img, cat_name FROM product LEFT JOIN category ON product.category = category.cat_id $qury ";
						// echo $qry_merg;
						$qry_all_filter= mysqli_query($con_pro,$qry_merg);
						while($row_filter = mysqli_fetch_array($qry_all_filter)){
							?>
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $row_filter['cat_name']?>">
				<!-- Block2 -->
				<a href="addtocart.php?id=<?php echo $row_filter['name']?>">

					<div class="block2">
						<div class="block2-pic hov-img0">
							<img style="height: 365px;" src="upload/<?php echo $row_filter['img']; ?>"
								alt="IMG-PRODUCT">
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php echo $row_filter['name']; ?>
								</a>

								<span class="stext-105 cl3">
									$
									<?php echo $row_filter['price']; ?>
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
							<form method="POST" id="wish_form_<?php echo $row_filter['id']; ?>" class="wish_form">
    <input type="hidden" value="<?php echo $row_filter['id']; ?>" name="wish_id" class="wish_id">
    <input type="hidden" value="<?php echo $row_filter['name']; ?>" name="wish_name" class="wish_name">
    <input type="hidden" value="<?php echo $row_filter['img']; ?>" name="wish_img" class="wish_img">
    <input type="hidden" value="<?php echo $row_filter['price']; ?>" name="wish_price" class="wish_price">
    <button type="button" name="heart_sub" class="heart-btn" data-id="<?php echo $row_filter['id']; ?>">
        <?php
        $wish_id_product = $row_filter['id'];
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
					}else{
					?>

			<?php
							$qury_product = mysqli_query($con_pro,"SELECT id, name, price, img, cat_name FROM product LEFT JOIN category ON product.category = category.cat_id WHERE product.id BETWEEN 23 AND 500 ORDER BY product.id DESC;");
							while($row_product = mysqli_fetch_assoc($qury_product)){
						?>
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $row_product['cat_name']?>">
				<!-- Block2 -->
				<a href="addtocart.php?id=<?php echo $row_product['name']?>">

					<div class="block2">
						<div class="block2-pic hov-img0">
							<img style="height: 365px;" src="upload/<?php echo $row_product['img']; ?>"
								alt="IMG-PRODUCT">
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php echo $row_product['name']; ?>
								</a>

								<span class="stext-105 cl3">
									$
									<?php echo $row_product['price']; ?>
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
							<form method="POST" id="wish_form_<?php echo $row_product['id']; ?>" class="wish_form">
    <input type="hidden" value="<?php echo $row_product['id']; ?>" name="wish_id" class="wish_id">
    <input type="hidden" value="<?php echo $row_product['name']; ?>" name="wish_name" class="wish_name">
    <input type="hidden" value="<?php echo $row_product['img']; ?>" name="wish_img" class="wish_img">
    <input type="hidden" value="<?php echo $row_product['price']; ?>" name="wish_price" class="wish_price">
    <button type="button" name="heart_sub" class="heart-btn" data-id="<?php echo $row_product['id']; ?>">
        <?php
        $wish_id_product = $row_product['id'];
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
			<?php } ?>

			<?php } ?>
		</div>
	</div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.heart-btn').on('click', function(e) {
        e.preventDefault(); // Prevent the default form submission

        var formId = $(this).data('id');
        var formData = $('#wish_form_' + formId).serialize();

        console.log(formData); // Debugging: check if data is being serialized correctly

        $.ajax({
            url: './wishlistsql.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                console.log(response); // Debugging: check the response from the server
                if (response.trim() === "added") {
                    $('#wish_form_' + formId).find('.heart').removeClass('bx-heart').addClass('bxs-heart');
                    alert('Item added to wishlist');
                } else if (response.trim() === "removed") {
                    $('#wish_form_' + formId).find('.heart').removeClass('bxs-heart').addClass('bx-heart');
                    alert('Item removed from wishlist');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Debugging: check for errors in the response
            }
        });
    });
});
</script>