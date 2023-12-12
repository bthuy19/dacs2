<?php
$conn = mysqli_connect('localhost', 'root', '', 'dacs');

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

if (isset($_GET['id_pd']) && isset($_GET['quantity'])) {
    $id_pd = $_GET['id_pd'];
    $quantity = $_GET['quantity'];

    // Update số lượng trong bảng cart
    $sql_update = "UPDATE cart SET soluong = $quantity WHERE ID_sp = $id_pd";

    if (mysqli_query($conn, $sql_update)) {
        // Lấy giá sản phẩm từ bảng product
        $sql_get_price = "SELECT price_pd FROM product WHERE id_pd = $id_pd";
        $result_price = mysqli_query($conn, $sql_get_price);

        if ($result_price && mysqli_num_rows($result_price) > 0) {
            $row_price = mysqli_fetch_assoc($result_price);
            $price = $row_price['price_pd'];

            // Tính lại giá trị total
            $total = $price * $quantity;
            echo $total; // Trả về giá trị total mới tính toán để cập nhật lên giao diện
        } else {
            echo "Không tìm thấy giá sản phẩm.";
        }
    } else {
        echo "Lỗi khi cập nhật số lượng: " . mysqli_error($conn);
    }
} else {
    echo 'Thiếu thông tin sản phẩm hoặc số lượng.';
}

mysqli_close($conn);
?>