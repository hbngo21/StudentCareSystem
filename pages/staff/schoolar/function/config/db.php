<?php
$connect = mysqli_connect('localhost:3325','root','','studentcare');

// Check connection
if ($connect) {
 mysqli_query($connect,"SET NAMES 'UTF8'");
   
}
else{
    echo 'Ket noi that bai';
}
?>