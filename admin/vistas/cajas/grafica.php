<?php
$campos = $campos->getCampos();
foreach ($campos as $campo){

	$id_caja = $campo['id_caja'];
	$nombre_caja=$campo['nombre_caja'];
	$saldo_inicial=$campo['saldo_inicial'];
	$usuario_id_usuario = $campo['usuario_id_usuario'];
	$marca_temporal=$campo['marca_temporal'];
	$estado_caja=$campo['estado_caja'];
	$caja_publicada=$campo['caja_publicada'];
	$creada_por=$campo['creada_por'];
	$observaciones=$campo['observaciones'];
	
}

$hostname = "localhost";
$username = "u234527735_sofialuz2021"; //
$password = "Teksystem@80761478"; //
$database = "u234527735_sofialuz2021";
$conexion = new mysqli($hostname, $username, $password, $database);

# Datos de tabla informativa de los ingresos, salidas, ultimo ingreso y salto total
//ingresos de caja
$ing_ca="SELECT SUM(valor_ingreso) as 'ingrcaja' FROM ingresos_caja where caja_ppal='$id_caja' ";
$ingre=$conexion->query($ing_ca);
$ingresos_caja = $ingre->fetch_assoc();

//ultimo ingreso'57'
$ing_ca="SELECT *,MAX(fecha_ingreso) FROM ingresos_caja WHERE caja_ppal='$id_caja'";
$ingre=$conexion->query($ing_ca);
$ultimo_ingreso = $ingre->fetch_assoc();

//ingreso de cuenta
$egre="SELECT SUM(valor_egreso) as 'egreso' FROM egresos_caja where caja_ppal='$id_caja' ";
$egreso=$conexion->query($egre);
$egreso_caja = $egreso->fetch_assoc();

//total
$saldo = $ingresos_caja['ingrcaja'] - $egreso_caja['egreso'];

# Datos de la tabla informativa por rubros de los egresos por rubro.
// Banco
$ban="SELECT SUM(valor_egreso) as 'banco' FROM egresos_caja where caja_ppal='$id_caja' && id_rubro='1' "; 
$ban=$conexion->query($ban);
$t_banco = $ban->fetch_assoc();           
    
//comunicacion
$com="SELECT SUM(valor_egreso) as 'comunicacion' FROM egresos_caja where caja_ppal='$id_caja' && id_rubro='2' ";
$comu=$conexion->query($com);
$t_comu = $comu->fetch_assoc();

//equipos
$eq="SELECT SUM(valor_egreso) as 'equipo' FROM egresos_caja where caja_ppal='$id_caja' && id_rubro='3' ";
$equi=$conexion->query($eq);
$t_equi = $equi->fetch_assoc();

//gasto 
$ga="SELECT SUM(valor_egreso) as 'gasto' FROM egresos_caja where caja_ppal='$id_caja' && id_rubro='4' ";
$gast=$conexion->query($ga);
$t_gas = $gast->fetch_assoc();

//materiales
$m="SELECT SUM(valor_egreso) as 'materiales' FROM egresos_caja where caja_ppal='$id_caja' && id_rubro='5' ";
$mat=$conexion->query($m);
$t_mat = $mat->fetch_assoc();

//movimiento
$mo="SELECT SUM(valor_egreso) as 'movimiento' FROM egresos_caja where caja_ppal='$id_caja' && id_rubro='6' ";
$mov=$conexion->query($mo);
$t_mov = $mov->fetch_assoc();
// total de egresos de rubros
$t_eqresos= $t_mov['movimiento'] + $t_mat['materiales'] + $t_gas['gasto'] + $t_equi['equipo'] + $t_comu['comunicacion'] + $t_banco['banco'];

# Porcentaje de los egresos por rubros para grafico.
if (!$t_banco['banco']) {
    $banco = '0';
}else{
   $banco = $t_banco['banco'];
}
$p_ban = round(($banco/$t_eqresos)*100);
$p_com = round(($t_comu['comunicacion'] / $t_eqresos) * 100);
$p_equ = round(($t_equi['equipo'] / $t_eqresos) * 100);
$p_gas = round(($t_gas['gasto'] / $t_eqresos) * 100);
$p_mat = round(($t_mat['materiales'] / $t_eqresos) * 100);
$p_mov = round(($t_mov['movimiento'] / $t_eqresos) * 100);

?>
 
