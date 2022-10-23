<main>
        <div class="main-index">
            <div class="aside-index">
                <div class="color">
                    <label class="label4">Danh Mục</label>
                            <select name="" id="sampleSelect">
                            <option value="listproduct.php">Tất Cả</option>

                            <?php
                    $list_categories = new categories_class();
                    $cate = $list_categories->show_cate();
                    if ($cate) {
                        while ($row = $cate->fetch_assoc()) {
                    ?>
                        <option value="listproduct.php?delsid=<?php echo $row['id']; ?>"><a href=""><?php echo $row['catName']; ?></option></a>
                    <?php
                        }
                    }
                    ?>
                            </select>
                </div>
                <div class="color">
                    <label class="label4">Loại Hàng</label>
                            <select name="" id="sampleSelect">
                            <option value="listproduct.php"><a href="">Tất Cả</option></a>

                        <option value="listproduct.php?db=1">Đặc Biệt</option>
                        <option value="listproduct.php?db=0">Không Đặc Biệt</option>
                            </select>
                </div>
            </div>
        </div>
        <div class="article">
    <div class="grid">
<?php
 if(isset($_GET['db'])){
    $id = $_GET['db'];
    $list_product = new product_class();
    $product  = $list_product->show_productdb1($id);
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
<p style="color: #706c6c;"><i class="fa-sharp fa-solid fa-comments"></i> 7899 lượt</p>
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
    }  ?>
    
    <?php if(isset($_GET['delsid'])){
                                    $id = $_GET['delsid'];
                                    $list_product = new product_class();
                                    $product  = $list_product->show_productc($id);
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
                                <p style="color: #706c6c;"><i class="fa-sharp fa-solid fa-comments"></i> 7899 lượt</p>
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
                                    
                                    <?php if(!isset($_GET['delsid']) && !isset($_GET['db']) ){
                                        $list_user = new product_class();
                                        $product  = $list_user->show_product();
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
                                    <p style="color: #706c6c;"><i class="fa-sharp fa-solid fa-comments"></i> 7899 lượt</p>
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
    </main>