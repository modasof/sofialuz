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
<form role="form" action="?controller=documentos&&action=guardar" method="POST" enctype="multipart/form-data" autocomplete="off">
								<input type="hidden" name="estado_documento" value="1">
							  <div class="card-body">
								<div class="card-header">
								  <h3 class="card-title">Agregar Nuevo Documento</h3>
								</div>
							<div class="row">
								 <div class="col-sm-6">
									<div class="form-group">
									  <label for="sel1">Seleccione el módulo al cual está asociado:</label>
									  <select class="form-control" id="modulo_id_modulo" name="modulo_id_modulo" required>
										<option value="" selected>Seleccione un módulo</option>
										<?php
										$rubros = Documentos::obtenerRubros();
										foreach ($rubros as $campo){
											$nombre_modulo = $campo['nombre_modulo'];
											$id_modulo = $campo['id_modulo'];
										?>
										<option value="<?php echo $id_modulo; ?>"><?php echo $nombre_modulo; ?></option>
										<?php } ?>
									  </select>
									</div>
								</div>
								 <div class="col-sm-6">
									<div class="form-group">
									  <label for="nombres">Nombre del Documento</label>
									   <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-check"></i></span>
               <input type="text" name="nombre_documento" value="" class="form-control" id="nombre_documento" placeholder="Ingrese el nombre del documento" maxlength="150" required>
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

