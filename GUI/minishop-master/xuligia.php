<?php
    // Kết nối đến cơ sở dữ liệu
    $conn = mysqli_connect('localhost', 'root', '', 'dacs');

    if (!$conn) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }

    // Lấy giá trị mức giá từ form hoặc các ô lựa chọn
    $price_from = $_POST['price_from']; // Giả sử giá trị này lấy từ form POST
    $price_to = $_POST['price_to']; // Giả sử giá trị này lấy từ form POST

    // Tạo truy vấn SQL dựa trên mức giá được chọn
    $sql = "SELECT * FROM product WHERE price_pd BETWEEN $price_from AND $price_to";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
									<div class="product d-flex flex-column">
										<a href="#" class="img-prod">
											<img class="img-fluid" src="../' . $row['img'] . '" alt="Colorlib Template">
											<div class="overlay"></div>
										</a>
										<div class="text py-3 pb-4 px-3">
											<div class="d-flex">
											<div class="cat">
									<span>' . $row['name'] . '</span>
								</div>
												<div class="rating">
													<p class="text-right mb-0">
														<a href="#"><span class="ion-ios-star-outline"></span></a>
														<a href="#"><span class="ion-ios-star-outline"></span></a>
														<a href="#"><span class="ion-ios-star-outline"></span></a>
														<a href="#"><span class="ion-ios-star-outline"></span></a>
														<a href="#"><span class="ion-ios-star-outline"></span></a>
													</p>
												</div>
											</div>';

							echo '<h3><a href="product_single.php?IDSP=' . $row['id_pd'] . '">' . $row['name_pd'] . '</a></h3>';

							echo '<div class="pricing">
									<p class="price"><span>' . $row['price_pd'] . 'VND</span></p>
								</div>';

							echo '<p class="bottom-area d-flex px-3">
									<a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
									<a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
								</p>';

							echo '';

							echo '</div>
								</div>
								</div>';
        }
    } else {
        echo 'Không có sản phẩm nào trong mức giá này.';
    }

    // Đóng kết nối đến cơ sở dữ liệu
    mysqli_close($conn);
?>