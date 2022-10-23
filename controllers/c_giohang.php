<?php
class c_giohang {
    public function __construct()
    {
    }

    public function index() {
       if(isset($_SESSION['adminName'])){
        include ("./models/m_product.php");
        include ("./models/m_categories.php");
        include_once "./models/session.php";
        include ("./models/m_user.php");
        $view = "views/listproduct/giohang.php";
        include ("templates/front-end/layout.php");
       }else{
        header('Location:login.php');
       }
    }
}
?>