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
    $sql = "SELECT * FROM categories WHERE id = $id";
    // chuẩn bị 
    $stmt = $conn->prepare($sql);
    // Thực thi
    $stmt -> execute();
    // Lấy dữ liệu (lấy 1 bản ghi để sửa)
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<body>
    <form action="" method="post">
    <a href="usercate.php">Thoát</a>
    <div class="form-control">
        <label for=""  class="form-control">Tên Danh Mục</label>
        <input type="text"  class="form-control" name="txtName" id="txtName" value="<?= $user['catName'] ?>"><br>
    </div>
        <p>
            <button type="submit"  class="form-control" name="suacate">Cập Nhật</button>
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