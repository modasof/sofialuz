<?php 
include_once 'modelos/cajas.php';
include_once 'controladores/cajasController.php';
 ?>
<script src='https://cdn.plot.ly/plotly-latest.min.js'></script>
<!-- DataTables -->
  <!-- <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.css"> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2"> 
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Vista General</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active">Cajas</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
    <!-- /.content-header -->

     <!-- Display the pie chart -->
    <div id="piechart"></div>
 
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
    <div class="col-lg-12">
    <div class="card card-default">
      <div class="card-body">

         
      <div class="clearfix">
                      
                    </div>
              <div class="table-responsive mailbox-messages">
          <table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%">
          <thead>
            <tr style="background-color: #4f5962;color: white;">
              
              <th>Nombre Caja</th>
               <th>Saldo </th>
                <th>Entradas</th>
                  <th>Salidas</th>
               <th>Accion</th>
              
              
            </tr>
            <tr>
               
               <th>Nombre Caja</th>
               <th>Saldo </th>
                <th>Entradas</th>
                  <th>Salidas</th>
              <th>Accion</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $hostname = "localhost";
            $username = "u234527735_sofialuz";
            $password = "Teksystem@900710285";
            $database = "u234527735_sofialuz";
            $conexion = new mysqli($hostname, $username, $password, $database);

            $select="SELECT * FROM cajas where usuario_id_usuario='".$_SESSION['IdUser']."' order by id_caja desc";
      
            $select_us=$conexion->query($select);

           while ($caja = $select_us->fetch_assoc()){
              
            //ingresos de caja
            $ing_ca="SELECT SUM(valor_ingreso) as 'ingrcaja' FROM ingresos_caja where caja_ppal='".$caja['id_caja']."' ";
      
            $ingre=$conexion->query($ing_ca);
            $ingresos_caja = $ingre->fetch_assoc();
            //ingreso de cuenta
            $egre="SELECT SUM(valor_egreso) as 'egreso' FROM egresos_caja where caja_ppal='".$caja['id_caja']."' ";
      
            $egreso=$conexion->query($egre);
            $egreso_caja = $egreso->fetch_assoc();
            //total
            $saldo = $caja['saldo_inicial'] + $ingresos_caja['ingrcaja'] - $egreso_caja['egreso'];
        
            ?>
            <tr>
              
              <td><?php echo $caja['nombre_caja']; ?></td>
              <td><?php
                echo utf8_encode("$ ".number_format($saldo));
               ?>
                 
               </td>
               <td><?php echo utf8_encode("$ ".number_format($ingresos_caja['ingrcaja'])); ?></td>
               <td><?php
               if ($egreso_caja['egreso'] == '') {
                 echo "0";
               }else{
                echo utf8_encode("$ ".number_format($egreso_caja['egreso'])); 
              }
                ?></td>
                <td> 
                  <button type="button" class="btn btn-default"> <a href="?controller=cajas&&action=grafica&&id_caja=<?php echo $id_caja; ?>" class="" title="Ver Grafica">
                <img src="images/grafi.png" width="15">
              </a>
            </button>
                </td>
            </tr>
          <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop<?php echo $caja['id_caja']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Resultado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $caja['id_caja']; ?>
       <?php 
       //banco
       $ban="SELECT SUM(valor_egreso) as 'banco' FROM egresos_caja where caja_ppal='".$caja['id_caja']."' && id_rubro='1' ";
      
            $ban=$conexion->query($ban);
            $t_banco = $ban->fetch_assoc();

            if ($t_banco['banco'] > '0') {
             echo "BANCO: ". utf8_encode("$ ".number_format($t_banco['banco']))."<br>";
            }else{

              echo "BANCO: 0.00<br>";
            }
           
            
       //comunicacion
        $com="SELECT SUM(valor_egreso) as 'comunicacion' FROM egresos_caja where caja_ppal='".$caja['id_caja']."' && id_rubro='2' ";
      
            $comu=$conexion->query($com);
            $t_comu = $comu->fetch_assoc();

            if ($t_comu['comunicacion'] > '0') {
              echo "Comunicacion, Transporte y Otros: ". utf8_encode("$ ".number_format($t_comu['comunicacion'])). "<br>";
            }else{
              echo "Comunicacion, Transporte y Otros: 0.00<br>";
            }

            //equipos
           
        $eq="SELECT SUM(valor_egreso) as 'equipo' FROM egresos_caja where caja_ppal='".$caja['id_caja']."' && id_rubro='3' ";
      
            $equi=$conexion->query($eq);
            $t_equi = $equi->fetch_assoc();

            if ($t_equi['equipo'] > '0') {
              echo "Equipos: ". utf8_encode("$ ".number_format($t_equi['equipo'])). "<br>";
            }else{
              echo "Equipos: 0.00<br>";
            }
             //gasto 
        $ga="SELECT SUM(valor_egreso) as 'gasto' FROM egresos_caja where caja_ppal='".$caja['id_caja']."' && id_rubro='4' ";
      
            $gast=$conexion->query($ga);
            $t_gas = $gast->fetch_assoc();

            if ($t_gas['gasto'] > '0') {
              echo "Gastos Administrativo: ". utf8_encode("$ ".number_format($t_gas['gasto'])). "<br>";
            }else{
              echo "Gastos Administrativo: 0.00<br>";
            }

             //materiales
        $m="SELECT SUM(valor_egreso) as 'materiales' FROM egresos_caja where caja_ppal='".$caja['id_caja']."' && id_rubro='5' ";
      
            $mat=$conexion->query($m);
            $t_mat = $mat->fetch_assoc();

            if ($t_mat['materiales'] > '0') {
              echo "Materiales y Suministro: ". utf8_encode("$ ".number_format($t_mat['materiales'])). "<br>";
            }else{
              echo "Materiales y Suministro: 0.00<br>";
            }

             //movimiento
        $mo="SELECT SUM(valor_egreso) as 'movimiento' FROM egresos_caja where caja_ppal='".$caja['id_caja']."' && id_rubro='6' ";
      
            $mov=$conexion->query($mo);
            $t_mov = $mov->fetch_assoc();

            if ($t_mov['movimiento'] > '0') {
              echo "Movimientos Financieros: ". utf8_encode("$ ".number_format($t_mov['movimiento'])). "<br>";
            }else{
              echo "Movimientos Financieros: 0.00<br>";
            }
         
        $t_eqresos= $t_mov['movimiento'] + $t_mat['materiales'] + $t_gas['gasto'] + $t_equi['equipo'] + $t_comu['comunicacion'] + $t_banco['banco'];

        echo "Total: ". utf8_encode("$ ".number_format($t_eqresos));
       
          $p_ban = ($t_banco['banco']/$t_eqresos)*100;
          $p_com = ($t_comu['comunicacion'] / $t_eqresos) * 100;
          $p_equ = ($t_equi['equipo'] / $t_eqresos) * 100;
          $p_gas = ($t_gas['gasto'] / $t_eqresos) * 100;
          $p_mat = ($t_mat['materiales'] / $t_eqresos) * 100;
          $p_mov = ($t_mov['movimiento'] / $t_eqresos) * 100;
       ?>
<div id='myDiv'></div>
       <script>
        //porcentaje
  /*var ban = $p_ban;
  var com = $p_com;
  var equi = $p_equ;
  var gas = $p_gas;
  var mat = $p_mat;
  var mov = $p_mov

  var data = [{
  values: [20, 20, 20, 20, 10, 10],
  labels: [Banco, Comunicación y Transporte, Equipos, Gastos Administrativo, Materiales y Suministro, Moviminetos Financieros],
  type: 'pie'
}];*/
var data = [{
  values: [19, 26, 55],
  labels: ['Residential', 'Non-Residential', 'Utility'],
  type: 'pie'
}];

var layout = {
  height: 400,
  width: 500
};

Plotly.newPlot('myDiv', data, layout);

</script>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

            <?php
              } 
            ?>
          </tbody>
          </table>
          
        </div> <!-- Fin Row -->
      </div> <!-- Fin card -->
    </div>
    </div>
 

      </div> <!-- Fin Row -->
    </div> <!-- Fin Container -->
  </div> <!-- Fin Content -->
</div> <!-- Fin Content-Wrapper -->



        


<script>
  var ban =  $res_ban['t_banco'];
  var resi= 'Residential';
  var non= 'Non-Residential';
  var utl= 'Utility';
  var data = [{
  values: [ban, 26, 55],
  labels: [resi, non, utl],
  type: 'pie'
}];

var layout = {
  height: 400,
  width: 500
};

Plotly.newPlot('myDiv', data, layout);

</script>

<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
          <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
         <script src="dist/js/buttons.colVis.min.js"></script>
          <script src="dist/js/buttons.print.min.js"></script>
           <script src="dist/js/dataTables.select.min.js"></script>
           <script src="dist/js/buttons.flash.min.js"></script>


<!-- page script -->
<script>
  $(function () {
    $('#cotizaciones33').DataTable({
      "paging": true,
      "lengthChange": true,
      "lengthMenu": [[25, 50, 150, -1], [25, 50, 150, "All"]],
      "searching": true,
      "order": [[ 0, "asc" ]],
      "ordering": true,
      "info": true,
      "autoWidth": false,
    language: {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
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
    }
}

    });
  });
</script>
