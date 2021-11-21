<?php
  require_once '../../../connection.php';
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
    <div style="padding: 100px;">
      <div class="row mt-5 justify-content-between">
        <div class="col-6">
            <h4 style="margin-bottom: 30px">CÁC YÊU CẦU TƯ VẤN CỦA SINH VIÊN</h4>
        </div>
        <div class="col-xs-3">
            <form class="form-inline" method="POST">
            <div class="form-group mx-sm-3 mb-2">
                <select class="form-control" name="filter">
                    <option value="all">Hiển thị tất cả</option>
                    <option value="waiting">Yêu cầu chờ phản hồi</option>
                    <option value="done">Yêu cầu đã giải quyết</option>
                </select>
            </div>
            <input class="btn mb-2" type="submit" name="ok" value="Lọc">
            </form>
      </div>
      <?php 
        if (!isset($_GET['action'])) {
            $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
            $current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
            $offset = ($current_page - 1) * $item_per_page;
        }   
        if (empty($filter)) {
            $sql = "SELECT * FROM REQUEST_COUNSELLING ORDER BY REQUEST_TIMESTAMP DESC LIMIT ". $offset. ", ".$item_per_page.";";
            $totalRecords = $mysqli->query("SELECT * FROM REQUEST_COUNSELLING"); 
        }
        if(isset($_REQUEST['ok'])) {
            if($_POST['filter']=='all') { 
                $sql = "SELECT * FROM REQUEST_COUNSELLING ORDER BY REQUEST_TIMESTAMP DESC LIMIT ". $offset. ", ".$item_per_page.";";
                $totalRecords = $mysqli->query("SELECT * FROM REQUEST_COUNSELLING"); 
            }
            elseif($_POST['filter']=='waiting') { 
                $sql = "SELECT * FROM REQUEST_COUNSELLING WHERE MEDICAL_STAFFID IS NULL ORDER BY REQUEST_TIMESTAMP DESC LIMIT ". $offset. ", ".$item_per_page.";";
                $totalRecords = $mysqli->query("SELECT * FROM REQUEST_COUNSELLING WHERE MEDICAL_STAFFID IS NULL"); 
            }
            else{
                $sql = "SELECT * FROM REQUEST_COUNSELLING WHERE MEDICAL_STAFFID IS NOT NULL ORDER BY REQUEST_TIMESTAMP DESC LIMIT ". $offset. ", ".$item_per_page.";";
                $totalRecords = $mysqli->query("SELECT * FROM REQUEST_COUNSELLING WHERE MEDICAL_STAFFID IS NOT NULL");
            }
          }   
          $totalRecords = $totalRecords->num_rows;
          $totalPages = ceil($totalRecords / $item_per_page);
                $result = $mysqli->query($sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0){
                   echo "<table
                    id='table1'
                    class='table table-bordered table-hover align-middle'
                    style='margin-left: auto; margin-right: auto;'
                  >
                    <thead>
                      <tr>
                        <th class = 'align-middle' style='text-align: center'>Ngày đăng ký</th>
                        <th class = 'align-middle' style='text-align: center'>Ngày yêu cầu tư vấn</th>
                        <th class = 'align-middle' style='text-align: center'>Thời gian yêu cầu tư vấn</th>
                        <th class = 'align-middle' style='text-align: center'>Nội dung yêu cầu</th>
                        <th class = 'align-middle' style='text-align: center'>Nhân viên phản hồi</th>
                        <th class = 'align-middle' style='text-align: center'>Thời gian<br>phản hồi</th>
                        <th class = 'align-middle' style='text-align: center'>Tình trạng</th>
                      </tr>
                    </thead>";
                    while ($row = mysqli_fetch_assoc($result)){
                        echo "<tbody>
                        <tr>";
                        echo "<td style='text-align: center'>" . date("d-m-Y H:i:s", strtotime($row['REQUEST_TIMESTAMP'])) . "</td>";
                        echo "<td style='text-align: center'>" . date("d-m-Y", strtotime($row['DATE'])) . "</td>";
                        if ($row['TIME'] == 'AFTERNOON')
                            echo "<td style='text-align: center'>CHIỀU (14:00 - 16:00)</td>";
                        else echo "<td style='text-align: center'>SÁNG (8:00 - 10:00)</td>";
                        if (!empty($row['MEDICAL_STAFFID']))
                            echo "<td style='text-align: center'><a class='text-decoration-none' href='./counsellingDetail.php?studentid=". $row['STUDENTID']. "&timestamp=".$row['REQUEST_TIMESTAMP']. "'>" . $row['REQUEST_CONTENT'] . "</a></td>";
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
                            echo "<td style='text-align: center'><a href='./response.php?studentid=". $row['STUDENTID']. "&timestamp=".$row['REQUEST_TIMESTAMP']. "'><button class='btn'>Phản hồi</button></a></td>";
                        else echo "<td style='text-align: center; color: red'><b>Đã giải quyết</b></td>";
                        echo "</tr>
                        </tbody>";
                    }
                }
            ?>
      </table>
      <?php
        include '../../staff/pagination.php';
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/js/admin.js"></script>
</body>
</html>
