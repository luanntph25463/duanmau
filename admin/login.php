<?php include_once "./models/database.php"; 
    include_once "./models/session.php";
    include_once "./models/m_product.php";
    include_once "./models/m_user.php";
    session::checkLogin();
?>
<!DOCTYPE html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- bootstrap-css -->
<link rel="stylesheet" href="public/layout/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="public/css/login.css" rel='stylesheet' type='text/css' />
<link href="public/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<!-- font-awesome icons -->
<!-- //font-awesome icons -->
</head>
<body  style="background-image: url(public/images/bga.jpg);">
<div class="log-w3">
<div class="w3layouts-main">
                    <?php
        $user = new users_class();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $adminEmail =  $_POST['adminEmail'];
        $adminPass =  $_POST['adminPass'];
        $login =  $user ->loginuservip($adminEmail,$adminPass);
        $login1 = $user ->login($adminEmail,$adminPass);
    }
    ?>
	<h2>Sign In Now</h2>
		<form action="login.php" method="post">
			<input type="text" class="ggg" name="adminEmail" placeholder="E-MAIL" required="">
			<input type="password" class="ggg" name="adminPass" placeholder="PASSWORD" required="">
			<span><input type="checkbox" />Remember Me</span>
			<h6><a href="#">Forgot Password?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Đăng Nhập" name="login">
		</form>
		<p>Don't Have an Account ?<a href="registration.html">Create an account</a></p>
</div>
</div>
</body>
</html>
