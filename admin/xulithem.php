<?php
$conn = mysqli_connect("localhost", "root", "", "dacs");

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

$tensp = $_POST['tensp'];
$gia = $_POST['gia'];
$soluong = $_POST['soluong'];
$iddanhmuc = $_POST['iddanhmuc'];
$mota = $_POST['mota'];
$chitiet = $_POST['chitiet'];
$target_dir = "../IMG/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Kiểm tra file đã tồn tại hay chưa
if (file_exists($target_file)) {
    echo "Tệp đã tồn tại.";
    $uploadOk = 0;
}

// Kiểm tra kích thước file
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Tệp quá lớn.";
    $uploadOk = 0;
}

// Kiểm tra định dạng file
if (!in_array($imageFileType, array("jpg", "png", "jpeg", "gif"))) {
    echo "Chỉ được phép tải lên các tệp ảnh.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Tệp của bạn không được tải lên.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $path = $target_dir . $_FILES["fileToUpload"]["name"];
        $sql = "INSERT INTO product(name_pd, price_pd, mota, img, chitiet, soluong, id_brands) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {      
            mysqli_stmt_bind_param($stmt, "sisssii", $tensp, $gia, $mota, $path, $chitiet, $soluong, $iddanhmuc);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo "Sản phẩm đã được thêm thành công.";
        } else {
            echo "Lỗi trong quá trình chuẩn bị truy vấn";
        }
    } else {
        echo "Đã xảy ra lỗi khi tải lên tệp.";
    }
}

mysqli_close($conn);
header('Location: themsp.php');
?>