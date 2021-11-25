<?php
    $name=$_GET['NAME'];
    $sql_update="SELECT * FROM incentivescholarship_result where NAME='$name' ";
    $query_update=mysqli_query($connect, $sql_update);
    $row_update=mysqli_fetch_assoc($query_update);
 
    // lấy thông tin staff ID ở bảng trainingdepartment_staff
    $TRAININGDEPARTMENT_STAFFID='7006';
    
    if(isset($_POST['sbm'])){
            $NAME=$_POST['NAME'];
            $INFORMATION=$_POST['INFORMATION'];
            $SEMESTERCODE=$_POST['SEMESTERCODE'];
            $TRAININGDEPARTMENT_STAFFID=$_POST['TRAININGDEPARTMENT_STAFFID'];
            // if($NAME = ""){

            // }
            $sql = "UPDATE incentivescholarship_result 
            SET INFORMATION= '$INFORMATION', SEMESTERCODE=$SEMESTERCODE
            where NAME ='$NAME' "; 

            $query = mysqli_query($connect, $sql);
            header('location: index.php?page_layout=danhsach');
        }
?>
<title> Sửa thông tin học bổng</title>
<link rel="stylesheet" href="../../../../css/main.css">
<?php
        require_once '../../navbar.php'
?>

<div class="container-fluid" style="margin-top:7rem">
    <div class="card">
        <div class="card-header">
            <h2> Sửa Học bổng</h2>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">  
                    <label for="">Tên học bổng</label>
                    <input type="text" name="NAME" class="form-control"  value = "<?php echo $row_update['NAME']; ?>" >
                </div>
                <div class="form-group">
                    <label for="">Thông tin</label>
                    <input type="text" name="INFORMATION" class="form-control"  value = "<?php echo $row_update['INFORMATION']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Học kì</label>
                    <input type="number" name="SEMESTERCODE" class="form-control" value = "<?php echo $row_update['SEMESTERCODE']; ?>">
                    
                </div>
             
                <!-- <div class="form-group">
                    <label for="">Danh mục</label>
                        <select name="brand_id" id="">  
                            <option></option>

                        </select>
                </div> -->
                <button name="sbm" class="btn " type="submit"> Sửa</button>
            </form>
                
        </div>
    </div>
</div>
<a class="btn" href="../../schoolar/function" style="width:10rem;margin-left:1rem;margin-top:1rem">Quay lại</a>