<?php
require_once '../../../connection.php';
// Login information
session_start();
if (isset($_SESSION['student'])) {
  $logined = true;
  $studentid = $_SESSION['student'];
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

    .wrapper {
      max-width: 500px;
      width: 100%;
      background: #fff;
      margin: 5rem;
      box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.125);
      padding: 30px;

    }

    .wrapper .title {
      font-size: 24px;
      font-weight: 700;
      margin-bottom: 25px;
      color: #d00000;
      text-transform: uppercase;
      text-align: center;
    }

    .wrapper .form {
      width: 100%;
    }

    .wrapper .form .inputfield {
      margin-bottom: 15px;
      display: flex;
      align-items: center;
    }

    .wrapper .form .inputfield label {
      width: 200px;
      color: #757575;
      margin-right: 10px;
      font-size: 14px;
    }

    .wrapper .form .inputfield .input,
    .wrapper .form .inputfield .textarea {
      width: 100%;
      outline: none;
      border: 1px solid #d5dbd9;
      font-size: 15px;
      padding: 8px 10px;
      border-radius: 3px;
      transition: all 0.3s ease;
    }

    .wrapper .form .inputfield .textarea {
      width: 100%;
      height: 125px;
      resize: none;
    }

    .wrapper .form .inputfield .custom_select {
      position: relative;
      width: 100%;
      height: 37px;
    }

    .wrapper .form .inputfield .custom_select:before {
      content: "";
      position: absolute;
      top: 12px;
      right: 10px;
      border: 8px solid;
      border-color: #d5dbd9 transparent transparent transparent;
      pointer-events: none;
    }

    .wrapper .form .inputfield .custom_select select {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      outline: none;
      width: 100%;
      height: 100%;
      border: 0px;
      padding: 8px 10px;
      font-size: 15px;
      border: 1px solid #d5dbd9;
      border-radius: 3px;
    }


    .wrapper .form .inputfield .input:focus,
    .wrapper .form .inputfield .textarea:focus,
    .wrapper .form .inputfield .custom_select select:focus {
      border: 1px solid #d00000;
    }

    .wrapper .form .inputfield .btn {
      width: 100%;
      padding: 8px 10px;
      font-size: 15px;
      border: 1px solid #d00000;
      background: #fff;
      color: #d00000;
      cursor: pointer;

      border-radius: 3px;
      outline: none;
    }

    .wrapper .form .inputfield .btn:hover {
      background: #d00000;
      color: #fff;
    }

    .wrapper .form .inputfield:last-child {
      margin-bottom: 0;
    }

    @media (max-width:420px) {
      .wrapper .form .inputfield {
        flex-direction: column;
        align-items: flex-start;
      }

      .wrapper .form .inputfield label {
        margin-bottom: 5px;
      }

      .wrapper .form .inputfield.terms {
        flex-direction: row;
      }
    }
  </style>
  <title>Danh s??ch y??u c???u</title>
</head>

