<?php
    $con = mysqli_connect("localhost","root","","ecommerce");
    $data = mysqli_query($con, 'SELECT * FROM dining_room where id in (3,4)');

    while($row = mysqli_fetch_assoc($data)){
        echo $row['id'];
        echo $row['dining_name'];
    }
?>
