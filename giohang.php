<?php
@session_start();
include ("controllers/c_giohang.php");
$c_giohang = new c_giohang();
$c_giohang->index();
?>