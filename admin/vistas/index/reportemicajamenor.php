 <?php 
$RolSesion = $_SESSION['IdRol'];
error_reporting(E_ALL);
ini_set('display_errors', '0');

include 'vistas/index/estadisticas_cajas.php';
include_once 'controladores/reportesController.php';
include_once 'modelos/reportes.php';
include_once 'controladores/gastosController.php';
include_once 'modelos/gastos.php';
include_once 'controladores/ingresosController.php';
include_once 'modelos/ingresos.php';
include_once 'controladores/cajasController.php';
include_once 'modelos/cajas.php';
include_once 'controladores/rubrosController.php';
include_once 'modelos/rubros.php';

include_once 'controladores/subrubrosController.php';
include_once 'modelos/subrubros.php';



$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];



$IdSesionCaja = $_GET['id_caja'];


$nombrecaja=Cajas::obtenerNombreCaja($IdSesionCaja);

$inicial = Cajas::obtenerInicialpor($IdSesionCaja);
$entradascaja = Cajas::obtenerEntradaspor($IdSesionCaja);
$entradascuenta = Cajas::obtenerEntradasporcuenta($IdSesionCaja);

  $salidas = Cajas::obtenerSalidaspor($IdSesionCaja);
  $totalentrada=$inicial+$entradascaja+$entradascuenta;
  $saldofinal=$totalentrada-$salidas;


date_default_timezone_set("America/Bogota");
$totaldiasmes= date('t');
$anoactual= date('Y');
$mesactual= date('n');
$tope= $mesactual+1;
$hoy= date('d');
$ayer=$hoy-1;
$antier=$hoy-6;

$ultimos3meses=$mesactual-1;

$mesanterior=$mesactual-1;

  $primerdiames=$mesactual."/01/".$anoactual;
  $ultimodiames=$mesactual."/".$totaldiasmes."/".$anoactual;

  $primerdiamescons=$anoactual."-".$mesactual."-01";
  $ultimodiamescons=$anoactual."-".$mesactual."-".$totaldiasmes;

$fechaform=$_POST['daterange'];
$FechaInicioDia=($primerdiamescons." 00:00:000");
$FechaFinalDia=($ultimodiamescons." 23:59:000");
//echo("FECHA QUE LLEGA:".$FechaInicioDia1."<br>");

$primerdiamesanterior=$anoactual."-".$mesanterior."-01";
$ultimodiamesanterior=$anoactual."-".$mesanterior."-".$totaldiasmes;
// Fecha del Mes anterior
$InicioMesanterior=($primerdiamesanterior." 00:00:000");
$FinalMesanterior=($ultimodiamesanterior." 23:59:000");


date_default_timezone_set("America/Bogota");
$MarcaTemporal = date('Y-m-d');
$MarcaTemporalAyer = $anoactual."-".$mesactual."-".$ayer;
$MarcaTemporalAntier = $anoactual."-".$mesactual."-".$antier;


$FechaInicioDiaActual=($MarcaTemporal." 00:00:000");
$FechaFinalDiaActual=($MarcaTemporal." 23:59:000");

$FechaInicioDiaAnterior=$anoactual."-".$mesactual."-".$ayer." 00:00:0000";
$FechaFinalDiaAnterior=$anoactual."-".$mesactual."-".$ayer." 23:59:0000";

 $fecha_actual = date("d-m-Y");
$semanaantes=date("Y-m-d",strtotime($fecha_actual."- 1 week")); 
$FechaInicio7dias=$semanaantes." 00:00:0000";
$FechaFinal7dias=$anoactual."-".$mesactual."-".$hoy." 23:59:0000";

$quincedias=date("Y-m-d",strtotime($fecha_actual."- 2 week")); 
$FechaInicio15dias=$quincedias." 00:00:0000";
$FechaFinal15dias=$anoactual."-".$mesactual."-".$hoy." 23:59:0000";

