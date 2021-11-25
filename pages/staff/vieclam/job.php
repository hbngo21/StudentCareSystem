<?php
require_once '../../../connection.php';

// Login information
session_start();
if (isset($_SESSION['staff'])) {
  $logined = true;
  $staffid = $_SESSION['staff'];
} else $logined = false;

$sql = "SELECT * FROM jobscholarship_infor";
$query = mysqli_query($mysqli, $sql);

$sql_staff="select typeOfStaff('" . $staffid . "')";
$query_staff= mysqli_query($mysqli,$sql_staff);
$result=mysqli_fetch_array($query_staff);

$sqla = "select typeOfStaff('" . $staffid . "')";
$stmt = $mysqli->query($sqla);

if ($stmt = $mysqli->prepare($sqla)) {
    if ($stmt->execute()) {
        //Store result
        $stmt->store_result();

        $stmt->bind_result($typeOfStaff);
        $stmt->fetch();
    }
}
$stmt->close();
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
      color: #ef9273;
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
      color: #ef9273;
    }

    .btn-toolbar {
      margin-top: 10px;
      justify-content: flex-end;
    }

    .btn-outline-secondary:hover,
    .btn-outline-secondary:active,
    .btn-outline-secondary:focus,
    .btn-outline-secondary.active {
      background-color: #ef9273;
      color: #fff;
    }
  </style>

  <title>Việc làm</title>
</head>


<body>
  <header>
    <?php require_once '../navbar.php'; ?>
  </header>
  <main>

    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb" id="breadcrumb">

        <li class="breadcrumb-item"><a href="../mainpage/mainpage.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Việc làm</li>
      </ol>
    </nav>
    <div class="d-flex justify-content-end" style="margin-right:5rem;margin-bottom:2rem;">
    <?php
      if($typeOfStaff == 'politicalstaff')
          echo "<a href=\"../job/function\" class=\"btn\"> Chỉnh sửa </a> ";
       
      else{
          echo "<a href=\"#\" class=\"btn\" style=\"pointer-events:none;background:grey\"> Chỉnh sửa </a>";
      }
      ?>
      
    </div>
    <div class="container">
      <div class=" d-flex align-items-stretch">
        <?php
        $i = 0;
        while ($row = mysqli_fetch_assoc($query)) { ?>
          <?php $i++ ?>
          <div class="row">
            <a href="chitiet.php?id=<?php echo $row['ID']; ?>&staff_id=<?php echo $row['POLITICAL_STAFFID']; ?> " class="col">
              <div class="card h-100">
                <img src="../../../assets/images/bk.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <div class="card-title">
                    <h5 class="card-title"><?php echo $row['TITLE']; ?> </h5>
                  </div>
                  <p class="card-text"><?php echo $row['CONTENT']; ?></p>
                </div>
              </div>
            </a>
          </div>

        <?php } ?>
      </div>
    </div>
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
      <div class="btn-group me-2" role="group" aria-label="First group">
        <button type="button" class="btn btn-outline-secondary">1</button>
        <button type="button" class="btn btn-outline-secondary">2</button>
        <button type="button" class="btn btn-outline-secondary">3</button>
        <button type="button" class="btn btn-outline-secondary">4</button>
      </div>
    </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="/js/main.js"></script>
</body>

</html>