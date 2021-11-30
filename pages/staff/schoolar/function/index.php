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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Học bổng</title>
</head>

<body>

    <?php
    $active_nav_item = 'home';
    require_once("../../navbar.php");
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
    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/js/admin.js"></script>
</body>

</html>