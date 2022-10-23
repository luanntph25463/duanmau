<?php
@session_start();
include ("controllers/c_comment.php");
$c_comment = new c_comment();
$c_comment->icrement();
?>