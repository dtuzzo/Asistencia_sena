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

						<span class="btn btn-info" data-toggle="modal" data-target="#Modal-asignar-fichas">
							Asignar fichas <span class="fas fa-plus-circle"></span>
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
					<h5 class="modal-title" id="exampleModalLabel">Agrega Funcionario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form-nuevo">
						<label>Cédula</label>
						<input type="text" class="form-control input-sm" id="numerodocumento_funcionario" name="numerodocumento_funcionario" pattern="[0-9]+" title="Este campo es obligatorio" maxlength="10" class="required">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre_funcionario" name="nombre_funcionario" title="Este campo es obligatorio" class="required">
						<label>Apellido</label>
						<input type="text" class="form-control input-sm" id="apellido_funcionario" name="apellido_funcionario" title="Este campo es obligatorio" class="required">
						<label>Celular</label>
						<input type="text" class="form-control input-sm" id="celular_funcionario" name="celular_funcionario" title="Este campo es obligatorio" pattern="[0-9]+" class="required">
						<label>Correo</label>
						<input type="text" class="form-control input-sm" id="correo_funcionario" name="correo_funcionario" title="Este campo es obligatorio" class="required">
						<label>Rol</label>
						<select id="id_rol_fk" name="id_rol_fk" class="form-control" class="required">
							<?php 
							
							require_once "../../Conexion/conexion.php"; 
							$obj = new conectar();
							$conexion = $obj->conexion();

							$sql = "SELECT * FROM rol";
							$result = mysqli_query($conexion,$sql);
							
							?>

							<?php foreach($result as $opciones): ?>

								<option value="<?php echo $opciones['id_rol']?>"><?php echo $opciones['nombre_rol']?></option>

							<?php endforeach ?>

							</select>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btn-guardar" class="btn btn-primary" data-toggle="modal" data-target="#Modal-asignar" data-dismiss="modal">Continuar</button>
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
						<label>Correo</label>
						<input type="text" class="form-control input-sm" id="correo_funcionario_U" name="correo_funcionario_U">
						<label>Rol</label>
						<input type="text" class="form-control input-sm" id="id_rol_fk_U" name="id_rol_fk_U">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-info" id="btn-actualizar">Actualizar</button>
				</div>
			</div>
		</div>
	</div>

	<!-------------------------------------------Modal Asignar------------------------------------------------------------------->
	<div class="modal fade" id="Modal-asignar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Asignar materia</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				
					<form id="form-asignar">
						<div class="row">
							<div class="col-md-6">
								<!-- <label>Materia</label>
								<input type="text" class="form-control input-sm" id="numerodocumento_funcionario_U" name="numerodocumento_funcionario_U"> -->
								<label for="">Materia</label>
								<select name="id_materia" class="form-control">
								<?php 
								
								require_once "../../Conexion/conexion.php"; 
								$obj = new conectar();
								$conexion = $obj->conexion();

								$sql = "SELECT * FROM materia";
								$result = mysqli_query($conexion,$sql);
								
								?>

								<?php foreach($result as $opciones): ?>

									<option value="<?php echo $opciones['id_materia']?>"><?php echo $opciones['nombre_materia']?></option>

								<?php endforeach ?>

								</select>
								<select name="id_funcionario" class="form-control" hidden="">
								<?php 
								
								require_once "../../Conexion/conexion.php"; 
								$obj = new conectar();
								$conexion = $obj->conexion();

								$sql1 = "SELECT MAX(id_funcionario) AS id FROM funcionario";
								$result2 = mysqli_query($conexion,$sql1);
								
								?>

								<?php foreach($result2 as $opciones2): ?>

								<option value="<?php echo $opciones2['id'] + 1;?>"><?php echo $opciones2['id'] + 1;?></option>

								<?php endforeach ?>

								</select>

							</div>
								
								<div class="col-md-6">
									<label for="" style="color: white;">testo</label><br>
									<button type="button" class="btn btn-success" id="btn-asignar">Asignar</button>
								</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.reload();">Cerrar</button>
				</div>
			</div>
		</div>
	</div>

	<!-------------------------------------------Modal Asignar Fichas------------------------------------------------------------------->
	<div class="modal fade" id="Modal-asignar-fichas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Asignar fichas</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
					
						<form id="form-asignar-fichas">
							<div class="row">
								<div class="col-md-6">
								
									<label for="">Funcionarios Registrados</label>
									<select name="id_funcionario" class="form-control">
									<?php 
									
									require_once "../../Conexion/conexion.php"; 
									$obj = new conectar();
									$conexion = $obj->conexion();

									$sql = "SELECT * FROM funcionario";
									$result = mysqli_query($conexion,$sql);
									
									?>

									<?php foreach($result as $opciones): ?>

										<option value="<?php echo $opciones['id_funcionario']?>"><?php echo $opciones['nombre_funcionario']?></option>

									<?php endforeach ?>

									</select>

									
									<label for="">Fichas Registradas</label>
									<select name="id_ficha" class="form-control"> 
									<?php 
									
									require_once "../../Conexion/conexion.php"; 
									$obj = new conectar();
									$conexion = $obj->conexion();

									$sql1 = "SELECT * FROM ficha";
									$result2 = mysqli_query($conexion,$sql1);
									
									?>

									<?php foreach($result2 as $opciones2): ?>

									<option value="<?php echo $opciones2['id_ficha'];?>"><?php echo $opciones2['numero_ficha'];?></option>

									<?php endforeach ?>

									</select>
									
								</div>
									
									<div>
										<label for="" style="color: white;">testo</label><br>
										<button type="button" class="btn btn-success" id="btn-asignar-fichas">Asignar</button>
									</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.reload();">Cerrar</button>
					</div>
				</div>
			</div>
		</div>



