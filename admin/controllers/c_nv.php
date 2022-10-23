<?php
class c_nv
{
    public function index()
    {
        if (isset($_SESSION['isLogin'])) {
            $view = "views/nhanvien/v_home.php";
            include_once "./models/session.php";
            include_once "./models/m_product.php";
            include_once "./models/m_categories.php";
            include_once "./models/m_user.php";
            $list_user = new users_class();
            if (isset($_GET['delid'])) {
                $delcomment = $list_user->del_userkh(($_GET['delid']));

            }
            if (isset($_POST['checkbox'])) {
                foreach($_POST['checkbox'] as $value) {
                  $list_user = new users_class();
                  $delProduct = $list_user->del_userkh($value);
                 }
          }
            include_once "./models/m_comment.php";
            include("templates/layout.php");
        } else {
            header("location:login.php");
        }
    }
    public function add()
    {
        if (isset($_SESSION['isLogin'])) {
          
            $view = "views/nhanvien/v_add.php";
            include_once "./models/session.php";
            include_once "./models/m_product.php";
            include_once "./models/m_categories.php";
            include_once "./models/m_user.php";
            if(isset($_POST['addnv'])){
                $username = $_POST['txtName'];
                $Email = $_POST['txtEmail'];
                $Pass = $_POST['txtPass'];
                $address = $_POST['txtaddress'];
                $file = $_FILES['txtimage'];
                $vaitro = $_POST['vaitro'];
                $kichhoat = $_POST['trangthai'];
                // lấy ra tên ảnh
                if($username == ''){
                    $username_err = "Không Được Để trống Tên Sản Phẩm";
                }
                if($Email == ''){
                    $Email_err = "Không Được Để trống email";
                }
                if($Pass == ''){
                    $Pass_err = "Không Được Để trống Mật Khẩu";
                }
                if($address == ''){
                    $address_err = "Không Được Để trống Địa Chỉ";
                }
                if(isset($_FILES['txtimage'])){
                    $file = $_FILES['txtimage'];
                    $allow_ext = array('jpg','png','jpeg','gif','JPG','PNG','JPEG','GIF');
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
                if(!isset($username_err) && !isset($Email_err) && !isset($Pass_err)){
                    $user = new users_class();
                    if(isset($_POST['txtName']) && isset($_POST['txtEmail']) && isset($_POST['txtPass'])  && isset($_POST['txtaddress'])){
                        $file = $_FILES['txtimage'];
                        // lấy ra tên ảnh
                        $avarta = $file['name'];
                        $insert_user = $user->insert_userkh($_POST['txtName'],$_POST['txtEmail'],$_POST['txtPass'],$avarta,$_POST['txtaddress'],$vaitro,$kichhoat);
                        if($file['size'] > 0){
                            move_uploaded_file($file['tmp_name'],'public/uploads/'.$avarta);
                            move_uploaded_file($file['tmp_name'],'../public/layout/upload/'.$avarta);
                            move_uploaded_file($file['tmp_name'],'../public/layout/uploads/'.$avarta);
                            header("refresh:1;url=indexnhanvien.php");
                        }
                    }
                   
                }
            }
            include_once "./models/m_comment.php";
            include("templates/layout.php");
        } else {
            header("location:login.php");
        }
    }
    public function edit()
    {
        if (isset($_SESSION['isLogin'])) {
            
            $view = "views/nhanvien/v_edit.php";
            include_once "./models/session.php";
            include_once "./models/m_product.php";
            include_once "./models/m_categories.php";
            include_once "./models/m_user.php";
            
if(isset($_POST['suanv'])){
    $user = new users_class();
    $id = $_GET['idEdit'];
    if(isset($_POST['txtName'])){
         $update_user = $user->update_userkh($_POST['txtName'],$id);
     
    }
    $email = new users_class();
    if(isset($_POST['txtEmail'])){
         $update_useremail = $email->update_useremailkh($_POST['txtEmail'],$id);
    }
    $pass = new products_class();
    if(isset($_POST['txtPass'])){
         $update_Pass = $pass->update_Passkh($_POST['txtPass'],$id);
    }
    if(isset($_POST['detail'])){
        $update_adress = $pass->update_adresskh($_POST['detail'],$id);
    }
    if(isset($_POST['vaitro'])){
        $update_vaitro = $pass->update_vaitro($_POST['vaitro'],$id);
    }
    if(isset($_POST['trangthai'])){
        $update_trangthai = $pass->update_trangthai($_POST['trangthai'],$id);
    }
    $trangthai = new users_class();
    $file = $_FILES['avarta'];
    $avarta = $_POST['avarta'];
    if ($file['size'] > 0) {
        // lấy ra tên ảnh
        $avarta = $file['name'];
    }
    //câu lệnh update ảnh
    if(isset($_POST['avarta'])){
        $update_trangthai = $pass->update_hinhanh($avarta,$id);
    }
    
    //upload file ảnh
    if ($file['size'] > 0) {
        $avarta = $file['name'];
        move_uploaded_file($file['tmp_name'], "public/upload/" . $avarta);
    }
    header('Location:indexnhanvien.php');
    }
            include_once "./models/m_comment.php";
            include("templates/layout.php");
        } else {
            header("location:login.php");
        }
    }
}
