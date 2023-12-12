<!DOCTYPE html>
<html>
<head>
    <title>UPDATE PRODUCT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
</head>
<body>
<div style="text-align: right; margin-right: 5em;"><a href="dangnhap.php">Thoát</a></div>
    <?php
           session_start();

           // Kiểm tra nếu có tham số IDsp trong URL và gán giá trị của nó vào biến session
           if (isset($_GET['IDsp'])) {
               $_SESSION['id_sp'] = $_GET['IDsp'];
               // Lưu ID sản phẩm vào biến session 'id_sp'
               $id_sp = $_SESSION['id_sp'];
              
           }
    ?>
    
<?php include('menu.php')?>
    <div class="container">
        <h1>ADD PRODUCT</h1>
        <form class="form-horizontal" action="xulisua.php" method="post" enctype="multipart/form-data"> 
        <?php
         $id_sp = $_SESSION['id_sp'];
         $conn= mysqli_connect("localhost","root","","dacs");
         $sql= "SELECT name_pd from product WHERE id_pd = $id_sp";
         $KQ= mysqli_query($conn,$sql);
         while($row = mysqli_fetch_array($KQ)){
             echo '<div class="form-group">
             <label class="control-label col-sm-2" for="tensp">Tên:</label>
             <div class="col-sm-10">
                 <input type="text" class="form-control" id="tensp" name="tensp" value="'.$row['name_pd'].'" required>
             </div>
         </div>';
         }

        ?>   
        
        
       
            <div class="form-group">
                <label class="control-label col-sm-2" for="gia">Giá:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="gia" name="gia" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="soluong">SL:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="soluong" name="soluong" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="mota">Mô tả:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="mota" name="mota" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="chitiet">Chi tiết:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="chitiet" name="chitiet" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="iddanhmuc">ID danh mục:</label>
                <div class="col-sm-10">
                    <select class="form-control" id="iddanhmuc" name="iddanhmuc">
                        <?php
                        $conn= mysqli_connect("localhost","root","","dacs");
                        $sql= "SELECT * from brands";
                        $KQ= mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($KQ)){
                            echo '<option value="'.$row["id"].'">'.$row['name'].'</option>';
                        } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="fileToUpload">Chọn hình ảnh:</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="fileToUpload" name="fileToUpload">
                </div>
            </div>
            <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">THÊM</button>
                </div>
            </div>
        </form>
    </div>
</body>
<script type="text/javascript" src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
<script>
    CKEDITOR.replace('chitiet');
    CKEDITOR.replace('mota');

</script>
</html>