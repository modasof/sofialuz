<?php
ini_set('display_errors', '0');
include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';

include_once 'modelos/proveedores.php';
include_once 'controladores/proveedoresController.php';

include_once 'modelos/servicios.php';
include_once 'controladores/serviciosController.php';

include_once 'modelos/insumos.php';
include_once 'controladores/insumosController.php';

include_once 'modelos/unidadesmed.php';
include_once 'controladores/unidadesmedController.php';

include_once 'modelos/equipostemporales.php';
include_once 'controladores/equipostemporalesController.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion  = $_SESSION['IdUser'];

$idreq = $_GET['id'];
//$listaids=$_GET['des'];

$itemsget = $_GET['des'];
$items    = explode(",", $itemsget);

?>
<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->

<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">
 <!-- CCS Y JS DATERANGE -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Agregar Cotizaciones  </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
                <?php
if ($RolSesion == 1 or $RolSesion == 13) {
    ?>
                    <li class="breadcrumb-item active"><a href="?controller=requisiciones&&action=todosalmacen&&cargo=<?php echo ($RolSesion); ?>">Ver Requisiciones</a></li>
                    <li class="breadcrumb-item active"><a href="?controller=requisiciones&&action=reqalmacenestado&&estadosolicitado=6&&cargo=<?php echo ($RolSesion); ?>">En cotización</a></li>

                    <?php
} else {
    ?>
                        <li class="breadcrumb-item active"><a href="?controller=requisiciones&&action=todosmiusuario&&id=<?php echo ($IdSesion); ?>">Ver Requisiciones</a></li>
                    <?php
}
?>

          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="container-fluid">
                    <div class="row">

                <div class="col-md-3">
    <form role="form" autocomplete="off" action="?controller=requisicionesitems&action=guardarsoportecotizacionmultiple&&id=<?php echo ($idreq); ?>&&des=<?php echo($itemsget); ?>" method="POST" enctype="multipart/form-data" >


      <?php
date_default_timezone_set("America/Bogota");
    $TiempoActual = date('Y-m-d H:i:s');
     $campofecha = date('Y-m-d');
    ?>


          <input type="hidden" name="estado_cotizacion" value="1">
          <input type="hidden" name="ordencompra_num" value="0">
          <input type="hidden" name="cantidadcot" value="0">
          <input type="hidden" name="insumo_id_insumo" value="0">
          <input type="hidden" name="servicio_id_servicio" value="0">
          <input type="hidden" name="equipo_id_equipo" value="0">
          <input type="hidden" name="requisicion_id" value="0">
          <input type="hidden" name="usuario_creador" value="<?php echo ($IdSesion); ?>">
          <input type="hidden" name="usuario_aprobador" value="0">
          <input type="hidden" name="marca_temporal" value="<?php echo ($TiempoActual); ?>">
          <input type="hidden" name="fecha_reporte" value="<?php echo ($campofecha); ?>">

                             <div class="col-md-12">
                    <div class="form-group">
                      <label for="fila2_columna1">Soporte Cotización<small>Tamaño máximo 10MB</small></label>
                        <div class="custom-file">
                           <input name="imagen" type="file" id="input-file-now" class="dropify" data-default-file=""  multiple="multiple" data-allowed-file-extensions="png jpg jpeg pdf webm" data-show-errors="true" data-max-file-size="10M" data-errors-position="outside" accept="image/png, .jpeg, .jpg, image/gif,.pdf"/ required>
                        </div>
                    </div>
                </div>

                 <div class="col-md-12">
                    <div class="form-group">
                      <label for="fila2_columna1">Seleccionar Proveedor</small></label>
                        <div class="custom-file">
                          <select  class="form-control" id="mi-selector2" name="proveedor" >
          <option value="" selected>Seleccionar...</option>
                                        <?php