<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Estás en la caja : <?php echo $nombre_caja;?></h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
      <li class="breadcrumb-item active"><a href="?controller=cajas&&action=todos">Cajas</a></li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
          </div>
          <div class="box-body">
            <div class="row justify-content-between mb-4">
              <div class="col-md-4">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <h4><b>Entradas: </b> <?php echo utf8_encode("$ ".number_format($ingresos_caja['ingrcaja'])); ?></h4>
                  </li>
                  <li class="list-group-item">
                    <h4><b>Salidas: </b> 
                      <?php if ($egreso_caja['egreso'] == '') { echo "0"; }else{ echo utf8_encode("$ ".number_format($egreso_caja['egreso'])); } ?>
                    </h4>
                  </li>
                  <li class="list-group-item"><h4><b>Saldo: </b> <?php echo utf8_encode("$ ".number_format($saldo)); ?></h4></li>
                  <li class="list-group-item"><h4><b>Último ingreso: </b> <?php echo utf8_encode("$ ".number_format($ultimo_ingreso['valor_ingreso']));?></h4></li>
                </ul>
              </div>
              <div  class="col-md-6">
                <div id="chartContainer" style="height: 400px; width: 100%; border:1px solid #0000"></div>
              </div>
            </div>

            <div class="row mt-4"> 
              <div class="col-md-2 ">
                <a href="?controller=gastos&&action=nuevo&&id_caja=<?php echo $id_caja; ?>" class="btn btn-danger btn-block pull-left">Subir gastos</a>
              </div>
            </div>
            <div class="table-responsive mt-4">
              <table class="table table-bordered table-hover">
                <tr style="background-color: #4f5962;color: white;">
                  <th>Cuenta</th>
                  <th>Saldo</th>
                </tr>
                <tr>
                  <td>Banco</td>
                  <td><a href="?controller=cajas&&action=detalles&&id_caja=<?php echo $id_caja; ?>&&rubro=1" >
                    <?php 
                      if ($t_banco['banco'] > '0') {
                        echo utf8_encode("$ ".number_format($t_banco['banco']));
                      }else{
                        echo " 0.00";
                      }
                    ?>
                  </a></td>
                </tr>
                <tr>
                  <td>Comunicacion, Transporte y Otros</td>
                  <td><a href="?controller=cajas&&action=detalles&&id_caja=<?php echo $id_caja; ?>&&rubro=2">
                    <?php
                      if ($t_comu['comunicacion'] > '0') {
                        echo utf8_encode("$ ".number_format($t_comu['comunicacion']));
                      }else{
                        echo "0.00";
                      }
                    ?>
                  </a></td>
                </tr>
                <tr>
                  <td>Equipos</td>
                  <td><a href="?controller=cajas&&action=detalles&&id_caja=<?php echo $id_caja; ?>&&rubro=3">
                    <?php
                      if ($t_equi['equipo'] > '0') {
                        echo utf8_encode("$ ".number_format($t_equi['equipo']));
                      }else{
                        echo "0.00";
                      }
                    ?>
                  </a></td>
                </tr>
                <tr>
                  <td>Gastos Administrativo</td>
                  <td><a href="?controller=cajas&&action=detalles&&id_caja=<?php echo $id_caja; ?>&&rubro=4">
                    <?php
                      if ($t_gas['gasto'] > '0') {
                        echo utf8_encode("$ ".number_format($t_gas['gasto']));
                      }else{
                        echo " 0.00";
                      }
                    ?>
                  </a></td>
                </tr>
                <tr>
                  <td>Materiales y Suministro</td>
                  <td><a href="?controller=cajas&&action=detalles&&id_caja=<?php echo $id_caja; ?>&&rubro=5">
                    <?php
                      if ($t_mat['materiales'] > '0') {
                        echo utf8_encode("$ ".number_format($t_mat['materiales']));
                      }else{
                        echo " 0.00";
                      }
                    ?>
                  </a></td>
                </tr>
                <tr>
                  <td>Movimientos Financieros</td>
                  <td><a href="?controller=cajas&&action=detalles&&id_caja=<?php echo $id_caja; ?>&&rubro=6">
                    <?php
                      if ($t_mov['movimiento'] > '0') {
                        echo  utf8_encode("$ ".number_format($t_mov['movimiento']));
                      }else{
                        echo "0.00";
                      }
                    ?>
                  </a></td>
                </tr>
                <tr>
                  <th class="text-right">Total :</th>
                  <th><?php echo  utf8_encode("$ ".number_format($t_eqresos));?></th>
                </tr>
              </table>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php 
  $bancos = $t_banco['banco']; 
  $comunicacion = $t_comu['comunicacion'];
  $equipo = $t_equi['equipo'];
  $gastos = $t_gas['gasto'];
  $materiales = $t_mat['materiales'];
  $movimientos = $t_mov['movimiento'];

?>
<script type="text/javascript">


  var bancos  = new Intl.NumberFormat().format(<?php echo $bancos ?>);
  var comunicacion  = new Intl.NumberFormat().format(<?php echo $comunicacion ?>);
  var equipos = new Intl.NumberFormat().format(<?php echo $equipo ?>);
  var gastos  = new Intl.NumberFormat().format(<?php echo $gastos ?>);
  var materiales  = new Intl.NumberFormat().format(<?php echo $materiales ?>);
  var movimientos  = new Intl.NumberFormat().format(<?php echo $movimientos ?>);

  var ban  = <?php echo $p_ban ?>;
  var com  = <?php echo $p_com ?>;
  var equi = <?php echo $p_equ ?>;
  var gas  = <?php echo $p_gas ?>;
  var mat  = <?php echo $p_mat ?>;
  var mov  = <?php echo $p_mov ?>;
  var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    data: [{
      type: 'pie',
      startAngle: 240,
      yValueFormatString: '##0.00\"%\"',
      indexLabel: '{label} {y}',
      dataPoints: [
        {y: ban, label: "Banco - $ "+bancos},
        {y: com, label: "Comunicación y Transporte - $ "+comunicacion},
        {y: equi, label: "Equipos - $ "+equipos},
        {y: gas, label: "Gastos Administrativo - $ "+gastos},
        {y: mat, label: "Materiales y Suministro - $ "+materiales},
        {y: mov, label: "Moviminetos Financieros - $ "+movimientos},
      ]
    }]
  });
  chart.render();
  

</script>
<script src="plugins/tablas.js"></script>


