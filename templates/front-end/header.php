<body style="color:red;">
  <header>
      <div class="header" style="background-color:white;">
          <img src="public/layout/imgh/logo.webp" alt="">
          <div class="menu-header">
              <ul>
                  <li><i class="fa-solid fa-phone"></i><a href="">09999999</a></li>
                  <li><i class="fa-solid fa-magnifying-glass"></i><a href="">Tìm kiếm</a></li>
                  <li class="h"><i class="fa-solid fa-user"></i><a href="">Đăng nhập</a></li>
                  <li class="h"><i class="fa-sharp fa-solid fa-unlock"></i><a href="">Đăng kí</a></li>
                  <li class="h" style="border-right: 1px solid #cccccc;"><i class="fa-solid fa-cart-shopping"></i><a
                          href="">Giỏ Hàng</a></li>
              </ul>
          </div>
      </div>
  </header>
  <nav>
      <div class="nav">
        <div>
          <ul>
            <li><a href="index.php">Trang Chủ</a></li>
            <li><a href="profile.php">Quản Lý Tài Khoản</a></li>
            <li><a class="block" href="listproduct.php">Sản Phẩm</a></li>
            <li><a href="login.php">Đăng Nhập</a></li>
            <li><a href="../duanmau/admin/login.php">QUản Trị Viên</a></li>
            <li><a href="giohang.php">Giỏ Hàng</a></li>
          </ul>
        </div>
    </div>
    <?php 
    if(isset($_SESSION['adminName'])){
        echo "
     
        <div class='top-nav clearfix'>
            <ul class='nav pull-right top-menu show' style='margin-right:200px;background-color:white'>
                <!-- user login dropdown start-->
                <a data-toggle='dropdown' class='dropdown-toggle' href='#' id='menu'>
                    <img alt=''  class='rounded-circle' style='width:50px;' src='public/layout/uploads/{$_SESSION['hinhanh']}'>
                    <span class='username' style='color:red;'>{$_SESSION['adminName']}</span>
                </a>
                <li class='dropdown-menu'>
                    <ul style='width:300px;height:100px' id='chuyen1' class='' id='list'>
                        <li><a href='#'  style='color:black;margin:30px 5px 30px 5px'><i class='fa fa-suitcase'></i>s</a></li>
                        <li><a href='profile.php'  style='color:black;'><i class='fa fa-cog'></i>Profile</a></li>
                        <li><a href='?action=logout' style='color:black;'><i class='fa fa-key'></i> Log Out</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
               
            </ul>
            <!--search & user info end-->
        </div>
        <?php ";
    }
        ?>
    </div>

  </nav>
  <header class="header-betwwent">
      <img src="public/layout/imgh/slider_1.webp" alt="">
  </header>
  <div class="s132 fixed-bot">
      <form action="" method="post">
          <div class="inner-form">
              <div class="input-field second-wrap">
                  <input id="search" name="find" type="text" placeholder="Enter Keywords" />
              </div>
              <div class="input-field third-wrap">
                  <button class="btn-search" name="tim" type="submit">Search</button>
              </div>
          </div>
      </form>
  </div>