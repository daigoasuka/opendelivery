<?php
//Pega o numero da nova mesa:
$novamesa = $_GET["mudamesa"];

//Inicia a sessão
session_start("mesa");
session_start("garcom");
//Joga o numero da mesa para a session mesa
$_SESSION["mesa"] = $novamesa;
//Envia o garçom para o carrinho da outra mesa
header("location:carrinho.php");
//Limpa a variável com o total da mesa
unset($_SESSION['total']);
?>