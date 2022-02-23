<?php 
session_start();
ini_set('display_errors', '0');


$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];

$idproveedor=$_GET['id'];
$id_cliente=$_GET['id'];
$conexion = new mysqli('localhost', 'u234527735_sofialuz2021', 'Teksystem@80761478','u234527735_sofialuz2021');

date_default_timezone_set("America/Bogota");
$MarcaTemporal = date('Y-m-d');


  function fechalarga($fechaSql)
{
$date = new DateTime($fechaSql);
$W=$date->format('w');
$d=$date->format('d');
$n=$date->format('n');
$Y=$date->format('Y');

$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
$meses = array("Enero-","Febrero-","Marzo-","Abril-","Mayo-","Junio-","Julio-","Agosto-","Septiembre-","Octubre-","Noviembre-","Diciembre-");
//$NuevaFecha=($dias[date($W)].", ".date($d)." de ".$meses[date($n)-1]. " ".date($Y));
$NuevaFecha=(date($d)." de ".$meses[date($n)-1]. " ".date($Y));

return $NuevaFecha;
}
function dias_transcurridos($fecha_i,$fecha_f)
{
    $dias   = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
    $dias   = abs($dias); $dias = floor($dias);     
    return $dias;
}

 
$sql ="SELECT nombre_cliente FROM clientes_precios WHERE id ='".$id_cliente."'"; 
//Echo($sql);
$result = $conexion->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
                $nombre_cliente= $row['nombre_cliente'];
               }
             }

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Lista Precios - <?php echo($nombre_cliente); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body onload="window.print();">
  <!--<body>-->
<div class="wrapper">

  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
           <img width="150px" height="100px" src="../../../Login/logo-ppal.png"> Orden de Compra
          <small class="pull-right">Fecha:<?php 
            $imprfechalarga=fechalarga($MarcaTemporal);
            echo($imprfechalarga);
             ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
       <div class="col-sm-5 invoice-col">
          Empresa: 
          <address>
            <strong>Soluciones de Ingeniería Nómadas</strong><br>
            Nit. 900584006-4<br>
            Dirección:<small>CRA 11 Nº7-05 B/ NOVA CERETE</small><br>
            Celular: (310) 641-4831<br>
            E-mail: <a href="mailto:contabilidad@solucionesnomadas.com">contabilidad@solucionesnomadas.com</a>
          </address>
        </div>
      <!-- /.col -->
     <div class="col-sm-5 invoice-col">
       Cliente:
      <?php
$sql ="SELECT * FROM clientes WHERE id_cliente='".$id_cliente."' and estado_cliente='1'"; 
//Echo($sql);
$result = $conexion->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
                $nombrepara= $row['nombre_cliente'];
                 ?>
             <address>
                  <strong><?php echo($nombrepara) ?></strong><br>
            Nit: <br>
            Teléfonos: <br>
            Email:
          </address>
                 <?php
               }
             }
 ?>
        
        </div>
      <!-- /.col -->
      <div class="col-sm-2 invoice-col">
       <b>Listado Precios</b><br>
        <br> 
        
      
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <?php 
// Verificación de los items cotizados 
      $sql ="SELECT DISTINCT(id) FROM clientes_precios WHERE cliente_id ='".$cliente_id."' and precio_publicado='1' order by canal_venta DESC";
  //Echo($sql);
  $result = $conexion->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { 
  $Lista=$Lista.$row['id'].",";                  
 }
}
// Creamos el Array
$Cadena=explode(",", $Lista);
$longitud = count($Cadena);
$min=$longitud-1;

       ?>
     
     <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Código ssInterno</th>
              <th>Detalle</th>
              <th>Cantidades</th>
              <th>Unidad</th>
              <th>Vr. Unitario</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
          <?php 
for($i=0; $i<$min; $i++)
{

   $sql ="SELECT A.id, A.proveedor_id_proveedor, A.cotizacion, A.medio_pago, A.item_id, A.valor_cot, A.requisicion_id, A.marca_temporal, A.usuario_creador, A.estado_cotizacion, A.ordencompra_num, B.insumo_id_insumo,A.servicio_id_servicio,A.equipo_id_equipo,A.cantidadcot,A.vr_unitario FROM cotizaciones_item as A, requisiciones_items as B WHERE item_id='".$Cadena[$i]."' and A.ordencompra_num='".$idcompra."' and A.item_id=B.id order by id DESC";
  //Echo($sql);
  $result = $conexion->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { 
              $id1= $row['id'];
              $proveedor_id_proveedor= $row['proveedor_id_proveedor'];
              $cotizacion= $row['cotizacion'];
              $medio_pago= $row['medio_pago'];
              $item_id= $row['item_id'];
              $valor_cot= $row['valor_cot'];
              $requisicion_id= $row['requisicion_id'];
              $marca_temporal= $row['marca_temporal'];
              $usuario_creador= $row['usuario_creador'];
              $estado_cotizacion= $row['estado_cotizacion'];
              $insumo_id_insumo= $row['insumo_id_insumo'];
              $servicio_id_servicio= $row['servicio_id_servicio'];
              $equipo_id_equipo= $row['equipo_id_equipo'];
              $cantidadcot= $row['cantidadcot'];
              $vr_unitario= $row['vr_unitario'];
 }
}
if ($insumo_id_insumo!='0') {
  
  // Consultamos el nombre del Insumo
 $sql ="SELECT nombre_insumo FROM insumos WHERE id_insumo='".$insumo_id_insumo."'";
  //Echo($sql);
  $result = $conexion->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { 
  $deltallesolicitado= $row['nombre_insumo']; 
 }
}
}elseif($servicio_id_servicio!='0'){

    // Consultamos el nombre del servicio
 $sql ="SELECT nombre FROM servicios WHERE id='".$servicio_id_servicio."'";
  //Echo($sql);
  $result = $conexion->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { 
  $deltallesolicitado= $row['nombre']; 
 }
}

}elseif ($equipo_id_equipo!='0') {
  // Consultamos el nombre del servicio
 $sql ="SELECT nombre_equipo FROM equipos WHERE id_equipo='".$equipo_id_equipo."'";
  //Echo($sql);
  $result = $conexion->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { 
  $deltallesolicitado= $row['nombre_equipo']; 
 }
}

}

