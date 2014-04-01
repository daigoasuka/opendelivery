<?php 
session_start("mesa");
session_unset(); // Eliminar todas as variáveis da sessão
session_destroy(); //Destrói Sessão.
header ("location:index.php");
 ?>