<?php
$host = "localhost";
// tên cơ sở dữ liệu
$db_name = "luanntph25463";
// thông tin tài khoản
$username = "root";
$password = "";
try{
    $conn = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "lỗi kết nối dữ liệu: " .$e->getMessage();
    throw $e;
}
    // sql select
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM khachhang WHERE id = $id";
    // chuẩn bị 
    $stmt = $conn->prepare($sql);
    // Thực thi
    $stmt -> execute();
    // Lấy dữ liệu (lấy 1 bản ghi để sửa)
    $user = $stmt->fetch(PDO::FETCH_ASSOC);


    ?>
<div class="container">
        <div class="flex">
            <div class="name">
                <a href="">#Giới Thiệu</a>
   
    <form action=""  method="post" enctype="multipart/form-data">
        <label for="" >Họ Tên</label>
        <input type="text" name="txtName" class="form-control" id="txtName" value="<?= $user['hoten'] ?>"><br>
        <div class="insearch">
        <label for="" >Tài khoản</label> 
        <input type="text" class="form-control" name="txtEmail" id="" value="<?= $user['taikhoan'] ?>"> <br>
    </div>
        <div c>
        <label for="">Mật khẩu</label>
        <input type="pass" class="form-control" name="txtPass" id="" value="<?= $user['matkhau'] ?>">
        </div>
        <div >
        <img  src="public/layout/uploads/<?= $user['hinhanh'] ?>" width="120px" alt="">
        <!-- Lưu lại tên ảnh -->
        <input  type="hidden" name="avarta" value="<?= $user['hinhanh'] ?>" id="">
        <br>
        Ảnh đại diện:
         <input class="form-control" type="file" name="avarta" id="" value="<?= $user['hinhanh'] ?>" >
        <br>
        </div>
        <div >
        <label for="" >Giới thiệu</label>
        <input class="form-control" type="text" name="adress" id="" value="<?= $user['detail'] ?>">
        </div>
        <p>
            <button type="submit" class="form-control" style="background-color: white;margin-top: 30px;" name="suanv">Cập Nhật</button>
        </p>
    </form>
            </div>
            <div class="information">
                <a href="">#Liên hệ</a> 
                <div class="contact">
                    <i class="fa-solid fa-cake-candles"></i> <samp>22/10/2000</samp> <br>
                    <i class="fa-solid fa-envelope"></i> <samp>thuandeptrai@gmail.com</samp><br>
                    <i class="fa-solid fa-location-dot"></i> <samp>Thái Bình-Việt Nam</samp><br>
                    <i class="fa-solid fa-phone"></i> <samp>0923116778</samp> <br>
                    <i class="fa-solid fa-earth-americas"></i> <samp>httt/thuan</samp> <br>
                </div>
                <a href="">#Mạng xã hội</a>
                <div class="mang">
                    <i class="fa-brands fa-facebook"></i><samp>thuan-78/bb</samp><br>
                    <i class="fa-brands fa-twitter"></i><samp>thuan-78/bb</samp><br>
                    <i class="fa-brands fa-square-instagram"></i><samp>thuan-78/bb</samp><br>
                </div>
            </div>
        </div>
    </div>
    