<?php
if(isset($_POST["submit"])) {
    $product = $list_user->show_productgh($_GET['del']);
    $row = $product->fetch_assoc();
    $delProduct = $list_user->insert_products($row['productName'],$row['price'],$row['image'],$_SESSION['adminName'],$_POST['quantity']);
}
$list_user = new categories_class();
if (isset($_GET['delid'])) {
    $delcate = $list_user->del_cate(($_GET['delid']));
}
if (isset($delcate)) echo $delcate;
?>  
      
<?php
    $list_product = new product_class();
    $list_comment = new comment_class();
    if(isset($_GET['delid'])){
        $delProduct = $list_product->del_product(($_GET['delid']));
    }
    if(isset($_GET['delsid'])){
        $delProduct = $list_product->update_luotxem(($_GET['delsid']));
    }
    if(isset($delProduct)) echo $delProduct;
    ?>
<div class="contai">
       <?php
        if(isset($_POST['add'])){
            $id = $_GET['delsid'];
            $ten = $_SESSION['adminName'];
            $hinhanh = $_SESSION['hinhanh'];
            $idnguoidung = $_SESSION['id'];
            $noidung = $_POST['noidung'];           
         $insert_product =  $list_comment->insert_comment($_POST['noidung'],$id,$ten,$hinhanh,$idnguoidung);
            // lấy ra tên ảnh
        }
        ?>
    Trang chủ / Giày Lười / Giày tây nâu
    <div class="flex">
        <div class="image">
            <div>
                <?php
                                if(isset($_GET['delsid'])){
                                    $id = $_GET['delsid'];
                                    $users = $list_product->show_producta($id);
                                    if($users){
                                        $row = $users->fetch_assoc();
                                        
                                                            }       
                                ?>
                <img src="public/layout/upload/<?php echo $row['image'];?>" alt=""> <br>
                <?php
                                        }
                                ?>
            </div>
            <h1 style="font-size: 24px;color:red;text-align: center;"></h1>
            <div style="display: flex;margin-left: 55px; " class="image-detail">
        
            <div>
            </div>
        </div>
       
        </div>
        <div class="detail">
            <form action="chitietsp.php?delsid=<?php echo $_GET['delsid'];?>&del=<?php echo $row['id'];?>" method="post">
            <h2> <?php
                                if(isset($_GET['delsid'])){
                                    $id = $_GET['delsid'];
                                    $users = $list_product->show_producta($id);
                                    if($users){
                                        $row = $users->fetch_assoc();
                                                        }       
                            ?>
                <h1 style="font-size: 30px;
  padding-bottom: 20px; font-weight: bold; margin-top: -25px;"><?php echo $row['productName'];?></h1>
                <?php
                                    }
                            ?>
            </h2>
            <div class="samp" style="color: #706c6c;">
                <samp>Thương hiệu:</samp>Converse <samp style="padding-left: 20px;">Tình trạng:</samp> <?php echo $row['status'];?>
                <samp style="padding-left: 30px; color: #35c0c5;"><i class="fa-solid fa-thumbs-up"></i></samp> <?php echo $row['soLuotyeuThich'];?>
                <samp style="padding-left: 30px;"><i class="fa-sharp fa-solid fa-eye"></i></samp><?php echo $row['soluotxem'];?>
            </div>

            <div class="price">
                <h3> <?php
                                if(isset($_GET['delsid'])){
                                    $id = $_GET['delsid'];
                                    $users = $list_product->show_producta($id);
                                    if($users){
                                        $row = $users->fetch_assoc();
                                                                    }       
                                        ?>
                                        <label for="">Giá</label>
                    <input style="color: #35c0c5;font-size: 25px;border: none;background-color: white;" value="<?php echo $row['price'];?>"disabled></input>
                    <?php
                                                }
                                        ?>
                </h3><del style="padding-left: 20px; color: rgb(53, 50, 50);">800.000đ</del>
            </div>

            <div class="color">
                <label style="color:black;" class="label4">Màu Sắc</label>
                <select style="color:black;" name="" id="">
                    <option value="mau">Màu xanh</option>
                    <option value="mau">Màu đỏ</option>
                    <option value="mau">Màu nâu</option>
                </select>
            </div>
            <div style="display: flex;  align-items: center;" class="number">
                <label style="color:black;" class="label3" for="">Số Lượng</label>
                <?php
                                if(isset($_GET['delsid'])){
                                    $id = $_GET['delsid'];
                                    $users = $list_product->show_producta($id);
                                    if($users){
                                        $row = $users->fetch_assoc();
                                                                    }       
                                        ?>
                <h1><input type="number" name="quantity" value="" min="0"
                        max="<?php echo $row['quantity'];?>"></h1>
                <?php
                                                }
                                                ?>
                <br>
                <button type="submit" name="submit" class="them" href="">Thêm vào giỏ hàng</button> Gọi <a style="padding-left:5px ;" class="goi"
                    href="">01977777</a> để được tư vấn
                <br>
            </div>
            <div style="color: black;" class="promotion">
                <span class="text">Ưu đãi thêm</span><br><br>
                <div href="" class="category"><i class="fas fa-check-circle"></i><span>Tặng Gói Chăm Sóc Giày 12
                        Tháng</span></div>
                <div class="category"><i class="fas fa-check-circle"></i><span>Cơ hội trúng 22 Hổ Vàng trị giá 6 triệu
                        <a style="color:#35c0c5;" href="">Xem chi
                            tiết</a></span></div>
                <div class="category"><i class="fas fa-check-circle"></i><span>Thu cũ đổi mới trợ giá 15%<a
                            style="color:#35c0c5;" href="">Xem
                            chi tiết</a></span></div>
                <div class="category"><i class="fas fa-check-circle"></i><span>Phát Hiện Hàng Không Chính Hãng Hoàn Tiền
                        100%</span></div>
                <div class="category"><i class="fas fa-check-circle"></i><span>Tặng Phiếu Giảm Giá 10% Cho Thành Viên Cũ
                        <a style="color:#35c0c5;" href="">Xem chi tiết</a></span></div>
                <div class="category"><i class="fas fa-check-circle"></i><span>Giảm 10% Khi Mua Hàng Vào Ngày Sinh
                        Nhật</span></div>
                <div class="category"><i class="fas fa-check-circle"></i><span>Cơ hội trúng 22 Hổ Vàng trị giá 6
                        triệu <a style="color:#35c0c5;" href="">Xem chi tiết</a></span></div>
                <div>
                    <?php
                                if(isset($_GET['delsid'])){
                                    $id = $_GET['delsid'];
                                    $users = $list_product->show_producta($id);
                                    if($users){
                                        $row = $users->fetch_assoc();
                                                                }       
                                    ?>
                    <h1 style="font-size: 20px;font-weight: bold;
  color: black;  margin-top: 20px;">Mô Tả Sản Phâm</h1> <br>
                    <h2 style="font-size: 17px; padding-left: 20px;"><?php echo $row['product_desc'];?></h2>
                    <?php
                                            }
                                    ?>
                                    </form>
                </div>
            </div>
        </div>

    </div>
    <div>
            Sản Phẩm Liên Quan
        </div>