$treintadias=date("Y-m-d",strtotime($fecha_actual."- 4 week")); 
$FechaInicio30dias=$treintadias." 00:00:0000";
$FechaFinal30dias=$anoactual."-".$mesactual."-".$hoy." 23:59:0000";


 ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <?php 
      $anoactual= date('Y');
      ?>
      <h1>
        Caja
        <small><?php echo ($anoactual); ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Dashboard </li>

      </ol>
    </section>
           



    <div class="col-md-6">
          <!--<div class="box box-primary collapsed-box">-->
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Histórico Caja Menor <small> Actualizado al <?php 
              date_default_timezone_set("America/Bogota");
              $TiempoActual = date('Y-m-d');
              echo(fechalarga($TiempoActual)); 
              ?></small></h3>
               
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                 
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="InformeVentas">
              
             
       <table id="tablatrituradora" class="table  table-responsive table-striped table-bordered table-hover dataTables_borderWrap" style="width: 100%;font-size: 12px;">
             
          <thead>
           
               <tr style="background-color: #4f5962;color: white;">
                <th>Movimientos caja <?php echo($anoactual); ?></th>
                <?php 
                
                 for ($i=$ultimos3meses; $i <$tope ; $i++) { 
                  setlocale(LC_ALL, 'es_ES');
          $monthNum  = $i;
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = strftime('%B', $dateObj->getTimestamp());
echo ("<th>".ucfirst($monthName."")."</th>");
                }
                 ?>
              </tr>
            </thead>
            <tbody>

            </tbody>
              <tfoot>
               <tr  class="success">
                <td><strong>Total Ingresos </strong></td>
                <?php 
                for ($i=$ultimos3meses; $i <$tope ; $i++) { 
                  $ventames1=Ingresosmesgeneral($i,$anoactual,$IdSesionCaja);
                  $sumaventas1+=$ventames1;
                  echo("<td><strong> $".number_format($ventames1,0)."</strong></td>");
                }
                 ?> 
              </tr>
               <tr  class="danger">
                 <td><strong>Total Legalizado </strong></td>
                <?php 
                for ($i=$ultimos3meses; $i <$tope ; $i++) { 
                  $ventames2=Egresosmesgeneral($i,$anoactual,$IdSesionCaja);
                  $sumaventas2+=$ventames2;
                  echo("<td><strong> $".number_format($ventames2,0)."</strong></td>");
                }
                 ?>
              </tr>
              <tr>
                 <td><strong>Pendiente por Legalizar</strong></td>
                <?php 
                for ($i=$ultimos3meses; $i <$tope ; $i++) { 
                  $ventames2=Egresosmesgeneral($i,$anoactual,$IdSesionCaja);
                  $sumaventas2+=$ventames2;
                  $ventames1=Ingresosmesgeneral($i,$anoactual,$IdSesionCaja);
                  $sumaventas1+=$ventames1;
                  $saldo=$ventames1-$ventames2;
                  echo("<td><strong> $".number_format($saldo,0)."</strong></td>");
                }
                 ?>
              </tr>
             
             
            </tfoot>
            </table>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-6">
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"></h3>
              <h3 class="widget-user-desc"><?php echo($nombrecaja); ?>
                <a href="?controller=gastos&&action=nuevo&&id_caja=<?php echo($IdSesionCaja) ?>" class="btn btn-success" style="float: right;"><i class="fa fa-file-text-o bigger-110 "></i> Subir Gasto</a>
              </h3>
            </div>
            
            <div class="box-footer">
              <div class="row">
                 <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo ("$ ".number_format($saldofinal,0)) ?></h5>
                    <span class="description-text">Saldo Actual</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo ("$ ".number_format($totalentrada,0)) ?></h5>
                    <span class="description-text">Total Ingresos</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo ("$ ".number_format($salidas,0)) ?></h5>
                    <span class="description-text">Total Legalizado</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
               
              </div>
              <!-- /.row -->
            </div>
          </div>
        </div>
        





        <div class="col-md-12">
          
              <div class="col-lg-12">
    <div class="card card-default">
      <div class="card-body">
        
      <div style="display: none;" class="clearfix">
                      <div class="pull-left tableTools-container"></div>
                    </div>
           <a id="btnrelacionar2" href="" class="btn btn-success" style="float: right; display: none; cursor: pointer;"><i class="fa fa-exchange bigger-110 "></i> Gestionar Ingresos</a>
              <div class="table-responsive mailbox-messages">
          <table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%; font-size: 13px;">
          <tfoot style="display: table-header-group;">
                                     <th style="background-color: #dff0d8" class="danger">
                                       <input type="checkbox" id="seleccionar-ingresos"> todos
                                     </th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                     <th style="background-color: #dff0d8" class="success"></th>
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    
                                    <th style="background-color: #dff0d8" class="success"></th>
                                    
                            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">
               <th>Caja Código</th>
              <th>Fecha</th>
              <th>Valor</th>
             
              <th>Caja/Cuenta</th>
              <th>Acciones</th>
            </tr>
            <tr>
                 <th></th>
               <th>Fecha</th>
               <th>Valor</th>
             
               <th>Caja/Cuenta</th>
               <th>Acciones</th>
            
            </tr>
          </thead>
          <tbody>
            <?php

