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
		<h1> Restaurant Picker</h1>
	</div> 
	
	<div data-role="content">
	<div class="ui-grid-a" id="restau_infos">	
		<div class="ui-block-a">
		<h1> Petit Gato</h1>
		<p><strong>  Tecnologia em Sistemas para Internet - TSI 12</strong></p>
		<p> Alunos: </p>
			<ul> 
				<li> Alex de Oliveira</li>
				<li> Bruna Fuchs </li>
				<li> Takao Tomita </li>
				<li> Vinicius Henrique </li>
			</ul>			
		</div>		
		<div class="ui-block-b">
		
		</div>
	</div><!-- /grid-a -->
	<hr/>
	
	<div class="ui-grid-a" id="contact_infos">	
		<div class="ui-block-a">
		<h2><?php echo $lang['CONTATE']; ?></h2>
		<p>Av. Atlantica</p>
		<p>Número 000</p>		
		</div>		
		<div class="ui-block-b">
		<img src="images/map.jpg" alt="plan jeanette"/>
		</div>
	</div><!-- /grid-a -->
	<div id="contact_buttons">	
		<a href="https://maps.google.com.br/maps?q=avenida+atlantica+balne%C3%A1rio&hl=pt-BR&ie=UTF8&ll=-26.990925,-48.629179&spn=0.040688,0.077162&sll=-26.98733,-48.629179&sspn=0.04069,0.077162&hnear=Av.+Atl%C3%A2ntica+-+Balne%C3%A1rio+Cambori%C3%BA+-+Santa+Catarina&t=m&z=14" data-role="button" data-icon="maps"><?php echo $lang['CONTATE_MAPS']; ?></a> 	
		<a href="tel:0388161072"  data-role="button" data-icon="tel"><?php echo $lang['CONTATE_TELL']; ?></a>	
	</div>	
	<hr/>
	
	<div id="notation">	
	<form>
	<label for="select-choice-0" class="select"><h2><?php echo $lang['CONTATE_AVAL']; ?></h2></label>
		<select name="note_utilisateur" id="note_utilisateur" data-native-menu="false" data-theme="c" >
		   <option value="one" class="one"> Ruim </option>
		   <option value="two" class="two">Bom
		   <option value="three" class="three">Muito Bom </option>
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