$rubros = Proveedores::obtenerListaProveedores();
    foreach ($rubros as $campo) {
        $id     = $campo['id_proveedor'];
        $nombre = $campo['nombre_proveedor'];
        ?>
            <option value="<?php echo $id; ?>"><?php echo utf8_encode($nombre); ?></option>
                                        <?php }?>
        </select>
                        </div>
                    </div>
                </div>

 <div class="col-md-12">
                    <div class="form-group">
                      <label for="fila2_columna1">Forma de Pago</small></label>
                        <div class="custom-file">
                          <select  class="form-control" id="mi-selector2" name="formadepago" >
          <option value="" selected>Seleccionar...</option>
          <option value="A convenir" >A convenir</option>
           <option value="Contado" >Contado</option>
             <option value="Credito" >Crédito</option>                         
        </select>
                        </div>
                    </div>
</div>

<div class="col-md-12">
                    <div class="form-group">
                      <label for="fila2_columna1">Cotización Nº</small></label>
                        <div class="custom-file">
                          <select  class="form-control" id="mi-selector2" name="cotizacion_num" >
        <option value="" selected>Seleccionar...</option>
        <option value="Cotizacion 1" >Cotizacion 1</option>
        <option value="Cotizacion 2" >Cotizacion 2</option>
        <option value="Cotizacion 3" >Cotizacion 3</option>
                                      
        </select>
                        </div>
                    </div>
</div>

  <div class="card-footer">
                                  <button name="Submit" type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para actualizar la información">Subir Datos</button>
                                </div>
                    </form>
                    
                </div>
                        <!-- ESTE DIV LO USO PARA CENTRAR EL FORMULARIO -->
                        <!-- left column -->
                        <div class="col-md-9">
                          <!-- general form elements -->
                          <div class="card card-primary">
                            <!-- /.card-header -->
                            <!-- form start -->


                                    <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Requisiciones</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-striped" style="font-size: 13px;">
                <tbody>
                 
 <?php

