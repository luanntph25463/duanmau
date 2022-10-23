<?php
@session_start();
include ("controllers/c_product.php");
$c_comment = new c_product();
$c_comment->tonghop();
?>