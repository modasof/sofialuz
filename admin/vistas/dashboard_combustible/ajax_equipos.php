<?php
include_once '../../modelos/clientes.php';
include_once '../../controladores/clientesController.php';
include_once '../../modelos/productos.php';
include_once '../../controladores/usuariosController.php';
include_once '../../modelos/usuarios.php';
include_once '../../controladores/productosController.php';
include_once '../../modelos/equipos.php';
include_once '../../controladores/equiposController.php';
include_once '../../modelos/funcionarios.php';
include_once '../../controladores/funcionariosController.php';
include_once '../../modelos/usuarios.php';
include_once '../../controladores/usuariosController.php';
include_once '../../modelos/estaciones.php';
include_once '../../controladores/estacionesController.php';

include_once '../../modelos/proyectos.php';
include_once '../../controladores/proyectosController.php';

include_once '../../modelos/propietarios.php';
include_once '../../controladores/propietariosController.php';

include '../../vistas/index/estadisticas_acpm.php';
include '../../vistas/index/estadisticas_index.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion = $_SESSION['IdUser'];
//Include database configuration file
include '../../include/class.conexion.php';



$getequipo=$_POST['id'];
$getnomequipo            = Equipos::obtenerNombreEquipo($getequipo);

if (isset($_POST['daterange'])) {
    $fechaform = $_POST['daterange'];
} elseif (isset($_GET['daterange'])) {
    $fechaform = $_GET['daterange'];
}

date_default_timezone_set("America/Bogota");
$MarcaTemporal  = date('Y-m-d');
$FechaInicioDia = ($MarcaTemporal . " 00:00:000");
$FechaFinalDia  = ($MarcaTemporal . " 23:59:000");
//echo("FECHA QUE LLEGA:".$fechaform."<br>");

if ($fechaform != "") {
    $arreglo         = explode("-", $fechaform);
    $FechaIn         = $arreglo[0];
    $FechaFn         = $arreglo[1];
    $vectorfechaIn   = explode("/", $FechaIn);
    $vectorfechaFn   = explode("/", $FechaFn);
    $arreglofechauno = $vectorfechaIn[2] . "-" . $vectorfechaIn[0] . "-" . $vectorfechaIn[1];
    $arreglofechados = $vectorfechaFn[2] . "-" . $vectorfechaFn[0] . "-" . $vectorfechaFn[1];

    $FechaUno = str_replace(" ", "", $arreglofechauno);
    $FechaDos = str_replace(" ", "", $arreglofechados);
}

// Validación de la fecha en que inicia el Día

if ($FechaUno == "") {
    $FechaStart  = $FechaInicioDia;
    $datofechain = $MarcaTemporal;
} else {
    $FechaStart  = ($FechaUno . " 00:00:000");
    $datofechain = $FechaUno;
}
// Validación de la fecha en que Termina el Día
if ($FechaDos == "") {
    $FechaEnd       = $FechaFinalDia;
    $datofechafinal = $MarcaTemporal;
} else {
    $FechaEnd        = ($FechaDos . " 23:59:000");
    $limpiarvariable = str_replace(" ", "", $FechaDos);
    $datofechafinal  = $limpiarvariable;
}

?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>

<div class="callout callout-warning col-md-6 col-sm-6 col-xs-12">
<h4>Equipo <?php echo($getnomequipo);  ?></h4>
<p>Reporte del <?php echo ($FechaStart) ?> al <?php echo ($FechaEnd) ?><br>
  <?php 
$numtanqueos= AcpmconteoEquipo($FechaStart,$FechaEnd,$getequipo);
$anqueoprom= AcpmpromediotanqueoEquipo($FechaStart,$FechaEnd,$getequipo);
   ?>
   Total Tanqueos : <?php echo($numtanqueos); ?> // Promedio por Tanqueo : <?php echo(round($anqueoprom,2)); ?>

   
</p>
</div>


<div  class="col-md-3 col-xs-6">
<div class='small-box bg-orange'>
<div class="inner">
<h4><i class="fa fa-calendar"> </i><strong>

<?php
$bloque1 = AcpmmesEquipo($FechaStart, $FechaEnd,$getequipo);
echo (number_format($bloque1, 0) . " Gl.");
?>
</strong></h4>
<p>Total Consumo</p>
</div>
</div>
</div>

<div  class="col-md-3 col-xs-6">
<div class='small-box bg-orange'>
<div class="inner">
<h4><i class="fa fa-calendar"> </i><strong>

<?php
$bloque1 = AcpmfechaVolquetavalor($FechaStart, $FechaEnd,$getequipo);
echo ("$".number_format($bloque1, 0));
?>
</strong></h4>
<p>Total Gasto</p>
</div>
</div>
</div>


