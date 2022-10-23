<?php
@session_start();
include ("controllers/c_cart.php");
$cate = new c_cart();
$cate->index();
?>