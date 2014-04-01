<?php
session_start(); //sempre session_start antes de usar sessions
if ( isset($_SESSION['garcom']) ) {
 }


else {
header ("location:../logar.php");
}
?>
<html> 
	<head>
		<meta charset="UTF-8">	
		<title><?php echo $lang['PAGE_TITLE']; ?></title> 
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
	</head>
<body>	
<?php
session_start("mesa");
session_start("garcom");
include_once '../idioma/common.php';
include "../gerencia/config.php";


	echo '<div class="navbar navbar-inverse">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="#" name="top">Petit Gateau</a>
			<div class="nav-collapse collapse">
				<ul class="nav">
						<li><a href="index.php"><i class="icon-home icon-white"></i> Inicio</a></li>
					<li class="divider-vertical"></li>
					<li><a href="pedidos.php"><i class="icon-shopping-cart icon-white"></i> Pedidos</a></li>
					<li class="divider-vertical"></li>
					<li class=""><a href="atendidos.php"><img src="../images/checkicon.png"/> Pedidos Finalizados</a></li>
					<li class="divider-vertical"></li>
                  	<li class="active"><a href="relatorio.php"><img src="../images/stats-white.png"/> Relatórios</a></li>
					<li class="divider-vertical"></li>
					<li><a href="status.php"><i class="icon-signal icon-white"></i> Status Atual</a></li>
					<li class="divider-vertical"></li>
				</ul>
				<div class="btn-group pull-right">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="logout.php">
						<i class="icon-user"></i>
					</a>
					
				
					
				</div>
			</div>
			<!--/.nav-collapse -->
		</div>
		<!--/.container-fluid -->
	</div>
	<!--/.navbar-inner -->
</div>
<!--/.navbar -->';

echo'<div class="btn-toolbar">
    <a href="search.php"><button class="btn btn-primary">Pesquisar</button></a>
    <a href="financeiro.php"><button class="btn">Relatório Financeiro</button>

</div>
<h4>Relatório</h4>';
$timestamp = date();
$atual = strtotime($timestamp);
$now = date('d/m/Y H:i:s', $atual);

/* MONTH YEAR
SELECT * 
FROM clientes
WHERE checkout
BETWEEN (

SELECT  '2013-07-01 00:15:00' - INTERVAL 1 WEEK
)
AND checkout
LIMIT 0 , 30
*/

$sql0 = mysql_query("SELECT * 
FROM clientes
WHERE checkout
BETWEEN (

SELECT CURDATE( )
)
AND checkout", $conexao);
				while($linha = mysql_fetch_array($sql0)){
					
			
					$valor = $linha['valor'];
					$total += $valor;
					}


 $sql1 = mysql_query("SELECT * 
FROM clientes
WHERE checkout
BETWEEN (

SELECT CURDATE( ) - INTERVAL 1 WEEK
)
AND checkout", $conexao);
				while($linha = mysql_fetch_array($sql1)){
					
				
					$valor1 = $linha['valor'];
					$totalsemanal += $valor1;
					} 
$sql2 = mysql_query("SELECT * 
FROM clientes
WHERE checkout
BETWEEN (SELECT curdate() - INTERVAL 1 MONTH)
AND checkout", $conexao);
				while($linha = mysql_fetch_array($sql2)){
					
					
					$valor2 = $linha['valor'];
					$totalmensal += $valor2;
					}	
$sql3 = mysql_query("SELECT * 
FROM clientes
WHERE checkout
BETWEEN (

SELECT CURDATE( ) - INTERVAL 1 YEAR
)
AND checkout", $conexao);
				while($linha = mysql_fetch_array($sql3)){
					
				
					$valor3 = $linha['valor'];
					$totalanual += $valor3;
					}					
					

 echo "<div class='span3'>
	<div class='well'>
		<h2 class='muted'>Diário</h2>
		<p><span class='label'>TOTAL</span></p>
		<ul>
			
			
		</ul>          
		<hr>
		<p><a class='btn btn-large' href='#'>R$ $total</a></p>
	</div>
</div>
<div class='span3'>
	<div class='well'>
		<h2 class='text-warning'>Semanal</h2>
		<p><span class='label label-success'>Total</span></p>
		<ul>
			
		</ul>
		<hr>
		<p><a class='btn btn-success btn-large' href='#'></i>R$ $totalsemanal</a></p>
	</div>
</div>
<div class='span3'>
	<div class='well'>
		<h2 class='text-info'>Mensal</h2>
		<p><span class='label label-info'>Total</span></p>
		<ul>
			
		</ul>          
		<hr>
      <p><a class='btn btn-large' href='#'>R$ $totalmensal</a></p>
	</div>
</div>
<div class='span3'>
	<div class='well'>
		<h2 class='text-info'>Anual</h2>
		<p><span class='label label-info'>Total</span></p>
		<ul>
			
		</ul>          
		<hr>
		<hr>
      <p><a class='btn btn-large' href='#'>R$ $totalanual</a></p>
	</div>
</div>
";




 
?>

</body>
</html>