<!------------------------------------------ AJAX BOTON AGREGAR --------------------------------------------------->
<script type="text/javascript">
	$(document).ready(function() {
		$('#btn-guardar').click(function() {
			datos = $('#form-nuevo').serialize();

			$.ajax({
				type: "POST",
				data: datos,
				url: "../../procesos/Funcionario/agregar.php",
				// success: function(r) {
				// 	if (r == 1) {
				// 		$('#form-nuevo')[0].reset(); //codigo para limpiar el formulario
				// 		$('#tabla_Datatable').load('tabla.php')
				// 		alertify.success('Agregado con éxito');
				// 	} else {
				// 		alertify.error("Hubo un error al agregar");
						
				// 	}
				// }
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
				$('#correo_funcionario_U').val(datos['correo_funcionario_U']);
				$('#id_rol_fk_U').val(datos['id_rol_fk_U']);
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

<!------------------------------------------ AJAX BOTON ASIGNAR MATERIAS--------------------------------------------------->
<script type="text/javascript">
	$(document).ready(function() {
		$('#btn-asignar').click(function() {
			datos = $('#form-asignar').serialize();

			$.ajax({
				type: "POST",
				data: datos,
				url: "../../procesos/Funcionario/asignar.php",
				success: function(r) {
					if (r == 1) {
						$('#form-asignar')[0].reset(); //codigo para limpiar el formulario
						$('#tabla_Datatable').load('tabla.php')
						alertify.success('Asignado con éxito');
					} else {
						alertify.error("Hubo un error al asignar");
					}
				}
			});
		});
	});
</script>

<!------------------------------------------ AJAX BOTON ASIGNAR FICHAS--------------------------------------------------->
<script type="text/javascript">
	$(document).ready(function() {
		$('#btn-asignar-fichas').click(function() {
			datos = $('#form-asignar-fichas').serialize();

			$.ajax({
				type: "POST",
				data: datos,
				url: "../../procesos/Funcionario/asignarFichas.php",
				success: function(r) {
					if (r == 1) {
						$('#form-asignar-fichas')[0].reset(); //codigo para limpiar el formulario
						$('#tabla_Datatable').load('tabla.php')
						alertify.success('Asignado con éxito');
					} else {
						alertify.error("Hubo un error");
					}
				}
			});
		});
	});
</script>