<div class="clearfix">
                      <div class="pull-right tableTools-container2"></div>
                      <button class="botonexportar">Exportar a Excel</button>
                    </div>
              <div class="table-responsive mailbox-messages">
          <table id="tablequipos" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 14px;">
           
          
          <thead>
            <tr style="background-color: #4f5962;color: white;">
            <th style="width: 2%;">Id</th>
            <th>Fecha</th>
            <th>Propietario</th>
            <th style="width: 15%;">Equipo</th>
            <th style="width: 15%;">Despacho Gl</th>
            <th style="width: 15%;">Vr. Galón </th>
            <th style="width: 15%;">Vr. Compra</th>
            <th style="width: 15%;">P. Despacho</th>
            <th style="width: 15%;">Recibido por</th>
            <th style="width: 15%;">Kl - Hr</th>
            <th>Observaciones</th>
            </tr>
          </thead>
       
       <tbody>
 

<?php

if (isset($_POST["id"]) && !empty($_POST["id"])) {
    $db     = Db::getConnect();
    $sql    = "SELECT * FROM reporte_combustibles WHERE reporte_publicado='1'  and equipo_id_equipo='" . $_POST['id'] . "' and fecha_reporte >='".$FechaStart."' and fecha_reporte <='".$FechaEnd."' order by fecha_reporte DESC";
    $select = $db->query($sql);
    //echo ($sql);
    $camposq = $select->fetchAll();
    $i       = 0;
    foreach ($camposq as $campo) {
        $i                    = $i + 1;
        $id                   = $campo['id'];
        $fecha_reporte        = $campo['fecha_reporte'];
        $imagen               = $campo['imagen'];
        $valor_m3             = $campo['valor_m3'];
        $cantidad             = $campo['cantidad'];
        $indicador            = $campo['indicador'];
        $creado_por           = $campo['creado_por'];
        $estado_reporte       = $campo['estado_reporte'];
        $reporte_publicado    = $campo['reporte_publicado'];
        $tipo_despacho        = $campo['tipo_despacho'];
        $punto_despacho       = $campo['punto_despacho'];
        $marca_temporal       = $campo['marca_temporal'];
        $observaciones        = $campo['observaciones'];
        $equipo_id_equipo     = $campo['equipo_id_equipo'];
        $proyecto_id_proyecto = $campo['proyecto_id_proyecto'];
        $despachado_por       = $campo['despachado_por'];
        $recibido_por         = $campo['recibido_por'];
        $nomestacion          = Estaciones::ObtenerNombreEstacion($punto_despacho);
        $nomequipo            = Equipos::obtenerNombreEquipo($equipo_id_equipo);
        $nombrerecibe         = Usuarios::obtenerNombreUsuario($recibido_por);
        $nombredespachador    = Funcionarios::obtenerNombreFuncionario($despachado_por);
        $nomproyecto          = Proyectos::obtenerNombreProyecto($proyecto_id_proyecto);
        $idpropietario        = Equipos::obtenerPropietarioEquipo($equipo_id_equipo);
        $nompropietario       = Propietarios::obtenerNombre($idpropietario);
        $ventatotal           = $cantidad * $valor_m3;

        ?>

         <tr>
              <td><?php echo ($id) ?></td>
              <td><?php echo ($fecha_reporte) ?></td>
              <td><?php echo utf8_encode($nompropietario) ?></td>
              <td><?php echo utf8_encode($nomequipo) ?></td>
              <td><?php echo utf8_encode($cantidad); ?></td>
              <td><?php echo utf8_encode("$" . number_format($valor_m3)); ?></td>
              <td><?php echo utf8_encode("$" . number_format($ventatotal)); ?></td>
              <td><?php echo utf8_encode($nomestacion) ?></td>
              <td><?php echo utf8_encode($nombrerecibe) ?></td>
              <td><?php echo utf8_encode($indicador) ?></td>
              <td><?php echo utf8_encode($observaciones); ?> <br><?php echo utf8_encode($nomproyecto); ?></td>
            </tr>


        <?php
}

    ?>

 </tbody>
           
     
    
          </table>
        </div> <!-- Fin Row -->
    
    <?php

    $rowCount = $i;
    //Display states list
    if ($rowCount > 0) {
    } else {
        echo '<strong>Euipo sin datos en la fecha seleccionada</strong>';
    }
}

?>

<script type="text/javascript">
    $(document).ready(()=>{
        $('#botonexportar').click(function(){
            $('#tablequipos').table2excel({
                name:"Informe Equipos",
                filename:"Somefile",
                fileext:".xls",
            });
        });

    });
</script>



