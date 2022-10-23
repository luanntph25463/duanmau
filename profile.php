<?php
@session_start();
include ("controllers/c_user.php");
$c_user = new c_user();
$c_user->index();
?>