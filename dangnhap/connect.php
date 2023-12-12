<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $connect = mysqli_connect('localhost', 'root', '', 'dacs') or die ('Không thể kết nối tới database');
   
							 $sql = "SELECT * from new_product";
                			 $KQ = mysqli_query($connect, $sql);
							while($row = mysqli_fetch_array($KQ)) {
								echo'<h3><a href="#">'.$row['pd_name'].'</a></h3>';
							}
    
    mysqli_set_charset($connect, 'UTF8');
    <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
    				<div class="product d-flex flex-column">
    					<a href="#" class="img-prod"><img class="img-fluid" src="images/product-1.png" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3">
    						<div class="d-flex">
    							<div class="cat">
		    						<span>New</span>
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
	    					</div>
							<?php
							 $conn = mysqli_connect('localhost', 'root', '', 'dacs');
							 $sql = "SELECT * from new_product";
                			 $KQ = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($KQ)) {
								echo'<h3><a href="#">'.$row['pd_name'].'</a></h3>';
								echo '<div class="pricing">
									<p class="price"><span>'.$row['pd_price'].'VND</span></p>
									</div>';

							}

							?>
	    					<p class="bottom-area d-flex px-3">
    							<a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
    							<a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
    						</p>
    					</div>
    				</div>
    			</div>
?>
</body>
</html>