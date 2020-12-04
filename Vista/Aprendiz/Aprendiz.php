<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Aprendiz</title>
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
						Aprendiz
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
				</div>
			</div>
		</div>
	</div>

	<!----------------------------------------------Modal Agregar------------------------------------------------------------------->
	<div class="modal fade" id="Agregar-Datos-Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar Aprendiz</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form-nuevo-aprendiz">
						<label>Tipo de documento</label>
						<select class="form-control" id="tipodocumento_aprendiz" name="tipodocumento_aprendiz">
			                <option value="T.I">T.I</option>
			                <option value="C.C">C.C</option>
			            </select>
						<label>N. documento</label>
						<input type="text" class="form-control input-sm" id="numerodocumento_aprendiz" name="numerodocumento_aprendiz" title="Este campo es obligatorio" maxlength="10" required="">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre_aprendiz" name="nombre_aprendiz" title="Este campo es obligatorio" required="">
						<label>Apellido</label>
						<input type="text" class="form-control input-sm" id="apellido_aprendiz" name="apellido_aprendiz" title="Este campo es obligatorio" required="">
						<label>Celular</label>
						<input type="text" class="form-control input-sm" id="celular_aprendiz" name="celular_aprendiz" title="Este campo es obligatorio" pattern="[0-9]+" maxlength="10" required="">
						<label>Correo misena</label>
						<input type="email" class="form-control input-sm" id="correosena_aprendiz" name="correosena_aprendiz" title="Este campo es obligatorio" required="">
						<label>Correo personal</label>
						<input type="email" class="form-control input-sm" id="correopersonal_aprendiz" name="correopersonal_aprendiz" title="Este campo es obligatorio" required="">
						<label>Estado del aprendiz</label>
						<select class="form-control" id="id_estado_fk" name="id_estado_fk">
			                <option value="1">Activo</option>
			                <option value="2">Desertado</option>
			            </select>
						<label>Ficha</label>
						<!-- <input type="text" class="form-control input-sm" id="id_ficha_fk" name="id_ficha_fk" pattern="[0-9,.]+" title="Solo se permite escribir numeros" required=""> -->
						<select class="form-control" id="id_ficha_fk" name="id_ficha_fk"  title="Solo se permite escribir numeros" required="">
			                <option value="1">2056293</option>
			            </select>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btn-guardar-aprendiz" class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</div>
	</div>

	<!-------------------------------------------Modal Actualizar------------------------------------------------------------------->
	<div class="modal fade" id="Modal-editar-Aprendiz" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form-actualizar-Aprendiz">
						<input type="text" hidden="" id="id_aprendiz" name="id_aprendiz">
						<label>Tipo de documento</label>
						<select class="form-control" id="tipodocumento_aprendiz_U" name="tipodocumento_aprendiz_U">
			                <option value="T.I">T.I</option>
			                <option value="C.C">C.C</option>
			            </select>
						<label>N. documento</label>
						<input type="text" class="form-control input-sm" id="numerodocumento_aprendiz_U" name="numerodocumento_aprendiz_U">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre_aprendiz_U" name="nombre_aprendiz_U">
						<label>Apellido</label>
						<input type="text" class="form-control input-sm" id="apellido_aprendiz_U" name="apellido_aprendiz_U">
						<label>Celular</label>
						<input type="text" class="form-control input-sm" id="celular_aprendiz_U" name="celular_aprendiz_U">
						<label>Correo misena</label>
						<input type="text" class="form-control input-sm" id="correosena_aprendiz_U" name="correosena_aprendiz_U">
						<label>Correo personal</label>
						<input type="text" class="form-control input-sm" id="correopersonal_aprendiz_U" name="correopersonal_aprendiz_U">
						<label>Estado del aprendiz</label>
						<!-- <select class="form-control" id="id_estado_fk_U" name="id_estado_fk_U">
			                <option value="1">Activo</option>
			                <option value="2">Desertado</option> -->
						<select id="id_estado_fk_U" name="id_estado_fk_U" class="form-control" required="">
						<?php 
						
						require_once "../../Conexion/conexion.php"; 
						$obj = new conectar();
						$conexion = $obj->conexion();

						$sql = "SELECT * FROM estado";
						$result = mysqli_query($conexion,$sql);
						
						?>

						<?php foreach($result as $opciones): ?>

							<option value="<?php echo $opciones['id_estado']?>"><?php echo $opciones['nombre_estado']?></option>

						<?php endforeach ?>

						</select>

						<label>Ficha</label>
						<!-- <select class="form-control" id="id_ficha_fk_U" name="id_ficha_fk_U" title="Solo se permite escribir numeros" required="">
			                <option value="1">2056293</option>
			            </select> -->
						<select id="id_ficha_fk_U" name="id_ficha_fk_U" class="form-control" title="Solo se permite escribir numeros" required="">
							<?php 
							
							require_once "../../Conexion/conexion.php"; 
							$obj = new conectar();
							$conexion = $obj->conexion();

							$sql = "SELECT * FROM ficha";
							$result = mysqli_query($conexion,$sql);
							
							?>

							<?php foreach($result as $opciones): ?>

								<option value="<?php echo $opciones['id_ficha']?>"><?php echo $opciones['numero_ficha']?></option>

							<?php endforeach ?>

							</select>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-info" id="btn-actualizar-aprendiz">Actualizar</button>
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
		$('#btn-guardar-aprendiz').click(function() {
			datos = $('#form-nuevo-aprendiz').serialize();

			$.ajax({
				type: "POST",
				data: datos,
				url: "../../procesos/Aprendiz/agregar.php",
				success: function(r) {
					if (r == 1) {
						$('#form-nuevo-aprendiz')[0].reset(); //codigo para limpiar el formulario
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
		$('#btn-actualizar-aprendiz').click(function() {
			datos = $('#form-actualizar-Aprendiz').serialize();
			
			$.ajax({
				type: "POST",
				data: datos,
				url: "../../procesos/Aprendiz/actualizar.php",
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
	function obtenDatos(id_aprendiz) {
		$.ajax({
			type: "POST",
			data: "id_aprendiz=" + id_aprendiz,
			url: "../../procesos/Aprendiz/obtenDatos.php",
			success: function(r) {
				datos = jQuery.parseJSON(r);
				$('#id_aprendiz').val(datos['id_aprendiz']);
				$('#tipodocumento_aprendiz_U').val(datos['tipodocumento_aprendiz_U']);
				$('#numerodocumento_aprendiz_U').val(datos['numerodocumento_aprendiz_U']);
				$('#nombre_aprendiz_U').val(datos['nombre_aprendiz_U']);
				$('#apellido_aprendiz_U').val(datos['apellido_aprendiz_U']);
				$('#celular_aprendiz_U').val(datos['celular_aprendiz_U']);
				$('#correosena_aprendiz_U').val(datos['correosena_aprendiz_U']);
				$('#correopersonal_aprendiz_U').val(datos['correopersonal_aprendiz_U']);
				$('#id_estado_fk_U').val(datos['id_estado_fk_U']);
				$('#id_ficha_fk_U').val(datos['id_ficha_fk_U']);
			}
		});
	}

//------------------------------- AJAX ELIMINAR ------------------------------------------------------------------->
	function eliminar(IDAPRENDIZ) {
		alertify.confirm('Eliminar un registro', '¿Está seguro que quiere eliminar este registro?',
			function() {
				$.ajax({
					type: "POST",
					data: "IDAPRENDIZ=" + IDAPRENDIZ,
					url: "../../procesos/Aprendiz/eliminar.php",
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

			url: "importA.php",
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