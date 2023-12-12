<?php
    $conn = mysqli_connect("localhost", "root", "", "dacs");

    if (!$conn) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }

    if (isset($_GET['IDSP'])) {
        $product_id = $_GET['IDSP'];

        // Sử dụng prepared statement để xóa sản phẩm từ giỏ hàng
        $query = "DELETE FROM cart WHERE ID_sp = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $product_id);
            $success = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            
            if ($success) {
                echo "Sản phẩm đã được xóa khỏi giỏ hàng.";
            } else {
                echo "Lỗi khi xóa sản phẩm khỏi giỏ hàng.";
            }
        } else {
            echo "Lỗi trong quá trình chuẩn bị truy vấn.";
        }
    } else {
        echo "Không có ID được truyền qua GET.";
    }

    mysqli_close($conn);
?>