<?php
require_once '../../../connection.php';
// Login information
session_start();
if (isset($_SESSION['staff'])) {
    $logined = true;
    $staffid = $_SESSION['staff'];
} else $logined = false;

if (isset($_REQUEST['ok'])) {
    $filter_status = $_POST['filter'];
} else {
    $filter_status = '';
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

    <!-- user.css -->
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
    <title>Yêu cầu dịch vụ</title>
</head>

<body>
    <!-- mainNav -->
    <?php
    $active_nav_item = 'service';
    require_once("../navbar.php");
    ?>
    <div class="banner text-center">
        Các yêu cầu dịch vụ của sinh viên
    </div>
    <div style="padding-bottom: 100px; margin-left: 30px; margin-right: 30px;" class="px-5">
        <div class="row mt-5 justify-content-between">
            <div class="col-6">
                <h4 style="margin-bottom: 30px">CHI TIẾT</h4>
            </div>
            <div class="col-xs-3">
                <form class="form-inline" method="POST">
                    <div class="form-group mx-sm-3 mb-2">
                        <select class="form-control" name="filter">
                            <option value="all" <?= $filter_status == '' ? 'selected' : '' ?>>Hiển thị tất cả</option>
                            <option value="waiting" <?= $filter_status == 'waiting' ? 'selected' : '' ?>>Yêu cầu chờ xác nhận</option>
                            <option value="confirm" <?= $filter_status == 'confirm' ? 'selected' : '' ?>>Yêu cầu trong tiến trình</option>
                            <option value="done" <?= $filter_status == 'done' ? 'selected' : '' ?>>Yêu cầu đã giải quyết</option>
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
                $sql = "SELECT * FROM request_services ORDER BY TIMESTAMP DESC LIMIT " . $offset . ", " . $item_per_page . ";";
                $totalRecords = $mysqli->query("SELECT * FROM request_services");
            }
            if (isset($_REQUEST['ok'])) {
                if ($_POST['filter'] == 'all') {
                    $sql = "SELECT * FROM request_services ORDER BY TIMESTAMP DESC ";
                    $totalRecords = $mysqli->query("SELECT * FROM request_services");
                } elseif ($_POST['filter'] == 'waiting') {
                    $sql = "SELECT * FROM request_services WHERE TRAININGDEPARTMENT_STAFFID IS NULL ORDER BY TIMESTAMP DESC ";
                    $totalRecords = $mysqli->query("SELECT * FROM request_services WHERE TRAININGDEPARTMENT_STAFFID IS NULL");
                } elseif ($_POST['filter'] == 'confirm') {
                    $sql = "SELECT * FROM request_services WHERE STATUS = 'In Progress' ORDER BY TIMESTAMP DESC";
                    $totalRecords = $mysqli->query("SELECT * FROM request_services WHERE STATUS = 'In Progress'");
                } else {
                    $sql = "SELECT * FROM request_services WHERE STATUS = 'Completed' ORDER BY TIMESTAMP DESC ";
                    $totalRecords = $mysqli->query("SELECT * FROM request_services WHERE  STATUS = 'Completed'");
                }
            }
            $totalRecords = $totalRecords->num_rows;
            $totalPages = ceil($totalRecords / $item_per_page);
            $result = $mysqli->query($sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
                echo "<table
                    id='table1'
                    class='table table-bordered table-hover align-middle'
                    style='margin-left: auto; margin-right: auto;'
                  >
                    <thead>
                      <tr>
                      <th class = 'align-middle' style='text-align: center'>#</th>
                      <th class = 'align-middle' style='text-align: center'>Mã số Sinh viên</th>
                      <th onClick='sortTable(2)' class = 'align-middle' style='text-align: center'>Thời gian yêu cầu</th>
                      <th onClick='sortTable(3)' class = 'align-middle' style='text-align: center'>Loại yêu cầu</th>
                      <th onClick='sortTable(4)' class = 'align-middle' style='text-align: center'>Nhân viên thực hiện</th>
                      <th onClick='sortTable(5)' class = 'align-middle' style='text-align: center'>Tình trạng</th>
                      </tr>
                    </thead>";
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tbody>
                        <tr>";
                    echo "<td style='text-align: center'>" . $i++ . "</td>";
                    $sql3 = "SELECT CONCAT(LASTNAME,' ',FIRSTNAME) AS NAME FROM STUDENT WHERE ID =" . $row['STUDENTID'] . "";
                    $result3 = $mysqli->query($sql3);
                    echo "<td style='text-align: center'>" . mysqli_fetch_assoc($result3)['NAME'] . "</td>";
                    echo "<td style='text-align: center'>" . date("d-m-Y H:i:s", strtotime($row['TIMESTAMP'])) . "</td>";
                    echo "<td style='text-align: center'>";
                    if ($row['STATUS'] != 'Completed') {
                        echo "<a class='text-decoration-none' href='./detail.php?studentid=" . $row['STUDENTID'] . "&timestamp=" . $row['TIMESTAMP'] . "'>";
                    }
                    switch ($row['ID']) {
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
                    if (!empty($row['TRAININGDEPARTMENT_STAFFID'])) {
                        $sql2 = "SELECT CONCAT(LASTNAME,' ',FIRSTNAME) AS NAME FROM STAFF WHERE ID =" . $row['TRAININGDEPARTMENT_STAFFID'] . "";
                        $result2 = $mysqli->query($sql2);
                        echo "<td style='text-align: center'>" . mysqli_fetch_assoc($result2)['NAME'] . "</td>";
                    } else echo "<td style='text-align: center'> </td>";

                    if ($row['STATUS'] == 'Waiting')
                        echo "<td style='text-align: center; color: red'><b>Chờ xác nhận</b></td>";
                    elseif ($row['STATUS'] == 'In Progress')
                        echo "<td style='text-align: center; color: rgb(233, 205, 44)'><b>Trong tiến trình</b></td>";
                    else
                        echo "<td style='text-align: center; color: green'><b>Đã giải quyết</b></td>";



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
        <script>
            function sortTable(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("table1");
            switching = true;
            // Set the sorting direction to ascending:
            dir = "asc";
            /* Make a loop that will continue until
            no switching has been done: */
            while (switching) {
                // Start by saying: no switching is done:
                switching = false;
                rows = table.rows;
                /* Loop through all table rows (except the
                first, which contains table headers): */
                for (i = 1; i < (rows.length - 1); i++) {
                // Start by saying there should be no switching:
                shouldSwitch = false;
                /* Get the two elements you want to compare,
                one from current row and one from the next: */
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                /* Check if the two rows should switch place,
                based on the direction, asc or desc: */
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                    }
                }
                }
                if (shouldSwitch) {
                /* If a switch has been marked, make the switch
                and mark that a switch has been done: */
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                // Each time a switch is done, increase this count by 1:
                switchcount ++;
                } else {
                /* If no switching has been done AND the direction is "asc",
                set the direction to "desc" and run the while loop again. */
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
                }
            }
            }
            </script>
</body>

</html>