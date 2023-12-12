<link rel="stylesheet" href="menu.css">
<nav id="main">
    <div class="container">
      <div  style="text-align:center;">   
      </div>
      <nav>
        <div class="nav-fostrap">
          <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="javascript:void(0)">Brand<span class="arrow-down"></span></a>
              <ul class="dropdown">
                <li><a href="addbrand.php">Add Brand</a></li>

              </ul>
            </li>
            <li><a href="javascript:void(0)" >Product<span class="arrow-down"></span></a>
              <ul class="dropdown">
                <li><a href="themsp.php">Add product</a></li>
              </ul>
            </li>
            
            <li>
                <a href="javascript:void(0)" id="userLink">User<span class="arrow-down"></span></a>
                <ul class="dropdown">
                    <li><a href="themsp.php">Add User</a></li>
                </ul>
                </li>

                <script>
                // Lấy thẻ <a> bằng ID
                var userLink = document.getElementById('userLink');
                
                // Thêm sự kiện click
                userLink.addEventListener('click', function(event) {
                    // Ngăn chặn hành vi mặc định của liên kết
                    event.preventDefault();
                    
                    // Chuyển hướng đến trang hoặc đường dẫn User ở đây
                    window.location.href = 'user.php'; // Thay 'user.php' bằng đường dẫn mong muốn
                });
                </script>


        </div>
        <div class="nav-bg-fostrap">
          <div class="navbar-fostrap"> <span></span> <span></span> <span></span> </div>
          <a href="" class="title-mobile">Fostrap</a>
        </div>
      </nav>
      <div class='content'>
      </div>
  </div>
  </nav>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="menu.js"  type="text/javascript"></script>













<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        ul {  list-style-type: none;  margin: 0;  padding: 0;  overflow: hidden;}
        li {  float: left;}li a {  display: block;  padding: 8px;  background-color: #dddddd; text-decoration: none;}
    </style>
</head>
<body>
<ul> 
       <li><a href="brands.php">Trang chủ</a></li>

       <li><a href="themsp.php">Thêm Sản phẩm</a>
      </li> 
      <li><a href="addbrand.php">Add brand</a>
      <li><a href="User.php">User</a>
       
       
       
    </ul>
</body>
</html> -->