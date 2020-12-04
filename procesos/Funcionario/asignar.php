<?php



require_once "../../Conexion/conexion2/conexion.php";
$conexion = conexion();
    
    //$id_materia = $_POST['id_materia'];
    //$id_funcionario = $_POST['id_funcionario'];

    $sql = "INSERT INTO detalle_materia_funcionario VALUES (null,'$_REQUEST[id_materia]','$_REQUEST[id_funcionario]')";

echo mysqli_query($conexion,$sql);

?>