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

if (isset($_REQUEST['ok'])) {
    $filter_isanswered = addslashes($_GET['isanswered']);
    if (empty($filter_isanswered)) $filter_isanswered = '';
} else {
    $filter_isanswered = '';
};
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
            cursor: pointer;
        }

        .page-item {
            padding: 5px 10px;
            color: #d00000;
            background-color: #fff;

            border-radius: 2px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        }

        .page-item:hover {
            color: #370617;
            text-decoration: none;
        }

        .current-page {
            background-color: #d00000;
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
                font-size: 1.5rem;
            }
        }
    </style>

    <title>Danh sách câu hỏi</title>
</head>

<body style="background-color: #f3f4f6;">
    <?php
    $active_nav_item = 'service';
    require_once('../navbar.php');
    ?>
    <div style="padding-top: 100px; padding-bottom: 100px;" class="px-5">
        <div class="row mt-5">
            <div class="col-md-6">
                <h4>HỎI ĐÁP</h4>
            </div>
            <form class="col-md-6 mb-2 d-flex justify-content-end" action="" method="get">
                <a class="text-decoration-none btn mb-2" href="./asking.php">
                    Đặt câu hỏi
                </a>
                <select class="form-control mx-2" name="isanswered" style="width: 30%;">
                    <option value="" <?= $filter_isanswered == '' ? 'selected' : '' ?>>Tất cả</option>
                    <option value="answered" <?= $filter_isanswered == 'answered' ? 'selected' : '' ?>>Đã trả lời</option>
                    <option value="notanswered" <?= $filter_isanswered == 'notanswered' ? 'selected' : '' ?>>Chưa trả lời</option>
                </select>
                <input class="btn mb-2" type="submit" name="ok" value="Lọc">
            </form>
        </div>
        <!--Table content   -->
        <div id="content">
            <?php
            if (!isset($_GET['action'])) {
                $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
                $current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
                $offset = ($current_page - 1) * $item_per_page;
            }
            if (empty($isanswered)) {
                $totalRecords = $conn->query("SELECT * FROM question where studentid = '$studentid'");
                $sql = "SELECT id, timestamp, title, type FROM question
                where studentid = '$studentid' 
                order by timestamp desc
                LIMIT " . $offset . ", " . $item_per_page . ";";
            }
            if (isset($_REQUEST['ok'])) {
                $isanswered = addslashes($_GET['isanswered']);
                if (empty($isanswered)) {
                    $totalRecords = $conn->query("SELECT * FROM question where studentid = '$studentid'");
                    $sql = "SELECT id, timestamp, title, type FROM question
                    where studentid = '$studentid' 
                    order by timestamp desc
                    LIMIT " . $offset . ", " . $item_per_page . ";";
                } else if ($isanswered == "notanswered") {
                    $totalRecords = $conn->query("SELECT * FROM question where studentid = '$studentid' 
                    and ID NOT IN(
                        SELECT QUESTIONID FROM ANSWER
                        )");
                    $sql = "SELECT id, timestamp, title, type FROM question
                    where studentid = '$studentid' 
                    and ID NOT IN(
                        SELECT QUESTIONID FROM ANSWER
                        )
                    order by timestamp desc
                    LIMIT " . $offset . ", " . $item_per_page . ";";
                } else {
                    $totalRecords = $conn->query("SELECT * FROM question where studentid = '$studentid' 
                    and ID IN(
                        SELECT QUESTIONID FROM ANSWER
                        )");
                    $sql = "SELECT id, timestamp, title, type FROM question
                    where studentid = '$studentid' 
                    and ID IN(
                        SELECT QUESTIONID FROM ANSWER
                        )
                    order by timestamp desc
                    LIMIT " . $offset . ", " . $item_per_page . ";";
                }
            }
            $totalRecords = $totalRecords->rowCount();
            $totalPages = ceil($totalRecords / $item_per_page);
            $q = $conn->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $resultCheck = $q->rowCount();
            ?>
            <?php
            if ($resultCheck > 0) {
                echo "<div style='overflow-x:auto;'><table
                    id='lst_xetccnn'
                    class='table table-bordered table-hover align-middle'
                    style='width: 100%;'
                  >
                    <thead>
                    <tr>
                        <th class = 'align-middle' style='text-align: center'>Thời gian</th>
                        <th class = 'align-middle' style='text-align: center'>Chủ đề</th>
                        <th class = 'align-middle' style='text-align: center'>Loại</th>
                    </tr>
                    </thead>";
                while ($row = $q->fetch()) {
                    echo "<tbody>
                        <tr>";
                    echo "<td style='text-align: center'>" . htmlspecialchars($row['timestamp']) . "</td>";
                    echo "<td style='text-align: center'>
                        <a href='./moredetailquestion.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></td>";
                    switch ($row['type']) {
                        case 'medical':
                            echo "<td class='align-middle' style='text-align: center'> Y tế </td>";
                            break;
                        case 'political':
                            echo "<td class='align-middle' style='text-align: center'> Công tác - Chính trị Sinh viên </td>";
                            break;
                        case 'trainingdepartment':
                            echo "<td class='align-middle' style='text-align: center'> Đào tạo </td>";
                            break;
                    }
                    echo "</tr>
                        </tbody>";
                }
            }
            ?>
            </table>
        </div>
        <?php
        include '../pagination.php';
        ?>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="/js/admin.js"></script>
</body>

<?php
$conn = null;
?>

</html>