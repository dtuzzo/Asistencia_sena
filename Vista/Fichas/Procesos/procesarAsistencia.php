<?php 
    require_once "../../../Conexion/conexion.php"; 
    $obj = new conectar();
    $conexion = $obj->conexion();

    session_start();
    if (isset($_SESSION['datos_instructor'])){
        $datos = $_SESSION['datos_instructor'];
    
    } else if (isset($_SESSION['datos_coordinador'])){
        $datos = $_SESSION['datos_coordinador'];
    }

    $id_ficha = $_POST['id_ficha'];

    $sql = "SELECT * FROM APRENDIZ where id_ficha_fk = ".$id_ficha;
    $result = mysqli_query($conexion,$sql);
    foreach($result as $opciones): 
        $sql = "INSERT INTO ASISTENCIA VALUES (null, CURDATE(), null, '$opciones[id_aprendiz]', '$datos[0]','$_REQUEST[id_materia]', '$_REQUEST[id_ficha]');";
        echo mysqli_query($conexion,$sql);
    endforeach;
    header("Location: ../Fichas.php");
?>