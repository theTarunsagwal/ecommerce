<?php
session_start();
if(isset($_SESSION['name'])) {

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
    <?php
    include "header.php"; 
    ?>

    <section>
        <div class="item-container">
            <?php
     if(isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $con = mysqli_connect("localhost", "root", "", "ecommerce");
        if(!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }
        ?>
            <div class="item-img">
                <?php
        
        $query = "SELECT * FROM decor_art WHERE id = $id";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
?>
                <div class="item-img-box">
                    <img src="./upload/<?php echo $row['decor_img']?>" alt="" srcset="">
                </div>
            </div>
            <div class="item-info">
                <h1>
                    <?php echo $row['decor_name'];?>
                </h1>
                <p>Most of us are familiar with the iconic design of the egg shaped chair floating in the air. The
                    Hanging Egg Chair is a critically acclaimed design that has enjoyed praise worldwide ever since the
                    distinctive</p>
                <div class="item-color">
                    <h5>color :</h5>
                    <div class="color-box">
                        <div class="black">
                            <img src="./upload/<?php echo $row['decor_img']?>" alt="">
                        </div>
                    </div>
                </div>
                <h3>
                    $
                    <?php echo $row['decor_price']?>.00
                </h3>
                <div class="add-to-cart">
                    <div class="count-btn">
                        <button class="minus" onclick="subtract()">-</button>
                        <input type="text" id="numberInput" class="form-control text-center" value="0" readonly>
                        <button class="plus" onclick="add()">+</button>
                    </div>
                    <button class="buy-btn">add to cart</button>
                    <button class="buy-btn">buy it now</button>
                </div>
                <div class="availability-stock">
                    <a class="text-black" href="">availability: <span class="text-success fw-bolder">in stock</span></a>
                    <a class="text-black" href="">sku: <span>n/a</span></a>
                    <a class="text-black" href="">vendor: <span>lighting</span></a>
                    <a class="text-black" href="">categories:<span>bar furniture</span> </a>
                    <a class="text-black icon-btn" href="">share : <i class='bx bxl-instagram'></i> <i
                            class='bx bxl-twitter'></i> <i class='bx bxl-github'></i></a>
                </div>
            </div>
        </div>
        <?php
                  } else {
                    echo "No product found with ID: $id";
                }
                
                mysqli_close($con);
            } else {
                echo "Product ID is not specified or invalid.";
            }
                ?>
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
                <p>Most of us are familiar with the iconic design of the egg shaped chair floating in the air. The Hanging Egg Chair is a critically acclaimed design that has enjoyed praise worldwide ever since the distinctive sculptural shape was created.</p>
                <p>[SHORTDESCRIPTION]</p>
                <p>Most of us are familiar with the iconic design of the egg shaped chair floating in the air. The Hanging Egg Chair is a critically acclaimed design that has enjoyed praise worldwide ever since the distinctive sculptural shape was created.</p>
                <p>the design of the Hanging Egg Chair has long since been dubbed timeless whereas the material rattan had its golden age in the 1960s when skilled wicker makers and architects crafted beautifully sculptured furniture out of the challenging material. However, at the moment rattan is becoming more and more popular concurrent with consumer demands for sustainable products.</p>
                <div>
                    <h6 class="fw-bold">Dimensions:</h6>
                    <p>Chair: W:85 x D:75 x H:125cm Stand: W:104 x D:109 x H:207cm (seat height:45cm)</p>
                </div>
                <div>
                    <h6 class="fw-bold">Materials:</h6>
                    <p>Indoor chair: natural fiber (rattan) Outdoor chair: synthetic fiber Stand: powder coated iron (only for indoor use)</p>
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
            if(currentValue == 10){
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
    header("location: index.php");
}
?>