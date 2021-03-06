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
    <title>Chi tiết phản hồi</title>
    </title>
</head>

<body>
    <?php
    $active_nav_item = 'service';
    require_once("../navbar.php");
    $studentid = $_GET['studentid'];
    $timestamp = $_GET['timestamp'];
    $sql = "SELECT * FROM REQUEST_COUNSELLING WHERE STUDENTID = '$studentid' AND REQUEST_TIMESTAMP = '$timestamp'";
    $result = $mysqli->query($sql);
    $row = mysqli_fetch_assoc($result);
    echo
    "<div style='padding-top: 100px; padding-bottom: 100px;' class='px-5'>
            <div class=\"text-center mt-5\">
                <h4>YÊU CẦU TƯ VẤN - NGÀY " . $timestamp . "</h4>
            </div>
            <div class=\"row mt-5\">
                <div class=\"col-md-7 mt-5\">
                    <div class=\"row ms-5\">
                    <div class=\"col d-flex justify-content-center\">
                    <div class=\"card\" style=\"width: 90%;\">
                                <div class=\"card-header\">Yêu cầu tư vấn</div>
                                <div class=\"card-body\">
                                    <div class=\"card-text\">
                                        Sinh viên:  $studentid <br>
                                        Ngày hẹn tư vấn: " . date("d-m-Y", strtotime($row['DATE'])) . "
                                        <br>
                                        Thời gian: ";
    if ($row['TIME'] == 'AFTERNOON')
        echo "CHIỀU (14:00 - 16:00)";
    else echo "SÁNG (8:00 - 10:00)"; ?>
    <br>Nội dung yêu cầu: "<?php echo $row['REQUEST_CONTENT']; ?>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="row mt-5">
        <div class="col d-flex justify-content-center">
            <div class="card" style="width: 90%;">
                <div class="card-header">Chi tiết phản hồi</div>
                <div class="card-body">
                    <div class="card-text">
                        Nhân viên: <?php echo $row['MEDICAL_STAFFID'] ?><br>
                        Thời gian phản hồi: <?php echo date("d-m-Y H:i:s", strtotime($row['RESPONSE_TIMESTAMP'])); ?>
                        <br>Nội dung phản hồi:<br><?php echo $row['RESPONSE_CONTENT']; ?><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-5 mt-5 d-none d-md-block">
        <img class="align-middle img-fluid" src="../../../assets/images/responsed_counselling.svg" alt="" width="95%">
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/js/admin.js"></script>
</body>

</html>