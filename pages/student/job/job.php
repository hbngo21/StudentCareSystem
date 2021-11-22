<?php 
  require_once '../../../connection.php';


 $sql="SELECT * FROM incentivescholarship_result";
 $query=mysqli_query($mysqli,$sql);

?> 




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


    <title>Học bổng</title>
    <link rel="stylesheet" href="../../../css/schoolar.css">
  </head>
<body>
  <header>
    <?php require_once'../navbar.php'; ?>    
  </header>
<main>
      
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb" id="breadcrumb">
      
      <li class="breadcrumb-item"><a href="mainpage.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Việc làm</li>
    </ol>
    </nav>
  <div class="container">
      <div class=" d-flex align-items-stretch"  >
        
    <!-- <div class="card-list d-flex flex-wrap" style="width: 18rem"> -->
      <?php
          $i = 0;
          while($row = mysqli_fetch_assoc($query)){ ?>
          <?php  $i++?>
        <div class="row">
          <a href="chitiet.php?NAME=<?php echo $row['NAME'];?>" class="col" >
         <!-- <a href="index.php?page_layout=chitiet&NAME=<?php echo $row['NAME'];?> ">  -->
          <div class="card h-100">
            <img src="../../../assets/images/bk.png" class="card-img-top" alt="...">
            <div class="card-body">
              <div class="card-title">
                    <h5 class="card-title"><?php echo $row['NAME']; ?> </h5>
              </div>
            <p class="card-text"><?php echo $row['INFORMATION']; ?></p>
            </div>
          </div>
          </a>
        <!-- <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div> -->
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

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>