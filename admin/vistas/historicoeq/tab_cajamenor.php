                              <div class="card card-default">
      <div class="card-body">
      <div class="clearfix">
                      <div class="pull-left tableTools-container-cm"></div>
                    </div>
              <div class="table-responsive mailbox-messages">
    <table id="tablecajamenor" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 12px;">
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
            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">
              <th>Id</th>
              <th>Fecha</th>
              <th>Valor</th>
              <th>Tipo Egreso</th>
              <th>Equipo</th>
              <th>NIT/CC</th>
              <th>Beneficiario</th>
              <th>Subrubro</th>
              <th>Detalle</th>
              <th>Registrado por</th>
            </tr>
            <tr>
              <th>Id</th>
              <th>Fecha</th>
              <th>Valor</th>
              <th>Tipo Egreso</th>
              <th>Equipo</th>
              <th>NIT/CC</th>
              <th>Beneficiario</th>
              <th>Subrubro</th>
              <th>Detalle</th>
              <th>Registrado por</th>
            </tr>
          </thead>
          <tbody>
            <?php

$res    = Historicoeq::cajamenorinformepormes($getequipo, $table_mes, $anoactual);
$campos = $res->getCampos();
foreach ($campos as $campo) {
    $id_egreso_caja    = $campo['id_egreso_caja'];
    $imagen            = $campo['imagen'];
    $tipo_beneficiario = $campo['tipo_beneficiario'];
    $fecha_egreso      = $campo['fecha_egreso'];
    $caja_ppal         = $campo['caja_ppal'];
    $caja_id_caja      = $campo['caja_id_caja'];
    $identificacion    = $campo['identificacion'];
    $equipo_id_equipo  = $campo['equipo_id_equipo'];
    $valor_egreso      = $campo['valor_egreso'];
    $observaciones     = $campo['observaciones'];

    $nombrecajappal = Gastos::ObtenerNombrecaja($caja_ppal);
    if ($caja_id_caja != 0) {
        $beneficiario    = Gastos::ObtenerNombrecaja($caja_id_caja);
        $id_ingreso_caja = Gastos::obtenerIdingresocajasistema($id_egreso_caja);
    } else {
        $beneficiario = $campo['beneficiario'];
    }
    //$beneficiario = $campo['beneficiario'];
    $id_rubro    = $campo['id_rubro'];
    $id_subrubro = $campo['id_subrubro'];
    if ($id_rubro != 0) {
        $nombrerubro = Gastos::ObtenerRubropor($id_rubro);
    } else {
        $nombrerubro = "";
    }
    if ($id_subrubro != 0) {
        $nombresubrubro = Gastos::ObtenersubRubropor($id_subrubro);
    } else {
        $nombresubrubro = "";
    }

    if ($equipo_id_equipo == 0) {
        $nomequipo = "No aplica";
    } elseif ($equipo_id_equipo == 10000) {
        $nomequipo = "Otros";
    } else {
        $nomequipo = Equipos::obtenerNombreEquipo($equipo_id_equipo);
    }

    ?>
            <tr>
              <td><?php echo utf8_encode($id_egreso_caja) ?>
                <br>
                 <a target="_blank" href="<?php echo ($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "></i>
              </a>
              </td>
              <td><?php echo utf8_encode($fecha_egreso) ?></td>
              <td><?php echo utf8_encode("$" . number_format($valor_egreso)); ?></td>
              <td><?php echo utf8_encode($tipo_beneficiario) ?></td>
              <td><?php echo utf8_encode($nomequipo) ?></td>
              <td><?php echo utf8_encode($identificacion) ?></td>
              <td><?php echo utf8_encode($beneficiario) ?></td>
              <td><?php echo utf8_encode($nombresubrubro) ?></td>
              <td><?php echo utf8_encode($observaciones) ?></td>
              <td><?php echo ($nombrecajappal); ?></td>
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

$('#tablecajamenor thead tr:eq(1) th').each( function () {
        var title = $('#tablecajamenor thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder="Buscar '+title+'" />' );
    } );

    var table = $('#tablecajamenor').DataTable({
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



             pageTotal7 = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
           
             // Update footer
           
             // Update footer
            $( api.column( 2 ).footer() ).html(
                '$'+format2(pageTotal7,'' )
            );  


        },


    });

    // Apply the search
    table.columns().every(function (index) {
        $('#tablecajamenor thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });
    });

        var myTable =
        $('#tablecajamenor')
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
        myTable.buttons().container().appendTo( $('.tableTools-container-cm') );


        setTimeout(function() {
          $($('.tableTools-container-cm')).find('a.dt-button').each(function() {
            var div = $(this).find(' > div').first();
            if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
            else $(this).tooltip({container: 'body', title: $(this).text()});
          });
        }, 500);


      })
    </script>