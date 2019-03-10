<?php
	require_once("../clases/conexion.php");
	require_once("../vista/scripts.php");
	$obj= new conectar();
	$conexion=$obj->conexion();
	
	$mostrar_3 = "SELECT   concat_ws('<br>',mes ,porcentaje) as 'Mes' , porcentaje
				 FROM `porcen_cumpli_salud` ORDER BY id ASC LIMIT 3";
	$result = mysqli_query($conexion , $mostrar_3);
	
	$valoresY=array();//Mes
	$valoresX=array();//porcentaje
	
	while($ver =mysqli_fetch_row($result)){
		$valoresY[]=($ver[1]*100/00.1);
		$valoresX[]=$ver[0];
		
	}
		$datosX = json_encode($valoresX);
		$datosY = json_encode($valoresY);
	

?>

<div id="graficaLineal_2"></div>
<script type="text/javascript">
		function crearCadenaLineal(json){
			var parsed = JSON.parse(json);
			var arr = [];
			for(var x in parsed){
				arr.push(parsed[x]);
			}
			return arr;
		}
</script>

<script type="text/javascript">

	datosX=crearCadenaLineal('<?php echo $datosX ?>');
	datosY=crearCadenaLineal('<?php echo $datosY ?>');

		
	var trace1 = {
		  x: datosX,
		  y: datosY,
		  type: 'scatter'
	};
	
	var data = [trace1];
	Plotly.newPlot('graficaLineal_2', data);

</script>