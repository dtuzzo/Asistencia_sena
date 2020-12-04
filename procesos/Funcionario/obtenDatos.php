<?php

require_once "../../Conexion/conexion2/conexion.php";
$conexion = conexion();

$id = $_POST['idfuncionario'];

$sql = "CALL ObtenerRegistrosFuncionario ($id)";

$result=mysqli_query($conexion,$sql);

$mostrar=mysqli_fetch_row($result);

$datos = array(
				'id_funcionario' => $mostrar[0],
				'numerodocumento_funcionario_U' => $mostrar[1],
				'nombre_funcionario_U' => $mostrar[2],
				'apellido_funcionario_U' => $mostrar[3],
				'celular_funcionario_U' => $mostrar[4],
				'correo_funcionario_U' => $mostrar[5],
				'id_rol_fk_U' => $mostrar[6],
);

echo json_encode($datos);
?>