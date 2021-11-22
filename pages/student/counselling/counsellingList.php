<?php
    require_once '../../../connection.php';
    $studentid = 22222
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
    <title>Danh sách yêu cầu</title>
    </title>
</head>

<body style="background-color: #f3f4f6;">
    <!-- mainNav -->
    <?php
        require_once('../navbar.php')
    ?>
    <!-- main -->
    <div style="padding: 100px;">
      <div class="text-center mt-5">
        <h4>BẠN ĐANG GẶP KHÓ KHĂN VỀ VẤN ĐỀ SỨC KHỎE, TÂM LÝ?</h4>
        <h4>HÃY ĐIỀN ĐƠN ĐĂNG KÝ ĐỂ ĐƯỢC GẶP TƯ VẤN VIÊN.</h4>
        <h4>CHÚNG TÔI LUÔN Ở ĐÂY ĐỂ HỖ TRỢ BẠN.</h4>
      </div>
      <div class="row justify-content-between">
        <div class="col-4">
          <h4 style="margin-bottom: 20px; margin-top: 70px;">Các yêu cầu tư vấn của bạn</h4>
        </div>
        <div class="col-2">
          <a href="./counsellingForm.php">
          <button type="button" class="btn main-btn" style="margin-bottom: 20px; margin-top: 70px" >
            Đăng ký tư vấn
          </button></a>
        </div>
        </div>
      <?php
        if (!isset($_GET['action'])) {
            $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
            $current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
            $offset = ($current_page - 1) * $item_per_page;
            $totalRecords = $mysqli->query("SELECT * FROM REQUEST_COUNSELLING WHERE STUDENTID = $studentid");
            $totalRecords = $totalRecords->num_rows;
            $totalPages = ceil($totalRecords / $item_per_page);
        }
        ?>
          <?php
                $sql = "SELECT * FROM REQUEST_COUNSELLING WHERE STUDENTID =".$studentid." ORDER BY REQUEST_TIMESTAMP DESC LIMIT ". $offset. ", ".$item_per_page.";";
                $result = $mysqli->query($sql);
                $resultCheck = $result->num_rows;
                if ($resultCheck > 0){
                   echo "<table
                    id='lst_xetccnn'
                    class='table table-bordered table-hover align-middle'
                    style='margin-left: auto; margin-right: auto;'
                  >
                    <thead class = 'align-middle'>
                      <tr>
                        <th style='text-align: center'>Ngày đăng ký</th>
                        <th style='text-align: center'>Ngày yêu cầu tư vấn</th>
                        <th style='text-align: center'>Thời gian yêu cầu tư vấn</th>
                        <th style='text-align: center'>Nội dung yêu cầu</th>
                        <th style='text-align: center'>Nhân viên phản hồi</th>
                        <th style='text-align: center'>Thời gian phản hồi</th>
                        <th style='text-align: center'>Tình trạng</th>
                      </tr>
                    </thead>";
                    while ($row = $result->fetch_assoc()){
                        echo "<tbody>
                        <tr>";
                        echo "<td style='text-align: center'>" . date("d-m-Y H:i:s", strtotime($row['REQUEST_TIMESTAMP'])) . "</td>";
                        echo "<td style='text-align: center'>" . date("d-m-Y", strtotime($row['DATE'])) . "</td>";
                        if ($row['TIME'] == 'AFTERNOON')
                            echo "<td style='text-align: center'>CHIỀU (14:00 - 16:00)</td>";
                        else echo "<td style='text-align: center'>SÁNG (8:00 - 10:00)</td>";
                        if (!empty($row['MEDICAL_STAFFID']))
                            echo "<td style='text-align: center'><a class='text-decoration-none' href='./counsellingDetail.php?timestamp=".$row['REQUEST_TIMESTAMP']."'>".$row['REQUEST_CONTENT']."</a></td>";
                        else echo "<td style='text-align: center'>" . $row['REQUEST_CONTENT'] . "</td>";
                        if (!empty($row['MEDICAL_STAFFID'])){
                            $sql2 = "SELECT CONCAT(LASTNAME,' ',FIRSTNAME) AS NAME FROM STAFF WHERE ID =". $row['MEDICAL_STAFFID']."";
                            $result2 = $mysqli->query($sql2);
                            echo "<td style='text-align: center'>" . mysqli_fetch_assoc($result2)['NAME'] . "</a></td>";
                        }
                        else echo "<td style='text-align: center'></td>";
                        if (!empty($row['MEDICAL_STAFFID']))
                            echo "<td style='text-align: center'>" . date("d-m-Y H:i:s", strtotime($row['RESPONSE_TIMESTAMP'])) . "</td>";
                        else echo "<td style='text-align: center'></td>";
                        if (empty($row['MEDICAL_STAFFID']))
                            echo "<td style='text-align: center; color: red'><b>Chờ phản hồi</b></td>";
                        else echo "<td style='text-align: center; color: red'><b>Đã giải quyết</b></td>";
                        echo "</tr>
                        </tbody>";
                    }
                    echo "</table>";
                    include '../../staff/pagination.php';
                }
                else echo "<h5 class='text-center' style='color: red'>Bạn chưa có yêu cầu tư vấn nào!</h5>";
            ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/js/admin.js"></script>
</body>

</html>
