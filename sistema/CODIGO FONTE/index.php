<?php
include_once 'idioma/common.php';
include 'config.php';
session_start("garcom");
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
	<div class="choice_list"> 
	
	<h1><?php echo $lang['CARDAPIO_MENU']; ?></h1>
	
	<ul data-role="listview" data-inset="true" >
	
		
	<?php if(isset($_SESSION['garcom'])){
	
	echo "<li>Você está logado como: <i>".$_SESSION['garcom']."</i></li>";}
	


	
	?>
	<li><a href='pratos.php' data-transition='slidedown'><center> <h3><?php echo $lang['MENU_PRATOS']; ?></h3></center></a></li>
	<li><a href='drinks.php' data-transition='slidedown'><center> <h3> <?php echo $lang['MENU_BEBIDAS']; ?></h3></center></a></li>
	<?php 
	if(isset($_SESSION['garcom'])){
		echo "<li><a href='index2.php'>Registrar nova mesa</a></li>";
		echo "<li><a href='index2.php'>Manipular mesa ativa</a></li>";
		
	}
	else {
		echo "<li>Você precisa efetuar login.";
	}
		?>
		

	
	
	
	</ul>	
	
	
	</div>
	</div>

</div><!-- /page -->
</body>
</html>
