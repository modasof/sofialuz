<?php
error_reporting(E_ALL);
ini_set('display_errors', '0');
$RolSesion = $_SESSION['IdRol'];
$IdSesion  = $_SESSION['IdUser'];

include_once 'modelos/cargamasiva.php';
include_once 'controladores/cargamasivaController.php';

?>

<?php
extract($_POST);
if (isset($_POST['action'])) {
    $action = $_POST['action'];
}

if (isset($action) == "upload") {
//cargamos el fichero
    //echo ("archivo recibido");

    $archivo = $_FILES['excel']['name'];
    $tipo    = $_FILES['excel']['type'];
    $destino = "cop_" . $archivo; //Le agregamos un prefijo para identificarlo el archivo cargado
    if (copy($_FILES['excel']['tmp_name'], $destino)) {
        //echo "Archivo Cargado Con Éxito";
    } else {
        //echo "Error Al Cargar el Archivo";
    }

    if (file_exists("cop_" . $archivo)) {
/** Llamamos las clases necesarias PHPEcel */
        require_once 'Classes/PHPExcel.php';
        require_once 'Classes/PHPExcel/Reader/Excel2007.php';
// Cargando la hoja de excel
        $objReader   = new PHPExcel_Reader_Excel2007();
        $objPHPExcel = $objReader->load("cop_" . $archivo);
        $objFecha    = new PHPExcel_Shared_Date();
// Asignamon la hoja de excel activa
        $objPHPExcel->setActiveSheetIndex(0);
// Importante - conexión con la base de datos

// Rellenamos el arreglo con los datos  del archivo xlsx que ha sido subido

        $columnas = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
        $filas    = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); 

//Creamos un array con todos los datos del Excel importado
        for ($i = 2; $i <= $filas; $i++) {


// Verificación de Columna 1 
    $nombre_equipo= $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
// Verificación Consultar si nombre de equipo Existe
    $id_equipo = Cargamasiva::obtenerIdEquipo($nombre_equipo);

// Verificación de Columna 4 
    $nombre_conductor= $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
// Verificación Consultar si nombre de equipo Existe
    $id_conductor = Cargamasiva::obtenerIdConductor($nombre_conductor);

    if ($id_equipo=='') {
         echo "<script>jQuery(function(){Swal.fire(\"¡Datos Errados!\", \"Verifique el formato del archivo\", \"warning\");});</script>";
    }else{
         echo "<script>jQuery(function(){Swal.fire(\"¡Datos Errados!\", \"Verifique el formato del archivo\", \"success\");});</script>";
    }


// Verificación de columna 2 
    $fecha_reporte= $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
// Cambiamos el formato de la fecha  
    $fechaformateada = date("Y-m-d", ($fecha_reporte - 25568) * 86400);
// Verificación de columna 2
    $totalkm= $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();

//echo ($fechaformateada);
    $validacionregistro = Cargamasiva::validarRegistro($id_equipo,$fechaformateada);

        if ($validacionregistro>0) {

            $actualizarGPS= Cargamasiva::actualizardataGps($fechaformateada,$id_equipo,$totalkm,$id_conductor);
        }else{
            
            $RegistrarGPS= Cargamasiva::nuevadataGps($fechaformateada,$id_equipo,$totalkm,$id_conductor,$IdSesion);

        }

        }
       
        echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";

        //Borramos el archivo que esta en el servidor con el prefijo cop_
        unlink($destino);
    }
    //si por algun motivo no cargo el archivo cop_
    else {
        echo "Primero debes cargar el archivo con extencion .xlsx";
    }
}else{
    //echo ("Sin archivo");
}
?>

 <style type="text/css">
     .filestyle{
            -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: rgba(0,0,0,0);
    border-collapse: separate;
    box-sizing: border-box;
    margin: 0;
    font: inherit;
    font-family: inherit;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    background-color: #eee;
    opacity: 1;
    cursor: not-allowed;
    position: relative;
    z-index: 2;
    float: left;
    width: 100%;
    margin-bottom: 0;
    display: table-cell;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
     }
 </style>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Carga Masiva</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
             <li class="breadcrumb-item"><a href="?controller=reportes&&action=horasporfecha">Reporte Km</a></li>
            <li class="breadcrumb-item active"><a href="?controller=cargamasiva&&action=kilometraje">Carga Masiva</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>


