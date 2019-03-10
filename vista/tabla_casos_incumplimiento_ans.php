<?php
	error_reporting(E_ERROR);
	require_once "scripts.php";
	require_once "../clases/conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();

	/*Consulta Total de Casos Creados al grupo de ITO SALUD (GRUPO DE BASE DE DATOS SALUD)*/
	
	$sql_1_1="SELECT  numincidente , asignatario_inc , estado  FROM Olas WHERE cumplio_ans  = 'NO'";
	$resultados= mysqli_query($conexion,$sql_1_1);

	
	
	
?>


<link rel="stylesheet" href="../estilo/estilo.css" type="text/css" />
<div>
	<table class="table  table-hover table-condensed table-bordered table-responsive" id="iddatatable">
		<thead style="background-color: #0643C8;color: white; font-weight: bold; color:#fff;">
			<tr id="tablas_cuerpo">
			<td Colspan="5">CASOS CON ANS VENCIDOS</td>
				<tr id="tablas_cuerpo">
  				<td id="texto">INCIDENTES</td>
                <td id=numeros>ASIGNATARIO</td>
                <td id=numeros>ESTADO</td>
                <td id=numeros>CUMPLIMIENTO</td>

			</tr>
		</thead>
		<tbody id="tablas_cuerpo">
			
            			<!--Mostramos los Grupos de ITO SALUD-->
            <tr>
                <!--Mostramos la Cantidad de Casos que no Cumplieron con el-->
                
                <?php while($resultado = mysqli_fetch_assoc($resultados)) { ?>
             		<tr>
             	         <td><?= $resultado['numincidente'] ?></td>
		                 <td><?= $resultado['asignatario_inc'] ?></td>
		                 <td><?= $resultado['estado'] ?></td>
		                 <td class="cumple_esca_error">VENCIDO</td>

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