<?php
    $conn = mysqli_connect("localhost", "root", "", "dacs");

    // Kiểm tra kết nối
    if (!$conn) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }

    // Kiểm tra xem có tham số 'ID' được truyền qua URL không
    if (isset($_GET['IDsp'])) {
        // Sử dụng prepared statements để xóa sản phẩm
        $query = "DELETE FROM product WHERE id_pd = ?";
        $stmt = mysqli_prepare($conn, $query);

        // Kiểm tra xem câu lệnh prepared có được chuẩn bị thành công không
        if ($stmt) {
            // Gán giá trị cho tham số ID
            mysqli_stmt_bind_param($stmt, "i", $_GET['IDsp']);

            // Thực thi câu lệnh prepared
            mysqli_stmt_execute($stmt);

            // Đóng câu lệnh prepared
            mysqli_stmt_close($stmt);

            echo "Xóa sản phẩm thành công.";
        } else {
            echo "Lỗi trong quá trình chuẩn bị truy vấn.";
        }
    } else {
        echo "Không có ID được truyền qua URL.";
    }

    // Đóng kết nối
    mysqli_close($conn);
?>