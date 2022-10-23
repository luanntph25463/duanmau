
    <form action="adminadd.php" method="post" enctype="multipart/form-data">
        <div class="form-control">
        <label for="" class="form-control">Họ Và tên :</label> 
        <input type="text"name="txtName"  class="form-control" value="<?= isset($username)?$username: ''?>"></p>
        <?php if(isset($username_err)):?>
            <span style="color: red;"><?= $username_err ?></span>
        <?php endif?>
        </div>
        <div class="insearch">
        <label for="">Email:</label>  <input type="text"name="txtEmail" class="form-control" value="<?= isset($Email)?$Email: ''?>"></p>
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
        <label for="" class="form-control">Địa Chỉ :</label>  <input class="form-control" type="text" name="txtaddress" value="<?= isset($address)?$address: ''?>"></p> <br>
        <?php if(isset($address_err)):?>
            <span class="form-control" style="color: red;"><?= $address_err ?></span>
        <?php endif?>
        </div>
        <button type="submit" class="form-control" name="adduser">Thêm Người Dùng</button>
    </form>
            </div>
        </div>

    </div>