<?php
require_once '../../../connection.php';
// Login information
session_start();
if (isset($_SESSION['staff'])) {
    $logined = true;
    $staffid = $_SESSION['staff'];
} else $logined = false;
$create_event = array();

$sql = "select typeOfStaff('" . $staffid . "')";
$stmt = $mysqli->query($sql);

if ($stmt = $mysqli->prepare($sql)) {
    if ($stmt->execute()) {
        //Store result
        $stmt->store_result();

        $stmt->bind_result($typeOfStaff);
        $stmt->fetch();
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
    <?php
    require_once("../navbar.php")
    ?>
    <!--Event Banner-->
    <div class="event__banner">Sự kiện</div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- Create event form -->
                <div class="event__create">
                    <h3 class="mb-3">Tạo sự kiện</h3>
                    <div style="width: 100%;">
                        <form>
                            <div class="row d-flex justify-content-center">
                                <div class="form-group" style="width: 100%;">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Tên sự kiện" data-msg="Tên sự kiện ít nhất 5 kí tự">
                                    <div class="validate" id="validateName"></div>
                                </div>
                                <div class="form-group" style="width: 100%;">
                                    <input type="number" name="limited" class="form-control" id="limited" placeholder="Giới hạn sinh viên tham gia" data-msg="Số lượng sinh viên tham gia không nhỏ hơn 10">
                                    <div class="validate" id="validateLimited"></div>
                                </div>
                                <div class="form-group" style="width: 100%;">
                                    <textarea class="form-control animate__animated my-2" name="content" id="content" rows="5" data-msg="Thiếu nội dung sự kiện" placeholder="Nội dung sự kiện"></textarea>
                                    <div class="validate" id="validateContent"></div>
                                </div>
                                <div class="form-group" style="width: 100%;">
                                    <select class="custom-select" id="trainingpoint" data-msg="Điểm rèn luyện 5 hoặc 10">
                                        <option selected value="">Điểm rèn luyện...</option>
                                        <option value="5">5 điểm rèn luyện</option>
                                        <option value="10">10 điểm rèn luyện</option>
                                    </select>
                                    <div class="validate" id="validateTrainingPoint"></div>
                                </div>
                            </div>
                        </form>
                        <div class="d-flex justify-content-center">
                            
                            <button class="btn btn-lg btn-rounded" onclick="validateData('<?= $staffid ?>')" <?= $typeOfStaff != 'politicalstaff' ? 'disabled' : '' ?>>
                                Tạo
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <!-- Event items -->
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
                                        <div class="event__item__title"><a href="detail.php?name=<?= $name ?>"><?= $name ?></a>
                                            <div class="trainingpoint"><?= $trainingpoint ?> đrl</div>
                                        </div>
                                        <div class="d-flex flex-wrap justify-content-between" style="width: 90%;">
                                            <div class="event__item-info"><i class="far fa-calendar-alt"></i><span><?= $timestamp ?></span></div>
                                            <div class="event__item-info"><i class="fas fa-user-edit"></i><span><?= $name_staff ?></span></div>
                                            <div class="event__item-info"><i class="far fa-users"></i><span><?= $num_register ?>/<?= $limited ?></span></div>
                                        </div>
                                        <div>
                                            <?= substr($content . "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti, modi aut facilis porro, cupiditate harum exercitationem placeat earum quis aspernatur corporis illum, magnam dolores eveniet quisquam asperiores ratione explicabo aliquid veritatis voluptates consequatur doloribus nam quo mollitia. Dicta nostrum consequuntur omnis, quo totam officiis magnam aliquam aliquid veritatis sint sit consequatur vero explicabo sed dolores dolor ipsum. Nesciunt ex eum nobis quibusdam accusantium beatae velit maiores corrupti deleniti nemo quae numquam architecto, saepe et consequuntur maxime repellendus sint esse, totam, voluptatibus blanditiis. Inventore saepe suscipit consectetur est sapiente odio maxime fuga ad vel excepturi, et repudiandae sit. Omnis, iusto nulla?", 0, 150) ?>
                                            ... <a class="for-more-info" href="detail.php?name=<?= $name ?>">Xem thêm</a>
                                        </div>
                                        <button type='button' class='btn btn-danger event__rmv-btn' style='width: 150px;' onclick="removeEvent('<?= $name ?>')" <?= $typeOfStaff != 'politicalstaff' ? 'disabled' : '' ?>>Xoá<i class="fas fa-trash-alt"></i></button>
                                    </div>
                                </div>
                <?php
                            }
                        }
                    }
                };
                ?>
            </div>
        </div>
        <?php
        include '../pagination.php';
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/js/admin.js"></script>
</body>

</html>