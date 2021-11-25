<?php
require_once '../../../connection.php';
session_start();
if (isset($_SESSION['student'])) {
  $logined = true;
  $studentid = $_SESSION['student'];
} else $logined = false;
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
    <title>Quy chế nội vụ</title>
<style>
            .container-fluid{
        margin-top:5rem;
    }
    .card{
        border-radius:50px;
    
    }
    /* .card-header{
        background-color:#blanchedalmond;
        border:1px solid #ef9273;
        border-radius:50px;
    } */
    .card-body{
        background-color:blanchedalmond;
        border:1px solid #ef9273;
        border-radius:5px;
        height: 10rem;
    
    }
    body {
      padding-top: 3rem;
      padding-bottom: 3rem;
    
    }

  main{
      margin-top: 3rem;
      margin-left:3rem;
  }
  #breadcrumb a,ol{
      font-size: 30px;
      text-decoration: none;
      color:#ef9273;
  }
  .card{
      max-width: 100%;
      /* height:200px; */
      
  }
  .card h-100{
      height:500px;
  }
  /* .card img{
      text-align: center;
  } */
  /* .cart-list card{
      margin:0 auto;

  } */
  .col {
      text-decoration:none;
      color:black;
  }
  .col:hover,
      .col:active,
      .col:focus,
      .col.active {
          text-decoration:none;
          color:#ef9273;
      }
  .btn-toolbar{
      margin-top:10px;
      justify-content: flex-end;
  }

  .btn-outline-secondary:hover,
      .btn-outline-secondary:active,
      .btn-outline-secondary:focus,
      .btn-outline-secondary.active {
          background-color: #ef9273;
          color: #fff;}
</style>
</head>
<body>
    <header>
        
     <?php require_once'../navbar.php'; ?>            

    </header>
    <main>      
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb" id="breadcrumb">
      
      <li class="breadcrumb-item"><a href="../mainpage/mainpage.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Quy chế</li>
    </ol>
    </nav>                
        
<div class="row event__detail" style="margin-left:-0.1rem;margin-top:0rem;">
        <div class="col-md-4 pt-2"><img src="../../../assets/images/bk.png" class="img-fluid rounded b-shadow-a" width="100%" alt=""></div>
        <div class="col-md-8 pt-2">
            <div class="event__detail__title mt-2"><span>Quy chế học vụ</span>
               
            </div>
            <div class="mt-2">
            <p style="font-size:20px">Quy chế học vụ là một bộ quy định về những vấn đề chung nhất về các quy trình tổ chức đào tạo, đánh giá kết quả học tập, học bổng-học phí, xử lý học vụ, tốt nghiệp-văn bằng đối với sinh viên bậc đại học và cao đẳng tại trường Đại học Bách Khoa - ĐHQG Tp HCM. Các vấn đề liên quan tới giảng viên, quy trình xây dựng hồ sơ chương trình giáo dục và tổ chức giảng dạy được quy định trong quy chế giảng dạy; các vấn đề liên quan tới sinh viên (trong các mặt sinh hoạt, rèn luyện,…) được quy định chi tiết trong quy chế công tác sinh viên của trường. Quy chế học vụ hiện được áp dụng là Quy chế học vụ 2015.</p>
            <h3>Quy chế học vụ 2012</h3>
            <p style="font-size:20px">Quy chế học vụ 2012 có hiệu lực từ học kỳ 01 năm học 2012-2013 đến khi Quy chế học vụ 2015 có hiệu lực.
            Quy chế học vụ 2012 thay thế cho quy chế học vụ ban hành theo QĐ số 1871/QĐ-BKĐT ngày 31/10/2005 và áp dụng cho tất cả các hình thức đào tạo bậc đại học và cao đẳng tại trường Đại học Bách Khoa – ĐHQG Tp.HCM. <sup id="cite_ref-1" class="reference"><a href="#cite_note-1">&#91;1&#93;</a></sup>
            </p>
            <h3>Quy chế học vụ 2015</h3>
                        <p style="font-size:20px">Quy chế đào tạo và học vụ bậc đại học, cao đẳng được ban hành theo quyết định 3502/ĐHBK-ĐT ngày 25/11/2015 của Hiệu trưởng Trường Đại học Bách Khoa Tp.HCM, gọi tắt là Quy chế học vụ 2015, có hiệu lực kể từ học kỳ 1 năm học 2015-2016.<sup id="cite_ref-2" class="reference"><a href="#cite_note-2">&#91;2&#93;</a></sup> Ngày 07/3/2017, Hiệu trưởng trường ĐHBK ban hành quyết định số 553/ĐHBK-ĐT sửa đổi bổ sung một số nội dung trong Quyết định số 3502/QĐ-ĐHBK-ĐT, ngày 25/11/2015 <br> Quy chế này thay thế cho:

                            <br>   - Quyết định số 958/QĐ/ĐHBK-ĐT ngày 27/6/2012 về việc ban hành Quy chế học vụ;
                            <br>  - Quyết định số 411/QD-ĐHBK-ĐT ngày 30/5/2014 về việc ban hành Quy định tạm thời về tổ chức giảng dạy và đánh giá môn học và các quy chế học vụ bổ sung được ban hành trước học kỳ 1 năm học 2015-2016.</p>

                            <h2>
            <span id="Chú_thích"></span><span class="mw-headline" id="Ch.C3.BA_th.C3.ADch">Chú thích</span></h2><div class="mw-references-wrap"><ol class="references">
            <li style="font-size:20px" id="cite_note-1"><span class="mw-cite-backlink"><a href="#cite_ref-1">↑</a></span> <span class="reference-text"><a rel="nofollow" class="external text" href="http://www.aao.hcmut.edu.vn/image/data/quyche/Quy%20che%20hoc%20vu%202012.pdf">
              Toàn văn quy chế học vụ 2012</a></span>
            </li>
            <li style="font-size:20px" id="cite_note-2"><span class="mw-cite-backlink"><a href="#cite_ref-2">↑</a></span> <span class="reference-text"><a rel="nofollow" class="external text" href="http://www.aao.hcmut.edu.vn/index.php?route=catalog/chitiettb&amp;thongbao_id=843">
              Toàn văn Quy chế học vụ 2015</a></span>
            </li>
            <li style="font-size:20px" id="cite_note-3"><span class="mw-cite-backlink"><a href="#cite_ref-3">↑</a></span> <span class="reference-text"><a rel="nofollow" class="external text" href="http://www.aao.hcmut.edu.vn/index.php?route=catalog/chitiettb&amp;thongbao_id=1343">
              sửa đổi bổ sung nội dung QĐ 3502, ngày 25/11/2015</a></span>
            </li>
            </div>
           
              <a href="mainpage.php" type='button' class='btn' style='width:100px' >Quay lại</a>
         
        </div>
    </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/js/admin.js"></script>
</body>
</html>    