// Consultamos la unidad de Medidad del Insumo
 $sql ="SELECT unidadmedida_id FROM insumos WHERE id_insumo='".$insumo_id_insumo."'";
  //Echo($sql);
  $result = $conexion->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { 
  $unidadmedida_id= $row['unidadmedida_id']; 
 }
}

// Consultamos el nombre de la unidad
 $sql ="SELECT nombre FROM unidades_medida WHERE id='".$unidadmedida_id."'";
  //Echo($sql);
  $result = $conexion->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { 
  $nomunidadmedida= $row['nombre']; 
 }
}


           ?>
          <tr>
            <td>RQ <?php echo($requisicion_id."-".$item_id) ?>
                <input type="hidden" value="<?php echo($item_id); ?>" name="iditemarray[]">
              </td>
              <td><?php echo($deltallesolicitado); ?></td>
              <td><?php echo($cantidadcot); ?></td>
              <td><?php echo($nomunidadmedida); ?></td>
               <td><?php echo ("$ ".number_format($vr_unitario,0)); ?></td>
              <td><?php echo ("$ ".number_format($valor_cot,0)); ?></td>
              
          </tr>
<?php 
}
 ?>
          </tbody>
        </table>
      </div>
  
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-7">
         
         <p class="lead"><strong>Condiciones Comerciales</strong></p>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;font-size: 8px; text-align: justify;">
           1   Señor proveedor, debera citar el numero de la orden de compra y/o servicio en la factura cuenta de cobro emitida por usted                    
2. Los materiales deben ser entregados donde el cotizante lo designe en el contenido de la orden de compray/o servicio.                   
3. Nuestra empresa registra la obligacion de retencion en la fuente a titulo de renta, por lo tanto de acuerdo a la naturaleza del servicio se aplicara la respectiva retencion.                    
4. La empresa se abstendra de recibir cuenta de cobro o factura sin los requisitos exigidos por la ley                    
5. El valor total de la orden de compra y/o servicio es un valor aproximado y por lo tanto el contratante podra a su juicio y para evitar la paralizacion del objeto contratado                   
ordenar la ejecucion de cantidades adicionales o mayores cantidades de las solicitadas en la orden, teniendo en  cuenta, que estas deveran ser autorizadas por escrito                    
6. El ordenante no tiene ningun vinculo laboral con el ordenado; ademas el presente servicio o trabajo se realiza por cuenta y riesgos exclusivos del ordenado; para los pagos a                    
que tiene derecho el ordenado debera aportar el registro unico a tributario (RUT) y los demas documentos de la lista de chequeo                   
para pagos final de servicios debe anexar acta de recibo (de servicio u obra) a satifaccion so pena de abstenerce de pagar el ordenante al ordenado la suma pactada; los pagos                    
establecidos en esta orden quedan sujetos a una retencion en la fuente sobre el valor total or el servicio y a la existencia de fondos en banco o cajas al momento de cancelarlos;                    
cualquier detrimento patrimonial del ordenante , causado por el ordenado en razon de los servicios o trabajos prestados, con la sola firma del presente documento el ordenado                   
autoriza descvontar dicha suma de los saldos adeudados; la presente orden esta regida por el derecho civil; el incumplimiento de las obligaciones contratados o la mora                   
en la entrega de los trabajos causara una multa de 10% sobre el valor total y obligara al ordenado a devolver los dineros entregado como anticipo                   
Ante cualquier duda puede comunicarse con el jefe de compras al 3126638421 o al 3002720234
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-5">
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>
                <?php 
  $sql ="SELECT SUM(valor_cot) as subtotal FROM cotizaciones_item WHERE proveedor_id_proveedor='".$idproveedor."' and ordencompra_num ='".$idcompra."'";
  //Echo($sql);
  $result = $conexion->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { 
  $subtotal= $row['subtotal']; 
  echo("$ ".number_format($subtotal,0));
 }
}
                 ?>
                
                
              </td>
            </tr>
            <tr>
              <th>Medio de Pago:</th>
              <td><?php echo($mediopago); ?></td>
            </tr>
          
          </table>
        </div>
      </div>
              <div class="col-xs-4">
          <div class="table-responsive">
            <table class="table">
              <tbody><tr>
                <th style="width:50%"><small>VoBo Jefe de compra</small></th>
                <td></td>
              </tr>
            </tbody></table>
          </div>
        </div>
         <div class="col-xs-4">
          <div class="table-responsive">
            <table class="table">
              <tbody><tr>
                <th style="width:50%"><small>VoBo Jefe area financiera</small></th>
                <td></td>
              </tr>
            </tbody></table>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="table-responsive">
            <table class="table">
              <tbody><tr>
                <th style="width:50%"><small>Firma proveedor</small></th>
                <td></td>
              </tr>
            </tbody></table>
          </div>
        </div>
        <!-- /.col -->
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
