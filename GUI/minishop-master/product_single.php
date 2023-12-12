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
</head>

<body class="goto-here">
	<?php $conn = mysqli_connect('localhost', 'root', '', 'dacs'); ?>
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
							echo '<input type="text" id="id_user_add_to_cart" hidden value="' . $row['id_user'] . '"/>';
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
					<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Shop</span></p>
					<h1 class="mb-0 bread">Shop</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section">
		<div class="container">
			<div class="row">
				<?php
				$idsanpham = $_GET['IDSP'];
				$conn = mysqli_connect('localhost', 'root', '', 'dacs');
				$sql = "SELECT * FROM product where id_pd = $idsanpham ";
				$KQ = mysqli_query($conn, $sql);

				while ($row = mysqli_fetch_array($KQ)) {
					echo '<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="images/product-1.png" class="image-popup prod-img-bg"><img src="../' . $row['img'] . '" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
				
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">';
				}

				?>
				<?php
				$idsanpham = $_GET['IDSP'];
				$conn = mysqli_connect('localhost', 'root', '', 'dacs');
				$sql = "SELECT * FROM product where id_pd = $idsanpham ";
				$KQ = mysqli_query($conn, $sql);

				while ($row = mysqli_fetch_array($KQ)) {
					echo '<h3>' . $row['name_pd'] . '</h3>';
				}
				?>
				<div class="rating d-flex">
					<p class="text-left mr-4">
						<a href="#" class="mr-2">5.0</a>
						<a href="#"><span class="ion-ios-star-outline"></span></a>
						<a href="#"><span class="ion-ios-star-outline"></span></a>
						<a href="#"><span class="ion-ios-star-outline"></span></a>
						<a href="#"><span class="ion-ios-star-outline"></span></a>
						<a href="#"><span class="ion-ios-star-outline"></span></a>
					</p>
					<p class="text-left mr-4">
						<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
					</p>
					<p class="text-left">
						<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
					</p>
				</div>
				<?php
				$conn = mysqli_connect('localhost', 'root', '', 'dacs');
				$sql = "SELECT * FROM product where id_pd = $idsanpham ";
				$KQ = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_array($KQ)) {
					$slsp=$row['soluong'];
					echo '<input type="text" id="id_product_add_to_cart" hidden value="' . $idsanpham . '"/>';
					echo '<p class="price"><span>' . $row['price_pd'] . '</span></p>';
					echo '<p>' . $row['mota'] . '</p>';
				}
				?>
				</p>
				<div class="row mt-4">
					<div class="col-md-6">
						<div class="form-group d-flex">
							<div class="select-wrap">

							</div>
						</div>
					</div>
					<div class="w-100"></div>
					<div class="input-group col-md-6 d-flex mb-3">
						<span class="input-group-btn mr-2">
							<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
								<i class="ion-ios-remove"></i>
							</button>
						</span>


						<!-- input so luong -->
						<input type="number" id="quantity" name="quantity" class="quantity form-control input-number" value="1" min="1" max="<?php echo $slsp ?>" disabled>

						<script>
							var quantityValue = document.getElementById("quantity").value;
						</script>
						<span class="input-group-btn ml-2">
							<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
								<i class="ion-ios-add"></i>
							</button>
						</span>
					</div>
					<div class="w-100"></div>
					<?php

					$conn = mysqli_connect('localhost', 'root', '', 'dacs');
					$sql = "SELECT * FROM product where id_pd = $idsanpham ";
					$KQ = mysqli_query($conn, $sql);

					while ($row = mysqli_fetch_array($KQ)) {
						echo '
	          	<div class="col-md-12">
	          		<p style="color: #000;">' . $row['soluong'] . ' piece available</p>
	          	</div>';
					}
					?>
				</div>
				<?php
				$conn = mysqli_connect('localhost', 'root', '', 'dacs');

				if (!$conn) {
					die("Kết nối thất bại: " . mysqli_connect_error());
				}


				$sql = "SELECT product.*
					FROM product 
					
					";
				$KQ = mysqli_query($conn, $sql);

				if ($KQ && mysqli_num_rows($KQ) > 0) {
					while ($row = mysqli_fetch_assoc($KQ)) {

						echo '<p class="bottom-area d-flex px-3">
              <a class="btn btn-black py-3 px-5 mr-2" onclick="addToCard()">
                      <span>Add to cart <i class="ion-ios-add ml-1"></i></span>
                  </a>
              </p>';

				?>
						<script>
							var quantities = 0;
							$(document).ready(function() {
								$('.quantity-right-plus').click(function(e) {
									e.preventDefault();
									quantities = parseInt($('#quantity').val()) + 1;
									$('#quantity').val(quantities);
								});

								$('.quantity-left-minus').click(function(e) {
									e.preventDefault();
									quantities = parseInt($('#quantity').val()) - 1;
									if (quantity > 0) {
										$('#quantity').val(quantities);
									}
								});
							});
							const addToCard = () => {
								const data = {
									ID_user: parseInt($('#id_user_add_to_cart').val()),
									ID_sp: parseInt($('#id_product_add_to_cart').val()),
									soluong: quantities
								}
								$.post('add_to_cart.php', data, (data) => {
									const payload = JSON.parse(data);
									alert(payload.message);
								})
								quantities = 0;
								$('#quantity').val(0);
							}
						</script>
						
			</div>
		</div>

		<div class="row mt-5">
			<div class="col-md-12 nav-link-wrap">
				<div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Description</a>

					<a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Reviews</a>

				</div>
			</div>
			<div class="col-md-12	 tab-wrap">

				<div class="tab-content bg-light" id="v-pills-tabContent">

					<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
						<div class="p-4">
					<?php
						$conn = mysqli_connect('localhost', 'root', '', 'dacs');
						$sql = "SELECT * FROM product where id_pd = $idsanpham ";
						$KQ = mysqli_query($conn, $sql);

						while ($row = mysqli_fetch_array($KQ)) {
							echo '<h3 class="mb-4">' . $row['name_pd'] . '</h3>';
							echo '<p>' . $row['chitiet'] . '</p>';
						}
					}
				}

					?>
						</div>
					</div>

					<div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
					</div>
					<div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
						<div class="row p-4">
							<div class="col-md-7">
								<h3 class="mb-4">23 Reviews</h3>
								<div class="review">
									<div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
									<div class="desc">
										<h4>
											<span class="text-left">Jacob Webb</span>
											<span class="text-right">14 March 2018</span>
										</h4>
										<p class="star">
											<span>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
											</span>
											<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
										</p>
										<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
									</div>
								</div>
								<div class="review">
									<div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
									<div class="desc">
										<h4>
											<span class="text-left">Jacob Webb</span>
											<span class="text-right">14 March 2018</span>
										</h4>
										<p class="star">
											<span>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
											</span>
											<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
										</p>
										<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
									</div>
								</div>
								<div class="review">
									<div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
									<div class="desc">
										<h4>
											<span class="text-left">Jacob Webb</span>
											<span class="text-right">14 March 2018</span>
										</h4>
										<p class="star">
											<span>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
											</span>
											<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
										</p>
										<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="rating-wrap">
									<h3 class="mb-4">Give a Review</h3>
									<p class="star">
										<span>
											<i class="ion-ios-star-outline"></i>
											<i class="ion-ios-star-outline"></i>
											<i class="ion-ios-star-outline"></i>
											<i class="ion-ios-star-outline"></i>
											<i class="ion-ios-star-outline"></i>
											(98%)
										</span>
										<span>20 Reviews</span>
									</p>
									<p class="star">
										<span>
											<i class="ion-ios-star-outline"></i>
											<i class="ion-ios-star-outline"></i>
											<i class="ion-ios-star-outline"></i>
											<i class="ion-ios-star-outline"></i>
											<i class="ion-ios-star-outline"></i>
											(85%)
										</span>
										<span>10 Reviews</span>
									</p>
									<p class="star">
										<span>
											<i class="ion-ios-star-outline"></i>
											<i class="ion-ios-star-outline"></i>
											<i class="ion-ios-star-outline"></i>
											<i class="ion-ios-star-outline"></i>
											<i class="ion-ios-star-outline"></i>
											(98%)
										</span>
										<span>5 Reviews</span>
									</p>
									<p class="star">
										<span>
											<i class="ion-ios-star-outline"></i>
											<i class="ion-ios-star-outline"></i>
											<i class="ion-ios-star-outline"></i>
											<i class="ion-ios-star-outline"></i>
											<i class="ion-ios-star-outline"></i>
											(98%)
										</span>
										<span>0 Reviews</span>
									</p>
									<p class="star">
										<span>
											<i class="ion-ios-star-outline"></i>
											<i class="ion-ios-star-outline"></i>
											<i class="ion-ios-star-outline"></i>
											<i class="ion-ios-star-outline"></i>
											<i class="ion-ios-star-outline"></i>
											(98%)
										</span>
										<span>0 Reviews</span>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
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



</body>

</html>