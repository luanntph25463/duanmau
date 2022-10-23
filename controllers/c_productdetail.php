<?php
class c_productdetail {
    public function __construct()
    {
    }

    public function index() {
    include ("./models/m_product.php");
    include ("./models/m_categories.php");
    include ("./models/m_comment.php");
    include_once "./models/session.php";
    include ("./models/m_user.php");
    $view = "views/listproduct/chitietsp.php";
    include ("templates/front-end/layout.php");
    }
    public function list() {
        include ("./models/m_product.php");
        include ("./models/m_categories.php");
        include ("./models/m_comment.php");
        include_once "./models/session.php";
        include ("./models/m_user.php");
        $view = "views/listproduct/listproduct.php";
        include ("templates/front-end/layout.php");
        }
}
?>