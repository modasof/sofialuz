<?php 
  include_once 'modelos/consolidados.php';
  include_once 'controladores/consolidadosController.php';
 ?>
  <aside style="display: none;" class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-file"> Cuentas</i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-file"></i> Equipos</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Expiran (Cuentas)</h3>
        <ul class="control-sidebar-menu">
           <?php
            date_default_timezone_set("America/Bogota");
            $TiempoActual = date('Y-m-d');

            $res=Consolidados::Totaldocumentoscuentas();
$campos = $res->getCampos();
foreach($campos as $campo){
            $idregistro = $campo['id_registro'];
            $imagen = $campo['imagen'];
            $documento_id_documento = $campo['documento_id_documento'];
            $modulo_gestion = $campo['modulo_id_modulo'];
            $nombredocumento=Consolidados::obtenerNombreDocumento($documento_id_documento);
            $cuenta_id_cuenta = $campo['cuenta_id_cuenta'];
            $nombrecuenta=Consolidados::obtenerNombreCuenta($cuenta_id_cuenta);
            $alerta = $campo['alerta'];
            $fecha_expiracion = $campo['fecha_expiracion'];
            $marca_temporal = $campo['marca_temporal'];

             if ($fecha_expiracion=='0000-00-00') {
              $expira="";
              $totaldias="";
            }
            else
            {
               $expira=fechalarga($fecha_expiracion);
               $totaldias=dias_transcurridos($TiempoActual,$fecha_expiracion);
            }

            ?>

              <?php 
              if ($alerta=="Si") {
                 if ($totaldias>30) {
                  ?>
        <li>
            <a href="?controller=gestiondocumental&&action=editar&&idreg=<?php echo $idregistro;?>&&id_modulo=<?php echo($modulo_gestion); ?>&&id=<?php echo($cuenta_id_cuenta); ?>">
              <i class="menu-icon fa fa-bell bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cta. <?php echo utf8_encode($nombrecuenta) ?></h4>
                <h4 class="control-sidebar-subheading"><?php echo utf8_encode($nombredocumento); ?></h4>
                <p>Expira el: <?php echo($expira) ?></p>
                <p>Quedan: <?php echo($totaldias) ?> días</p>
              </div>
            </a>
        </li>
                  <?php
                }
                elseif ($totaldias<30 && $totaldias>15) {
                  ?>
        <li>
            <a href="?controller=gestiondocumental&&action=editar&&idreg=<?php echo $idregistro;?>&&id_modulo=<?php echo($modulo_gestion); ?>&&id=<?php echo($cuenta_id_cuenta); ?>">
              <i class="menu-icon fa fa-bell bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cta. <?php echo utf8_encode($nombrecuenta) ?></h4>
                <h4 class="control-sidebar-subheading"><?php echo utf8_encode($nombredocumento); ?></h4>
                <p>Expira el: <?php echo($expira) ?></p>
                <p>Quedan: <?php echo($totaldias) ?> días</p>
              </div>
            </a>
        </li>
                  <?php
                }
                elseif ($totaldias<15 && $totaldias>=1)
                {
                  ?>
        <li>
            <a href="?controller=gestiondocumental&&action=editar&&idreg=<?php echo $idregistro;?>&&id_modulo=<?php echo($modulo_gestion); ?>&&id=<?php echo($cuenta_id_cuenta); ?>">
              <i class="menu-icon fa fa-bell bg-red"></i>
              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cta. <?php echo utf8_encode($nombrecuenta) ?></h4>
                <h4 class="control-sidebar-subheading"><?php echo utf8_encode($nombredocumento); ?></h4>
                <p>Expira el: <?php echo($expira) ?></p>
                <p>Quedan: <?php echo($totaldias) ?> días</p>
              </div>
            </a>
        </li>
                  <?php
                }
                elseif($totaldias==0)
                {
                  echo "<span class='badge bg-red'>Documento Vence Hoy</span>";
                }
                else
                {
                  echo "<span class='badge bg-red'>Documento Vencido</span>";
                }
              }
               ?>
          <?php 
        }
           ?>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 style="display: none;" class="control-sidebar-heading">Tasks Progress</h3>
        <ul style="display: none;" class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->

      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
          <h3 class="control-sidebar-heading">Expiran (Equipos)</h3>
           <ul class="control-sidebar-menu">
           <?php
            date_default_timezone_set("America/Bogota");
            $TiempoActual = date('Y-m-d');

            $res=Consolidados::Totaldocumentosequipos();
