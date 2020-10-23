<?php

require_once "../../Conexion/conexion2/conexion.php";
$conexion = conexion();

  $numero= $_POST['numerodocumento_funcionario'];
  $nombre=  $_POST['nombre_funcionario'];
  $apellido= $_POST['apellido_funcionario'];
  $celular= $_POST['celular_funcionario'];
  $contrasena=  $_POST['clave_funcionario'];

  $sql = "CALL INSERTAR_FUNCIONARIO ('$numero','$nombre','$apellido','$celular','$contrasena','$_REQUEST[id_rol_fk]')";

echo mysqli_query($conexion,$sql);

?>