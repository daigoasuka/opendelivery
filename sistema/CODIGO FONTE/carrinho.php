<?php
include_once 'idioma/common.php';
include "gerencia/config.php";
session_start(); //sempre session_start antes de usar sessions
if ( isset($_SESSION['garcom']) ) {

}


else {
header ("location:logar.php");
}

?>
<!DOCTYPE html> 
<html> 
	<head>
  <meta charset="UTF-8">	
	<title><?php echo $lang['PAGE_TITLE']; ?></title> 
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="jquery.mobile.structure-1.0.1.css" />
	<link rel="apple-touch-icon" href="images/launch_icon_57.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="images/launch_icon_72.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="images/launch_icon_114.png" />
	<link rel="stylesheet" href="jquery.mobile-1.0.1.css" />
	<link rel="stylesheet" href="custom.css" />
	<script src="js/jquery-1.7.1.min.js"></script>
	<script src="js/jquery.mobile-1.0.1.min.js"></script>
</head> 

<body> 
<div data-role="page" id="home" data-theme="c">

	<div data-role="content">
	
	<div id="branding">

	</div>
	<div id="language">
	
	
	</div>
	<div id="buttonn">
	<a href="index.php"><img src="images/inicio.png" /></a>&nbsp;&nbsp;
	<a href="pratos.php"><img src="images/prato.png" /></a>&nbsp;&nbsp;
	<a href="drinks.php"><img src="images/drink.png" /></a>&nbsp;&nbsp;
	<a href="carrinho.php"><img src="images/cart.png" /></a>&nbsp;&nbsp;
	<a href="sobre.php"><img src="images/about.png" /></a>&nbsp;&nbsp;
	<a href="configs.php"><img src="images/config.png" /></a>
	<?php if(isset($_SESSION['garcom'])){	echo "<a href='logout.php' target='_self'><img src='images/login.png' border='0'/></a>";
	}
	else { echo "<a href='logar.php' target='_self'><img src='images/login.png' border='0'/></a>";}?>
	</div>
	
	
	<form name="mesa" action="mudamesa.php" target="_self">
	<label for="select-choice-0" class="select"><h3>Selecionar outra Mesa ativa</h3></label>
		<select name="mudamesa" data-native-menu="false" data-theme="c" >
			<?php $sql0 = mysql_query("SELECT numero FROM mesas WHERE status =1 AND numero !=".$_SESSION["mesa"]." ", $conexao);
				if (mysql_affected_rows() != 0) {			
				while($linha = mysql_fetch_array($sql0)){ 
				echo '<option value="'.$linha["numero"].'">'.$linha["numero"].'</option>';
				}}
				else {
				echo '<option>Nenhuma mesa em aberto</option>';
				}
					//echo "<br>".$lang['ATENDENTE'].": ".$_SESSION["garcom"];
					
				?>
		   
		   
		</select>	
		<input type="submit" value="Trocar"/>
	</form>
	
	
	<ul data-role="listview" data-inset="true" >
	<?php  
	
	session_start("mesa");
	session_start("garcom");
	$sql0 = mysql_query("SELECT * FROM pedidos WHERE mesa = '".$_SESSION["mesa"]."' AND status =0", $conexao);
				echo "<li><h3>".$lang['MENU_PEDIDO']."</h3></center><br>";
					echo "<br>".$lang['MENU_MESA'].": ".$_SESSION["mesa"];
					echo "<br>".$lang['ATENDENTE'].": ".$_SESSION["garcom"];
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
				//echo '<br><br><br>'.$lang['MENU_TOTAL'].': R$'.$_SESSION["total"];
				echo "<input type='button' value='".$lang['MENU_TOTAL'].": R$ ".$_SESSION["total"]."'/><br>";
				echo "<form action='gerencia/fechar.php' method='get' target='_self'><input type='submit' value='Fechar Pedido'/></form>";
	?>
	
	
	
	
	</li>
	
	</ul>	
	<form name="mesa" action="mudamesa.php" target="_self">
	<label for="select-choice-0" class="select"><h3>Registrar nova mesa</h3></label>
		<select name="mudamesa" data-native-menu="false" data-theme="c" >
			<?php $sql0 = mysql_query("SELECT numero FROM mesas WHERE status =0", $conexao);
				if (mysql_affected_rows() != 0) {			
				while($linha = mysql_fetch_array($sql0)){ 
				echo '<option value="'.$linha["numero"].'">'.$linha["numero"].'</option>';
				}}
				else {
				echo '<option>Nenhuma mesa vazia</option>';
				}
					//echo "<br>".$lang['ATENDENTE'].": ".$_SESSION["garcom"];
					
				?>
		   
		   
		</select>	
		<input type="submit" value="Trocar"/>
	</form>
	</div>
	</div>

</div><!-- /page -->
</body>
</html>
