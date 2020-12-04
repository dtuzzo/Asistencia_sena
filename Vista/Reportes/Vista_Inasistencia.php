<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Aprendiz</title>
	<?php require_once "scripts.php" ?>
	<link rel="stylesheet" href="../../assets/css/style2.css">
</head>

<?php
include '../header.php';
?>


<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header" style="text-align: center;">
						Control de inasistencias
					</div>
					<div class="card-body">

						<hr>
						<!-- <div id="tabla_Datatable"></div> -->

                        <?php
                        $dato_ficha = $_POST['ficha3'];

                        require_once "../../Conexion/conexion.php"; 
                        $obj = new conectar();
                        $conexion = $obj->conexion();

                        $sql = "SELECT * FROM VISTA_INASISTENCIAS_AA WHERE id_ficha = ".$dato_ficha.";";
                        $result = mysqli_query($conexion,$sql);

                        ?>

                        <div>
                            <table class="table table-hover table-condensed table-bordered" id="id_datatable">
                                <thead style="background-color: #005f60; color: white; font-weigth: bold;">
                                    <tr>
                                        <td>Número de ficha</td>
                                        <td>Nombre y Apellido</td>
                                        <td>Numero de inasistencias</td>
                                        <td>Reportar</td>
                                    </tr>
                                </thead>
                                    <tbody>
                                    <?php
                                        while ($mostrar = mysqli_fetch_row($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $mostrar[0] ?></td>
                                        <td><?php echo $mostrar[1]." ".$mostrar[2]?></td>
                                        <td><?php echo $mostrar[3] ?></td>

                                        <td style="text-align: center;">
                                            <!-- <span class="btn btn-danger btn-sm" onclick="window.location.href='menu_reportes.php'"> -->
                                            <span id="span-enviar" class="btn btn-danger btn-sm" onclick="EnviarCorreo('<?php echo $mostrar[5]; ?>')">
                                                <span class="fas fa-paper-plane"></span>
                                            </span>
                                        </td>
                                        
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!------------------------------ FORMATO DATATABLE ---------------------------------------------------------------->
<script type="text/javascript">
	$(document).ready(function() { //Codigo para abir un documento jQuery
		$('#tabla_Datatable').load('control_inasistencia.php')
	});
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#id_datatable').DataTable({
            //$('#id_datatable').css( 'display', 'block' );
            //"autoWidth": false
           
            //scrollY:        "300px",
            // scrollX:        true,
            //scrollCollapse: true,
            //paging:         false,
            // columnDefs: [
            //     { width: '20%', targets: 0 }
            // ],
            //fixedColumns: true
       
            //CODIGO PARA BOTONES DE EXPORTAR EN: PDF, CSV Y EXCEL
            
            /*dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],*/
            
            language:{
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de TOTAL registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de MAX registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            }
        });
    } );
</script>

<script type="text/javascript">
	function EnviarCorreo(correosena_aprendiz) {
		$.ajax({
			type: "POST",
			data: "correosena_aprendiz=" + correosena_aprendiz,
			url: "../../librerias/PHPMailer/mensaje_report.php"
		});
        Swal.fire({
            icon: 'success',
            title: 'Correo enviado',
        });
	}
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script> 
$(document).ready(function() { function uParty() { document.getElementById('botonEnviar').disabled = false; } }); </script>