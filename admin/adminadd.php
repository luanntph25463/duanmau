<?php
@session_start();
include ("controllers/c_home.php");
$edit = new c_home();
$edit->add();
?>