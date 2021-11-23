Skip to content
Search or jump to…
Pull requests
Issues
Marketplace
Explore
 
@thachyyy 
hbngo21
/
StudentCareSystem
Private
1
00
Code
Issues
Pull requests
Actions
Projects
Security
Insights
StudentCareSystem/pages/staff/reqform/form.php /
@hbngo21
hbngo21 Update
Latest commit 0858c49 10 minutes ago
 History
 2 contributors
@hbngo21@thachyyy
165 lines (150 sloc)  7.52 KB
  
<?php
  require_once '../../../connection.php';
  $studentid = 90000;
  $staffid = 5371;
  
  $sql_req="SELECT * FROM request_services ORDER BY TIMESTAMP DESC";
  $query_req=mysqli_query($mysqli,$sql_req);
  if (isset($_POST['submit'])){
    
      date_default_timezone_set("Asia/Ho_Chi_Minh");
      $time_stamp = date("Y-m-d H:i:s");
      $ID=$_POST['id'];
      $content = $_POST['content'];

      $sql = "INSERT INTO request_services(STUDENTID, TIMESTAMP, ID,CONTENT) 
              VALUES (?,?,?,?)";
      if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("ssss", $param_id, $param_timestamp,$param_id, $param_content);
        $param_id = $studentid;
        $param_timestamp = $time_stamp;
        $param_id=$ID;
        $param_content = $content;
        if ($stmt->execute()) {
            echo "<div class='row mt-3' style='color: red;'><b>Gửi yêu cầu thành công!</b></div>";
        } else {
            echo $stmt->error;
        }
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
    <link rel="stylesheet" href="../../../css/main.css">
<style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');
       *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }
        body{
        background: #ef9273;
        padding: 10px;
        }   
        .container{
            margin-top: 7rem;
            margin-left: 0;
            
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
    

    <div style="padding-top: 150px; padding-bottom: 100px;" class="px-5">
    <div class="d-flex justify-content-end">
            <form class="form-inline" method="POST">
            <div class="form-group mx-sm-3 mb-2">
                <select class="form-control" name="filter">
                    <option value="all">Hiển thị tất cả</option>
                    <option value="waiting">Yêu cầu chờ phản hồi</option>
                    <option value="confirm">Yêu cầu đã xác nhận</option>
                    <option value="done">Yêu cầu đã giải quyết</option>
                </select>
            </div>
            <input class="btn mb-2" type="submit" name="ok" value="Lọc">
            </form>
            
        </div>
        <div class="card" >
        <div class="card-header">
            <h2>Các yêu cầu đã đăng ký</h2>
        </div>
        
        <div class="card-body">
            <div style='overflow-x:auto;'>
            <table id='table1'class='table table-bordered table-hover align-middle'
            style='margin-left: auto; margin-right: auto;'>
                    <thead>
                      <tr>
                        <th class = 'align-middle' style='text-align: center'>#</th>
                        <th class = 'align-middle' style='text-align: center'>Mã số Sinh viên</th>
                        <th class = 'align-middle' style='text-align: center'>Thời gian yêu cầu tư vấn</th>
                        <th class = 'align-middle' style='text-align: center'>Loại yêu cầu</th>
                        <th class = 'align-middle' style='text-align: center'>Nhân viên thực hiện</th>
                        <th class = 'align-middle' style='text-align: center'>Tình trạng</th>
                      </tr>
                    </thead>
                <tbody>
                    <?php
                    $i = 1;
                        while($row = mysqli_fetch_assoc($query_req)){ ?>
                            <tr>
                            <td style='text-align: center'><?php echo $i++; ?></td>
                            <td style='text-align: center'><?php echo $row['STUDENTID']; ?></td>
                            <td style='text-align: center'><?php echo date("d-m-Y H:i:s", strtotime($row['TIMESTAMP'])); ?></td>
                            <td style='text-align: center'>
                                <?php 
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
                                ?>
                            </td>
                            <td style='text-align: center'>
                                <?php 
                                if (!empty($row['TRAININGDEPARTMENT_STAFFID'])){
                                    $sql2 = "SELECT CONCAT(LASTNAME,' ',FIRSTNAME) AS NAME FROM STAFF WHERE ID =". $row['TRAININGDEPARTMENT_STAFFID']."";
                                    $result2 = $mysqli->query($sql2);
                                    echo mysqli_fetch_assoc($result2)['NAME'];
                                }
                                ?>
                            </td>
                                <?php 
                                if ($row['STATUS'] == 'Waiting')
                                    echo "<td style='text-align: center; color: rgb(233, 205, 44)'><b>Chờ xác nhận</b></td>";
                                elseif ($row['STATUS'] == 'In Progress')
                                    echo "<td style='text-align: center; color: green'><b>Trong tiến trình</b></td>";
                                else
                                    echo "<td style='text-align: center; color: red'><b>Đã giải quyết</b></td>";
                                ?>
                            </tr>
                        
                  <?php } ?>
               
                </tbody>
            </table>
        </div>
        </div>
        
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/js/admin.js"></script>
    <script>
        document.getElementById('floatingDate').min = new Date(new Date().getTime() - new Date().getTimezoneOffset() * 60000).toISOString().split("T")[0];
    </script>
</body>
</html>
