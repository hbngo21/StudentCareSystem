<?php
    $name =$_GET['NAME'];
    
    $sql ="SELECT* FROM incentivescholarship_result WHERE NAME= '$name'";
  
    $query = mysqli_query($connect,$sql);
    $result = mysqli_fetch_array($query);
?>
<link rel="stylesheet" href="../../../../css/main.css">
<?php
        require_once '../../navbar.php'
?>

<div class="container-fluid" style="margin-top:7rem">
    <div class="card">
        <div class="card-header">
            <h2> <?= $name ?> </h2>
        </div>
        <div class="card-body">
            <p> <?php echo $result['INFORMATION']; ?></p>
        </div>
    </div>

</div>