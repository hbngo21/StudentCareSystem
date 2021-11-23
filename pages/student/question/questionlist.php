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

    <title>Danh sách câu hỏi | BVMT</title>
    <link rel="icon" sizes="192x192" href="../../avatarjpg.jpg">
</head>

<body style="background-color: #f3f4f6;">
    <?php
        require_once('../navbar.php')
    ?>
    <div style="padding: 100px;">
      <div class="row mt-5 justify-content-between">
            <div class="col-6">
                <h4 style="margin-bottom: 30px;">HỎI ĐÁP</h4>
            </div>
            <div class="col-xs-3">
            <form class="form-inline col-12" action="" method="get">
                <div class="form-group mx-sm-3 mb-2">
                    <a class="text-decoration-none" href="./asking.php">
                    <button type="button" class="btn main-btn mx-sm-3">
                    Đặt câu hỏi
                    </button></a>
                    <select class="form-control" name="isanswered">
                        <option value="">Tất cả</option>
                        <option value="answered">Đã trả lời</option>
                        <option value="notanswered">Chưa trả lời</option>
                    </select>
                </div>
                <input class="btn mb-2" type="submit" name="ok" value="Lọc">
            </form>
            </div>
        </div>
    <!--  -->
        <div id="content" class="col-12">
        <?php
            if (!isset($_GET['action'])) {
                $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5;
                $current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
                $offset = ($current_page - 1) * $item_per_page;
                $totalRecords = $conn->query("SELECT * FROM question");
                $totalRecords = $totalRecords->rowCount();
                $totalPages = ceil($totalRecords / $item_per_page);
            }
            // TEST
            $studentid = '11111';
            // TEST
            if (empty($isanswered)) {
                $sql = "SELECT id, timestamp, title, type FROM question
                where studentid = '$studentid' 
                order by timestamp asc
                LIMIT ". $offset. ", ".$item_per_page.";";
            }
            if (isset($_REQUEST['ok'])) {
                $isanswered = addslashes($_GET['isanswered']);
                if (empty($isanswered)){
                    $sql = "SELECT id, timestamp, title, type FROM question
                    where studentid = '$studentid' 
                    order by timestamp asc
                    LIMIT ". $offset. ", ".$item_per_page.";";
                }
                else if ($isanswered == "notanswered"){
                    $sql = "SELECT id, timestamp, title, type FROM question
                    where studentid = '$studentid' 
                    and ID NOT IN(
                        SELECT QUESTIONID FROM ANSWER
                        )
                    order by timestamp asc
                    LIMIT ". $offset. ", ".$item_per_page.";";
                }
                else{
                    $sql = "SELECT id, timestamp, title, type FROM question
                    where studentid = '$studentid' 
                    and ID IN(
                        SELECT QUESTIONID FROM ANSWER
                        )
                    order by timestamp asc
                    LIMIT ". $offset. ", ".$item_per_page.";";
                }
            }
            $q = $conn->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $resultCheck = $q->rowCount();
        ?>
        <div class="col-12" style="">
            <?php
                if ($resultCheck > 0){
                    echo "<table
                    id='table1'
                    class='table table-bordered table-hover align-middle'
                    style='margin-left: auto; margin-right: auto;'
                    >
                    <thead>
                    <tr>
                        <th class = 'align-middle' style='text-align: center'>Thời gian</th>
                        <th class = 'align-middle' style='text-align: center'>Chủ đề</th>
                        <th class = 'align-middle' style='text-align: center'>Loại</th>
                    </tr>
                    </thead>";
                    while ($row = $q->fetch()){
                        echo "<tbody>
                        <tr>";
                        echo "<td style='text-align: center'>" . date("d-m-Y H:i:s", strtotime($row['timestamp'])) . "</td>";
                        echo "<td style='text-align: center'>
                        <a class='text-decoration-none' class='nav-link' href='./moredetailquestion.php?id=". $row['id']. "'>" . $row['title'] . "</a></td>";
                        switch ($row['type']){
                            case 'medical':
                                echo "<td class='align-middle' style='text-align: center'> Y tế </td>";
                                break;
                            case 'trainingdepartment':
                                echo "<td class='align-middle' style='text-align: center'> Công tác - Chính trị Sinh viên </td>";
                                break;
                            case 'political':
                                echo "<td class='align-middle' style='text-align: center'> Đào tạo </td>";
                                break;
                        echo "</tr>
                        </tbody>";
                        }
                    }
                }
            ?>
                    </table>
        <?php
            include './pagination.php';
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/js/admin.js"></script>
</body>

<?php
    $conn = null;
?>

<footer>

</footer>
</html>
