<?php
class c_home {
    public function __construct()
    {
    }

    public function index() {
    include ("./models/m_product.php");
    include ("./models/m_categories.php");
    include_once "./models/session.php";
    include ("./models/m_user.php");
    include ("./models/m_comment.php");
    $view = "views/home/v_home.php";
    include ("templates/front-end/layout.php");
    }
}
?>