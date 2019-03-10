<?php
error_reporting(E_ERROR);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="image/x-icon" href="../img/ico.png" />
    <link rel="stylesheet" href="../estilo/estilo.css" type="text/css" />
     <link rel="stylesheet" href="../librerias/bootstrap/bootstrap.min.css" type="text/css" />
	<title>CARVAJAL- TABLA</title>
	<?php require_once "scripts.php";  ?>
</head>
<body>
     <div class="container-full">
        <div class="card-header">
          <div class="row">
                  <div class="col-sm-8">
                  	<form action="index.php" id="formCambiar">
                        <button type="submit" form="formCambiar" id="btn_cambiar" name="inicio" class="btn btn-info fa-2x"><i class="fas fa-chevron-circle-left"></i><i> Inicio</i></button>
                  	</form>
             	 </div>
            	<div class="col-sm-4">
            	    <img src="../img/icono.png"></img>
            	</div>
           </div>
        </div>
        	<div class="table-responsive">
        		<div class="table">
        			<div class="card-body">
        				<div class=" text-left">
        					<div class="card-body">
        						<?php
        						$mes =date('n');
        						$año =date('Y');
        						$semana =date('W');
        						echo " | ";        						
        						echo "<strong>MES</strong> : ".$mes;
        						echo " | ";
        						echo "<strong>AÑO</strong> : ".$año;
        						echo " | ";        						
        						echo "<strong>SEMANA</strong> : ".$semana; 
        						echo " | ";
        						?>
        						<div id="tablaDatatable"></div>
        					</div>
        				</div>
        			</div>
        	   </div>
	    	</div> 
	    	 <div class="container">
	    	 	<div class="row">
				      <div class="table-responsive">
			        		<div class="table">
			        			<div class="card-body">
			        				<div class=" text-left">
			        					<div class="card-body">
			        						<a href="tabla_grafica_mesa.php" target="_Back" onClick="window.open(this.href, this.target, 'width=1600,height=500');">
	                							<span class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalEditar" >
	                								<i class="fas fa-chart-bar"></i>  Ver Grafica...
	                							</span>
	                						</a>
			        						<div id="tablacumple_Mesa"></div>
			        					</div>
			        				</div>
			        			</div>
			        	   </div>
			    	   </div>
				    	 <div class="table-responsive">
				        		<div class="table">
				        			<div class="card-body">
				        				<div class=" text-left">
				        					<div class="card-body">
				        						<div id="tablacumple_Inci_Ito"></div>
				        					</div>
				        				</div>
				        			</div>
				        	   </div>
				    	  </div>
				    	   <div class="table-responsive">
				        		<div class="table">
				        			<div class="card-body">
				        				<div class=" text-left">
				        					<div class="card-body">
				        						<div id="tablacumple_inci_alta"></div>
				        					</div>
				        				</div>
				        			</div>
				        	   </div>
				    	   </div>
				    	   <div class="table-responsive">
				        		<div class="table">
				        			<div class="card-body">
				        				<div class=" text-left">
				        					<div class="card-body">
				        						<div id="tablacumple_reque_ito_salud"></div>
				        					</div>
				        				</div>
				        			</div>
				        	   </div>
				    	   </div>
				    	   <div class="table-responsive">
				        		<div class="table">
				        			<div class="card-body">
				        				<div class=" text-left">
				        					<div class="card-body">
				        						<div id="tablacumple_reque_alta"></div>
				        					</div>
				        				</div>
				        			</div>
				        	   </div>
				    	   </div>
				    	   <div class="table-responsive">
				        		<div class="table">
				        			<div class="card-body">
				        				<div class=" text-left">
				        					<div class="card-body">
				        						<a href="tabla_grafica_salud.php" target="_Back" onClick="window.open(this.href, this.target, 'width=1600,height=500');">
		                							<span class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalEditar" onclick="">
		                								<i class="fas fa-chart-bar"></i>  Ver Grafica...
		                							</span>
		                						</a>
				        						<div id="tablaglobal_ito_salud"></div>
				        					</div>
				        				</div>
				        			</div>
				        	   </div>
				    	   </div>
				    	   <div class="table-responsive">
				        		<div class="table">
				        			<div class="card-body">
				        				<div class=" text-left">
				        					<div class="card-body">
				        						<a href="tabla_grafica_disponibilidad.php" target="_Back" onClick="window.open(this.href, this.target, 'width=1600,height=500');">
		                							<span class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalEditar" onclick="">
		                								<i class="fas fa-chart-bar"></i>  Ver Grafica...
		                							</span>
		                						</a>
				        						<div id="tablaglobal_alta_dispo"></div>
				        					</div>
				        				</div>
				        			</div>
				        	   </div>
				    	   </div>			    	   
				    	   <div class="table-responsive">
				        		<div class="table">
				        			<div class="card-body">
				        				<div class=" text-left">
				        					<div class="card-body">
				        						<div id="tablaglobal_ito_salud_alta_dispo"></div>
				        					</div>
				        				</div>
				        			</div>
				        	   </div>
				    	   </div>
				    	   <div class="table-responsive">
				        		<div class="table">
				        			<div class="card-body">
				        				<div class=" text-left">
				        					<div class="card-body">
				        						<div id="tabla_global"></div>
				        					</div>
				        				</div>
				        			</div>
				        	   </div>
				    	   </div>				    	   
				    	   <div class="table-responsive">
				        		<div class="table">
				        			<div class="card-body">
				        				<div class=" text-left">
				        					<div class="card-body">
				        						<div id="tabla_casos_abiertos"></div>
				        					</div>
				        				</div>
				        			</div>
				        	   </div>
				    	   </div>
				    	   <div class="table-responsive">
				        		<div class="table">
				        			<div class="card-body">
				        				<div class=" text-left">
				        					<div class="card-body">
				        						<div id="tabla_incumple_mesa"></div>
				        					</div>
				        				</div>
				        			</div>
				        	   </div>
				    	   </div>
    	 	     </div>
    	    </div> 
     </div>
    <div class="container-full">
    	<div class="footer_2">
	        <div class="card-footer text-muted">
	        	<i><i class="fab fa-grav"></i>Desarrollado Por Jeferson Guzman Lozano [ <a href="http://srjeffcompany.epizy.com" target="_blank">srjeffcompany.epizy.com</a> ]</i> &copy Carvajal Tecnologia y Servicio  
	        </div>    		
    	</div>
    </div>
