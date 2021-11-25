<?php
        session_start();
        if (isset($_SESSION['staff'])) {
            $logined = true;
            $staffid = $_SESSION['staff'];
        } else $logined = false;
        if(isset($_POST['sbm'])){
            $ID=$_POST['ID'];
            $TITLE=$_POST['TITLE'];
            $CONTENT=$_POST['CONTENT'];
            $ENTERPRISE=$_POST['ENTERPRISE'];
            
            $sql="INSERT INTO jobscholarship_infor (ID,TITLE,CONTENT,ENTERPRISE,POLITICAL_STAFFID)
             VALUES ('$ID','$TITLE','$CONTENT','$ENTERPRISE','$staffid') ";
            $query = mysqli_query($connect, $sql);
            header('location: index.php?page_layout=danhsach');
        }
?>
 <link rel="stylesheet" href="../../../../css/main.css">
<?php
        require_once '../../navbar.php'
?>
<title> Thêm thông tin việc làm</title>
<div class="container-fluid" style="margin-top:7rem">
    <div class="card">
        <div class="card-header">
            <h2> Thêm việc làm</h2>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">  
                    <label for="">ID</label>
                    <input type="text" name="ID" class="form-control" required>
                </div>
                <div class="form-group">  
                    <label for="">Tên việc làm</label>
                    <input type="text" name="TITLE" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Thông tin</label>
                    <input type="text" name="CONTENT" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="">Doanh nghiệp</label>
                    <input type="text" name="ENTERPRISE" class="form-control" required>
                    
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