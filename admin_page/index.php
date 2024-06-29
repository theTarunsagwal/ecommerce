<?php
session_start();
if(isset($_SESSION['name'])){
    $con = mysqli_connect("localhost","root","","ecommerce");
    // $qurry=mysqli_query($con,"select * from new_product");
$data_product = mysqli_query($con, 'SELECT * FROM new_product');
$data_wood = mysqli_query($con, 'SELECT * FROM wood');
$data_art = mysqli_query($con, 'SELECT * FROM decor_art');
$data_room = mysqli_query($con, 'SELECT * FROM dining_room');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Megumi shoplift</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css_admin_page/index.css">
</head>

<body>
    <header>
        <div class="logo" onclick="change()">
            <i id="x" class="bx bx-menu" onclick="chg()"></i>
            <img src="./logo_black.png" alt="">
        </div>
        <nav>
            <ul class="nav_ul">
                <li onclick="drophome()"><span>home</span><i class='bx bx-chevron-down'></i></li>
                <!-- home dropdown -->
                <div class="dropdown">
                    <div class="dropdown-item">
                        <?php
                        $ab=['all products','bar furniture','decor art','dining room','headboards','lighting','living room'];
                        $count=0;
                        while($count<7){
                        ?>
                        <a href="#">
                            <?php echo $ab[$count];
                        ?>
                        </a>
                        <?php
                        $count++;
                        }
                        ?>
                    </div>
                </div>
                <li onclick="dropshop()"><span>shops</span><i class='bx bx-chevron-down'></i></li>
                <!-- shops dropdown -->
                <div class="dropdown_shop">
                    <div class="dropdown-content-item">
                        <div class="dropdown-item">
                            <h1>collection</h1>
                            <?php
                        $ab=['all products','bar furniture','decor art','dining room','headboards','lighting','living room'];
                        $count=0;
                        while($count<7){
                        ?>
                            <a href="#">
                                <?php echo $ab[$count];
                        ?>
                            </a>
                            <?php
                        $count++;
                        }
                        ?>
                        </div>
                        <div class="dropdown-item">
                            <h1>shop pages</h1>
                            <?php
                        $ab=['sidebar left','sidebar right','full width','full width - no filter','filter top','lighting','living room'];
                        $count=0;
                        while($count<7){
                        ?>
                            <a href="#">
                                <?php echo $ab[$count];
                        ?>
                            </a>
                            <?php
                        $count++;
                        }
                        ?>
                        </div>
                        <div class="dropdown-item">
                            <h1>product pages</h1>
                            <?php
                        $ab=['thumbnail left','thumbnail right','thumbnail top','thumbnail bottom','product variants','variants dropdown','gallery stacked'];
                        $count=0;
                        while($count<7){
                        ?>
                            <a href="#">
                                <?php echo $ab[$count];
                        ?>
                            </a>
                            <?php
                        $count++;
                        }
                        ?>
                        </div>
                        <div class="dropdown-item">
                            <h1>new product</h1>
                            <?php
                        $ab=['sidebar left','sidebar right','full width','full width - no filter','filter top','lighting','living room'];
                        $count=0;
                        while($count<7){
                        ?>
                            <a href="#">
                                <?php echo $ab[$count];
                        ?>
                            </a>
                            <?php
                        $count++;
                        }
                        ?>
                        </div>
                        <div class="dropdown-item">
                            <h1>new product</h1>
                            <?php
                            while($row_pro = mysqli_fetch_array($data_product)){
                                ?>
                            <div class="product_img_price">
                                <div class="product_img">
                                    <img src="./upload/<?php echo $row_pro['img']?>" alt="">
                                </div>
                                <div class="product_price">
                                    <h1>
                                        <?php echo $row_pro['name'];?>
                                    </h1>
                                    <h4>$
                                        <?php echo $row_pro['price'];?>.00
                                    </h4>
                                </div>
                            </div>
                            <?php }; ?>
                        </div>
                    </div>
                </div>
                <li onclick="dropcollection()"><span>collections</span><i class='bx bx-chevron-down'></i></li>
                <!-- collections dropdown -->
                <div class="dropdown_coll">
                    <div class="dropdown_content_box">
                        <?php
                            while($row_wood= mysqli_fetch_array($data_wood)){
                            ?>
                        <div class="dropdown_box_item">
                            <div class="dropdown_box_img">
                                <img src="./upload/<?php echo $row_wood['image']?>" alt="">
                            </div>
                            <h1>
                                <?php echo $row_wood['image_name']?>
                            </h1>
                        </div>
                        <?php } ?>
                        <?php
                            while($row_art= mysqli_fetch_array($data_art)){
                        ?>
                        <div class="dropdown_box_item">
                            <div class="dropdown_box_img">
                                <img src="./upload/<?php echo $row_art['decor_img']?>" alt="">
                            </div>
                            <h1>
                                <?php echo $row_art['decor_name']?>
                            </h1>
                        </div>
                        <?php }?>
                        <?php
                            while($row_room= mysqli_fetch_array($data_room)){
                        ?>
                        <div class="dropdown_box_item">
                            <div class="dropdown_box_img">
                                <img src="./upload/<?php echo $row_room['dining_image'];?>" alt="">
                            </div>
                            <h1>
                                <?php echo $row_room['dining_name'];?>
                            </h1>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <li onclick="droppage()"><span>pages</span><i class='bx bx-chevron-down'></i></li>
                <!-- pages dropdown -->
                <div class="dropdown_page">
                    <div class="dropdown_page_item ">
                        <?php 
                        $abc=['about us','contact us','F&Qs','Coming soon'];
                        $num=0;
                        while($num<4){
                        ?>
                        <a href="#">
                            <?php echo $abc[$num]?>
                        </a>
                        <?php
                        $num ++;
                        }
                        ?>
                    </div>
                </div>
                <li onclick='dropblogs()'><span>blogs</span><i class='bx bx-chevron-down'></i></li>
                <!-- blogs dropdown -->
                <div class="dropdown_blog">
                    <div class="dropdown_blog_item ">
                        <?php 
                        $abc=['sidebar left','sidebar right','all product','list'];
                        $num=0;
                        while($num<4){
                        ?>
                        <a href="#">
                            <?php echo $abc[$num]?>
                        </a>
                        <?php
                        $num ++;
                        }
                        ?>
                    </div>
                </div>
                <li><a href="">contact us</a></li>
            </ul>
        </nav>
        <div class="search_shop">
            <i class="bx bx-search" id="srch" onclick="search()"></i>
            <div class="search_container search_box">
                <input type="text" name="" placeholder="enter keywords to search...">
                <i class="bx bx-search" id="icon"></i>
            </div>
            <i class='bx bxs-shopping-bags'></i>
            <div class="shoping_bag">
                <a href="">shoping cart</a>
                <a href="">$0.00</a>
            </div>
        </div>
    </header>
    <div class="menubar">
        <div class="menu_bar">
            <ul class="menu_ul">
                <li onclick="drophomes()">home<i class='bx bx-right-arrow-alt'></i></li>
                <li onclick="dropshops()">shops<i class='bx bx-right-arrow-alt'></i></li>
                <li>collections</li>
                <li onclick="droppages()">pages<i class='bx bx-right-arrow-alt'></i></li>
                <li onclick="dropblog()">blogs<i class='bx bx-right-arrow-alt'></i></li>
                <li>contact us</li>
            </ul>
            <div class="dropdown_reponsive">
                <h1 onclick="gohome()"><i class="bx bx-left-arrow-alt" style="color: #f8f9fa;"></i>home</h1>
                <div class="dropdown-item-responsive">
                    <?php
            $ab=['all products','bar furniture','decor art','dining room','headboards','lighting','living room'];
            $count=0;
            while($count<7){
            ?>
                    <a href="#">
                        <?php echo $ab[$count];
            ?>
                    </a>
                    <?php
            $count++;
            }
            ?>
                </div>
            </div>
            <div class="dropdown_reponsive_shop">
                <h1 onclick="goshop()"><i class="bx bx-left-arrow-alt" style="color: #f8f9fa;"></i>shops</h1>
                <div class="dropdown-item-responsive-shop">
                    <?php
            $ab=['thumbnail left','thumbnail right','thumbnail top','thumbnail bottom','product variants','variants dropdown','gallery stacked'];
            $count=0;
            while($count<7){
            ?>
                    <a href="#">
                        <?php echo $ab[$count];
            ?>
                    </a>
                    <?php
            $count++;
            }
            ?>
                </div>
            </div>
            <div class="dropdown_reponsive_page">
                <h1 onclick="gopage()"><i class="bx bx-left-arrow-alt" style="color: #f8f9fa;"></i>pages</h1>
                <div class="dropdown-item-responsive-page">
                    <?php
            $ab=['thumbnail left','thumbnail right','thumbnail top','thumbnail bottom','product variants','variants dropdown','gallery stacked'];
            $count=0;
            while($count<7){
            ?>
                    <a href="#">
                        <?php echo $ab[$count];
            ?>
                    </a>
                    <?php
            $count++;
            }
            ?>
                </div>
            </div>
            <div class="dropdown_reponsive_blog">
                <h1 onclick="goblog()"><i class="bx bx-left-arrow-alt" style="color: #f8f9fa;"></i>blogs</h1>
                <div class="dropdown-item-responsive-blog">
                    <?php
            $ab=['thumbnail left','thumbnail right','thumbnail top','thumbnail bottom','product variants','variants dropdown','gallery stacked'];
            $count=0;
            while($count<7){
            ?>
                    <a href="#">
                        <?php echo $ab[$count];
            ?>
                    </a>
                    <?php
            $count++;
            }
            ?>
                </div>
            </div>
        </div>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../img_ecommerce/img_ecommerce10.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../img_ecommerce/img_ecommerce10.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../img_ecommerce/img_ecommerce10.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class=" btn carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="btn carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <section>
        <div class="scale_card">
            <?php
        if(isset($_GET['id'])){
            $idjump = $_GET['id'];
            $rowsjump = mysqli_query($con, "SELECT * FROM wood WHERE id = $idjump");
            $row_jump = mysqli_fetch_assoc($rowsjump);
            echo "<h1>";
            print_r($row_jump);
            if($row_jump){
                $_SESSION['id'] = $row_jump['image_name'];
            }
        }
        
        $rows = mysqli_query($con, "SELECT * FROM wood WHERE id IN (4, 5, 6)");
        while($row_woods=mysqli_fetch_assoc($rows)){
        ?>
            <a href="addtocart.php?id=<?php echo $row_woods['image_name']?>" class="scale_card_menu">
                <img src="./upload/<?php echo $row_woods['image']?>" alt="">
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
                <img src="./upload/<?php echo $row['dining_image'];?>" alt="">
                <h3>
                    <?php echo $row['dining_name'];}?>
                </h3>
            </div>
            <div class="adjest">
                <div class="clock_decor">
                    <div class="decor">
                        <?php
            $img=mysqli_query($con,"select * from decor_art where id in (4)");
            while ($row=mysqli_fetch_assoc($img)){
            ?>
                        <img src="./upload/<?php echo $row['decor_img'];?>" alt="">
                        <h3>
                            <?php echo $row['decor_name'];}?>
                        </h3>
                    </div>
                    <div class="wall_clock">
                        <?php
            $img=mysqli_query($con,"select * from dining_room where id in (7)");
            while ($row=mysqli_fetch_assoc($img)){
            ?>
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
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="explore-new">
            <nav class="nav-furniture">
                <h1>explore new furniture</h1>
                <ul>
                        <li>
                            <a href="#">sofas</a>
                            <div class="line" id="line-im"></div>
                        </li>
                        <li>
                            <a href="#">chair</a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">table</a>
                            <div class="line"></div>
                        </li>
                        <li>
                            <a href="#">lamps & lighting</a>
                            <div class="line-big"></div>
                        </li>
                        <li>
                            <a href="#">kitchen accessories</a>
                            <div class="line-big"></div>
                        </li>
                    </ul>
            </nav>

                <div class="container mt-5">
                    <div class="row">
                        <!-- First row of cards -->
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card">
                                <div class="change-img card-img-top">
                                    <img src="../img_ecommerce/img_ecommerce20.jpg" class="img-setoff" alt="Card image">
                                    <img src="../img_ecommerce/img_ecommerce19.jpg" class="img-set" alt="Card image">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Arctander Chair</h5>
                                    <p class="card-text">LIGHTING</p>
                                    <p class="card-price">$49.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card">
                                <div class="change-img card-img-top">
                                <img src="../img_ecommerce/img_ecommerce21.jpg" class="img-setoff" alt="Card image">
                                <img src="../img_ecommerce/img_ecommerce22.jpg" class="img-set" alt="Card image">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">beoplay a1</h5>
                                    <p class="card-text">LIGHTING</p>
                                    <p class="card-price">$39.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card">
                                <div class="change-img card-img-top">
                                    <img src="../img_ecommerce/img_ecommerce23.jpg" alt="Card image">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">hanging egg chair</h5>
                                    <p class="card-text">LIGHTING</p>
                                    <p class="card-price">$99.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card">
                                <div class="change-img card-img-top">
                                    <img src="../img_ecommerce/img_ecommerce25.jpg" class="img-setoff" alt="Card image">
                                    <img src="../img_ecommerce/img_ecommerce24.jpg" class="img-set" alt="Card image">
                                </div>
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
                                <div class="change-img card-img-top">
                                    <img src="../img_ecommerce/img_ecommerce27.jpg" class="img-setoff" alt="Card image">
                                    <img src="../img_ecommerce/img_ecommerce26.jpg" class="img-set" alt="Card image">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">iconic rocking horse</h5>
                                    <p class="card-text">CHAIRS</p>
                                    <p class="card-price">$169.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card">
                                <div class="change-img card-img-top">
                                    <img src="../img_ecommerce/img_ecommerce29.jpg" class="img-setoff" alt="Card image">
                                    <img src="../img_ecommerce/img_ecommerce28.jpg" class="img-set" alt="Card image">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">langue stack chair</h5>
                                    <p class="card-text">CHAIRS</p>
                                    <p class="card-price">$299.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card">
                                <div class="change-img card-img-top">
                                    <img src="../img_ecommerce/img_ecommerce31.jpg" class="img-setoff" alt="Card image">
                                    <img src="../img_ecommerce/img_ecommerce30.jpg" class="img-set" alt="Card image">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">laundry baskets</h5>
                                    <p class="card-text">CHAIRS</p>
                                    <p class="card-price">$45.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card">
                                <div class="change-img card-img-top">
                                    <img src="../img_ecommerce/img_ecommerce33.jpg" class="img-setoff" alt="Card image">
                                    <img src="../img_ecommerce/img_ecommerce32.jpg" class="img-set" alt="Card image">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">mini table lamp</h5>
                                    <p class="card-text">CHAIRS</p>
                                    <p class="card-price">$49.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="new-furniture">
            </div> -->
        </div>
    </section>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="dropdown.js"></script>

</body>

</html>

<?php
}else{
    header("location:loging.php");
}
?>