$res=Ingresos::obtenerPagina($IdSesionCaja);
          $campos = $res->getCampos();
            foreach ($campos as $campo){
            $id_ingreso_caja = $campo['id_ingreso_caja'];
            $imagen = $campo['imagen'];
            $tipo_beneficiario = $campo['tipo_beneficiario'];
            $fecha_ingreso = $campo['fecha_ingreso'];
            $marca_temporal = $campo['marca_temporal'];
            $caja_ppal = $campo['caja_ppal'];
            $caja_id_caja = $campo['caja_id_caja'];
            $cuenta_id_cuenta = $campo['cuenta_id_cuenta'];
            $ingreso_por_cuentas = $campo['ingreso_por_cuentas'];

            // Validación del Soporte en Egresos de la otra caja
            if ($ingreso_por_cuentas==0) {
             $soporte=Ingresos::obtenerSoporte($caja_ppal,$marca_temporal);
            }
            else
            {
              $soporte=Ingresos::obtenerSoporteCuentaidregistro($ingreso_por_cuentas);
            }

            

            // Validación de la caja que coloca el dinero en la vista de esta caja
            if ($cuenta_id_cuenta==0) {
              $fuente=Ingresos::ObtenerNombrecaja($caja_id_caja);
            }
            else
            {
              $fuente=Ingresos::ObtenerNombrecuenta($cuenta_id_cuenta);
            }
            $valor_ingreso = $campo['valor_ingreso'];
            $observaciones = $campo['observaciones'];
            
            ?>
            <tr>
               <td id="listadoingresos"> 
                  <?php if ($RolSesion != 4) {
        ?>
           <input type="checkbox" id="<?php echo $id_ingreso_caja; ?>" name="inputdespachos2" onclick="marcardespacho2(<?php echo ($IdSesionCaja) ?>)" style="cursor: pointer;">

        <?php
        echo($id_ingreso_caja);
}?>
                </td>
             
                <td><?php echo utf8_encode($fecha_ingreso) ?></td>
                 <td><?php Echo utf8_encode("$ ".number_format($valor_ingreso));  ?></td>
              
             <td><?php echo utf8_encode($fuente) ?></td>
             
             
             
              <td>
                 <div class="btn-group">
             
             <button type="button" class="btn btn-default"> <a target="_blank" href="<?php echo($soporte); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "></i>
              </a>
            </button>
             <button type="button" class="btn btn-default"> <a download="Soporte" href="<?php echo($soporte); ?>"  class="tooltip-primary text-dark" title="Descargar Soporte">
                <i class="fa fa-cloud-download bigger-110 "></i>
              </a>
            </button>




                    </div>
             
              </td>
            </tr>
            <?php
              }
            ?>
          </tbody>
          </table>
        </div> <!-- Fin Row -->
      </div> <!-- Fin card -->
    </div>
    </div>

        </div>

        <div class="col-md-12">
              <div class="col-lg-12">
    <div class="card card-default">
      <div class="card-body">
          <!-- <a href="?controller=gastos&&action=nuevo" class="btn btn-success" style="float: right;"><i class="fa fa-file-text-o bigger-110 "></i> Crear Egreso</a> -->
          <!--  <div class="card-header">
        <h3 class="card-title">Vehiculos</h3>
      </div> -->
      <div class="clearfix">
         <a id="btnrelacionar" href="" class="btn btn-success" style="float: right; display: none; cursor: pointer;"><i class="fa fa-exchange bigger-110 "></i> Gestionar Estado</a>
                      <div class="pull-left tableTools-container2"></div>
                    </div>
              <div class="table-responsive mailbox-messages">
          <table id="cotizaciones2" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%; font-size: 13px;">
           <tfoot style="display: table-header-group;">
                                     <th style="background-color: #f2dede" class="danger">
                                       <input type="checkbox" id="seleccionar-egresos"> todos
                                     </th>
                                    <th style="background-color: #f2dede" class="danger"></th>
                                    <th style="background-color: #f2dede" class="danger"></th>
                                    <th style="background-color: #f2dede" class="danger"></th>
                                    <th style="background-color: #f2dede" class="danger"></th>
                                    <th style="background-color: #f2dede" class="danger"></th>
                                    <th style="background-color: #f2dede" class="danger"></th>
                                    <th style="background-color: #f2dede" class="danger"></th>
                                    <th style="background-color: #f2dede" class="danger"></th>                                    
                                   
                            </tfoot>
          <thead>
            <tr style="background-color: #4f5962;color: white;">
              <th></th>
              <th>Fecha</th>
              <th>Valor</th>
               <th>Equipo</th>
              <th>Beneficiario</th>
              <th>Rubro</th>
              <th>Subrubro</th>
              <th>Detalle</th>
              <th>Acciones</th>            
            </tr>
            <tr>
              <th></th>
              <th>Fecha</th>
              <th>Valor</th>
              <th>Equipo</th>
              <th>Beneficiario</th>
              <th>Rubro</th>
              <th>Subrubro</th>
              <th>Detalle</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php

          $res=Gastos::obtenerPagina($IdSesionCaja);
          $campos = $res->getCampos();
            foreach ($campos as $campo){
            $id_egreso_caja = $campo['id_egreso_caja'];
            $imagen = $campo['imagen'];
            $tipo_beneficiario = $campo['tipo_beneficiario'];
            $fecha_egreso = $campo['fecha_egreso'];
            $caja_ppal = $campo['caja_ppal'];
            $caja_id_caja = $campo['caja_id_caja'];


            if ($caja_id_caja!=0) {
              $beneficiario=Gastos::ObtenerNombrecaja($caja_id_caja);
              $id_ingreso_caja=Gastos::obtenerIdingresocajasistema($id_egreso_caja);
            }
            else
            {
              $beneficiario = $campo['beneficiario'];
            }
            
            //$beneficiario = $campo['beneficiario'];
            $id_rubro = $campo['id_rubro'];
            $id_subrubro = $campo['id_subrubro'];
            if ($id_rubro!=0) {
              $nombrerubro=Gastos::ObtenerRubropor($id_rubro);
            }
            else
            {
              $nombrerubro="";
            }
            if ($id_subrubro!=0) {
              $nombresubrubro=Gastos::ObtenersubRubropor($id_subrubro);
            }
            else
            {
               $nombresubrubro="";
            }
             $equipo_id_equipo = $campo['equipo_id_equipo'];
             if ($equipo_id_equipo==0) {
               $nomequipo="No aplica";
             }
             elseif ($equipo_id_equipo==10000) {
               $nomequipo="Otros";
             }
             else
             {
              $nomequipo=Equipos::obtenerNombreEquipo($equipo_id_equipo);
             }

            

            $valor_egreso = $campo['valor_egreso'];
            $observaciones = $campo['observaciones'];
            
            ?>
            <tr>
                 <td id="listadoegresos"> 
                  <?php if ($RolSesion != 4) {
        ?>
           <input type="checkbox" id="<?php echo $id_egreso_caja; ?>" name="inputdespachos" onclick="marcardespacho(<?php echo ($IdSesionCaja) ?>)" style="cursor: pointer;">
        <?php
}?>
                </td>
                <td><?php echo utf8_encode($fecha_egreso) ?></td>
                 <td><?php Echo utf8_encode("$ ".number_format($valor_egreso));  ?></td>
             
              <td><?php echo utf8_encode($nomequipo) ?></td>
               <td><?php echo utf8_encode($beneficiario) ?></td>
             <td><?php echo utf8_encode($nombrerubro) ?></td>  
             <td><?php echo utf8_encode($nombresubrubro) ?></td>
              <td><?php echo utf8_encode($observaciones) ?></td>
              <td>
                 <div class="btn-group">
                  
             
             <button type="button" class="btn btn-default btn-flat"> <a target="_blank" href="<?php echo($imagen); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-eye bigger-110 "></i>
              </a>
            </button>
             <button type="button" class="btn btn-default btn-flat"> <a download="Soporte" href="<?php echo($imagen); ?>"  class="tooltip-primary text-dark" title="Descargar Soporte">
                <i class="fa fa-cloud-download bigger-110 "></i>
              </a>
            </button>

             <?php 
              if ($tipo_beneficiario=='Beneficiario Externo') {
                ?>
                
            <button type="button" class="btn btn-default btn-flat"> <a href="#" onclick="eliminar(<?php echo $id_egreso_caja; ?>,<?php echo($IdSesionCaja) ?>);" class="tooltip-primary text-danger" title="Eliminar Egreso">
                <i class="fa fa-trash bigger-110 "></i>
              </a>
            </button>
                <?php
              }
              elseif ($tipo_beneficiario=='Caja Sistema') {
               ?>

                <button  type="button" class="btn btn-default btn-flat"> <a href="#" onclick="eliminarcajasistema(<?php echo $id_egreso_caja; ?>,<?php echo($id_ingreso_caja); ?>,<?php echo($IdSesionCaja); ?>);" class="tooltip-primary text-danger" title="Eliminar Egreso">
                <i class="fa fa-trash bigger-110 "></i>
              </a>
            </button>

               <?php
              }

               ?>




                    </div>
             
              </td>
             
            </tr>
            <?php
              }
            ?>
          </tbody>
          </table>
        </div> <!-- Fin Row -->
      </div> <!-- Fin card -->
    </div>
    </div>
        </div>

       </div>
  <!-- /.content-wrapper -->
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

