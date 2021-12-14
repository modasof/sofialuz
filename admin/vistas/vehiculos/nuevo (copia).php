<link rel="stylesheet" href="dist/css/style.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Titulo a Mostrar</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Nombre de la Pagina</li>
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


<section class="form-box" style="background: white;" >
            <div class="container">

                <div class="row">
                    <div class="col-sm-12 form-wizard">

						<!-- Form Wizard -->
c
                    		<h3>Agregar Vehiculo</h3>
                    		<p>Completa los datos obligatorios y despues presiona siguiente</p>

							<!-- Form progress -->
                    		<div class="form-wizard-steps form-wizard-tolal-steps-4">
                    			<div class="form-wizard-progress">
                    			    <div class="form-wizard-progress-line" data-now-value="12.25" data-number-of-steps="4" style="width: 12.25%;"></div>
                    			</div>
								<!-- Step 1 -->
                    			<div class="form-wizard-step active">
                    				<div class="form-wizard-step-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                    				<p>Ficha Tecnica</p>
                    			</div>
								<!-- Step 1 -->

								<!-- Step 2 -->
                    			<div class="form-wizard-step">
                    				<div class="form-wizard-step-icon"><i class="fa fa-location-arrow" aria-hidden="true"></i></div>
                    				<p>Seguridad y Sonido</p>
                    			</div>
								<!-- Step 2 -->

								<!-- Step 3 -->
								<div class="form-wizard-step">
                    				<div class="form-wizard-step-icon"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
                    				<p>Exterior y otros</p>
                    			</div>
								<!-- Step 3 -->
								<!-- Step 5 -->
								<div class="form-wizard-step">
                    				<div class="form-wizard-step-icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                    				<p>Descripción</p>
                    			</div>
								<!-- Step 5 -->


                    		</div>
							<!-- Form progress -->


							<!-- Form Step 1 (FICHA TECNICA)-->
                    		<fieldset>
                    		    <h4>Datos Generales del Vehiculo: <span>Paso 1 - 7</span></h4>
								<div class="form-group">
                    			    <label>Año del Vehiculo: <span>*</span></label>
                                    <input type="text" name="ano" placeholder="Año del Vehiculo" class="form-control required" required>
                                </div>
                                <div class="row">
									<div class="col-md-4">
										<div class="form-group">
											  <label for="sel1">Marca del Vehiculo:<span>*</span></label>
											  <select class="form-control" id="id_marca" name="id_marca" required="">
												<option value="" selected="">CHEVROLET</option>
												<option value="1">BMW</option>
												<option value="2">CHEVROLET</option>
												<option value="3">DAEWOO</option>
												<option value="4">FORD</option>
												<option value="5">HONDA</option>
												<option value="6">MAZDA</option>
												<option value="7">PEUGEOT</option>
												<option value="8">VOLKSWAGEN</option>
												<option value="9">JEEP</option>
												<option value="10">FIAT</option>
											  </select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											  <label for="sel1">Modelo del Vehiculo:<span>*</span></label>
											  <select class="form-control" id="id_modelo" name="id_modelo" required="">
												<option value="" selected="">CHEVROLET</option>
												<option value="1">BMW</option>
												<option value="2">CHEVROLET</option>
												<option value="3">DAEWOO</option>
												<option value="4">FORD</option>
												<option value="5">HONDA</option>
												<option value="6">MAZDA</option>
												<option value="7">PEUGEOT</option>
												<option value="8">VOLKSWAGEN</option>
												<option value="9">JEEP</option>
												<option value="10">FIAT</option>
											  </select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											  <label for="sel1">Versión Vehiculo:<span>*</span></label>
											  <select class="form-control" id="id_version" name="id_version" required="">
												<option value="" selected="">CHEVROLET</option>
												<option value="1">BMW</option>
												<option value="2">CHEVROLET</option>
												<option value="3">DAEWOO</option>
												<option value="4">FORD</option>
												<option value="5">HONDA</option>
												<option value="6">MAZDA</option>
												<option value="7">PEUGEOT</option>
												<option value="8">VOLKSWAGEN</option>
												<option value="9">JEEP</option>
												<option value="10">FIAT</option>
											  </select>
										</div>
									</div>
                                </div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												  <label for="sel1">Categoria:<span>*</span></label>
												  <select class="form-control" id="id_marca" name="id_marca" required="">
													<option value="" selected="">CHEVROLET</option>
													<option value="1">BMW</option>
													<option value="2">CHEVROLET</option>
													<option value="3">DAEWOO</option>
													<option value="4">FORD</option>
													<option value="5">HONDA</option>
													<option value="6">MAZDA</option>
													<option value="7">PEUGEOT</option>
													<option value="8">VOLKSWAGEN</option>
													<option value="9">JEEP</option>
													<option value="10">FIAT</option>
												  </select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												  <label for="sel1">Color Exterior:<span>*</span></label>
												  <select class="form-control" id="id_modelo" name="id_modelo" required="">
													<option value="" selected="">CHEVROLET</option>
													<option value="1">BMW</option>
													<option value="2">CHEVROLET</option>
													<option value="3">DAEWOO</option>
													<option value="4">FORD</option>
													<option value="5">HONDA</option>
													<option value="6">MAZDA</option>
													<option value="7">PEUGEOT</option>
													<option value="8">VOLKSWAGEN</option>
													<option value="9">JEEP</option>
													<option value="10">FIAT</option>
												  </select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												  <label for="sel1">Color Interior:<span>*</span></label>
												  <select class="form-control" id="id_version" name="id_version" required="">
													<option value="" selected="">CHEVROLET</option>
													<option value="1">BMW</option>
													<option value="2">CHEVROLET</option>
													<option value="3">DAEWOO</option>
													<option value="4">FORD</option>
													<option value="5">HONDA</option>
													<option value="6">MAZDA</option>
													<option value="7">PEUGEOT</option>
													<option value="8">VOLKSWAGEN</option>
													<option value="9">JEEP</option>
													<option value="10">FIAT</option>
												  </select>
											</div>
										</div>
									</div>
                                </div>

								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												  <label for="sel1">Tipo de Combustible:<span>*</span></label>
												  <select class="form-control" id="id_marca" name="id_marca" required="">
													<option value="" selected="">CHEVROLET</option>
													<option value="1">BMW</option>
													<option value="2">CHEVROLET</option>
													<option value="3">DAEWOO</option>
													<option value="4">FORD</option>
													<option value="5">HONDA</option>
													<option value="6">MAZDA</option>
													<option value="7">PEUGEOT</option>
													<option value="8">VOLKSWAGEN</option>
													<option value="9">JEEP</option>
													<option value="10">FIAT</option>
												  </select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												  <label for="sel1">Nro de Puertas:<span>*</span></label>
												  <select class="form-control" id="id_modelo" name="id_modelo" required="">
													<option value="" selected=""></option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
												  </select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												  <label for="sel1">Condición:<span>*</span></label>
												  <select class="form-control" id="id_modelo" name="id_modelo" required>
													<option value="" selected=""></option>
													<option value="Nuevo">Nuevo</option>
													<option value="Usado">Usado</option>
												  </select>
											</div>
										</div>
									</div>
                                </div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<hr>
												<h4>Motor:</h4>
											<hr>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												  <label for="sel1">Tipo de Dirección:<span>*</span></label>
												  <select class="form-control" id="id_marca" name="id_marca" required="">
													<option value="" selected=""></option>
													<option value="Asistida">Asistida</option>
													<option value="Mecánica">Mecánica</option>
													<option value="Hidráulica">Hidráulica</option>
													<option value="Otro">Otro</option>
												  </select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												  <label for="sel1">Tipo de Tranmisión (Caja):<span>*</span></label>
												  <select class="form-control" id="id_modelo" name="id_modelo" required="">
													<option value="" selected=""></option>
													<option value="1">1</option>
													<option value="2">2</option>
												  </select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												  <label for="sel1">Tipo de Tracción:<span>*</span></label>
												  <select class="form-control" id="id_modelo" name="id_modelo" required="">
													<option value="" selected=""></option>
													<option value="FWD o Tracción Delantera">FWD o Tracción Delantera</option>
													<option value="RWD o Tracción Trasera">RWD o Tracción Trasera</option>
													<option value="AWD  Tracción permanente en las 4 ruedas">AWD  Tracción permanente en las 4 ruedas</option>
													<option value="4WD o Tracción no permanente en las 4 ruedas">4WD o Tracción no permanente en las 4 ruedas</option>
													<option value="4x4">4x4 Tracción 50% ruedas delanteras 50% ruedas traseras</option>
												  </select>
											</div>
										</div>
									</div>
                                </div>

								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Motor: <span>*</span></label>
											<input type="text" name="motor" placeholder="Motor ejm: 3.7L" class="form-control required" maxlength="10" required>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Kilometraje:  <span>*</span></label>
											<input type="number" name="kilometraje" placeholder="Kilometraje ejm: 0" class="form-control required" required>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Torque:  <span>*</span></label>
											<input type="text" name="torque" placeholder="Torque del motor" class="form-control required" required>
										</div>
									</div>

								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Velocidad Máxima: <span>*</span></label>
											<input type="number" name="motor" placeholder="Velocidad maxima" class="form-control required" maxlength="3" required>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Caballos de Fuerza:  <span>*</span></label>
											<input type="number" name="kilometraje" placeholder="Caballos de fuerza del motor" class="form-control required" required>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Capacidad de remolque:  <span>*</span></label>
											<input type="text" name="torque" placeholder="Capacidad de remolque" class="form-control required" required>
										</div>
									</div>

								</div>
                                <div class="form-wizard-buttons">
                                    <button type="button" class="btn btn-next">Siguiente</button>
                                </div>
                            </fieldset>
							<!-- Form Step 1 -->




							<!-- Form Step 2 -->
                            <fieldset style="width: 100%">
                                <h4>Seguridad y Sonido : <span>Paso 2 - 5</span></h4>
                                <div class="form-group">
                                <div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Email: <span>*</span></label>
											<input type="email" name="Email" placeholder="Email" class="form-control required">
										</div>
									</div>
                                </div>
                                </div>
                                <div class="form-wizard-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>
							<!-- Form Step 2 -->

							<!-- Form Step 3 -->
                            <fieldset>

                                <h4>Official Information: <span>Step 3 - 4</span></h4>
								<div class="form-group">
                    			    <label>Employee ID: <span>*</span></label>
                                    <input type="text" name="Employee ID" placeholder="Employee ID" class="form-control required">
                                </div>
                                <div class="form-group">
                    			    <label>Designation: <span>*</span></label>
                                    <input type="text" name="Designation" placeholder="Designation" class="form-control required">
                                </div>
								<div class="form-group">
                    			    <label>Department: <span>*</span></label>
                                    <input type="text" name="Department" placeholder="Department" class="form-control required">
                                </div>
								<div class="form-group">
                    			    <label>Working Hours: <span>*</span></label>
                                    <input type="text" name="Working Hours" placeholder="Working Hours" class="form-control required">
                                </div>
								<div class="container-fluid">
								<div class="row form-inline">
								<div class="form-group col-md-3 col-xs-3">
									<label>Joining Date: </label>
								</div>
								<div class="form-group col-md-3 col-xs-3">
									<label>Day: </label>
                                    <select class="form-control">
									  <option>01</option>
									  <option>02</option>
									  <option>03</option>
									  <option>04</option>
									  <option>05</option>
									</select>
								</div>
								<div class="form-group col-md-3 col-xs-3">
									<label>Month: </label>
                                    <select class="form-control">
									  <option>Jan</option>
									  <option>Feb</option>
									  <option>Mar</option>
									  <option>Apr</option>
									  <option>May</option>
									</select>
								</div>
								<div class="form-group col-md-3 col-xs-3">
									<label>Year: </label>
                                    <select class="form-control">
									  <option>2017</option>
									  <option>2018</option>
									  <option>2019</option>
									  <option>2020</option>
									  <option>2021</option>
									</select>
								</div>
                                </div>
								</div>
								<br/>
                                <div class="form-wizard-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>
							<!-- Form Step 3 -->

							<!-- Form Step 4 -->
							<fieldset>

                                <h4>Payment Information: <span>Step 4 - 4</span></h4>
								<div style="clear:both;"></div>
								<div class="form-group">
                    			    <label>Bank Name: <span>*</span></label>
                                    <input type="text" name="Bank Name" placeholder="Bank Name" class="form-control required">
                                </div>
                    			<div class="form-group">
                    			    <label>Payment Type : </label>
                                    <label class="radio-inline">
									  <input type="radio" name="Payment" value="option1" checked="checked"> Master Card
									</label>
									<label class="radio-inline">
									  <input type="radio" name="Payment" value="option2"> Visa Card
									</label>
                                </div>
                                <div class="form-group">
                    			    <label>Holder Name: <span>*</span></label>
                                    <input type="text" name="Holder Name" placeholder="Holder Name" class="form-control required">
                                </div>
								<div class="container-fluid">
								<div class="row form-inline">
								<div class="form-group col-md-6 col-xs-6">
									<label>Card Number: <span>*</span></label>
                                    <input type="text" name="Card Number" placeholder="Card Number" class="form-control required">
								</div>
								<div class="form-group col-md-6 col-xs-6">
									<label>CVC: <span>*</span></label>
                                    <input type="text" name="CVC" placeholder="CVC" class="form-control required">
								</div>
                                </div>
								</div>
								<br/>
								<div class="container-fluid">
								<div class="row form-inline">
								<div class="form-group col-md-3 col-xs-3">
									<label>Expiry Date: </label>
								</div>
								<div class="form-group col-md-3 col-xs-3">
									<label>Month: </label>
                                    <select class="form-control">
									  <option>Jan</option>
									  <option>Feb</option>
									  <option>Mar</option>
									  <option>Apr</option>
									  <option>May</option>
									</select>
								</div>
								<div class="form-group col-md-3 col-xs-3">
									<label>Year: </label>
                                    <select class="form-control">
									  <option>2017</option>
									  <option>2018</option>
									  <option>2019</option>
									  <option>2020</option>
									  <option>2021</option>
									</select>
								</div>
                                </div>
								</div>
								<br/>
                                <div class="form-wizard-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="submit" class="btn btn-submit">Submit</button>
                                </div>
                            </fieldset>
							<!-- Form Step 4 -->

                    	</form>
						<!-- Form Wizard -->
                    </div>
                </div>

            </div>
        </section>


      </div> <!-- Fin Row -->
    </div> <!-- Fin Container -->
  </div> <!-- Fin Content -->
</div> <!-- Fin Content-Wrapper -->
<script  src="dist/js/index.js"></script>
