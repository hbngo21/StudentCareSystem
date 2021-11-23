<?php 
require_once '../../../connection.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
     <!-- Bootstrap -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="../../../css/main.css">
   <style>
     .banner{
       background: #FFBC97;
       text-align: center;
       color:white;
       padding-top:140px;
       padding-bottom:140px;
     }
     .row a{
       text-decoration: none;
       color:#ef9273
     }
   </style>
  </head>
  <body>
        
  <header>
  <?php require_once '../navbar.php';?>
  </header>
  
   
<main>
  

<!-- <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="pic.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="2.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
</div> -->
  <div class="banner" style="margin-top:4rem;height:30rem">
     <div class="container">
       <h1>Chào mừng đến với Trang chủ </h1>
       <p>Cung cấp các thông tin cần thiết cho sinh viên.</p>
     </div>
  </div>
    
     <div class="container pt-3 text-center"id="service" style="margin-top:3rem">
          <h1>Services</h1>
          <div class="row">
            <a href="../schoolar/schoolar.php">
            <div class="col-md-4 col-sm-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="#ef9273" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
              </svg>
              <h3><a href="../schoolar/schoolar.php">Học bổng</a></h3>
              <p style="font-size:20px">Học bổng Nhà trường và các doanh nghiệp trao thưởng cho các sinh viên có thành tích học tập tốt.</p>
            </div>
            </a>
            <a href="rules.php">
            <div class="col-md-4 col-sm-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="#ef9273" class="bi bi-book-half" viewBox="0 0 16 16">
                <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
              </svg>
              <h3><a href=" ">Quy chế</a></h3>
              <p  style="font-size:20px">Nội quy của nhà trường về những nguyên tắc xử sự chung, các hành vi vi phạm kỷ luật, biện pháp xử lý vi phạm. </p>

            </div>
            </a>
            <a href="../job/job.php">
            <div class="col-md-4 col-sm-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="#ef9273" class="bi bi-tools" viewBox="0 0 16 16">
                <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.356 3.356a1 1 0 0 0 1.414 0l1.586-1.586a1 1 0 0 0 0-1.414l-3.356-3.356a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0zm9.646 10.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708zM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11z"/>
              </svg>
              <h3><a href="../job/job.php">Việc làm</a></h3>
              <p  style="font-size:20px" >Nhà trường phối hợp cùng các Doanh nghiệp lớn trong và ngoài nước cung cấp các thông tin việc làm cho sinh viên.</p>
            </div>
            </a>
          </div>
        
     </div>
        <!-- Three columns of text below the carousel -->
      
      <!-- <div class="vc_row wpb_row vc_row-fluid vc_custom_1603374045499 vc_row-has-fill" style="margin-top: 10rem">
      <div class="container ">

     
        <div class="row">
          <div class="col-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="120" height="130" fill="#ef9273" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
              </svg>
            <h2>Học bổng</h2>
            <p style="font-size:20px">Học bổng Nhà trường và các doanh nghiệp trao thưởng cho các sinh viên có <br> thành tích học tập tốt.</p>
           
            <a class="btn btn-secondary" href="../schoolar/schoolar.php">View details &raquo;</a>
          </div>
          <div class="col-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="130" height="130" fill="#ef9273" class="bi bi-book-half" viewBox="0 0 16 16">
                <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
              </svg>
    
            <h2>Quy chế</h2>
            <p  style="font-size:20px">Nội quy của nhà trường về những nguyên tắc xử sự chung, các hành vi vi phạm kỷ luật, biện pháp xử lý vi phạm. </p>
             
            <a class="btn btn-secondary" href="rules.php">View details &raquo;</a>
          </div>
          <div class="col-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="130" height="130" fill="#ef9273" class="bi bi-tools" viewBox="0 0 16 16">
                <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.356 3.356a1 1 0 0 0 1.414 0l1.586-1.586a1 1 0 0 0 0-1.414l-3.356-3.356a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0zm9.646 10.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708zM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11z"/>
              </svg>
    
            <h2>Việc làm</h2>
            <p  style="font-size:20px" >Nhà trường phối hợp cùng các Doanh nghiệp lớn trong và ngoài nước cung cấp các thông tin việc làm cho sinh viên.</p>
          
            <a class="btn btn-secondary" href="../job/job.php">View details &raquo;</a>
          </div>
        </div>
      </div>
    </div> -->

     
      <div class="container marketing">

<!-- START THE FEATURETTES -->

    
<hr class="featurette-divider">

<!-- /END THE FEATURETTES -->
</div><!-- /.container -->

</main>
  
  
  
  
  
  

   
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/js/admin.js"></script>
  </body>
</html>