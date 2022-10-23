<?php
class c_user {
    public function __construct()
    {
    }

    public function index() {
     include ("./models/m_product.php");
    include ("./models/m_categories.php");
    include_once "./models/session.php";
    include ("./models/m_user.php");
    $view = "views/user/v_user.php";
    if(isset($_POST['suanv'])){
        $user = new users_class();
        $id = $_SESSION['id'];
        if(isset($_POST['txtName'])){
             $update_user = $user->update_userkh($_POST['txtName'],$id);
        }
        $email = new users_class();
        if(isset($_POST['txtEmail'])){
             $update_useremail = $email->update_useremailkh($_POST['txtEmail'],$id);
        }
        $pass = new users_class();
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
        header('Location:profile.php');
        }
    include ("templates/front-end/layout.php");
    }
}
?>