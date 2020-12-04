<?php

require('../Conexion/conexion.php');
$obj = new conectar();
$conexion = $obj->conexion();

    $instructor = $conexion->query("SELECT id_funcionario, numerodocumento_funcionario, nombre_funcionario, apellido_funcionario, celular_funcionario, clave_funcionario, id_rol_fk FROM funcionario WHERE numerodocumento_funcionario='$_REQUEST[cedula]' AND clave_funcionario='$_REQUEST[contrasena]' AND id_rol_fk = 1");

    $coordinador = $conexion->query("SELECT id_funcionario, numerodocumento_funcionario, nombre_funcionario, apellido_funcionario, celular_funcionario, clave_funcionario, id_rol_fk FROM funcionario WHERE numerodocumento_funcionario='$_REQUEST[cedula]' AND clave_funcionario='$_REQUEST[contrasena]' AND id_rol_fk = 2");

if (mysqli_num_rows($instructor) > 0) {
    $row = $instructor -> fetch_array(MYSQLI_NUM);
    session_start(['cookie_lifetime' => 86400]);
    $_SESSION['datos_instructor'] = $row;
    header("location: ../Vista/menu2.php");
    exit();
} else if (mysqli_num_rows($coordinador) > 0){
    $row = $coordinador -> fetch_array(MYSQLI_NUM);
    session_start(['cookie_lifetime' => 86400]);
    $_SESSION['datos_coordinador'] = $row;
    header("location: ../Vista/menu.php");
    exit();
}else { 
    header("location: ../index.php");
}