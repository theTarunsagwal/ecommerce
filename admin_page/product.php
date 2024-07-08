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
    <link rel="stylesheet" href="css_admin_page/product.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <?php include "header.php" ?>
    <section>
        <div class="main">
            <?php
           if(isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $con = mysqli_connect("localhost", "root", "", "ecommerce");
            $query= mysqli_query($con,"SELECT * FROM wood WHERE image_name like'$id'");
            $query2= mysqli_query($con,"SELECT * FROM dining_room WHERE dining_name like '$id'");
            $query3= mysqli_query($con,"SELECT * FROM decor_art WHERE decor_name like '$id'");
            if($query || $query2 || $query3) {
                while($row = mysqli_fetch_assoc($query)){
                    ?>

            <div class="main-container">
                <img src="./upload/img_ecommerce36.jpg">
            </div>
            <div class="container-detail">
                <h1>
                    <?php echo "bar furniture"; ?>
                </h1>
                <a href="index.php">home <span> >
                        <?php echo "bar furniture"; ?>
                    </span></a>
            </div>
            <?php
                }
                while($row2 = mysqli_fetch_assoc($query2)){
                    ?>

            <div class="main-container">
                <img src="./upload/img_ecommerce37.jpg">
            </div>
            <div class="container-detail">
                <h1>
                    <?php echo "dining room"; ?>
                </h1>
                <a href="index.php">home <span> >
                        <?php echo "dining room"; ?>
                    </span></a>
            </div>
            <?php
                        }
                while($row3 = mysqli_fetch_assoc($query3)){
                    ?>

            <div class="main-container">
                <img src="./upload/img_ecommerce35.jpg">
            </div>
            <div class="container-detail">
                <h1>
                    <?php echo "decor art"; ?>
                </h1>
                <a href="index.php">home <span> >
                        <?php echo "decor art"; ?>
                    </span></a>
            </div>
            <?php
                        }
        }else{
            echo "not found";
        }
        }else{
        echo "id is empty";
        }
        ?>
        </div>
    </section>

    <section>
        <div class="product-item">
            <div class="product">
                <div class="product-box">
                    <h5 class="text-black  fw-bolder">product categories</h5>
                    <form method="post">
                        <div class="checkbox-container pt-3">
                            <label><input type="checkbox" name="option" value="1" onclick="onlyOne(this)"> bar
                                furniture</label>
                            <label><input type="checkbox" name="option" value="2" onclick="onlyOne(this)"> decor
                                art</label>
                            <label><input type="checkbox" name="option" value="3" onclick="onlyOne(this)"> dining
                                room</label>
                            <label><input type="checkbox" name="option" value="4" onclick="onlyOne(this)"> new
                                product</label>
                        </div>
                    </form>

                    <div class="line"></div>
                    <div class="w-full mt-5 max-w-xs  rounded-lg">
                        <label for="rangeInput" class="block text-gray-700 text-sm font-bold mb-2">price</label>
                        <input id="rangeInput" type="range" min="0" max="100" value="50"
                            class="range-slider w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                        <div id="rangeValue" class="text-center mt-2 text-lg text-gray-700">50</div>
                    </div>

                    <div class="line"></div>

                    <div class="new-product mt-5">
                        <h1 class="fs-5 fw-bold">new product</h1>
                            
                    </div>
                </div>
            </div>
            <div class="item-section">
                <?php include "item.php" ?>
            </div>
        </div>
    </section>

    <script>
        function onlyOne(checkbox) {
            var checkboxes = document.getElementsByName('option');
            checkboxes.forEach((item) => {
                if (item !== checkbox) item.checked = false;
            });
        }

        const rangeInput = document.getElementById('rangeInput');
        const rangeValue = document.getElementById('rangeValue');

        rangeInput.addEventListener('input', function () {
            rangeValue.textContent = rangeInput.value;
        });
    </script>
</body>

</html>
<?php } ?>