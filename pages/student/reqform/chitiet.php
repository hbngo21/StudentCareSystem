<?php
require_once '../../../connection.php';
session_start();
if (isset($_SESSION['student'])) {
    $logined = true;
    $studentid = $_SESSION['student'];
} else $logined = false;
$id = $_GET['STUDENTID'];

$sql = "SELECT* FROM request_services WHERE STUDENTID= '$id'";

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
    <title>chi tiet</title>
    <style>
        .container-fluid {
            margin-top: 5rem;

        }

        .card {
            border: 1px solid #fff;
            background-color: #f8f8f8;
        }

        .card-body {
            background-color: blanchedalmond;
            border: 1px solid #ef9273;
            border-radius: 5px;
            box-sizing: border;
            width: 50%;

        }
    </style>
</head>

<body>
    <?php $active_nav_item = 'service';
    require_once('../navbar.php'); ?>
    <main>
        <div class="container-fluid">
            <div class="card">
                <!-- <div class="card-header">
            
        </div> -->
                <div class="card-body">
                    <p> StudentID: <?php echo $result['STUDENTID']; ?>
                        <br>TIMESTAMP: <?php echo $result['TIMESTAMP']; ?>
                        <br>Yêu cầu: <?php echo $result['CONTENT'] ?>
                        <br>Staff ID: <?php echo $result['TRAININGDEPARTMENT_STAFFID'] ?>
                        <br>STATUS: <?php echo $result['STATUS'] ?>
                    </p>
                </div>
            </div>

        </div>

    </main>
</body>

</html>