</body>
</html>

<script type="text/javascript">

	$(document).ready(function(){
		$('#tablaDatatable').load('tabla.php');
	});

	$(document).ready(function(){
		$('#tablacumple_Mesa').load('tabla_cumple_mesa.php');
	});
	
	$(document).ready(function(){
		$('#tablacumple_Inci_Ito').load('tabla_cumple_incidente_ito_salud.php');
	});

	$(document).ready(function(){
		$('#tablacumple_inci_alta').load('tabla_cumple_incidente_alta.php');
	});

	$(document).ready(function(){
		$('#tablacumple_reque_ito_salud').load('tabla_cumple_reque_ito_salud.php');
	});

	$(document).ready(function(){
		$('#tablacumple_reque_alta').load('tabla_cumple_reque_alta.php');
	});

	$(document).ready(function(){
		$('#tablaglobal_ito_salud').load('tabla_global_ito_salud.php');
	});

	$(document).ready(function(){
		$('#tablaglobal_alta_dispo').load('tabla_global_alta_dispo.php');
	});

	$(document).ready(function(){
		$('#tablaglobal_ito_salud_alta_dispo').load('tabla_cumple_ito_salud_alta_disponibilidad.php');
	});
	
	$(document).ready(function(){
		$('#tabla_global').load('tabla_global.php');
	});

	$(document).ready(function(){
		$('#tabla_casos_abiertos').load('tabla_casos_incumplimiento_ans.php');
	});

	$(document).ready(function(){
		$('#tabla_incumple_mesa').load('tabla_no_cumple_mesa.php');
	});


	
</script>



