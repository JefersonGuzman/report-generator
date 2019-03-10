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
	


    /***********************************************************************************************/
     /*********************************GRUPO PLATAFORMA ITO****************************************/
      /***********************************************************************************************/

	
	$sql_1_1="SELECT COUNT(numero_solicitud_sd) as 'cantidad' 
				FROM Olas WHERE estado = 'Cerrado' 
				AND grupo NOT LIKE '%SALUD'
				AND grupo = 'GRUPO PLATAFORMA ITO'";
	$resultados_1_gbds= mysqli_query($conexion,$sql_1_1);
	
	
	/*Consulta Total de Casos Con el Cumplimiento POSITIVO ( SI CUMPLE )*/
	
	$sql_2_1= "SELECT COUNT(numero_solicitud_sd) as 'cantidad_si'
				FROM Olas WHERE estado = 'Cerrado' 
				AND grupo NOT LIKE '%SALUD'
				AND cumplio_ans='SI'
				AND grupo = 'GRUPO PLATAFORMA ITO'";
    $resultados_2_gbds = mysqli_query($conexion,$sql_2_1);
    
    /*Consulta Total de Casos Con el Cumplimiento NEGATIVO ( NO CUMPLE )*/
    
	$sql_3_1= "SELECT COUNT(numero_solicitud_sd) as 'cantidad_no'
			   FROM Olas WHERE estado = 'Cerrado'
			   AND grupo NOT LIKE '%SALUD' 
			   AND cumplio_ans='NO'
			   AND grupo = 'GRUPO PLATAFORMA ITO'";
    $resultados_3_gbds = mysqli_query($conexion,$sql_3_1);
    
    /* Consulta  Porcentaje de Cumplimiento con el Grupo (GRUPO PLATAFORMA ITO)*/
    
    $sql_4_1 = "SELECT COUNT('numero_solicitud_sd') AS 'TOTAL' ,
				(SELECT COUNT('numero_solicitud_sd') AS  'si'
				FROM Olas
				WHERE estado =  'Cerrado'
				AND grupo =  'GRUPO PLATAFORMA ITO'
				AND estado =  'Cerrado'
				AND cumplio_ans = 'SI'
				AND cumplio_ans =  'SI') FROM Olas
				WHERE estado =  'Cerrado'
				AND grupo =  'GRUPO PLATAFORMA ITO'
				  ";
		    		
    $resultados_4_gbds = mysqli_query($conexion,$sql_4_1);
    
    /***********************************************************************************************/
     /*********************************GRUPO GESTION HERRAMIENTAS ITO*****************************************/
      /***********************************************************************************************/
    
	/*Consulta Total de Casos Creados al grupo de ITO SALUD (GRUPO GESTION HERRAMIENTAS ITO)*/
	
	$sql_1_2="SELECT COUNT(numero_solicitud_sd) as 'cantidad' 
			  FROM Olas WHERE estado = 'Cerrado' 
			  AND grupo NOT LIKE '%SALUD'
			  AND grupo = 'GRUPO GESTION HERRAMIENTAS ITO'";
	$resultados_5_ghi= mysqli_query($conexion,$sql_1_2);
	
	
	/*Consulta Total de Casos Con el Cumplimiento POSITIVO ( SI CUMPLE )*/
	
	$sql_2_2= "SELECT COUNT(numero_solicitud_sd) as 'cantidad_si'
			   FROM Olas WHERE estado = 'Cerrado' 
			   AND grupo NOT LIKE '%SALUD'
			   AND cumplio_ans='SI'
			   AND grupo = 'GRUPO GESTION HERRAMIENTAS ITO'";
    $resultados_6_ghi = mysqli_query($conexion,$sql_2_2);
    
    /*Consulta Total de Casos Con el Cumplimiento NEGATIVO ( NO CUMPLE )*/
    
	$sql_3_2= "SELECT COUNT(numero_solicitud_sd) as 'cantidad_no'
			   FROM Olas WHERE estado = 'Cerrado'
			   AND grupo NOT LIKE '%SALUD' 
			   AND cumplio_ans='NO'
			   AND grupo = 'GRUPO GESTION HERRAMIENTAS ITO'";
    $resultados_7_ghi = mysqli_query($conexion,$sql_3_2);
    
    /* Consulta  Porcentaje de Cumplimiento con el Grupo (GRUPO GESTION HERRAMIENTAS ITO)*/
    
    $sql_4_2 = "SELECT COUNT('numero_solicitud_sd') AS 'TOTAL' ,
				(SELECT COUNT('numero_solicitud_sd') AS 'SI'
				FROM Olas
				WHERE estado =  'Cerrado'
				AND grupo =  'GRUPO GESTION HERRAMIENTAS ITO'
				AND estado =  'Cerrado'
				AND cumplio_ans = 'SI'
				AND cumplio_ans =  'SI') FROM Olas
				WHERE estado =  'Cerrado'
				AND grupo =  'GRUPO GESTION HERRAMIENTAS ITO'
				  ";
		    		
    $resultados_8_ghi = mysqli_query($conexion,$sql_4_2);
    
    
    /***********************************************************************************************/
     /*********************************GRUPO SOPORTE SEGURIDAD*****************************************/
      /***********************************************************************************************/
    
	/*Consulta Total de Casos Creados al grupo de ITO SALUD (GRUPO SOPORTE SEGURIDAD)*/
	
	$sql_1_3="SELECT COUNT(numero_solicitud_sd) as 'cantidad' 
			  FROM Olas WHERE estado = 'Cerrado' 
			   AND grupo = 'GRUPO SOPORTE SEGURIDAD'";
	$resultados_9_gss= mysqli_query($conexion,$sql_1_3);
	
	
	/*Consulta Total de Casos Con el Cumplimiento POSITIVO ( SI CUMPLE )*/
	
	$sql_2_3= "SELECT COUNT(numero_solicitud_sd) as 'cantidad_si'
			   FROM Olas WHERE estado = 'Cerrado' 
			   AND grupo NOT LIKE '%SALUD'
			   AND cumplio_ans='SI'
			   AND grupo = 'GRUPO SOPORTE SEGURIDAD'";
    $resultados_10_gss = mysqli_query($conexion,$sql_2_3);
    
    /*Consulta Total de Casos Con el Cumplimiento NEGATIVO ( NO CUMPLE )*/
    
	$sql_3_3= "SELECT COUNT(numero_solicitud_sd) as 'cantidad_no'
			   FROM Olas WHERE estado = 'Cerrado'
			   AND grupo NOT LIKE '%SALUD' 
			   AND cumplio_ans='NO'
			   AND grupo = 'GRUPO SOPORTE SEGURIDAD'";
    $resultados_11_gss = mysqli_query($conexion,$sql_3_3);
    
    /* Consulta  Porcentaje de Cumplimiento con el Grupo (GRUPO SOPORTE SEGURIDAD)*/
    
    $sql_4_3 = "SELECT COUNT('numero_solicitud_sd') AS 'TOTAL' ,
				(SELECT COUNT('numero_solicitud_sd') AS 'SI'
				FROM Olas
				WHERE estado =  'Cerrado'
				AND grupo =  'GRUPO SOPORTE SEGURIDAD'
				AND estado =  'Cerrado'
				AND cumplio_ans = 'SI'
				AND cumplio_ans =  'SI') FROM Olas
				WHERE estado =  'Cerrado'
				AND grupo =  'GRUPO SOPORTE SEGURIDAD'
				  ";
		    		
    $resultados_12_gss = mysqli_query($conexion,$sql_4_3);
    
    
    /***********************************************************************************************/
     /*********************************GRUPO SOPORTE REDES*****************************************/
      /***********************************************************************************************/
    
	/*Consulta Total de Casos Creados al grupo de ITO SALUD (GRUPO SOPORTE REDES)*/
	
	$sql_1_4="SELECT COUNT(numero_solicitud_sd) as 'cantidad' 
			  FROM Olas WHERE estado = 'Cerrado' 
			  AND grupo NOT LIKE '%SALUD'
			  AND grupo = 'GRUPO SOPORTE REDES'";
	$resultados_13_gsr= mysqli_query($conexion,$sql_1_4);
	
	
	/*Consulta Total de Casos Con el Cumplimiento POSITIVO ( SI CUMPLE )*/
	
	$sql_2_4= "SELECT COUNT(numero_solicitud_sd) as 'cantidad_si'
			   FROM Olas WHERE estado = 'Cerrado' 
			   AND grupo NOT LIKE '%SALUD'
			   AND cumplio_ans='SI'
			   AND grupo = 'GRUPO SOPORTE REDES'";
    $resultados_14_gsr = mysqli_query($conexion,$sql_2_4);
    
    /*Consulta Total de Casos Con el Cumplimiento NEGATIVO ( NO CUMPLE )*/
    
	$sql_3_4= "SELECT COUNT(numero_solicitud_sd) as 'cantidad_no'
			   FROM Olas WHERE estado = 'Cerrado'
			   AND grupo NOT LIKE '%SALUD' 
			   AND cumplio_ans='NO'
			   AND grupo = 'GRUPO SOPORTE REDES'";
    $resultados_15_gsr = mysqli_query($conexion,$sql_3_4);
    
    /* Consulta  Porcentaje de Cumplimiento con el Grupo (GRUPO SOPORTE REDES)*/
    
    $sql_4_4 = "SELECT COUNT('numero_solicitud_sd') AS 'TOTAL' ,
				(SELECT COUNT('numero_solicitud_sd') AS 'SI'
				FROM Olas
				WHERE estado =  'Cerrado'
				AND grupo =  'GRUPO SOPORTE REDES'
				AND estado =  'Cerrado'
				AND cumplio_ans = 'SI'
				AND cumplio_ans =  'SI') FROM Olas
				WHERE estado =  'Cerrado'
				AND grupo =  'GRUPO SOPORTE REDES'
				  ";
		    		
    $resultados_16_gsr = mysqli_query($conexion,$sql_4_4);
    
    
    /***********************************************************************************************/
     /*********************************GRUPO APLICACIONES*****************************************/
      /***********************************************************************************************/
    
	/*Consulta Total de Casos Creados al grupo de ITO SALUD (GRUPO APLICACIONES)*/
	
	$sql_1_5="SELECT COUNT(numero_solicitud_sd) as 'cantidad' 
			  FROM Olas WHERE estado = 'Cerrado' 
			  AND grupo NOT LIKE '%SALUD'
			  AND grupo = 'GRUPO APLICACIONES'";
	$resultados_17_ga= mysqli_query($conexion,$sql_1_5);
	
	
	/*Consulta Total de Casos Con el Cumplimiento POSITIVO ( SI CUMPLE )*/
	
	$sql_2_5= "SELECT COUNT(numero_solicitud_sd) as 'cantidad_si'
			   FROM Olas WHERE estado = 'Cerrado' 
			   AND grupo NOT LIKE '%SALUD'
			   AND cumplio_ans='SI'
			   AND grupo = 'GRUPO APLICACIONES'";
    $resultados_18_ga = mysqli_query($conexion,$sql_2_5);
    
    /*Consulta Total de Casos Con el Cumplimiento NEGATIVO ( NO CUMPLE )*/
    
	$sql_3_5= "SELECT COUNT(numero_solicitud_sd) as 'cantidad_no'
			   FROM Olas WHERE estado = 'Cerrado'
			   AND grupo NOT LIKE '%SALUD' 
			   AND cumplio_ans='NO'
			   AND grupo = 'GRUPO APLICACIONES'";
    $resultados_19_ga = mysqli_query($conexion,$sql_3_5);
    
    /* Consulta  Porcentaje de Cumplimiento con el Grupo (GRUPO APLICACIONES)*/
    
    $sql_4_5 = "SELECT COUNT('numero_solicitud_sd') AS 'TOTAL' ,
				(SELECT COUNT('numero_solicitud_sd') AS 'SI'
				FROM Olas
				WHERE estado =  'Cerrado'
				AND grupo =  'GRUPO APLICACIONES'
				AND estado =  'Cerrado'
				AND cumplio_ans = 'SI'
				AND cumplio_ans =  'SI') FROM Olas
				WHERE estado =  'Cerrado'
				AND grupo =  'GRUPO APLICACIONES'
				  ";
		    		
    $resultados_20_ga = mysqli_query($conexion,$sql_4_5);
    
    /*********************************************************************************************************/ 
  		/* CONSULTA DE TOTAL , PORCENTAJE SUMAS DE LA CANTIDAD DE CASOS ATENDIDOS ( SI )  Y ( NO )*/

    /*********************************************************************************************************/  

		$sql_total="SELECT COUNT(numero_solicitud_sd)  as 'Total_Comple' 
				FROM Olas WHERE estado = 'Cerrado' AND grupo NOT LIKE '%SALUD'";
		$resultados_total= mysqli_query($conexion,$sql_total);
	
		$sql_no="SELECT COUNT(numero_solicitud_sd)  as 'Total_no' 
				FROM Olas WHERE cumplio_ans = 'No'  AND grupo NOT LIKE '%SALUD'";
		$resultados_total_no= mysqli_query($conexion,$sql_no);
	
		$sql_si="SELECT COUNT(numero_solicitud_sd)  as 'Total_si' 
				FROM Olas WHERE cumplio_ans = 'Si'  AND grupo  NOT  LIKE '%SALUD'";
		$resultados_total_si= mysqli_query($conexion,$sql_si);
	
    
  /*********************************************************************************************************/ 
  /*********************************************************************************************************/ 

