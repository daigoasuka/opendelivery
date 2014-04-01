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
					<li class="active"><a href="pedidos.php"><i class="icon-shopping-cart icon-white"></i> Pedidos</a></li>
					<li class="divider-vertical"></li>
					<li class=""><a href="atendidos.php"><img src="../images/checkicon.png"/> Pedidos Finalizados</a></li>
					<li class="divider-vertical"></li>
                  	<li><a href="relatorio.php"><img src="../images/stats-white.png"/> Relatórios</a></li>
					<li class="divider-vertical"></li>
					<li class="active"><a href="status.php"><i class="icon-signal icon-white"></i> Status Atual</a></li>
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
    <a href="search.php"><button class="btn btn-primary">Ver Pedidos encerrados</button></a>
 <br>
<h4>Mesas Livres <img src="../images/livre.png" width="16px" height="16px"/></h4>';
$sql1 = mysql_query("SELECT * from mesas WHERE status ='0'", $conexao);
						while($linha = mysql_fetch_array($sql1)){
							$numero = $linha['numero'];
							 echo "<a href='#'><button class='btn'>Mesa $numero</button></a>";
						}
 echo '<br><br><br><h4>Mesas Ativas <img src="../images/ocupada.png" width="16px" height="16px"/></h4>
</div>';

			
					$sql1 = mysql_query("SELECT * from mesas WHERE status ='1'", $conexao);
					if (mysql_affected_rows() != 0) {			
						while($linha = mysql_fetch_array($sql1)){
							$numero = $linha['numero'];
						
						
							echo "<div class='span3'>
									<div class='well'>
										<h2 class='muted'>Mesa $numero</h2>
										<p><span class='label'>Status</span><br><br><img src='../images/ocupada.png'/></p>
										
									<ul>				
									</ul>          
									<hr>
									
									<p><a class='btn btn-large' href='carrinhoadm.php?mesa=".$numero."'>Ver Pedidos</a></p>
								</div>
									</div>"; 
									
					}
					}
					else {
					echo '<div class="hero-unit center">
    <h3>Não há nenhuma mesa ativa!</h3><br>
	<h5>Limpe alguma mesa ou lave as panelas enquanto aguarda algum cliente.</h5>
    <br />
    <a href="financeiro.php" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Verificar balanço</a>
  </div>';
					
					
					}

?>

</body>
</html>
