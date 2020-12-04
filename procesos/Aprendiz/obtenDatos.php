<?php

require_once "../../Conexion/conexion2/conexion.php";
$conexion = conexion();

$id = $_POST['id_aprendiz'];

$sql = "CALL ObtenerRegistrosAprendiz ($id)";

$result=mysqli_query($conexion,$sql);

$mostrar=mysqli_fetch_row($result);

$datos = array(
				'id_aprendiz' => $mostrar[0],
				'tipodocumento_aprendiz_U' => $mostrar[1],
				'numerodocumento_aprendiz_U' => $mostrar[2],
				'nombre_aprendiz_U' => $mostrar[3],
				'apellido_aprendiz_U' => $mostrar[4],
				'celular_aprendiz_U' => $mostrar[5],
				'correosena_aprendiz_U' => $mostrar[6],
				'correopersonal_aprendiz_U' => $mostrar[7],
				'id_estado_fk_U' => $mostrar[8],
				'id_ficha_fk_U' => $mostrar[9]
);

echo json_encode($datos);
?>