<body style="background-color: #f3f4f6;">
  <!-- mainNav -->
  <?php
  $active_nav_item = 'service';
  require_once('../navbar.php');
  ?>
  <div class="wrapper pt-1" style="margin-left: 30rem; border-radius: .5rem;">
    <div class="title">
      ????n y??u c???u d???ch v???
    </div>
    <form action="" method="POST">
      <div class="form">
        <div class="inputfield">
          <label>Y??u c???u</label>
          <select class='custom-select' name="id" style="width: 28rem" required>
            <option selected disabled value="">Ch???n y??u c???u d???ch v???</option>
            <option value="1">????ng k?? in b???ng ??i???m h???c t???p</option>
            <option value="2">????ng k?? nh???n b???ng t???t nghi???p</option>
            <option value="3">????ng k?? in gi???y x??c nh???n Sinh vi??n </option>
            <option value="4">????ng k?? l??m l???i th??? sinh vi??n</option>
            <option value="6">????ng k?? in b???ng ??i???m r??n luy???n</option>
          </select>
        </div>
        <div class="inputfield">
          <label>?????a ch??? nh???n</label>
          <input type="text" class="input" name="content" required>
        </div>
        <div class="inputfield">
          <input type="submit" class="btn" name="submit">
          <?php
          if (isset($_POST['submit'])) {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $time_stamp = date("Y-m-d H:i:s");
            $ID = $_POST['id'];
            $content = $_POST['content'];

            $sql = "INSERT INTO request_services(STUDENTID, TIMESTAMP, ID,CONTENT) 
                          VALUES (?,?,?,?)";
            if ($stmt = $mysqli->prepare($sql)) {
              $stmt->bind_param("ssss", $param_studentid, $param_timestamp, $param_id, $param_content);
              $param_studentid = $studentid;
              $param_timestamp = $time_stamp;

              $param_id = $ID;
              $param_content = $content;
              if ($stmt->execute()) {
              } else {
                echo $stmt->error;
              }
            }
          }

          ?>
        </div>
      </div>
    </form>

  </div>
  <div style="padding: 100px;margin-top:-10rem;">
    <div class="row mt-5 justify-content-between">
      <div class="col-6">
        <h4 style="margin-bottom: 30px">C??C Y??U C???U D???CH V??? C???A SINH VI??N</h4>
      </div>
      <div class="col-xs-3">
        <form class="form-inline" method="POST">
          <div class="form-group mx-sm-3 mb-2">
            <select class="form-control" name="filter">
              <option value="all" <?= $filter_status == '' ? 'selected' : '' ?>>Hi???n th??? t???t c???</option>
              <option value="waiting" <?= $filter_status == 'waiting' ? 'selected' : '' ?>>Y??u c???u ch??? x??c nh???n</option>
              <option value="confirm" <?= $filter_status == 'confirm' ? 'selected' : '' ?>>Y??u c???u trong ti???n tr??nh</option>
              <option value="done" <?= $filter_status == 'done' ? 'selected' : '' ?>>Y??u c???u ???? gi???i quy???t</option>
            </select>
          </div>
          <input class="btn mb-2" type="submit" name="ok" value="L???c">
        </form>
      </div>
      <?php
      if (!isset($_GET['action'])) {
        $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
        $current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hi???n t???i
        $offset = ($current_page - 1) * $item_per_page;
      }
      if (empty($filter)) {
        $sql = "SELECT * FROM request_services where STUDENTID='$studentid' ORDER BY STATUS DESC LIMIT " . $offset . ", " . $item_per_page . ";";
        $totalRecords = $mysqli->query("SELECT * FROM request_services where STUDENTID='$studentid'");
      }
      if (isset($_REQUEST['ok'])) {
        if ($_POST['filter'] == 'all') {
          $sql = "SELECT * FROM request_services where STUDENTID='$studentid' ORDER BY STATUS DESC ";
          $totalRecords = $mysqli->query("SELECT * FROM request_services where STUDENTID = '$studentid'");
        } elseif ($_POST['filter'] == 'waiting') {
          $sql = "SELECT * FROM request_services WHERE STATUS = 'Waiting' and STUDENTID='$studentid' ORDER BY STATUS DESC ";
          $totalRecords = $mysqli->query("SELECT * FROM request_services WHERE STUDENTID='$studentid' and STATUS = 'Waiting'");
        } elseif ($_POST['filter'] == 'confirm') {
          $sql = "SELECT * FROM request_services WHERE STATUS = 'In Progress' and STUDENTID='$studentid' ORDER BY STATUS DESC";
          $totalRecords = $mysqli->query("SELECT * FROM request_services WHERE STATUS = 'In Progress' AND STUDENTID='$studentid'");
         
        } else {
          $sql = "SELECT * FROM request_services WHERE STATUS = 'Completed' AND STUDENTID='$studentid' ORDER BY STATUS DESC ";
          $totalRecords = $mysqli->query("SELECT * FROM request_services WHERE  STATUS = 'Completed' AND STUDENTID='$studentid'");
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
                        <th class = 'align-middle' style='text-align: center'>Ng??y ????ng k??</th>
                        <th class = 'align-middle' style='text-align: center'>N???i dung y??u c???u</th>
                        <th class = 'align-middle' style='text-align: center'>?????a ch??? nh???n</th>
                        <th class = 'align-middle' style='text-align: center'>Nh??n vi??n ph???n h???i</th>
                        <th class = 'align-middle' style='text-align: center'>T??nh tr???ng</th>
                      </tr>
                    </thead>";

        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tbody>
                        <tr>";
          echo "<td style='text-align: center'>" . date("d-m-Y H:i:s", strtotime($row['TIMESTAMP'])) . "</td>";

          switch ($row['ID']) {
            case '1':
              echo "<td style='text-align: center'>????ng k?? in b???ng ??i???m h???c t???p</td>";
              break;
            case '2':
              echo "<td style='text-align: center'>????ng k?? nh???n b???ng t???t nghi???p</td>";
              break;
            case '3':
              echo "<td style='text-align: center'>????ng k?? in gi???y x??c nh???n Sinh vi??n</td>";
              break;
            case '4':
              echo "<td style='text-align: center'>????ng k?? l??m l???i th??? sinh vi??n</td>";
              break;
            case '6':
              echo "<td style='text-align: center'>????ng k?? in b???ng ??i???m r??n luy???n</td>";
              break;
          }
          // switch
          echo "<td style='text-align: center'>" . $row['CONTENT'] . "</td>";
          if (!empty($row['TRAININGDEPARTMENT_STAFFID'])) {
            $staff1=$row['TRAININGDEPARTMENT_STAFFID'];
            $sql1 = "SELECT concat(LASTNAME,' ',FIRSTNAME) as name_staff from staff where ID ='$staff1'";
            $result1 = $mysqli->query($sql1);
            $row1= mysqli_fetch_assoc($result1);
            echo "<td style='text-align: center'>" . $row1['name_staff'] . "</td>";
          
            
          } else echo "<td style='text-align: center'></td>";
          if ($row['STATUS'] == 'Waiting') {
            echo "<td style='text-align: center; color: red; font-weight: bold;'> Ch??? x??c nh???n</td>";
          } elseif ($row['STATUS'] == 'In Progress') {
            echo "<td style='text-align: center; color: rgb(233, 205, 44); font-weight: bold;'> Trong ti???n tr??nh </td>";
          } elseif ($row['STATUS'] == 'Completed') {
            echo "<td style='text-align: center; color: green; font-weight: bold;'> ???? gi???i quy???t</td>";
          }
          echo "</tr>
                        </tbody>";
        }
      } else {
        echo "<table
                id='table1'
                class='table table-bordered table-hover align-middle'
                style='margin-left: auto; margin-right: auto;'
              >
                <thead>
                  <tr>
                    <th class = 'align-middle' style='text-align: center'>Ng??y ????ng k??</th>
                    <th class = 'align-middle' style='text-align: center'>N???i dung y??u c???u y??u c???u</th>
                    <th class = 'align-middle' style='text-align: center'>?????a ch??? nh???n</th>
                    <th class = 'align-middle' style='text-align: center'>Nh??n vi??n ph???n h???i</th>
                    <th class = 'align-middle' style='text-align: center'>T??nh tr???ng</th>
                  </tr>
                </thead>";
      }
      ?>
      </table>
      <?php
      if ($resultCheck <= 0) {
        echo "<div style='margin-left: 40rem;'><p> Kh??ng c?? d??? li???u </p>"
      ?>
      <?php
      }
      include '../../staff/pagination.php';
      ?>
    </div>
    <script>
      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/js/admin.js"></script>
</body>

</html>