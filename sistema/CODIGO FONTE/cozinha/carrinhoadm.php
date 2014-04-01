<?php
include_once '../idioma/common.php';
session_start(); //sempre session_start antes de usar sessions
if ( isset($_SESSION['garcom']) ) {
 }


else {
header ("location:../logar.php");
}
?>
<!DOCTYPE html> 
<html> 
	<head>
  <meta charset="UTF-8">	
	<title><?php echo $lang['PAGE_TITLE']; ?></title> 
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="../jquery.mobile.structure-1.0.1.css" />
	<link rel="apple-touch-icon" href="../images/launch_icon_57.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="../images/launch_icon_72.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="../images/launch_icon_114.png" />
	<link rel="stylesheet" href="../jquery.mobile-1.0.1.css" />
	<link rel="stylesheet" href="../custom.css" />
	<script src="../js/jquery-1.7.1.min.js"></script>
	<script src="../js/jquery.mobile-1.0.1.min.js"></script>
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
						<li><a href="index.php" target="_self"><i class="icon-home icon-white"></i> Inicio</a></li>
					<li class="divider-vertical"></li>
					<li class="active"><a href="pedidos.php" target="_self"><i class="icon-shopping-cart icon-white"></i> Pedidos</a></li>
					<li class="divider-vertical"></li>
					<li class=""><a href="atendidos.php" target="_self"><img src="../images/checkicon.png"/> Pedidos Finalizados</a></li>
					<li class="divider-vertical"></li>
                  	<li><a href="relatorio.php" target="_self"><img src="../images/stats-white.png"/> Relatórios</a></li>
					<li class="divider-vertical"></li>
					<li class="active"><a href="status.php" target="_self"><i class="icon-signal icon-white"></i> Status Atual</a></li>
					<li class="divider-vertical"></li>
				</ul>
				
			</div>
			<!--/.nav-collapse -->
		</div>
		<!--/.container-fluid -->
	</div>
	<!--/.navbar-inner -->
</div>
<!--/.navbar -->';

	

?>

	<div data-role="content">
	
	
	<div id="language">
	
	
	</div>
	
	
	
	
	
	
	<ul data-role="listview" data-inset="true" >
<?php  
	include "../gerencia/config.php";
	session_start("mesa");
	session_start("garcom");
	$numero_mesa = $_GET['mesa'];
	$sql0 = mysql_query("SELECT * FROM pedidos WHERE mesa = '".$numero_mesa."' AND status =0", $conexao);
				echo "<li><h3>Pedidos pendendes Mesa: ".$numero_mesa."</h3></center><br>";
				if (mysql_affected_rows() != 0) {
				
				}
				else { echo '<br><br>Nenhum pedido pendente.<br><a href="fechamesa.php?num_mesa='.$numero_mesa.'" target="_self">Deseja fechar a mesa?</a><br><br><br><br>';}	
					echo "<br>".$lang['ATENDENTE'].":  ".$_SESSION["garcom"];
				while($linha = mysql_fetch_array($sql0)){
					
					echo "<hr>".$lang['MENU_PEDID']." n': ".$linha['num_pedido'];
					$id = $linha["id"];
					$sql1 = mysql_query("SELECT * FROM itens WHERE id = '".$id."'", $conexao);
						while($linha = mysql_fetch_array($sql1)){
							$nome = $linha['nome'];
							$preco = $linha['preco'];
							$total += $preco;
							$_SESSION["total"] = "$total";
							echo ' - '.$nome.' - R$'.$preco;
					}
					
					
					
				
				}
				
				echo "<input type='button' value='".$lang['MENU_TOTAL'].": R$ ".$_SESSION["total"]."'/><br>";
				
					
	?>
	</li>
	
	</ul>	
	
	</div>
	</div></div>


	</body>
	</html>