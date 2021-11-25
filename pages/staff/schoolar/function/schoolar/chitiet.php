<?php
$name = $_GET['NAME'];

$sql = "SELECT* FROM incentivescholarship_result WHERE NAME= '$name'";

$query = mysqli_query($connect, $sql);
$result = mysqli_fetch_array($query);
?>
<title> Sửa thông tin học bổng</title>
<link rel="stylesheet" href="../../../../css/main.css">

<div class="container-fluid" style="margin-top:7rem">
    <div class="card">
        <div class="card-header">
            <h2> <?= $name ?> </h2>
        </div>
        <div class="card-body">
            <p> <?php echo $result['INFORMATION']; ?></p>
        </div>
    </div>

</div>
<a class="btn" href="../../schoolar/function" style="width:10rem;margin-left:1rem;margin-top:1rem">Quay lại</a>