<?php
require_once '../../connection.php';
$logined = false; // User not login
$studentid = 10000;
$registerevent = array();
$sql = "SELECT eventname FROM registerevent WHERE studentid=" . $studentid  . "";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        array_push(
            $registerevent,
            $row['eventname'],
        );
    }
}
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

    <!-- user.css -->
    <link rel="stylesheet" href="/css/main.css">
    <style>
        #pagination {
            text-align: right;
            padding: .5rem 1rem 1rem;
        }

        .page-item {
            padding: 5px 9px;
            color: #f94144;
            background-color: #fff;

            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;

        }

        .page-item:hover {
            color: black;
        }

        .current-page {
            background-color: #f94144;
            color: #fff;
        }

        .validate {
            display: none;
            color: red;
            margin: 0 0 15px 0;
            font-weight: 400;
            font-size: 13px;
        }
    </style>
    <title>Sự kiện</title>
    </title>
</head>

<body style="background-color: #f3f4f6;">
    <!-- mainNav -->
    <div class="header">
        <nav class="navbar menu-bar fixed-top navbar-expand-sm">
            <a class="navbar-brand" href="index.php">
                Student Care
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-5" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbar-list-5">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="serviceDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            Dịch vụ
                        </a>
                        <div class="dropdown-menu" aria-labelledby="serviceDropdown">
                            <a class="dropdown-item" href="#">Hỏi đáp</a>
                            <a class="dropdown-item" href="#">Tư vấn tâm lý</a>
                            <a class="dropdown-item" href="#">Dịch vụ sinh viên</a>
                            <a class="dropdown-item" href="#">Đánh giá</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="event.php">Sự kiện</a>
                    </li>
                    <?php
                    if (!$logined) {
                    ?>
                        <li class="nav-item">
                            <a class="btn login-btn" href="login.php">Đăng nhập</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item dropdown d-flex justify-content-center flex-wrap">
                            <a class='btn user-btn' href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                <i class='fas fa-user-circle'></i>
                            </a>
                            <div class="text-center" style="width: 100%; font-weight: bold; font-size: .8rem; color: #fff;">Trần Quốc Việt</div>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">Thông tin cá nhân</a>
                                <a class="dropdown-item" href="#">Đăng xuất</a>
                            </div>
                        </li>
                    <?php
                    } ?>
                </ul>
            </div>
        </nav>
    </div>
    <!--Event banner-->
    <div class="event__banner">Sự kiện</div>
    <div class="container">
        <?php
        if (!isset($_GET['action'])) {
            $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 4;
            $current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
            $offset = ($current_page - 1) * $item_per_page;
            $totalRecords = $mysqli->query("SELECT * FROM event");
            $totalRecords = $totalRecords->num_rows;
            $totalPages = ceil($totalRecords / $item_per_page);
            $sql = "Call get_events_info(" . $offset . ", " . $item_per_page . ")";

            if ($stmt = $mysqli->prepare($sql)) {
                if ($stmt->execute()) {
                    $stmt->store_result();

                    $stmt->bind_result($name, $limited, $trainingpoint, $content, $timestamp, $name_staff, $num_register);
                    while ($stmt->fetch()) {
                        $timestamp = date("d/m/Y", strtotime($timestamp));
        ?>

                        <div class="row event__item">
                            <div class="col-md-3 p-2"><img src="https://media.istockphoto.com/photos/chalkboard-and-colored-balloons-on-a-wooden-background-picture-id1263908025?b=1&k=20&m=1263908025&s=170667a&w=0&h=DDeDvtWSu99Z5yKrbx0X3M26uHGP1SCBV_-zXKS-FSQ=" class="img-fluid rounded b-shadow-a" width="100%" alt=""></div>
                            <div class="col-md-9 p-2 d-flex flex-column justify-content-between">
                                <div class="event__item__title"><?= $name ?><div class="trainingpoint"><?= $trainingpoint ?> đrl</div>
                                </div>
                                <div class="d-flex flex-wrap justify-content-between" style="width: 90%;">
                                    <div class="event__item-info"><i class="far fa-calendar-alt"></i><span><?= $timestamp ?></span></div>
                                    <div class="event__item-info"><i class="fas fa-user-edit"></i><span><?= $name_staff ?></span></div>
                                    <div class="event__item-info"><i class="far fa-users"></i><span><?= $num_register ?>/<?= $limited ?></span></div>
                                </div>
                                <div><?= $content ?> Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore optio enim possimus tempora. Explicabo atque, perspiciatis reprehenderit aspernatur adipis</div>
                                <?php
                                if (in_array($name, $registerevent))
                                    echo "<button type='button' class='btn event__register-btn' style='width: 150px; background-color: #ee9b00;' disabled>Đã đăng ký</button>";
                                else {
                                    $param_func = "registerEvent('" . $name . "', " . $studentid . ")";
                                    echo "<button type='button' class='btn event__register-btn' style='width: 150px;' onclick=\"" . $param_func . "\"" . ">Đăng ký</button>";
                                }
                                ?>
                            </div>
                        </div>
        <?php
                    }
                }
            }
        };
        reset($registerevent);
        ?>
        <?php
        include './pagination.php';
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/js/main.js"></script>
</body>

</html>