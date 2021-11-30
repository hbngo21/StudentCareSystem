<?php
require_once '../../../connection.php';
// Login information
session_start();
if (isset($_SESSION['student'])) {
    $logined = true;
    $studentid = $_SESSION['student'];
} else $logined = false;

$ename = $_GET['name'];

// Check student registered
$sql = "SELECT eventname FROM registerevent WHERE studentid=" . $studentid  . " and eventname='" . $ename . "'";
$result = $mysqli->query($sql);
$isRegistered = $result->num_rows > 0 ? true : false;

//Get product detail
$sql = "Call get_detail_event('" . $ename . "')";

if ($stmt = $mysqli->prepare($sql)) {
    if ($stmt->execute()) {
        //Store result
        $stmt->store_result();

        $stmt->bind_result($name, $limited, $trainingpoint, $content, $timestamp, $name_staff, $num_register);
        $stmt->fetch();
        $timestamp = date("d/m/Y", strtotime($timestamp));
    }
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


    <!--Animation.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- user.css -->
    <link rel="stylesheet" href="/css/main.css">
    <title>Sự kiện</title>
</head>

<body style="background-color: #f3f4f6;">
    <!-- mainNav -->
    <?php
    $active_nav_item = 'event';
    require_once("../navbar.php")
    ?>
    <div class="row event__detail animate__animated animate__fadeIn">
        <div class="col-md-4 pt-2"><img src="https://media.istockphoto.com/photos/chalkboard-and-colored-balloons-on-a-wooden-background-picture-id1263908025?b=1&k=20&m=1263908025&s=170667a&w=0&h=DDeDvtWSu99Z5yKrbx0X3M26uHGP1SCBV_-zXKS-FSQ=" class="img-fluid rounded b-shadow-a" width="100%" alt=""></div>
        <div class="col-md-8 pt-2">
            <div class="event__detail__title mt-2"><?= $name ?></div>
            <div><span style="font-weight: bold;">Điểm rèn luyện: </span>
                <div class="trainingpoint d-inline-block"><?= $trainingpoint ?></div>
            </div>
            <div class="mt-2">
                <div class="event__item-info mt-1"><i class="far fa-calendar-alt"></i><span style="font-weight: bold;">Ngày tạo: </span><span><?= $timestamp ?></span></div>
                <div class="event__item-info mt-1"><i class="fas fa-user-edit"></i><span style="font-weight: bold;">Ngày viên tạo: </span><span><?= $name_staff ?></span></div>
                <div class="event__item-info mt-1"><i class="far fa-users"></i><span style="font-weight: bold;">Số sinh viên tham gia: </span><span><?= $num_register ?>/<?= $limited ?></span></div>
            </div>
            <div class="mt-3">
                <h4>Nội dung:</h4>
                <?= $content ?>
            </div>
            <?php
            if ($isRegistered)
                echo "<button type='button' class='btn event__register-btn mt-2' style='width: 100px;' disabled>Đã đăng ký</button>";
            else {
                $param_func = "registerEvent('" . $name . "', " . $studentid . ")";
                echo "<button type='button' class='btn event__register-btn mt-2' style='width: 100px;' onclick=\"" . $param_func . "\"" . ">Đăng ký</button>";
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/js/main.js"></script>
</body>

</html>