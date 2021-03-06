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
    </style>

    <title>Chi tiết câu hỏi | BVMT</title>
    <link rel="icon" sizes="192x192" href="../../avatarjpg.jpg">
</head>

<body style="background-color: #f3f4f6;">
    <?php
    $active_nav_item = 'service';
    require_once('../navbar.php');
    $questionid = $_GET['id'];
    $sql = "SELECT timestamp, CONCAT(S.LASTNAME,' ',S.FIRSTNAME) AS sname, studentid, title, content
        from question q
        join student s on studentid = s.id
        where q.id = '$questionid'";
    $result = $conn->query($sql);
    $row =  $result->setFetchMode(PDO::FETCH_ASSOC);
    echo
    "<div style='padding-top: 100px; padding-bottom: 100px;' class='px-5'>
            <div class=\"text-center mt-5\">
                <h4>CÂU HỎI - MÃ " . $questionid . "</h4>
            </div>
            <div class=\"row justify-content-between mt-5\">
                <div class=\"col-md-7 mt-5\">
                    <div class=\"row ms-5\">
                    <div class=\"col d-flex justify-content-center\">
                    <div class=\"card\" style=\"width: 90%;\">
                                <div class=\"card-header\">Câu hỏi</div>
                                <div class=\"card-body\">
                                    <div class=\"card-text\">" ?>
    <?php while ($row = $result->fetch()) : ?>
        <div class="">Thời gian: <?php echo htmlspecialchars($row['timestamp']) ?></div>
        <div class="">Tên sinh viên: <?php echo htmlspecialchars($row['sname']) ?></div>
        <div class="">MSSV: <?php echo htmlspecialchars($row['studentid']) ?></div>
        <div class="">Chủ đề: <?php echo htmlspecialchars($row['title']) ?></div>
        <div class="">Nội dung: <?php echo htmlspecialchars($row['content']) ?></div>
    <?php endwhile; ?>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="row mt-5">
        <?php
        $sql = "";
        $sql = "SELECT timestamp, CONCAT(S.LASTNAME,' ',S.FIRSTNAME) AS sname, content
                            FROM answer a
                            join staff s on STUDENTCARESTAFFID = s.id
                            where QUESTIONID = '$questionid'
                            order by timestamp asc";
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        ?>
        <div class="col d-flex justify-content-center">
            <div class="card" style="width: 90%;">
                <div class="card-header">Phản hồi</div>
                <div class="card-body">
                    <div class="card-text">
                        <?php while ($row = $q->fetch()) : ?>
                            <div class="">Thời gian: <?php echo htmlspecialchars($row['timestamp']) ?></div>
                            <div class="">Nhân viên phản hồi: <?php echo htmlspecialchars($row['sname']) ?></div>
                            <div class="">Nội dung: <?php echo htmlspecialchars($row['content']) ?></div></br>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-5 mt-5 d-none d-md-block">
        <img class="align-middle img-fluid" src="../../../assets/images/responsed_counselling.svg" alt="" width="95%">
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/js/main.js"></script>
</body>

<?php
$conn = null;
?>

<footer>
</footer>

</html>