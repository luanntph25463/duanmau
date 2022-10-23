<?php $host = "localhost";
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

$sql = "select * from products";
$stmt = $conn->prepare($sql);
// thực thi câu lệnh;
$stmt->execute();
$result = $stmt ->fetchAll(PDO:: FETCH_ASSOC);



$sqls = "select * from categories";
$stmts = $conn->prepare($sqls);
// thực thi câu lệnh;
$stmts->execute();
$results = $stmts ->fetchAll(PDO:: FETCH_ASSOC);
?>
<body>
<?php
    
    ?>
 
    <form action="adminproductadd.php" method="post" enctype="multipart/form-data">
    <a href="userproduct.php">Thoát</a>
        <div class="form-control">
        <label for="" class="form-control">Tên Sản Phẩm</label> 
        <input class="form-control" type="text"name="productName"  value="<?= isset($username)?$username: ''?>">
        <?php if(isset($username_err)):?>
            <span class="form-control" style="color: red;"><?= $username_err ?></span>
        <?php endif?>
        </div>
        <div class="form-control">
        <label for="" class="form-control" style="margin-right: 10px;">Mô Tả product</label>  
        <input class="form-control" type="text"name="product_desc"  value="<?= isset($description)?$description: ''?>">
        <?php if(isset($des_err)):?>
            <span class="form-control" style="color: red;"><?= $des_err ?></span>
        <?php endif?>
        </div>
        <div class="form-control">
            <label class="form-control" for="">Giá Sản Phẩm</label>
            <input class="form-control" type="text" name="price"  value="<?= isset($price)?$price: ''?>">
            <?php if(isset($price_err)):?>
            <span class="form-control" style="color: red;"><?= $price_err ?></span>
        <?php endif?>
        </div> 
        <div class="form-control">
            <label class="form-control"  for="">Số Lượng Sản Phẩm</label>
            <input class="form-control" type="text" name="quantity"  value="<?= isset($quantity)?$quantity: ''?>">
            <?php if(isset($quantity_err)):?>
            <span class="form-control" style="color: red;"><?= $quantity_err ?></span>
        <?php endif?>
        </div>
        <div class="form-control">
            <label class="form-control" for="">Ảnh</label>
        <input class="form-control" type="file" name="image" >
        <?php if(isset($file_er)):?>
            <span class="form-control" style="color: red;"><?= $file_er ?></span>
        <?php endif?>
        </div>
        </div>
        <div class="form-control">
            <label class="form-control" for="">Trạng Thái</label>
        <input class="form-control" type="text" name="status"  value="<?= isset($status)?$status: ''?>">
        <?php if(isset($status_err)):?>
            <span class="form-control" style="color: red;"><?= $status_err ?></span>
        <?php endif?>
        </div>
        <div  class="form-control">
        <label class="form-control" for="">Danh Mục</label> 
        <select class="form-control" name="id" id="">
        <?php foreach($results as $users): ?>
                <option class="form-control" value="<?= $users['id']?>"><?= $users['catName']?></option>
         <?php endforeach ?>
         <label class="form-control" for="">Loại Hàng :</label>  
        <input class="" type="radio" name="db" value="0" checked>Không Đặc Biệt</p>
        <input class="" type="radio" name="db" value="1">Đặc Biệt</p>
        </div>
        </select>
</div>
        <button type="submit" class="form-control" name="addproduct">Thêm Sản Phẩm</button>
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