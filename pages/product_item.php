<?php
 $con = mysqli_connect('localhost','root','','ecommerce');
 $qury = mysqli_query($con,'select * from decor_art ');
 $qury = mysqli_query($con,'select * from art_item ');
 


?>