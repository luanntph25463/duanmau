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
    $id = $_GET['idEdit'];
    $sql = "SELECT * FROM khachhang WHERE id = $id";
    // chuẩn bị 
    $stmt = $conn->prepare($sql);
    // Thực thi
    $stmt -> execute();
    // Lấy dữ liệu (lấy 1 bản ghi để sửa)
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <form action=""  method="post" enctype="multipart/form-data">
    <div class="insearch">
        <label for="" class="form-control">Họ Tên</label>
        <input type="text" name="txtName" class="form-control" id="txtName" value="<?= $user['hoten'] ?>"><br>
    </div>
    <div class="insearch">
        <label for="" class="form-control">Email</label> 
        <input type="text" class="form-control" name="txtEmail" id="" value="<?= $user['taikhoan'] ?>"> <br>
        </div>
        <div class="form-control">
        <label for="" class="form-control">Pass</label>
        <input type="text" class="form-control" name="txtPass" id="" value="<?= $user['matkhau'] ?>">
        </div>
        <div class="form-control">
        <img class="form-control" src="../public/layout/uploads/<?= $user['hinhanh'] ?>" width="120" alt="">
        <!-- Lưu lại tên ảnh -->
        <input class="form-control" type="hidden" name="avarta" value="<?= $user['hinhanh'] ?>" id="">
        <br>
        Ảnh đại diện: <input class="form-control" type="file" name="avarta" id="" value="<?= $user['hinhanh'] ?>" >
        <br>
        </div>
        <div class="form-control">
        <label class="form-control" for="">Trạng Thái :</label>  
        <input class="" type="radio" name="trangthai" value="0"  <?= ($user['trangthai'] == 0)? 'checked': ''?>>Chưa Kích Hoạt</p>
        <input class="" type="radio" name="trangthai" value="1" <?= ($user['trangthai'] == 1)? 'checked': ''?>>Kích Hoạt</p>
        </div>
        <div class="form-control">
        <label class="form-control" for="">Vai trò :</label>  
        <input class="" type="radio" name="vaitro" value="0" <?= ($user['vaitro'] == 0)? 'checked': ''?>>Nhân Viên</p>
        <input class="" type="radio" name="vaitro" value="1" <?= ($user['vaitro'] == 1)? 'checked': ''?>>Khách Hàng</p>
        </div>
        <div class="form-control">
        <label for="" class="form-control">Chi tiết</label>
        <input class="form-control" type="text" name="detail" id="" value="<?= $user['detail'] ?>">
        </div>
        <p>
            <button type="submit" class="form-control" name="suanv">Cập Nhật</button>
        </p>
    </form>
            </div>
        </div>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>