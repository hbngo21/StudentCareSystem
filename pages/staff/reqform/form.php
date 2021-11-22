<?php
  require_once '../../../connection.php';
  $studentid = 90000;
  
  $sql_req="SELECT * FROM request_services";
  $query_req=mysqli_query($mysqli,$sql_req);
//   $sql_req1="SELECT * FROM request_services where STUDENTID = '$studentid'";
//   $query_req1=mysqli_query($mysqli,$sql_req1);
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
    

<div class="container" >
        <div class="card" >
        <div class="card-header">
            <h2>Các yêu cầu đã đăng ký</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Student ID</th>
                        <th>TimeStamp</th>
                        <th>ID</th>
                        <th>Content</th>
                        <th>TrainingdepartmentStaffID</th>
                        <th>Status</th>
                        <th>Xem chi tiết</th>
              
             
                         
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                        while($row = mysqli_fetch_assoc($query_req)){ ?>
                            
                            <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['STUDENTID']; ?></td>
                            <td><?php echo $row['TIMESTAMP']; ?></td>
                            <td><?php echo $row['ID']; ?></td>
                            <td><?php echo $row['CONTENT']; ?></td>
                            <td><?php echo $row['TRAININGDEPARTMENT_STAFFID']; ?></td>
                            <td><?php echo $row['STATUS']; ?></td>
                            
                            <td> 
                                <a href="chitiet.php?STUDENTID=<?php echo $row['STUDENTID'];?>"> Xem chi tiết</a> 
                            </td>


                            </tr>
                        
                  <?php } ?>
               
                </tbody>
            </table>
           
        </div>
        
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/js/admin.js"></script>
    <script>document.getElementById('floatingDate').min = new Date(new Date().getTime() - new Date().getTimezoneOffset() * 60000).toISOString().split("T")[0];</script>
</body>
</html>
