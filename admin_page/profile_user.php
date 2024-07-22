<?php
ob_start();
$con= mysqli_connect("localhost","root","","ecommerce");
if(isset($_SESSION['name'])) {
    $user = $_SESSION['name'];
    $table_name = 'user_name_' . $user;
    $qury_user = mysqli_query($con, "SELECT * FROM user_data where name = '$user'");
    
    ?>
    <link rel="stylesheet" href="./css_admin_page/profile.css">
<section class="pro">
    <?php
    if($qury_user){
        while($row = mysqli_fetch_array($qury_user)){
 
    ?>
<div class="profile-data">
    <div class="profile_user">
        <img src="./upload/<?php echo $row['image']; ?>" alt="loading...">
    </div>
</div>
<div class="profile_data">
    <div class="profile_header">
        <div class="profile_img">
            <img src="./upload/<?php echo $row['image']; ?>" alt="loading...">
        </div>
        <div class="profile_info">
            <h1 class="fs-5 mt-3"><?php echo $row['name'];?></h1>
            <p class="fs-7"><?php echo $row['email'];?></p>
        </div>
    </div>

    <div class="content_profile d-flex flex-column mt-3 ">
        <h1 class="fs-4 p-1 text-black">shop by department</h1>
        <h3 class="d-flex shop_listing fs-5 fw-light justify-content-between align-items-center p-2"><span class="product_item">electronics</span><span class="fw-bolder fs-2" ><i class='bx bx-chevron-right'></i></span></h3>
        <h3 class="d-flex shop_listing fs-5 fw-light justify-content-between align-items-center p-2"><span class="product_item">computers</span><span class="fw-bolder fs-2" ><i class='bx bx-chevron-right'></i></span></h3>
        <h3 class="d-flex shop_listing fs-5 fw-light justify-content-between align-items-center p-2"><span class="product_item">smart home</span><span class="fw-bolder fs-2" ><i class='bx bx-chevron-right'></i></span></h3>
        <h3 class="d-flex shop_listing fs-5 fw-light justify-content-between align-items-center p-2"><span class="product_item">arts & crafts</span><span class="fw-bolder fs-2" ><i class='bx bx-chevron-right'></i></span></h3>
        <h3 class="d-flex shop_listing fs-5 fw-light gap-1 align-items-center p-2"><span class="product_item">see all</span><span class="fw-bolder fs-2 " ><i class='bx bx-chevron-down'></i></span></h3>
    </div>
        <div class="line"></div>
    <div class="content_profile d-flex flex-column mt-3 ">
        <h1 class="fs-4 p-1 text-black">programs & features</h1>
        <h3 class="d-flex shop_listing fs-5 fw-light justify-content-between align-items-center p-2"><span class="product_item">gift cards</span><span class="fw-bolder fs-2" ><i class='bx bx-chevron-right'></i></span></h3>
        <h3 class="d-flex shop_listing fs-5 fw-light justify-content-between align-items-center p-2"><span class="product_item">shop by interest</span><span class="fw-bolder fs-2" ><i class='bx bx-chevron-right'></i></span></h3>
        <h3 class="d-flex shop_listing fs-5 fw-light justify-content-between align-items-center p-2"><span class="product_item">shoplift live</span><span class="fw-bolder fs-2" ><i class='bx bx-chevron-right'></i></span></h3>
        <h3 class="d-flex shop_listing fs-5 fw-light justify-content-between align-items-center p-2"><span class="product_item">international shopping</span><span class="fw-bolder fs-2" ><i class='bx bx-chevron-right'></i></span></h3>
        <h3 class="d-flex shop_listing fs-5 fw-light gap-1 align-items-center p-2"><span class="product_item">see all</span><span class="fw-bolder fs-2 " ><i class='bx bx-chevron-down'></i></span></h3>
    </div>
    
</div>
<?php
        }
    }
    else{
        echo "no user ";
    }
?>
</section>
<script>
    $(document).ready(function(){
        $('.profile_data').slideUp()
        $('.profile-data').click(function(){
            $('.profile_data').slideToggle(1000)
        })
    })
</script>
<?php
 }
 ob_end_flush();
?>