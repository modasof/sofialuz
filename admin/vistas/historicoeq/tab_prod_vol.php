                              <div class="card card-default">
      <div class="card-body">
      <div class="clearfix">
                      <div class="pull-left tableTools-container-pdv"></div>
                    </div>
              <div class="table-responsive mailbox-messages">
    <table id="tableprodvol" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 12px;">
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
             
              
            </tfoot>
          <thead>
             <tr style="background-color: #4f5962;color: white;">

              <th>Rm.</th>
              <th>Vr. Flete</th>
              <th>Vr. Material</th>
              <th>Total</th>
              <th>m3</th>
              <th>Origen</th>
              <th>Destino</th>
              <th>Fecha Despacho </th>
              <th>Cliente</th>
              <th>Trans.</th>
              <th>Placa</th>
              <th>Cond</th>
              <th>Material</th>
             
            </tr>
            <tr>
              <th>Rm.</th>
              <th>Vr. Flete</th>
              <th>Vr. Material</th>
              <th>Total</th>
              <th>m3</th>
              <th>Origen</th>
              <th>Destino</th>
              <th>Fecha Despacho </th>
              <th>Cliente</th>
              <th>Trans.</th>
              <th>Placa</th>
              <th>Cond</th>
              <th>Material</th>
              
            </tr>
          </thead>
          <tbody>
            <?php

$res    = Historicoeq::prodvolinformepormes($getequipo, $table_mes, $anoactual);
$campos = $res->getCampos();
foreach ($campos as $campo) {
    $id                       = $campo['id'];
    $campamento_id_campamento = $campo['campamento_id_campamento'];
    $id_destino_origen        = $campo['id_destino_origen'];
    $id_destino_destino       = $campo['id_destino_destino'];
    $imagen                   = $campo['imagen'];
    $fecha_reporte            = $campo['fecha_reporte'];
    $cliente_id_cliente       = $campo['cliente_id_cliente'];
    $producto_id_producto     = $campo['producto_id_producto'];
    $valor_m3                 = $campo['valor_m3'];
    $valor_material           = $campo['valor_material'];
    $cantidad                 = $campo['cantidad'];
    $kilometraje              = $campo['kilometraje'];
    $viajes                   = $campo['viajes'];
    $transporte               = $campo['transporte'];
    $despachado_por           = $campo['despachado_por'];
    $radicada                 = $campo['radicada'];
    $remision                 = $campo['remision'];
    $fecha_radicada           = $campo['fecha_radicada'];
    $factura                  = $campo['factura'];
    $pagado                   = $campo['pagado'];
    $creado_por               = $campo['creado_por'];
    $estado_reporte           = $campo['estado_reporte'];
    $reporte_publicado        = $campo['reporte_publicado'];
    $marca_temporal           = $campo['marca_temporal'];
    $observaciones            = $campo['observaciones'];
    $equipo_id_equipo         = $campo['equipo_id_equipo'];
    $nomprod                  = Productos::obtenerNombreProducto($producto_id_producto);
    $nomdest1                 = Destinos::obtenerNombreDestino($id_destino_origen);
    $nomdest2                 = Destinos::obtenerNombreDestino($id_destino_destino);
    $nomcli                   = Clientes::obtenerNombreCliente($cliente_id_cliente);
    $nomconductor             = Usuarios::obtenerNombreUsuario($despachado_por);
    $nomequipo                = Equipos::obtenerNombreEquipo($equipo_id_equipo);
    $ventatotal               = $valor_m3 + $valor_material;

    ?>
            <tr>
            <td>
                <?php echo ($remision) ?>
               <a target="_blank" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "> Ver Soporte</i>
              </a>
               <a download="Soporte" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-dark" title="Descargar Soporte">
                <i class="fa fa-cloud-download bigger-110 "> Descargar</i>
                </a>
            </td>
            <td><?php echo utf8_encode("$" . number_format($valor_m3, 0)); ?></td>
            <td><?php echo utf8_encode("$" . number_format($valor_material, 0)); ?></td>
            <td><?php echo utf8_encode("$" . number_format($ventatotal, 0)); ?></td>
            <td><?php echo utf8_encode($cantidad); ?></td>
            <td><i class="text-success">  </i> <?php echo ($nomdest1); ?></td>
            <td><i class="text-danger"> </i> <?php echo ($nomdest2); ?></td>
            <td><?php echo ($fecha_reporte) ?></td>
            <td><?php echo utf8_encode($nomcli); ?></td>
            <td><?php echo utf8_encode($transporte); ?></td>
            <td><?php echo utf8_encode($nomequipo); ?></td>
            <td><?php echo utf8_encode($nomconductor); ?></td>
            <td><?php echo utf8_encode($nomprod); ?></td>
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

$('#tableprodvol thead tr:eq(1) th').each( function () {
        var title = $('#tableprodvol thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder="Buscar '+title+'" />' );
    } );

    var table = $('#tableprodvol').DataTable({
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
                .column( 1, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            pageTotal10 = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

             pageTotal14 = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

              pageTotal15 = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

             // Update footer

              $( api.column( 1 ).footer() ).html(
                ''+formatmoneda(pageTotal5,'' )
            );

               $( api.column( 2 ).footer() ).html(
                ''+formatmoneda(pageTotal10,'' )
            );

                $( api.column( 3 ).footer() ).html(
                ''+formatmoneda(pageTotal14,'' )
            );
                 $( api.column( 4 ).footer() ).html(
                ''+formatmoneda(pageTotal15,'' )
            );


        },


    });

    // Apply the search
    table.columns().every(function (index) {
        $('#tableprodvol thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });
    });

        var myTable =
        $('#tableprodvol')
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
        myTable.buttons().container().appendTo( $('.tableTools-container-pdv') );


        setTimeout(function() {
          $($('.tableTools-container-pdv')).find('a.dt-button').each(function() {
            var div = $(this).find(' > div').first();
            if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
            else $(this).tooltip({container: 'body', title: $(this).text()});
          });
        }, 500);


      })
    </script>