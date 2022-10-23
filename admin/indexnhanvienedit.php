<?php
@session_start();
include ("controllers/c_nv.php");
$c_nv = new c_nv();
$c_nv->edit();
?>