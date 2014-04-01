<html> 
	<head>
		<meta charset="UTF-8">	
		<title><?php echo $lang['PAGE_TITLE']; ?></title> 
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
	</head>
<body>	
<?php
session_start("mesa");
include_once '../idioma/common.php';
include "config.php";

$pagamento = $_POST["pagamento"];
$_SESSION['metodo'] = $pagamento;

//SE O PAGAMENTO FOR EM DINHEIRO, NÃO HÁ NECESSIDADE DE REGISTRAR O CLIENTE.
if ($pagamento == '0') {
		
	
	$valor = $_SESSION['total'];
	$checkout = date('Y-m-d H:i:s');
$sql = mysql_query("INSERT INTO clientes (
`id_cliente` ,
`nome` ,
`checkout` ,
`metodo_pag` ,
`valor`
)
VALUES (
NULL ,  'Sem registro',  '$checkout', '0', '$valor');", $conexao)or die("Error: " . mysql_error());
		
		if (mysql_affected_rows() == 1) {
					/* //Muda o Status de cada pedido da mesa como pago.
					$sql = mysql_query("UPDATE pedidos set status=1 WHERE status=('SELECT status FROM pedidos where mesa=".$_SESSION["mesa"]." group by status')", $conexao)or die("Error: " . mysql_error()); */
						
					 //Muda o Status do pagamento de cada pedido
					$sql = mysql_query("UPDATE pedidos set pagamento=1 WHERE pagamento=('SELECT pagamento FROM pedidos where mesa=".$_SESSION["mesa"]." group by pagamento')", $conexao)or die("Error: " . mysql_error());
					
					//Pega o ultimo cliente registrado
					$sql = mysql_query("SELECT id_cliente from clientes ORDER BY id_cliente DESC limit 1", $conexao)or die("Error: " . mysql_error());
					while($linha = mysql_fetch_array($sql)){
						$cliente = $linha['id_cliente'];
					}
					
					 //Vincula o cliente aos pedidos
					$sql = mysql_query("UPDATE pedidos set cliente='".$cliente."' WHERE cliente=('SELECT cliente FROM pedidos where mesa=".$_SESSION["mesa"]." AND group by cliente')", $conexao)or die("Error: " . mysql_error());

					//Muda o Status da mesa para 0 (desocupada).
					/* $sql = mysql_query("UPDATE mesas SET status = '0' where numero = '".$_SESSION["mesa"]."' ", $conexao)or die("Error: " . mysql_error()); */

					//Limpa os dados da sessão (total do mesa)
					if ( isset($_SESSION['mesa']) ) {
						unset($_SESSION['total']);
						unset($_SESSION['mesa']);
						unset($_SESSION['metodo']); 
					
					}
					header ("location:ok.php");
				}
}					
if ($pagamento == '1') {	

	echo "<form class='form-horizontal span6' action='encerra.php' method='post'>
	<center><img src='../images/logo.png' border=''/></center>
	<fieldset>
		<legend>Pagamento no Crédito</legend>
 
		<div class='control-group'>
			<label class='control-label'>Proprietário do Cartão</label>
			<div class='controls'>
				<input type='text' name='nome' class='input-block-level' pattern='\w+ \w+.*' title='Nome e Sobrenome' required>
			</div>
		</div>
 
		<div class='control-group'>
			<label class='control-label'>Numero Cartão</label>
			<div class='controls'>
				<div class='row-fluid'>
					<div class='span3'>
						<input type='text' class='input-block-level' autocomplete='off' maxlength='4' pattern='\d{4}' title='Primeiros 4' required>
					</div>
					<div class='span3'>
						<input type='text' class='input-block-level' autocomplete='off' maxlength='4' pattern='\d{4}' title='Segundos 4 digitos' required>
					</div>
					<div class='span3'>
						<input type='text' class='input-block-level' autocomplete='off' maxlength='4' pattern='\d{4}' title='Terceiros 4 digitos' required>
					</div>
					<div class='span3'>
						<input type='text' class='input-block-level' autocomplete='off' maxlength='4' pattern='\d{4}' title='Quartos 4 digitos' required>
					</div>
				</div>
			</div>
		</div>
 
		<div class='control-group'>
			<label class='control-label'>Expira dia</label>
			<div class='controls'>
				<div class='row-fluid'>
					<div class='span9'>
						<select class='input-block-level'>
							<option>Jan</option>
							<option>Fev</option>
							<option>Mar</option>
							<option>Abri</option>
							<option>Jun</option>
							<option>Jul</option>
							<option>Ago</option>
							<option>Set</option>
							<option>Out</option>
							<option>Nov</option>							
							<option>Dez</option>
						</select>
					</div>
					<div class='span3'>
						<select class='input-block-level'>
							<option>13</option>
							<option>14</option>
							<option>15</option>
						</select>
					</div>
				</div>
			</div>
		</div>
 
		<div class='control-group'>
			<label class='control-label'>CVV</label>
			<div class='controls'>
				<div class='row-fluid'>
					<div class='span3'>
						<input type='text' class='input-block-level' autocomplete='off' maxlength='3' pattern='\d{3}' title='3 dígitos de trás do seu cartão' required>
					</div>
					<div class='span8'>
						<!-- screenshot may be here -->
					</div>
				</div>
			</div>
		</div>
 
		<div class='form-actions'>
			<button type='submit' class='btn btn-primary'>Confirmar</button>
			<button type='button' class='btn'>Cancelar</button>
		</div>
	</fieldset>
</form>";
		
} 

