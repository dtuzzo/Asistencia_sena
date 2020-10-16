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

					<div class="card-body">
						<hr>
						<div id="tabla_Datatable"></div>
					</div>

					<div class="card-footer text-muted">
						<div style="text-align: center;"> &copy; SENA. All Rights Reserved </div>
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
							<option>Asistio</option>
							<option>Retardo</option>
							<option>Falla</option>
						</select>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning" id="btn-actualizar-registro">Actualizar</button>
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

<!------------------------------- AJAX OBTENER DATOS -------------------------------------------------------------->
<script type="text/javascript">
	function obtenDatos(IDREGISTRO) {
		$.ajax({
			type: "POST",
			data: "IDREGISTRO=" + IDREGISTRO,
			url: "../../procesos/Asistencia/obtenDatos.php",
			success: function(r) {
				datos = jQuery.parseJSON(r);
				$('#id_asistencia').val(datos['id_asistencia']);
				$('#tipo_asistencia_U').val(datos['tipo_asistencia_U']);

			}
		});
	}
</script>