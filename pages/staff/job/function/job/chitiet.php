<?php
    $ID =$_GET['ID'];
    
    $sql ="SELECT* FROM jobscholarship_infor WHERE ID= '$ID'";
  
    $query = mysqli_query($connect,$sql);
    $result = mysqli_fetch_array($query);
?>

<div class="container-fluid" style="margin-top:7rem">
    <div class="card">
        <div class="card-header">
            <h2> <?php echo $result['TITLE']?></h2>
        </div>
        <div class="card-body">
            <p> <?php echo $result['CONTENT']; ?></p>
        </div>
    </div>

</div>
