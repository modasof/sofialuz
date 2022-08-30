                              <div class="card card-default">
      <div class="card-body">
      <div class="clearfix">
                      <div class="pull-left tableTools-container-pdm"></div>
                    </div>
              <div class="table-responsive mailbox-messages">
    <table id="tableprodmaq" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 12px;">
           <tfoot style="display: table-header-group;">
               <th style="background-color: #fcf8e3" class="success"></th>
                <th style="background-color: #fcf8e3" class="success"></th>
                <th style="background-color: #fcf8e3" class="success"></th>
                <th style="background-color: #fcf8e3" class="success"></th>
                <th style="background-color: #fcf8e3" class="success"></th>
                <th style="background-color: #fcf8e3" class="success"></th>
                <th style="background-color: #fcf8e3" class="success"></th>
                <th style="background-color: #fcf8e3" class="success"></th>
                <th style="background-color: #fcf8e3" class="success"></th>
                <th style="background-color: #fcf8e3" class="success"></th>
                <th style="background-color: #fcf8e3" class="success"></th>
                <th style="background-color: #fcf8e3" class="success"></th>
                <th style="background-color: #fcf8e3" class="success"></th>
                <th style="background-color: #fcf8e3" class="success"></th>
            </tfoot>
    <thead>
        <tr style="background-color: #4f5962;color: white;">
            <th style="width: 8%;"><i class="fa fa-edit"></i></th>
            <th>Fecha</th>
            <th >Equipo</th>
            <th >Vr. Hora</th>
            <th >Vr. Operador</th>
            <th >Total Horas</th>
            <th >Total Venta</th>
            <th >Total Operador</th>
            <th >Adicional</th>
            <th >Equipo</th>
            <th>Operado por</th>
            <th>Cliente</th>
            <th>Proyecto</th>
            <th>Observaciones</th>
        </tr>
           <tr style="background-color: #4f5962;color: white;">
            <th style="width: 8%;"><i class="fa fa-edit"></i></th>
            <th>Fecha</th>
            <th >Equipo</th>
            <th >Vr. Hora</th>
            <th >Vr. Operador</th>
            <th >Total Horas</th>
            <th >Total Venta</th>
            <th >Total Operador</th>
            <th >Adicional</th>
            <th >Equipo</th>
            <th>Operado por</th>
            <th>Cliente</th>
            <th>Proyecto</th>
            <th>Observaciones</th>
        </tr>
          </thead>
          <tbody>
            <?php

$res    = Historicoeq::prodhorasinformepormes($getequipo, $table_mes, $anoactual);
$campos = $res->getCampos();
foreach ($campos as $campo) {
    $id                      = $campo['id'];
    $fecha_reporte           = $campo['fecha_reporte'];
    $imagen                  = $campo['imagen'];
    $valor_m3                = $campo['valor_m3'];
    $valor_hora_operador     = $campo['valor_hora_operador'];
    $cantidad                = $campo['cantidad'];
    $indicador               = $campo['indicador'];
    $hora_inactiva           = $campo['hora_inactiva'];
    $creado_por              = $campo['creado_por'];
    $despachado_por          = $campo['despachado_por'];
    $recibido_por            = $campo['recibido_por'];
    $estado_reporte          = $campo['estado_reporte'];
    $reporte_publicado       = $campo['reporte_publicado'];
    $tipo_despacho           = $campo['tipo_despacho'];
    $punto_despacho          = $campo['punto_despacho'];
    $marca_temporal          = $campo['marca_temporal'];
    $observaciones           = $campo['observaciones'];
    $aplica_pago             = $campo['aplica_pago'];
    $cliente_id_cliente      = $campo['cliente_id_cliente'];
    $equipo_adicional        = $campo['equipo_adicional'];
    $nombre_equipo_adicional = $campo['nombre_equipo_adicional'];
    $proyecto_id_proyecto    = $campo['proyecto_id_proyecto'];

    $equipo_id_equipo = $campo['equipo_id_equipo'];
    $nomequipo        = Equipos::obtenerNombreEquipo($equipo_id_equipo);
    $nomdespachador   = Funcionarios::obtenerNombreFuncionario($despachado_por);
    $nomreportador    = usuarios::obtenerNombreUsuario($recibido_por);
    $nombrecliente    = Clientes::obtenerNombreCliente($cliente_id_cliente);
    $nombreproyecto   = Proyectos::obtenerNombreProyecto($proyecto_id_proyecto);

    $totaloperador = $hora_inactiva * $valor_hora_operador;
    $ventatotal    = $hora_inactiva * $valor_m3;

    if ($aplica_pago == 0) {
        $pago = "<span data-toggle='tooltip' title='' class='badge bg-red' data-original-title='" . $marca_temporal . "'>N/A</span>";
    } else {
        $pago = "<span data-toggle='tooltip' title='' class='badge bg-green' data-original-title='" . $marca_temporal . "'>OK</span>";
    }

    ?>
            <tr>
              <td>
              <a target="_blank" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "></i>
              </a>
                <a download="Soporte" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-dark" title="Descargar Soporte">
                <i class="fa fa-cloud-download bigger-110 "></i>
                </a>
              </td>
            <td><?php echo ($fecha_reporte) ?></td>
            <td><?php echo ($nomequipo) ?></td>
            <td><?php echo ("$" . number_format($valor_m3)) ?></td>
            <td><?php echo ("$" . number_format($valor_hora_operador)) ?></td>
            <td><?php echo ($hora_inactiva) ?></td>
            <td><?php echo ("$" . number_format($ventatotal)) ?></td>
            <td><?php echo ("$" . number_format($totaloperador)) ?></td>
            <td><?php echo utf8_encode($equipo_adicional); ?></td>
            <td><?php echo utf8_encode($nombre_equipo_adicional); ?></td>
            <td><?php echo utf8_encode($nomreportador); ?></td>
            <td><?php echo utf8_encode($nombrecliente); ?></td>
            <td><?php echo utf8_encode($nombreproyecto); ?></td>
            <td><?php echo utf8_encode($observaciones); ?></td>

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

$('#tableprodmaq thead tr:eq(1) th').each( function () {
        var title = $('#tableprodmaq thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder="Buscar '+title+'" />' );
    } );

    var table = $('#tableprodmaq').DataTable({
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



           pageTotal5 = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

           pageTotal6 = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            pageTotal7 = api
                .column( 7, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );


                $( api.column( 5 ).footer() ).html(
                ''+formatmoneda(pageTotal5,'' )
            );

                   $( api.column( 6 ).footer() ).html(
                '$'+formatmoneda(pageTotal6,'' )
            );

   $( api.column( 7 ).footer() ).html(
                '$'+formatmoneda(pageTotal7,'' )
            );


        },


    });

    // Apply the search
    table.columns().every(function (index) {
        $('#tableprodmaq thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });
    });

        var myTable =
        $('#tableprodmaq')
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
        myTable.buttons().container().appendTo( $('.tableTools-container-pdm') );


        setTimeout(function() {
          $($('.tableTools-container-pdm')).find('a.dt-button').each(function() {
            var div = $(this).find(' > div').first();
            if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
            else $(this).tooltip({container: 'body', title: $(this).text()});
          });
        }, 500);


      })
    </script>