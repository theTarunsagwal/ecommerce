<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css_admin_page/contact_us.css">
	<link rel="stylesheet" href="./css_admin_page/wishlist.css">

</head>
<body>
    <?php
     session_start();
     include "header.php" ?>
    <?php
     if(isset($_SESSION['name'])){
     ?>
      <!-- wishlist -->
	<div class="wishlist wishlist-closed" id="wishlist">
        <h2 class="text-black fw-bolder fs-6">My Favorites</h2>
        <?php 
        include 'connect.php';
	        // $con_wish = mysqli_connect("localhost","root","","wishlist_user");
	        $wish_face = "wish_name_".$_SESSION['id'];
			if(isset($_POST['remove'])){
				$remove = $_POST['remove'];
				$qry_remove = mysqli_query($con_wish,"DELETE FROM $wish_face WHERE id=$remove");
			}
           
            $qry_select = mysqli_query($con_wish,"SELECT * from $wish_face");
            ?>
        <ul class="d-flex  gap-2" style="flex-direction: column;">
            <?php
            while($row_add = mysqli_fetch_array($qry_select)){
	    		if(mysqli_num_rows($qry_select) == 0){
	    			echo "<div>
	    		<img class='img_fav' src='./img_ecommerce/fav.jpg'>
	    		<p>Please add items to the wishlist</p>
	    		</div>
	    		";
	    		}else{
            ?>
            <li class="mt-3">
                <div class="product-details d-flex gap-3 align-items-center">
                    <div class="img">
                        <img src="upload/<?php echo $row_add['product_img']; ?>"  alt="Product 1">
                    </div>
                   <div class="wish-product ">
                       <h3 style="font-size: 1rem; margin:0%;"><?php echo $row_add['name']; ?></h3>
                       <span class="fw-semibold" style="font-size:.6rem;">price:-</span>
                       <span class="text-success fw-light" style="font-size:1.1rem;">$<?php echo $row_add['price']; ?></span>
                       <form action="" method="POST">
                            <button name="remove" value="<?php echo $row_add['id']; ?>" class="remove-btn" style="border: none; background: transparent;">
                                <i class='bx bx-x-circle'></i>
                            </button>
                       </form>
                   </div>
                </div>
            </li>
            <?php
            }
        }
            ?>
        </ul>
    </div>
    <?php
     }
    ?>

    <div class="title_contect">
        <div class="main-container">
            <img src="./upload/img_ecommerce37.jpg">
        </div>
        <div class="container-detail">
            <h1>contact</h1>
            <a href="index.php">home <span> > contact us</span></a>
        </div>
    </div>

    <div class="contact-user d-flex">
        <div class="detaile-admin">
            <h5>OUR CONTACTS</h5>
            <h1>get in touch with us</h1>
            <p class="pt-3">Get in touch to discuss your employee wellbeing needs today. Please give us a call, drop us an email or fill out the contact form and we’ll get back to you.
            </p>
            <div class="info-contact">
                <div class="item-contact">
                    <h3 class="d-flex gap-4"><i class='bx bx-map' ></i><span class="fs-5 fw-bold text-black">address</span></h3>
                    <p>1234 Main Street, Anytown, USA</p>
                </div>
                <div class="item-contact">
                    <h3 class="d-flex gap-4"><i class='bx bx-phone-call' ></i><span class="fs-5 fw-bold text-black">phone</span></h3>
                    <p>+1 123-456-7890</p>
                </div>
                <div class="item-contact">
                    <h3 class="d-flex gap-4"><i class='bx bxl-gmail' ></i><span class="fs-5 fw-bold text-black">email</span></h3>
                    <p>info@example.com</p>
                </div>
            </div>
        </div>
        <div class="contact-form">
            <?php
                $con = mysqli_connect("localhost","root","","ecommerce");
                if(isset($_POST['submit'])){
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $message = $_POST['message'];
                    $query = mysqli_query($con,"INSERT INTO contect (name,email,message) values ('$name', '$email', '$message')");
                    if($query){
                        echo "<script>alert('Your message has been sent')</script>";
                    }else{
                        echo "<script>alert('Error')</script>";
                    }
                }
            ?>
            <form method="POST">
                <div class="comment-box" >
                <h2 class="text-black fw-bold">We would love to hear from you.</h2>
                <p>Your email address will not be published. Required fields are marked *</p>
                </div>
                <div class="enter-detaile">
                <input type="text" name="name" placeholder="name"  required>
                <input type="email" name="email" placeholder="email" required>
                <textarea name="message" placeholder="message" required></textarea>
                </div>
                <button name="submit" class="btn-adjest" >
                <a style="--clr: #7808d0" class="button" id="btn">
            <span class="button__icon-wrapper">
                <svg width="10" class="button__icon-svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 15">
                    <path fill="currentColor" d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z"></path>
                </svg>
                
                <svg class="button__icon-svg  button__icon-svg--copy" xmlns="http://www.w3.org/2000/svg" width="10" fill="none" viewBox="0 0 14 15">
                    <path fill="currentColor" d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z"></path>
                </svg>
            </span>
                 Send Message
                 </a>
                </button>
            </form>
        </div>
    </div> 
    <?php include "footer.php" ?>
</body>
</html>