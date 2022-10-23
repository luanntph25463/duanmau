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
    $sql = "SELECT * FROM products WHERE id = $id";
    // chuẩn bị 
    $stmt = $conn->prepare($sql);
    // Thực thi
    $stmt -> execute();
    // Lấy dữ liệu (lấy 1 bản ghi để sửa)
    $user = $stmt->fetch(PDO::FETCH_ASSOC);


    $sqls = "SELECT * FROM categories";
    // chuẩn bị 
    $stmts = $conn->prepare($sqls);
    // Thực thi
    $stmts->execute();
    // Lấy dữ liệu (lấy 1 bản ghi để sửa)
    $users = $stmts->fetchAll(PDO::FETCH_ASSOC);
?>
<body>
<form action="" method="post" enctype="multipart/form-data">
<div class="insearch">
    <label for="" class="form-control">Tên Sản Phẩm</label> 
    <input type="text" class="form-control" name="txtName" id="txtName" value="<?= $user['productName'] ?>"> <br>
</div>
<div class="form-control">
    <label for="" class="form-control">Mô Tả Sản Phẩm</label> 
    <input type="text" class="form-control" name="txtdesc" id="txtdesc" value="<?= $user['product_desc'] ?>"> <br>
</div>
<div class="form-control">
    <label class="form-control"for="">Giá</label> 
    <input class="form-control" type="text" name="txtprice" id="txtprice" value="<?= $user['price'] ?>"> <br>
</div>
<div class="form-control">
    <label  class="form-control" for="" >Số Lượng</label> 
    <input  class="form-control" type="text" name="txtquantity" id="txtquantity" value="<?= $user['quantity'] ?>"> <br>
</div>
<div  class="form-control">
    <label  class="form-control" for="">Trạng Thái</label> 
    <input  class="form-control" type="text" name="txtstatus" id="txtstatus" value="<?= $user['status'] ?>"> <br>
</div>
<div   class="form-control">
<label for=""  class="form-control">Ảnh Sản Phẩm</label>
<img  class="form-control" src="../public/layout/upload/<?= $user['image'] ?>" width="120" alt="">
    <!-- Lưu lại tên ảnh -->
    <input  class="form-control" type="hidden" name="image" value="<?= $user['image'] ?>" id="">
    <br>
    Ảnh đại diện: <input  class="form-control" type="file" name="image" id="" value="<?= $user['image'] ?>" >
</div>
<div class="insearch">
    <label for=""  class="form-control">Danh Mục</label> 
    <select  class="form-control" name="txtcatId" id="" >
    <?php foreach($users as $users): ?>
            <option  class="form-control" value="<?= $users['id']?>"><?= $users['catName']?></option>
        <?php endforeach ?>
    </select>
    <label for=""  class="form-control">Thể Loại Hàng</label> 
    <select  class="form-control" name="txtcatloaihang" id="" >
            <option  class="form-control" value="0"> Hàng Bình Thường</option>
            <option  class="form-control" value="1"> Hàng Đặc Biệt</option>
    </select>
</div>
    <p>
        <button  class="form-control" type="submit" name="suaproduct">Cập Nhật</button>
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