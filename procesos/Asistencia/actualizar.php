<?php

require_once "../../Conexion/conexion2/conexion.php";
$conexion = conexion();

    $ID_REGISTRO = $_POST['id_asistencia'];
	$SITUACION_U = $_POST['tipo_asistencia_U'];

$sql="CALL ACTUALIZAR_ASISTENCIA ('$SITUACION_U','$ID_REGISTRO')";

echo mysqli_query($conexion,$sql);
?>