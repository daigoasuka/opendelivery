<?php
	$servidor = "localhost";// trocar servidor
	$usuario = "root";      // trocar usuario
	$senha = "";  // trocar senha
	$banco = "opendelivery";  // Banco

	$conexao = mysql_connect($servidor, $usuario, $senha)or die("Erro: " .  mysql_error());

	mysql_select_db($banco,$conexao)or die("Erro: " .  mysql_error());
?>
