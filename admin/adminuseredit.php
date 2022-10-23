<?php
@session_start();
include ("controllers/c_home.php");
$edit = new c_edit();
$edit->index();
?>