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
                <!-- First row of cards -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <?php
        if(isset($_GET['id'])){
            $idjump = $_GET['id'];
            $rowsjump = mysqli_query($con, "SELECT * FROM decor_art WHERE id = $idjump");
            $row_jump = mysqli_fetch_assoc($rowsjump);
            if($row_jump){
                $_SESSION['id'] = $row_jump['id'];
            }
        }
        $rows_decore_art = mysqli_query($con, "SELECT * FROM decor_art WHERE id IN (5)");
        while($row_decore=mysqli_fetch_assoc($rows_decore_art)){
        ?>
                        <a href="addtocart.php?id=<?php echo $row_decore['id'] ;?>">
                            <div class="change-img card-img-top">
                                <img src="./upload/<?php echo $row_decore['decor_img']; }?>" class="img-setoff"
                                    alt="Card image">
                                <img src="../img_ecommerce/img_ecommerce19.jpg" class="img-set" alt="Card image">
                            </div>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Arctander Chair</h5>
                            <p class="card-text">LIGHTING</p>
                            <p class="card-price">$49.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <?php
                            $rows_decore_art = mysqli_query($con, "SELECT * FROM decor_art WHERE id IN (6)");
        while($row_decore=mysqli_fetch_assoc($rows_decore_art)){
        ?>
                        <a href="addtocart.php?id=<?php echo $row_decore['id'] ;?>">
                            <div class="change-img card-img-top">
                                <img src="./upload/<?php echo $row_decore['decor_img']; }?>" class="img-setoff"
                                    alt="Card image">
                                <img src="../img_ecommerce/img_ecommerce22.jpg" class="img-set" alt="Card image">
                            </div>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">beoplay a1</h5>
                            <p class="card-text">LIGHTING</p>
                            <p class="card-price">$39.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <?php
                            $rows_decore_art = mysqli_query($con, "SELECT * FROM decor_art WHERE id IN (7)");
        while($row_decore=mysqli_fetch_assoc($rows_decore_art)){
        ?>
                        <a href="addtocart.php?id=<?php echo $row_decore['id'] ;?>">
                            <div class="change-img card-img-top">
                                <img src="./upload/<?php echo $row_decore['decor_img']; }?>" alt="Card image">
                            </div>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">hanging egg chair</h5>
                            <p class="card-text">LIGHTING</p>
                            <p class="card-price">$99.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <?php
                            $rows_decore_art = mysqli_query($con, "SELECT * FROM decor_art WHERE id IN (8)");
        while($row_decore=mysqli_fetch_assoc($rows_decore_art)){
        ?>
                        <a href="addtocart.php?id=<?php echo $row_decore['id'] ;?>">
                            <div class="change-img card-img-top">
                                <img src="./upload/<?php echo $row_decore['decor_img']; }?>" class="img-setoff"
                                    alt="Card image">
                                <img src="../img_ecommerce/img_ecommerce25.jpg" class="img-set" alt="Card image">
                            </div>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">hubert pendant lamp</h5>
                            <p class="card-text">LIGHTING</p>
                            <p class="card-price">$149.00</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Second row of cards -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <?php
                            $rows_decore_art = mysqli_query($con, "SELECT * FROM decor_art WHERE id IN (9)");
                            while($row_decore=mysqli_fetch_assoc($rows_decore_art)){
        ?>
                        <a href="addtocart.php?id=<?php echo $row_decore['id'] ;?>">
                            <div class="change-img card-img-top">
                                <img src="./upload/<?php echo $row_decore['decor_img']; }?>" class="img-setoff"
                                    alt="Card image">
                                <img src="../img_ecommerce/img_ecommerce26.jpg" class="img-set" alt="Card image">
                            </div>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">iconic rocking horse</h5>
                            <p class="card-text">CHAIRS</p>
                            <p class="card-price">$169.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <?php
                            $rows_decore_art = mysqli_query($con, "SELECT * FROM decor_art WHERE id IN (10)");
                            while($row_decore=mysqli_fetch_assoc($rows_decore_art)){
        ?>
                        <a href="addtocart.php?id=<?php echo $row_decore['id'] ;?>">
                            <div class="change-img card-img-top">
                                <img src="./upload/<?php echo $row_decore['decor_img']; }?>" class="img-setoff"
                                    alt="Card image">
                                <img src="../img_ecommerce/img_ecommerce29.jpg" class="img-set" alt="Card image">
                            </div>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">langue stack chair</h5>
                            <p class="card-text">CHAIRS</p>
                            <p class="card-price">$299.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <?php
                            $rows_decore_art = mysqli_query($con, "SELECT * FROM decor_art WHERE id IN (11)");
                            while($row_decore=mysqli_fetch_assoc($rows_decore_art)){
        ?>
                        <a href="addtocart.php?id=<?php echo $row_decore['id'] ;?>">
                            <div class="change-img card-img-top">
                                <img src="./upload/<?php echo $row_decore['decor_img']; }?>" class="img-setoff"
                                    alt="Card image">
                                <img src="../img_ecommerce/img_ecommerce31.jpg" class="img-set" alt="Card image">
                            </div>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">laundry baskets</h5>
                            <p class="card-text">CHAIRS</p>
                            <p class="card-price">$45.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <?php
                            $rows_decore_art = mysqli_query($con, "SELECT * FROM decor_art WHERE id IN (12)");
                            while($row_decore=mysqli_fetch_assoc($rows_decore_art)){
        ?>
                        <a href="addtocart.php?id=<?php echo $row_decore['id'] ;?>">
                            <div class="change-img card-img-top">
                                <img src="./upload/<?php echo $row_decore['decor_img']; }?>" class="img-setoff"
                                    alt="Card image">
                                <img src="../img_ecommerce/img_ecommerce33.jpg" class="img-set" alt="Card image">
                            </div>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">mini table lamp</h5>
                            <p class="card-text">CHAIRS</p>
                            <p class="card-price">$49.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>