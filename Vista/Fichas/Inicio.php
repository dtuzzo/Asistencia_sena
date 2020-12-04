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
if (isset($_SESSION['datos_instructor'])){
    $datos = $_SESSION['datos_instructor'];

} else if (isset($_SESSION['datos_coordinador'])){
    $datos = $_SESSION['datos_coordinador'];
}

?>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header" style="text-align: center;">
						Asistencia
					</div>
					<div class="form-row p-5">
						<div class="col-sm float-left">
						<form action="Procesos/procesarAsistencia.php" method="POST">

							<label class=""> Ficha
							<select name="id_ficha" class="col-md form-control">
							<?php 
							
							require_once "../../Conexion/conexion.php"; 
							$obj = new conectar();
							$conexion = $obj->conexion();

							$sql = "SELECT * FROM VISTA_FICHAS_FUNCIONARIO where id_funcionario_fk = ".$datos[0];
							$result = mysqli_query($conexion,$sql);
							
							?>

							<?php foreach($result as $opciones):?>

								<option value="<?php echo $opciones['id_ficha_fk']?>"><?php echo $opciones['numero_ficha']?></option>

							<?php endforeach ?>

							</select>
							</label>
							
						</div>
						<div class="col-sm float-right">
						
							<label class=""> Materia <br> 
							<select name="id_materia" class="col-md form-control">
							<?php 
							
							require_once "../../Conexion/conexion.php"; 

							$sql2 = "SELECT * FROM VISTA_MATERIAS where id_funcionario_fk = ".$datos[0];
							$result2 = mysqli_query($conexion,$sql2);
							
							?>

							<?php foreach($result2 as $opciones2):?>

								<option value="<?php echo $opciones2['id_materia_fk']?>"><?php echo $opciones2['nombre_materia']?></option>

							<?php endforeach ?>

							</select>
							</label>
			
						</div>
						<div class="col-sm mt-4">
							<input class="btn btn-md btn-info" type="submit" value="Iniciar Asistencia">
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>