<!DOCTYPE html>
<html>
<head>
    <title>ADD BRAND</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
</head>
<body>
<div style="text-align: right; margin-right: 5em;"><a href="dangnhap.php">Thoát</a></div>
    
<?php include('menu.php')?>
    <div class="container">
        <h1>ADD BRAND</h1>
        <form class="form-horizontal" action="xulithembrand.php" method="post" enctype="multipart/form-data"> 
            <div class="form-group">
                <label class="control-label col-sm-2" for="tenbr">Tên:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tenbr" name="tenbr" required>
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

</html>