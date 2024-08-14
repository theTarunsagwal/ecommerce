<?php
// session_start();
// if(isset($_SESSION['name'])){
$con_userside = mysqli_connect('localhost', 'root', '', 'user_side');
    $con = mysqli_connect("localhost","root","","ecommerce");
    $data_wood = mysqli_query($con, 'SELECT * FROM wood');
    // $qurry=mysqli_query($con,"select * from new_product");
$data_product = mysqli_query($con, 'SELECT * FROM new_product');
$data_art = mysqli_query($con, 'SELECT * FROM decor_art');
$data_room = mysqli_query($con, 'SELECT * FROM dining_room');


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
</head>

<body>
<?php include "loading.php"?>
    <header>
        <div class="logo" onclick="change()">
            <i id="x" class="bx bx-menu" onclick="chg()"></i>
            <a href="index.php">
            <img src="./img/logo_black.png" alt="">
            </a>
        </div>
        <nav>
            <ul class="nav_ul" style="gap: 1rem;">
                <li class="home d-flex align-items-center g-2"><i class='bx bx-home-alt'></i><a href="./index.php"><span>home</span></a></li>
                <li class="collect"><i class='bx bxs-collection'></i><span>collections</span></li>
                <!-- collections dropdown -->
                <div class="dropdown_coll_active">
                    <div class="dropdown_content_box">
                        <?php
                             $row_wood_drop = mysqli_query($con, "SELECT * FROM wood WHERE id IN (3)");
                            while($row_wood= mysqli_fetch_array($row_wood_drop)){
                            ?>
                        <a href="product.php?id=<?php echo $row_wood['image_name'] ?>">
                        <div class="dropdown_box_item">
                            <div class="dropdown_box_img"  >
                                <img src="./upload/<?php echo $row_wood['image']?>" alt="">
                            </div>
                            <h1>
                                <?php echo $row_wood['image_name']?>
                            </h1>
                        </div>
                            </a>
                        
                        <?php } ?>
                        <?php
                        if(isset($_GET["decor_name"])){
                            $new=$_GET["decor_name"];
                            $new_art=mysqli_query($con,"select * from decor_art where decor_name like '$new'");
                            if($new_art){
                                $_SESSION['id']=$new_art['decor_name'];
                            }
                        }
                            $row_arts = mysqli_query($con, "SELECT * FROM decor_art WHERE id IN (3)");
                            while($row_art= mysqli_fetch_array($row_arts)){
                        ?>
                        <a href="product.php?id=<?php echo $row_art['decor_name'] ?>">
                            <div class="dropdown_box_item">
                                <div class="dropdown_box_img">
                                    <img src="./upload/<?php echo $row_art['decor_img']?>" alt="">
                                </div>
                                <h1>
                                    <?php echo $row_art['decor_name']?>
                                </h1>
                            </div>
                        </a>
                        <?php }?>
                        <?php
                         if(isset($_GET["dining_name"])){
                            $new=$_GET["dining_name"];
                            $new_art=mysqli_query($con,"select * from dining_room where dining_name like '$new'");
                            if($new_art){
                                $_SESSION['id']=$new_art['dining_name'];
                            }
                        }
                             $row_room_drop = mysqli_query($con, "SELECT * FROM dining_room WHERE id IN (3,4,5)");
                            while($row_room= mysqli_fetch_array($row_room_drop)){
                        ?>
                        <a href="product.php?id=<?php echo $row_room['dining_name'] ?>">

                            <div class="dropdown_box_item">
                                <div class="dropdown_box_img">
                                    <img src="./upload/<?php echo $row_room['dining_image'];?>" alt="">
                                </div>
                                <h1>
                                    <?php echo $row_room['dining_name'];?>
                                </h1>
                            </div>
                        </a>
                        <?php }?>
                    </div>
                </div>
                <li class="pages"><i class='bx bxs-file-blank'></i><span>pages</span></li>
                <!-- pages dropdown -->
                <div class="dropdown_page_active">
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
               
                <li><i class='bx bxs-contact'></i><a href="contact_us.php">contact us</a></li>
            </ul>
        </nav>
        <div class="search_shop">
            <i class="bx bx-search" id="srch" onclick="search()"></i>
          <?php
            if (isset($_POST["sub"])) {
               $search = $_POST['search'];
            }
?>
            <form action="search.php" method="POST">
                <div class="search_container search_box">
                    <input type="text" name="search" placeholder="Enter keywords to search...">
                    <button name="sub">
                        <i class="bx bx-search" id="icon"></i>
                    </button>
                </div>
            </form>
            <a href="additem.php">
            <i class='bx bxs-shopping-bags'></i>
        </a>
            <div class="shoping_bag">
                <a href="additem.php">shoping cart</a>
                <a href="additem.php">$0.00</a>
            </div>
        </div>
    </header>
    <div class="menubar">
        <div class="menu_bar">
            <ul class="menu_ul">
                <li>home<i class='bx bx-right-arrow-alt'></i></li>
                <li>collections</li>
                <li onclick="droppages()">pages<i class='bx bx-right-arrow-alt'></i></li>
                <li>contact us</li>
            </ul>
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
            
        </div>
    </div>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="dropdown.js"></script>
</body>

</html>