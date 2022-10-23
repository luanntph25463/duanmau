<div>
<?php
global $tong;
    $user = new product_class();
    if(isset($_POST['productName']) && isset($_POST['quantity']) && isset($_POST['status']) && isset($_POST['id'])){
        $insert_productm = $user->insert_productm($_POST['productName'],$_POST['quantity'],$_POST['status'],$_POST['id'],$_POST['price'],$_POST['hoten']);
    }
    if(isset($insert_productm)){
        echo $insert_productm;
    }
    ?>
<?php
    $user = new product_class();
    if(isset($_POST['btnGui'])){
        $insert_cate = $user->insert_cate($_POST['catName']);
    }
    if(isset($insert_cate)){
        echo $insert_cate;
    }
    ?>
    <?php
    $list_user = new product_class();
    if(isset($_GET['delid'])){
        $delProduct = $list_user->del_products(($_GET['delid']));
    }
    ?>
    <div class="">
    <form action="giohang.php" method="post">
        <h2 class="a">Có 2 sản phẩm trong giỏ hàng</h2>
        <?php
         $flag = 1;
    $list_product = new product_class();
    $product = $list_product->show_products($_SESSION['adminName']);
    if($product){
       global $flag;
       $flag++;
        while($row = $product->fetch_assoc()){   
    ?>
        <div class="b" >
            <img class="c1" src="public/layout/upload/<?php echo $row['image'];?>" alt="">
            <div class="c2">
                <span class="sp1" name="txtName"><?php echo $row['productName'];?></span>
                <div style="color: black;">
                    <select>
                        <option>Trả góp 0%</option>
                        <option>Lì xì ngay 2.400.000₫ áp dụng đến 28/02</option>
                    </select>
                </div>
                <div>
                    <ul>
                        <li>Tặng Balo Gaming SUV</li>
                        <li>Cơ hội trúng 22 Hổ Vàng trị giá 6 triệu</li>
                        <li>Thu cũ đổi mới trợ giá 15%</li>
                    </ul>
                </div>
            </div>
            <div class="c3">
                <input style="color: black;" type="number" name="quantity" value="<?php echo $row['quantity'] ?>" min="0" max="100" />
                <td style="background-color:red;"> <a onclick="return confirm('Bạn Có Muốn Xóa Sản Phẩm Này Không?')" href="giohang.php?delid=<?php echo $row['id'];?>">Xóa</a><i class="fa-solid fa-trash-can"></i><td>
            </div>
            <input class="c4 sp2" style="border:white;padding-left:70px;width:150px" name="txtprice" value="<?php echo $row['price'];?>đ"></input>  <br>
            
        </div>
        <?php
        $tong += $row['quantity']* $row['price'];
            }        
        }
    ?>
        <div class="b3">
            <div class="c1-2">
                <div><span class="sp1">Mã giảm giá</span></div>
                <div><input type="text" placeholder="Nhập mã giảm giá"> <button>Áp dụng</button></div>
            </div>
            <div class="c3">
                <div>Tổng tiền:</div>
            </div>
            <div class="c4">
                <div> 
                  <div><input class='sp2' name='price' value='<?php echo $tong;?>'></input></div>
            </div>
            </div>
        </div>

        <div class="b2" style="color: black;">
            <div class="r1"><input type="radio" name="radio" checked>Anh <input type="radio" name="radio" id="">Chị
            </div>
            <div class="r2" style="">
                <label for="">họ Tên</label>
                <div class="r2-1"><input type="text" name="hoten" placeholder="Nhập họ và tên">
                <label for="">Số điện Thoại</label>
                <input name="status" type="text"
                        placeholder="Nhập số điện thoại"></div>
                        <label for="">Email</label>
                <div class="r2-2"><input class="email" name="email" type="text" placeholder="Nhập email không bắt buộc" id=""></div>
                <label for="">Mã Hoàng Hóa</label>
                <div class="r2-2"><input class="form-control mt-4" name="productName" type="text" placeholder="mã hàng Hóa" id=""></div>
                <label for="">Địa Chỉ</label>
                <div class="r2-2"><input class="form-control mt-4" name="id" type="text" placeholder="Địa Chỉ" id=""></div>
             
            </div>
            <div class="r4"><span class="sp1">Chọn hình thức nhận hàng</span></div>
            <div class="r5">
                <input type="radio" name="radio2" checked>Giao hàng tận nhà
                <input type="radio" name="radio2" id="">Nhận tại cửa hàng
            </div>
        </div>
        <div class="b2">
            <span class="sp1">Chọn hình thức thanh toán</span>
            <div><input type="radio" name="radio3"><span>Trả tiền mặt khi nhận hàng/Trả góp lãi suất thường</span>
            </div>
            <div><input type="radio" name="radio3"><span>ATM nội địa/QR CODE/Internet Banking (Thanh toán qua
                    VNPAY)</span></div>
            <div><input type="radio" name="radio3">Thanh toán bằng thẻ quốc tế Visa, Mastercard, JCB, AMEX
            </div>
            <div><input type="radio" name="radio3">Thanh toán ví Moca trên ứng dụng Grab</div>
            <div><input type="radio" name="radio3">Thanh toán bằng SmartPay</div>
        </div>
        <div class="b4">
            <button type="submit">hoàn Tất Đặt Hàng</button>
        </form>
            <div>Bằng cách đặt hàng, bàn Đồng ý với Điều khoản sử dụng của Breshka Shop</div>
        </div>
    </div>

</div>