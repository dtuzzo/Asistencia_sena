<?php

require_once "../../Conexion/conexion2/conexion.php";
$conexion = conexion();

$id = $_POST['idasistencia'];

$sql = "CALL ObtenerRegistrosAsistencia($id)";

$result=mysqli_query($conexion,$sql);

$mostrar=mysqli_fetch_row($result);

$datos = array(
				'id_asistencia' => $mostrar[0],
);

echo json_encode($datos);
?>