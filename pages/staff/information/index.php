<?php
require_once '../../../connection.php';
// Login information
session_start();
if (isset($_SESSION['staff'])) {
    $logined = true;
    $staffid = $_SESSION['staff'];
} else $logined = false;


$sql = "SELECT *, concat(lastname,' ',firstname) as fullname 
        FROM staff WHERE ID='$staffid'";
$query = mysqli_query($mysqli, $sql);
$result = mysqli_fetch_array($query);
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
    <style>
        body {
            margin-top: 20px;
        }

        .container {
            margin-top: 5rem;
        }

        .main {
            padding: 15px;
            font-family: sans-serif;
        }

        .topbar {
            background-color: teal;
            overflow: hidden;
        }

        .topbar a {
            float: right;
            color: whitesmoke;
            text-align: center;
            padding: 20px 26px;
            text-decoration: none;
            font-size: 26px;
        }

        .sidebar {
            background-color: #ef9273;
            color: white;
            height: 100%;
        }

        .sidebar a {
            margin-left: 10px;
            display: block;
            color: white;
            padding-bottom: 10px;
            font-size: 30px;
            text-decoration: none;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .content {
            background-color: whitesmoke;
        }
    </style>
    <title>Thông tin nhân viên</title>
</head>

<body>
    <?php $active_nav_item = '';
    require_once("../navbar.php"); ?>
    <main>
        <div class="container">
            <div class="main">

                <div class="row">
                    <div class="col-md-4 mt-1">
                        <div class="card text-center sidebar">
                            <div class="card-body">
                                <img src="https://cdn2.vectorstock.com/i/1000x1000/20/76/man-avatar-profile-vector-21372076.jpg" class="rounded-circle" width="150" alt="">
                                <div class="mt-3">
                                    <h3> <?php echo  $result['fullname']; ?> </h3>
                                    <h3>#<?php echo  $result['ID']; ?> </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 mt-1">
                        <div class="card mb-3 content">
                            <h1 class="m-3 pt-3">Thông tin cá nhân</h1>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Họ và tên</h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        <?php echo  $result['fullname']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Chức vụ</h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        <?php
                                        //Get typeOfStaff
                                        $sql = "select typeOfStaff('" . $staffid . "')";

                                        if ($stmt = $mysqli->prepare($sql)) {
                                            if ($stmt->execute()) {
                                                //Store result
                                                $stmt->store_result();

                                                $stmt->bind_result($name_staff);
                                                $stmt->fetch();
                                            }
                                        }
                                        $stmt->close();
                                        // Chức vụ của nhân viên 
                                        switch ($name_staff) {
                                            case "manager":
                                                echo "Quản lý";
                                                break;
                                            case "medicalstaff":
                                                echo "Nhân viên y tế";
                                                break;
                                            case "politicalstaff":
                                                echo "Nhân viên phòng CTCT-SV";
                                                break;
                                            default:
                                                echo "Nhân viên phòng đào tạo";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Giới tính</h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">

                                        <?php if ($result['SEX'] == 'M') {
                                            echo "Nam";
                                        } else if ($result['SEX'] == 'F')
                                            echo "Nữ";
                                        else echo 'Không xác định';
                                        ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Email</h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        <?php echo  $result['EMAIL']; ?>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/js/admin.js"></script>
</body>

</html>