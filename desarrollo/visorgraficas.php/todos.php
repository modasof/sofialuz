<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

    
ini_set('display_errors', '0');
include_once 'modelos/visorgraficas.php';
include_once 'controladores/visorgraficasController.php';

/*if (empty($campos)){
    $campos = '';
    echo 'paso';
}*/
if($_GET['id']=='NA'){
  $_SESSION['id_equipo']='';
}else{
  $_SESSION['id_equipo']=$_GET['id'];
}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Informe Volquetas</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=index&&action=index">Inicio</a></li>
            <li class="breadcrumb-item active">Informe Volquetas</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
    <!-- /.content-header -->

  <!-- Main content -->
    <div style="height: 80px; width: 100%;"> </div> 
    <div class="container">
        <div class="row">
            <div class="col-sm-4" >
                <div class="row">
                    <div class="col-sm-6 ">
                        <div class="form-group">
                          <label>Año consulta: <span>*</span></label>
                           <select class="form-control" id="anio_consulta" name="anio_consulta" required="" >
                              <option value="0" selected="">Seleccione Año</option>
                              <?php if($_SESSION['htmlAnio']==''){echo $strHtmlAnio;}else{echo $_SESSION['htmlAnio'];} ?>
                          </select>
                        </div>                    
                    </div>
                    <div class="col-sm-6 ">
                        <div class="form-group">
                            <label>Mes Consulta </label>
                           <select class="form-control" id="mes_consulta" name="mes_consulta" required="" >
                              <option value="0" selected="">Seleccione Mes</option>
                              <?php if($_SESSION['htmlMes']==''){echo '<option value="01" >Enero</option>
                                                            <option value="02" >Febrero</option>
                                                            <option value="03" >Marzo</option>
                                                            <option value="04" >Abril</option>
                                                            <option value="05" >Mayo</option>
                                                            <option value="06" >Junio</option>
                                                            <option value="07" >Julio</option>
                                                            <option value="08" >Agosto</option>
                                                            <option value="09" >Septiembre</option>
                                                            <option value="10" >Octubre</option>
                                                            <option value="11" >Noviembre</option>
                                                            <option value="12" >Diciembre</option>';}else{echo $_SESSION['htmlMes'];} ?>
                          </select>                            
                        </div>
                    </div>                        
                </div>
                <div class="row">
                  <div class="col-sm-2">
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="Submit" onclick="mostrarInforme();">Realizar Consulta</button>   
                        </div>                     
                  </div>
                  <div class="col-sm-10">
                      <div class="form-group">
                      </div>  
                  </div>                  
                </div>
            </div> 
            <div class="col-sm-4" >
                <div class="row">
                    <div class="col-sm-6 ">
                      <div class="form-group">
                      </div>                      
                    </div>
                    <div class="col-sm-6 ">
                      <div class="form-group">
                      </div>                      
                    </div>                        
                </div>
                <div class="row">
                  <div class="col-sm-2">
                      <div class="form-group">
                      </div>                    
                  </div>
                  <div class="col-sm-10">
                      <div class="form-group">
                      </div>                    
                  </div>                  
                </div>              
            </div>
            <div class="col-sm-4" >
                <div class="row">
                    <div class="col-sm-6 ">
                      <div class="form-group">
                      </div>                         
                    </div>
                    <div class="col-sm-6 ">
                      <div class="form-group">
                      </div>                         
                    </div>                        
                </div>
                <div class="row">
                  <div class="col-sm-2">
                      <div class="form-group">
                      </div>                       
                  </div>
                  <div class="col-sm-10">
                      <div class="form-group">
                      </div>                       
                  </div>                  
                </div>              
            </div>        
        </div>

        <div class="row">
          <div class="col-sm-12" style="background-color: #D8D8D8;"></div>
        </div>
        
        <?php 
              if($strHtml!=''){
                 echo $strHtml;
              }
              
        ?>


        <div style="height: 80px; width: 100%;"> </div> 
    </div> <!-- Fin Content-Wrapper -->
</div>






<script>
function mostrarInforme(){

  var anio = document.getElementById("anio_consulta").value;
  var mes = document.getElementById("mes_consulta").value;
  try{
        window.location.href="?controller=estadisticavolqueta&&action=buscarReporteVolquetas&&anio="+anio+"&&mes="+mes;

  }catch(e){
      alert('error' + e);
  }

}





function eliminar(id){
   eliminar=confirm("¿Deseas eliminar este registro?");
   if (eliminar)
     window.location.href="?controller=marcasu&&action=eliminar&&id="+id+"&&fecha_ini=";
else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
    alert('No se ha podido eliminar el registro...')
}
</script>

<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>


<!-- page script -->
<script>
  $(function () {
    $('#cotizaciones').DataTable({
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



