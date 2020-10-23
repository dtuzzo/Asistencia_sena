<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Perfil</title>
    <link rel="stylesheet" href="../../assets/css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<?php

include '../header.php';

$Nombre = "Daniel";
$Apellido = "Tuzzo";
$Celular = "3224127792";
$Contraseña = "Dtuzzo33";

?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-left">
                    <div class="card-header" style="text-align: center;">
                        My Perfil
                    </div>
                    <div class="card-body">

                        <h1>Datos</h1>
                        <label>Nombre</label>
                        <br>
                        <input type="text" class="col-md-3" value="<?php echo '' . $Nombre ?>" disabled>
                        <br><br>
                        <label>Apellido</label>
                        <br>
                        <input type="text" class="col-md-3" value="<?php echo '' . $Apellido ?>" disabled>
                        <br><br>
                        <label>Celular</label>
                        <br>
                        <input type="text" class="col-md-3" value="<?php echo '' . $Celular ?>" disabled>
                        <br><br>

                        <form id="form1">
                            <div class="container">
                                <div class="row">
                                    <label>Contraseña</label>
                                    <div class="input-group">
                                        <input class="col-md-3" ID="txtPassword" type="Password" value="<?php echo '' . $Contraseña ?>" Class="form-control" disabled>
                                        <div class="input-group-append">
                                            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br>
                        <span class="btn btn-primary" data-toggle="modal" data-target="#Modal-editar">
                            Actualizar <i class="bx bxs-edit-alt"></i>
                        </span>

                    </div>
                    <div class="card-footer text-muted">
                        <div style="text-align: center;"> &copy; SENA. All Rights Reserved </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------------------------------------------Modal Actualizar------------------------------------------------------------------->
    <div class="modal fade" id="Modal-editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-actualizar">
                        <input type="text" hidden="" id="id_funcionario" name="id_funcionario">
                        <label>Cédula</label>
                        <input type="text" class="form-control input-sm" id="numerodocumento_funcionario_U" name="numerodocumento_funcionario_U">
                        <label>Nombre</label>
                        <input type="text" class="form-control input-sm" id="nombre_funcionario_U" name="nombre_funcionario_U">
                        <label>Apellido</label>
                        <input type="text" class="form-control input-sm" id="apellido_funcionario_U" name="apellido_funcionario_U">
                        <label>Celular</label>
                        <input type="text" class="form-control input-sm" id="celular_funcionario_U" name="celular_funcionario_U">
                        <label>Contraseña</label>
                        <input type="text" class="form-control input-sm" id="clave_funcionario_U" name="clave_funcionario_U">
                        <label>Rol</label>
                        <input type="text" class="form-control input-sm" id="id_rol_fk_U" name="id_rol_fk_U">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-warning" id="btn-actualizar">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<!------------------------------ AJAX BOTON ACTUALIZAR ------------------------------------------------------------>
<script type="text/javascript">
    $(document).ready(function() {
        $('#btn-actualizar').click(function() {
            datos = $('#form-actualizar').serialize();

            $.ajax({
                type: "POST",
                data: datos,
                url: "../../procesos/Funcionario/actualizar.php",
                success: function(r) {
                    if (r == 1) {
                        $('#tabla_Datatable').load('tabla.php')
                        alertify.success('Actualizado con éxito');
                    } else {
                        alertify.error("Hubo un error");
                    }
                }
            });
        });
    });
</script>

<!------------------------------- AJAX OBTENER DATOS -------------------------------------------------------------->
<script type="text/javascript">
    function obtenDatos(idfuncionario) {
        $.ajax({
            type: "POST",
            data: "idfuncionario=" + idfuncionario,
            url: "../../procesos/Funcionario/obtenDatos.php",
            success: function(r) {
                datos = jQuery.parseJSON(r);
                $('#id_funcionario').val(datos['id_funcionario']);
                $('#numerodocumento_funcionario_U').val(datos['numerodocumento_funcionario_U']);
                $('#nombre_funcionario_U').val(datos['nombre_funcionario_U']);
                $('#apellido_funcionario_U').val(datos['apellido_funcionario_U']);
                $('#celular_funcionario_U').val(datos['celular_funcionario_U']);
                $('#clave_funcionario_U').val(datos['clave_funcionario_U']);
                $('#id_rol_fk_U').val(datos['id_rol_fk_U']);
            }
        });
    }
</script>

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