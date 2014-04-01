<?php
session_start();
include_once '../idioma/common.php';
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
</head> 

<body> 
<div data-role="page" id="home" data-theme="c">

	<div data-role="content">
	
	<div id="branding">

	</div>
	<div id="language">
	
	
	</div>
	<div id="buttonn">
	<a href="../index.php"><img src="../images/inicio.png" /></a>&nbsp;&nbsp;
	<a href="../pratos.php"><img src="../images/prato.png" /></a&nbsp;&nbsp;
	<a href="../drinks.php"><img src="../images/drink.png" /></a>&nbsp;&nbsp;
	<a href="../carrinho.php"><img src="../images/cart.png" /></a>&nbsp;&nbsp;
	<a href="../sobre.php"><img src="../images/about.png" /></a>&nbsp;&nbsp;
	<a href="../configs.php"><img src="../images/config.png" /></a>
	</div>
	
	
	
	
	
	<ul data-role="listview" data-inset="true" >
	<?php  
	include "config.php";
	
	
	
				echo "<li><h3>".$lang['MENU_PEDIDO']."</h3></center><br>";
					echo "<br>".$lang['MENU_MESA'].": ".$_SESSION["mesa"];
					echo "<br>".$lang['ATENDENTE'].": ".$_SESSION["garcom"];
							
					
					
				
				
				//echo '<br><br><br>'.$lang['MENU_TOTAL'].': R$'.$_SESSION["total"];
				echo "<input type='button' value='".$lang['MENU_TOTAL'].": R$ ".$_SESSION["total"]."'/><br>";
				echo "<li><form method='post' action='finaliza.php' target='_self'><input type='hidden' name='cod' value='".$_SESSION['mesa']."'></a><select name='pagamento'  data-native-menu='false' data-theme='c' >
		   <option value='0'>Dinheiro</option>
		   <option value='1'>Crédito</option>
		   <option value='2'>Débito</option>
		   <option value='3'>Cheque</option>
		</select><input type='submit' value='Finalizar'></form></li>";
	

	?>
	
	
	
	</li>
	
	</ul>	
	
	</div>
	</div>

</div><!-- /page -->
</body>
</html>
