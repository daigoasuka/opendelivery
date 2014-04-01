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
include "config.php";


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
					<li class="active"><a href="index.php"><i class="icon-home icon-white"></i> Inicio</a></li>
					<li class="divider-vertical"></li>
					<li><a href="pedidos.php"><i class="icon-shopping-cart icon-white"></i> Pedidos</a></li>
					<li class="divider-vertical"></li>
					<li class=""><a href="atendidos.php"><img src="../images/checkicon.png"/> Pedidos Finalizados</a></li>
					<li class="divider-vertical"></li>
                  	<li><a href="relatorio.php"><i class=""><img src="../images/stats-white.png"/></i> Relatórios</a></li>
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
echo '<br><br><br><br><center><img src="../images/logo.png" border="0"/></center><br><br><br><br><br><br><br><br>';

echo '<div class="container">	
<div class="row-fluid">
				<div class="span12">
				
				</div>
			</div>
			<hr>
			<div class="row-fluid">
				<div class="span12">
					<div class="span8">
						<a href="#">Ajuda</a>  |						
						<a href="#">Relatar algum erro</a>
					</div>
					<div class="span4">
						<p class="muted pull-right">© 2013 TSI12 Gerenciamento de Restaurante.</p>
					</div>
				</div>
			</div>
  </div>';		

?>

</body>
</html>
