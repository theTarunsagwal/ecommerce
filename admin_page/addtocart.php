<?php
session_start();
ob_start();
$con_userside = mysqli_connect('localhost', 'root', '', 'user_side');
if(isset($_SESSION['name'])) {
    $user = $_SESSION['name'];
    include "header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../admin_page/css_admin_page/addtocart.css">
</head>

<body>
<?php include "profile_user.php" ?>

<section>
        <div class="item-container">
            <?php
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = $_GET['id'];

                $queries = [
                    "SELECT * FROM decor_art WHERE decor_name LIKE '$id'",
                    "SELECT * FROM wood WHERE image_name LIKE '$id'",
                    "SELECT * FROM dining_room WHERE dining_name LIKE '$id'",
                    "SELECT * FROM new_product WHERE name LIKE '$id'"
                ];

                if(isset($_POST['btn'])){
                    $item_name = $_POST['item_name'];
                    $item_img = $_POST['item_img'];
                    $item_price = $_POST['item_price'];
                    $table_name = 'user_name_' . $user ;
                    $qury_user= mysqli_query($con_userside, "insert into $table_name (name,image,price) values ('$item_name','$item_img','$item_price') ");
                    if ($qury_user) {
                        header("Location: additem.php");
                        exit(); 
                    } else {
                        echo "Error: " . mysqli_error($con_userside);
                    }
                    ob_end_flush();
                }

                foreach ($queries as $query) {
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <form method="post">
                            <input type="hidden" name="item_name" value="<?php echo $row['decor_name'] ?? $row['image_name'] ?? $row['dining_name'] ?? $row['name']; ?>">
                            <input type="hidden" name="item_img" value="<?php echo $row['decor_img'] ?? $row['image'] ?? $row['dining_image'] ?? $row['img']; ?>">
                            <input type="hidden" name="item_price" value="<?php echo $row['decor_price'] ?? $row['price'] ?? $row['dining_price'] ?? $row['price']; ?>">
                            <div class="item-card">
                                <div class="item-img-box">
                                    <img src="./upload/<?php echo $row['decor_img'] ?? $row['image'] ?? $row['dining_image'] ?? $row['img']; ?>" alt="">
                                </div>
                                <div class="item-info">
                                    <h1><?php echo $row['decor_name'] ?? $row['image_name'] ?? $row['dining_name'] ?? $row['name']; ?></h1>
                                    <p>Most of us are familiar with the iconic design of the egg-shaped chair floating in the air. The Hanging Egg Chair is a critically acclaimed design that has enjoyed praise worldwide ever since the distinctive.</p>
                                    <div class="item-color">
                                        <h5>Color:</h5>
                                        <div class="color-box">
                                            <div class="black">
                                                <img src="./upload/<?php echo $row['decor_img'] ?? $row['image'] ?? $row['dining_image'] ?? $row['img']; ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <h3>$<?php echo $row['decor_price'] ?? $row['price'] ?? $row['dining_price'] ?? $row['price']; ?>.00</h3>
                                    <div class="add-to-cart">
                                        <div class="count-btn">
                                            <button type="button" class="minus" onclick="changeQuantity(this, -1)">-</button>
                                            <input type="text" name="quantity" class="form-control text-center" value="1" readonly>
                                            <button type="button" class="plus" onclick="changeQuantity(this, 1)">+</button>
                                        </div>
                                        <button class="buy-btn" name="btn">Add to Cart</button>
                                        <button class="buy-btn">Buy it Now</button>
                                    </div>
                                    <div class="availability-stock">
                                        <a class="text-black" href="">Availability: <span class="text-success fw-bolder">In Stock</span></a>
                                        <a class="text-black" href="">SKU: <span>N/A</span></a>
                                        <a class="text-black" href="">Vendor: <span><?php echo $row['decor_about'] ?? $row['about'] ?? $row['dining_about'] ?? ''; ?></span></a>
                                        <a class="text-black" href="">Categories: <span>Bar Furniture</span></a>
                                        <a class="text-black icon-btn" href="">Share: <i class='bx bxl-instagram'></i> <i class='bx bxl-twitter'></i> <i class='bx bxl-github'></i></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                    }
                }
            } else {
                echo "Product ID is not specified or invalid.";
            }
            ?>
        </div>
    </section>

    <section>
        <div class="description-container">
            <div class="container-main">
                <div class="container-line"></div>
                <h2>Description</h2>
                <h2>shipping & return</h2>
                <h2>reviews</h2>
                <div class="container-line"></div>
            </div>
            <div class="container-pargraf">
                <p>Most of us are familiar with the iconic design of the egg shaped chair floating in the air. The
                    Hanging Egg Chair is a critically acclaimed design that has enjoyed praise worldwide ever since the
                    distinctive sculptural shape was created.</p>
                <p>[SHORTDESCRIPTION]</p>
                <p>Most of us are familiar with the iconic design of the egg shaped chair floating in the air. The
                    Hanging Egg Chair is a critically acclaimed design that has enjoyed praise worldwide ever since the
                    distinctive sculptural shape was created.</p>
                <p>the design of the Hanging Egg Chair has long since been dubbed timeless whereas the material rattan
                    had its golden age in the 1960s when skilled wicker makers and architects crafted beautifully
                    sculptured furniture out of the challenging material. However, at the moment rattan is becoming more
                    and more popular concurrent with consumer demands for sustainable products.</p>
                <div>
                    <h6 class="fw-bold">Dimensions:</h6>
                    <p>Chair: W:85 x D:75 x H:125cm Stand: W:104 x D:109 x H:207cm (seat height:45cm)</p>
                </div>
                <div>
                    <h6 class="fw-bold">Materials:</h6>
                    <p>Indoor chair: natural fiber (rattan) Outdoor chair: synthetic fiber Stand: powder coated iron
                        (only for indoor use)</p>
                </div>
            </div>
        </div>
    </section>
    <script>
        function add() {
            let input = document.getElementById('numberInput');
            let currentValue = parseInt(input.value);
            currentValue++;
            input.value = currentValue;
            if (currentValue == 10) {
                alert("stock quantity is not greater than")
                input.value = 0;
            }
        }

        function subtract() {
            let input = document.getElementById('numberInput');
            let currentValue = parseInt(input.value);
            if (currentValue > 0) {
                currentValue--;
                input.value = currentValue;
            }
        }
    </script>
</body>

</html>

<?php
} else {
    echo "
				<script>
				alert('Please loging first')
	</script>
			";
            header("Location: loging.php");
    exit();
}
?>