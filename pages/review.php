<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css_admin_page/review.css">
</head>
<body>
<section class="m-3">

<?php
session_start();
$pro_duct=$_SESSION['product_name'];
$con_pro = mysqli_connect("localhost", "root", "", "product_data");
$con = mysqli_connect("localhost", "root", "", "ecommerce");

$ratings = [];
$qry_ratings = mysqli_query($con_pro, "SELECT * FROM ratings where pr_name = '$pro_duct'");
while ($row = mysqli_fetch_array($qry_ratings)) {
    $ratings[] = $row;
}

foreach ($ratings as $rating) {
    $email = $rating['user_email'];

    // Query the user data based on the email from the rating
    $qry_user = mysqli_query($con, "SELECT * FROM user_data WHERE email='$email'");
    $user = mysqli_fetch_array($qry_user);

    $output = "";
?>
        <div class="reviews-box m-1 text-white">
            <div class="review">
                <div class="user-info d-flex m-2 gap-3">
                    <div class="user-img">
                        <?php
                            if ($user) {
                                if (isset($user['image'])) {
                        ?>
                        <img src="upload/<?php echo $user['image'] ?>" alt="loading......">
                        <?php
                                }
                            }
                        ?>
                    </div>
                    <div class="review-name-how">
                        <?php
                         if (isset($rating['user_email'])) {
                        ?>
                         <h6 class="user-name fs-6 m-0">
                            <?php echo $rating['user_email']?>
                        </h6>
                        <?php
                        }
                  
                        if (isset($rating['rating'])) {
                        $star = $rating['rating'];
                        if($star == 5){
                            ?>
                            <div class="d-flex gap-1">
                            <i class='bx bxs-star' style="color:#FFD700;"></i><i class='bx bxs-star' style="color:#FFD700;"></i><i class='bx bxs-star' style="color:#FFD700;"></i><i class='bx bxs-star' style="color:#FFD700;"></i><i class='bx bxs-star' style="color:#FFD700;"></i>
                            </div>
                            <?php
                        }else if($star >= 4.5 && $star <5){
                            ?>
                            <div class="d-flex gap-1">
                            <i class='bx bxs-star' style="color:#FFD700;"></i>
                            <i class='bx bxs-star' style="color:#FFD700;"></i>
                            <i class='bx bxs-star' style="color:#FFD700;"></i>
                            <i class='bx bxs-star' style="color:#FFD700;"></i>
                            <i class='bx bxs-star-half' style="color:#FFD700;"></i>
                            </div>
                            <?php
                        }else if($star >= 4 && $star <4.5){
                            ?>
                            <div class="d-flex gap-1">
                            <i class='bx bxs-star' style="color:#FFD700;"></i>
                            <i class='bx bxs-star' style="color:#FFD700;"></i>
                            <i class='bx bxs-star' style="color:#FFD700;"></i>
                            <i class='bx bxs-star' style="color:#FFD700;"></i>
                            <i class='bx bx-star' style="color:#000;"></i>
                            </div>
                            <?php
                        }else if($star >= 3.5 && $star <4){
                            ?>
                            <div class="d-flex gap-1">
                            <i class='bx bxs-star' style="color:#FFD700;"></i>
                            <i class='bx bxs-star' style="color:#FFD700;"></i>
                            <i class='bx bxs-star' style="color:#FFD700;"></i>
                            <i class='bx bxs-star-half' style="color:#FFD700;"></i>
                            <i class='bx bx-star' style="color:#000;"></i>
                            </div>
                            <?php
                        }else if($star >= 3 && $star <3.5){
                            ?>
                            <div class="d-flex gap-1">
                            <i class='bx bxs-star' style="color:#FFD700;"></i>
                            <i class='bx bxs-star' style="color:#FFD700;"></i>
                            <i class='bx bxs-star' style="color:#FFD700;"></i>
                            <i class='bx bx-star' style="color:#000;"></i>
                            <i class='bx bx-star' style="color:#000;"></i>
                            </div>
                            <?php
                        }else if($star >=2.5 && $star <3){
                            ?>
                            <div class="d-flex gap-1">
                            <i class='bx bxs-star' style="color:#FFD700;"></i>
                            <i class='bx bxs-star' style="color:#FFD700;"></i>
                            <i class='bx bxs-star-half' style="color:#FFD700;"></i>
                            <i class='bx bx-star' style="color:#000;"></i>
                            <i class='bx bx-star' style="color:#000;"></i>
                            </div>
                            <?php
                        }else if($star >= 2 && $star <2.5){
                            ?>
                            <div class="d-flex gap-1">
                            <i class='bx bxs-star' style="color:#FFD700;"></i>
                            <i class='bx bxs-star' style="color:#FFD700;"></i>
                            <i class='bx bx-star' style="color:#000;"></i>
                            <i class='bx bx-star' style="color:#000;"></i>
                            <i class='bx bx-star' style="color:#000;"></i>
                            </div>
                            <?php
                        }
                         }
                        ?>
                    </div>
                </div>
                <div class="review-text">
                <?php
                    if (isset($rating['comment_box'])) {
                       echo $rating['comment_box'];
                    }?>
                    </div>
            </div>
        </div>
<?php
}

?>
    </section>
</body>
</html>