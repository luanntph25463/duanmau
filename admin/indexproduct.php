<?php
@session_start();
include ("controllers/c_product.php");
$product = new c_product();
$product->index();
?>