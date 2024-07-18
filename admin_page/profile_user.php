<?php
// ob_start();
// $con= mysqli_connect("localhost","root","","ecommerce");
// if(isset($_SESSION['name'])) {
//     $user = $_SESSION['name'];
//     $table_name = 'user_name_' . $user;
//     $qury_user = mysqli_query($con, "SELECT * FROM user_data where name = '$user'");
    
    ?>
    <link rel="stylesheet" href="./css_admin_page/profile.css">
<section class="pro">
    <?php
    // if($qury_user){
    //     while($row = mysqli_fetch_array($qury_user)){
 
    ?>
<div class="profile-data">
    <div class="profile_user">
        <img src="./upload/img_ecommerce17.jpg" alt="loading...">
    </div>
</div>
<div class="profile_data">
    <div class="profile_img">
            <img src="./upload/img_ecommerce17.jpg" alt="loading...">
        </div>
        <div class="profile_info">
            <h1></h1>
            <p></p>
        </div>
    
</div>
<?php
    //     }
    // }
    // else{
    //     echo "no user ";
    // }
?>
</section>
<?php
//  }else{
//     echo "error";
//  }
//  ob_end_flush();
?>