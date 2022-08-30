                              <div class="card card-default">
      <div class="card-body">
      <div class="clearfix">
                      <div class="pull-left tableTools-container-km"></div>
                    </div>
              <div class="table-responsive mailbox-messages">
    <table id="tablekm" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 12px;">
           <tfoot style="display: table-header-group;">
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
              <th><i class="fa fa-edit"></i></th>
              <th>Fecha</th>
              <th>Equipo</th>
              <th>Hr/Km Total</th>
              <th>Reportado por</th>
              <th>Operado por</th>
              <th>Observaciones</th>
            </tr>
            <tr>
              <th><i class="fa fa-edit"></i></th>
              <th>Fecha</th>
              <th>Equipo</th>
              <th>Hr/Km Total</th>
              <th>Reportado por</th>
              <th>Operado por</th>
              <th>Observaciones</th>
            </tr>
          </thead>
          <tbody>
            <?php

$res    = Historicoeq::kminformepormes($getequipo, $table_mes, $anoactual);
$campos = $res->getCampos();
foreach ($campos as $campo) {
    $id            = $campo['id'];
    $fecha_reporte = $campo['fecha_reporte'];
    $valor_m3          = $campo['valor_m3'];
    $cantidad          = $campo['cantidad'];
    $indicador         = $campo['indicador'];
    $hora_inactiva     = $campo['hora_inactiva'];
    $creado_por        = $campo['creado_por'];
    $despachado_por    = $campo['despachado_por'];
    $recibido_por      = $campo['recibido_por'];
    $estado_reporte    = $campo['estado_reporte'];
    $reporte_publicado = $campo['reporte_publicado'];
    $tipo_despacho     = $campo['tipo_despacho'];
    $punto_despacho    = $campo['punto_despacho'];
    $marca_temporal    = $campo['marca_temporal'];
    $observaciones     = $campo['observaciones'];
    $equipo_id_equipo  = $campo['equipo_id_equipo'];
    $nomequipo         = Equipos::obtenerNombreEquipo($equipo_id_equipo);
    $nomdespachador    = Usuarios::obtenerNombreUsuario($creado_por);
    $nomreportador     = Funcionarios::obtenerNombreFuncionario($recibido_por);
    $ventatotal        = $cantidad * $valor_m3;
    ?>
        <tr>
              <td><?php echo ($id) ?></td>
              <td><?php echo ($fecha_reporte) ?></td>
              <td><?php echo ($nomequipo) ?></td>
              <td><?php echo ($hora_inactiva) ?></td>
              <td><?php echo utf8_encode($nomdespachador); ?></td>
              <td><?php echo utf8_encode($nomreportador); ?></td>
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

$('#tablekm thead tr:eq(1) th').each( function () {
        var title = $('#tablekm thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder="Buscar '+title+'" />' );
    } );

    var table = $('#tablekm').DataTable({
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


            
              pageTotal3 = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
           
          
           
             // Update footer
           
          

              $( api.column( 3 ).footer() ).html(
                ''+formatmoneda(pageTotal3,'' )
            );  

              

        },


    });

    // Apply the search
    table.columns().every(function (index) {
        $('#tablekm thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });
    });

        var myTable =
        $('#tablekm')
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
        myTable.buttons().container().appendTo( $('.tableTools-container-km') );


        setTimeout(function() {
          $($('.tableTools-container-km')).find('a.dt-button').each(function() {
            var div = $(this).find(' > div').first();
            if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
            else $(this).tooltip({container: 'body', title: $(this).text()});
          });
        }, 500);


      })
    </script>