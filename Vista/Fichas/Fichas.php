<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Asistencia</title>
	<?php require_once "scripts.php" ?>
	<link rel="stylesheet" href="../../assets/css/style2.css">
</head>

<?php

require_once "../../Conexion/conexion.php"; 
$obj = new conectar();
$conexion = $obj->conexion();

$sql = "SELECT CURDATE();";
$result = mysqli_query($conexion,$sql);
$row = $result -> fetch_array(MYSQLI_NUM);

include '../header.php';

?>

<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header" style="text-align: center;">
						Asistencia
					</div>
					<h4 style="font-family: Century Gotic;" class="mt-4 ml-4">Fecha actual: <?php echo $row[0] ?></h4>
					<div class="card-body">
						<hr>
						<div id="tabla_Datatable"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-------------------------------------------Modal Actualizar------------------------------------------------------------------->
	<div class="modal fade" id="Modal-editar-fichas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form-actualizar-registro">
						<input type="text" hidden="" id="id_asistencia" name="id_asistencia">
						<label>Situacion</label>
						<select class="form-control" id="tipo_asistencia_U" name="tipo_asistencia_U">
							<option value="" disabled>Elija la situación</option>
							<option value="Asistio">Asistio</option>
							<option value="Retardo">Retardo</option>
							<option value="Falla">Falla</option>
							<option value="Excusado">Excusado</option>
						</select>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-info" id="btn-actualizar-registro">Actualizar</button>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

<!------------------------------ AJAX BOTON ACTUALIZAR ------------------------------------------------------------>
<script type="text/javascript">
	$(document).ready(function() {
		$('#btn-actualizar-registro').click(function() {
			datos = $('#form-actualizar-registro').serialize();

			$.ajax({
				type: "POST",
				data: datos,
				url: "../../procesos/Asistencia/actualizar.php",
				success: function(r) {
					if (r == 1) {
						$('#tabla_Datatable').load('tabla.php')
						alertify.success('Actualizado con éxito');
					} else {
						alertify.error("Hubo un error");
					}
				}
			});
		});
	});
</script>

<!------------------------------ FORMATO DATATABLE ---------------------------------------------------------------->
<script type="text/javascript">
	$(document).ready(function() { //Codigo para abir un documento jQuery
		$('#tabla_Datatable').load('tabla.php')
	});
</script>

<!---------------------------------- OBTENER DATOS ---------------------------------------------------------------->
<script type="text/javascript">
	function obtenDatos(idasistencia) {
		$.ajax({
			type: "POST",
			data: "idasistencia=" + idasistencia,
			url: "../../procesos/Asistencia/obtenDatos.php",
			success: function(r) {
				datos = jQuery.parseJSON(r);
				$('#id_asistencia').val(datos['id_asistencia']);
			}
		});
	}
</script>