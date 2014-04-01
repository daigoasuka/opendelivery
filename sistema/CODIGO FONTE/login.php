<?php
include_once 'idioma/common.php';
session_start(); //sempre session_start antes de usar sessions
if ( isset($_SESSION['garcom']) ) {
header ("location:index.php"); }


else {
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
	<a href="pratos.php"><img src="images/prato.png" /></a&nbsp;&nbsp;
	<a href="drinks.php"><img src="images/drink.png" /></a>&nbsp;&nbsp;
	<a href="carrinho.php"><img src="images/cart.png" /></a>&nbsp;&nbsp;
	<a href="sobre.php"><img src="images/about.png" /></a>&nbsp;&nbsp;
	<a href="configs.php"><img src="images/config.png" /></a>
	</div>
	<div class="choice_list"> 
	
	
	
	<ul data-role="listview" data-inset="true" >
	<?php echo $lang['']; ?>
	<li><center> <h3><?php echo $lang['MENU_LOGIN']; ?></h3>
	
	
	
	<form action="autenticacao.php" method="post">
		<!--USERNAME-->
			<input name="login" type="text" class="input username" value="Usuário" onfocus="this.value=''"/> 
		<!--END USERNAME-->
		<!--PASSWORD-->
		<input name="senha" type="password" class="input password" value="Senha" autocomplete="off" onfocus="this.value=''" />
		<!--END PASSWORD-->
		
		<!--LOGIN BUTTON-->
		<input type="submit" name="submit" value="Login" class="button" />
		<!--END LOGIN BUTTON-->
	
	
	
	
	</form></center></li></ul>	
    </div>


	
	
	</div>
	</div>

</div><!-- /page -->
</body>
</html>
