<div class="log-w3" style="background-image: url(public/layout/images/bga.jpg);">
<div class="w3layouts-main">
<h3>
		<form action="" method="post">
        <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $list_user = new users_class();
                        $users = $list_user->show_userforgot2($id);
                        if ($users) {
                            while ($row = $users->fetch_assoc()) {
                        ?>
                                                   <input type="hidden" name="id" value="<?php echo $row['id'];?>">
        <input type="text" class="ggg" name="adminEmail" value="<?php echo $_GET['id']?>" placeholder="E-MAIL" required="">
			<input type="text" class="ggg" name="pass" placeholder="E-MAIL" required="">
            <?php if(isset($pass_err)):?>
            <span class="" style="color: red;"><?= $pass_err ?></span>
        <?php endif?>
			<input type="text" class="ggg" name="pass1" placeholder="E-MAIL" required="">
				<div class="clearfix"></div>
			<button type="submit" value="Đăng Nhập" name="upadatemk">Cập nhật mật khẩu</button>
                        <?php
                            }
                        }
                    }
                        ?>
		</form>
</div>
</div>