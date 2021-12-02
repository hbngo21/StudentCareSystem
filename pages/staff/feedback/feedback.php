<?php
require_once '../../../connection.php';
// Login information
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
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <!-- Javascript Library -->
  <script>
    function sortTable(n) {
      var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
      table = document.getElementById("lst_xetccnn");
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
          switchcount++;
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
  <title>Danh sách đánh giá</title>
</head>

<body>
  <!-- mainNav -->
  <?php
  $active_nav_item = 'service';
  require_once("../navbar.php");
  ?>
  <div class="banner text-center">
    Các đánh giá của sinh viên
  </div>
  <div style="padding-bottom: 100px;" class="px-5">
    <?php
    if (!isset($_GET['action'])) {
      $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
      $current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
      $offset = ($current_page - 1) * $item_per_page;
      $totalRecords = $mysqli->query("SELECT * FROM FEEDBACK");
      $totalRecords = $totalRecords->num_rows;
      $totalPages = ceil($totalRecords / $item_per_page);
    }
    ?>
    <?php
    $sql = "SELECT * FROM FEEDBACK ORDER BY TIMESTAMP DESC LIMIT " . $offset . ", " . $item_per_page . ";";
    $result = $mysqli->query($sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
      echo "<div style='overflow-x:auto;'>
                  <table
                    id='lst_xetccnn'
                    class='table table-bordered table-hover align-middle'
                    style='width: 100%;'
                  >
                    <thead class = 'align-middle'>
                      <tr>
                        <th onclick='sortTable(1)' style='text-align: center; cursor: pointer;'>Ngày đánh giá</th>
                        <th style='text-align: center; display: none'>Ngày đánh giá Không hiển thị</th>
                        <th style='text-align: center'>Sinh viên</th>
                        <th onclick='sortTable(4)' style='text-align: center; cursor: pointer;'>Tiêu đề đánh giá</th>
                        <th style='text-align: center; display: none'>Tiêu đề đánh giá Không hiển thị</th>
                      </tr>
                    </thead>";
      $i = 0;
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tbody>
                        <tr>";
        echo "<td style='text-align: center'>" . date("d-m-Y H:i:s", strtotime($row['TIMESTAMP'])) . "</td>";
        echo "<td style='text-align: center; display: none'>" . date("Y-m-d H:i:s", strtotime($row['TIMESTAMP'])) . "</td>";
        $sql2 = "SELECT CONCAT(LASTNAME,' ',FIRSTNAME) AS NAME FROM STUDENT WHERE ID =" . $row['STUDENTID'] . "";
        $result2 = $mysqli->query($sql2);
        echo "<td style='text-align: center'>" . mysqli_fetch_assoc($result2)['NAME'] . "</td>";
        echo "<td style='text-align: center'>
                            <button type='button' class='viewFeedback' data-toggle='modal' data-target='#exampleModal" . $i . "'>" . $row['TITLE'] .
          "</button>
                            <div class='modal fade' id='exampleModal" . $i . "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                <div class='modal-dialog modal-dialog-centered' role='document'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='exampleModalLabel'>" . $row['TITLE'] . "</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                    </div>
                                    <div class='modal-body'>" . $row['CONTENT'] .
          "</div>
                                </div>
                                </div>
                            </div></button>";
        echo "<td style='text-align: center; display: none'>" . $row['TITLE'] . "</td>";
        echo "</td></tr>
                        </tbody>";
        $i++;
      }
    } else echo "<h5 class='text-center' style='color: red'>Chưa có đánh giá nào!</h5>";
    ?>
    </table>
  </div>
  <?php
  include '../pagination.php';
  ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="/js/admin.js"></script>
</body>

</html>