<div class="col-md-12">


<div class="row">

</div>


<hr>
<div class="col-md-12">
               <div class="row">
          <!-- MAP & BOX PANE -->
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-success ">
            <div class="box-header with-border">
              <h3 class="box-title">Carga Masiva Kilometraje de Equipos </h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                          <div class="row">

      </div>
       <div class="col-sm-12">
        <br>
        </div><!-- /.col -->
 <form method="post" name="importa" action="" enctype="multipart/form-data" id="form_carga_productos">
    <input type="hidden" value="upload" name="action" />
    <input type="hidden" value="usuarios" name="mod">
    <input type="hidden" value="masiva" name="acc">
                            <div class="row">
                                <div class="col-lg-10">
                                    <input type="file" name="excel" id="fileProductos" class="form-control"
                                        accept=".xls, .xlsx">
                                </div>
                                <div class="col-lg-2">
                                    <input name="enviar" type="submit" value="Subir a Sistema" class="btn btn-primary"
                                        id="btnCargar">
                                </div>
                            </div>
                        </form>

            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">

            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
</div>

 <div class="row mx-0">
        <div class="col-lg-12 mx-0 text-center">
                <img src="vistas/cargamasiva/loading.gif" id="img_carga" style="display: none;">
        </div>
</div>


<?php 
            if (isset($action)) {
$filas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
                }
            if (isset($filas)) {
$columnas = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
                }
            if (isset($filas)) {
$filas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
                }

//echo 'getHighestColumn() =  [' . $columnas . ']<br/>';
//echo 'getHighestRow() =  [' . $filas . ']<br/>';
if (isset($action)== "upload"){
echo ("<h3>Datos Actualizados en Sistema</h3>");
echo '<table id="cotizaciones" class="table  table-responsive table-striped table-bordered table-hover" style="width: 100%;font-size: 14px;">';
    echo '<thead>';
        echo("<th>Placa</th>");
        echo("<th>Fecha</th>");
        echo("<th>Km</th>");
        echo("<th>Operador</th>");
        echo '</thead> ';
        echo '<tbody> ';

$count=0;

$objPHPExcel->setActiveSheetIndex(0);
// Importante - conexión con la base de datos

// Rellenamos el arreglo con los datos  del archivo xlsx que ha sido subido

        $columnas = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
        $filas    = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); 

//Creamos un array con todos los datos del Excel importado
        for ($i = 2; $i <= $filas; $i++) {
// Verificación de Columna 1 
    $nombre_equipo= $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
// Verificación Consultar si nombre de equipo Existe
    $id_equipo = Cargamasiva::obtenerIdEquipo($nombre_equipo);
// Verificación de columna 2 
    $fecha_reporte= $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
// Cambiamos el formato de la fecha  
    $fechaformateada = date("Y-m-d", ($fecha_reporte - 25568) * 86400);
// Verificación de columna 2
    $totalkm= $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
     $operador= $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();

        echo ("<tr>");
        echo ("<td>".$nombre_equipo."</td>");
        echo ("<td>".$fechaformateada."</td>");
        echo ("<td>".$totalkm."</td>");
         echo ("<td>".$operador."</td>");
        echo ("<tr>");
        }
       
  echo '</tbody>';
  echo '</table>';
}
 //echo '</div>';
?>

</div>



</div>

</div>


<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
          <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>

          <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
          <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
          <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

          <script src="dist/js/buttons.colVis.min.js"></script>
          <script src="dist/js/buttons.print.min.js"></script>
           <script src="dist/js/dataTables.select.min.js"></script>
           <script src="dist/js/buttons.flash.min.js"></script>


<!-- PROCESO DE CARGA Y PROCESAMIENTO DEL EXCEL-->



