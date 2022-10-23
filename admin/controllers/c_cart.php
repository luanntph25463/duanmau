<?php
class c_cart
{
    public function index()
    {
        if (isset($_SESSION['isLogin'])) {
            $view = "views/cart/v_home.php";
            include_once "./models/session.php";
            include_once "./models/m_product.php";
            $list_user = new products_class();
            if(isset($_GET['delid'])){
                $delProduct = $list_user->del_productsz(($_GET['delid']));
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
}

