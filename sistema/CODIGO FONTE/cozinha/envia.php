<?php
include "../gerencia/config.php";
$id = $_GET['id'];
echo $id;
$sql = mysql_query("UPDATE pedidos set status=1 WHERE num_pedido='".$id."' ", $conexao)or die("Error: " . mysql_error());
header("location:pedidos.php");
?>