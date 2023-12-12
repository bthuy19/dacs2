<?php


function add()
{
    $conn = mysqli_connect("localhost", "root", "", "dacs");
    if (!$conn) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }
    if (isset($_POST['ID_user']) && isset($_POST['ID_sp']) && isset($_POST['soluong'])) {
        $data = [
            'ID_user' => $_POST['ID_user'],
            'ID_sp' => $_POST['ID_sp'],
            'soluong' => $_POST['soluong']
        ];
        $sql_check_cart = "SELECT ID,soluong FROM `cart` WHERE ID_user=$data[ID_user] and ID_sp = $data[ID_sp]";
        $result_check_cart = mysqli_query($conn, $sql_check_cart);
        if ($result_check_cart && mysqli_num_rows($result_check_cart) > 0) {
            $row_check_cart = mysqli_fetch_assoc($result_check_cart);
            $data_check_cart = [
                "ID" => $row_check_cart['ID'],
                "soluong" => $row_check_cart['soluong']
            ];
            $sql_select_price_pd = "select price_pd from product where id_pd='$data[ID_sp]'";
            $result_select_price_pd = mysqli_query($conn, $sql_select_price_pd);
            if ($result_select_price_pd && mysqli_num_rows($result_select_price_pd) > 0) {
                $row_select_price_pd = mysqli_fetch_assoc($result_select_price_pd);
                $soluong_new = (int) $data['soluong'] + (int) $data_check_cart['soluong'];
                $price_new = (int) $row_select_price_pd['price_pd'] *  $soluong_new;
                $sql_update_cart = "UPDATE `cart` SET soluong ='$soluong_new' , gia = '$price_new' WHERE ID =  $data_check_cart[ID] ";
                $stmt = mysqli_prepare($conn, $sql_update_cart);
                $success = mysqli_stmt_execute($stmt);
                $payload = [];
                if ($success) {
                    $payload = [
                        'message' => 'Add successfully'
                    ];
                } else {
                    $payload = [
                        'message' => "Error add successfully."
                    ];
                }
                echo (json_encode($payload));
            }
            return;
        }
        $sql = "select price_pd from product where id_pd='$data[ID_sp]'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $price_total = $row['price_pd'] * $data['soluong'];
            $sql2 = "INSERT INTO `cart` (`ID`, `ID_user`, `ID_sp`, `soluong`, `gia`) VALUES (NULL, $data[ID_user], $data[ID_sp], $data[soluong], '$price_total');";
            $stmt = mysqli_prepare($conn, $sql2);
            $success = mysqli_stmt_execute($stmt);
            $payload = [];
            if ($success) {
                $payload = [
                    'message' => 'Add successfully'
                ];
            } else {
                $payload = [
                    'message' => "Error add successfully."
                ];
            }
            echo (json_encode($payload));
        }
    } else {
        echo "Recorrect format data.";
    }
    mysqli_close($conn);
}
add();

//early returning
