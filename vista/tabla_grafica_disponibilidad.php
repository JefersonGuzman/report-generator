<?php
	error_reporting(E_ERROR);
	require_once "scripts.php";
	require_once "../clases/conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();


	/*Consulta Total de Casos Creados al grupo de ITO SALUD (GRUPO DE BASE DE DATOS SALUD)*/
	
	$sql_1_1="SELECT mes,porcentaje 
			  FROM `porcen_cumpli_alta` ORDER BY id DESC LIMIT 3";
	$resultados= mysqli_query($conexion,$sql_1_1);
	
?>
<link rel="stylesheet" href="../estilo/estilo.css" type="text/css" />
<div>
<div class="container">
	<dir class="row">
		<div class="col-sm-8">
	    	<div class="panel panel-body">
				<div class="row">
					<div class="col-sm-12">
						<div id="cargaLineal"></div>
					</div>
				</div>
			</div>
	    </div>
		<div class="col-sm-4 table_mesa_cumpl">
			<table class="table  table-hover table-condensed table-bordered table-responsive" id="table_mesa_cumpl">
				<thead style="background-color: #0643C8;color: white; font-weight: bold; color:#fff;">
					<tr id="tablas_cuerpo">
					<td COLSPAN="5">CUMPLIMIENTO ESCALAMIENTO ALTA DISPONIBILIDAD</td>
				</thead>
				<tbody id="tablas_cuerpo">
			      <!--Mostramos la Cantidad de Casos que no Cumplieron con el-->
			        <?php while($resultado = mysqli_fetch_assoc($resultados)) { ?>
			           <tr>
			             <td><?= $resultado['mes'] ?></td>
					      <td><?= $resultado['porcentaje'] ?></td>
			           </tr>
			        <?php } ?>           	
			        <thead style="background-color: #0643C8;color: white; font-weight: bold; color:#fff;">
			            <tr id="tablas_cuerpo">
			                <td COLSPAN="5" id=numeros></td>
				    	</tr>
				    </thead>
				</tbody>
			</table>
	    </div>
	</dir>
</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#cargaLineal').load('../grafica/grafica_cumple_disponibilidad.php');
	});
</script>