foreach ($items as $key => $despachounico) {

 $listRq  = ObtenerIdReq($despachounico);
    $tiporeq = ObtenerTipoReq($listRq);

# ========================================================
    # =           Validación Cotización 1 por Item           =
    # ========================================================

    $idproveedor1       = proveedorcot($despachounico, 'Cotizacion 1');
    $imagencot1       = imagencot($despachounico, 'Cotizacion 1');
    $nomproveedor1      = Proveedores::obtenerNombreProveedor($idproveedor1);
    $pago1              = pagocot($despachounico, 'Cotizacion 1');
    $valor1             = valorcot($despachounico, 'Cotizacion 1');
    $idcotizaciondelete = idcot($despachounico, 'Cotizacion 1');

    if ($idcotizaciondelete == "") {
         $campovalidacion1 = "<input id='identificador1".$despachounico."' type='hidden' name='identificador1' value='vacio'>";
    } else {
         $campovalidacion1 = "<input id='identificador1".$despachounico."' type='hidden' name='identificador1' value='1'>";
    }

    if ($idcotizaciondelete == "") {
         $btneliminar = "";
    } else {
        $btneliminar = "<a style='display:none;' href='?controller=requisicionesitems&action=eliminarcotizacion&&id=" . $listRq . "&&des=" . $itemsget . "&&iddelete=" . $idcotizaciondelete . "'><i class='fa fa-trash text-danger'> Eliminar </i> </a>";
    }

    # ======  End of Validación Btn Eliminar  =======

    if ($idproveedor1 == "") {
        $idprovcotizacion1 = "";
    } else {
        $idprovcotizacion1 = $idproveedor1;
    }

    # ======  End of Validación Proveedor  =======

    if ($nomproveedor1 == "") {
        $cotizacion1de = "Subir Soporte";
    } else {
        $cotizacion1de = $nomproveedor1;
    }
    # ======  End of Validación  Nombre Proveedor  =======

    if ($pago1 == "") {
        $pago1de = "<label>
                      <input type='radio' name='formapago1' id='optionsRadios1".$despachounico."' value='Credito' >Crédito
                    </label>
                    <label>
                      <input type='radio' name='formapago1' id='optionsRadios1".$despachounico."' value='Contado'>Contado
                    </label>
                     <input style='display:none;' type='radio' name='formapago1' id='optionsRadios1".$despachounico."' value='vacio' checked>
                    </label>";
    } elseif ($pago1 == "Contado") {
        $pago1de = "<label>
                      <input type='radio' name='formapago1' id='optionsRadios1".$despachounico."' value='Credito' >Crédito
                    </label>
                    <label>
                      <input type='radio' name='formapago1' id='optionsRadios1".$despachounico."' value='Contado' checked>Contado
                    </label>";
    } else {
        $pago1de = "<label>
                      <input type='radio' name='formapago1' id='optionsRadios1".$despachounico."' value='Credito' checked >Crédito
                    </label>
                    <label>
                      <input type='radio' name='formapago1' id='optionsRadios1".$despachounico."' value='Contado'>Contado
                    </label>";
    }

# ======  End of Validación Cotización 1 por Item  =======

# ========================================================
    # =           Validación Cotización 2 por Item           =
    # ========================================================

    $idproveedor2        = proveedorcot($despachounico, 'Cotizacion 2');
    $imagencot2       = imagencot($despachounico, 'Cotizacion 2');
    $nomproveedor2       = Proveedores::obtenerNombreProveedor($idproveedor2);
    $pago2               = pagocot($despachounico, 'Cotizacion 2');
    $valor2              = valorcot($despachounico, 'Cotizacion 2');
    $idcotizaciondelete2 = idcot($despachounico, 'Cotizacion 2');

    if ($idcotizaciondelete2 == "") {
         $campovalidacion2 = "<input id='identificador2".$despachounico."' type='hidden' name='identificador2' value='vacio'>";
    } else {
         $campovalidacion2 = "<input id='identificador2".$despachounico."' type='hidden' name='identificador2' value='1'>";
    }

    if ($idcotizaciondelete2 == "") {
         $btneliminar2 = "";
    } else {
        $btneliminar2 = "<a style='display:none;' href='?controller=requisicionesitems&action=eliminarcotizacion&&id=" . $listRq . "&&des=" . $itemsget . "&&iddelete=" . $idcotizaciondelete2 . "'><i class='fa fa-trash text-danger'> Eliminar </i> </a>";
    }

    if ($idproveedor2 == "") {
        $idprovcotizacion2 = "";
    } else {
        $idprovcotizacion2 = $idproveedor2;
    }

    if ($nomproveedor2 == "") {
        $cotizacion2de = "Subir Soporte";
    } else {
        $cotizacion2de = $nomproveedor2;
    }

    if ($pago2 == "") {
        $pago2de = "<label>
                      <input type='radio' name='formapago2' id='optionsRadios2".$despachounico."' value='Credito' >Crédito
                    </label>
                    <label>
                      <input type='radio' name='formapago2' id='optionsRadios2".$despachounico."' value='Contado'>Contado
                    </label>
                    <label>
                      <input style='display:none;' type='radio' name='formapago2' id='optionsRadios2".$despachounico."' value='vacio' checked>
                    </label>";
    } elseif ($pago2 == "Contado") {
        $pago2de = "<label>
                      <input type='radio' name='formapago2' id='optionsRadios2".$despachounico."' value='Credito' >Crédito
                    </label>
                    <label>
                      <input type='radio' name='formapago2' id='optionsRadios2".$despachounico."' value='Contado' checked>Contado
                    </label>";
    } else {
        $pago2de = "<label>
                      <input type='radio' name='formapago2' id='optionsRadios2".$despachounico."' value='Credito' checked >Crédito
                    </label>
                    <label>
                      <input type='radio' name='formapago2' id='optionsRadios2".$despachounico."' value='Contado'>Contado
                    </label>";
    }

# ======  End of Validación Cotización 2 por Item  =======

    # ========================================================
    # =           Validación Cotización 3 por Item           =
    # ========================================================

    $idproveedor3        = proveedorcot($despachounico, 'Cotizacion 3');
    $imagencot3       = imagencot($despachounico, 'Cotizacion 3');
    $nomproveedor3       = Proveedores::obtenerNombreProveedor($idproveedor3);
    $pago3               = pagocot($despachounico, 'Cotizacion 3');
    $valor3              = valorcot($despachounico, 'Cotizacion 3');
    $idcotizaciondelete3 = idcot($despachounico, 'Cotizacion 3');

    if ($idcotizaciondelete3 == "") {
         $campovalidacion3 = "<input id='identificador3".$despachounico."' type='hidden' name='identificador3' value='vacio'>";
    } else {
         $campovalidacion3 = "<input id='identificador3".$despachounico."' type='hidden' name='identificador3' value='1'>";
    }

    if ($idcotizaciondelete3 == "") {
        $btneliminar3 = "";
    } else {
        $btneliminar3 = "<a style='display:none;' href='?controller=requisicionesitems&action=eliminarcotizacion&&id=" . $listRq . "&&des=" . $itemsget . "&&iddelete=" . $idcotizaciondelete3 . "'><i class='fa fa-trash text-danger'> Eliminar </i> </a>";
    }

    if ($idproveedor3 == "") {
        $idprovcotizacion3 = "";
    } else {
        $idprovcotizacion3 = $idproveedor3;
    }

    if ($nomproveedor3 == "") {
        $cotizacion3de = "Subir Soporte";
    } else {
        $cotizacion3de = $nomproveedor3;
    }

    if ($pago3 == "") {
        $pago3de = "<label>
                      <input type='radio' name='formapago3' id='optionsRadios3".$despachounico."' value='Credito' >Crédito
                    </label>
                    <label>
                      <input type='radio' name='formapago3' id='optionsRadios3".$despachounico."' value='Contado'>Contado
                    </label>
                    <label>
                     <input style='display:none;' type='radio' name='formapago3' id='optionsRadios3".$despachounico."' value='vacio' checked>
                    </label>";
    } elseif ($pago3 == "Contado") {
        $pago3de = "<label>
                      <input type='radio' name='formapago3' id='optionsRadios3".$despachounico."' value='Credito' >Crédito
                    </label>
                    <label>
                      <input type='radio' name='formapago3' id='optionsRadios3".$despachounico."' value='Contado' checked>Contado
                    </label>";
    } else {
        $pago3de = "<label>
                      <input type='radio' name='formapago3' id='optionsRadios3".$despachounico."' value='Credito' checked='true'>Crédito
                    </label>
                    <label>
                      <input type='radio' name='formapago3' id='optionsRadios3".$despachounico."' value='Contado' >Contado
                    </label>";
    }

    ?>
                <tr>
                  <th>RQ</th>
                  <th style="width:300px;">Detalle</th>
                  <th>
            <?php if ($imagencot1!='') {
                ?>

             <a target="_blank" href="<?php echo($imagencot1); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-file-pdf-o bigger-110 "> </i>
              </a>

                <?php
            }else{
                echo("<i class='fa fa-close bigger-110 bg-red'> </i>");
            } 

            ?>

              
                    <?php echo($cotizacion1de."<br>".$pago1);?>


                </th>
                  <th>
                
                     <?php if ($imagencot2!='') {
                ?>

             <a target="_blank" href="<?php echo($imagencot2); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-file-pdf-o bigger-110 "> </i>
              </a>

                <?php
            }else{
                echo("<i class='fa fa-close bigger-110 bg-red'> </i>");
            } 

            ?>


                    <?php echo($cotizacion2de."<br>".$pago2);?></th>
                  <th>
                    
                     <?php if ($imagencot3!='') {
                ?>

             <a target="_blank" href="<?php echo($imagencot3); ?>"  class="tooltip-primary text-primary" title="Ver Soporte">
                <i class="fa fa-file-pdf-o bigger-110 "> </i>
              </a>

                <?php
            }else{
                echo("<i class='fa fa-close bigger-110 bg-red'> </i>");
            } 

            ?>


                    <?php echo($cotizacion3de."<br>".$pago3);?></th>
                   <th>Confirmar</th>
                </tr>
               
<?php
   

# ======  End of Validación Cotización 1 por Item  =======

    if ($tiporeq == 'Insumos') {
        $insumo_id_insumo  = ObtenerIdInsumo($despachounico);
        $cantidad          = ObtenerCantidadSolicitada($despachounico);
        $detallesolicitado = Insumos::obtenerNombreInsumo($insumo_id_insumo);
        $valorpromedio= Insumos::Valorpromediocompra($insumo_id_insumo);
        $unidadmedidaid    = Insumos::obtenerUnidadmed($insumo_id_insumo);
        $nomunidadmedida   = Unidadesmed::obtenerNombre($unidadmedidaid);
        $label             = 'Solicitud Insumo: ';
    } elseif ($tiporeq == 'Servicios') {
        $servicio_id_servicio = ObtenerIdServicio($despachounico);
        $cantidad          = ObtenerCantidadSolicitada($despachounico);
        $detallesolicitado    = Servicios::obtenerNombre($servicio_id_servicio);
        $label                = 'Solicitud Servicio: ';
    } else {

        $equipo_id_equipo  = ObtenerIdEquipo($despachounico);
        $cantidad          = ObtenerCantidadSolicitada($despachounico);
        $detallesolicitado = Equipostemporales::obtenerNombre($equipo_id_equipo);
        $unidadmedidaid    = Equipostemporales::obtenerUnidadmed($equipo_id_equipo);
        $nomunidadmedida   = Unidadesmed::obtenerNombre($unidadmedidaid);

        $label             = 'Solicitud Equipo: ';
    }
    ?>
            <tr>
    <form role="form" action="?controller=requisicionesitems&action=guardarcotizacionmultiple&&id=<?php echo ($idreq); ?>&&des=<?php echo($itemsget); ?>" method="POST" enctype="multipart/form-data">

            <?php
date_default_timezone_set("America/Bogota");
    $TiempoActual = date('Y-m-d H:i:s');
     $campofecha = date('Y-m-d');
    ?>

          <input type="hidden" name="estado_cotizacion" value="1">
          <input type="hidden" name="ordencompra_num" value="0">
          <input type="hidden" name="cantidadcot" value="<?php echo ($cantidad); ?>">
          <input type="hidden" name="insumo_id_insumo" value="<?php echo ($insumo_id_insumo) ?>">
          <input type="hidden" name="servicio_id_servicio" value="<?php echo ($servicio_id_servicio) ?>">
          <input type="hidden" name="equipo_id_equipo" value="<?php echo ($equipo_id_equipo) ?>">
          <input type="hidden" name="requisicion_id" value="<?php echo ($listRq); ?>">
          <input type="hidden" name="item_id" value="<?php echo ($despachounico); ?>">
          <input type="hidden" name="usuario_creador" value="<?php echo ($IdSesion); ?>">
          <input type="hidden" name="usuario_aprobador" value="0">
          <input type="hidden" name="marca_temporal" value="<?php echo ($TiempoActual); ?>">
          <input type="hidden" name="fecha_reporte" value="<?php echo ($campofecha); ?>">

          <input type="hidden" name="proveedor1" value="<?php echo ($idprovcotizacion1) ?>">
          <input type="hidden" name="proveedor2" value="<?php echo ($idprovcotizacion2) ?>">
          <input type="hidden" name="proveedor3" value="<?php echo ($idprovcotizacion3) ?>">

          <input type="hidden"name="formapago1" value="<?php echo ($pago1) ?>">
          <input type="hidden" name="formapago2" value="<?php echo ($pago2) ?>">
          <input type="hidden" name="formapago3" value="<?php echo ($pago3) ?>">


          <input type="hidden" name="cotizacion1" value="Cotizacion 1">
          <input type="hidden" name="cotizacion2" value="Cotizacion 2">
          <input type="hidden" name="cotizacion3" value="Cotizacion 3">

           <?php echo ($campovalidacion1); ?>
            <?php echo ($campovalidacion2); ?>
           <?php echo ($campovalidacion3); ?>


        <td>RQ<?php echo ($listRq . "-" . $despachounico); ?></td>
        <td>

            <?php echo ("<strong>" . $cantidad . " " . $nomunidadmedida . "</strong><br> " . $detallesolicitado . ""); ?>
                <br>
                <strong class="text-success">Valor Promedio Histórico <br>
                    <?php echo("$ ".number_format($valorpromedio,0));?>
                </strong>
            </td>

        <td>
        
      <?php 
      if ($idcotizaciondelete=="") {
          ?>
           <input required id="<?php echo ($despachounico . "-demo"); ?>" class='input input-sm' type="hidden" name="valor_cot1" value="<?php echo ($valor1); ?>">

            <input disabled="true"  id="<?php echo ($despachounico . "-demo2"); ?>" class='input input-sm' type="text" name="valor_cot11" value="<?php echo ($valor1); ?>">

          <?php
      }else{
        ?>
          <input required id="<?php echo ($despachounico . "-demo"); ?>" class='input input-sm' type="text" name="valor_cot1" value="<?php echo ($valor1); ?>">
            <?php echo ($btneliminar); ?>

        <?php
      }
       ?>
           
        
        </td>
         <td>

         <?php 
      if ($idcotizaciondelete2=="") {
          ?>

           <input disabled="true"  id="<?php echo ($despachounico . "-demo2"); ?>" class='input input-sm' type="text" name="valor_cot22" value="<?php echo ($valor2); ?>">
    
            <input  id="<?php echo ($despachounico . "-demo2"); ?>" class='input input-sm' type="hidden" name="valor_cot2" value="<?php echo ($valor2); ?>">
              <?php echo ($btneliminar2); ?>
          <?php
      }else{
        ?>

          <input   id="<?php echo ($despachounico . "-demo2"); ?>" class='input input-sm' type="text" name="valor_cot2" value="<?php echo ($valor2); ?>">
              <?php echo ($btneliminar2); ?>

          <?php
      }
       ?>



        </td>
         <td>
          <?php 
      if ($idcotizaciondelete3=="") {
          ?>   
           <input disabled="true"  id="<?php echo ($despachounico . "-demo2"); ?>" class='input input-sm' type="text" name="valor_cot33" value="<?php echo ($valor3); ?>">

            <input id="<?php echo ($despachounico . "-demo3"); ?>" class='input input-sm' type="hidden" name="valor_cot3" value="<?php echo ($valor3); ?>">
             <?php echo ($btneliminar3); ?>
      <?php
      }else{
        ?>
         <input id="<?php echo ($despachounico . "-demo3"); ?>" class='input input-sm' type="text" name="valor_cot3" value="<?php echo ($valor3); ?>">
             <?php echo ($btneliminar3); ?>

         <?php
      }
       ?>

        </td>
        <td>
            <?php 
    if ($nomproveedor1 == "") {
       ?>
        <button disabled="true" type="submit" id="comprobarDatos<?php echo ($despachounico); ?>" class="btn btn-success fa fa-check"></button>
       <?php
    } else {
       ?>

        <button type="submit" id="comprobarDatos<?php echo ($despachounico); ?>" class="btn btn-success fa fa-check"></button>

       <?php
    }

             ?>

           
        </td>
    </form>

<script src="dist/js/jquery.maskMoney.js" type="text/javascript"></script>
    <script type="text/javascript">
$("#<?php echo ($despachounico . "-demo"); ?>,#<?php echo ($despachounico . "-demo2"); ?>,#<?php echo ($despachounico . "-demo3"); ?>").maskMoney({
prefix:'$ ', // The symbol to be displayed before the value entered by the user
allowZero:true, // Prevent users from inputing zero
allowNegative:true, // Prevent users from inputing negative values
defaultZero:false, // when the user enters the field, it sets a default mask using zero
thousands: '.', // The thousands separator
decimal: '.' , // The decimal separator
precision: 0, // How many decimal places are allowed
affixesStay : true, // set if the symbol will stay in the field after the user exits the field.
symbolPosition : 'left' // use this setting to position the symbol at the left or right side of the value. default 'left'
}); //
        </script>
<script type="text/javascript">
  jQuery(document).ready(function($){
    $(document).ready(function() {
        $('<?php echo ("#" . $despachounico); ?>mi-selector,<?php echo ("#" . $despachounico); ?>mi-selector2,<?php echo ("#" . $despachounico); ?>mi-selector3').select2();
    });
});
</script>


     </tr>

            <?php
}
?>

              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>


                        </div>
                      </div>

                    </div> <!-- FIN DE ROW-->
                </div><!-- FIN DE CONTAINER FORMULARIO-->
            </div> <!-- Fin Row -->
        </div> <!-- Fin Container -->
    </div> <!-- Fin Content -->



