<section>
    <div class="explore-new">
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

                                <div class="container mt-5">
        <div class="row">
            <?php
            if (isset($_POST['value'])) {
                $min = $_POST['min'];
                $max = $_POST['max'];

                $query_value = mysqli_query($con, "SELECT * FROM decor_art WHERE decor_price BETWEEN '$min' AND '$max'");
                $cardData = [
                    ['id' => 5, 'title' => 'Arctander Chair', 'price' => '$49.00', 'img' => '../img_ecommerce/img_ecommerce19.jpg', 'category' => 'LIGHTING'],
                    ['id' => 6, 'title' => 'beoplay a1', 'price' => '$39.00', 'img' => '../img_ecommerce/img_ecommerce22.jpg', 'category' => 'LIGHTING'],
                    ['id' => 7, 'title' => 'hanging egg chair', 'price' => '$99.00', 'img' => '../img_ecommerce/img_ecommerce23.jpg', 'category' => 'LIGHTING'],
                    ['id' => 8, 'title' => 'hubert pendant lamp', 'price' => '$149.00', 'img' => '../img_ecommerce/img_ecommerce24.jpg', 'category' => 'LIGHTING'],
                    ['id' => 9, 'title' => 'iconic rocking horse', 'price' => '$169.00', 'img' => '../img_ecommerce/img_ecommerce26.jpg', 'category' => 'CHAIRS'],
                    ['id' => 10, 'title' => 'langue stack chair', 'price' => '$299.00', 'img' => '../img_ecommerce/img_ecommerce29.jpg', 'category' => 'CHAIRS'],
                    ['id' => 11, 'title' => 'laundry baskets', 'price' => '$45.00', 'img' => '../img_ecommerce/img_ecommerce31.jpg', 'category' => 'CHAIRS'],
                    ['id' => 12, 'title' => 'mini table lamp', 'price' => '$49.00', 'img' => '../img_ecommerce/img_ecommerce33.jpg', 'category' => 'CHAIRS']
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
                    ['id' => 5, 'title' => 'Arctander Chair', 'price' => '$49.00', 'img' => '../img_ecommerce/img_ecommerce19.jpg', 'category' => 'LIGHTING'],
                    ['id' => 6, 'title' => 'beoplay a1', 'price' => '$39.00', 'img' => '../img_ecommerce/img_ecommerce22.jpg', 'category' => 'LIGHTING'],
                    ['id' => 7, 'title' => 'hanging egg chair', 'price' => '$99.00', 'img' => '../img_ecommerce/img_ecommerce23.jpg', 'category' => 'LIGHTING'],
                    ['id' => 8, 'title' => 'hubert pendant lamp', 'price' => '$149.00', 'img' => '../img_ecommerce/img_ecommerce24.jpg', 'category' => 'LIGHTING'],
                    ['id' => 9, 'title' => 'iconic rocking horse', 'price' => '$169.00', 'img' => '../img_ecommerce/img_ecommerce26.jpg', 'category' => 'CHAIRS'],
                    ['id' => 10, 'title' => 'langue stack chair', 'price' => '$299.00', 'img' => '../img_ecommerce/img_ecommerce29.jpg', 'category' => 'CHAIRS'],
                    ['id' => 11, 'title' => 'laundry baskets', 'price' => '$45.00', 'img' => '../img_ecommerce/img_ecommerce31.jpg', 'category' => 'CHAIRS'],
                    ['id' => 12, 'title' => 'mini table lamp', 'price' => '$49.00', 'img' => '../img_ecommerce/img_ecommerce33.jpg', 'category' => 'CHAIRS']
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