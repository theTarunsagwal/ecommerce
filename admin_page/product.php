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
            $query5= mysqli_query($con,"SELECT * FROM wood WHERE image_name like'$id'");
            $query2= mysqli_query($con,"SELECT * FROM dining_room WHERE dining_name like '$id'");
            $query3= mysqli_query($con,"SELECT * FROM decor_art WHERE decor_name like '$id'");
            $query4= mysqli_query($con,"SELECT * FROM new_product WHERE name like'$id'");
            if($query4 || $query2 || $query3 ||$query5 ) {
                while($row = mysqli_fetch_assoc($query4)){
                    ?>

            <div class="main-container">
                <img src="./upload/img_ecommerce37.jpg">
            </div>
            <div class="container-detail">
                <h1>
                    <?php echo "new product"; ?>
                </h1>
                <a href="index.php">home <span> >
                        <?php echo "product"; ?>
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
                while($row4 = mysqli_fetch_assoc($query5)){
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

                    <div class="line mb-4"></div>

                    <div class="w-full max-w-xs p-4 bg-white shadow-md rounded-lg">
                        <div class="flex justify-between items-center">
                            <label for="minMaxRange" class="block text-gray-700 text-sm font-bold mb-2">Select
                                Range:</label>
                            <div>
                                <span id="minValue" class="text-lg text-gray-700">$100</span> -
                                <span id="maxValue" class="text-lg text-gray-700">$1000</span>
                            </div>
                        </div>
                        <?php
                        if(isset($_POST['value'])){
                            
                        }
                        ?>
                       <form method="post">
                       <input id="minMaxRange" type="range" name="min" min="100" max="1000" value="100" step="10" class="slider"
                            oninput="updateRange(this.value, 'min')">
                        <input id="minMaxRange2" type="range" name="max" min="100" max="1000" value="1000" step="10" class="slider"
                            oninput="updateRange(this.value, 'max')">
                            <input type="submit" name="value" value="Search">
                       </form>
                    </div>

                    <div class="line mb-4"></div>

                    <div class="select">
    <div class="selected" data-default="A-Z">
        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" class="arrow">
            <path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"></path>
        </svg>
    </div>
    <div class="options">
        <div title="all">
            <input id="all" name="option" type="radio" checked />
            <label class="option" for="all" data-txt="A-Z"></label>
        </div>
        <div title="option-1">
            <input id="option-1" name="option" type="radio" />
            <label class="option" for="option-1" data-txt="Z-A"></label>
        </div>
        <div title="option-2">
            <input id="option-2" name="option" type="radio" />
            <label class="option" for="option-2" data-txt="price, low to high"></label>
        </div>
        <div title="option-3">
            <input id="option-3" name="option" type="radio" />
            <label class="option" for="option-3" data-txt="price, high to low"></label>
        </div>
    </div>
</div>


                    <div class="line"></div>

                    <div class="new-product mt-5">
                        <h1 class="fs-5 fw-bold">new product</h1>
                        <?php
                        if(isset($_GET['name'])){
                            $name_inst=$_GET['name'];
                            $name_query=mysqli_query($con,"SELECT * from new_prodcut WHERE name like '$name_inst'");
                            if($name_query){
                                $_SESSION['id']=$name_query['name'];
                            }
                        }
                            $new_item=mysqli_query($con,"select * from new_product where id in (7,8,1,2,9)");
                            while($row_inst = mysqli_fetch_assoc($new_item)){
                                ?>
                        <a href="addtocart.php?id=<?php echo $row_inst['name'] ?>">

                            <div class="product-inst p-3">
                                <div class="img-product">
                                    <img src="./upload/<?php echo $row_inst['img'];?>" alt="loading...">
                                </div>
                                <div class="product-about">
                                    <h1 class="fs-6 fw-bold text-black">
                                        <?php echo $row_inst['name'] ?>
                                    </h1>
                                    <h2 class="fs-6 fw-bold text-danger">$
                                        <?php echo $row_inst['price'] ?>.00
                                    </h2>
                                </div>
                            </div>
                        </a>
                        <?php } ?>
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

        const minRange = document.getElementById('minMaxRange');
        const maxRange = document.getElementById('minMaxRange2');
        const minValue = document.getElementById('minValue');
        const maxValue = document.getElementById('maxValue');

        function updateRange(value, type) {
            let minVal = parseInt(minRange.value);
            let maxVal = parseInt(maxRange.value);

            if (type === 'min') {
                minVal = parseInt(value);
                if (minVal >= maxVal) {
                    minRange.value = maxVal - 10;
                    minVal = maxVal - 10;
                }
            } else {
                maxVal = parseInt(value);
                if (maxVal <= minVal) {
                    maxRange.value = minVal + 10;
                    maxVal = minVal + 10;
                }
            }

            minValue.textContent = '$' + minVal;
            maxValue.textContent = '$' + maxVal;
        }

        minValue.textContent = '$' + minRange.value;
        maxValue.textContent = '$' + maxRange.value;
    </script>
</body>

</html>
<?php }else{
    header('location:loging.php');
}?>