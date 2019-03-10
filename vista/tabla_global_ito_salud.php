<?php
	error_reporting(E_ERROR);
	require_once "scripts.php";
	require_once "../clases/conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();
	$mes =date('n');
    $ano =date('Y');
    $semana =date('W');	
    
	
	switch ($mes) {
	    case 1:
	        $nomb_mes="Enero";
	        break;
	    case 2:
	        $nomb_mes="Febrero";
			break;
		case 3:
			$nomb_mes="Marzo";
			break;
		case 4:
		    $nomb_mes="Abrir";
		    break;
		case 5:
		    $nomb_mes="Mayo";
		    break;
		case 6:
		    $nomb_mes="Junio";
		    break;
		case 7:
		    $nomb_mes="Julio";
		    break;
		case 8:
		    $nomb_mes="Agosto";
		    break;
		case 9:
		    $nomb_mes="Septiembre";
		    break;
		case 10:
		    $nomb_mes="Octubre";
		    break;
		case 11:
		    $nomb_mes="Noviembre";
		    break;
		case 12:
		    $nomb_mes="Diciembre";
		    break;
					        
	}
	

	/*Consulta Total de Casos Creados al grupo de ITO SALUD (GRUPO DE BASE DE DATOS SALUD)*/
	
	$sql_1_1="SELECT COUNT(numero_solicitud_sd) as 'cantidad' 
				FROM Olas WHERE estado = 'Cerrado' 
				AND grupo = 'GRUPO BASE DE DATOS SALUD'";
	$resultados_1_gbds= mysqli_query($conexion,$sql_1_1);
	
	
	/*Consulta Total de Casos Con el Cumplimiento POSITIVO ( SI CUMPLE )*/
	
	$sql_2_1= "SELECT COUNT(numero_solicitud_sd) as 'cantidad_si'
				FROM Olas WHERE estado = 'Cerrado' 
				AND cumplio_ans='SI'
				AND grupo = 'GRUPO BASE DE DATOS SALUD'";
    $resultados_2_gbds = mysqli_query($conexion,$sql_2_1);
    
    /*Consulta Total de Casos Con el Cumplimiento NEGATIVO ( NO CUMPLE )*/
    
	$sql_3_1= "SELECT COUNT(numero_solicitud_sd) as 'cantidad_no'
			   FROM Olas WHERE estado = 'Cerrado'
			   AND cumplio_ans='NO'
			   AND grupo = 'GRUPO BASE DE DATOS SALUD'";
    $resultados_3_gbds = mysqli_query($conexion,$sql_3_1);
    
    /* Consulta  Porcentaje de Cumplimiento con el Grupo (GRUPO PLATAFORMA ITO)*/
    
    $sql_4_1 = "SELECT COUNT('numero_solicitud_sd') AS 'TOTAL' ,
				(SELECT COUNT('numero_solicitud_sd') AS  'si'
				FROM Olas
				WHERE estado =  'Cerrado'
				AND grupo =  'GRUPO BASE DE DATOS SALUD'
				AND estado =  'Cerrado'
				AND cumplio_ans = 'SI'
				AND cumplio_ans =  'SI') FROM Olas
				WHERE estado =  'Cerrado'
				AND grupo =  'GRUPO BASE DE DATOS SALUD'";
		    		
    $resultados_4_gbds = mysqli_query($conexion,$sql_4_1);
    
    /***********************************************************************************************/
     /*********************************GRUPO PLATAFORMA SALUD*****************************************/
      /***********************************************************************************************/
    
	/*Consulta Total de Casos Creados al grupo de ITO SALUD (GRUPO PLATAFORMA SALUD)*/
	
	$sql_1_2="SELECT COUNT(numero_solicitud_sd) as 'cantidad' 
			  FROM Olas WHERE estado = 'Cerrado' 
			  AND grupo = 'GRUPO PLATAFORMA SALUD'";
	$resultados_5_gps= mysqli_query($conexion,$sql_1_2);
	
	
	/*Consulta Total de Casos Con el Cumplimiento POSITIVO ( SI CUMPLE )*/
	
	$sql_2_2= "SELECT COUNT(numero_solicitud_sd) as 'cantidad_si'
			   FROM Olas WHERE estado = 'Cerrado' 
			   AND cumplio_ans='SI'
			   AND grupo = 'GRUPO PLATAFORMA SALUD'";
    $resultados_6_gps = mysqli_query($conexion,$sql_2_2);
    
    /*Consulta Total de Casos Con el Cumplimiento NEGATIVO ( NO CUMPLE )*/
    
	$sql_3_2= "SELECT COUNT(numero_solicitud_sd) as 'cantidad_no'
			   FROM Olas WHERE estado = 'Cerrado'
			   AND cumplio_ans='NO'
			   AND grupo = 'GRUPO PLATAFORMA SALUD'";
    $resultados_7_gps = mysqli_query($conexion,$sql_3_2);
    
    /* Consulta  Porcentaje de Cumplimiento con el Grupo (GRUPO PLATAFORMA SALUD)*/
    
    $sql_4_2 = "SELECT COUNT('numero_solicitud_sd') AS 'TOTAL' ,
				(SELECT COUNT('numero_solicitud_sd') AS  'si'
				FROM Olas
				WHERE estado =  'Cerrado'
				AND grupo =  'GRUPO PLATAFORMA SALUD'
				AND estado =  'Cerrado'
				AND cumplio_ans = 'SI'
				AND cumplio_ans =  'SI') FROM Olas
				WHERE estado =  'Cerrado'
				AND grupo =  'GRUPO PLATAFORMA SALUD'";
		    		
    $resultados_8_gps = mysqli_query($conexion,$sql_4_2);
    
    
        
     /*********************************************************************************************************/ 
  		/* CONSULTA DE TOTAL , PORCENTAJE SUMAS DE LA CANTIDAD DE CASOS ATENDIDOS ( SI )  Y ( NO )*/

    /*********************************************************************************************************/  

		$sql_total="SELECT COUNT(numero_solicitud_sd)  as 'Total_Comple' 
				FROM Olas WHERE estado = 'Cerrado' AND grupo  LIKE '%SALUD'";
		$resultados_total= mysqli_query($conexion,$sql_total);
	
		$sql_no="SELECT COUNT(numero_solicitud_sd)  as 'Total_no' 
				FROM Olas WHERE cumplio_ans = 'No'  AND grupo  LIKE '%SALUD'";
		$resultados_total_no= mysqli_query($conexion,$sql_no);
	
		$sql_si="SELECT COUNT(numero_solicitud_sd)  as 'Total_si' 
				FROM Olas WHERE cumplio_ans = 'Si'  AND grupo  LIKE '%SALUD'";
		$resultados_total_si= mysqli_query($conexion,$sql_si);
	
    
  /*********************************************************************************************************/ 
  /*********************************************************************************************************/ 

