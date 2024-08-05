
<section>
    <div class="explore-new">
        <div class="product-filter">
           <nav class="nav-furniture">
            <h1>explore new furniture</h1>
            <ul>
                <li>
                    <a href="#">sofas</a>
                </li>
                <li>
                    <a href="#">chair</a>
                </li>
                <li>
                    <a href="#">table</a>
                </li>
                <li>
                    <a href="#">lamps & lighting</a>
                </li>
                <li>
                    <a href="#">kitchen accessories</a>
                </li>
            </ul>
           </nav>
           <div class="filter">
                    <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Filter
					</div>	
           </div>
        </div>

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

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: Low to High
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: High to Low
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$0.00 - $50.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$50.00 - $100.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$100.00 - $150.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$150.00 - $200.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$200.00+
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col4 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Tags
							</div>

							<div class="flex-w p-t-4 m-r--5">
								<a href="#"
									class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Fashion
								</a>

								<a href="#"
									class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Lifestyle
								</a>

								<a href="#"
									class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Denim
								</a>

								<a href="#"
									class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Streetstyle
								</a>

								<a href="#"
									class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Crafts
								</a>
							</div>
						</div>
					</div>
				</div>

     <div class="container mt-5">
        <div class="row">
            <?php
            if (isset($_POST['value'])) {
                $min = $_POST['min'];
                $max = $_POST['max'];

                $query_value = mysqli_query($con, "SELECT * FROM decor_art WHERE decor_price BETWEEN '$min' AND '$max'");
                $cardData = [
                    ['id' => 5, 'title' => 'Arctander Chair', 'price' => '$49.00', 'img' => './img_ecommerce/img_ecommerce19.jpg', 'category' => 'LIGHTING'],
                    ['id' => 6, 'title' => 'beoplay a1', 'price' => '$39.00', 'img' => './img_ecommerce/img_ecommerce22.jpg', 'category' => 'LIGHTING'],
                    ['id' => 7, 'title' => 'hanging egg chair', 'price' => '$99.00', 'img' => './img_ecommerce/img_ecommerce23.jpg', 'category' => 'LIGHTING'],
                    ['id' => 8, 'title' => 'hubert pendant lamp', 'price' => '$149.00', 'img' => './img_ecommerce/img_ecommerce24.jpg', 'category' => 'LIGHTING'],
                    ['id' => 9, 'title' => 'iconic rocking horse', 'price' => '$169.00', 'img' => './img_ecommerce/img_ecommerce26.jpg', 'category' => 'CHAIRS'],
                    ['id' => 10, 'title' => 'langue stack chair', 'price' => '$299.00', 'img' => './img_ecommerce/img_ecommerce29.jpg', 'category' => 'CHAIRS'],
                    ['id' => 11, 'title' => 'laundry baskets', 'price' => '$45.00', 'img' => './img_ecommerce/img_ecommerce31.jpg', 'category' => 'CHAIRS'],
                    ['id' => 12, 'title' => 'mini table lamp', 'price' => '$49.00', 'img' => './img_ecommerce/img_ecommerce33.jpg', 'category' => 'CHAIRS']
                ];
                if ($query_value && mysqli_num_rows($query_value) > 0) {
                    while ($row_decore = mysqli_fetch_assoc($query_value)) {
                        foreach ($cardData as $card) {
                            if ($row_decore['id'] == $card['id']) {
                        ?>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card">
                                <a href="addtocart.php?id=<?php echo $row_decore['decor_name']; ?>">
                                    <div class="change-img card-img-top">
                                        <img src="./upload/<?php echo $row_decore['decor_img']; ?>" class="img-setoff" alt="Card image">
                                        <img src="<?php echo $card['img']; ?>" class="img-set" alt="Card image2">
                                    </div>
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row_decore['decor_name']; ?></h5>
                                    <p class="card-text"><?php echo $row_decore['decor_about']; ?></p>
                                    <p class="card-price">$<?php echo $row_decore['decor_price']; ?>.00</p>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        }
                    }
                } else {
                    echo "<h3>No result found for the selected price range</h3>";
                }
            }else {
                $all_products = mysqli_query($con, "SELECT * FROM decor_art WHERE id IN (5, 6, 7, 8, 9, 10, 11, 12)");

                $cardData = [
                    ['id' => 5, 'title' => 'Arctander Chair', 'price' => '$49.00', 'img' => './img_ecommerce/img_ecommerce19.jpg', 'category' => 'LIGHTING'],
                    ['id' => 6, 'title' => 'beoplay a1', 'price' => '$39.00', 'img' => './img_ecommerce/img_ecommerce22.jpg', 'category' => 'LIGHTING'],
                    ['id' => 7, 'title' => 'hanging egg chair', 'price' => '$99.00', 'img' => './img_ecommerce/img_ecommerce23.jpg', 'category' => 'LIGHTING'],
                    ['id' => 8, 'title' => 'hubert pendant lamp', 'price' => '$149.00', 'img' => './img_ecommerce/img_ecommerce24.jpg', 'category' => 'LIGHTING'],
                    ['id' => 9, 'title' => 'iconic rocking horse', 'price' => '$169.00', 'img' => './img_ecommerce/img_ecommerce26.jpg', 'category' => 'CHAIRS'],
                    ['id' => 10, 'title' => 'langue stack chair', 'price' => '$299.00', 'img' => './img_ecommerce/img_ecommerce29.jpg', 'category' => 'CHAIRS'],
                    ['id' => 11, 'title' => 'laundry baskets', 'price' => '$45.00', 'img' => './img_ecommerce/img_ecommerce31.jpg', 'category' => 'CHAIRS'],
                    ['id' => 12, 'title' => 'mini table lamp', 'price' => '$49.00', 'img' => './img_ecommerce/img_ecommerce33.jpg', 'category' => 'CHAIRS']
                ];

                while ($row_decore = mysqli_fetch_assoc($all_products)) {
                    foreach ($cardData as $card) {
                        if ($row_decore['id'] == $card['id']) {
                            ?>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card">
                                    <a href="addtocart.php?id=<?php echo $row_decore['decor_name']; ?>">
                                        <div class="change-img card-img-top">
                                            <img src="./upload/<?php echo $row_decore['decor_img']; ?>" class="img-setoff" alt="Card image1">
                                            <img src="<?php echo $card['img']; ?>" class="img-set" alt="Card image2">
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row_decore['decor_name']; ?></h5>
                                        <p class="card-text"><?php echo $row_decore['decor_about']; ?></p>
                                        <p class="card-price">$<?php echo $row_decore['decor_price']; ?>.00</p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
            }
            ?>
        </div>
    </div>
    </div>
</section>
