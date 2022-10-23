<?php
class c_product
{
    public function index()
    {
        if (isset($_SESSION['isLogin'])) {
            $view = "views/product/v_home.php";
            include_once "./models/session.php";
            include_once "./models/m_product.php";
            $list_user = new products_class();
            if(isset($_GET['delid'])){
                $delProduct = $list_user->del_product(($_GET['delid']));
            }
            if (isset($_POST['checkbox'])) {
                foreach($_POST['checkbox'] as $value) {
                  $list_user = new products_class();
                  $delProduct = $list_user->del_product($value);
                 }
          }
            if(isset($delProduct)) echo $delProduct;
            include_once "./models/m_categories.php";
            include_once "./models/m_user.php";
            include_once "./models/m_comment.php";
            include("templates/layout.php");
        } else {
            header("location:login.php");
        }
    }
    public function add()
    {
        if (isset($_SESSION['isLogin'])) {
            $view = "views/product/v_add.php";
            include_once "./models/session.php";
            include_once "./models/m_product.php";
            
if(isset($_POST['addproduct'])){
    $username = $_POST['productName'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $description = $_POST['product_desc'];
    $status = $_POST['status'];
    $cate = $_POST['id'];
    $db = $_POST['db'];
    $file = $_FILES['image'];
    // lấy ra tên ảnh

$user = new products_class();
if($username == ''){
    $username_err = "Không Được Để trống Tên Sản Phẩm";
}
if($price < 0){
    $price_err = "Giá Phải Lớn Hơn 0";
}
if($quantity < 0){
    $quantity_err = "Số Lượng Phải Là Số Dương";
}
if($description == ''){
    $des_err = "Không Được Để trống Mô Tả";
}
if($cate == ''){
    $cate_err = "Không Được Để trống Danh Mục";
}
if($status == ''){
    $status_err = "Không Được Để trống Trạng Thái";
}
if(isset($_FILES['image'])){
    $file = $_FILES['image'];
    $allow_ext = array('jpg','png','jpeg','gif','JPG','PNG','webp','JPEG','GIF');
    $thu_muc_upload = "upload/";

    if($file['error'] > 0){
        $file_er = "Lỗi File";
    }else{
        $fileName = $file['name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        if(!in_array($fileExt,$allow_ext)){
            $file_er = "Không Đúng Định Dạng File  png,jpg";
        }
        // kiếm tra file vượt quá 2mb
        if($file['size'] >= 2048576){
            $file_er = "FIle Không Được Vượt quá 2MB";
        }
    }       
}
if(!isset($username_err) && !isset($price_err) && !isset($quantity_err) && !isset($status_err) && !isset($file_er)){
    $avarta = $file['name'];
    if(isset($_POST['productName']) && isset($_POST['product_desc']) && isset($_POST['price']) && isset($_POST['quantity']) && isset($_POST['status']) && isset($_POST['id'])){
        $file = $_FILES['image'];
        // lấy ra tên ảnh
        $avarta = $file['name'];
        $insert_product = $user->insert_product($_POST['productName'],$_POST['product_desc'],$_POST['price'],$_POST['quantity'],$avarta,$_POST['status'],$_POST['id'],$_POST['db']);
        if($file['size'] > 0){
            move_uploaded_file($file['tmp_name'],'../public/layout/upload/'.$avarta);
        }
    }
    header("refresh:1;url=indexproduct.php");
}
}
            include_once "./models/m_categories.php";
            include_once "./models/m_user.php";
            include_once "./models/m_comment.php";
            include("templates/layout.php");
            
        } else {
            header("location:login.php");
        }
    }
    public function edit()
    {
        if (isset($_SESSION['isLogin'])) {
            $view = "views/product/v_edit.php";
            include_once "./models/session.php";
            include_once "./models/m_product.php";
            if(isset($_POST['suaproduct'])){
                $id = $_GET['idEdit'];
             $user = new products_class();
             if(isset($_POST['txtName'])){
                    $update_producth = $user->update_product($_POST['txtName'],$id);
             }
             if(isset($_POST['txtdesc'])){
                    $update_productl = $user->update_product1($_POST['txtdesc'],$id);
             }
             if(isset($_POST['txtprice'])){
                $update_product = $user->update_product2($_POST['txtprice'],$id);
             }
             if(isset($_POST['txtquantity'])){
             $update_productk = $user->update_product3($_POST['txtquantity'],$id);
             }
             if(isset($_POST['txtstatus'])){
             $update_productk = $user->update_product4($_POST['txtstatus'],$id);
             }
             if(isset($_POST['txtcatId'])){
             $update_productz = $user->update_product5($_POST['txtcatId'],$id);
             }
             if(isset($_POST['txtcatloaihang'])){
              $update_productz = $user->update_product7($_POST['txtcatloaihang'],$id);
             }
                 
             
             $file = $_FILES['image'];
             $avarta = $_POST['image'];
             if ($file['size'] > 0) {
                // lấy ra tên ảnh
                $avarta = $file['name'];
             }
             //câu lệnh update ảnh
             if(isset($_POST['image'])){
                $update_productk = $user->update_product6($avarta,$id);
                }
             //upload file ảnh
             if ($file['size'] > 0) {
                $avarta = $file['name'];
                move_uploaded_file($file['tmp_name'], "public/upload/" . $avarta);
             }
             header('Location:indexproduct.php');
             }
             
             
            include_once "./models/m_categories.php";
            include_once "./models/m_user.php";
            include_once "./models/m_comment.php";
            include("templates/layout.php");
        } else {
            header("location:login.php");
        }
    }
    public function tonghop()
    {
        if (isset($_SESSION['isLogin'])) {
            $view = "views/product/tonghop.php";
            include_once "./models/session.php";
            include_once "./models/m_product.php";
            include_once "./models/m_categories.php";
            include_once "./models/m_user.php";
            include_once "./models/m_comment.php";
            include("templates/layout.php");
        } else {
            header("location:login.php");
        }
    }
}