?>


<link rel="stylesheet" href="../estilo/estilo.css" type="text/css" />
<div>
	<table class="table  table-hover table-condensed table-bordered table-responsive" id="iddatatable">
		<thead style="background-color: #0643C8;color: white; font-weight: bold; color:#fff;">
			<tr id="tablas_cuerpo">
			<td COLSPAN="5">CUMPLE GLOBAL GRUPO ALTA DISPONIBILIDAD</td>
				<tr id="tablas_cuerpo">
  				<td id="texto">GRUPO</td>
                <td id=numeros>NO</td>
                <td id=numeros>SI</td>
                <td id=numeros>TOTAL</td>
                <td id=numeros> % CUMPLIMIENTO</td>
			</tr>
		</thead>
		<tbody id="tablas_cuerpo">
			
    <!--***********************************************************************************************/
     /*********************************GRUPO PLATAFORMA ITO****************************************/
      /***********************************************************************************************-->
            <tr>
                <td>GRUPO PLATAFORMA ITO</td>
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
		    ****************************************GRUPO GESTION HERRAMIENTAS ITO*******************************************
		      ***********************************************************************************************-->         	
            	
            	<td>GRUPO GESTION HERRAMIENTAS ITO</td>
                <!--Mostramos la Cantidad de Casos que no Cumplieron con el-->
                	
                <?php while($resultados = mysqli_fetch_assoc($resultados_7_ghi)) { ?>
                	<td><?= $resultados['cantidad_no'] ?></td>
                <?php } ?>
                
	            <?php while($resultados = mysqli_fetch_assoc($resultados_6_ghi)){ ?>
                	<td><?= $resultados['cantidad_si'] ?></td>
                <?php } ?>
	            
	            <?php while($resultados = mysqli_fetch_assoc($resultados_5_ghi)) { ?>
	            	<td><?= $resultados['cantidad'] ?></td>
	            <?php } ?>
	            
	            <!--OPERACION MATEMATICA PARA EXTRAER EL PORCENTAJE DE CUMPLIMIENTO -->
	            
				<!--Traemos de la Subconsulta antes creada  los campos  por un array numerico-->
				
				<?php while($fila=$resultados_8_ghi->fetch_array(MYSQLI_NUM)){
					
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
            </tr>
       <!--***********************************************************************************************/
     /*********************************GRUPO SOPORTE SEGURIDAD****************************************/
      /***********************************************************************************************-->
            <tr>
                <td>GRUPO SOPORTE SEGURIDAD</td>
                <!--Mostramos la Cantidad de Casos que no Cumplieron con el-->
                <?php while($resultados = mysqli_fetch_assoc($resultados_11_gss)) { ?>
                	<td><?= $resultados['cantidad_no'] ?></td>
                <?php } ?>
	            <?php while($resultados = mysqli_fetch_assoc($resultados_10_gss)){ ?>
                	<td><?= $resultados['cantidad_si'] ?></td>
                <?php } ?>
	            <?php while($resultados = mysqli_fetch_assoc($resultados_9_gss)) { ?>
	            	<td><?= $resultados['cantidad'] ?></td>
	            <?php } ?>
	            <!-- OPERACION MATEMATICA PARA EXTRAER EL PORCENTAJE DE CUMPLIMIENTO -->
				<!-- Traemos de la Subconsulta antes creada  los campos  por un array numerico -->
				<?php while($fila=$resultados_12_gss->fetch_array(MYSQLI_NUM)){
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
       
       <!--***********************************************************************************************/
     /*********************************GRUPO SOPORTE REDES****************************************/
      /***********************************************************************************************-->
            <tr>
                <td>GRUPO SOPORTE REDES</td>
                <!--Mostramos la Cantidad de Casos que no Cumplieron con el-->
                <?php while($resultados = mysqli_fetch_assoc($resultados_15_gsr)) { ?>
                	<td><?= $resultados['cantidad_no'] ?></td>
                <?php } ?>
	            <?php while($resultados = mysqli_fetch_assoc($resultados_14_gsr)){ ?>
                	<td><?= $resultados['cantidad_si'] ?></td>
                <?php } ?>
	            <?php while($resultados = mysqli_fetch_assoc($resultados_13_gsr)) { ?>
	            	<td><?= $resultados['cantidad'] ?></td>
	            <?php } ?>
	            <!-- OPERACION MATEMATICA PARA EXTRAER EL PORCENTAJE DE CUMPLIMIENTO -->
				<!-- Traemos de la Subconsulta antes creada  los campos  por un array numerico -->
				<?php while($fila=$resultados_16_gsr->fetch_array(MYSQLI_NUM)){
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

       <!--***********************************************************************************************/
     /***************************************GRUPO APLICACIONES******************************************/
      /***********************************************************************************************-->
            <tr>
                <td>GRUPO APLICACIONES</td>
                <!--Mostramos la Cantidad de Casos que no Cumplieron con el-->
                <?php while($resultados = mysqli_fetch_assoc($resultados_19_ga)) { ?>
                	<td><?= $resultados['cantidad_no'] ?></td>
                <?php } ?>
	            <?php while($resultados = mysqli_fetch_assoc($resultados_18_ga)){ ?>
                	<td><?= $resultados['cantidad_si'] ?></td>
                <?php } ?>
	            <?php while($resultados = mysqli_fetch_assoc($resultados_17_ga)) { ?>
	            	<td><?= $resultados['cantidad'] ?></td>
	            <?php } ?>
	            <!-- OPERACION MATEMATICA PARA EXTRAER EL PORCENTAJE DE CUMPLIMIENTO -->
				<!-- Traemos de la Subconsulta antes creada  los campos  por un array numerico -->
				<?php while($fila=$resultados_20_ga->fetch_array(MYSQLI_NUM)){
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
						      $sql ="INSERT INTO `porcen_cumpli_alta`(`mes`, `porcentaje`,fecha) VALUES ('$nomb_mes','$porcentaje','$ano')";
							  $result = $conexion->query($sql);
							
						   }

						  if($porcentaje != " "){
						      $sql ="INSERT INTO `porcen_cumpli_mesa`(`mes`, `porcentaje`,fecha) VALUES ('$nomb_mes','$porcentaje','$ano')";
							  $result = $conexion->query($sql);
							
						   }
	
						  if($semana == 1){
						      $sql_1 ="UPDATE `porcen_cumpli_global_grupo` SET `1`='$porcentaje' WHERE nombre = 'ALTA DISPONIBILIDAD'";
							  $result_1 = $conexion->query($sql_1);
							
						   }
						   
						  if($semana == 2){
						      $sql_2 ="UPDATE `porcen_cumpli_global_grupo` SET `2`='$porcentaje' WHERE nombre = 'ALTA DISPONIBILIDAD'";
							  $result_2 = $conexion->query($sql_2);
							
						  }
	
						  if($semana == 3){
						      $sql_3 ="UPDATE `porcen_cumpli_global_grupo` SET `3`='$porcentaje' WHERE nombre = 'ALTA DISPONIBILIDAD'";
							  $result_3 = $conexion->query($sql_3);
							
						  }
						  
						  if($semana == 4){
						      $sql_4 ="UPDATE `porcen_cumpli_global_grupo` SET `4`='$porcentaje' WHERE nombre = 'ALTA DISPONIBILIDAD'";
							  $result_4 = $conexion->query($sql_4);
							
						   }
	
						  if($semana == 5){
						      $sql_5 ="UPDATE `porcen_cumpli_global_grupo` SET `5`='$porcentaje' WHERE nombre = 'ALTA DISPONIBILIDAD'";
							  $result_5 = $conexion->query($sql_5);
							
						   }
					   

		            	?>
            		 </tr>
	    		</thead>
            </tr>     
		</tbody>
	</table>
</div>


