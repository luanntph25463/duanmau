<?php
@session_start();
include ("controllers/c_home.php");
$c_home = new c_home();
$c_home->index();
?>
s