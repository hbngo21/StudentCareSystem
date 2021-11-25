<?php
$connect = mysqli_connect('localhost:3306','root','viet26072001','studentcare');

// Check connection
if ($connect) {
 mysqli_query($connect,"SET NAMES 'UTF8'");
   
}
else{
    echo 'Ket noi that bai';
}
?>