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
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
	
	<script language="javascript" type="text/javascript">
	function validar() {
	var username = form1.login.value;
	var password = form1.senha.value;

	if (username == "") {
	alert('Preencha o campo com seu usuario!');
	form1.login.focus();
	return false;
	}
	if (password == "") {
	alert('Insira a sua senha!');
	form1.senha.focus();
	return false;
	}
	}
	</script>

</head> 

<body background="images/bg.png">  

<form class="form-horizontal" action='autenticacao.php' name="form1" method="POST">
  <fieldset>
    <div id="legend">
      <legend><?php echo $lang['MENU_LOGIN']; ?></legend>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username"><?php echo $lang['LOGIN']; ?></label>
      <div class="controls">
        <input type="text" name="login" placeholder="" class="input-xlarge">
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password"><?php echo $lang['SENHA']; ?></label>
      <div class="controls">
        <input type="password" name="senha" placeholder="" class="input-xlarge">
      </div>
    </div>
 
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success" onclick="return validar()">Login</button>
      </div>
    </div>
  </fieldset>
</form>
	
	
	
	
	</form>
	</body>