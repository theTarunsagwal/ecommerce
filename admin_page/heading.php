<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $con = mysqli_connect('localhost','root','','ecommerce');
    ?>
    <form action="" method="POST">
        <input type="text" name="xyz">
        <input type="submit" name="sub">
    </form>
    <table>
        <?php
            if(isset($_POST['sub'])){
                $text = $_POST['xyz'];
                $query = mysqli_query($con,"SELECT * FROM wood WHERE image_name LIKE '%$text%'");
                $query2 = mysqli_query($con,"SELECT * FROM decor_art WHERE decor_name LIKE '%$text%'");
                $query3 = mysqli_query($con,"SELECT * FROM dining_room WHERE dining_name LIKE '%$text%'");
                if($query || $query2 || $query3 ){
                    while($row = mysqli_fetch_array($query)){
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['image_name']."</td>";
                        echo "</tr>";
                    }
                    while($row2 = mysqli_fetch_array($query2)){
                        echo "<tr>";
                        echo "<td>".$row2['id']."</td>";
                        echo "<td>".$row2['decor_name']."</td>";
                        echo "</tr>";
                    }
                     while($row3 = mysqli_fetch_array($query3)){
                        echo "<tr>";
                        echo "<td>".$row3['id']."</td>";
                        echo "<td>".$row3['dining_name']."</td>";
                        echo "</tr>";
                    }
                }
            }else{
                $sql = mysqli_query($con, 'select * from wood');
                $sql2 = mysqli_query($con, 'select * from decor_art');
                $sql3 = mysqli_query($con, 'select * from dining_room');
                while($exe = mysqli_fetch_array($sql)){
                    echo "<tr>";
                    echo "<td>".$exe['id']."</td>";
                    echo "<td>".$exe['image_name']."</td>";
                    echo "</tr>";
                }
                while($exe2 = mysqli_fetch_array($sql2)){
                    echo "<tr>";
                    echo "<td>".$exe2['id']."</td>";
                    echo "<td>".$exe2['decor_name']."</td>";
                    echo "</tr>";
                }
                while($exe3 = mysqli_fetch_array($sql3)){
                    echo "<tr>";
                    echo "<td>".$exe3['id']."</td>";
                    echo "<td>".$exe3['dining_name']."</td>";
                    echo "</tr>";
                }
            }
        ?>
        
</body>
</html>