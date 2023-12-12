<?php
// Kết nối đến cơ sở dữ liệu của bạn
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dacs";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến CSDL thất bại: " . $conn->connect_error);
}

// Kiểm tra xem dữ liệu đã được gửi từ trình duyệt hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST["productId"];
    $newQuantity = $_POST["newQuantity"];

    // Truy vấn để lấy giá sản phẩm từ bảng product
    $sqlPrice = "SELECT product.price_pd 
                 FROM cart 
                 JOIN product ON cart.ID_sp = product.id_pd 
                 WHERE cart.ID = '$productId'";
    $resultPrice = $conn->query($sqlPrice);
    
    if ($resultPrice->num_rows > 0) {
        $row = $resultPrice->fetch_assoc();
        $price = $row["price_pd"];
        $total= $price*$newQuantity;

        // Update số lượng trong CSDL dựa trên id_sp
        $sql = "UPDATE cart 
        SET soluong = '$newQuantity', gia = '$total' 
        WHERE ID = '$productId'";
        if ($conn->query($sql) === TRUE) {
            echo json_encode(array("message" => "Cập nhật số lượng thành công"));
        } else {
            echo json_encode(array("error" => "Lỗi khi cập nhật số lượng: " . $conn->error));
        }
    } else {
        echo json_encode(array("error" => "Không tìm thấy thông tin sản phẩm"));
    }
} else {
    echo json_encode(array("error" => "Dữ liệu không hợp lệ"));
}

$conn->close();
?>
