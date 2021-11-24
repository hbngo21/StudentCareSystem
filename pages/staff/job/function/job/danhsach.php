<?php
$sql = "SELECT * FROM jobscholarship_infor";
$query = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../../css/main.css">
    <title>Việc làm</title>

</head>

<body>
    <?php
    require_once '../../navbar.php'
    ?>
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
                            <th>Tên việc làm</th>
                            <th>Thông tin</th>
                            <th>Doanh nghiệp</th>
                            <th>Mã nhân viên CTCT sinh viên</th>
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

                                <td><?php echo $row['TITLE']; ?></td>
                                <td><?php echo $row['CONTENT']; ?></td>
                                <td><?php echo $row['ENTERPRISE']; ?></td>
                                <td><?php echo $row['POLITICAL_STAFFID']; ?></td>
                                <td>
                                    <a href="index.php?page_layout=chitiet&ID=<?php echo $row['ID']; ?> "> Xem chi tiết</a>
                                </td>
                                <td>
                                    <a href="index.php?page_layout=sua&ID=<?php echo $row['ID']; ?> "> Sửa</a>
                                </td>
                                <td>
                                    <a onclick="return Del('<?php echo $row['TITLE']; ?>')" href="index.php?page_layout=xoa&ID=<?php echo $row['ID']; ?>"> Xóa </a>
                                </td>

                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
                <a class="btn " href="index.php?page_layout=them">Thêm mới</a>
            </div>

        </div>
    </div>
    <a class="btn" href="../../vieclam/job.php" style="width:10rem;margin-left:1rem;margin-top:1rem">Hoàn thành</a>
</body>
<script>
    function Del(name) {
        return confirm("Bạn có chắc muốn xóa: " + name + " ?");
    }
</script>

</html>