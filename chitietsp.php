<?php
@session_start();
include ("controllers/c_productdetail.php");
$c_products = new c_productdetail();
$c_products->index();
?>