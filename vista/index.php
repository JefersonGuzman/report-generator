<?php
	error_reporting(E_ERROR);
	require '../clases/PHPExcel/IOFactory.php'; 
	require_once("../clases/conexion.php");
	$obj= new conectar();
	$conexion=$obj->conexion();
		
	if(isset($_POST['enviar'])){
		$archivo = $_FILES["archivo"]["name"];
	    $archivoCopiado = $_FILES["archivo"]["tmp_name"];
	    $archivoGuardado= "copia_".$archivo;
	    if(copy($archivoCopiado , $archivoGuardado)){
	    	echo "SE COPIO EL ARCHIVO";
	    }else{
    	echo "<div id='msj_resp_error'><p>TIENES QUE SUBIR UN ARCHIVO!!</p></div>";
    	header("refresh:0.1;url=index.php");
	    }
	    echo $archivo;
	    
	    if(file_exists($archivoGuardado)){
	    		//Variable con el nombre del archivo
			$nombreArchivo ="copia_".$archivo;
			// Cargo la hoja de cálculo
			$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
			
			//Asigno la hoja de calculo activa
			$objPHPExcel->setActiveSheetIndex(0);
			//Obtengo el numero de filas del archivo
			$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

			$j=0;
			
			for($i=2;$i<=$numRows;$i++){
			
				
				$num_sd = $objPHPExcel ->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
				$estado = $objPHPExcel ->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
				$servicio = $objPHPExcel ->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
				$grupo = $objPHPExcel ->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
			    $fecha_prog = $objPHPExcel ->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
				$fecha_apertu = $objPHPExcel ->getActiveSheet()->getCell('O'.$i)->getCalculatedValue();
				$num_im = $objPHPExcel ->getActiveSheet()->getCell('Y'.$i)->getCalculatedValue();
				$empresa = $objPHPExcel ->getActiveSheet()->getCell('AA'.$i)->getCalculatedValue();
				$fecha_soluci = $objPHPExcel ->getActiveSheet()->getCell('AE'.$i)->getCalculatedValue();
				$update_time = $objPHPExcel ->getActiveSheet()->getCell('AF'.$i)->getCalculatedValue();
				$cumplio_ans = $objPHPExcel ->getActiveSheet()->getCell('AI'.$i)->getCalculatedValue();
				$asignatario_inc = $objPHPExcel ->getActiveSheet()->getCell('AJ'.$i)->getCalculatedValue();
				$fecha_cierre = $objPHPExcel ->getActiveSheet()->getCell('AN'.$i)->getCalculatedValue();
				$fecha_apertura = $objPHPExcel ->getActiveSheet()->getCell('AZ'.$i)->getCalculatedValue();
				$tiempo_escalamiento = $objPHPExcel ->getActiveSheet()->getCell('BC'.$i)->getCalculatedValue();
				$cumple_escalamiento = $objPHPExcel ->getActiveSheet()->getCell('BD'.$i)->getCalculatedValue();
	
				$sql = "INSERT INTO `Olas`
				(`numero_solicitud_sd`, `estado`, `servicio`, `grupo`, `fecha_programada`, `fecha_apertura_lla`, `numincidente`, `empresa`, `fecha_salucion`, `update_time`, `cumplio_ans`, `asignatario_inc`, `fecha_cierre_inc`, `fecha_apertura_inc`, `tiempo_escalamiento`, `cumple_escalamiento`)
				  VALUES('$num_sd',
				  '$estado',
				  '$servicio',
				  '$grupo',
				  '$fecha_prog',
				  '$fecha_apertu',
				  '$num_im',
				  '$empresa',
				  '$fecha_soluci',
				  '$update_time',
				  '$cumplio_ans',
				  '$asignatario_inc',
				  '$fecha_cierre',
				  '$fecha_apertura',
				  '$tiempo_escalamiento',
				  '$cumple_escalamiento')";
				   $result = $conexion->query($sql);
				   header('location:index_2.php');
			}
			
	    }else{

	    }


	}


    if(isset($_POST['eliminar'])){
    	$sql_ ="DELETE FROM `Olas`";
    	$result_ = $conexion->query($sql_);

	 }
    
?> 
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="image/x-icon" href="../img/ico.png" />
    <link rel="stylesheet" href="../estilo/estilo.css" type="text/css" />
    <link rel="stylesheet" href="../librerias/bootstrap/bootstrap.min.css" type="text/css" />

	<title>CARVAJAL- INICIO</title>
	<?php require_once "scripts.php";  ?>
</head>
<body>
     <div class="container-full">
        <div class="card-header">
          <div class="row">
                  <div class="col-sm-8">
                  	<form action="index_2.php" id="formCambiar">
                        <button type="submit" form="formCambiar" id="btn_cambiar" name="tabla" class="btn btn-info fa-2x"><i>Tabla </i><i class="fas fa-chevron-circle-right"></i></button>
                  	</form>
             	 </div>
            	<div class="col-sm-4">
            	    <img src="../img/icono.png"></img>
            	</div>
          </div>
        </div>
    </div>
       <div class="cantainer-full">
             <div class="row">
                 <img src='../img/banner.jpg' id='banner'></img>
             </div>
      </div> 
        <div class="container" id="contenido">
            <div class="row">
                <div class="col-sm-12">
                	<h1>CARGAR ARCHIVO INFORME</h1>
                <ul>
                	<li>
                		<p>

                			<p id="titulo">
                				<strong>PRIMER PASO</strong>
                			</p>
                			Actualizar el archivo y solo dejar los casos del Mes Actual. Copiar y Pegar la celda BD (Cumplimiento Escalamiento) para que de 
                			esta manera esa celda  quedaria como una columna no calculada.
                		</p>
                	</li>
                	<li>
                		<p>
                			<p id="titulo">
                				<strong>SEGUNDO PASO</strong>
                			</p> 
                			Carga el Archivo  dando click en el Boton "Examinar" ,  buscar el archivo en tu
                			equipo Y luego precionar Click en (CARGAR DATOS)
                		</p>
                	</li>
                </ul>
                    <form  id="CreateForm" action="index.php" method="POST" class="formularioocompleto" enctype="multipart/form-data" >
                      <div class="cantainer">
                      	<div class="row">
                      		<div class="col-sm-12">
                      			<img src='../img/icono_excel.jpg' id='excel_ico'></img>
                      		</div>
                      	</div>
                      </div>  
                        <input type="file"  name="archivo" class = "form-control btn btn-success"/>
                        <hr/>
                       <p id=titulo>
                	   	 <strong>SIEMPRE ELIMINAR LOS DATOS ANTES DE CARGAR NUEVA INFORMACION</strong>
                	   </p>
                        <button type="submit" form="CreateForm" name="enviar" class="btn btn-success">Cargar Datos</button>
                        <button type="submit" form="CreateForm" name="eliminar" class="btn btn-danger">Eliminar Datos</button>
                    </form>
                </div>
            </div>
        </div>
    <div class="container-full">
    	<div class="footer_1">
	        <div class="card-footer text-muted">
	        	<i><i class="fab fa-grav"></i>Desarrollado Por Jeferson Guzman Lozano [ <a href="http://srjeffwebdeveloper.epizy.com" target="_blank">srjeffwebdeveloper.epizy.com</a> ]</i> &copy Carvajal Tecnologia y Servicio  
    	    </div>
    	</div>
    </div>
</body>
</html>



