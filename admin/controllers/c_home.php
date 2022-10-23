<?php
class c_home
{
    public function index()
    {
        if (isset($_SESSION['isLogin'])) {
            $view = "views/home/v_home.php";
            include_once "./models/session.php";
            include_once "./models/m_product.php";
            include_once "./models/m_categories.php";
            include_once "./models/m_user.php";
            $list_user = new users_class();
            // xóa bt
            if(isset($_GET['delid'])){
                $delUser = $list_user->del_user(($_GET['delid']));
            }
            if(isset($delUser)) echo $delUser;
            // xóa theo checkbox
            if (isset($_POST['checkbox'])) {
                foreach($_POST['checkbox'] as $value) {
                  $list_user = new users_class();
                  $delProduct = $list_user->del_user($value);
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
           
            
            $view = "views/home/v_add.php";
            include_once "./models/session.php";
            include_once "./models/m_product.php";
            include_once "./models/m_categories.php";
            include_once "./models/m_user.php";
            if(isset($_POST['adduser'])){
                $username = $_POST['txtName'];
                $Email = $_POST['txtEmail'];
                $Pass = $_POST['txtPass'];
                $address = $_POST['txtaddress'];
                $file = $_FILES['txtimage'];
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
                        $insert_user = $user->insert_user($_POST['txtName'],$_POST['txtEmail'],$_POST['txtPass'],$avarta,$_POST['txtaddress']);
                        if($file['size'] > 0){
                            move_uploaded_file($file['tmp_name'],'public/uploads/'.$avarta);
                            move_uploaded_file($file['tmp_name'],'../public/layout/uploads/'.$avarta);
                            header("refresh:1;url=indexadmin.php");
                        }
                        
                    }
                }
                if(isset($insert_user)){
                    echo $insert_user;
                }
               
            }
            include_once "./models/m_comment.php";
            include("templates/layout.php");
        } else {
            header("location:login.php");
        }
    }
    
}
class c_edit
{
    public function index()
    {
        if (isset($_SESSION['isLogin'])) {
            
            $view = "views/home/v_edit.php";
            include_once "./models/session.php";
            include_once "./models/m_product.php";
            include_once "./models/m_categories.php";
            include_once "./models/m_user.php";
            // câu lệnh sửa 
            if(isset($_POST['suauser'])){
                $id = $_GET['idEdit'];
                $user = new users_class();
                if(isset($_POST['txtName'])){
                     $update_user = $user->update_user($_POST['txtName'],$id);
                }
                $email = new users_class();
                if(isset($_POST['txtEmail'])){
                     $update_useremail = $email->update_useremail($_POST['txtEmail'],$id);
                
                } 
                $pass = new users_class();
                if(isset($_POST['txtPass'])){
                     $update_Pass = $pass->update_Pass($_POST['txtPass'],$id);
                
                }
                if(isset($_POST['adress'])){
                    $update_adress = $pass->update_adress($_POST['adress'],$id);
                }
                $file = $_FILES['avarta'];
                $avarta = $_POST['avarta'];
                if ($file['size'] > 0) {
                    // lấy ra tên ảnh
                    $avarta = $file['name'];
                }
                //câu lệnh update ảnh
                if(isset($_POST['avarta'])){
                    $update_adress = $user->update_anh($avarta,$id);
                    }
                //upload file ảnh
                if ($file['size'] > 0) {
                    $avarta = $file['name'];
                    move_uploaded_file($file['tmp_name'], "public/upload/" . $avarta);
                   
                }
                header('Location:indexadmin.php');
                }
            include_once "./models/m_comment.php";
            include("templates/layout.php");
        } else {
            header("location:login.php");
        }
    }
}
