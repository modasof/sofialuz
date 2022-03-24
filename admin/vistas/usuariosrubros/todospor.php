<?php
ini_set('display_errors', '1');
include_once 'modelos/clientes.php';
include_once 'controladores/clientesController.php';

include_once 'modelos/rubros.php';
include_once 'controladores/rubrosController.php';

include_once 'modelos/usuarios.php';
include_once 'controladores/usuariosController.php';

$RolSesion = $_SESSION['IdRol'];
$IdSesion  = $_SESSION['IdUser'];

$UsuarioSel     = $_GET['id_usuario'];
$nombre_usuario = Usuarios::obtenerNombreUsuario($UsuarioSel);
$rol_usuario    = Usuarios::obtenerRolUsuario($UsuarioSel);
$nombre_rol     = Usuarios::obtenerNombreRol($rol_usuario);

?>

<!-- DataTables -->
  <!-- <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.css"> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript">
  jQuery(document).ready(function($){
    $(document).ready(function() {
        $('.mi-selector0').select2();
    });
});
</script>
<script type="text/javascript">
  jQuery(document).ready(function($){
    $(document).ready(function() {
        $('.mi-selector').select2();
    });
});
</script>



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Usuario <?php echo utf8_encode($nombre_usuario) ?><br>
            Rol:<?php echo utf8_encode($nombre_rol) ?>
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=usuarios&&action=todos">Usuarios</a></li>

          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
    <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">

    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> Asignar Rubros
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </h3>

        <a href="?controller=usuariosrubros&&action=activartodo&&id_usuario=<?php echo ($UsuarioSel) ?>&&rol=<?php echo($rol_usuario) ?>" class="btn btn-success" style="float: right;"><i class="fa fa-check bigger-110 "></i> Conceder Todo</a>

         <a href="?controller=usuariosrubros&&action=activarporRol&&id_usuario=<?php echo ($UsuarioSel) ?>&&rol=<?php echo($rol_usuario) ?>" class="btn btn-warning" style="float: right;"><i class="fa fa-check bigger-110 "></i> Conceder por Rol</a>

    

            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="cotizaciones" class="table table-hover table-striped table-bordered">
          <thead>
            <tr>
               <th>Idº</th>
              <th>Rubro</th>
              <th>Permiso Concedido</th>
            </tr>
          </thead>
          <tbody>
              <?php
$rubros = Rubros::obtenerListaRubros();
foreach ($rubros as $campo) {
    $id_rubro     = $campo['id_rubro'];
    $nombre_rubro = $campo['nombre_rubro'];
    ?>
                       <tr>
              <td><i class="fa fa-th-list"> </i></td>
              <td class=""> <?php echo ($nombre_rubro); ?> </td>
              <td>

              <?php
$validacion = Usuariosrubros::verificarrubro($UsuarioSel, $id_rubro);

    if ($validacion >= "1") {
        ?>

              <a href="#" onclick="desactivarpermiso(<?php echo $UsuarioSel; ?>,<?php echo $id_rubro; ?>);" class="tooltip-primary text-success" data-rel="tooltip" data-placement="top" title="" data-original-title="Desactivar Permisos">
                <i class="fa fa-check bigger-110 "></i>
              </a>

                  <?php
} else {

        ?>

                    <a href="#" onclick="activarpermiso(<?php echo $UsuarioSel; ?>,<?php echo $id_rubro; ?>,<?php echo $rol_usuario; ?>);" class="tooltip-primary text-danger" data-rel="tooltip" data-placement="top" title="" data-original-title="Activar Permisos">
                <i class="fa fa-close bigger-110 "></i>
                </a>


                  <?php
}

    ?>




              </td>
            </tr>

             <?php }?>
       </tbody>
     </table>
</div>
</div>

    <div class="container-fluid">
      <div class="row">



      </div> <!-- Fin Row -->
    </div> <!-- Fin Container -->
  </div> <!-- Fin Content -->
</div> <!-- Fin Content-Wrapper -->


<script>
function desactivarpermiso(id,rubro){
   desactivarpermiso=confirm("¿Deseas desactivar este rubro?");
   if (desactivarpermiso)
     window.location.href="?controller=usuariosrubros&&action=desactivarrubroPor&&id_usuario="+id+"&&rubro="+rubro;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido desactivar este permiso...')
}
</script>

<script>
function activarpermiso(id,rubro,rol){
   activarpermiso=confirm("¿Deseas activar este rubro?");
   if (activarpermiso)
     window.location.href="?controller=usuariosrubros&&action=activarrubroPor&&id_usuario="+id+"&&rubro="+rubro+"&&rol="+rol;
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido activar este permiso...')
}
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

