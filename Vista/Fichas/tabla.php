<?php 

require_once "../../Conexion/conexion.php"; 
$obj = new conectar();
$conexion = $obj->conexion();
session_start();
if (isset($_SESSION['datos_instructor'])){
    $datos = $_SESSION['datos_instructor'];

} else if (isset($_SESSION['datos_coordinador'])){
    $datos = $_SESSION['datos_coordinador'];
}

$sql = "SELECT * FROM VISTA_ASISTENCIA WHERE fecha_registro = CURDATE() AND id_funcionario_fk = $datos[0]";
$result = mysqli_query($conexion,$sql);

?>

<div>
    <table class="table table-hover table-condensed table-bordered" id="id_datatable">
        <thead style="background-color: #005f60; color: white; font-weigth: bold;">
            <tr>
         
                <td>Aprendiz</td>
                <td>Funcionario</td>
                <td>Materia</td>
                <td>Situacion</td>
                <td>Asignar</td>
            </tr>
        </thead>
               <tbody>
            <?php
                while ($mostrar = mysqli_fetch_row($result)) {
            ?>
            <tr>
           
                <td><?php echo $mostrar[1].' '.$mostrar[2] ?></td>
                <td><?php echo $mostrar[4].' '.$mostrar[5] ?></td>
                <td><?php echo $mostrar[6] ?></td>
                <td><?php echo $mostrar[7] ?></td>
 
                
                <td style="text-align: center;">
                    <span class="btn btn-success btn-sm" data-toggle="modal" data-target="#Modal-editar-fichas" onclick="obtenDatos('<?php echo $mostrar[0]; ?>')" >
                        <span class="fas fa-plus"></span>
                    </span>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#id_datatable').DataTable({
            //$('#id_datatable').css( 'display', 'block' );
            //"autoWidth": false
            aLengthMenu: [
           [35, 50, 100, 200],
           [35, 50, 100, 200]
            ],
       
            //scrollY:        "300px",
            scrollX:        true,
            //scrollCollapse: true,
            //paging:         false,
            columnDefs: [
                { width: '20%', targets: 0 }
            ],
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
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
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