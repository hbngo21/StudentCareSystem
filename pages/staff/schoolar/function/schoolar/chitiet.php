<?php
    $name =$_GET['NAME'];
    
    $sql ="SELECT* FROM incentivescholarship_result WHERE NAME= '$name'";
  
    $query = mysqli_query($connect,$sql);
    $result = mysqli_fetch_array($query);
?>
    
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2> <?= $name ?> </h2>
        </div>
        <div class="card-body">
            <p> <?php echo $result['INFORMATION']; ?></p>
        </div>
    </div>

</div>
