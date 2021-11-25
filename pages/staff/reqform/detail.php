<?php
require_once '../../../connection.php';
// Login information
session_start();
if (isset($_SESSION['staff'])) {
    $logined = true;
    $staffid = $_SESSION['staff'];
} else $logined = false;

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- user.css -->
    <link rel="stylesheet" href="../../../css/main.css">
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
    <title>Chi tiết yêu cầu</title>
    </title>
</head>

<body style="background-color: #f3f4f6;">
    <?php
    require_once('../navbar.php');
    $studentid = $_GET['studentid'];
    $timestamp = $_GET['timestamp'];
    $sql = "SELECT * FROM REQUEST_SERVICES WHERE STUDENTID = '$studentid' AND TIMESTAMP = '$timestamp'";
    $result = $mysqli->query($sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <div style="padding-top: 100px; padding-bottom: 100px;" class="px-5">
        <div class='row justify-content-between mt-5'>
            <div class='col-md-6 justify-content-center align-items-center d-flex'>
                <img src='../../../assets/images/response.svg' alt='' style='width: 75%'>
            </div>
            <div class='col-md-6'>
                <div style='height: 20%'></div>
                <div class='card' style='width: 100%'>
                    <div class='card-header'>YÊU CẦU DỊCH VỤ</div>
                    <div class='card-body'>
                        <div class='card-text'>
                            Từ:
                            <?php $sql2 = "SELECT CONCAT(LASTNAME,' ',FIRSTNAME) AS NAME FROM STUDENT WHERE ID =" . $studentid . "";
                            $result2 = $mysqli->query($sql2);
                            echo mysqli_fetch_assoc($result2)['NAME']; ?>
                            - MSSV <?php echo $studentid; ?>
                            <br>
                            Thời gian: <?php echo date("d-m-Y H:i:s", strtotime($timestamp)); ?>
                            <br>
                            Loại yêu cầu:
                            <?php
                            switch ($row['ID']) {
                                case '1':
                                    echo "In bảng điểm học tập";
                                    break;
                                case '2':
                                    echo "Nhận bằng tốt nghiệp";
                                    break;
                                case '3':
                                    echo "Giấy xác nhận sinh viên";
                                    break;
                                case '4':
                                    echo "Làm lại thẻ sinh viên";
                                    break;
                                case '6':
                                    echo "In bảng điểm rèn luyện";
                                    break;
                            }
                            ?>
                            <br>
                            Nội dung yêu cầu:<br>
                            <?php
                            echo $row['CONTENT'];
                            ?>
                        </div>
                    </div>
                </div>
                <div class='col text-center'>
                    <?php
                    if ($row['STATUS'] == 'Waiting') {
                        echo "
                    <form method='POST' class='mt-5'>
                    <button type='submit' class='btn' name='send'>Xác nhận</button>
                    </form>
                    ";
                    } elseif ($row['STATUS'] == 'In Progress') {
                        echo "
                    <form method='POST' class='mt-5'>
                        <button type='submit' class='btn' name='send'>Hoàn tất</button>
                    </form>
                    ";
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
        if (isset($_REQUEST['send'])) {
            $sql = "CALL update_status('$staffid', '$studentid', '$timestamp' )";
            $mysqli->query($sql);
            echo "<script>
                        window.location.href = 'form.php';
                </script>";
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/js/admin.js"></script>
</body>

</html>