<?php

require_once "../../Conexion/conexion2/conexion.php";
$conexion = conexion();

	$tipodocumento_aprendiz_U= $_POST['tipodocumento_aprendiz_U'];
	$numerodocumento_aprendiz_U = $_POST['numerodocumento_aprendiz_U'];
	$nombre_aprendiz_U = $_POST['nombre_aprendiz_U'];
	$apellido_aprendiz_U = $_POST['apellido_aprendiz_U'];
	$celular_aprendiz_U = $_POST['celular_aprendiz_U'];
	$correosena_aprendiz_U = $_POST['correosena_aprendiz_U'];
	$correopersonal_aprendiz_U = $_POST['correopersonal_aprendiz_U'];
	$id_aprendiz= $_POST['id_aprendiz'];
	$id_estado_fk_U= $_POST['id_estado_fk_U'];
	$id_ficha_fk_U= $_POST['id_ficha_fk_U'];

$sql="CALL ACTUALIZAR_APRENDIZ('$tipodocumento_aprendiz_U','$numerodocumento_aprendiz_U','$nombre_aprendiz_U','$apellido_aprendiz_U','$celular_aprendiz_U','$correosena_aprendiz_U','$correopersonal_aprendiz_U','$id_aprendiz','$id_estado_fk_U','$id_ficha_fk_U')";

// CALL ACTUALIZAR_APRENDIZ('T.I',1001191862,'EEEEEEE','RRRRRR',1234567,'prueba@misena.edu.co','prueba@hotmail.com',1,1,1);
echo mysqli_query($conexion,$sql);
?>