if ($pagamento == '2') {	
	echo "<form class='form-horizontal span6' action='encerra.php' method='post'>
	<center><img src='../images/logo.png' border=''/></center>
	<fieldset>
		<legend>Pagamento no Débito</legend>
 
		<div class='control-group'>
			<label class='control-label'>Proprietário do Cartão</label>
			<div class='controls'>
				<input type='text' name='nome' class='input-block-level' pattern='\w+ \w+.*' title='Nome e Sobrenome' required>
			</div>
		</div>
 
		<div class='control-group'>
			<label class='control-label'>Ag.</label>
			<div class='controls'>
				<div class='row-fluid'>
					<div class='span3'>
						<input type='text' class='input-block-level' autocomplete='off' maxlength='6' title='Agencia'>
					</div>
					<div class='span8'>
						<!-- screenshot may be here -->
					</div>
				</div>
			</div>
		</div>
		<div class='control-group'>
			<label class='control-label'>Conta Corrente.</label>
			<div class='controls'>
				<div class='row-fluid'>
					<div class='span3'>
						<input type='text' class='input-block-level' autocomplete='off' maxlength='6' title='Agencia'>
					</div>
					<div class='span8'>
						<!-- screenshot may be here -->
					</div>
				</div>
			</div>
		</div>
		<div class='control-group'>
			<label class='control-label'>Banco</label>
			<div class='controls'>
				<div class='row-fluid'>
					<div class='span3'>
						<input type='text' class='input-block-level' autocomplete='off' maxlength='10'  title='Banco'>
					</div>
					<div class='span8'>
						<!-- screenshot may be here -->
					</div>
				</div>
			</div>
		</div>
 
		<div class='form-actions'>
			<button type='submit' class='btn btn-primary'>Confirmar</button>
			<button type='button' class='btn'>Cancelar</button>
		</div>
	</fieldset>
</form>";

} 

if ($pagamento == '3') {	
	echo "<form class='form-horizontal span6' action='encerra.php' method='post'>
	<center><img src='../images/logo.png' border=''/></center>
	<fieldset>
		<legend>Cheque</legend>
 
		<div class='control-group'>
			<label class='control-label'>Nome do Cliente</label>
			<div class='controls'>
				<input type='text' name='nome' class='input-block-level' pattern='\w+ \w+.*' title='Nome e Sobrenome' required>
			</div>
		</div>
 		<div class='control-group'>
			<label class='control-label'>Telefone</label>
			<div class='controls'>
				<input type='text' name='telefone' title='Nome e Sobrenome' required>
			</div>
		</div>

 
		<div class='form-actions'>
			<button type='submit' class='btn btn-primary'>Confirmar</button>
			<button type='button' class='btn'>Cancelar</button>
		</div>
	</fieldset>
</form>";

} 
?>

</body>
</html>

<!--
/* 	
	
				echo "<li><h3>".$lang['MENU_PEDIDO']."</h3></center><br>";
					echo "<br>".$lang['MENU_MESA'].": ".$_SESSION["mesa"];
					echo "<br>".$lang['ATENDENTE'].": ".$_SESSION["garcom"];
							
					
					
				
				
				//echo '<br><br><br>'.$lang['MENU_TOTAL'].': R$'.$_SESSION["total"];
				echo "<input type='button' value='".$lang['MENU_TOTAL'].": R$ ".$_SESSION["total"]."'/><br>";
				echo "<li><form method='post' action='finaliza.php'><input type='hidden' name='cod' value='".$_SESSION['mesa']."'></a><select name='quant'  data-native-menu='false' data-theme='c' >
		   <option value='0'>Débito</option>
		   <option value='1'>Crédito</option>
		   <option value='2'>Dinheiro</option>
		   <option value='2'>Cheque</option>
		</select><input type='submit' value='Finalizar'></form></li>";
 */	
//	session_destroy();

	
	
	/* session_start("mesa");
if ( isset($_SESSION['mesa']) ) {
session_destroy();
echo utf8_decode("Sessão destruída!");
}
else{
echo utf8_decode("Não existe sessão!");
} */
	?>-->
	
	
