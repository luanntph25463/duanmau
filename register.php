
<?php include_once "./models/database.php"; 
    include_once "./models/session.php";
    include_once "./models/m_product.php";
    include_once "./models/m_user.php";
    session::checkLogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- link css -->
    <link rel="stylesheet" href="public/layout/css/index.css">
    <link rel="stylesheet" href="public/layout/css/giohang.css">
    <link rel="stylesheet" href="public/layout/css/style.css">
    <link rel="stylesheet" href="public/layout/css/loginuser.css">
    <script src="public/layout/js/style.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/89aa971fd4.js" crossorigin="anonymous"></script>
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="public/layout/css/chitiet.css">
<link rel="stylesheet" href="public/layout/css/danhgia.css">
    <link rel="stylesheet" href="public/layout/css/bootstrap.min.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="public/layout/css/style-responsive.css">
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="public/layout/css/font.css">
    <link href="public/layout/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="public/layout/css/morris.css" type="text/css" />
    <!-- calendar -->
    <link rel="stylesheet" href="public/layout/css/monthly.css">
    <link rel="stylesheet" href="public/layout/css/user.css">
    <!-- //calendar -->
    <!-- //font-awesome icons -->
	    <link rel="stylesheet" href="public/layout/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/layout/css/animate.min.css">
    <link rel="stylesheet" href="public/layout/css/magnific-popup.css">
    <link rel="stylesheet" href="public/layout/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="public/layout/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="public/layout/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="public/layout/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="public/layout/css/jquery-ui.min.css">
    <link rel="stylesheet" href="public/layout/css/nice-select.css">
    <link rel="stylesheet" href="public/layout/css/jarallax.css">
    <link rel="stylesheet" href="public/layout/css/flaticon.css">
    <link rel="stylesheet" href="public/layout/css/slick.css">
    <link rel="stylesheet" href="public/layout/css/default.css">
    <link rel="stylesheet" href="public/layout/css/style.css">
    <link rel="stylesheet" href="public/layout/css/responsive.css">
