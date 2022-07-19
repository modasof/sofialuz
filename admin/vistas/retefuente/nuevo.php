<!-- CCS Y JS PARA LA CARGA DE IMAGEN -->
<script src="plugins/dropify/dropify.min.js"></script>
<link rel="stylesheet" href="plugins/dropify/dropify.min.css">
<div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Agregar
              	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </h3>

              <div class="box-tools pull-right">
              <!--   <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button> -->
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<form role="form" action="?controller=retefuente&&action=guardar" method="POST" enctype="multipart/form-data" autocomplete="off">
								<input type="hidden" name="estado_retefuente" value="1">
							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Agregar Nueva Retención</h3>
								</div>
							<div class="row">
								 <div class="col-sm-6">
									<div class="form-group">
									  <label for="sel1">Seleccione el valor de la retención:</label>
									  <select class="form-control" id="valor_retefuente" name="valor_retefuente" required>
										<option value="" selected>Seleccionar</option>
										<option value="0.001">0.1%</option>
										<?php 
											 for ($i=1; $i <41 ; $i++) { 

											 $listado = $i/2;
											 $valorguardar = $listado/100;

											 echo ("<option value = '".$valorguardar."'>".$listado."%</option>");
											 }
										 ?>
									  </select>
									</div>
								</div>
								 <div class="col-sm-6">
									<div class="form-group">
									  <label for="nombres">Concepto Retención</label>
									   <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-check"></i></span>
               <input type="text" name="alias_retefuente" value="" class="form-control" id="alias_retefuente" placeholder="Ej. Retención Servicio Restaurante" maxlength="150" required>
              </div>
									 
									</div>
								  </div>
							</div>
							<div class="card-footer">
							  <button name="Submit" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Haz clic aqui para guardar la información">Guardar</button>
							</div>
						  </div>
						  <!-- /.card -->

	</form>
	<hr>
</div>

<script type="text/javascript">
  $(function () {
   $('[data-toggle="tooltip"]').tooltip();
  })
</script>

