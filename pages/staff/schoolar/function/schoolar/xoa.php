<?php
    $name =$_GET['NAME'];
    $sql ="DELETE FROM incentivescholarship_result WHERE NAME= '$name'";
    $query = mysqli_query($connect,$sql);
    header('location: index.php?page_layout=danhsach');   
?>


