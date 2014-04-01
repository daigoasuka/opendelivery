<?php
include_once 'idioma/common.php';
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
	<!--<a href="index.php?lang=pt"><img src="images/lang_br.png" /></a>
	<a href="index.php?lang=fr"><img src="images/lang_fr.png" /></a>-->
	</div>
	<div id="buttonn">
	<a href="index.php"><img src="images/inicio.png" /></a>&nbsp;&nbsp;
	<a href="pratos.php"><img src="images/prato.png" /></a>&nbsp;&nbsp;
	<a href="drinks.php"><img src="images/drink.png" /></a>&nbsp;&nbsp;
	<a href="carrinho.php"><img src="images/cart.png" /></a>&nbsp;&nbsp;
	<a href="sobre.php"><img src="images/about.png" /></a>&nbsp;&nbsp;
	<a href="configs.php"><img src="images/config.png" /></a>
	</div>
	<div class="choice_list"> 
	
	<h1><?php echo $lang['CARDAPIO_TITULO1']; ?></h1>
	
	<ul data-role="listview" data-inset="true" >
	<?php
	include "gerencia/config.php";
	$sql = mysql_query("select * from itens where categoria='pratos' order by nome", $conexao);
		while($linha = mysql_fetch_array($sql)){
			$id	= $linha["id"];
			$nome  = $linha["nome"];
			$imgid  = $linha["img"];
			echo "<li><img src='pratos/".$imgid.".jpg'/><form id='form-id' method='post' action='gerencia/adddb.php' target='_self'><input type='hidden' name='cod' value='$id'> <h3> $nome</a></h3></span>Porções:	<select name='quant'  data-native-menu='false' data-theme='c' >
		   <option value='0'>0</option>
		   <option value='1'>1</option>
		   <option value='2'>2</option>
		   <option value='3'>3</option>
		   <option value='4'>4</option>
		   <option value='5'>5</option>
		   <option value='6'>6</option>
		</select><input type='submit' value='Add'></form></li>";
		}

	mysql_close($conexao);

	?>
	</ul>	
	
	</div>
	</div>

</div>
</body>
</html>
