<!-- Content Wrapper. Contains page content -->

<?php 

// Promedio Facturación
               for ($i=1; $i <13 ; $i++) { 
                  $arreglof=(PromedioDiarioFact($i,$anoactual));
                                    $CadenaAt=explode(",", $arreglof);
                                    $longitudAt = count($CadenaAt)-1;
                                    $diasterraje = count($CadenaAt)-1;
                                    $sumaAt=array_sum($CadenaAt);
                                    $max3=max($CadenaAt);
                                    $promedio3=$sumaAt/$longitudAt;
                }
 ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DashBoard Perfil Equipos
        <small>version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
    <div class="col-sm-12 col-xs-12">
       <a href="?controller=cajas&&action=todos">
        <div class="col-md-3  col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-dollar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ver mi </span>
              <span class="info-box-number">Caja</span><br>
              <span class="info-box-number">Menores</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
      <a href="?controller=reportes&&action=combustibles">
        <div class="col-md-3 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-train"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Registro </span>
              <span class="info-box-number">Combustible </span><small>últimos 15 días</small>
              <span class="info-box-number"><?php echo round(($Sumacombustibledia),1); ?> GL.</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
     
      <a href="?controller=reportes&&action=horas">
        <div class="col-md-3  col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-clock-o"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Registro </span>
              <span class="info-box-number">Reporte Hr/Kl</span><br>
              <span class="info-box-number">Diario</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
        <a href="?controller=horasmq&&action=horas">
        <div class="col-md-3  col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-clock-o"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Registro </span>
              <span class="info-box-number">Reporte Horas</span><br>
              <span class="info-box-number">Máquina</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>

       <a href="?controller=equipos&&action=todos">
        <div class="col-md-3  col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-dashboard"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Módulo </span>
              <span class="info-box-number">Volquetas</span><br>
              <span class="info-box-number">Equipos</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
       <a href="?controller=equipos&&action=todosmantenimiento">
        <div class="col-md-3  col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-truck"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Informe  </span>
              <span class="info-box-number">Repuestos</span><br>
              <span class="info-box-number">Equipos</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
       <a href="?controller=equipos&&action=todosestados">
        <div class="col-md-3  col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-truck"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Informe  </span>
              <span class="info-box-number">Estados</span><br>
              <span class="info-box-number">Equipos</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
       <a href="?controller=gestiondocumentaleq&&action=listaequipos">
        <div class="col-md-3  col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-file-pdf-o"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Gestión  </span>
              <span class="info-box-number">Documental</span><br>
              <span class="info-box-number">Equipos</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
        <a href="?controller=reportes&&action=despachosclientesf">
        <div class="col-md-3  col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-exchange"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Registrar  </span>
              <span class="info-box-number">Despacho</span><br>
              <span class="info-box-number">Equipo</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>
       </a>
        <a href="?controller=reportes&&action=despachosclientes">
        <div class="col-md-3  col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Informe  </span>
              <span class="info-box-number">x</span><br>
              <span class="info-box-number">Cliente</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </a>

    </div>
     <div class="col-sm-12 col-xs-12">
         <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <b>Indicadores  // Online <i class="fa fa-circle text-success"></i></b>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b><i>Número de Fletes </i></b> <a class="pull-right"> <?php $FletesDiarios=FletesDiarios($FechaInicioDiaActual,$FechaFinalDiaActual)?> <?php echo utf8_encode($FletesDiarios); ?></a>
                </li>
                 <li class="list-group-item">
                  <b><i>Km Recorridos</i></b> <a class="pull-right"> <?php $KilometrajeDiarios=KilometrajeDiarios($FechaInicioDiaActual,$FechaFinalDiaActual)?> <?php echo utf8_encode($KilometrajeDiarios); ?> Km </a>
                </li>
                 <li class="list-group-item">
                  <b><i>M3 Transportados</i></b> <a class="pull-right"><?php $MetrajeDiarios=MetrajeDiarios($FechaInicioDiaActual,$FechaFinalDiaActual)?> <?php echo utf8_encode($MetrajeDiarios); ?> m3 </a>
                </li>
                 <li class="list-group-item">
                  <b><i>Galones ACPM</i></b> <a class="pull-right"><?php $Sumacombustibledia=ReporteCombustibledia($FechaInicioDiaActual,$FechaFinalDiaActual); ?> <?php echo(round($Sumacombustibledia,2)) ?>Gl </a>
                </li>
                
                 <li class="list-group-item">
                  <b><i>Gasto ACPM</i></b> <a class="pull-right"><?php $GastoCombustibledia=GastoCombustibledia($FechaInicioDiaActual,$FechaFinalDiaActual)?> <?php echo utf8_encode("$".number_format($GastoCombustibledia,0)); ?></a>
                </li>
                
                 <li class="list-group-item">
                  <b><i>Gastos (últimos 15 días) </i></b> <a class="pull-right"> m3 </a>
                </li>
               
                 <li class="list-group-item">
                  <b><i>Facturación Promedio</i></b> <a class="pull-right"> <?php echo utf8_encode("$".number_format($promedio3,0)); ?></a>
                </li>
                 <li class="list-group-item">
                  <b>Facturación <i>(Hoy)</i></b> <b><a class="pull-right"><?php $MaterialFact=FacturacionDiaTotal($FechaInicioDiaActual,$FechaFinalDiaActual)?> <?php echo utf8_encode("$".number_format($MaterialFact,0)); ?></a></b>
                </li>
                
              </ul>

            </div>
            <!-- /.box-body -->
          </div>
     </div>
     <div class="col-md-3">
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Estado Volquetas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table style="font-size: 12px;" class="table table-condensed">
                <tbody><tr>
                 
                  <th>Equipo</th>
                  <th style="width: 40px">Estado</th>
                </tr>
                 <?php
         

          $res=Equipos::obtenerListaVolquetasAsf();
            foreach ($res as $campo){
            $id_equipo = $campo['id_equipo'];
            $placa = $campo['placa'];
            $estadoequipo=UltimoEstadoEquipo($id_equipo);
            ?>
                <tr>
                   <td><a href="?controller=equipos&&action=timelineestados&&id=<?php echo $id_equipo; ?>"><?php echo utf8_decode($placa); ?></a></td>
                 
                  <td>
                     <?php 
                    if ($estadoequipo=='') {
                      echo("<a href='?controller=equipos&&action=estado'><span class='label label-default'>Sin Actualizar</span></a>");
                    }
                    elseif ($estadoequipo=='Operativo') {
                      echo("<a href='?controller=equipos&&action=estado'><span class='label label-success'>Operativo</span></a>");
                    }
                     elseif ($estadoequipo=='En Mantenimiento') {
                      echo("<a href='?controller=equipos&&action=estado'><span class='label label-warning'>En Mantenimiento</span></a>");
                    }
                    elseif ($estadoequipo=='Fuera de Servicio') {
                      echo("<a href='?controller=equipos&&action=estado'><span class='label label-danger'>Fuera de Servicio</span></a>");
                    }

                     ?>
                  </td>


                  
                </tr>
               <?php 
             }
                ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
     </div>

     <div class="col-md-4">
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Otros Equipos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table style="font-size: 12px;" class="table table-condensed">
                <tbody><tr>
                 
                  <th>Equipo</th>
                  <th style="width: 40px">Estado</th>
                </tr>
                 <?php
         

          $res=Equipos::ListaEquiposdiferentes();
            foreach ($res as $campo){
            $id_equipo = $campo['id_equipo'];
            $placa = $campo['placa'];
            $nombre_equipo = $campo['nombre_equipo'];
            $estadoequipo=UltimoEstadoEquipo($id_equipo);
            ?>
                <tr>
                  
                  <td><a href="?controller=equipos&&action=timelineestados&&id=<?php echo $id_equipo; ?>"><?php echo utf8_decode($nombre_equipo); ?></a></td>
                 
                  <td>
                    <?php 
                    if ($estadoequipo=='') {
                      echo("<a href='?controller=equipos&&action=estado'><span class='label label-default'>Sin Actualizar</span></a>");
                    }
                    elseif ($estadoequipo=='Operativo') {
                      echo("<a href='?controller=equipos&&action=estado'><span class='label label-success'>Operativo</span></a>");
                    }
                     elseif ($estadoequipo=='En Mantenimiento') {
                      echo("<a href='?controller=equipos&&action=estado'><span class='label label-warning'>En Mantenimiento</span></a>");
                    }
                    elseif ($estadoequipo=='Fuera de Servicio') {
                      echo("<a href='?controller=equipos&&action=estado'><span class='label label-danger'>Fuera de Servicio</span></a>");
                    }

                     ?>
                  </td>
                  
                </tr>
               <?php 
             }
                ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
     </div>
       

 
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->