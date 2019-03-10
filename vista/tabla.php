
<?php 
	error_reporting(E_ERROR);
	require_once "scripts.php";
	require_once "../clases/conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();
	$sql="SELECT * FROM Olas";
	$result=mysqli_query($conexion,$sql);
	
?>
    <link rel="stylesheet" href="../estilo/estilo.css" type="text/css" />
    	<?php require_once "scripts.php";  ?>

<div>
	<table class="table table-sx table-hover table-condensed table-bordered table-responsive" id="iddatatable">
		<thead style="background-color: #0643C8;color: white; font-weight: bold; color:#fff;">
			<tr>
                <td>Num SD</td>
                <td>Estado</td>
                <td>Servicio</td>
                <td>Grupo</td>
                <td>Num IM</td>
                <td>Empresa</td>
                <td>Cumplio ANS</td>
                <td>Asignatario IM</td>
                <td>Cumple Escalamiento</td>
			</tr>
		</thead>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
                <td>Num SD</td>
                <td>Estado</td>
                <td>Servicio</td>
                <td>Grupo</td>
                <td>Num IM</td>
                <td>Empresa</td>
                <td>Cumplio ANS</td>
                <td>Asignatario IM</td>
                <td>Cumple Escalamiento</td>
			</tr>
		</tfoot>
		<tbody>
			<?php
				while ($fila = mysqli_fetch_row($result)){
			?>
			    <td><?php echo $fila[0] ?></td>
                <td><?php echo $fila[1] ?></td>
                <td><?php echo $fila[2] ?></td>
                <td><?php echo $fila[3] ?></td>
                <td><?php echo $fila[6] ?></td>
                <td><?php echo $fila[7] ?></td>
                <td><?php echo $fila[10] ?></td>
                <td><?php echo $fila[11] ?></td>
                <td><?php echo $fila[15] ?></td>
                </tr>
			<?php	} ?>
		</tbody>
	</table>
</div>	
			
<script type="text/javascript">
	$(document).ready(function() {
		$('#iddatatable').DataTable();
	} );
</script>

