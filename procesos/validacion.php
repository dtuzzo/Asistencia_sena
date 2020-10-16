<?php
session_start();
$_SESION['error'] = '';

require('../Conexion/conexion.php');
$obj = new conectar();
$conexion = $obj->conexion();
        
$registros = mysqli_query($conexion, "SELECT  numerodocumento_funcionario, clave_funcionario FROM funcionario WHERE numerodocumento_funcionario='$_REQUEST[cedula]' AND clave_funcionario='$_REQUEST[contrasena]'") or
    die("Problemas en el Select:" . mysqli_error($conexion));

if ($reg = mysqli_fetch_array($registros)) {
    header("location: ../Vista/menu.php");
} else {
    $_SESSION['error'] = 'Error prueba';
    header("location: ../index.php");
}