?>


<link rel="stylesheet" href="../estilo/estilo.css" type="text/css" />
<div>
	<table class="table  table-hover table-condensed table-bordered table-responsive" id="iddatatable">
		<thead style="background-color: #0643C8;color: white; font-weight: bold; color:#fff;">
			<tr id="tablas_cuerpo">
			<td COLSPAN="5">CUMPLE GLOBAL GRUPO ITO SALUD</td>
				<tr id="tablas_cuerpo">
  				<td id="texto">GRUPO</td>
                <td id=numeros>NO</td>
                <td id=numeros>SI</td>
                <td id=numeros>TOTAL</td>
                <td id=numeros> % CUMPLIMIENTO</td>
			</tr>
		</thead>
		<tbody id="tablas_cuerpo">
			
            			<!--Mostramos los Grupos de ITO SALUD-->
            <tr>
                <td>GRUPO DE BASE DE DATOS SALUD</td>
                <!--Mostramos la Cantidad de Casos que no Cumplieron con el-->
                <?php while($resultados = mysqli_fetch_assoc($resultados_3_gbds)) { ?>
                	<td><?= $resultados['cantidad_no'] ?></td>
                <?php } ?>
	            <?php while($resultados = mysqli_fetch_assoc($resultados_2_gbds)){ ?>
                	<td><?= $resultados['cantidad_si'] ?></td>
                <?php } ?>
	            <?php while($resultados = mysqli_fetch_assoc($resultados_1_gbds)) { ?>
	            	<td><?= $resultados['cantidad'] ?></td>
	            <?php } ?>
	            <!-- OPERACION MATEMATICA PARA EXTRAER EL PORCENTAJE DE CUMPLIMIENTO -->
				<!-- Traemos de la Subconsulta antes creada  los campos  por un array numerico -->
				<?php while($fila=$resultados_4_gbds->fetch_array(MYSQLI_NUM)){
                 /* INICIALIZAMOS LA VARIABLE $cumple donde se guardara el % de cumplimiento */
                 /* REALIZAMOS LA DIVICION DE LOS 2 CAMPOS QUE TRAEMOS DE LA BASE DE DATOS ( LINEA 25 ) QUE SON 
                    LA CANTIDAD DE CASOS CREADOS POR UN GRUPO  Y LOS CERRADOS */
            	 $cumple=$fila[1]/$fila[0];
                /* CREAMOS OTRA VARIABLE  DONDE GUARDAREMOS   LA MULTIPLICACION ENTRE  EL RESULTADO DE LA DIVICION
                    DE LOS CAMPOS CALCULADOS DE LA BASE DE DATOS Y EL 100%  */
                 $porcen=$cumple*100;
                 /* LE AGREGAMOS UN FORMATO A EL RESULTADO  PARA QUE SOLO ME MUESTRE 1 (un) DECIMAL */
                 $porcentaje=number_format($porcen,1, ",", ".");
				 echo"<td>".$porcentaje."%</td></tr>";
	              } ?>
            </tr>
           <tr>
            	
		    <!--***********************************************************************************************
		    ****************************************GRUPO PLATAFORMA SALUD*******************************************
		      ***********************************************************************************************-->         	
            	
            	<td>GRUPO PLATAFORMA SALUD</td>
                <!--Mostramos la Cantidad de Casos que no Cumplieron con el-->
                	
                <?php while($resultados = mysqli_fetch_assoc($resultados_7_gps)) { ?>
                	<td><?= $resultados['cantidad_no'] ?></td>
                <?php } ?>
                
	            <?php while($resultados = mysqli_fetch_assoc($resultados_6_gps)){ ?>
                	<td><?= $resultados['cantidad_si'] ?></td>
                <?php } ?>
	            
	            <?php while($resultados = mysqli_fetch_assoc($resultados_5_gps)) { ?>
	            	<td><?= $resultados['cantidad'] ?></td>
	            <?php } ?>
	            
	            <!--OPERACION MATEMATICA PARA EXTRAER EL PORCENTAJE DE CUMPLIMIENTO -->
	            
				<!--Traemos de la Subconsulta antes creada  los campos  por un array numerico-->
				
				<?php while($fila=$resultados_8_gps->fetch_array(MYSQLI_NUM)){
					
                  /*INICIALIZAMOS LA VARIABLE $cumple donde se guardara el % de cumplimiento*/
                  $cumple=0;
                  /*
                    REALIZAMOS LA DIVICION DE LOS 2 CAMPOS QUE TRAEMOS DE LA BASE DE DATOS ( LINEA 25 ) QUE SON 
                    LA CANTIDAD DE CASOS CREADOS POR UN GRUPO  Y LOS CERRADOS
                  */
            	 $cumple=$fila[1]/$fila[0];
                 /*
                    CREAMOS OTRA VARIABLE  DONDE GUARDAREMOS   LA MULTIPLICACION ENTRE  EL RESULTADO DE LA DIVICION
                    DE LOS CAMPOS CALCULADOS DE LA BASE DE DATOS Y EL 100%
                 */
                 $porcen=$cumple*100;
                 /*
                    LE AGREGAMOS UN FORMATO A EL RESULTADO  PARA QUE SOLO ME MUESTRE 1 (un) DECIMAL
                 */
                 $porcentaje=number_format($porcen,1, ",", ".");
				 echo"<td>".$porcentaje."%</td></tr>";
	              } ?>
	               <thead style="background-color: #0643C8;color: white; font-weight: bold; color:#fff;">
           			 <tr id="tablas_cuerpo">
                		<td COLSPAN="1" id=numeros>TOTAL</td>
                		
                		 <?php while($resultados = mysqli_fetch_assoc($resultados_total_no)) { ?>
		            		<td><?=	$cantidad_no =  $resultados['Total_no'] ?></td>
		            	<?php } ?>
		            	
		            	<?php while($resultados = mysqli_fetch_assoc($resultados_total_si)) { ?>
		            		<td><?= $cantidad_si = $resultados['Total_si'] ?></td>
		            	<?php } ?>
		            	
		             	<?php while($resultados = mysqli_fetch_assoc($resultados_total)) { ?>
		            		<td><?= $total = $resultados['Total_Comple'] ?></td>
		            	<?php } ?>
		            	
		            	<?php 
		            	                
		               	 	$porcentaje = ($cantidad_si/$total)*100;
							$porcentaje=number_format($porcentaje,1, ",", ".").'%';
							echo"<td>".$porcentaje."</td></tr>";
						?>
						</tr>
						<?php
						
						  if($porcentaje != " "){
						      $sql ="INSERT INTO `porcen_cumpli_mesa`(`mes`, `porcentaje`,fecha) VALUES ('$nomb_mes','$porcentaje','$ano')";
							  $result = $conexion->query($sql);
							
						   }
	
						  if($semana == 1){
						      $sql_1 ="UPDATE `porcen_cumpli_global_grupo` SET `1`='$porcentaje' WHERE nombre = 'ITO SALUD'";
							  $result_1 = $conexion->query($sql_1);
							
						   }
						   
						  if($semana == 2){
						      $sql_2 ="UPDATE `porcen_cumpli_global_grupo` SET `2`='$porcentaje' WHERE nombre = 'ITO SALUD'";
							  $result_2 = $conexion->query($sql_2);
							
						  }
	
						  if($semana == 3){
						      $sql_3 ="UPDATE `porcen_cumpli_global_grupo` SET `3`='$porcentaje' WHERE nombre = 'ITO SALUD'";
							  $result_3 = $conexion->query($sql_3);
							
						  }
						  
						  if($semana == 4){
						      $sql_4 ="UPDATE `porcen_cumpli_global_grupo` SET `4`='$porcentaje' WHERE nombre = 'ITO SALUD'";
							  $result_4 = $conexion->query($sql_4);
							
						   }
	
						  if($semana == 5){
						      $sql_5 ="UPDATE `porcen_cumpli_global_grupo` SET `5`='$porcentaje' WHERE nombre = 'ITO SALUD'";
							  $result_5 = $conexion->query($sql_5);
							
						   }
					   
		            	?>

            		 </tr>
	    		</thead>
            </tr>
		</tbody>
	</table>
</div>