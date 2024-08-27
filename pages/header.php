<?php
// session_start();
// if(isset($_SESSION['name'])){
    $con_userside = mysqli_connect('localhost', 'root', '', 'user_side');
    $con_pro = mysqli_connect("localhost","root","","product_data");
    $con = mysqli_connect("localhost","root","","ecommerce");
	$con_wish = mysqli_connect("localhost","root","","wishlist_user");

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
<?php
 include "loading.php"
?>
    <header id="header" >
        <div class="logo" onclick="change()">
            <i id="x" class="bx bx-menu" onclick="chg()"></i>
            <a href="index.php">
            <img src="./img/logo_black.png" alt="">
            </a>
        </div>
        <nav>
            <ul class="nav_ul" style="gap: 1rem;">
                <li class="home d-flex align-items-center g-2"><i class='bx bx-home-alt'></i><a href="index.php"><span>home</span></a></li>
                <li class="collect"><i class='bx bxs-collection'></i><span>collections</span></li>
                <!-- collections dropdown -->
                <div class="dropdown_coll_active">
                    <div class="dropdown_content_box">
                        <?php
                             $row_wood_drop = mysqli_query($con_pro, "SELECT * FROM product WHERE product.id between  19 AND 22;");
                            while($row_wood= mysqli_fetch_array($row_wood_drop)){
                            ?>
                        <a href="product.php?id=<?php echo $row_wood['name'] ?>">
                        <div class="dropdown_box_item">
                            <div class="dropdown_box_img"  >
                                <img src="./upload/<?php echo $row_wood['img']?>" alt="">
                            </div>
                            <h1>
                                <?php echo $row_wood['name']?>
                            </h1>
                        </div>
                            </a>
                        
                        <?php } ?>

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
                <i class='bx bxs-heart' id="fav"></i>
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
            <a href="index.php"><li>home</li></a>
                <!-- <li>collections<i class='bx bx-right-arrow-alt'></i></li> -->
                <?php
                             $row_wood_drop = mysqli_query($con_pro, "SELECT * FROM product WHERE product.id between  19 AND 22;");
                            while($row_wood= mysqli_fetch_array($row_wood_drop)){
                            ?>
                    <a style="color:#666b7f;padding: .6rem 0rem;" href="product.php?id=<?php echo $row_wood['name'] ?>"><?php echo $row_wood['name']; ?></a>
                        <?php
                            }
                        ?>
                <li>contact us</li>
            </ul>
               
        
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('#fav').click(function(){
            $("#wishlist").toggleClass('wishlist-open wishlist-closed');
        });
    });
 
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="dropdown.js"></script>
</body>
</html>