<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">MingC</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catalog</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.php">Shop</a>
                <a class="dropdown-item" href="product_single.php">Single Product</a>
                <a class="dropdown-item" href="cart.php">Cart</a>
                <a class="dropdown-item" href="checkout.php">Checkout</a>
              </div>
            </li>
	          <li class="nav-item active"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
			  <?php
			  $conn = mysqli_connect("localhost", "root", "", "dacs");

			  // Kiểm tra session và lấy ID_user từ session
			
			  if (isset($_SESSION['username'])) {
				  $username = $_SESSION['username'];
			  
				  // Truy vấn để lấy ID_user
				  $sql_id_user = "SELECT id_user FROM users WHERE username = '$username'";
				  $result_id_user = mysqli_query($conn, $sql_id_user);
			  
				  if ($result_id_user && mysqli_num_rows($result_id_user) > 0) {
					  $row_user = mysqli_fetch_assoc($result_id_user);
					  $id_user = $row_user['id_user'];
			  
					  // Truy vấn để đếm số lượng sản phẩm trong giỏ hàng
					  $sql_count_cart_items = "SELECT COUNT(*) AS total_items FROM cart WHERE ID_user = '$id_user'";
					  $result_count_cart_items = mysqli_query($conn, $sql_count_cart_items);
			  
					  if ($result_count_cart_items) {
						  $row_count = mysqli_fetch_assoc($result_count_cart_items);
						  $total_items = $row_count['total_items'];
						  echo' <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>['.$total_items.']</a></li>';
						
						  
					  } 
				  }
			  } else {
				  echo 'Vui lòng đăng nhập để xem giỏ hàng.';
			  }





	        
			  ?>

	        </ul>
	      </div>
	    </div>
	  </nav>