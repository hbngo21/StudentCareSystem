<?php
    $ID=$_GET['ID'];
    $sql_update="SELECT * FROM jobscholarship_infor where ID='$ID' ";
    $query_update=mysqli_query($connect, $sql_update);
    $row_update=mysqli_fetch_assoc($query_update);
 
    // lấy thông tin staff ID ở bảng trainingdepartment_staff
    $sql_staffid="SELECT * FROM `political_staff`";
    $query_staffid=mysqli_query($connect,$sql_staffid);
    
    if(isset($_POST['sbm'])){
            $TITLE=$_POST['TITLE'];
            $CONTENT=$_POST['CONTENT'];
            $ENTERPRISE=$_POST['ENTERPRISE'];
            $POLITICAL_STAFFID=$_POST['POLITICAL_STAFFID'];
            // if($NAME = ""){

            // }
            $sql = "UPDATE jobscholarship_infor 
            SET TITLE ='$TITLE', CONTENT= '$CONTENT', ENTERPRISE='$ENTERPRISE', POLITICAL_STAFFID=$POLITICAL_STAFFID
            where ID ='$ID' "; 
       
            $query = mysqli_query($connect, $sql);
            header('location: index.php?page_layout=danhsach');
        }
?>


<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2> Sửa thông tin việc làm</h2>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">  
                    <label for="">Tên việc làm</label>
                    <input type="text" name="TITLE" class="form-control"  value = "<?php echo $row_update['TITLE']; ?>" >
                </div>
                <div class="form-group">
                    <label for="">Thông tin</label>
                    <input type="text" name="CONTENT" class="form-control"  value = "<?php echo $row_update['CONTENT']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Doanh nghiệp</label>
                    <input type="text" name="ENTERPRISE" class="form-control" value = "<?php echo $row_update['ENTERPRISE']; ?>">
                    
                </div>
                <div class="form-group">
                    <label for="">ID nhân viên PĐT</label>
                    <select class ="form-control"name="POLITICAL_STAFFID" id="">   
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
                <button name="sbm" class="btn btn-success" type="submit"> Sửa</button>
            </form>
                
        </div>
    </div>
</div>