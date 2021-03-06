<?php
require_once '../../../connection.php';
// Login information
session_start();
if (isset($_SESSION['staff'])) {
    $logined = true;
    $staffid = $_SESSION['staff'];
} else $logined = false;

$name = $_GET['NAME'];
$sql = "SELECT *  FROM incentivescholarship_result WHERE NAME= '$name'";
$query = mysqli_query($mysqli, $sql);
$result = mysqli_fetch_array($query);

$sql_staff = "SELECT concat(lastname,' ',firstname)as name_staff 
    FROM incentivescholarship_result a join staff b on a.TRAININGDEPARTMENT_STAFFID = b.ID 
    WHERE NAME='$name'";
$query_staff = mysqli_query($mysqli, $sql_staff);
$result_staff = mysqli_fetch_array($query_staff);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../../css/main.css">
    <title>Chi tiết học bổng</title>
    <style>
        .container-fluid {
            margin-top: 5rem;
        }

        .card {
            border-radius: 50px;

        }

        /* .card-header{
        background-color:#blanchedalmond;
        border:1px solid #ef9273;
        border-radius:50px;
        } */
        .card-body {
            background-color: blanchedalmond;
            border: 1px solid #d00000;
            border-radius: 5px;
            height: 10rem;
        }

        body {
            padding-top: 3rem;
            padding-bottom: 3rem;

        }

        main {
            margin-top: 3rem;
            margin-left: 3rem;
        }

        #breadcrumb a,
        ol {
            font-size: 30px;
            text-decoration: none;
            color: #d00000;
        }

        .card {
            max-width: 100%;
            /* height:200px; */

        }

        .card h-100 {
            height: 500px;
        }

        /* .card img{
      text-align: center;
  } */
        /* .cart-list card{
      margin:0 auto;

  } */
        .col {
            text-decoration: none;
            color: black;
        }

        .col:hover,
        .col:active,
        .col:focus,
        .col.active {
            text-decoration: none;
            color: #d00000;
        }

        .btn-toolbar {
            margin-top: 10px;
            justify-content: flex-end;
        }

        .btn-outline-secondary:hover,
        .btn-outline-secondary:active,
        .btn-outline-secondary:focus,
        .btn-outline-secondary.active {
            background-color: #d00000;
            color: #fff;
        }
    </style>
</head>

<body>
    <header>

        <?php $active_nav_item = 'home';
        require_once("../navbar.php"); ?>

    </header>
    <main>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb" id="breadcrumb">

                <li class="breadcrumb-item"><a href="../mainpage/mainpage.php">Home</a></li>
                <li class="breadcrumb-item " aria-current="page"><a href="../hocbong/schoolar.php">Học bổng</a></li>
                <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
            </ol>
        </nav>
        <div class="row event__detail" style="margin-left:-0.1rem;margin-top:3rem">
            <div class="col-md-4 pt-2"><img src="http://bestbengal.info/wp-content/uploads/2020/06/scholarships-647_010217052513.jpg" class="img-fluid rounded b-shadow-a" width="100%" alt=""></div>
            <div class="col-md-8 pt-2">
                <div class="event__detail__title mt-2"><span><?= $name ?></span>

                </div>
                <div class="mt-2">

                    <div class="event__item-info mt-1"><i class="fas fa-user-edit">
                        </i><span>Nhân viên tạo: <?php echo $result_staff['name_staff']; ?> </span></div>
                    <div class="event__item-info mt-1"><i class="far fa-users"></i><span>Học kì: <?php echo $result['SEMESTERCODE']; ?> </span></div>
                </div>
                <div class="mt-3">
                    <h4>Nội dung:</h4>
                    <?php echo $result['INFORMATION']; ?>
                </div>
                <a href="../hocbong/schoolar.php" type='button' class='btn' style='width: 100px;margin-top:5rem'>Quay lại</a>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/js/admin.js"></script>
</body>

</html>