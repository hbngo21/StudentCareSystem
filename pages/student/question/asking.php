<?php
require_once 'connect.php';
 
try {
    $conn = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
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

    <!-- css -->
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

    <title>Đặt câu hỏi | BVMT</title>
    <link rel="icon" sizes="192x192" href="../../avatarjpg.jpg">
</head>

<body style="background-color: #f3f4f6;">
    <?php
        require_once('../navbar.php')
    ?>
    <div style="padding: 100px;">
      <div class="text-center mt-5">
        <h4>BẠN ĐANG GẶP KHÓ KHĂN VỀ VẤN ĐỀ SỨC KHỎE, TÂM LÝ?</h4>
        <h4>HÃY ĐIỀN ĐƠN ĐĂNG KÝ ĐỂ ĐƯỢC GẶP TƯ VẤN VIÊN.</h4>
        <h4>CHÚNG TÔI LUÔN Ở ĐÂY ĐỂ HỖ TRỢ BẠN.</h4>
      </div>
      <div class="row justify-content-between mt-5">
        <div class="col-6">
          <img src="../../../assets/images/asking.svg" alt="" width="95%">
        </div>
        <div class="col-6 mt-5">
          <form method="POST" style="width: 500px; margin: auto;">
            <div class="form-group mb-3">
                <label for="type">Loại:</label>
                <select class="form-control" name="type" aria-label="Floating label select example" required>
                    <option selected disabled value="">Vui lòng chọn</option>
                    <option value="political">Công tác - Chính trị Sinh viên</option>
                    <option value="trainingdepartment">Đào tạo</option>
                    <option value="medical">Y tế</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="title">Chủ đề:</label>
                <input class="form-control" name="title">
            </div>
            <div class="form-group">
                <label for="content">Nội dung:</label></br>
                <textarea class="form-control" name="content" style="height: 100px" required></textarea>
            </div>
            <div class="d-flex justify-content-center">
              <div class="col text-center">
                <button type="submit" class="row btn mt-4" name="send">
                  Đặt câu hỏi
                  <i class="fas fa-paper-plane"></i>
                </button>
                <?php
                    // TEST
                    $studentid = '11111';
                    // TEST
                    if (isset($_REQUEST['send'])){
                        $content  = $_POST['content'];
                        date_default_timezone_set("Asia/Ho_Chi_Minh");
                        $timestamp = date('Y-m-d H:i:s');
                        $type = $_POST['type'];
                        $title = $_POST['title'];
                        $sql = "INSERT INTO QUESTION (STUDENTID, TIMESTAMP, TYPE, TITLE, CONTENT) 
                        VALUES (:STUDENTID, :TIMESTAMP, :TYPE, :TITLE, :CONTENT)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':STUDENTID', $studentid);
                        $stmt->bindParam(':TIMESTAMP', $timestamp);
                        $stmt->bindParam(':TYPE', $type);
                        $stmt->bindParam(':TITLE', $title);
                        $stmt->bindParam(':CONTENT', $content);
                        if ($stmt->execute()) {
                            echo "<div class='row mt-3' style='color: red;'><b> <script>
                            alert('Gửi yêu cầu thành công!');
                            window.location.href = 'questionList.php';
                            </script>;</b></div>";
                        } else {
                            echo $stmt->error;
                        }
                    }
                ?>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div> 
</body>

<?php
    $conn = null;
?>

<footer>

</footer>
</html>