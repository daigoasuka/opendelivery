<?php
$mesa = $_GET["num_mesa"];
include "../gerencia/config.php";
//Fecha a mesa
$sql = mysql_query('UPDATE mesas SET status="0" where numero='.$mesa.' ', $conexao)or die("Error: ".mysql_error());
header("location:status.php"); 
?>