<div class="row trending-product-active">
    <?php
                                if(isset($_GET['delsid'])){
                                    $id = $row['id_cate'];
                                    $product = $list_product->show_productlq($id);
                                    if($product){
                                        while($row = $product ->fetch_assoc()){  
                                ?>
                                                         <div class="features-product-item">
                                                <div class="features-product-thumb">
                                                    <div class="discount-tag">-20%</div>
                                                    <a href="shop-details.html">
                                                        <img src="public/layout/upload/<?php echo $row['image']; ?>" alt="">
                                                    </a>
                                                    <div class="product-overlay-action">
                                                        <ul>
                                                            <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                            <li><a href="chitietsp.php?delsid=<?php echo $row['id']; ?>"><i class="far fa-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="features-product-content">
                                                    <div class="rating">
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </div>
                                                    <h5><a href="shop-details.html"><?php echo $row['productName']; ?></a></h5>
                                                    <p class="price"><?php echo $row['price']; ?></p>
                                                    <div class="features-product-bottom">
                                                        <ul>
                                                            <li class="color-option">
                                                                <span class="gray"></span>
                                                                <span class="cyan"></span>
                                                                <span class="orange"></span>
                                                            </li>
                                                            <li class="limited-time"><a href="#">Limited-Time Offer!</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="features-product-cart"><a href="cart.html" name="submit" type="submit" class="button1" href="">add to cart</a></div>
                                            </div>

<?php
                                        }
                                    }
                                }
                                ?>
                                </div>
            <div class="chitiet">
                <div class="cc">
                    <a href="menu.html">Thông Tin Sản Phẩm</a>
                </div>
                <div>
                    <a href="">Phương Thức Thanh Toán</a>
                </div>
                <div>
                    <a href="chitietsp.php?delsid=<?php echo $row['id']; ?>">Đánh Giá Sản Phẩm</a>
                </div>
            </div>

            <div class="article">
            <div class="contai">
            <div class="box-sadow">
                <div class="flex-header">
                    <div class="header">
                        <h2>Đánh giá & nhận xét về giày tây Converse All Star</h2>
                        <div class="flexx">
                            <p class="text">Đánh Giá Trung Bình</p>
                            <a class="number" href="">5/5</a><br><br>
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i>
                            <p class="phu">
                                333 đánh giá & 223 nhận xét
                            </p>

                        </div>

                    </div>
                    <div class="star">
                        <div class="sao">
                            5 <i class="fa-solid fa-star"></i><br>
                            4 <i class="fa-solid fa-star"></i>  <br>
                            3 <i class="fa-solid fa-star"></i> <br>
                            2 <i class="fa-solid fa-star"></i>  <br>
                            1 <i class="fa-solid fa-star"></i> <br>
                        </div>
                        <div class="hoi">
                            <p>Bạn đã từng đánh giá chưa?</p>
                            <a href="">Gửi đánh giá của bạn</a>
                        </div>
                    </div>
                </div>
                <div>
                    
        <div class="hidden">
            <h2>Đánh giá của bạn</h2>
            <h3>Chất lượng sản phẩm</h3>
            <form action="">
                <input class="star star-5" id="star-5" type="radio" name="star" />
                <label class="star star-5" for="star-5"></label>
                <input class="star star-4" id="star-4" type="radio" name="star" />
                <label class="star star-4" for="star-4"></label>
                <input class="star star-3" id="star-3" type="radio" name="star" />
                <label class="star star-3" for="star-3"></label>
                <input class="star star-2" id="star-2" type="radio" name="star" />
                <label class="star star-2" for="star-2"></label>
                <input class="star star-1" id="star-1" type="radio" name="star" />
                <label class="star star-1" for="star-1"></label>
            </form>
            <div><textarea name="" id="" cols="100" rows="10"></textarea></div>
                </div>
        </div>
        

            
                <?php
        $list_comment = new comment_class();
        $users =$list_comment->show_comments($_GET['delsid']);
        if($users){
            while($row = $users->fetch_assoc()){
            
        ?>
                    <div class="ykien">
                    <img src="public/layout/uploads/<?php echo $row['hinhanh'];?>" alt="">
                    <div class="icon">
                        <h1 class="name" href="" name="nguoibinhluan" style=";"><?php echo $row['nguoibinhluan'];?></h1> </br>
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i> <samp style=""><?php echo $row['create_at'];?></samp>
                    </div>
                    <p style="">
                    <?php echo $row['noidung'];?>
                    </p>
                    <div class="like">
                        <i class="fa-solid fa-thumbs-up"></i> thích (0)
                    </div>
                    </div> </br>
                    </div>
                    <?php
                }
            }
        ?>
                    
        
                <div class="page">
                    <ul>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <i class="fa-solid fa-angles-right"></i>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-2">
        <p style="color: white;">
            <h2 style="color: white;">Hỏi Đáp về Giày - Chính Hãng</h2>

            <div class="nhap">
                <?php 
                if (isset($_SESSION['adminName'])) {
                    echo "<form action='' method='post'>
                    <input class='input' type='text' name='noidung' style='color: black;' placeholder='Câu hỏi của bạn về sản phẩm..'>
                    <button type='submit' name='add'>Gửi
                        câu
                        hỏi</button>
                    </form>";
                } else {
                    echo "<h1 style='color:red;font-size:40px;text-align:center'>Vui lòng đăng Nhập Để Có thể Bình luận </h1>";
                }
                ?>
                
            </div>
            <div class="giaotiep">
                <div class="ykien">
                <img src="public/layout/uploads/ca.jpg" alt="">
                    <div class="icon">
                        <a class="name" href="">Thuần đẹp trai</a>
                        <samp>1 ngày trước</samp><br>
                        <a class="coment" href="">Có Bán Trả Góp Không </a><br>
                        <a class="rep" href="">Trả lời</a>
                    </div>
                    <div class="like-2">
                        <i class="fa-solid fa-thumbs-up"></i> thích (11)
                    </div>
                </div>

                <div class="chekbox">
                    <a class="name" href="">Trần Như Thuần</a> <i class="fas fa-check-circle"></i> <a class="chuc"
                        href="">Quản trị viên</a>
                    <p>
                        Chào bàn,<br>
                        Nếu bạn nghèo quá thì có thể đi chỗ khác chứ bên mình k bán nhá <br>
                        Nói luôn cho đỡ mất quan điểm

                    </p>
                    <div class="user-nhap">
                        <input type="text" placeholder="Ý kiến.."><button>Gửi</button>
                    </div>
                </div>
            </div>

            <div class="giaotiep">
                <div class="ykien">
                <img src="public/layout/uploads/ca.jpg" alt="">
                    <div class="icon">
                        <a class="name" href="">Thuần đẹp trai</a>
                        <samp>1 ngày trước</samp><br>
                        <a class="coment" href="">Có Bán Trả Góp Không </a><br>
                        <a class="rep" href="">Trả lời</a>
                    </div>
                    <div class="like-2">
                        <i class="fa-solid fa-thumbs-up"></i> thích (34)
                    </div>
                </div>

                <div class="chekbox">
                    <a class="name" href="">Trần Như Thuần</a> <i class="fas fa-check-circle"></i> <a class="chuc"
                        href="">Quản trị viên</a>
                    <p>
                        Chào bàn,<br>
                        Nếu bạn nghèo quá thì có thể đi chỗ khác chứ bên mình k bán nhá <br>
                        Nói luôn cho đỡ mất quan điểm

                    </p>
                    <div class="user-nhap">
                        <input type="text" placeholder="Ý kiến của bạn.."><button>Gửi</button>
                    </div>
                </div>
            </div>

            <div class="giaotiep">
                <div class="ykien">
                    <img src="public/layout/uploads/ca.jpg" alt="">
                    <div class="icon">
                        <a class="name" href="">Thuần đẹp trai</a>
                        <samp>1 ngày trước</samp><br>
                        <a class="coment" href="">Có Bán Trả Góp Không </a><br>
                        <a class="rep" href="">Trả lời</a>
                    </div>
                    <div class="like-2">
                        <i class="fa-solid fa-thumbs-up"></i> thích (44)
                    </div>
                </div>

                <div class="chekbox">
                    <a class="name" href="">Trần Như Thuần</a> <i class="fas fa-check-circle"></i> <a class="chuc"
                        href="">Quản trị viên</a>
                    <p>
                        Chào bàn,<br>
                        Nếu bạn nghèo quá thì có thể đi chỗ khác chứ bên mình k bán nhá <br>
                        Nói luôn cho đỡ mất quan điểm
                    </p>
                    <div class="user-nhap">
                        <input type="text" placeholder="Ý kiến của bạn.."><button>Gửi</button>
                    </div>
                </div>
            </div>

        </div>
            </div>

        </div>