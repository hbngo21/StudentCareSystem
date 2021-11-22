<?php
    $ID =$_GET['ID'];
    $sql ="DELETE FROM jobscholarship_infor WHERE ID= '$ID'";
    $query = mysqli_query($connect,$sql);
    header('location: index.php?page_layout=danhsach');   
?>


