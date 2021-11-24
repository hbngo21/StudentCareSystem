<?php
require_once 'config/db.php';
require_once '../../../../connection.php';
// Login information
session_start();
if (isset($_SESSION['staff'])) {
    $logined = true;
    $staffid = $_SESSION['staff'];
} else $logined = false;

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
    require_once '../../navbar.php';
    if (isset($_GET['page_layout'])) {
        switch ($_GET['page_layout']) {
            case 'danhsach':
                require_once 'schoolar/danhsach.php';
                break;
            case 'them':
                require_once 'schoolar/them.php';
                break;
            case 'chitiet':
                require_once 'schoolar/chitiet.php';
                break;
            case 'sua':
                require_once 'schoolar/sua.php';
                break;
            case 'xoa':
                require_once 'schoolar/xoa.php';
                break;
            default:
                require_once 'schoolar/danhsach.php';
                break;
        }
    } else {
        require_once 'schoolar/danhsach.php';
    }
    ?>

</body>

</html>