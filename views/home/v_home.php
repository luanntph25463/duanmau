<main>
<div class='row '>
<?php
        // Nếu người dùng submit form thì thực hiện
        if (isset($_REQUEST['tim'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_POST['find']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } 
            else
            {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $query = "select * from products where productName like '%$search%'";
 
                // Kết nối sql
                $con = mysqli_connect("localhost","root","","luanntph25463");
mysqli_set_charset($con,'UTF8');
 
                // Thực thi câu truy vấn
                $sql = mysqli_query($con,$query);
 
                // Đếm số đong trả về trong sql.
                $num = mysqli_num_rows($sql);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($num > 0 && $search != "") 
                {
                    // Dùng $num để đếm số dòng trả về.
                    echo "$num ket qua tra ve voi tu khoa <br>$search</br> </br> </br> ";
                    
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                    echo '<table border="1" cellspacing="0" cellpadding="10">';
                    while ($row = mysqli_fetch_assoc($sql)) {
                        echo "
                       <div class='col-sm-3'> 
                       <div class='features-product-item '>
                        <div class='features-product-thumb'>
                            <div class='discount-tag'>-20%</div>
                            <a href='shop-details.html'>
                                <img src='public/layout/upload/{$row['image']}' alt=''>
                            </a>
                            <div class='product-overlay-action'>
                                <ul>
                                    <li><a href='cart.html'><i class='far fa-heart'></i></a></li>
                                    <li><a href='shop-details.html'><i class='far fa-eye'></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class='features-product-content'>
                            <div class='rating'>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                            </div>
                            <h5><a href='shop-details.html'>{$row['productName']}</a></h5>
                            <p class='price'>{$row['price']}</p>
                            <div class='features-product-bottom'>
                                <ul>
                                    <li class='color-option'>
                                        <span class='gray'></span>
                                        <span class='cyan'></span>
                                        <span class='orange'></span>
                                    </li>
                                    <li class='limited-time'><a href='#'>Limited-Time Offer!</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class='features-product-cart'><a href='cart.html' name='submit' type='submit' class='button1' href=''>add to cart</a></div>
                    </div>
                </div>  </div </div>";
                    }
                } 
                else {
                    echo "Khong tim thay ket qua!";
                }
            }
            
        }
        ?>
                    </div>
 
<div class="main">
    <div class="aside">
        <samp>Danh mục sản Phẩm</samp> <br>
        
            <?php
            $list_categories = new categories_class();
            $cate =$list_categories->show_cate();
            if ($cate) {
                while ($row = $cate->fetch_assoc()) {
            ?>
            <div class="category">
                <li class="select-item">
                        <input type="checkbox" name="" id="catAll" disabled checked>
                        <span class="checkbox-style">
                            <i class="fas fa-check"></i>
                        </span>
                        <label for="catAll"> <a href="index.php?delsid=<?php echo $row['id']; ?>"><?php echo $row['catName']; ?></a></label>
                    </li> <br> <br>
                </div>
            <?php
                } 
            }
            ?>
 
        
        <div class="aside-product">
            <a class="name" href="">Sản phẩm Top 10 Yêu Thích</a>
			<?php
    $list_user = new product_class();
    $product = $list_user->show_productlike();
    if($product){
        while($row = $product->fetch_assoc()){
        
    ?>
	          <div class="sp">
                    <img src="public/layout/upload/<?php echo $row['image'];?>" alt="">
                    <div class="detail">
                        <p style="color: #706c6c;"><?php echo $row['productName'];?></p>
                        <div class="price">
                            <h4><?php echo $row['price'];?></h4><del><?php echo $row['price_min'];?></del><br>
                        </div>
                        <div class="buying-header">
                            <a href="">Mua Hàng</a>
                        </div>
                    </div>
                </div>
                    <?php
            }
        }
    ?>
            <a href="">Xem thêm sản phẩm</a>
            <img style="width: 98%;" src="public/layout/imgh/banner-qc.webp" alt="">
            <a href="">TIN TỨC</a>
            <div class="aside-news">
                <img style="width: 93%; margin-top: 10px;" src="public/layout/imgh/hang-lau-1.jpg" alt="">
                <a class="text" href="">Một buổi ra quân , Thu giữ 1000 mẫu giày dép nhập lậu từ Trung
                    Quốc</a><br>
                <i class="fa-solid fa-user"></i><samp>Trần Như Thuần</samp><br>
                <i class="fa-solid fa-clock"></i><samp>28,june,2022</samp>
                <p class="news">Ngày 22/7, Cục Nghiệp vụ Quản lý thị trường (QLTT) phối hợp với Cục QLTT Hải
                    Dương tổ chức kiểm
                    tra 5 cơ sở kinh doanh giày dép, túi xách</p>
            </div>

        </div>
    </div>
    <div>
    </div>
    <div class="article">
    <h1 style="color: blue; text-align: center;font-size: 40px;">Sản Phẩm Theo Danh Mục</h1>

    <div class="grid">
<?php
                                if(isset($_GET['delsid'])){
                                    $id = $_GET['delsid'];
                                    $product  = $list_user->show_productc($id);
                                    

                                    if($product){
                                        while($row = $product ->fetch_assoc()){  
                                ?>
                                  <form action="index.php?delsid=<?php echo $row['id_cate'];?>&del=<?php echo $row['id'];?>" method="post">
                    <div class="product">
                        <a class="giamgia" href="">33 %</a>
                        <figure class="snip0016">
                            <img style="width: 100%;text-align: center;height: 95%;"
                                src="public/layout/upload/<?php echo $row['image'];?>" alt="">
                            <figcaption>
                                <h2>Giày <br><span>Top </span><br> Thịnh Hành</h2>
                                <p>
                                <p style="color: #706c6c;"><i class="fa-solid fa-thumbs-up"></i><?php echo $row['soLuotyeuThich'];?></p>
                                <p style="color: #706c6c;"><i class="fa-solid fa-eye"></i><?php echo $row['soluotxem'];?></p>
                                </p>
                                <a href="#"></a>
                            </figcaption>
                        </figure>

                        <input type="text" style="" class="tiude" name="txtName" disabled
                            value="<?php echo $row['productName'];?>">
                        <div class="price">
                            <input type="text" class="ngon" value="<?php echo $row['price']; ?>đ" name="txtprice"
                                disabled>
                            <del><input type="text" class="ngon1" value="<?php echo $row['price_min']; ?>đ"
                                    name="txtprice_min" disabled></del> </a>
                        </div>
                        <div class="buying">
                            <a class="button1" name="xemthem" type="submit"
                                href="chitietsp.php?delsid=<?php echo $row['id']; ?>">Chi Tiết</a><button name="submit"
                                type="submit" class="button1" href="">Đặt hàng</button>
                        </div>
                    </div>
                </form>
<?php
                                        }
                                    }
                                    }
    ?>
    <?php

if(isset($_POST["submit"])) {
    $product = $list_user->show_productgh($_GET['del']);
    $row = $product->fetch_assoc();
    $delProduct = $list_user->insert_products($row['productName'],$row['price'],$row['image'],$_SESSION['adminName'],1);
}
?>  
  
                </div>
                <section class="shoes-banner-area">
                <div class="container">
                    <div class="shoes-banner-active">
                    <?php
                        $product = $list_user->show_product();
                        if ($product) {
                            while ($row = $product->fetch_assoc()) {

                        ?>
 <div class="col">
 <div class="shoes-banner-bg" data-background="public/layout/img/bg/shoes-banner_bg.jpg">
                            <div class="row">
                                <div class="col-12">
                                    <div class="shoes-banner-content">
                                        <h6><?php echo $row['productName']; ?></h6>
                                        <h2>9 Best <span>Shoes for</span> Standing All Day Review 2020</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </section>
<div class="instagram-post-area">
                <div class="container-fluid p-0 fix">
                    <div class="row no-gutters insta-active">
                    <?php
                        $product = $list_user->show_product();
                        if ($product) {
                            while ($row = $product->fetch_assoc()) {

                        ?>
 <div class="col">
                            <div class="insta-post-item">
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                    <img src="public/layout/upload/<?php echo $row['image']; ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        <samp class="new">Sản phẩm mới</samp>
        <div class="grid">
				<?php
    $product = $list_user->show_product();
    if($product){
        while($row = $product->fetch_assoc()){
        
    ?>
	           <form action="index.php?delsid=<?php echo $row['id_cate'];?>&del=<?php echo $row['id'];?>" method="post">
                    <div class="product">
                        <a class="giamgia" href="">33 %</a>
                        <figure class="snip0016">
                            <img style="width: 100%;text-align: center;height: 95%;"
                                src="public/layout/upload/<?php echo $row['image'];?>" alt="">
                            <figcaption>
                                <h2>Giày <br><span>Top </span><br> Thịnh Hành</h2>
                                <p>
                                <p style="color: #706c6c;"><i class="fa-solid fa-thumbs-up"></i><?php echo $row['soLuotyeuThich'];?></p>
                                <p style="color: #706c6c;"><i class="fa-solid fa-eye"></i><?php echo $row['soluotxem'];?></p>
                                </p>
                                <a href="#"></a>
                            </figcaption>
                        </figure>

                        <input type="text" style="" class="tiude" name="txtName" disabled
                            value="<?php echo $row['productName'];?>">
                        <div class="price">
                            <input type="text" class="ngon" value="<?php echo $row['price']; ?>đ" name="txtprice"
                                disabled>
                            <del><input type="text" class="ngon1" value="<?php echo $row['price_min']; ?>đ"
                                    name="txtprice_min" disabled></del> </a>
                        </div>
                        <div class="buying">
                            <a class="button1" name="xemthem" type="submit"
                                href="chitietsp.php?delsid=<?php echo $row['id']; ?>">Chi Tiết</a><button name="submit"
                                type="submit" class="button1" href="">Đặt hàng</button>
                        </div>
                    </div>
                </form>
                    <?php
            }
        }
    ?>
                </div>
        <header class="header-end">
            <img src="public/layout/imgh/banner1.webp" alt="">
        </header>
        <samp class="new">Sản Khuyến mại</samp>
        <div class="grid">
            <?php
            $product = $list_user->show_productv();
            if ($product) {
                while ($row = $product->fetch_assoc()) {

            ?>
                           <form action="index.php?delsid=<?php echo $row['id_cate'];?>&del=<?php echo $row['id'];?>" method="post">
                    <div class="product">
                        <a class="giamgia" href="">33 %</a>
                        <figure class="snip0016">
                            <img style="width: 100%;text-align: center;height: 95%;"
                                src="public/layout/upload/<?php echo $row['image'];?>" alt="">
                            <figcaption>
                                <h2>Giày <br><span>Top </span><br> Thịnh Hành</h2>
                                <p>
                                <p style="color: #706c6c;"><i class="fa-solid fa-thumbs-up"></i><?php echo $row['soLuotyeuThich'];?></p>
                                <p style="color: #706c6c;"><i class="fa-solid fa-eye"></i><?php echo $row['soluotxem'];?></p>
                                </p>
                                <a href="#"></a>
                            </figcaption>
                        </figure>

                        <input type="text" style="" class="tiude" name="txtName" disabled
                            value="<?php echo $row['productName'];?>">
                        <div class="price">
                            <input type="text" class="ngon" value="<?php echo $row['price']; ?>đ" name="txtprice"
                                disabled>
                            <del><input type="text" class="ngon1" value="<?php echo $row['price_min']; ?>đ"
                                    name="txtprice_min" disabled></del> </a>
                        </div>
                        <div class="buying">
                            <a class="button1" name="xemthem" type="submit"
                                href="chitietsp.php?delsid=<?php echo $row['id']; ?>">Chi Tiết</a><button name="submit"
                                type="submit" class="button1" href="">Đặt hàng</button>
                        </div>
                    </div>
                </form>
            <?php
                }
            }
            ?>
        </div>
        <div class="row trending-product-active">
                <?php
                    $product = $list_user->show_productv();
                    if ($product) {
                        while ($row = $product->fetch_assoc()) {

                    ?>
 <div class="col">
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
                                        </div>
                    <?php
                        }
                    }
                    ?>
                                       
 </div>
        <div class="header-end">
            <img src="public/layout/imgh/banner2.jpg" alt="">
        </div>
        <div class="flex-end">
            <div class="hot">
                <samp>Sản Phẩm Đặc Biệt</samp>
                <div class="featured">
                    <?php
                    $product = $list_user->show_productdb();
                    if ($product) {
                        while ($row = $product->fetch_assoc()) {

                    ?>
                                      <form action="index.php?delsid=<?php echo $row['id_cate'];?>&del=<?php echo $row['id'];?>" method="post">
                    <div class="product">
                        <a class="giamgia" href="">33 %</a>
                        <figure class="snip0016">
                            <img style="width: 100%;text-align: center;height: 95%;"
                                src="public/layout/upload/<?php echo $row['image'];?>" alt="">
                            <figcaption>
                                <h2>Giày <br><span>Top </span><br> Thịnh Hành</h2>
                                <p>
                                <p style="color: #706c6c;"><i class="fa-solid fa-thumbs-up"></i><?php echo $row['soLuotyeuThich'];?></p>                                <p style="color: #706c6c;"><i class="fa-solid fa-eye"></i><?php echo $row['soluotxem'];?></p>
                                </p>
                                <a href="#"></a>
                            </figcaption>
                        </figure>

                        <input type="text" style="" class="tiude" name="txtName" disabled
                            value="<?php echo $row['productName'];?>">
                        <div class="price">
                            <input type="text" class="ngon" value="<?php echo $row['price']; ?>đ" name="txtprice"
                                disabled>
                            <del><input type="text" class="ngon1" value="<?php echo $row['price_min']; ?>đ"
                                    name="txtprice_min" disabled></del> </a>
                        </div>
                        <div class="buying">
                            <a class="button1" name="xemthem" type="submit"
                                href="chitietsp.php?delsid=<?php echo $row['id']; ?>">Chi Tiết</a><button name="submit"
                                type="submit" class="button1" href="">Đặt hàng</button>
                        </div>
                    </div>
                </form>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="sale">
                <samp>Sản phẩm Bán chạy</samp>
                <div class="grid-end">
                    <div class="hr">
                        <?php
                        $product = $list_user->show_product();
                        if ($product) {
                            while ($row = $product->fetch_assoc()) {

                        ?>
                        <form action="index.php?delsid=<?php echo $row['id_cate'];?>&del=<?php echo $row['id'];?>" method="post">
                    <div class="product">
                        <a class="giamgia" href="">33 %</a>
                        <figure class="snip0016">
                            <img style="width: 100%;text-align: center;height: 95%;"
                                src="public/layout/upload/<?php echo $row['image'];?>" alt="">
                            <figcaption>
                                <h2>Giày <br><span>Top </span><br> Thịnh Hành</h2>
                                <p>
                                <p style="color: #706c6c;"><i class="fa-solid fa-thumbs-up"></i><?php echo $row['soLuotyeuThich'];?></p>                                <p style="color: #706c6c;"><i class="fa-solid fa-eye"></i><?php echo $row['soluotxem'];?></p>
                                </p>
                                <a href="#"></a>
                            </figcaption>
                        </figure>

                        <input type="text" style="" class="tiude" name="txtName" disabled
                            value="<?php echo $row['productName'];?>">
                        <div class="price">
                            <input type="text" class="ngon" value="<?php echo $row['price']; ?>đ" name="txtprice"
                                disabled>
                            <del><input type="text" class="ngon1" value="<?php echo $row['price_min']; ?>đ"
                                    name="txtprice_min" disabled></del> </a>
                        </div>
                        <div class="buying">
                            <a class="button1" name="xemthem" type="submit"
                                href="chitietsp.php?delsid=<?php echo $row['id']; ?>">Chi Tiết</a><button name="submit"
                                type="submit" class="button1" href="">Đặt hàng</button>
                        </div>
                    </div>
                </form>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</main>