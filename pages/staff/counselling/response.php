<?php
require_once '../../../connection.php';
// Login information
session_start();
if (isset($_SESSION['staff'])) {
    $logined = true;
    $staffid = $_SESSION['staff'];
} else $logined = false;
date_default_timezone_set("Asia/Ho_Chi_Minh");
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
    <title>Phản hồi yêu cầu tư vấn</title>
</head>

<body style="background-color: #f3f4f6;">
    <!-- mainNav -->
    <?php
    $active_nav_item = 'service';
    require_once("../navbar.php");
    $studentid = $_GET['studentid'];
    $timestamp = $_GET['timestamp'];
    $sql = "SELECT * FROM REQUEST_COUNSELLING WHERE STUDENTID ='$studentid' AND REQUEST_TIMESTAMP = '$timestamp';";
    $result = $mysqli->query($sql);
    $row = mysqli_fetch_assoc($result);
    echo
    "<div style='padding-top: 100px; padding-bottom: 100px;' class='px-5'>
            <div class='text-center mt-5'>
                <h4>PHẢN HỒI YÊU CẦU TƯ VẤN - SV " . $studentid . " NGÀY " . date("d-m-Y H:i:s", strtotime($timestamp)) . "</h4>
            </div>
            <div class='row mt-5'>
                <div class='col-md-7 mt-5 me-5'>
                    <div class='row d-flex justify-content-center'>
                            <div class='card' style='width: 100%;'>
                                <div class='card-header'>Yêu cầu tư vấn</div>
                                <div class='card-body'>
                                    <div class='card-text'>
                                        Sinh viên:  $studentid <br>
                                        Ngày hẹn tư vấn: " . date("d-m-Y", strtotime($row['DATE'])) . "
                                        <br>
                                        Thời gian: ";
    if ($row['TIME'] == 'AFTERNOON')
        echo "CHIỀU (14:00 - 16:00)";
    else echo "SÁNG (8:00 - 10:00)";
    echo "<br>
        Nội dung yêu cầu: " . $row['REQUEST_CONTENT'] .
        "</div></div></div></div>
                    <div class='row mt-5 d-flex justify-content-center'>
                            <div class='card' style='width: 100%;'>
                                <div class='card-header'>Chi tiết phản hồi</div>
                                <div class='card-body'>
                                    <div class='card-text'>
                                        Nhân viên: " . $staffid . " <br>
                                        Thời gian phản hồi: " . date("d-m-Y H:i:s", time()) . "
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class='row mt-3 d-flex justify-content-center'>
                            <form  method='POST' style='width: 100%;'>
                                <div class='form-group'>
                                    <label for='exampleFormControlTextarea1'>Nội dung phản hồi</label>
                                    <textarea class='form-control' id='exampleFormControlTextarea1' name='content' rows='5' required></textarea>
                                </div>
                                <div class='d-flex justify-content-center'>
                                    <button type='submit' class='btn mt-4' name='send'\>
                                    Gửi
                                    <i class='fas fa-paper-plane'></i>
                                    </button>" ?>
    <?php
    if (isset($_REQUEST['send'])) {
        $time_stamp = date("Y-m-d H:i:s");
        $content = $_POST['content'];

        $sql = "UPDATE REQUEST_COUNSELLING 
                                                SET MEDICAL_STAFFID= ?, RESPONSE_TIMESTAMP = ?, RESPONSE_CONTENT = ?
                                                WHERE STUDENTID =" . $studentid . " AND REQUEST_TIMESTAMP = '$timestamp'";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("sss", $param_id, $param_timestamp, $param_content);
            $param_id = $staffid;
            $param_timestamp = $time_stamp;
            $param_content = $content;
            if ($stmt->execute()) {
                echo "<script>
                                                alert('Gửi yêu cầu thành công!');
                                                window.location.href = 'counsellingList.php';
                                                </script>";
            } else {
                echo $stmt->error;
            }
        }
    }
    ?>
    </div>
    </form>
    </div>
    </div>
    <div class="col-md-5 mt-5 d-none d-md-block">
        <img class='illustration' src='../../../assets/images/staff_response.svg' alt='' width='95%'>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/js/admin.js"></script>
</body>

</html>