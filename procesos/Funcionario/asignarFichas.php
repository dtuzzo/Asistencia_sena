<?php

require_once "../../Conexion/conexion2/conexion.php";
$conexion = conexion();
    
    $sql = "INSERT INTO detalle_ficha_funcionario VALUES (null,'$_REQUEST[id_ficha]','$_REQUEST[id_funcionario]')";

echo mysqli_query($conexion,$sql);

?>