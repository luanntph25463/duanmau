<?php
@session_start();
include ("controllers/c_home.php");
$home = new c_home();
$home->index();
?>