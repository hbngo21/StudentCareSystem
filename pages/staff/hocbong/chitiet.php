<?php
require_once '../../../connection.php';
    $name =$_GET['NAME'];
    
    $sql ="SELECT* FROM incentivescholarship_result WHERE NAME= '$name'";
  
    $query = mysqli_query($mysqli,$sql);
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
    <link rel="stylesheet" href="../../../css/chitiet.css">
    <title>chi tiet</title>
</head>
<body>
    <header>
        
     <?php require_once'../navbar.php'; ?>            

    </header>
    <main>
    <div class="container-fluid">
    <div class="card">
        <!-- <div class="card-header">
            
        </div> -->
        <div class="card-body">
            <h2> <?= $name ?> </h2>
            <p> <?php echo $result['INFORMATION']; ?></p>
        </div>
    </div>

</div>

    </main>
</body>
</html>    
