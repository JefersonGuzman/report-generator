
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
	

    
	/*Consulta Grupos ( MESA DE SERVICIO ) */	
	$sql_1="SELECT COUNT(numero_solicitud_sd)  as 'cantidad'
				FROM Olas ";
	$resultados_1= mysqli_query($conexion,$sql_1);
	
	/*Consulta contamos los  casos con cumplimiento de escamalineto en POSITIVO ( SI CUMPLE)*/
	$sql_2= "SELECT COUNT(numero_solicitud_sd) as 'cantidad_si'
				FROM Olas
			 WHERE CUMPLE_ESCALAMIENTO = 'Si Cumple'";
    $resultados_2 = mysqli_query($conexion,$sql_2);
    
    /*Consulta contamos los  casos con cumplimiento de escamalineto en NEGATIVO ( NO CUMPLE)*/
    $sql_3="SELECT COUNT(numero_solicitud_sd)  as  'cantidad_no'
    			FROM Olas
    		WHERE CUMPLE_ESCALAMIENTO = 'No Cumple'";
    $resultados_3 = mysqli_query($conexion,$sql_3);
    
    /*
    	Consulta contamos  todos los casos y  al igual los cosaso con cumplimiento en POSITIVO (SI CUMPLE) para de esta forma poder saber
    	La cantidad de casos que no han cumplido por medio de una resta
    */
    $sql_4 = "SELECT COUNT(`numero_solicitud_sd`) AS 'total' ,
		    	(SELECT COUNT(`numero_solicitud_sd`) AS 'si' 
		    		FROM Olas WHERE `cumple_escalamiento`= 'Si Cumple')  
		    	FROM Olas";
    $resultados_4 = mysqli_query($conexion,$sql_4);

?>
<link rel="stylesheet" href="../estilo/estilo.css" type="text/css" />
<div>
	<table class="table  table-hover table-condensed table-bordered table-responsive" id="iddatatable">
		<thead style="background-color: #0643C8;color: white; font-weight: bold; color:#fff;">
	  	<tr id="tablas_cuerpo">
	  		<td COLSPAN="5">CUMPLIMIENTO MESA DE SERVICIO</td>
	  			<tr id="tablas_cuerpo">	
	  				<td id="texto">GRUPO</td>
	                <td id=numeros>NO</td>
	                <td id=numeros>SI</td>
	                <td id=numeros>TOTAL</td>
	                <td id=numeros> % CUMPLIMIENTO</td>
				</tr>
		 </tr>
		</thead>
		<tbody id="tablas_cuerpo">

            	<tr>
            		<td>MESA CLIENTES ESPECIALES</td>
            		
            	<?php while($resultados = mysqli_fetch_assoc($resultados_3)): ?>
                	<td><?= $resultados['cantidad_no'] ?></td>
                <?php endwhile; ?>
                
	            <?php while($resultados = mysqli_fetch_assoc($resultados_2)): ?>
                	<td><?= $resultados['cantidad_si'] ?></td>
                <?php endwhile; ?>
	            
	            <?php while($resultados = mysqli_fetch_assoc($resultados_1)): ?>
	            	<td><?= $resultados['cantidad'] ?></td>
	            <?php endwhile; ?>
	            
	            
	            <!--OPERACION MATEMATICA PARA EXTRAER EL PORCENTAJE DE CUMPLIMIENTO -->
	           
				<!--Traemos de la Subconsulta antes creada  los campos  por un array numerico-->	            
				<?php while($fila=$resultados_4->fetch_array(MYSQLI_NUM)){
                
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
	                 $porcentaje=number_format($porcen,1, ",", ".").'%';
					 echo"<td>".$porcentaje."</td></tr>";
					 
				
                } ?>
            	</tr>
            	<?php
					
					  if($porcentaje != " "){
					      $sql ="INSERT INTO `porcen_cumpli_mesa`(`mes`, `porcentaje`,fecha) VALUES ('$nomb_mes','$porcentaje','$ano')";
						  $result = $conexion->query($sql);
						
					   }

					  if($semana == 1){
					      $sql_1 ="UPDATE `porcen_cumpli_global_grupo` SET `1`='$porcentaje' WHERE nombre = 'MESA DE SERVICIOS'";
						  $result_1 = $conexion->query($sql_1);
						
					   }
					   
					  if($semana == 2){
					      $sql_2 ="UPDATE `porcen_cumpli_global_grupo` SET `2`='$porcentaje' WHERE nombre = 'MESA DE SERVICIOS'";
						  $result_2 = $conexion->query($sql_2);
						
					  }

					  if($semana == 3){
					      $sql_3 ="UPDATE `porcen_cumpli_global_grupo` SET `3`='$porcentaje' WHERE nombre = 'MESA DE SERVICIOS'";
						  $result_3 = $conexion->query($sql_3);
						
					  }
					  
					  if($semana == 4){
					      $sql_4 ="UPDATE `porcen_cumpli_global_grupo` SET `4`='$porcentaje' WHERE nombre = 'MESA DE SERVICIOS'";
						  $result_4 = $conexion->query($sql_4);
						
					   }

					  if($semana == 5){
					      $sql_5 ="UPDATE `porcen_cumpli_global_grupo` SET `5`='$porcentaje' WHERE nombre = 'MESA DE SERVICIOS'";
						  $result_5 = $conexion->query($sql_5);
						
					   }
					   
            	?>
		</tbody>
	</table>
</div>


			
