
    <form action="indexnhanvienadd.php" method="post" enctype="multipart/form-data">
        <div class="form-control">
        <label for="" class="form-control">Họ Và tên :</label> 
        <input type="text"name="txtName"  class="form-control" value="<?= isset($username)?$username: ''?>"></p>
        <?php if(isset($username_err)):?>
            <span style="color: red;"><?= $username_err ?></span>
        <?php endif?>
        </div>
        <div class="insearch">
        <label for="">tài Khoản:</label>  <input type="text"name="txtEmail" class="form-control" value="<?= isset($Email)?$Email: ''?>"></p>
        <?php if(isset($Email_err)):?>
            <span class="form-control" style="color: red;"><?= $Email_err ?></span>
        <?php endif?>
        </div>
        <div class="form-control">
        <label for="" class="form-control">Mật khẩu :</label>  <input class="form-control" type="password" name="txtPass" value="<?= isset($Pass)?$Pass: ''?>"></p> <br>
        <?php if(isset($Pass_err)):?>
            <span class="form-control" style="color: red;"><?= $Pass_err ?></span>
        <?php endif?>
        </div>
        <div class="form-control">
        <label class="form-control" for="">Ảnh Đại Diện :</label>  <input class="form-control" type="file" name="txtimage"></p> <br>
        <?php if(isset($file_er)):?>
            <span class="form-control" style="color: red;"><?= $file_er ?></span>
        <?php endif?>
        </div>
        <div class="form-control">
        <label class="form-control" for="">Trạng Thái :</label>  
        <input class="" type="radio" name="vaitro" value="0" checked>Chưa Kích Hoạt</p>
        <input class="" type="radio" name="vaitro" value="1">Kích Hoạt</p>
        </div>
        <div class="form-control">
        <label class="form-control" for="">Vai trò :</label>  
        <input class="" type="radio" name="trangthai" value="0" checked>Nhân Viên</p>
        <input class="" type="radio" name="trangthai" value="1">Người Dùng</p>
        </div>
        <div class="form-control">
        <label for="" class="form-control">Chi tiết :</label>  <input class="form-control" type="text" name="txtaddress" value="<?= isset($address)?$address: ''?>"></p> <br>
        <?php if(isset($address_err)):?>
            <span class="form-control" style="color: red;"><?= $address_err ?></span>
        <?php endif?>
        </div>
        <button type="submit" class="form-control" name="addnv">Thêm Người Dùng</button>
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