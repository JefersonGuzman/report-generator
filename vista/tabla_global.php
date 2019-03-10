<?php
	error_reporting(E_ERROR);
	require_once "scripts.php";
	require_once "../clases/conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();


	/*Consulta Total de Casos Creados al grupo de ITO SALUD (GRUPO DE BASE DE DATOS SALUD)*/
	
	  $sql_1_1="SELECT * FROM `porcen_cumpli_global_grupo`";
	  $resultados= mysqli_query($conexion,$sql_1_1);
	
	
?>


<link rel="stylesheet" href="../estilo/estilo.css" type="text/css" />
<div>
	<table class="table  table-hover table-condensed table-bordered table-responsive" id="iddatatable">
		<thead style="background-color: #0643C8;color: white; font-weight: bold; color:#fff;">
			<tr id="tablas_cuerpo">
				<tr id="tablas_cuerpo">
  				<td id="texto">GRUPO</td>
                <td id=numeros>Semana 1</td>
                <td id=numeros>Semana 2</td>
                <td id=numeros>Semana 3</td>
                <td id=numeros>Semana 4</td>
                <td id=numeros>Semana 5</td>

			</tr>
		</thead>
		<tbody id="tablas_cuerpo">
			
            			<!--Mostramos los Grupos de ITO SALUD-->
            <tr>
                <!--Mostramos la Cantidad de Casos que no Cumplieron con el-->
                <?php while($resultado = mysqli_fetch_assoc($resultados)) { ?>
             		<tr>
             	         <td><?= $resultado['nombre'] ?></td>
		                 <td><?= $resultado['1'] ?></td>
		                 <td><?= $resultado['2'] ?></td>
		                 <td><?= $resultado['3'] ?></td>
		                 <td><?= $resultado['4'] ?></td>
		                 <td><?= $resultado['5'] ?></td>

		            </tr>

                <?php } ?> 

            </tr>
        <thead style="background-color: #0643C8;color: white; font-weight: bold; color:#fff;">
            <tr id="tablas_cuerpo">
                <td COLSPAN="6" id=numeros></td>
	    	</tr>
	    </thead>
		</tbody>
	</table>
</div>