<script>
      $(function(){
        $('#seleccionar-ingresos').change(function() {
          $('#listadoingresos > input[type=checkbox]').prop('checked', $(this).is(':checked'));
        });
      });
</script>

<script>
      $(function(){
        $('#seleccionar-egresos').change(function() {
          $('#listadoegresos > input[type=checkbox]').prop('checked', $(this).is(':checked'));
        });
      });
</script>

<script>

  function marcardespacho(id){
    var valores = document.getElementsByName("inputdespachos");
    var valoresconcant = "";
    for (i = 0; i < valores.length; i++) {
        var idelemento = valores[i].id;
        var valor = valores[i].value;
        var checked = valores[i].checked;

        if (checked==true){
          if (valoresconcant == "") {
              valoresconcant = idelemento;
          } else {
              valoresconcant = valoresconcant + "," + idelemento;
          }
        }

    }

        var btn = document.getElementById("btnrelacionar");
       

    if (valoresconcant==""){
      btn.style.display = "none";
    }else{
      btn.style.display = "";
      btn.href = "?controller=gastos&action=cambiarestado&des="+valoresconcant+"&id="+id;
    }

  }
        $(document).ready(function() {
} );
    </script>



    <script>

  function marcardespacho2(id){
    var valores = document.getElementsByName("inputdespachos2");
    var valoresconcant = "";
    for (i = 0; i < valores.length; i++) {
        var idelemento = valores[i].id;
        var valor = valores[i].value;
        var checked = valores[i].checked;

        if (checked==true){
          if (valoresconcant == "") {
              valoresconcant = idelemento;
          } else {
              valoresconcant = valoresconcant + "," + idelemento;
          }
        }

    }

        var btn = document.getElementById("btnrelacionar2");
       

    if (valoresconcant==""){
      btn.style.display = "none";
    }else{
      btn.style.display = "";
      btn.href = "?controller=ingresos&action=cambiarestado&des="+valoresconcant+"&id="+id;
    }

  }
        $(document).ready(function() {
} );
    </script>

