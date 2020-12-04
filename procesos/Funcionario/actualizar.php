<?php

require_once "../../Conexion/conexion2/conexion.php";
$conexion = conexion();

    $ID_FUNCIONARIO = $_POST['id_funcionario'];
	$NUMERO_DE_DOCUMENTO_U = $_POST['numerodocumento_funcionario_U'];
	$NOMBRE_FUNCIONARIO_U = $_POST['nombre_funcionario_U'];
	$APELLIDO_FUNCIONARIO_U = $_POST['apellido_funcionario_U'];
	$CELULAR_FUNCIONARIO_U = $_POST['celular_funcionario_U'];
	$Correo_funcionario_U = $_POST['correo_funcionario_U'];
	$id_rol_fk_U = $_POST['id_rol_fk_U'];

$sql="CALL ACTUALIZAR_FUNCIONARIO('$NUMERO_DE_DOCUMENTO_U','$NOMBRE_FUNCIONARIO_U','$APELLIDO_FUNCIONARIO_U','$CELULAR_FUNCIONARIO_U','$Correo_funcionario_U','$id_rol_fk_U','$ID_FUNCIONARIO')";

echo mysqli_query($conexion,$sql);
?>