<?php
@session_start();
include ("controllers/c_product.php");
$edit = new c_product();
$edit->edit();
?>