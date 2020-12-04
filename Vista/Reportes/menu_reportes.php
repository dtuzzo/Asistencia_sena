<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Asistencia</title>
	<?php require_once "scripts.php"?>
	<link rel="stylesheet" href="../../assets/css/style2.css">
</head>

<?php

include '../header.php';
if (isset($_SESSION['datos_instructor'])){
    $datos = $_SESSION['datos_instructor'];

} else if (isset($_SESSION['datos_coordinador'])){
    $datos = $_SESSION['datos_coordinador'];
}

$conexion = new mysqli('localhost','root','','asistenciasena')
	or die("Problemas con la conexion");

$query = $conexion -> query("SELECT id_ficha, numero_ficha FROM FICHA;");
$querys = $conexion -> query("SELECT id_ficha, numero_ficha FROM FICHA;");
$queryss = $conexion -> query("SELECT * FROM VISTA_FICHAS_FUNCIONARIO where id_funcionario_fk = ".$datos[0]);

?>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header" style="text-align: center;">
						Reportes
					</div>

					<div class="card-body">
						<hr>
						<div id="tabla_Datatable">
							<div class="container border bg-light m-auto pt-4 pb-2 d-flex justify-content-center form-row">
								<form class="form-group" action="reporte_funcionarios.php" target="_blank">
									<label>Funcionarios Registrados</label>
									<input type="submit" value="Consultar" class="btn btn-info btn-sm ml-2">
								</form>
							</div><br>
							<div class="container border bg-light m-auto pt-4 pb-3 d-flex justify-content-center form-row">
								<form target="_blank" method="post" action="reporte_aprendices.php">
									<label class="form-group">Aprendices Registrados</label>
									<select name="ficha">
										<option class="form-group" disabled>Escoja un ficha</option>
									<?php 
										while ($valores = mysqli_fetch_array($query)) {
											echo '<option class="form-group" value="'.$valores[0].'">'.$valores[1].'</option>';
										}
									?>
									</select>
									<input class="form-group btn btn-info btn-sm ml-2 mt-2" type="submit" value="Consultar">
								</form>
							</div><br>
							<div class="container border bg-light m-auto pt-4 pb-3 d-flex justify-content-center form-row">
								<form target="_blank" method="post" action="reporte_inasistencias.php">
									<label class="form-group">Inasistencias</label>
									<select name="ficha2">
										<option class="form-group" disabled>Escoja un ficha</option>
										<?php foreach($queryss as $resultados):?>

											<option value="<?php echo $resultados['id_ficha_fk']?>"><?php echo $resultados['numero_ficha']?></option>

										<?php endforeach ?>
									</select>
									<input class="form-group btn btn-info btn-sm ml-2 mt-2" type="submit" value="Consultar">
								</form>
							</div>
							<br>
							<div class="container border bg-light m-auto pt-4 pb-3 d-flex justify-content-center form-row">
								<form method="post" action="Vista_Inasistencia.php">
									<label class="form-group">Control inasistencias</label>
									<select name="ficha3">
										<option class="form-group" disabled>Escoja un ficha</option>
										<?php foreach($queryss as $resultados):?>

											<option value="<?php echo $resultados['id_ficha_fk']?>"><?php echo $resultados['numero_ficha']?></option>
											
										<?php endforeach ?>
									</select>
									<input class="form-group btn btn-info btn-sm ml-2 mt-2" type="submit" value="Consultar">
								</form>

							</div>
						</div>
						<hr>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>