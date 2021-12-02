<?php
require_once '../../../connection.php';
session_start();
if (isset($_SESSION['student'])) {
  $logined = true;
  $studentid = $_SESSION['student'];
} else $logined = false;

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <!-- Styles -->
  <link rel="stylesheet" href="../../../css/main.css">
  <style>
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

    /* Style for pagination */
    #pagination {
      text-align: right;
      padding: .5rem 1rem 1rem;
    }

    .page-item {
      padding: 5px 9px;
      color: #f94144;
      background-color: #fff;

      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
      box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;

    }

    .page-item:hover {
      color: black;
    }

    .current-page {
      background-color: #f94144;
      color: #fff;
    }
  </style>
  <title>Việc làm</title>
</head>

<body>
  <?php
  $active_nav_item = 'home';
  require_once '../navbar.php';
  ?>
  <main>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb" id="breadcrumb">
        <li class="breadcrumb-item"><a href="../mainpage/mainpage.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Việc làm</li>
      </ol>
    </nav>
    <div class="container">
      <div class="row">
        <?php
        if (!isset($_GET['action'])) {
          $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 3;
          $current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
          $offset = ($current_page - 1) * $item_per_page;
          $totalRecords = $mysqli->query("SELECT * FROM jobscholarship_infor");
          $totalRecords = $totalRecords->num_rows;
          $totalPages = ceil($totalRecords / $item_per_page);
          $sql = "SELECT id, title, content, political_staffid FROM jobscholarship_infor limit " . $offset . "," . $item_per_page . " ";

          if ($stmt = $mysqli->prepare($sql)) {
            if ($stmt->execute()) {
              $stmt->store_result();

              $stmt->bind_result($id, $title, $content, $political_staffid);
              while ($stmt->fetch()) {
        ?>
                <div class="col-4">
                  <a href="chitiet.php?id=<?= $id ?>&staff_id=<?= $political_staffid ?>" class="col">
                    <div class="card">
                      <img src="https://blog.realjobshawaii.com/wp-content/uploads/2017/02/JobFair-01.png" class="card-img-top" alt="...">
                      <div class="card-body">
                        <div class="card-title">
                          <h5 class="card-title"><?= $title ?> </h5>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
        <?php }
            }
          }
        }; ?>
      </div>
      <?php
      include '../pagination.php';
      ?>
    </div>
    </div>
  </main>
  <!-- Script -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="/js/main.js"></script>
</body>

</html>