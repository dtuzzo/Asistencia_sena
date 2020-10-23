<?php

require_once "../../Conexion/conexion2/conexion.php";
$conexion = conexion();

$id=$_POST['IDAPRENDIZ'];
$sql="CALL ELIMINAR_APRENDIZ('$id')";

echo mysqli_query($conexion,$sql);
?>