<?php
    include 'connect.php';
    //  $_SESSION['id'];
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
            <img src="./img/shop.png" alt="">
            </a>
        </div>
        <nav>
            <ul class="nav_ul" style="gap: 1.5rem;">
                <li class="home d-flex align-items-center g-2"><a href="index.php"><span>home</span></a></li>
                <?php
                             $row_wood_drop = mysqli_query($con_pro, "SELECT * FROM product WHERE product.id between  19 AND 22;");
                             while($row_wood= mysqli_fetch_array($row_wood_drop)){
                                 ?>
                                 <li>
                                     <a style="color:#666b7f;padding: .6rem 0rem;" href="product.php?id=<?php echo $row_wood['name'] ?>"><span><?php echo $row_wood['name']; ?></span></a>
                                    </li>  
                        <?php
                            }
                        ?>             
                <li><a href="contact_us.php">contact us</a></li>
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
            <a href="additem.php" class="position-relative">
    <!-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"> -->
        <?php
    //     // Step 1: Generate dynamic table name
    //     $wish_face = "wish_name_" . $_SESSION['id'];

    //     // Step 2: Prepare the query to count rows in the dynamic table
    //     $qry_count = mysqli_query($con_wish, "
    //         SELECT COUNT(*) AS total_rows FROM `$wish_face`
    //     ");

    //     // Step 3: Fetch the result and display the count
    //     if ($qry_count) {
    //         $row = mysqli_fetch_assoc($qry_count);
    //         echo $row['total_rows'];
    //     } else {
    //         echo "0"; // Display zero if there is an error
    //     }
        ?>
     <!-- </span> -->
    <i class='bx bxs-shopping-bags fs-3 text-dark'></i>
</a>

            
            <?php
     include "profile_user.php"
     ?>
     </div>
    </header>
    <div class="menubar">
        <div class="menu_bar">
            <ul class="menu_ul">
            <a href="index.php"><li>home</li></a>
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