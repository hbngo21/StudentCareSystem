<?php
  require_once '../../../connection.php';
  $STAFFID='7006';
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
            <h4 style="margin-bottom: 30px">CÁC YÊU CẦU DỊCH VỤ CỦA SINH VIÊN</h4>
        </div>
        <div class="col-xs-3">
            <form class="form-inline" method="POST">
            <div class="form-group mx-sm-3 mb-2">
                <select class="form-control" name="filter">
                    <option value="all">Hiển thị tất cả</option>
                    <option value="waiting">Yêu cầu chờ xác nhận</option>
                    <option value="confirm">Yêu cầu trong tiến trình</option>
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
            $sql = "SELECT * FROM request_services ORDER BY TIMESTAMP DESC LIMIT ". $offset. ", ".$item_per_page.";";
            $totalRecords = $mysqli->query("SELECT * FROM request_services"); 
        }
        if(isset($_REQUEST['ok'])) {
            if($_POST['filter']=='all') { 
                $sql = "SELECT * FROM request_services ORDER BY TIMESTAMP DESC ";
                $totalRecords = $mysqli->query("SELECT * FROM request_services"); 
            }
            elseif($_POST['filter']=='waiting') { 
                $sql = "SELECT * FROM request_services WHERE TRAININGDEPARTMENT_STAFFID IS NULL ORDER BY TIMESTAMP DESC ";
                $totalRecords = $mysqli->query("SELECT * FROM request_services WHERE TRAININGDEPARTMENT_STAFFID IS NULL"); 
            }
            elseif($_POST['filter']=='confirm') { 
                $sql = "SELECT * FROM request_services WHERE STATUS = 'In Progress' ORDER BY TIMESTAMP DESC";
                $totalRecords = $mysqli->query("SELECT * FROM request_services WHERE STATUS = 'In Progress'"); 
            }
            else{
                $sql = "SELECT * FROM request_services WHERE STATUS = 'Completed' ORDER BY TIMESTAMP DESC ";
                $totalRecords = $mysqli->query("SELECT * FROM request_services WHERE  STATUS = 'Completed'");
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
                      <th class = 'align-middle' style='text-align: center'>#</th>
                      <th class = 'align-middle' style='text-align: center'>Mã số Sinh viên</th>
                      <th class = 'align-middle' style='text-align: center'>Thời gian yêu cầu</th>
                      <th class = 'align-middle' style='text-align: center'>Loại yêu cầu</th>
                      <th class = 'align-middle' style='text-align: center'>Nhân viên thực hiện</th>
                      <th class = 'align-middle' style='text-align: center'>Tình trạng</th>
                      </tr>
                    </thead>";
                    $i=1;
                    while ($row = mysqli_fetch_assoc($result)){
                        echo "<tbody>
                        <tr>";
                        echo "<td style='text-align: center'>".$i++."</td>";
                        echo "<td style='text-align: center'>". $row['STUDENTID']."</td>";
                        echo "<td style='text-align: center'>" . date("d-m-Y H:i:s", strtotime($row['TIMESTAMP'])) . "</td>";
                        echo "<td style='text-align: center'>";
                        if ($row['STATUS'] != 'Completed'){
                            echo "<a class='text-decoration-none' href='./detail.php?studentid=". $row['STUDENTID']. "&timestamp=".$row['TIMESTAMP']."'>";
                        }
                        switch ($row['ID']){
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
                        if ($row['STATUS'] != 'Completed')
                                    echo "</a>";
                        echo "</td>";
                        // if (!empty($row['TRAININGDEPARTMENT_STAFFID'])){
                        //     echo "<td style='text-align: center'>". $STAFFID."</td>";
                        // }
                        if (!empty($row['TRAININGDEPARTMENT_STAFFID'])){
                            $sql2 = "SELECT CONCAT(LASTNAME,' ',FIRSTNAME) AS NAME FROM STAFF WHERE ID =". $row['TRAININGDEPARTMENT_STAFFID']."";
                            $result2 = $mysqli->query($sql2);
                            echo"<td style='text-align: center'>". mysqli_fetch_assoc($result2)['NAME']."</td>";
                        }
                        else echo "<td style='text-align: center'> </td>";
                        
                        if ($row['STATUS'] == 'Waiting')
                        echo "<td style='text-align: center; color: rgb(233, 205, 44)'><b>Chờ xác nhận</b></td>";
                    elseif ($row['STATUS'] == 'In Progress')
                        echo "<td style='text-align: center; color: green'><b>Trong tiến trình</b></td>";
                    else
                        echo "<td style='text-align: center; color: red'><b>Đã giải quyết</b></td>";
                        
                       
                      
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