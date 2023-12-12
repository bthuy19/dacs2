<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title> ALL PRODUCTS</title>
    <link rel="stylesheet" href="product.css">
  
</head>
<body>
  <?php include('menu.php')?>
    
    <div id="demo">
  <h1>PRODUCTS</h1>



  <div class="table-responsive-vertical shadow-z-1">
  <table id="table" class="table table-hover table-mc-light-blue">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $conn = mysqli_connect("localhost","root","","dacs");
        // danh sách danh mục
        $sql = "SELECT * from brands";
        $KQ = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($KQ)) {
            echo '<tr>
            <td data-title="ID">' . $row['id'] . '</td>
            <td data-title="Name"><a href="product.php?ID='.$row['id'].'">' . $row['name'] . '</td> 
            <td data-title="Delete"><a href="deletebr.php?ID='.$row['id'].'">DELETE</td> 
            </tr>';    
        }
        ?>
      </tbody>
    </table>
  </div>

  
  <div class="table-responsive-vertical shadow-z-1">
  <table id="table" class="table table-hover table-mc-light-blue">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Delete</th>
          <th>Fix</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $conn = mysqli_connect("localhost","root","","dacs");
        // danh sách sản phẩm
        $sql = "SELECT * from product";
        $KQ = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($KQ)) {?>
          <!-- <div class="col-md-4">
                <img src="<?php echo $row['img']; ?>" class="img-responsive">
            </div> -->
            <?php
          
            echo '<tr>
            <td data-title="ID">' . $row['id_pd'] . '</td>
            <td data-title="Name">' . $row['name_pd'] . '</td>
            <td data-title="Price">' . $row['price_pd'] . '</td>
            <td data-title="Quantity">' . $row['soluong'] . '</td>

            <td data-title="Delete">
                <a href="delete.php?IDsp='.$row['id_pd'].'" >Delete</a>
            </td>
            <td data-title="Fix">
                <a href="suasp.php?IDsp='.$row['id_pd'].'" >Fix</a>
            </td>
          
            </tr>';
            
        }
      
        ?>
      </tbody>
    </table>
  </div>   
</div>





<a href="http://localhost/DoAn2/dangnhap/login.php">thoát</a>
</body>
</html>
<script src="product.js"  type="text/javascript"></script>