<script>
function eliminar(id,cajasel){
   eliminar=confirm("¿Deseas eliminar este registro?");
   if (eliminar)
     window.location.href="?controller=gastos&&action=eliminargastopor&&id="+id+"&&id_caja=+"+cajasel;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido eliminar el registro...')
}
</script>

<script>
function eliminarcajasistema(idegreso,idingreso,cuentasel){
   eliminar=confirm("¿Deseas eliminar este registro?");
   
   if (eliminar)  
  window.location.href="?controller=gastos&&action=eliminarcajasistemapor&&idegreso="+idegreso+"&&idingreso="+idingreso+"&&id_caja="+cuentasel+"";

else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido eliminar el registro...')
}
</script>

<!-- page script -->
<script>
   function format2(n, currency) {
    return currency + " " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}
        $(document).ready(function() {
    $('#example').DataTable( {
         "searching": true,
        "ordering": true,
        "paging":   true,
        "info":     true,
        "aLengthMenu": [[100, 200, 300, -1], [100, 200, 300, "Todas"]],
    "pageLength": 100,
       
       
    } );
} );
    </script>

<script type="text/javascript">
      jQuery(function($) {
      
$('#cotizaciones thead tr:eq(1) th').each( function () {
        var title = $('#cotizaciones thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder="Buscar '+title+'" />' );
    } ); 
  
    var table = $('#cotizaciones').DataTable({
      responsive:true,
      "order": true,
      "lengthChange": false,
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
        $('#cotizaciones thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();    
        });
    });

        var myTable = 
        $('#cotizaciones')
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
          
          //"bProcessing": true,
              //"bServerSide": true,
              //"sAjaxSource": "http://127.0.0.1/table.php" ,
      
          //,
          
          //"sScrollXInner": "120%",
          //"bScrollCollapse": true,
          //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
          //you may want to wrap the table inside a "div.dataTables_borderWrap" element
      
          //"iDisplayLength": 50

      
          } );
      
        
    

        
        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
        
        new $.fn.dataTable.Buttons( myTable, {
         buttons: [
           
           
            {
            "extend": "csv",
            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
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
        
      
      
      })
    </script>
   <script type="text/javascript">
      jQuery(function($) {
      
$('#cotizaciones2 thead tr:eq(1) th').each( function () {
        var title = $('#cotizaciones2 thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input style="width:100%;border:black solid 1px;" type="text" placeholder="Buscar '+title+'" />' );
    } ); 
  
    var table = $('#cotizaciones2').DataTable({
      responsive:true,
      "order": true,
      "lengthChange": false,
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
        $('#cotizaciones2 thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();    
        });
    });

        var myTable = 
        $('#cotizaciones2')
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
          
          //"bProcessing": true,
              //"bServerSide": true,
              //"sAjaxSource": "http://127.0.0.1/table.php" ,
      
          //,
          
          //"sScrollXInner": "120%",
          //"bScrollCollapse": true,
          //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
          //you may want to wrap the table inside a "div.dataTables_borderWrap" element
      
          //"iDisplayLength": 50

      
          } );
      
        
    

        
        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
        
        new $.fn.dataTable.Buttons( myTable, {
         buttons: [
           
           
            {
            "extend": "csv",
            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'></span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
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
        myTable.buttons().container().appendTo( $('.tableTools-container2') );
        
     
      
        setTimeout(function() {
          $($('.tableTools-container2')).find('a.dt-button').each(function() {
            var div = $(this).find(' > div').first();
            if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
            else $(this).tooltip({container: 'body', title: $(this).text()});
          });
        }, 500);
        
        
        
        
        
        
      
      
        
      
        /********************************/
        //add tooltip for small view action buttons in dropdown menu
        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
        
        //tooltip placement on right or left
        function tooltip_placement(context, source) {
          var $source = $(source);
          var $parent = $source.closest('table')
          var off1 = $parent.offset();
          var w1 = $parent.width();
      
          var off2 = $source.offset();
          //var w2 = $source.width();
      
          if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
          return 'left';
        }
        
        
        
        
        /***************/
        $('.show-details-btn').on('click', function(e) {
          e.preventDefault();
          $(this).closest('tr').next().toggleClass('open');
          $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
        });
        /***************/
    
      
      })
    </script>