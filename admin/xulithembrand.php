<?php
$conn= mysqli_connect("localhost","root","","dacs");
$ten=$_POST['tenbr'];
$sql= "INSERT INTO brands(name) VALUES('$ten') ";
if ($conn->query($sql) === TRUE) {
    echo "Tên đã được thêm mới thành công vào CSDL!";
} else {
    echo "Lỗi khi thêm tên vào CSDL: " . $conn->error;
}

// Đóng kết nối đến cơ sở dữ liệu
$conn->close();
?>