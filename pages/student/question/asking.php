<?php
require_once '../../../connect.php';
require_once '../../../connection.php';

try {
    $conn = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
session_start();
if (isset($_SESSION['student'])) {
    $logined = true;
    $studentid = $_SESSION['student'];
} else $logined = false;
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
        .banner {
      height: 200px;
      margin: 100px 30px 3rem;

      /* Display */
      display: flex;
      justify-content: center;
      align-items: center;

      font-size: 1.8rem;
      font-weight: 500;

      color: var(--text);

      background-color: white;
      border-radius: 1rem;
      box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }

    @media only screen and (max-width: 540px) {
      .banner {
        font-size: 1.1rem;
      }
    }
    </style>

    <title>?????t c??u h???i</title>
    <link rel="icon" sizes="192x192" href="../../avatarjpg.jpg">
</head>

<body style="background-color: #f3f4f6;">
    <?php
    $active_nav_item = 'service';
    require_once('../navbar.php');
    ?>
    <div class="banner text-center">
        B???n ??ang g???p kh?? kh??n v??? v???n ????? s???c kh???e, t??m l???<br>
        H??y ??i???n ????n ????ng k?? ????? g???p ???????c t?? v???n vi??n.<br>
        Ch??ng t??i lu??n ??? ????y ????? h??? tr??? b???n.
    </div>
    <div style="padding-bottom: 100px;" class="px-5">
        <div class="row mt-5">
            <div class="col-md-6">
                <img src="../../../assets/images/asking.svg" alt="" width="95%">
            </div>
            <div class="col-md-6 mt-5">
                <form method="POST" style="width: 100%; max-width: 500px; margin: auto;">
                    <div class="form-group mb-3">
                        <label for="type">Lo???i:</label>
                        <select class="form-control" name="type" aria-label="Floating label select example" required>
                            <option selected disabled value="">Vui l??ng ch???n</option>
                            <option value="political">C??ng t??c - Ch??nh tr??? Sinh vi??n</option>
                            <option value="trainingdepartment">????o t???o</option>
                            <option value="medical">Y t???</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="title">Ch??? ?????:</label>
                        <input class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="content">N???i dung:</label></br>
                        <textarea class="form-control" name="content" style="height: 100px" required></textarea>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="col text-center">
                            <button type="submit" class="row btn mt-4" name="send">
                                ?????t c??u h???i
                                <i class="fas fa-paper-plane"></i>
                            </button>
                            <?php
                            if (isset($_REQUEST['send'])) {
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
                            alert('G???i y??u c???u th??nh c??ng!');
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/js/main.js"></script>
</body>

<?php
$conn = null;
?>

</html>