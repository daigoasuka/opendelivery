<?php
	include 'config.php';
	
	
	
		$login = $_POST["login"];
		$senha = $_POST["senha"];
		
	
			$sql = mysql_query("SELECT * FROM sistema WHERE sis_user='".$login."' AND sis_pass='".$senha."'", $conexao);
			
				if (mysql_affected_rows() != 0) {			
						while($linha = mysql_fetch_array($sql)){
					session_start("garcom");
					$_SESSION['garcom'] = $linha["nome"];
					$_SESSION['garcomid'] = $linha["id"];
					header ("location:index.php");
					}
					
				} 
				else {
					header ("location:logar.php");
			
				}
		 
		 
	
	mysql_close($conexao);
?>
