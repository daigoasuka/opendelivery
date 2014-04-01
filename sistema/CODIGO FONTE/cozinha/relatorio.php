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
						<li><a href="index.php" target="_self"><i class="icon-home icon-white"></i> Inicio</a></li>
					<li class="divider-vertical"></li>
					<li><a href="pedidos.php" target="_self"><i class="icon-shopping-cart icon-white"></i> Pedidos</a></li>
					<li class="divider-vertical"></li>
					<li class=""><a href="atendidos.php" target="_self"><img src="../images/checkicon.png"/> Pedidos Finalizados</a></li>
					<li class="divider-vertical"></li>
                  	<li class="active"><a href="relatorio.php" target="_self"><img src="../images/stats-white.png"/> Relatórios</a></li>
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
<!--/.navbar -->';
echo'<div class="btn-toolbar">
    <a href="search.php"><button class="btn btn-primary">Pesquisar</button></a>
	<a href="financeiro.php"><button class="btn">Relatório Financeiro</button>
</div>
<h4>Todos os Pedidos</h4>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>#id</th>
          <th>Nome</th>
          <th>Data</th>
		  <th>Metódo Pgto.</th>
          <th>Valor</th>
          <th style="width: 36px;"></th>
        </tr>
      </thead>';
$sql0 = mysql_query("SELECT * FROM clientes order by checkout desc", $conexao);
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
							echo '<tbody>
									<tr>
									  <td>'.$id.'</td>
									  <td>'.$nome.'</td>
									  <td>'.date('d/m/Y H:i:s',$timestamp).'</td>
									  <td>'.$metodo.'</td>
									  <td>'.$valor.'</td>
									  <td>
										  
									  </td>
									</tr>
								 
								  </tbody>';
					}
	
      echo '
    </table>
</div>
';

?>

</body>
</html>
