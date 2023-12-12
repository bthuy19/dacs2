<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'dacs');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT username, role FROM users WHERE password = '$password' AND username = '$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $user = $result->fetch_assoc();

            // Lưu thông tin người dùng vào session
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Kiểm tra role để chuyển hướng tới trang phù hợp
            if ($user['role'] == 'admin') {
                header('Location: http://localhost/DoAn2/admin/brands.php');
                exit;
            } else {
                header('Location: http://localhost/DoAn2/GUI/minishop-master/index.php');
                exit;
            }
        } else {
            echo "Fail";
        }
    }
?>
