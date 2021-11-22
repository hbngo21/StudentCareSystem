<?php
require_once '../../../connection.php';
$studentid = 20000;
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
      <div class="text-center mt-5">
        <h4>ĐỂ CHẤT LƯỢNG HỆ THỐNG NGÀY CÀNG ĐƯỢC NÂNG CAO,</h4>
        <h4>CHÚNG TÔI RẤT CẦN NHỮNG PHẢN HỒI TỪ CÁC BẠN.</h4>
        <h4>VUI LÒNG ĐIỀN VÀO FORM DƯỚI ĐÂY ĐỂ GỬI PHẢN HỒI.</h4>
      </div>
      <div class= "row justify-content-between mt-5">
        <div class="col-6">
          <img src="../../../assets/images/feedback.svg" alt="" width="90%">
        </div>
        <div class="col-6">
          <form method="POST" style="width: 500px; margin: auto;">
            <div class="form-floating mb-3 mt-5">
                <label for="floatingInput">Tiêu đề</label>
                <input type="text" name='title' class="form-control" id="floatingInput" placeholder="Vui lòng nhập tiêu đề phản hồi" required>
            </div>
            <div class="form-floating">
                <label for="floatingTextarea">Nội dung phản hồi</label>
                <textarea class="form-control" name='content' placeholder="Vui lòng nhập nội dung phản hồi" id="floatingTextarea" style="height: 150px" required></textarea>
            </div>
            <div class="d-flex justify-content-center">
                <div class="col text-center">
                <button type="submit" class="row btn mt-4" name='send'>
                  Gửi phản hồi
                  <i class="fas fa-paper-plane"></i>
                </button>
                <?php
                    if (isset($_REQUEST['send'])){
                        date_default_timezone_set("Asia/Ho_Chi_Minh");
                        $time_stamp = date("Y-m-d H:i:s");
                        $title = $_POST['title'];
                        $content = $_POST['content'];

                        $sql = "INSERT INTO FEEDBACK(STUDENTID, TIMESTAMP, TITLE, CONTENT) 
                                VALUES (?, ?, ?, ?)";
                        if ($stmt = $mysqli->prepare($sql)) {
                          $stmt->bind_param("ssss", $param_id, $param_timestamp, $param_title, $param_content);
                          $param_id = $studentid;
                          $param_timestamp = $time_stamp;
                          $param_title = $title;
                          $param_content = $content;
                          if ($stmt->execute()) {
                              echo "<div class='row mt-3' style='color: red;'><b>Gửi phản hồi thành công!</b></div>";
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
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/js/admin.js"></script>
  </body>
  <script>
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')

        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
            })
        })()
  </script>
</html>
