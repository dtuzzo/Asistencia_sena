<?php

require_once "../../Conexion/conexion2/conexion.php";
$conexion = conexion();

  $tipodocumento_aprendiz= $_POST['tipodocumento_aprendiz'];
  $numerodocumento_aprendiz= $_POST['numerodocumento_aprendiz'];
  $nombre_aprendiz= $_POST['nombre_aprendiz'];
  $apellido_aprendiz= $_POST['apellido_aprendiz'];
  $celular_aprendiz= $_POST['celular_aprendiz'];
  $correosena_aprendiz= $_POST['correosena_aprendiz'];
  $correopersonal_aprendiz= $_POST['correopersonal_aprendiz'];

  $sql = "CALL INSERTAR_APRENDIZ ('$tipodocumento_aprendiz','$numerodocumento_aprendiz','$nombre_aprendiz','$apellido_aprendiz','$celular_aprendiz','$correosena_aprendiz','$correopersonal_aprendiz','$_REQUEST[id_estado_fk]','$_REQUEST[id_ficha_fk]')";


echo mysqli_query($conexion,$sql);
?>


