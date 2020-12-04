<?php

require_once "../../Conexion/conexion2/conexion.php";
$conexion = conexion();

    $Id_asistencia = $_POST['id_asistencia'];
    $tipo_asistencia = $_POST['tipo_asistencia_U'];
    

$sql="CALL ACTUALIZAR_ASISTENCIA ('$Id_asistencia','$tipo_asistencia')";


echo mysqli_query($conexion,$sql);
?>