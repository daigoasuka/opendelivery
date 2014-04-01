<?php
include_once 'idioma/common.php';
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
<div id="restau" data-role="page" data-add-back-btn="true">
	
	<div data-role="header"> 
		<h1> </h1>
	</div> 
	
	<div data-role="content">
	<div class="ui-grid-a" id="restau_infos">	
		<div class="ui-block-a">
		<h1>Configurações</h1>
					
		</div>		
		<div class="ui-block-b">
		
		</div>
	</div><!-- /grid-a -->
	<hr/>
	
	<div class="ui-grid-a" id="contact_infos">	
		<div class="ui-block-a">
		<p><h2>Idioma</h2></p>
		<ul>
		<li>
		<a href="index.php?lang=pt"><img src="images/lang_br.png" /></a> Português-BR</li><br>
	<li><a href="index.php?lang=fr"><img src="images/lang_fr.png" /></a> Francês</li>
		</div>		
		<div class="ui-block-b">
		
		</div>
	</div>
	
	<hr/><br><br>
	<hr>
	<div id="notation">	
	<form>
	<label for="select-choice-0" class="select"><h2>Avalie-nos!</h2></label>
		<select name="note_utilisateur" id="note_utilisateur" data-native-menu="false" data-theme="c" >
		   <option value="one" class="one"> Ruim </option>
		   <option value="two" class="two">Regular </option>
		   <option value="three" class="three">Muito bom </option>
		   <option value="four" class="four"> Excelente </option>
		</select>	
	</form>
	</div>
	


	<script type="text/javascript">

	$( '#restau' ).live( 'pageinit',function(event){
		var SelectedOptionClass = $('option:selected').attr('class');
		$('div.ui-select').addClass(SelectedOptionClass);
		
		$('#note_utilisateur').live('change', function(){	 
			$('div.ui-select').removeClass(SelectedOptionClass);
			
			SelectedOptionClass = $('option:selected').attr('class');
			$('div.ui-select').addClass(SelectedOptionClass);		
			
		 });
		
	  
	});

	</script>
	

	</div>


</div><!-- /page -->
</body>
</html>