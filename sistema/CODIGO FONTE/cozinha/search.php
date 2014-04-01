<?php 
session_start(); //sempre session_start antes de usar sessions
if ( isset($_SESSION['garcom']) ) {
 }


else {
header ("location:../logar.php");
}
session_start("mesa");
session_start("garcom");
include_once '../idioma/common.php';
include "../gerencia/config.php";
?>
<!DOCTYPE html> 
<html> 
<head> 
	 <meta charset="UTF-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="jquery.mobile.structure-1.0.1.css" />
	<link rel="apple-touch-icon" href="images/launch_icon_57.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="images/launch_icon_72.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="images/launch_icon_114.png" />
	<link rel="stylesheet" href="../jquery.mobile-1.0.1.css" />
	<link rel="stylesheet" href="../custom.css" />
	<script src="../js/jquery-1.7.1.min.js"></script>
	<script src="../js/cozinha.js"></script>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />

</head> 
<body> 
<?php
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
					<li><a href="index.php" target="_self"><i class="icon-home icon-white"></i> Inicio</a></li>
					<li class="divider-vertical"></li>
					<li><a href="pedidos.php" target="_self"><i class="icon-shopping-cart icon-white"></i> Pedidos</a></li>
					<li class="divider-vertical"></li>
					<li class=""><a href="atendidos.php" target="_self"><img src="../images/checkicon.png"/> Pedidos Finalizados</a></li>
					<li class="divider-vertical"></li>
                  	<li><a href="relatorio.php" target="_self"><img src="../images/stats-white.png"/> Relatórios</a></li>
					<li class="divider-vertical"></li>
					<li><a href="status.php" target="_self"><i class="icon-signal icon-white"></i> Status Atual</a></li>
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
<!--/.navbar -->'; ?>
<div data-role="content">
	
	<div class="choice_list"> 

	
	<ul data-role="listview" data-inset="true" data-filter="true"  >
		<?php
	include "../gerencia/config.php";
	$sql0 = mysql_query("SELECT * FROM clientes", $conexao);
				while($linha = mysql_fetch_array($sql0)){
					
					$id = $linha['id_cliente'];
					$nome = $linha['nome'];
					$data = $linha['checkout'];
					
					$metodo = $linha['metodo_pag'];
					$valor = $linha['valor'];
					if ($metodo == '0') { $metodo = 'Dinheiro';}
					if ($metodo == '1') { $metodo = 'Crédito';}
					if ($metodo == '2') { $metodo = 'Débito';}
					if ($metodo == '3') { $metodo = 'Cheque';}
					$timestamp = strtotime($data);
			
				
							$item = $linha['nome'];
							echo "<li>ID: $id | Cliente: $nome | Data: ".date('d/m/Y H:i:s',$timestamp)." | Pgto: $metodo</li>";
					}
	
    
			
			
			
		

	mysql_close($conexao);

	?>
	
	</ul>
	</div>
	
	</div>
	</body>
	</html>