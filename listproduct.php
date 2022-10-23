<?php
@session_start();
include ("controllers/c_productdetail.php");
$c_productdetail = new c_productdetail();
$c_productdetail->list();
?>