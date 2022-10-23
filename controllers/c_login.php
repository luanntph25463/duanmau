<?php
class c_login {
    public function __construct()
    {
    }

    public function index() {
        include ("./models/m_product.php");
    include ("./models/m_categories.php");
    include_once "./models/session.php";
    include ("./models/m_user.php");
    include ("./models/m_comment.php");

    $user = new users_class();
    if(isset($_POST['login'])){
    $adminEmail =  $_POST['adminEmail'];
    $login1 = $user ->loginforgot($adminEmail);
}
    $view = "views/user/forgot.php";
    include ("templates/front-end/layout.php");
    }
    
    public function edit() {
        include ("./models/m_product.php");
    include ("./models/m_categories.php");
    include_once "./models/session.php";
    include ("./models/m_user.php");
    include ("./models/m_comment.php");
    if(isset($_POST['upadatemk'])){
        $pass1 = $_POST['pass1'];
        $pass = $_POST['pass'];
        if($pass != $pass1){
            $pass_err = "Phải Nhập Trùng mật khẩu";
        }
        if(!isset($pass_err)){
            $id = $_POST['id'];
       $pass = $_POST['pass'];
        $user = new users_class();
        $update_producth = $user->updatemk($pass,$id);
        header('Location:index.php');
        }
       
    }
    $view = "views/user/refreshpass.php";
    include ("templates/front-end/layout.php");
    }
    public function loginuser() {
    include ("./models/m_product.php");
    include ("./models/m_categories.php");
    include_once "./models/session.php";
    include ("./models/m_user.php");
    include ("./models/m_comment.php");
    include_once "./models/session.php";
    session::checkLogin();
    $user = new users_class();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $adminEmail =  $_POST['adminEmail'];
        $adminPass =  $_POST['adminPass'];
        $login =  $user ->login($adminEmail,$adminPass);
        $login1 =  $user ->loginuservip($adminEmail,$adminPass);
}
    $view = "views/home/v_login.php";
    include ("templates/front-end/layout.php");
    }
}
?>