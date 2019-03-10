<?php
	error_reporting(E_ERROR);
	require_once "scripts.php";
	require_once "../clases/conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();


	/*Consulta Total de Casos Creados al grupo de ITO SALUD (GRUPO PLATAFORMA ITO)*/
	
	$sql_1_1="SELECT COUNT(numero_solicitud_sd) as 'cantidad' 
				FROM Olas WHERE estado = 'Cerrado' 
				AND servicio LIKE 'SOPORTE%' 
				AND grupo = 'GRUPO PLATAFORMA ITO'";
	$resultados_1_GPI= mysqli_query($conexion,$sql_1_1);
	
	
	/*Consulta Total de Casos Con el Cumplimiento POSITIVO ( SI CUMPLE )*/
	
	$sql_1_2= "SELECT COUNT(numero_solicitud_sd) as 'cantidad_si'
				FROM Olas WHERE estado = 'Cerrado' 
				AND cumplio_ans='SI'
				AND servicio LIKE 'SOPORTE%' 
				AND grupo = 'GRUPO PLATAFORMA ITO'";
    $resultados_2_GPI = mysqli_query($conexion,$sql_1_2);
    
    /*Consulta Total de Casos Con el Cumplimiento NEGATIVO ( NO CUMPLE )*/
    
	$sql_1_3= "SELECT COUNT(numero_solicitud_sd) as 'cantidad_no'
				FROM Olas WHERE estado = 'Cerrado'
				AND cumplio_ans='NO'
				AND servicio LIKE 'SOPORTE%'
				AND grupo = 'GRUPO PLATAFORMA ITO'";
    $resultados_3_GPI = mysqli_query($conexion,$sql_1_3);
    
    /* Consulta  Porcentaje de Cumplimiento con el Grupo (GRUPO PLATAFORMA ITO)*/
    
    $sql_1_4 = "SELECT COUNT('numero_solicitud_sd') AS 'TOTAL' ,
				(SELECT COUNT('numero_solicitud_sd')
				FROM Olas
				WHERE estado =  'Cerrado'
				AND grupo =  'GRUPO PLATAFORMA ITO'
				AND estado =  'Cerrado'
				AND servicio LIKE 'SOPORTE%'
				AND cumplio_ans =  'SI') AS 'SI' FROM Olas
				WHERE estado =  'Cerrado'
				AND grupo =  'GRUPO PLATAFORMA ITO'
				AND servicio LIKE 'SOPORTE%'";
		    		
    $resultados_4_GPI = mysqli_query($conexion,$sql_1_4);
    
    /***********************************************************************************************/
     /*********************************GRUPO GESTION HERRAMIENTAS ITO***************************************/
      /***********************************************************************************************/
    
	/*Consulta Total de Casos Creados al grupo de ITO SALUD (GRUPO GESTION HERRAMIENTAS ITO
)*/
	
	$sql_2_1="SELECT COUNT(numero_solicitud_sd) as 'cantidad' 
				FROM Olas WHERE estado = 'Cerrado' 
			AND servicio LIKE 'SOPORTE%' 
			AND grupo = 'GRUPO GESTION HERRAMIENTAS ITO'";
	$resultados_1_GHI= mysqli_query($conexion,$sql_2_1);
	
	
	/*Consulta Total de Casos Con el Cumplimiento POSITIVO ( SI CUMPLE )*/
	
	$sql_2_2= "SELECT COUNT(numero_solicitud_sd) as 'cantidad_si'
				FROM Olas WHERE estado = 'Cerrado' 
			AND cumplio_ans='SI'
			AND servicio LIKE 'SOPORTE%' 
			AND grupo = 'GRUPO GESTION HERRAMIENTAS ITO'";
    $resultados_2_GHI = mysqli_query($conexion,$sql_2_2);
    
    /*Consulta Total de Casos Con el Cumplimiento NEGATIVO ( NO CUMPLE )*/
    
	$sql_2_3= "SELECT COUNT(numero_solicitud_sd) as 'cantidad_no'
				FROM Olas WHERE estado = 'Cerrado'
			 AND cumplio_ans='NO'
			 AND servicio LIKE 'SOPORTE%'
			 AND grupo = 'GRUPO GESTION HERRAMIENTAS ITO'";
    $resultados_3_GHI = mysqli_query($conexion,$sql_2_3);
    
    /* Consulta  Porcentaje de Cumplimiento con el Grupo (GRUPO GESTION HERRAMIENTAS ITO)*/
    
    $sql_2_4 =" SELECT COUNT('numero_solicitud_sd') AS 'TOTAL' ,
				(SELECT COUNT('numero_solicitud_sd') AS  'si'
				FROM Olas
				WHERE estado =  'Cerrado'
				AND grupo =  'GRUPO GESTION HERRAMIENTAS ITO'
				AND estado =  'Cerrado'
				AND servicio LIKE 'SOPORTE%'
				AND cumplio_ans =  'SI') FROM Olas
				WHERE estado =  'Cerrado'
				AND grupo =  'GRUPO GESTION HERRAMIENTAS ITO'
				AND estado =  'Cerrado' 
				AND servicio LIKE 'SOPORTE%'";
		    		
    $resultados_4_GHI = mysqli_query($conexion,$sql_2_4);
    
       
     /***********************************************************************************************/
     /********************************GRUPO SOPORTE SEGURIDAD**************************************/
      /***********************************************************************************************/
    
	/*Consulta Total de Casos Creados al grupo de ITO SALUD (GRUPO GESTION HERRAMIENTAS ITO
)*/
	
	$sql_3_1="SELECT COUNT(numero_solicitud_sd) as 'cantidad' 
				FROM Olas WHERE estado = 'Cerrado' 
			AND servicio LIKE 'SOPORTE%' 
			AND grupo = 'GRUPO SOPORTE SEGURIDAD'";
	$resultados_5_GSS= mysqli_query($conexion,$sql_3_1);
	
	
	/*Consulta Total de Casos Con el Cumplimiento POSITIVO ( SI CUMPLE )*/
	
	$sql_3_2= "SELECT COUNT(numero_solicitud_sd) as 'cantidad_si'
				FROM Olas WHERE estado = 'Cerrado' 
			AND cumplio_ans='SI'
			AND servicio LIKE 'SOPORTE%' 
			AND grupo = 'GRUPO SOPORTE SEGURIDAD'";
    $resultados_6_GSS = mysqli_query($conexion,$sql_3_2);
    
    /*Consulta Total de Casos Con el Cumplimiento NEGATIVO ( NO CUMPLE )*/
    
	$sql_3_3= "SELECT COUNT(numero_solicitud_sd) as 'cantidad_no'
				FROM Olas WHERE estado = 'Cerrado'
			 AND cumplio_ans='NO'
			 AND servicio LIKE 'SOPORTE%'
			 AND grupo = 'GRUPO SOPORTE SEGURIDAD'";
    $resultados_7_GSS = mysqli_query($conexion,$sql_3_3);
    
    /* Consulta  Porcentaje de Cumplimiento con el Grupo (GRUPO SOPORTE SEGURIDAD)*/
    
    $sql_3_4 =" SELECT COUNT('numero_solicitud_sd') AS 'TOTAL' ,
				(SELECT COUNT('numero_solicitud_sd') AS  'si'
				FROM Olas
				WHERE estado =  'Cerrado'
				AND grupo =  'GRUPO SOPORTE SEGURIDAD'
				AND estado =  'Cerrado'
				AND servicio LIKE 'SOPORTE%'
				AND cumplio_ans =  'SI') FROM Olas
				WHERE estado =  'Cerrado'
				AND grupo =  'GRUPO SOPORTE SEGURIDAD'
				AND estado =  'Cerrado' 
				AND servicio LIKE 'SOPORTE%'";
		    		
    $resultados_8_GSS = mysqli_query($conexion,$sql_3_4);
    
      /*********************************************************************************************************/ 
  	/* CONSULTA DE TOTAL , PORCENTAJE SUMAS DE LA CANTIDAD DE CASOS ATENDIDOS ( SI )  Y ( NO )*/

    /*********************************************************************************************************/  

		$sql_total="SELECT COUNT(numero_solicitud_sd)  as 'Total_Comple' 
				FROM Olas WHERE grupo NOT LIKE '%SALUD'
				AND servicio LIKE 'SOPORTE%'
				AND estado = 'Cerrado'";
		$resultados_total= mysqli_query($conexion,$sql_total);
	
		$sql_no="SELECT COUNT(numero_solicitud_sd)  as 'Total_no' 
				FROM Olas WHERE grupo NOT LIKE '%SALUD'
				AND servicio LIKE 'SOPORTE%'
				AND cumplio_ans = 'No'";
		$resultados_total_no= mysqli_query($conexion,$sql_no);
	
		$sql_si="SELECT COUNT(numero_solicitud_sd)  as 'Total_si' 
				FROM Olas WHERE grupo NOT LIKE '%SALUD'
				AND servicio LIKE 'SOPORTE%'
				AND cumplio_ans = 'Si'";
		$resultados_total_si= mysqli_query($conexion,$sql_si);
	
    
  /*********************************************************************************************************/ 
  /*********************************************************************************************************/ 

