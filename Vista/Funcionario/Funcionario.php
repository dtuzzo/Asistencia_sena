<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Funcionario</title>
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
						Funcionario
					</div>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#Agregar-Datos-Modal">
							Agregar nuevo <span class="fas fa-plus-circle"></span>
						</span>

						<span class="btn btn-info" data-toggle="modal" data-target="#Modal-subir">
							Carga masiva <span class="fas fa-plus-circle"></span>
						</span>

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

	<!----------------------------------------------Modal Agregar------------------------------------------------------------------->
	<div class="modal fade" id="Agregar-Datos-Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agrega Funcionario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form-nuevo">
						<label>Cédula</label>
						<input type="text" class="form-control input-sm" id="numerodocumento_funcionario" name="numerodocumento_funcionario" pattern="[0-9]+" title="Este campo es obligatorio" maxlength="10" required="">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre_funcionario" name="nombre_funcionario" title="Este campo es obligatorio" required="">
						<label>Apellido</label>
						<input type="text" class="form-control input-sm" id="apellido_funcionario" name="apellido_funcionario" title="Este campo es obligatorio" required="">
						<label>Celular</label>
						<input type="text" class="form-control input-sm" id="celular_funcionario" name="celular_funcionario" title="Este campo es obligatorio" pattern="[0-9]+" maxlength="10" required="">
						<label>Contraseña</label>
						<input type="text" class="form-control input-sm" id="clave_funcionario" name="clave_funcionario" minlength="5" title="Este campo es obligatorio" required="">
						<label>Rol</label>
						<input type="text" class="form-control input-sm" id="id_rol_fk" name="id_rol_fk" title="Este campo es obligatorio" pattern="[1-3]" required="">
						<label>Materia</label>
						<input type="text" class="form-control input-sm" id="id_materia_fk" name="id_materia_fk" title="Este campo es obligatorio" pattern="" required="">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btn-guardar" class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</div>
	</div>

	<!-------------------------------------------Modal Actualizar------------------------------------------------------------------->
	<div class="modal fade" id="Modal-editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form-actualizar">
						<input type="text" hidden="" id="id_funcionario" name="id_funcionario">
						<label>Cédula</label>
						<input type="text" class="form-control input-sm" id="numerodocumento_funcionario_U" name="numerodocumento_funcionario_U">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre_funcionario_U" name="nombre_funcionario_U">
						<label>Apellido</label>
						<input type="text" class="form-control input-sm" id="apellido_funcionario_U" name="apellido_funcionario_U">
						<label>Celular</label>
						<input type="text" class="form-control input-sm" id="celular_funcionario_U" name="celular_funcionario_U">
						<label>Contraseña</label>
						<input type="text" class="form-control input-sm" id="clave_funcionario_U" name="clave_funcionario_U">
						<label>Rol</label>
						<input type="text" class="form-control input-sm" id="id_rol_fk_U" name="id_rol_fk_U">
						<label>Materia</label>
						<input type="text" class="form-control input-sm" id="id_materia_fk_U" name="id_materia_fk_U" >
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning" id="btn-actualizar">Actualizar</button>
				</div>
			</div>
		</div>
	</div>

	<!-----------------------------------Modal Subir Carga Masiva --------------------------------------------------------->
	<div class="modal fade" id="Modal-subir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Cargar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<form action="" method="post" enctype="multipart/form-data" id="filesForm">

						<input class="form-control" type="file" name="fileContacts" id="carga">
						<br>
						<button type="button" onclick="uploadContacts()" class="btn btn-info form-control">Cargar</button>
					</form>

				</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<!------------------------------------------ AJAX BOTON AGREGAR --------------------------------------------------->
<script type="text/javascript">
	$(document).ready(function() {
		$('#btn-guardar').click(function() {
			datos = $('#form-nuevo').serialize();

			$.ajax({
				type: "POST",
				data: datos,
				url: "../../procesos/Funcionario/agregar.php",
				success: function(r) {
					if (r == 1) {
						$('#form-nuevo')[0].reset(); //codigo para limpiar el formulario
						$('#tabla_Datatable').load('tabla.php')
						alertify.success('Agregado con éxito');
					} else {
						alertify.error("Hubo un error");
					}
				}
			});
		});
	});
</script>

<!------------------------------ AJAX BOTON ACTUALIZAR ------------------------------------------------------------>
<script type="text/javascript">
	$(document).ready(function() {
		$('#btn-actualizar').click(function() {
			datos = $('#form-actualizar').serialize();
			
			$.ajax({
				type: "POST",
				data: datos,
				url: "../../procesos/Funcionario/actualizar.php",
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
	function obtenDatos(idfuncionario) {
		$.ajax({
			type: "POST",
			data: "idfuncionario=" + idfuncionario,
			url: "../../procesos/Funcionario/obtenDatos.php",
			success: function(r) {
				datos = jQuery.parseJSON(r);
				$('#id_funcionario').val(datos['id_funcionario']);
				$('#numerodocumento_funcionario_U').val(datos['numerodocumento_funcionario_U']);
				$('#nombre_funcionario_U').val(datos['nombre_funcionario_U']);
				$('#apellido_funcionario_U').val(datos['apellido_funcionario_U']);
				$('#celular_funcionario_U').val(datos['celular_funcionario_U']);
				$('#clave_funcionario_U').val(datos['clave_funcionario_U']);
				$('#id_rol_fk_U').val(datos['id_rol_fk_U']);
				$('#id_materia_fk_U').val(datos['id_materia_fk_U']);
			}
		});
	}

//------------------------------- AJAX ELIMINAR ------------------------------------------------------------------->
	function eliminar(IDFUNCIONARIO) {
		alertify.confirm('Eliminar un registro', '¿Está seguro que quiere eliminar este registro?',
			function() {
				$.ajax({
					type: "POST",
					data: "IDFUNCIONARIO=" + IDFUNCIONARIO,
					url: "../../procesos/Funcionario/eliminar.php",
					success: function(r) {
						if (r == 1) {
							$('#tabla_Datatable').load('tabla.php'); //Codigo para recargar la tabla
							alertify.success("Eliminado con éxito");
						} else {
							alertify.error("Hubo un error");
						}
					}
				});
			}

			,
			function() {
				alertify.error("Cancelado");
			});
	}
</script>

<!------------------------------------- CARGA MASIVA -------------------------------------------------------------->

<script type="text/javascript">
	function uploadContacts() {

		var Form = new FormData($('#filesForm')[0]);
		$.ajax({

			url: "import.php",
			type: "post",
			data: Form,
			processData: false,
			contentType: false,
			success: function(data) {
				$('#tabla_Datatable').load('tabla.php');
				alert('Registros Agregados!');
			}
		});
	}
</script>