<?php
class c_cate
{
    public function index()
    {
        if (isset($_SESSION['isLogin'])) {
            $view = "views/cate/v_home.php";
            include_once "./models/session.php";
            include_once "./models/m_product.php";
            include_once "./models/m_categories.php";
            $list_user = new categories_class();
            if(isset($_GET['delid'])) {
                $delcate = $list_user->del_cate(($_GET['delid']));
            }
            if (isset($delcate)) echo $delcate;
            include_once "./models/m_user.php";
            include_once "./models/m_comment.php";
            include("templates/layout.php");
        } else {
            header("location:login.php");
        }
    }
    public function add()
    {
        if (isset($_SESSION['isLogin'])) {
            $view = "views/cate/v_add.php";
            include_once "./models/session.php";
            include_once "./models/m_product.php";
            include_once "./models/m_categories.php";
            if(isset($_POST['addcate'])){
                $user = new categories_class();
                if(isset($_POST['catName'])){
                    $insert_cate = $user->insert_cate($_POST['catName']);
                }
                if(isset($insert_cate)){
                    echo $insert_cate;
                    header("refresh:1;url=indexcate.php");
                }
            }
            include_once "./models/m_user.php";
            include_once "./models/m_comment.php";
            include("templates/layout.php");
        } else {
            header("location:login.php");
        }
    }
    public function edit()
    {
        if (isset($_SESSION['isLogin'])) {
            
            $view = "views/cate/v_edit.php";
            include_once "./models/session.php";
            include_once "./models/m_product.php";
            include_once "./models/m_categories.php";
            if(isset($_POST['suacate'])){
                $user = new categories_class();
                if(isset($_GET['idEdit'])){
                    $id = $_GET['idEdit'];
                }
                if(isset($_POST['txtName'])){
                     $update_cate = $user->update_cate($_POST['txtName'],$id);   
                     header("refresh:1;url=indexcate.php");     
                    }
            }
            include_once "./models/m_user.php";
            include_once "./models/m_comment.php";
            include("templates/layout.php");
        } else {
            header("location:login.php");
        }
    }
}
