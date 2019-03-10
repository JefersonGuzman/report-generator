<?php
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../estilo/estilo.css" type="text/css" />
     <link rel="stylesheet" href="../librerias/bootstrap/bootstrap.min.css" type="text/css" />
     
   
	<title>GRAFICAS</title>
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
    	 <div class="container">
	    	 	<div class="row">
			    	 <div class="table-responsive">
		        		<div class="table">
		        			<div class="card-body">
		        				<div class=" text-left">
		        					<div class="card-body">
		        						<div id="tabla_grafi_mesa"></div>
		        					</div>
			        			 </div>
			        			 <div class=" text-left">
		        					<div class="card-body">
		        						<div id="tabla_grafi_salud"></div>
		        					</div>
			        			 </div>
			        			 <div class=" text-left">
		        					<div class="card-body">
		        						<div id="tabla_grafi_disponibilidad"></div>
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
	        	<i>Programado y Diseñado Por Jeferson Guzman Lozano [ Aprendiz - SENA 2018 - 2019 ]</i> &copy Carvajal Tecnologia y Servicio  
	        </div>    		
    	</div>
    </div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tabla_grafi_mesa').load('tabla_grafica_mesa.php');
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tabla_grafi_salud').load('tabla_grafica_salud.php');
	});
</script>




