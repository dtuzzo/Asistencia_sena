<?php

require_once "../../Conexion/conexion2/conexion.php";
$conexion = conexion();

$id=$_POST['IDFUNCIONARIO'];
$sql="CALL ELIMINAR_FUNCIONARIO('$id')";

echo mysqli_query($conexion,$sql);
?>