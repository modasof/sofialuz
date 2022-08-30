                  <div class="card card-default">
      <div class="card-body">
      <div class="clearfix">
                      <div class="pull-left tableTools-container"></div>
                    </div>
              <div class="table-responsive mailbox-messages">
    <table id="tableordenest" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 12px;">
           <tfoot style="display: table-header-group;">
                                     <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                     <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>


                                   <th style="background-color: #dff0d8" class="success"></th>
                                   <th style="background-color: #dff0d8" class="success"></th>



                            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">
              <th>Orden</th>
              <th>Estado</th>
              <th>Valor</th>
              <th>Fecha Reporte</th>

              <th>Equipo</th>

              <th>Reportado por</th>
              <th>Mecánico</th>
               <th>Mantenimiento</th>
              <th>Problema Presentado</th>
               <th>Repuestos</th>
              <th>Solución</th>


            </tr>
            <tr>
               <th>Orden</th>
               <th>Estado</th>
                <th>Valor</th>
             <th>Fecha Reporte</th>

              <th>Equipo</th>

              <th>Reportado por</th>
               <th>Mecánico</th>
               <th>Mantenimiento</th>
              <th>Problema Presentado</th>
               <th>Repuestos</th>
              <th>Solución</th>


            </tr>
          </thead>
          <tbody>
            <?php
$res         = Historicoeq::ordenestrabajomes($getequipo, $table_mes, $anoactual);
$movimientos = $res->getCampos();
foreach ($movimientos as $mov) {
    $id_reporte       = $mov['id_reporte'];
    $equipo_id_equipo = $mov['equipo_id_equipo'];
    $creado_por       = $mov['creado_por'];
    $fecha_reporte    = $mov['fecha_reporte'];
    $fecha_reparado   = $mov['fecha_reparado'];
    $estado_reporte   = $mov['estado_reporte'];
    $problema         = $mov['problema'];
    $num_salida_inv   = $mov['num_salida_inv'];
    $actividad        = $mov['actividad'];
    $repuesto         = $mov['repuesto'];
    $valor_reporte    = $mov['valor_reporte'];
    $mecanico_id      = $mov['mecanico_id'];
    $mantenimiento_id = $mov['mantenimiento_id'];

    $nombreq             = Equipos::obtenerNombreEquipo($equipo_id_equipo);
    $idpropietario       = Equipos::obtenerPropietarioEquipo($equipo_id_equipo);
    $nompropietario      = Propietarios::obtenerNombre($idpropietario);
    $nombrereporta       = Usuarios::obtenerNombreUsuario($creado_por);
    $nombremecanico      = Usuarios::obtenerNombreUsuario($mecanico_id);
    $nombremantemimiento = Tipomantenimiento::obtenerNombre($mantenimiento_id);
    ?>
             <tr>
            <td><?php echo utf8_decode("OT-00" . $id_reporte); ?></td>
            <td>
                <?php
if ($estado_reporte == '1') {
        echo ("<span class='label label-danger'>Asignado</span>");
    } elseif ($estado_reporte == '2') {
        echo ("<span class='label label-danger'>Acualizado por Mecanico</span>");
    } elseif ($estado_reporte == '3') {
        echo ("<span class='label label-success'>Terminado</span>");
    }

    ?>
            </td>
            <td><?php echo utf8_decode("$" . number_format($valor_reporte, 0)); ?></td>
            <td><?php echo utf8_decode($fecha_reporte); ?></td>

            <td><?php echo utf8_decode($nombreq); ?></td>

            <td><?php echo utf8_decode($nombrereporta); ?></td>
            <td><?php echo utf8_decode($nombremecanico); ?></td>
            <td><?php
if ($mantenimiento_id != 0) {
        echo htmlspecialchars_decode($nombremantemimiento);
    } else {
        echo ("Falla Reportada");
    }

    ?></td>
            <td><?php echo utf8_decode($problema); ?></td>
            <td><?php echo utf8_decode($repuesto); ?></td>
            <td><?php echo utf8_decode($actividad); ?></td>
            </tr>
            <?php
}
?>
          </tbody>
          </table>
        </div> <!-- Fin Row -->
      </div> <!-- Fin card -->
    </div>

    <script type="text/javascript">
      jQuery(function($) {

$('#tableordenest thead tr:eq(1) th').each( function () {
        var title = $('#tableordenest thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder="Buscar '+title+'" />' );
    } );

    var table = $('#tableordenest').DataTable({
        responsive:true,
      "ordering": true,
        "order": [[ 1, "asc" ]],
        orderCellsTop: true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se ha encontrado nada - Lo sentimos",
            "info": "Mostrar página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
           },


    "lengthMenu": [[5000, 7000, 10000, -1], [5000, 7000, 10000, "All"]],

          select: {
            style: 'multi'
          },
          "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };


            // Total over all pages


            pageTotal6 = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );



             $( api.column( 2 ).footer() ).html(
                ''+formatmoneda(pageTotal6,'' )
            );

        },


    });

    // Apply the search
    table.columns().every(function (index) {
        $('#tableordenest thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });
    });

        var myTable =
        $('#tableordenest')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( {
retrieve: true,


          "aoColumns": [
            { "bSortable": false },
            null, null,null, null,null,null,null,null, null,null, null,null,null,null,null, null,null, null,null,null,null,
            { "bSortable": false }
          ],
          "aaSorting": [],
          "scrollX": true,


          } );





        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

        new $.fn.dataTable.Buttons( myTable, {
         buttons: [

            {

            "extend": "excelHtml5",
            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"

            },
            {

            "extend": "pdf",
            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            orientation: 'landscape',
                     pageSize: 'LEGAL',
            },
            {
            "extend": "print",
            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold",
            autoPrint: true,
            message: 'Está impresión se produjo desde la App'
            }
          ]
        } );
        myTable.buttons().container().appendTo( $('.tableTools-container') );


        setTimeout(function() {
          $($('.tableTools-container')).find('a.dt-button').each(function() {
            var div = $(this).find(' > div').first();
            if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
            else $(this).tooltip({container: 'body', title: $(this).text()});
          });
        }, 500);


      })
    </script>