<?php
$sql = "SELECT * FROM incentivescholarship_result";
$query = mysqli_query($connect, $sql);
session_start();
if (isset($_SESSION['staff'])) {
    $logined = true;
    $staffid = $_SESSION['staff'];
} else $logined = false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../../css/main.css">
    <title>Danh sách học bổng</title>
</head>

<body>
    <div class="container-fluid" style="margin-top:7rem">
        <div class="card">
            <div class="card-header">
                <h2>Các học bổng</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Tên học bổng</th>
                            <th>Thông tin</th>
                            <th>Học kì</th>
                            <th>Mã nhân viên phòng đào tạo</th>
                            <th>Xem chi tiết</th>
                            <th> Sửa </th>
                            <th> Xóa</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($query)) { ?>

                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['NAME']; ?></td>
                                <td><?php echo $row['INFORMATION']; ?></td>
                                <td><?php echo $row['SEMESTERCODE']; ?></td>
                                <td><?php echo $row['TRAININGDEPARTMENT_STAFFID']; ?></td>
                                <td>
                                    <a href="index.php?page_layout=chitiet&NAME=<?php echo $row['NAME']; ?> "> Xem chi tiết</a>
                                </td>
                                <td>
                                    <a href="index.php?page_layout=sua&NAME=<?php echo $row['NAME']; ?> "> Sửa</a>
                                </td>
                                <td>
                                    <a onclick="return Del('<?php echo $row['NAME']; ?>')" href="index.php?page_layout=xoa&NAME=<?php echo $row['NAME']; ?>"> Xóa </a>
                                </td>

                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
                <a class="btn " href="index.php?page_layout=them">Thêm mới</a>
            </div>

        </div>
    </div>
    <a class="btn" href="../../hocbong/schoolar.php" style="width:10rem;margin-left:1rem;margin-top:1rem">Hoàn thành</a>
</body>
<script>
    function Del(name) {
        return confirm("Bạn có chắc muốn xóa: " + name + " ?");
    }
</script>

</html>