<?php
  require_once '../../../connection.php';
  $studentid = 40000;
  
  // $sql_req="SELECT * FROM request_services";
  // $query_req=mysqli_query($mysqli,$sql_req);
  $sql_req1="SELECT * FROM request_services where STUDENTID = '$studentid'";
  $query_req1=mysqli_query($mysqli,$sql_req1);
 

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
        .wrapper{
  max-width: 500px;
  width: 100%;
  background: #fff;
  margin:5rem;
  box-shadow: 1px 1px 2px rgba(0,0,0,0.125);
  padding: 30px;
    }   

    .wrapper .title{
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 25px;
  color: #ef9273;
  text-transform: uppercase;
  text-align: center;
    }

    .wrapper .form{
  width: 100%;
    }

    .wrapper .form .inputfield{
  margin-bottom: 15px;
  display: flex;
  align-items: center;
    }

    .wrapper .form .inputfield label{
   width: 200px;
   color: #757575;
   margin-right: 10px;
  font-size: 14px;
    }

    .wrapper .form .inputfield .input,
    .wrapper .form .inputfield .textarea{
  width: 100%;
  outline: none;
  border: 1px solid #d5dbd9;
  font-size: 15px;
  padding: 8px 10px;
  border-radius: 3px;
  transition: all 0.3s ease;
    }

    .wrapper .form .inputfield .textarea{
  width: 100%;
  height: 125px;
  resize: none;
    }

    .wrapper .form .inputfield .custom_select{
  position: relative;
  width: 100%;
  height: 37px;
    }

    .wrapper .form .inputfield .custom_select:before{
  content: "";
  position: absolute;
  top: 12px;
  right: 10px;
  border: 8px solid;
  border-color: #d5dbd9 transparent transparent transparent;
  pointer-events: none;
    }

    .wrapper .form .inputfield .custom_select select{
  -webkit-appearance: none;
  -moz-appearance:   none;
  appearance:        none;
  outline: none;
  width: 100%;
  height: 100%;
  border: 0px;
  padding: 8px 10px;
  font-size: 15px;
  border: 1px solid #d5dbd9;
  border-radius: 3px;
    }


    .wrapper .form .inputfield .input:focus,
    .wrapper .form .inputfield .textarea:focus,
    .wrapper .form .inputfield .custom_select select:focus{
    border: 1px solid #ef9273;
    }






    .wrapper .form .inputfield .btn{
    width: 100%;
    padding: 8px 10px;
    font-size: 15px; 
    border: 1px solid #ef9273;
    background: #fff;
    color: #ef9273;
    cursor: pointer;
    
    border-radius: 3px;
    outline: none;
    }

    .wrapper .form .inputfield .btn:hover{
    background: #ef9273;
    color:#fff;
    }

    .wrapper .form .inputfield:last-child{
    margin-bottom: 0;
    }

    @media (max-width:420px) {
    .wrapper .form .inputfield{
        flex-direction: column;
        align-items: flex-start;
    }
    .wrapper .form .inputfield label{
        margin-bottom: 5px;
    }
    .wrapper .form .inputfield.terms{
        flex-direction: row;
    }
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
    <div class="col-6">
<div class="wrapper" >
        <div class="title">
        Đơn yêu cầu dịch vụ
        </div>
    <form action="" method="POST">
        <div class="form">
            <!-- <div class="inputfield">
                <label>MSSV</label>
                <input type="text" class="input"name="mssv" required>
            </div>  -->
            <div class="inputfield">
                <label>Yêu cầu</label>
        
              <select name="id" required>
                <option selected disabled value="">Chọn yêu cầu dịch vụ</option>
                <option value="1">In bảng điểm học tập</option>
                <option value="2">Đăng kí in điểm rèn luyện</option>
                <option value="3">Đăng kí in giấy xác nhận Sinh viên </option>
                <option value="4">Đăng kí in thẻ Sinh viên</option>
                <option value="5">Đăng kí in miễn học GDQP,GDTC</option>
                <option value="6">Đăng kí chuyển điểm Anh Văn</option>

              </select>
      
            </div> 
            <div class="inputfield">
                <label>Nội dung</label>
                <input type="text" class="input" name="content" required>
           
            </div>
            <div class="inputfield">
                
                <input type="submit" class="btn" name="submit">
                <?php 
                 if (isset($_POST['submit'])){
    
                  date_default_timezone_set("Asia/Ho_Chi_Minh");
                  $time_stamp = date("Y-m-d H:i:s");
                  $ID=$_POST['id'];
                  $content = $_POST['content'];
            
                  $sql = "INSERT INTO request_services(STUDENTID, TIMESTAMP, ID,CONTENT) 
                          VALUES (?,?,?,?)";
                  if ($stmt = $mysqli->prepare($sql)) {
                    $stmt->bind_param("ssss", $param_studentid, $param_timestamp,$param_id, $param_content);
                    $param_studentid = $studentid;
                    $param_timestamp = $time_stamp;
                    
                    $param_id=$ID;
                    $param_content = $content;
                    if ($stmt->execute()) {
                        header("Location: form1.php");
                    } else {
                        echo $stmt->error;
                    }
                  }
              }
              ?>
            </div>
        </div>
    </form>
</div>	
</div>
<div class="">
<div class="card">
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
                        while($row = mysqli_fetch_assoc($query_req1)){ ?>
                            
                            <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['STUDENTID']; ?></td>
                            <td><?php echo date("d-m-Y H:i:s", strtotime($row['TIMESTAMP'])) ?></td>
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