?>


<link rel="stylesheet" href="../estilo/estilo.css" type="text/css" />
<div>
	<table class="table  table-hover table-condensed table-bordered table-responsive" id="iddatatable">
		<thead style="background-color: #0643C8;color: white; font-weight: bold; color:#fff;">
			<tr id="tablas_cuerpo">
			<td COLSPAN="5">CUMPLE INCIDENTES GRUPO ALTA DISPONIBILIDAD</td>
				<tr id="tablas_cuerpo">
  				<td id="texto">GRUPO</td>
                <td id=numeros>NO</td>
                <td id=numeros>SI</td>
                <td id=numeros>TOTAL</td>
                <td id=numeros> % CUMPLIMIENTO</td>
			</tr>
		</thead>
		<tbody id="tablas_cuerpo">
			
            			<!--Mostramos los GRUPO PLATAFORMA ITO-->
            <tr>
                <td>GRUPO PLATAFORMA ITO</td>
                <!--Mostramos la Cantidad de Casos que no Cumplieron con el-->
                <?php while($resultados = mysqli_fetch_assoc($resultados_3_GPI)) { ?>
                	<td><?= $resultados['cantidad_no'] ?></td>
                <?php } ?>
	            <?php while($resultados = mysqli_fetch_assoc($resultados_2_GPI)){ ?>
                	<td><?= $resultados['cantidad_si'] ?></td>
                <?php } ?>
	            <?php while($resultados = mysqli_fetch_assoc($resultados_1_GPI)) { ?>
	            	<td><?= $resultados['cantidad'] ?></td>
	            <?php } ?>
	                   <!-- OPERACION MATEMATICA PARA EXTRAER EL PORCENTAJE DE CUMPLIMIENTO -->
				<!-- Traemos de la Subconsulta antes creada  los campos  por un array numerico -->
				<?php while($fila=$resultados_4_GPI->fetch_array(MYSQLI_NUM)){
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
         
            	
		    <!--***********************************************************************************************
		    ****************************************GRUPO GESTION HERRAMIENTAS ITO*******************************************
		      ***********************************************************************************************-->         	
              <tr>	
            	<td>GRUPO GESTION HERRAMIENTAS ITO</td>
                <!--Mostramos la Cantidad de Casos que no Cumplieron con el-->
                	
                <?php while($resultados = mysqli_fetch_assoc($resultados_3_GHI)) { ?>
                	<td><?= $resultados['cantidad_no'] ?></td>
                <?php } ?>
                
	            <?php while($resultados = mysqli_fetch_assoc($resultados_2_GHI)){ ?>
                	<td><?= $resultados['cantidad_si'] ?></td>
                <?php } ?>
	            
	            <?php while($resultados = mysqli_fetch_assoc($resultados_1_GHI)) { ?>
	            	<td><?= $resultados['cantidad'] ?></td>
	            <?php } ?>
	            
	            <!--OPERACION MATEMATICA PARA EXTRAER EL PORCENTAJE DE CUMPLIMIENTO -->
	            
				<!--Traemos de la Subconsulta antes creada  los campos  por un array numerico-->
				
				<?php while($fila=$resultados_4_GHI->fetch_array(MYSQLI_NUM)){
					
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
		            if($porcentaje>0){
	                 	$j++;
	                 }
						 echo"<td>".$porcentaje."%</td></tr>";
						
	            } ?>
	            
	            
	                        	
		    <!--***********************************************************************************************
		    ****************************************GRUPO SOPORTE SEGURIDAD*******************************************
		      ***********************************************************************************************-->         	
              <tr>	
            	<td>GRUPO SOPORTE SEGURIDAD</td>
                <!--Mostramos la Cantidad de Casos que no Cumplieron con el-->
                	
                <?php while($resultados = mysqli_fetch_assoc($resultados_7_GSS)) { ?>
                	<td><?= $resultados['cantidad_no'] ?></td>
                <?php } ?>
                
	            <?php while($resultados = mysqli_fetch_assoc($resultados_6_GSS)){ ?>
                	<td><?= $resultados['cantidad_si'] ?></td>
                <?php } ?>
	            
	            <?php while($resultados = mysqli_fetch_assoc($resultados_5_GSS)) { ?>
	            	<td><?= $resultados['cantidad'] ?></td>
	            <?php } ?>
	            
	            <!--OPERACION MATEMATICA PARA EXTRAER EL PORCENTAJE DE CUMPLIMIENTO -->
	            
				<!--Traemos de la Subconsulta antes creada  los campos  por un array numerico-->
				
				<?php while($fila=$resultados_8_GSS->fetch_array(MYSQLI_NUM)){
					
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
		            if($porcentaje>0){
	                 	$j++;
	                 }
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
							$porcentaje=number_format($porcentaje,1, ",", ".");
		             	 ?>
		            		<td><?= $porcentaje."%" ?></td>
		            		
            		 </tr>
	    		</thead>
            </tr>
		</tbody>
	</table>
</div>