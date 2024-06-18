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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css_admin_page/index.css">
</head>

<body>
    <header>
        <div class="logo" onclick="change()">
        <i id="x" class="bx bx-menu"></i>
            <img src="./logo_black.png" alt="">
        </div>
        <div class="menubar menubar_active">
            <div class="menu_bar">
                <ul class="menu_ul">
                    <li onclick="drophomes()">home<i class='bx bx-right-arrow-alt'></i></li>
                    <!-- <div class="dropdown">
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
                    </div> -->
                    <li>shops<i class='bx bx-right-arrow-alt'></i></li>
                    <li>collections</li>
                    <li>pages<i class='bx bx-right-arrow-alt'></i></li>
                    <li>blogs<i class='bx bx-right-arrow-alt'></i></li>
                    <li>contact us</li>
                </ul>
            </div>
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
            <i class="bx bx-search" onclick="search()"></i>
            <div class="search_box">
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


    <!-- component -->
    <!-- This is an example component -->
    <div class=" main_box">

        <div id="default-carousel" class="relative" data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <span
                        class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl dark:text-gray-800">First
                        Slide</span>
                    <img src="../img_ecommerce/img_ecommerce10.jpg"
                        class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="../img_ecommerce/img_ecommerce10.jpg"
                        class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="../img_ecommerce/img_ecommerce10.jpg"
                        class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                    <span class="hidden">Previous</span>
                </span>
            </button>
            <button type="button"
                class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="hidden">Next</span>
                </span>
            </button>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="dropdown.js"></script>

</body>

</html>

<?php
}else{
    header("location:loging.php");
}
?>