</head>

  <body>
  <?php
    $user = new users_class();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $adminEmail =  $_POST['adminEmail'];
        $adminPass =  $_POST['adminPass'];
        $adminPass1 =  $_POST['adminPass1'];
        $login =  $user ->insert_userregister($adminEmail,$adminPass);
    }
    ?>
  <?php
    $list_user = new product_class();
    if (isset($_GET['delsid'])) {
        $delProduct = $list_user->show_producta(($_GET['delsid']));
    }
    if (isset($delProduct)) echo $delProduct;
    ?>
    <header>
        <div class="header">
            <img src="public/layout/imgh/logo.webp" alt="">
            <div class="menu-header">
                <ul>
                    <li><i class="fa-solid fa-phone"></i><a href="">09999999</a></li>
                    <li><i class="fa-solid fa-magnifying-glass"></i><a href="">Tìm kiếm</a></li>
                    <li class="h"><i class="fa-solid fa-user"></i><a href="">Đăng nhập</a></li>
                    <li class="h"><i class="fa-sharp fa-solid fa-unlock"></i><a href="">Đăng kí</a></li>
                    <li class="h" style="border-right: 1px solid #cccccc;"><i class="fa-solid fa-cart-shopping"></i><a href="">Giỏ Hàng</a></li>
                </ul>
            </div>
        </div>
    </header>
    <nav>
        <div class="nav">
            <ul>
            <li><a href="index.php">Trang Chủ</a></li>
              <li><a href="profile.php">Quản Lý Tài Khoản</a></li>
              <li><a class="block" href="chitietsp.php">Sản Phẩm</a></li>
              <li><a href="login.php">Đăng Nhập</a></li>
              <li><a href="../duanmau/admin/login.php">QUản Trị Viên</a></li>
              <li><a href="giohang.php">Giỏ Hàng</a></li>
            </ul>
        </div>

        </div>
    </nav>
    <header class="header-betwwent">
        <img src="public/layout/imgh/slider_1.webp" alt="">
    </header>
    <div class="container" >
      <div class="signin"style="margin-left: 200px;">
        <img
          src="public/layout/uploads/ca.jpg"
          alt=""
        />
        <br />
        <a class="facebook" href="">Signin with facebook</a> <br />
        <a class="twiter" href="">Signin with twiter</a> <br />
        <a class="google" href="">Signin with google</a> <br />
      </div>
      <div class="login st">
        <h2>Login</h2>
        <form action="" method="post" style="color: black;">
          <div class="user">
            <i class="fa-solid fa-user"></i
            ><input type="text"  name="adminEmail" placeholder="Nhập tên của mày" />
          </div>
          <div class="password">
            <i class="fa-solid fa-lock"></i
            ><input type="password" name="adminPass"  placeholder="Nhập mật khẩu của mày" />
          </div>
          <div class="password">
            <i class="fa-solid fa-lock"></i
            ><input type="password" name="adminPass1"  placeholder="Nhập mật khẩu của mày" />
          </div>
          <a class="mk" href="forgotpassword.php">Quên mật khẩu?</a>
          <a class="dk" href="register.php">Đăng kí</a>
          <button type="submit" value="Sign In" name="login" style="background-color: red;">Đăng nhập</button>
        </form>
      </div>
    </div>
    <footer>
    <div class="footer-flex">
        <div>
            <img src="imgh/logo-footer.webp" alt=""> <br>
            <i class="fa-solid fa-location-dot"></i> Tòa nhà số 7 , đường Trịnh Văn Bô , Nam Từ Liêm Hà Nội ,
            Vietnam <br>
            <i class="fa-solid fa-phone"></i> 1900 0009 <br>
            <i class="fa-solid fa-envelope"></i> thuandan@gmail.com <br>
        </div>
        <div style="padding-left: 30px;">
            <samp>Về Chúng Tôi</samp> <br>
            Trang chủ <br>
            Giới thiệu <br>
            Sản phẩm <br>
            Tin tức <br>
            Bản đồ <br>
            Liên hệ <br>
        </div>

        <div>
            <samp>Về Dịch Vụ</samp> <br>
            Trang chủ <br>
            Giới thiệu <br>
            Sản phẩm <br>
            Tin tức <br>
            Bản đồ <br>
            Liên hệ <br>
        </div>
        <div>
            <samp>Về Liên Hệ</samp> <br>
            Trang chủ <br>
            Giới thiệu <br>
            Sản phẩm <br>
            Tin tức <br>
            Bản đồ <br>
            Liên hệ <br>
        </div>
    </div>
</footer>
</body>
<script src="public/layout/js/bootstrap.js"></script>
<script src="public/layout/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="public/layout/js/scripts.js"></script>
<script src="public/layout/js/jquery.slimscroll.js"></script>
<script src="public/layout/js/jquery.nicescroll.js"></script>
<script src="public/layout/js/vendor/jquery-3.5.0.min.js"></script>
<script src="public/layout/js/popper.min.js"></script>
<script src="public/layout/js/bootstrap.min.js"></script>
<script src="public/layout/js/isotope.pkgd.min.js"></script>
<script src="public/layout/js/imagesloaded.pkgd.min.js"></script>
<script src="public/layout/js/jquery.magnific-popup.min.js"></script>
<script src="public/layout/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="public/layout/js/bootstrap-datepicker.min.js"></script>
<script src="public/layout/js/jquery.nice-select.min.js"></script>
<script src="public/layout/js/jquery.countdown.min.js"></script>
<script src="public/layout/js/swiper-bundle.min.js"></script>
<script src="public/layout/js/jarallax.min.js"></script>
<script src="public/layout/js/slick.min.js"></script>
<script src="public/layout/js/wow.min.js"></script>
<script src="public/layout/js/nav-tool.js"></script>
<script src="public/layout/js/plugins.js"></script>
<script src="public/layout/js/main.js"></script>
<script src="public/layout/js/choices.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="public/layout/js/jquery.scrollTo.js"></script>

<script>
  const menu = document.querySelector('#menu');
  const list = document.querySelector('#list');

  menu.addEventListener('click', () => {
    list.classList.toggle('hidden');
  });
  const choices = new Choices('[data-trigger]',
  {
    searchEnabled: false,
    itemSelectText: '',
  });

</script>
</html>