$campos = $res->getCampos();
foreach($campos as $campo){
            $idregistro = $campo['id_registro'];
            $imagen = $campo['imagen'];
            $documento_id_documento = $campo['documento_id_documento'];
            $modulo_gestion = $campo['modulo_id_modulo'];
            $nombredocumento=Consolidados::obtenerNombreDocumento($documento_id_documento);
            $cuenta_id_cuenta = $campo['cuenta_id_cuenta'];
            $nombrecuenta=Consolidados::obtenerNombreCuenta($cuenta_id_cuenta);
            $alerta = $campo['alerta'];
            $fecha_expiracion = $campo['fecha_expiracion'];
            $marca_temporal = $campo['marca_temporal'];

             if ($fecha_expiracion=='0000-00-00') {
              $expira="";
              $totaldias="";
            }
            else
            {
               $expira=fechalarga($fecha_expiracion);
               $totaldias=dias_transcurridos($TiempoActual,$fecha_expiracion);
            }

            ?>

              <?php 
              if ($alerta=="Si") {
                 if ($totaldias>30) {
                  ?>
        <li>
            <a href="?controller=gestiondocumental&&action=editar&&idreg=<?php echo $idregistro;?>&&id_modulo=<?php echo($modulo_gestion); ?>&&id=<?php echo($cuenta_id_cuenta); ?>">
              <i class="menu-icon fa fa-bell bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cta. <?php echo utf8_encode($nombrecuenta) ?></h4>
                <h4 class="control-sidebar-subheading"><?php echo utf8_encode($nombredocumento); ?></h4>
                <p>Expira el: <?php echo($expira) ?></p>
                <p>Quedan: <?php echo($totaldias) ?> días</p>
              </div>
            </a>
        </li>
                  <?php
                }
                elseif ($totaldias<30 && $totaldias>15) {
                  ?>
        <li>
            <a href="?controller=gestiondocumental&&action=editar&&idreg=<?php echo $idregistro;?>&&id_modulo=<?php echo($modulo_gestion); ?>&&id=<?php echo($cuenta_id_cuenta); ?>">
              <i class="menu-icon fa fa-bell bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cta. <?php echo utf8_encode($nombrecuenta) ?></h4>
                <h4 class="control-sidebar-subheading"><?php echo utf8_encode($nombredocumento); ?></h4>
                <p>Expira el: <?php echo($expira) ?></p>
                <p>Quedan: <?php echo($totaldias) ?> días</p>
              </div>
            </a>
        </li>
                  <?php
                }
                elseif ($totaldias<15 && $totaldias>=1)
                {
                  ?>
        <li>
            <a href="?controller=gestiondocumental&&action=editar&&idreg=<?php echo $idregistro;?>&&id_modulo=<?php echo($modulo_gestion); ?>&&id=<?php echo($cuenta_id_cuenta); ?>">
              <i class="menu-icon fa fa-bell bg-red"></i>
              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cta. <?php echo utf8_encode($nombrecuenta) ?></h4>
                <h4 class="control-sidebar-subheading"><?php echo utf8_encode($nombredocumento); ?></h4>
                <p>Expira el: <?php echo($expira) ?></p>
                <p>Quedan: <?php echo($totaldias) ?> días</p>
              </div>
            </a>
        </li>
                  <?php
                }
                elseif($totaldias==0)
                {
                  echo "<span class='badge bg-red'>Documento Vence Hoy</span>";
                }
                else
                {
                  echo "<span class='badge bg-red'>Documento Vencido</span>";
                }
              }
               ?>
          <?php 
        }
           ?>
        </ul>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>