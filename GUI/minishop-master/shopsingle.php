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
  </head>
  <body class="goto-here">
		<div class="py-1 bg-black">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
				<?php
    session_start();

    // Kiểm tra nếu người dùng đã đăng nhập bằng session
    if(isset($_SESSION['username'])) {
        // Kết nối đến CSDL
        $conn = mysqli_connect('localhost', 'root', '', 'dacs');

        // Kiểm tra kết nối
        if (!$conn) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }

        // Lấy thông tin từ session
        $username = $_SESSION['username'];

        // Truy vấn dữ liệu từ bảng users cho người đăng nhập hiện tại
        $sql = "SELECT email FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        // Kiểm tra và hiển thị thông tin nếu có kết quả trả về
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

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
    <?php include("nav.php")?>
    <?php  

// Kiểm tra nếu có tham số IDsp trong URL và gán giá trị của nó vào biến session
if (isset($_GET['IDbr'])) {
    $_SESSION['idbr'] = $_GET['IDbr'];
    // Lưu ID sản phẩm vào biến session 'id_sp'
    $idbr = $_SESSION['idbr'];
   
}

    ?>
    
    
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Shop</span></p>
            <h1 class="mb-0 bread">Shop</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-8 col-lg-10 order-md-last">
    				<div class="row">

				<?php
              
					$conn = mysqli_connect('localhost', 'root', '', 'dacs');

					if (!$conn) {
						die("Kết nối thất bại: " . mysqli_connect_error());
					}
                    $idbr = $_SESSION['idbr'];

                    $sql = "SELECT product.*, brands.name 
                            FROM product 
                            INNER JOIN brands ON product.id_brands = brands.id
                            WHERE brands.id = '$idbr'";
					$KQ = mysqli_query($conn, $sql);

					if ($KQ && mysqli_num_rows($KQ) > 0) {
						while ($row = mysqli_fetch_assoc($KQ)) {
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
                ?>
<?php
							 echo '<p class="bottom-area d-flex px-3">
               <a href="addtocart.php?ID_sp=' . $row['id_pd'] .'" class="add-to-cart text-center py-2 mr-1">
                       <span>Add to cart <i class="ion-ios-add ml-1"></i></span>
                   </a>
                   <a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
               </p>';

							echo '';

							echo '</div>
								</div>
								</div>';
						}
					} else {
						echo 'Không có kết quả nào.';
					}

					mysqli_close($conn);
					?>










		    			
		    			
		    		</div>
		    		<div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
		              <ul>
		                <li><a href="#">&lt;</a></li>
		                <li class="active"><span>1</span></li>
		                <li><a href="#">2</a></li>
		                <li><a href="#">3</a></li>
		                <li><a href="#">4</a></li>
		                <li><a href="#">5</a></li>
		                <li><a href="#">&gt;</a></li>
		              </ul>
		            </div>
		          </div>
		        </div>
		    	</div>

		    	<div class="col-md-4 col-lg-2">
		    		<div class="sidebar">
							<div class="sidebar-box-2">
								<h2 class="heading"><a href="shop.php">Categories</a></h2>
								<div class="fancy-collapse-panel">
                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                     <div class="panel panel-default">
                         <div class="panel-heading" role="tab" id="headingOne">
                             <h4 class="panel-title">
                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Brands
                                 </a>
                             </h4>
                         </div>
                         <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
						 <?php
								$conn = mysqli_connect('localhost', 'root', '', 'dacs');

								if (!$conn) {
									die("Kết nối thất bại: " . mysqli_connect_error());
								}

								$sql = "SELECT id, name FROM brands";
								$result = mysqli_query($conn, $sql);

								$brands = array(); // Khởi tạo mảng để lưu trữ danh sách thương hiệu

								if ($result && mysqli_num_rows($result) > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
										$brands[] = $row; // Thêm thông tin thương hiệu vào mảng
									}
								}

								mysqli_close($conn);
							?>

							<div class="panel-body">
								<ul>
								<?php foreach ($brands as $single_brand) : ?>
									<li><a href="shopsingle.php?IDbr=<?= $single_brand['id'] ?>"><?= $single_brand['name'] ?></a></li>
								<?php endforeach; ?>
								</ul>
							</div>
                         </div>
                     </div>
                     </div>
                  </div>
               </div>
			   
							</div>
                            <div class="sidebar-box-2">
        <h2 class="heading">Price Range</h2>
        <form method="post" class="colorlib-form-2" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="guests">Price from:</label>
                        <div class="form-field">
                            <i class="icon icon-arrow-down3"></i>
                            <input type="text" class="form-control" id="price_from" name="price_from" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="guests">Price to:</label>
                        <div class="form-field">
                            <i class="icon icon-arrow-down3"></i>
                            <input type="text" class="form-control" id="price_to" name="price_to" required>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="search">Search</button>
        </form>
    </div>

    <?php
    // Kiểm tra nếu có dữ liệu gửi từ form
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
        $conn = mysqli_connect('localhost', 'root', '', 'dacs');
        if (!$conn) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }

        $price_from = $_POST['price_from'];
        $price_to = $_POST['price_to'];

        $sql = "SELECT * FROM product WHERE price_pd BETWEEN $price_from AND $price_to";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Hiển thị thông tin sản phẩm tìm được
                echo  '<a href="product_single.php?IDSP='.$row['id_pd'].'"' . $row['name_pd'] .'</a>' ;
                echo '<br>';
            }
        } else {
            echo 'Không có sản phẩm nào trong phạm vi giá này.';
        }

        mysqli_close($conn);
    }
    ?>
						</div>
    			</div>
    		</div>
    	</div>
    </section>
		
		<section class="ftco-gallery">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-8 heading-section text-center mb-4 ftco-animate">
            <h2 class="mb-4">Follow Us On Instagram</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
          </div>
    		</div>
    	</div>
    	<div class="container-fluid px-0">
    		<div class="row no-gutters">
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-1.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-1.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-2.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-2.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-3.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-3.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-4.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-4.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-5.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-5.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-6.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-6.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
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
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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