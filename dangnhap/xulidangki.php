<?php


// Kết nối với cơ sở dữ liệu
$conn = mysqli_connect("localhost", "root", "", "dacs");

// Kiểm tra phương thức HTTP
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Lấy dữ liệu từ biểu mẫu
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Kiểm tra xem tên người dùng đã tồn tại chưa
    $sql = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "Tên người dùng đã tồn tại!";
    } else {

        // Thêm dữ liệu vào cơ sở dữ liệu
        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
        mysqli_query($conn, $sql);

        // Chuyển hướng đến trang đăng nhập
        header("Location: login.php");
    }
}
?>