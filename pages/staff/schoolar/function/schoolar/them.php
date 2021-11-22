<?php
        $staffid='7006';
        if(isset($_POST['sbm'])){
            $NAME=$_POST['NAME'];
            $INFORMATION=$_POST['INFORMATION'];
            $SEMESTERCODE=$_POST['SEMESTERCODE'];
            

            $sql="INSERT INTO incentivescholarship_result(NAME,INFORMATION,SEMESTERCODE,TRAININGDEPARTMENT_STAFFID)
             VALUES ('$NAME','$INFORMATION',$SEMESTERCODE,$staffid) ";
            $query = mysqli_query($connect, $sql);
            header('location: index.php?page_layout=danhsach');
        }
?>


<div class="container-fluid">
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
              
                <!-- <div class="form-group">
                    <label for="">Danh mục</label>
                        <select name="brand_id" id="">  
                            <option></option>

                        </select>
                </div> -->
                <button name="sbm" class="btn btn-success" type="submit"> Thêm</button>
            </form>
                
        </div>
    </div>
</div>