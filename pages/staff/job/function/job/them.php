<?php
$sql_staffid="SELECT * FROM `trainingdepartment_staff` ORDER BY `trainingdepartment_staff`.`ID` ASC";
$query_staffid=mysqli_query($connect,$sql_staffid);
        if(isset($_POST['sbm'])){
            $NAME=$_POST['NAME'];
            $INFORMATION=$_POST['INFORMATION'];
            $SEMESTERCODE=$_POST['SEMESTERCODE'];
            $TRAININGDEPARTMENT_STAFFID=$_POST['TRAININGDEPARTMENT_STAFFID'];

            $sql="INSERT INTO incentivescholarship_result(NAME,INFORMATION,SEMESTERCODE,TRAININGDEPARTMENT_STAFFID)
             VALUES ('$NAME','$INFORMATION',$SEMESTERCODE,$TRAININGDEPARTMENT_STAFFID) ";
            $query = mysqli_query($connect, $sql);
            header('location: index.php?page_layout=danhsach');
        }
?>
 <link rel="stylesheet" href="../../../../css/main.css">
<?php
        require_once '../../navbar.php'
?>

<div class="container-fluid" style="margin-top:7rem">
    <div class="card">
        <div class="card-header">
            <h2> Thêm Học bổng</h2>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">  
                    <label for="">Ten học bổng</label>
                    <input type="text" name="NAME" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Thông tin</label>
                    <input type="text" name="INFORMATION" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Học kì</label>
                    <input type="number" name="SEMESTERCODE" class="form-control" required>
                    
                </div>
                <div class="form-group">
                    <label for="">ID nhân viên PĐT</label>
                    <select class ="form-control"name="TRAININGDEPARTMENT_STAFFID" id="">  
                          <?php
                                while($row_staffid= mysqli_fetch_assoc($query_staffid)){?>
                                    <option value="<?php echo $row_staffid['ID']; ?>">
                                    <?php echo $row_staffid['ID']; ?>
                                </option>
                                    
                               <?php }?>
                    

                    </select> 
                </div>
                <!-- <div class="form-group">
                    <label for="">Danh mục</label>
                        <select name="brand_id" id="">  
                            <option></option>

                        </select>
                </div> -->
                <button name="sbm" class="btn " type="submit"> Thêm</button>
            </form>
                
        </div>
    </div>
</div>
<a class="btn " href="../../job/function" style="width:10rem;margin-left:1rem;margin-top:1rem">Quay lại</a>