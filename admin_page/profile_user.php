<link rel="stylesheet" href="./css_admin_page/profile.css">
<?php
ob_start();
$con= mysqli_connect("localhost","root","","ecommerce");
if(isset($_SESSION['name'])) {
    $user = $_SESSION['name'];
    $table_name = 'user_name_' . $user;
    $qury_user = mysqli_query($con, "SELECT * FROM user_data where name = '$user'");
    
    ?>
<section class="pro">
    <?php
    if($qury_user){
        while($row = mysqli_fetch_array($qury_user)){
 
    ?>
<div class="profile-data">
    <div class="profile_user">
        <img src="./upload/<?php echo $row['image']; ?>" alt="loading...">
        <div class="profile_name">
            <h1 class="fs-5 mt-3 text-black"><?php echo $row['name'];?></h1>
        </div>
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
    <a id="logout" href="logout.php">
            <button class="Btn">
                <div class="sign"><svg viewBox="0 0 512 512">
                        <path
                            d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z">
                        </path>
                    </svg></div>
                <div class="text">Logout</div>
            </button>
        </a>
    
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
        $('.profile_data').slideUp(10)
        $('.profile-data').click(function(){
            $('.profile_data').slideToggle(500)
        })
    })
</script>
<?php
 }else{
    ?>
       <a href="loging.php">
       <i class='bx bx-user' id="login"></i>
       </a>
    <?php
 }
 ob_end_flush();
?>