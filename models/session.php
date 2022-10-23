<?php
class session{
    public static function checkSession(){
        if(session_id()=='') session_start();
        if(!isset($_SESSION['isLogin'])){
            session_destroy();
        }
    }

    public static function checkLogin(){
        if(session_id()=='') session_start();
        if(isset($_SESSION['isLogin'])){
        }
    }
}
?>