<?php
class c_chart
{
    public function index()
    {
        if (isset($_SESSION['isLogin'])) {
            $view = "views/chart/v_home.php";
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
