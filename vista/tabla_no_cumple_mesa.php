<?php
	error_reporting(E_ERROR);
	require_once "scripts.php";
	require_once "../clases/conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();


	/*Consulta Total de Casos Creados al grupo de ITO SALUD (GRUPO DE BASE DE DATOS SALUD)*/
	
	$sql_1_1="SELECT  numero_solicitud_sd ,servicio,empresa,cumple_escalamiento  FROM Olas WHERE cumple_escalamiento  LIKE 'NO%'";
	$resultados= mysqli_query($conexion,$sql_1_1);
	
	
	
?>


<link rel="stylesheet" href="../estilo/estilo.css" type="text/css" />
<div>
	<table class="table  table-hover table-condensed table-bordered table-responsive" id="iddatatable">
		<thead style="background-color: #0643C8;color: white; font-weight: bold; color:#fff;">
			<tr id="tablas_cuerpo">
			<td COLSPAN="5">CASOS CON ESCALAMIENTO VENCIDOS</td>
				<tr id="tablas_cuerpo">
  				<td id="texto">INCIDENTES</td>
                <td id=numeros>SERVICIO</td>
                <td id=numeros>EMPRESA</td>
                <td id=numeros>CUMPLIMIENTO</td>

			</tr>
		</thead>
		<tbody id="tablas_cuerpo">
			
            			<!--Mostramos los Grupos de ITO SALUD-->
            <tr>
                <!--Mostramos la Cantidad de Casos que no Cumplieron con el-->
                <?php while($resultado = mysqli_fetch_assoc($resultados)) { ?>
             		<tr>
             	         <td><?= $resultado['numero_solicitud_sd'] ?></td>
		                 <td><?= $resultado['servicio'] ?></td>
		                 <td><?= $resultado['empresa'] ?></td>
		                 <td class="cumple_esca_error"><?= $resultado['cumple_escalamiento'] ?></td>
             		</tr>

                <?php } ?>
            </tr>
        <thead style="background-color: #0643C8;color: white; font-weight: bold; color:#fff;">
            <tr id="tablas_cuerpo">
                <td COLSPAN="5" id=numeros></td>

	    	</tr>
	    </thead>
		</tbody>
	</table>
</div>