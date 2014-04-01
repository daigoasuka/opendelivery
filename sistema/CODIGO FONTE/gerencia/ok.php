 <html> 
	<head>
		<meta charset="UTF-8">	
		<title><?php echo $lang['PAGE_TITLE']; ?></title> 
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
		<style>
			.pricing-table .plan {
			  border-radius: 5px;
			  text-align: center;
			  background-color: #f3f3f3;
			  -moz-box-shadow: 0 0 6px 2px #b0b2ab;
			  -webkit-box-shadow: 0 0 6px 2px #b0b2ab;
			  box-shadow: 0 0 6px 2px #b0b2ab;
			}
			 
			 .plan:hover {
			  background-color: #fff;
			  -moz-box-shadow: 0 0 12px 3px #b0b2ab;
			  -webkit-box-shadow: 0 0 12px 3px #b0b2ab;
			  box-shadow: 0 0 12px 3px #b0b2ab;
			}
			 
			 .plan {
			  padding: 20px;
			  color: #ff;
			  background-color: #5e5f59;
			  -moz-border-radius: 5px 5px 0 0;
			  -webkit-border-radius: 5px 5px 0 0;
			  border-radius: 5px 5px 0 0;
			}
			  

			.pricing-table .plan .plan-name span {
			  font-size: 20px;
			}
			 
			.pricing-table .plan ul {
			  list-style: none;
			  margin: 0;
			  -moz-border-radius: 0 0 5px 5px;
			  -webkit-border-radius: 0 0 5px 5px;
			  border-radius: 0 0 5px 5px;
			}
			 
			.pricing-table .plan ul li.plan-feature {
			  padding: 15px 10px;
			  border-top: 1px solid #c5c8c0;
			}
			 
			.pricing-three-column {
			  margin: 0 auto;
			  width: 80%;
			}
			 
			.pricing-variable-height .plan {
			  float: none;
			  margin-left: 2%;
			  vertical-align: bottom;
			  display: inline-block;
			  zoom:1;
			  *display:inline;
			}
			 
			.plan-mouseover .plan-name {
			  background-color: #4e9a06 !important;
			}
			 
			.btn-plan-select {
			  padding: 8px 25px;
			  font-size: 18px;
			}
	</style>
	</head>
<body>	<br><br><br><br><br>
 <div class='row-fluid pricing-table pricing-three-column'>
        <div class='span4 plan'>
          <div>
            <h2><img src='../images/logo.png' border='0'></h2>
            <span>Concluído!</span>
          </div>
          <ul>       
            <li class='plan-feature'><a href='../index.php' class='btn btn-primary btn-plan-select'><i class='icon-white icon-ok'></i> Inicio</a></li>
          </ul>
        </div>
        
       
      </div>
	  
	  </body>
	  </html>