<?php
class c_comment
{
    public function index()
    {
        if (isset($_SESSION['isLogin'])) {
            $view = "views/comment/v_home.php";
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
    public function icrement()
    {
        if (isset($_SESSION['isLogin'])) {
            include_once "./models/m_comment.php";
            $list_user = new comment_class();
            if (isset($_GET['delid'])) {
                $delc = $list_user->del_comment(($_GET['delid']));

            }
            $view = "views/comment/v_icrement.php";
            include_once "./models/session.php";
            include_once "./models/m_product.php";
            include_once "./models/m_categories.php";
            include_once "./models/m_user.php";
            if (isset($delcate)) echo $delcate;
            include("templates/layout.php");
        } else {
            header("location:login.php");
        }
    }
}