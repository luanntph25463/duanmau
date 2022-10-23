<?php
@session_start();
include ("controllers/c_chart.php");
$c_chart = new c_chart();
$c_chart->index();
?>