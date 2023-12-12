<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title> ALL PRODUCTS</title>
    <link rel="stylesheet" href="product.css">
   
</head>
<body>
    <a href="http://localhost/DoAn2/dangnhap/login.php">thoát</a>

    <?php include('menu.php')?>
    <div id="demo">
  <h1>PRODUCTS</h1>
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
                    // Kiểm tra xem tham số 'ID' đã được truyền qua URL chưa
            if (isset($_GET['ID'])) {
                // Lấy ID danh mục từ URL
                $iddanhmuc = $_GET['ID'];

                // Kết nối đến cơ sở dữ liệu
                $conn = mysqli_connect("localhost", "root", "", "dacs");

                // Kiểm tra kết nối
                if (!$conn) {
                    die("Kết nối thất bại: " . mysqli_connect_error());
                }

                // Sử dụng Prepared Statements để truy vấn an toàn
                $sql = "SELECT * FROM product WHERE id_brands = ?";
                $stmt = mysqli_prepare($conn, $sql);

                // Kiểm tra xem chuẩn bị câu truy vấn có thành công hay không
                if ($stmt) {
                    // Gán giá trị tham số và thực thi truy vấn
                    mysqli_stmt_bind_param($stmt, "i", $iddanhmuc);
                    mysqli_stmt_execute($stmt);

                    // Lấy kết quả
                    $result = mysqli_stmt_get_result($stmt);

                    // Hiển thị dữ liệu
                    while ($row = mysqli_fetch_array($result)) {
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

                    // Đóng câu truy vấn
                    mysqli_stmt_close($stmt);
                } else {
                    // Xử lý khi không thể chuẩn bị câu truy vấn
                    echo "Lỗi trong quá trình chuẩn bị truy vấn";
                }

                // Đóng kết nối
                mysqli_close($conn);
            } else {
                // Xử lý khi không có tham số 'ID' được truyền
                echo "Không có ID được truyền qua URL";
            }

        ?>
      </tbody>
    </table>
  </div>
  
  <!-- Table Constructor change table classes, you don't need it in your project -->
 
    
</div>






</body>
</html>
<script src="product.js"  type="text/javascript"></script>
