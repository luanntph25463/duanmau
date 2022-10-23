<?php
@session_start();
include ("controllers/c_cate.php");
$cate = new c_cate();
$cate->add();
?>