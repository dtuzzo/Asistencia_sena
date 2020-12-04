<?php 
    require_once "../../Conexion/conexion.php"; 
    
    $obj = new conectar();
    $conexion = $obj->conexion();

    $id_funcionario_P = $_POST['id_funcionario'];
    $id_nombre_P = $_POST['id_nombre_P'];
    $id_apellido_P = $_POST['id_apellido_P'];
    $id_celular_P = $_POST['id_celular_P'];
    $id_contra_P = $_POST['id_contra_P'];

    $conexion -> query("CALL ACTUALIZAR_PERFIL_FUNCIONARIO ('$id_funcionario_P','$id_nombre_P','$id_apellido_P','$id_celular_P','$id_contra_P')");
    $conexion -> close();

    header("Location: perfil.php");
?>