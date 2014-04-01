<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
</head>
<body>
<?php
session_start(); //sempre session_start antes de usar sessions
session_start("garcom");
include "config.php";
//PRIMEIRO IF- VERIFICA SE O CLIENTE JA POSSUI UMA MESA/JA REGISTROU ALGUM PEDIDO
if ( isset($_SESSION['mesa']) ) {
		
		$cod = $_POST["cod"];
		$quant = $_POST["quant"];
		$data = date('Y-m-d H:i:s'); // Formato DATETIME: 2013-06-30 18:42:57
		
		if ($quant == '0'){
			echo "<center><h3>Você não selecionou nenhum prato/bebida!</h3><br>Clique <a href='javascript:window.history.go(-1)'>aqui</a> para voltar.<br>ou clique <a href='../drinks.php'>aqui</a> para ver os nossos drinks.</center><br>";
		}
		else {
			$mesa	= $_SESSION['mesa'];
				
			$sql = mysql_query("INSERT INTO  pedidos (
`num_pedido` ,
`id` ,
`quant` ,
`mesa` , 
`atendente` , 
`cliente` ,
`data` 
)
VALUES (
NULL ,  '$cod',  '$quant', '$mesa', '$atendente', '0', '$data');", $conexao)or die("Error: " . mysql_error());
		
		if (mysql_affected_rows() == 1) {
			echo "<h3 align=center>Pedido Registrado!<h3>";
		} else {
			echo "<h3 align=center>falha no cadastro!<br></h3><h5 align='center'></h5>";
		}
		
		$sql = mysql_query("UPDATE mesas SET status = '1' where numero = '$mesa' ", $conexao)or die("Error: " . mysql_error());
		//Cria sessão com o numero da mesa, para localizar pedido posteriormente.
		session_start("mesa");
			$_SESSION["mesa"] = "$mesa";
			//echo 'Pedido mesa: '.$mesa;
		
		mysql_close($conexao); }
		
	header ("location:../carrinho.php");
}
//SEGUNDO IF- CLIENTE NÃO REALIZOU NENHUM PEDIDO ANTES. O ALOCAREMOS EM ALGUMA MESA
else {

		
		$cod = $_POST["cod"];
		$quant = $_POST["quant"];
		$atendente = $_SESSION["garcomid"];
		$data = date('Y-m-d H:i:s'); // Formato DATETIME: 2013-06-30 18:42:57
		if ($quant == '0'){
			echo "<center><h3>Você não selecionou nenhum prato!</h3><br>Clique <a href='javascript:window.history.go(-1)'>aqui</a> para voltar.<br>ou clique <a href='../drinks.php'>aqui</a> para ver os nossos drinks.</center><br>";
		}
		else {
			$sql0 = mysql_query("SELECT numero FROM mesas WHERE STATUS =  '0' LIMIT 1", $conexao);
				while($linha = mysql_fetch_array($sql0)){
					$mesa	= $linha["numero"];
				}
			$sql = mysql_query("INSERT INTO  pedidos (
`num_pedido` ,
`id` ,
`quant` ,
`mesa` ,
`atendente` , 
`cliente` ,
`data`
)
VALUES (
NULL ,  '$cod',  '$quant', '$mesa', '$atendente', '0', '$data');", $conexao)or die("Error: " . mysql_error());
		
		if (mysql_affected_rows() == 1) {
			echo "<h3 align=center>Pedido Registrado!<h3>";
		} else {
			echo "<h3 align=center>falha no cadastro!<br></h3><h5 align='center'></h5>";
		}
		$sql = mysql_query("UPDATE mesas SET status = '1' where numero = '$mesa' ", $conexao)or die("Error: " . mysql_error());
		//Cria sessão com o numero da mesa, para localizar pedido posteriormente.
		session_start("mesa");
			$_SESSION["mesa"] = "$mesa";
			//echo 'Pedido mesa: '.$mesa;
		
		mysql_close($conexao); }
		header ("location:../carrinho.php");
}  

	
?>
</body>
</html>
