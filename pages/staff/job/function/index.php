<?php
    require_once 'config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Document</title>
    <style>

    </style>
</head>
<body>

    <?php 
       
        if(isset($_GET['page_layout'])){
            switch($_GET['page_layout']){
            case 'danhsach':
                require_once 'job/danhsach.php';
            break;
            case 'them':
                require_once 'job/them.php';
            break; 
            case 'chitiet':
                require_once 'job/chitiet.php';
            break;
            case 'sua':
                require_once 'job/sua.php';
            break;
            case 'xoa':
                require_once 'job/xoa.php';
            break;
            default:
                require_once 'job/danhsach.php';
            break;
        }
    }
    else{
        require_once 'job/danhsach.php';
    }
    ?>
</body>
</html>