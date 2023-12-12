<!DOCTYPE html>
<html lang="en">

<head>
	<title>Minishop - Free Bootstrap 4 Template by Colorlib</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/ionicons.min.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">


	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="goto-here">
	<div class="py-1 bg-black">
		<div class="container">
			<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
				<div class="col-lg-12 d-block">
					<?php
					session_start();

					// Kiểm tra nếu người dùng đã đăng nhập bằng session
					if (isset($_SESSION['username'])) {
						// Kết nối đến CSDL
						$conn = mysqli_connect('localhost', 'root', '', 'dacs');

						// Kiểm tra kết nối
						if (!$conn) {
							die("Kết nối thất bại: " . mysqli_connect_error());
						}

						// Lấy thông tin từ session
						$username = $_SESSION['username'];

						// Truy vấn dữ liệu từ bảng users cho người đăng nhập hiện tại
						$sql = "SELECT email, id_user FROM users WHERE username = '$username'";
						$result = mysqli_query($conn, $sql);

						// Kiểm tra và hiển thị thông tin nếu có kết quả trả về
						if ($result && mysqli_num_rows($result) > 0) {
							$row = mysqli_fetch_assoc($result);
							$id_user= $row['id_user'];

							// Hiển thị thông tin name và email trong phần HTML
							echo '<div class="row d-flex">';
							echo '<div class="col-md pr-4 d-flex topper align-items-center">';
							echo '<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>';
							echo '<span class="text">' . $username . '</span>';
							echo '</div>';
							echo '<div class="col-md pr-4 d-flex topper align-items-center">';
							echo '<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>';
							echo '<span class="text">' . $row['email'] . '</span>';
							echo '</div>';
							echo '</div>';
						} else {
							echo 'Không có dữ liệu.';
						}

						// Đóng kết nối CSDL
						mysqli_close($conn);
					} else {
						echo 'Người dùng chưa đăng nhập.';
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<?php include("nav.php")
	?>
	<!-- END nav -->

	<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
					<h1 class="mb-0 bread">My Wishlist</h1>
				</div>
				
			</div>
		</div>
	</div>

	<section class="ftco-section ftco-cart">
		<div class="container">
			<div class="row">
				<div class="col-md-12 ftco-animate">
					<div class="cart-list">
						<table class="table">
							<thead class="thead-primary">
								<tr class="text-center">
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>Product</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
									<th></th>
								</tr>
							</thead>
							<tbody>


								<?php


								if (isset($_SESSION['username'])) {
									$conn = mysqli_connect("localhost", "root", "", "dacs");
									$username = $_SESSION['username'];

									// Lấy id_user từ bảng users
									$sql_id_user = "SELECT id_user FROM users WHERE username = '$username'";
									$result_id_user = mysqli_query($conn, $sql_id_user);

									if ($result_id_user && mysqli_num_rows($result_id_user) > 0) {
										$row_id_user = mysqli_fetch_assoc($result_id_user);
										$id_user = $row_id_user['id_user'];

										// Truy vấn để lấy thông tin của các sản phẩm trong giỏ hàng của người dùng
										$sql_product_info = "SELECT product.id_pd ,product.name_pd, product.price_pd, product.img,product.soluong AS slsp , cart.soluong, cart.ID
											FROM product
											INNER JOIN cart ON product.id_pd = cart.ID_sp
											WHERE cart.ID_user = '$id_user'";
										$result_product_info = mysqli_query($conn, $sql_product_info);

										if ($result_product_info && mysqli_num_rows($result_product_info) > 0) {
											$count = 0;
											while ($row_product = mysqli_fetch_assoc($result_product_info)) {
												$id_pd = $row_product['id_pd'];
												$ID= $row_product['ID'];
												$name_pd = $row_product['name_pd'];
												$price_pd = $row_product['price_pd'];
												$img = $row_product['img'];
												$soluong = $row_product['soluong'];$soluongsp=$row_product['slsp'];


												// Hiển thị thông tin chi tiết sản phẩm
												echo '<tr class="text-center" id="product_' . $id_pd . '_' . $count . '">
												<input id=id__sp value="'.$ID.'" style="display: none;">
								<td class="product-remove" id=>
								<a href="#" onclick="deleteCartItem(' . $id_pd . ', `product_' . $id_pd . '_' . $count . '` );"><span class="ion-ios-close"></span></a></td>
															
															<td class="image-prod"><img class="img" src="../' . $img . '" alt="Colorlib Template"></td>
															<td class="product-name">
																<h3><a style="color: black;" href="product_single.php?IDSP=' . $id_pd . '">' . $name_pd . '</a></h3>
															</td>
															<td class="price" name="price"><input id="price" value="' . $price_pd . '" style="border: none; width: 100px;  padding-left: 12px;"></td>
															<td class="quantity" name="quantity" id="quantity">
															<div class="input-group mb">
																<div class="input-group-prepend">
																	<button style="width: 50px;" class="btn btn-outline-secondary decrease-btn" type="button">-</button>
																</div>
																<input type="text" name="quantity" id="quantityInput" class="quantity form-control input-number" value="' . $soluong . '" min="1" max="' . $soluongsp . '" disabled>
																<div class="input-group-append">
																	<button style="width: 50px;"class="btn btn-outline-secondary increase-btn" type="button">+</button>
																</div>
															</div>
														</td>
														
														';
														

												$total = $soluong * $price_pd;
												echo '<td class="total" ><input id="price" class ="product-total" value="' . $total . '" style="border: none; width: 100px;  padding-left: 12px;"></td>
												<td class="product-update" id=>
								<a href="#" "><span class="ion-ios-checkmark"></span></a></td>
															</tr>';
												$count += 1;
											}
										} else {
											echo 'Không có sản phẩm trong giỏ hàng.';
										}
									} else {
										echo 'Người dùng chưa có sản phẩm trong giỏ hàng.';
									}
								} else {
									echo 'Vui lòng đăng nhập để xem giỏ hàng.';
								}
								?>
								<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
								<script>
									$(document).ready(function() {
    $('.product-update').on('click', function() {
        var item = $(this).closest('.cart-list');
		var quantityValue = $('#quantityInput').val();
		var price = $('#price').val();
		var total=price*quantityValue;
        var newQuantity = parseInt(quantityValue-1) + 1;
		var productId = $('#id__sp').val(); 
		console.log('giá:', price);
       			 console.log('total:', total);
        
        // Gửi yêu cầu AJAX để cập nhật số lượng trên cơ sở dữ liệu
        $.ajax({
            url: 'xulisl.php', // Địa chỉ URL để xử lý cập nhật số lượng
            method: 'POST',
            data: { productId: productId, newQuantity: newQuantity }, // Gửi dữ liệu số lượng mới
            success: function(response) {
                // Nếu cập nhật thành công, cập nhật số lượng trên giao diện
				console.log('Số lượng:', newQuantity);
       			 console.log('ID:', productId);
        
				$('#quantityInput').val(newQuantity);
				$('#total').val(total);
				

                console.log('Số lượng đã được cập nhật thành công');
            },
            error: function(error) {
                console.error('Lỗi khi cập nhật số lượng:', error);
            }
        });
    });
});



								</script>

								<script>
									const deleteCartItem = (product_id,id_row_pd) => {
										if (confirm("Bạn có muốn xóa sản phẩm này khỏi giỏ hàng không?")) {
											$(`#${id_row_pd}`).remove()
											$.get("deletecart.php", {
												IDSP: product_id
											})
										}
									}
									
								</script>
								<script>
									document.querySelectorAll('.increase-btn').forEach(function(button) {
    button.addEventListener('click', function(event) {
        var clickedButton = event.target;
        var input = clickedButton.parentNode.parentNode.querySelector('.quantity.input-number');
        var currentValue = parseInt(input.value);
        var maxValue = parseInt(input.getAttribute('max'));
        if (currentValue < maxValue) {
            input.value = currentValue + 1;
        }
    });
});

document.querySelectorAll('.decrease-btn').forEach(function(button) {
    button.addEventListener('click', function(event) {
        var clickedButton = event.target;
        var input = clickedButton.parentNode.parentNode.querySelector('.quantity.input-number');
        var currentValue = parseInt(input.value);
        var minValue = parseInt(input.getAttribute('min'));
        if (currentValue > minValue) {
            input.value = currentValue - 1;
        }
    });
});
								</script>


<script>
	$(document).ready(function() {
    calculateSubtotal();

    $('.product-total').on('change', function() {
        calculateSubtotal();
    });
});

function calculateSubtotal() {
    var subtotal = 0;

    // Duyệt qua tất cả các sản phẩm và tính tổng các giá trị total
    $('.product-total').each(function() {
        var productTotal = parseFloat($(this).val());
        if (!isNaN(productTotal)) {
            subtotal += productTotal;
        }
    });
	localStorage.setItem('subtotal', subtotal);
    // Hiển thị giá trị subtotal
    $('#subtotalInput').val(subtotal);
	$('#subtotalInput2').val(subtotal);
}
						</script>

								<!-- END TR-->
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row justify-content-start">
				<div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
					<div class="cart-total mb-3">
						<h3>Cart Totals</h3>
						<p class="d-flex">
							<span>Subtotal</span>
							<span><input id="subtotalInput" style="border: none; background-color: white;" value="" disabled></span>
						</p>
						<p class="d-flex">
							<span>Delivery</span>
							<span>$0.00</span>
						</p>
						<p class="d-flex">
							<span>Discount</span>
							<span>$0.00</span>
						</p>
						<hr>
						<p class="d-flex total-price">
							<span>Total</span>
							<input id="subtotalInput2" style="border: none; background-color: white;" value="" disabled></span>
						</p>
					</div>
					<p class="text-center"><a href="checkout.php?ID=<?php echo $id_user ?>" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
				</div>
			</div>
		</div>
	</section>


	<footer class="ftco-footer ftco-section">
		<div class="container">
			<div class="row">
				<div class="mouse">
					<a href="#" class="mouse-icon">
						<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
					</a>
				</div>
			</div>
			<div class="row mb-5">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Minishop</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
							<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4 ml-md-5">
						<h2 class="ftco-heading-2">Menu</h2>
						<ul class="list-unstyled">
							<li><a href="#" class="py-2 d-block">Shop</a></li>
							<li><a href="#" class="py-2 d-block">About</a></li>
							<li><a href="#" class="py-2 d-block">Journal</a></li>
							<li><a href="#" class="py-2 d-block">Contact Us</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Help</h2>
						<div class="d-flex">
							<ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
								<li><a href="#" class="py-2 d-block">Shipping Information</a></li>
								<li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
								<li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
								<li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
							</ul>
							<ul class="list-unstyled">
								<li><a href="#" class="py-2 d-block">FAQs</a></li>
								<li><a href="#" class="py-2 d-block">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
								<li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
								<li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">

					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>
			</div>
		</div>
	</footer>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
		</svg></div>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>

	<script>
		$(document).ready(function() {

			var quantitiy = 0;
			$('.quantity-right-plus').click(function(e) {

				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

				// If is not undefined

				$('#quantity').val(quantity + 1);


				// Increment

			});
			time
			$('.quantity-left-minus').click(function(e) {
				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

				// If is not undefined

				// Increment
				if (quantity > 0) {
					$('#quantity').val(quantity - 1);
				}
			});

		});
	</script>

</body>

</html>