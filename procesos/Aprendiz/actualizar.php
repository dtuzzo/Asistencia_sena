<?php

require_once "../../Conexion/conexion2/conexion.php";
$conexion = conexion();

    $ID_APRENDIZ = $_POST['ID_APRENDIZ'];
	$TIPO_DOCUMENTO_APRENDIZ_U = $_POST['TIPO_DOCUMENTO_APRENDIZ_U'];
	$NUM_DOCUMENTO_APRENDIZ_U = $_POST['NUM_DOCUMENTO_APRENDIZ_U'];
	$NOMBRE_APRENDIZ_U = $_POST['NOMBRE_APRENDIZ_U'];
	$APELLIDO_APRENDIZ_U = $_POST['APELLIDO_APRENDIZ_U'];
	$CELULAR_APRENDIZ_U = $_POST['CELULAR_APRENDIZ_U'];
	$CORREO_APRENDIZ_M_U = $_POST['CORREO_APRENDIZ_M_U'];
	$CORREO_APRENDIZ_P_U = $_POST['CORREO_APRENDIZ_P_U'];
	$NUMERO_FICHA_U= $_POST['NUMERO_FICHA_U'];
	$ID_ESTADO_U= $_POST['ID_ESTADO_U'];

$sql="CALL EDITAR_APRENDIZ ('$TIPO_DOCUMENTO_APRENDIZ_U','$NUM_DOCUMENTO_APRENDIZ_U','$NOMBRE_APRENDIZ_U','$APELLIDO_APRENDIZ_U','$CELULAR_APRENDIZ_U','$CORREO_APRENDIZ_M_U','$CORREO_APRENDIZ_P_U','$ID_ESTADO_U','$NUMERO_FICHA_U')";

echo mysqli_query($conexion,$sql);
?>