<!DOCTYPE html>
<html lang="es-mx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    <link rel="stylesheet" href="../../assets/css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<?php

include '../header.php';

if (isset($_SESSION['datos_instructor'])){
    $datos = $_SESSION['datos_instructor'];

} else if (isset($_SESSION['datos_coordinador'])){
    $datos = $_SESSION['datos_coordinador'];
}

require('../../Conexion/conexion.php');
$obj = new conectar();
$conexion = $obj->conexion();

$sql = $conexion->query("SELECT id_funcionario, numerodocumento_funcionario, nombre_funcionario, apellido_funcionario, celular_funcionario, clave_funcionario, id_rol_fk FROM funcionario WHERE id_funcionario = ".$datos[0]);
$row = $sql -> fetch_array(MYSQLI_NUM);

?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-left">
                    <div class="card-header bg-light" style="text-align: center;">
                        Mi Perfil
                    </div>
                    <div class="card-body">
                    <hr>
                        <div>
                           <h1 align="center">Datos de mi Perfil</h1>
                        <div><br>
                        <form action="actualizarPerfil.php" method="post">
                            <div class="menu-i float-left" style="margin-left: 250px;">
                            <input hidden="" name="id_funcionario" type="text" class="col-md form-control" value="<?php echo '' . $row[0]; ?>">    
                                <label>Nombre</label>
                                <br>
                                <input name="id_nombre_P" type="text" class="col-md form-control" value="<?php echo '' . $row[2]; ?>">
                                <br><br>
                                <label>Celular</label>
                                <br>
                                <input name="id_celular_P" type="text" class="col-md form-control" value="<?php echo '' . $row[4] ?>">
                                <br><br>
                            </div>
                            <div class="menu-d float-right" style="margin-right: 250px;">
                                <label>Apellido</label>
                                <br>
                                <input name="id_apellido_P" type="text" class="col-md form-control" value="<?php echo '' . $row[3]; ?>">
                                <br><br>
                                <div style="width: 200px;" class="container">
                                    <div class="row">
                                        <label class="">Contraseña</label>
                                        <br>
                                        <div class="input-group">
                                            <input name="id_contra_P" class="col-md form-control" ID="txtPassword" type="Password" value="<?php echo '' . $row[5]; ?>">
                                            <div class="input-group-append">
                                                <button id="show_password" class="btn btn-primary btn-sm" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" value="Actualizar" class="btn btn-primary bx bxs-edit-alt form-control mt-3">
                        </form><br>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</body>

<!------------------------------- Ocultar contraseña -------------------------------------------------------------->

<script type="text/javascript">
    function mostrarPassword() {
        var cambio = document.getElementById("txtPassword");
        if (cambio.type == "password") {
            cambio.type = "text";
            $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        } else {
            cambio.type = "password";
            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    }
</script>

</html>