</div> <!-- Fin Content-Wrapper -->

<script>
  $(function () {

    $('.select2').select2()


  })
</script>
<script src="dist/js/jquery.maskMoney.js" type="text/javascript"></script>

<style type="text/css">
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: navy;
        border: 1px solid #aaa;
        border-radius: 4px;
        cursor: default;
        float: left;
        margin-right: 5px;
        margin-top: 5px;
        padding: 0 5px;
    }

</style>
<script type="text/javascript">
  $(function () {
   $('[data-toggle="tooltip"]').tooltip();
  })
</script>



<script>
    //CARGA DE IMAGENES
    $(document).ready(function(){
    // Basic
        $('.dropify').dropify();
        $('.dropify2').dropify();
    });

    $('.dropify').dropify({
                messages: {
                    'default': 'Arrastra y suelta un archivo aquí o haz clic',
                    'replace': 'Arrastra y suelta o haz clic para reemplazar',
                    'remove':  'Remover',
                    'error':   'Oops, sucedió algo mal.'
                },
                error: {
                        'fileSize': 'El tamaño del archivo es demasiado grande ({{ value }} maximo).',
                        'imageFormat': 'El formato de imagen no está permitido ({{ value }} solamente).',
                        'fileExtension': 'El archivo no está permitido ({{ value }} solamente).'
                }
    });

    var drEvent = $('.dropify').dropify();

    drEvent.on('dropify.beforeClear', function(event, element){
        return confirm("Realmente desea eliminar la imagen \"" + element.filename + "\" ?");
    });

    drEvent.on('dropify.error.fileSize', function(event, element){
        alert('Imagen demasiado grande!');
    });
    drEvent.on('dropify.error.minWidth', function(event, element){
        alert('Min width error message!');
    });
    drEvent.on('dropify.error.maxWidth', function(event, element){
        alert('Max width error message!');
    });
    drEvent.on('dropify.error.minHeight', function(event, element){
        alert('Min height error message!');
    });
    drEvent.on('dropify.error.maxHeight', function(event, element){
        alert('Max height error message!');
    });
    drEvent.on('dropify.error.imageFormat', function(event, element){
        alert('Error en el formato de la imagen!');
    });

    drEvent.on('dropify.errors', function(event, element){
        alert('Ha ocurrido un error!');
    });
      var drEvent = $('.dropify').dropify();

    drEvent.on('dropify.afterClear', function(event, element){
        alert('Archivo Eliminado');
    });
</script>
