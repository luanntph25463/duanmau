<?php
        if(isset($_GET['action']) && $_GET['action'] == 'logout'){
            session_destroy();
            header('Location:login.php');
        }
?>
<body>
        <div>
            <div class="row">
                <div class="shadow-lg p-3 mb-5 aside col-2 no-block dropdown m-t-20 bg-black text-white">
                    <div class="logo-website d-flex p-4">
                        <img class="rounded-circle border w-20 " src="../public/layout/Anh/1.JPG" alt="">
                        <label for="" class="blockquote">quản trị Website</label>
                      
                    </div>
                    <label for="">Nguyễn Thành Luân</label>
                    <div class="select">
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="indexadmin.php" aria-expanded="false"><span class="hide-menu"><i class="fa-sharp fa-solid fa-gauge"></i>Nhân Viên</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="indexproduct.php" aria-expanded="false"><span class="hide-menu"><i class="fa-solid fa-shirt"></i>hàng Hóa</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="indexcate.php" aria-expanded="false"><span class="hide-menu"><i class="fa-solid fa-user"></i>Loại Hàng</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="indexnhanvien.php" aria-expanded="false"></i><span class="hide-menu"><i class="fa-solid fa-user"></i>Người Dùng</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="chart.php" aria-expanded="false"></i><span class="hide-menu"><i class="fa-solid fa-comment"></i>Thống Kê</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="sytheicproduct.php" aria-expanded="false"></i><span class="hide-menu"><i class="fa-solid fa-comment"></i>Thống Kê list</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="indexcomment.php" aria-expanded="false"></i><span class="hide-menu"><i class="fa-solid fa-comment"></i>Bình Luận</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="indexcart.php" aria-expanded="false"></i><span class="hide-menu"><i class="fa-solid fa-comment"></i>Giỏ Hàng</span></a></li>
                    </div>
                </div>
                <div class="article col-10 bg-light">
        <header>
                <div class="menu">
                    <div>
                        <img style="width:125px" src="public/images/general/Luân.png" alt="">
                    </div>
                    <a href="?action=logout">Đăng Xuất</a>
                    <div>
                        
                    <a href="../login.php">trang Người Dùng</a>
                    </div>
                                <div class="tron" >
                              <img class="img-circle" width="50px" src='../public/layout/upload/<?php echo $_SESSION['hinhanh'];?>' alt="">
                              </div>
            </div>
            xin Chào <?php echo $_SESSION['adminName'];?>
        </header>