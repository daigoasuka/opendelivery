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

</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>#id</th>
          <th>Pedido</th>
          <th>Horário</th>
		  <th>Quantidade</th>
          <th>Mesa</th>
          <th style="width: 36px;">Atender</th>
        </tr>
      </thead>';
$sql0 = mysql_query("SELECT * FROM pedidos WHERE status =0", $conexao);
				while($linha = mysql_fetch_array($sql0)){
					
					$id = $linha['num_pedido'];
					$nome = $linha['id'];
					$mesa = $linha['mesa'];
					$quant = $linha['quant'];
					$data = $linha['data'];
					$timestamp = strtotime($data);
			
					$sql1 = mysql_query("SELECT nome FROM itens WHERE id = '".$nome."'", $conexao);
						while($linha = mysql_fetch_array($sql1)){
							$item = $linha['nome'];
							echo '<tbody>
									<tr>
									  <td>'.$id.'</td>
									  <td>'.$item.'</td>
									  <td>'.date('d/m ~ H:i:s',$timestamp).'</td>
									  <td>'.$quant.'</td>
									  <td>'.$mesa.'</td>
									  <td>
										  <a href="envia.php?id='.$id.'"><img src="../images/check.png" alt="Pronto"/></a>
									  </td>
									</tr>
								 
								  </tbody>';
					}
	}
      echo '
    </table>
</div>
';

?>

</body>
</html>
