<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> EMBARQUE </h3>
			</div>
				<div class="panel-body">

					<div>&nbsp</div>
					<div class="col-md-12">
						<h3><span class="glyphicon glyphicon-th-large"></span> DETALLE DEL PEDIDO</h3>
					</div>
					
					<div class="col-md-12">
						<hr/>
					</div>
					
					<div class="col-md-12">
						
						
						<div class="col-md-6">
							<div class="input-group input-group-lg">
								<p><b>Pedido: <?php echo $id_order;?></b></p>
							</div><!-- End nombre -->
							<div class="input-group input-group-lg">
								<p><b>Fecha: </b><?php echo date("d-m-Y",strtotime($fecha))?></p>
							</div><!-- End nombre -->
							<div class="input-group input-group-lg">
								<p><b>Fecha de entrega: </b><?php echo date("d-m-Y",strtotime($fecha_entrega))?></p>
							</div><!-- End nombre -->
							<div class="input-group input-group-lg">
								<p><b>Agricultor:</b> <?php echo $farmer;?></p>
							</div><!-- End agricultor -->
							<div class="input-group input-group-lg">
								<p><b>Nombre Completo:</b> <?php echo $client->result()[0]->first_name." ".$client->result()[0]->last_name;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Correo Electrónico: </b><?php echo $client->result()[0]->mail;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Teléfono:</b> <?php echo $client->result()[0]->phone;?></p>
							</div><!-- End nombre -->

							
						
						</div>
						
						<div class="col-md-6">
							
							<div class="input-group input-group-lg">
								<p><b>Razón Social:</b> <?php echo $client->result()[0]->social_reason;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Calle/Colonia:</b> <?php echo $client->result()[0]->street." ".$client->result()[0]->colony;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Número #: </b><?php echo $client->result()[0]->address_number;?></p>
							</div><!-- End nombre -->

							<div class="input-group input-group-lg">
								<p><b>CP:</b> <?php echo $client->result()[0]->cp;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Tipo de cultivo:</b> <?php echo $planta->result()[0]->plant_name;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Categoría:</b> <?php echo $categoria->result()[0]->category_name;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Volumen Total:</b> <?php echo number_format($volumen);?></p>
							</div><!-- End nombre -->
							
							
							
						</div>
						
					</div>

					<div class="clear">&nbsp</div>
					<div class="col-md-12">
						<div class="col-md-10">
							<h4>Embarque</h4>
						</div>
						<div class="col-md-2">
							<a href="#myModals" class="btn btn-success" data-toggle="modal">+Agregar</a>
						</div>
						<div class="table-responsive" id="area">
							<?php include_once('application/views/extra/tabla_embarque.php'); ?>
						</div>

						<div>&nbsp</div>
						<p>Total embarcado: <?php echo number_format($total_embark->volume) ?></p>
						<p>Volumen restante: <?php echo number_format($volume_left)?></p>	

						<input type="hidden" name="rol" id="rol" value="2" />


						<div class="clear">&nbsp</div>
							<div class="col-md-4">
								<h5 style="color:red;"><?php 
									if (isset($error)){
										echo $error;		
									}
								?></h5>
							</div>

						<div class="col-md-12">
							<div class="clear">&nbsp</div>
							<div class="col-md-1">
								<h3>Cotización</h3>
							</div>
							<div class="col-md-10 col-md-offset-1">
								<a href="#myModal0" class="btn btn-default" data-toggle="modal">Adjuntar PDF</a>								
							</div>
							<div class="col-md-10 col-md-offset-2">
								<?php echo $quotation?>
							</div>	
						</div>

						<div class="col-md-12">	
							<div class="clear">&nbsp</div>
							<div class="col-md-1">
								<h3>Contrato</h3>
							</div>
							<div class="col-md-10 col-md-offset-1">
								<a href="#myModal00" class="btn btn-default" data-toggle="modal">Adjuntar PDF</a>
							</div>
							<div class="col-md-10 col-md-offset-2">
								<?php echo $contract?>
							</div>
						</div>

						<div class="col-md-12">	
							<div class="clear">&nbsp</div>
							<div class="col-md-1">
								<h3>Factura</h3>
							</div>
							<div class="col-md-10 col-md-offset-1">
								<a href="#myModal01" class="btn btn-default" data-toggle="modal">Adjuntar PDF</a>
							</div>
							<?php 
								if($bills != NULL){
									foreach ($bills as $key) {
										echo '<div class="col-md-10 col-md-offset-2">';
										echo '<a href="/plantanova/uploads/'.$key->location.'" target="_blank" style="color:yellowgreen;">'.$key->location.'</a>
											  <a href="#Modal'.$key->id_file.'"
	                    						title="Eliminar"
	                    						data-toggle="modal">
											  <i class="fa fa-times"></i>
	                			  			  </a>&nbsp;<p>Folio:'.$key->folio.' Total: $'.number_format($key->total, 2, '.', ',').'&nbsp;'.$key->moneda.'</p>';
										echo '</div>';
										echo '<div id="Modal'.$key->id_file.'" class="modal fade">
			    								<div class="modal-dialog">
			        								<div class="modal-content">
			            								<div class="modal-header">
			                								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                								<h4 class="modal-title">Confirmación</h4>
			            								</div>
			            								<div class="modal-body">			                
			                								<p>¿Estás seguro de querer eliminar este archivo?'.$key->id_file.'</p>
			                								<p class="text-warning"><small>El archivo será eliminado completamente y no podrá ser recuperado.</small></p>
			            								</div>
			            								<div class="modal-footer">';
			            							   echo form_open('embark/delete_card_bill/'.$key->id_file.'/'.$this->uri->segment(3));
											           echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
											                <button type="submit" class="btn btn-primary">Borrar</button>
											            	</form>
											            </div>
											        </div>
											    </div>
											</div>';
									}
								}
							?>
						</div>

						<div class="col-md-12">	
							<div class="clear">&nbsp</div>
							<div class="col-md-1">
								<h3>Carta Factura</h3>
							</div>
							<div class="col-md-10 col-md-offset-1">
								<a href="#myModal02" class="btn btn-default" data-toggle="modal">Adjuntar PDF</a>								
							</div>
							<?php
								if($card_bills != NULL){
									foreach ($card_bills as $key) {
										echo '<div class="col-md-10 col-md-offset-2">';
										echo '<a href="/plantanova/uploads/'.$key->location.'" target="_blank" style="color:yellowgreen;">'.$key->location.'</a>
											  <a href="#Modal'.$key->id_file.'"
	                    						title="Eliminar"
	                    						data-toggle="modal">
											  <i class="fa fa-times"></i>
	                			  			  </a>';
										echo '</div>';
										echo '<div id="Modal'.$key->id_file.'" class="modal fade">
			    								<div class="modal-dialog">
			        								<div class="modal-content">
			            								<div class="modal-header">
			                								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                								<h4 class="modal-title">Confirmación</h4>
			            								</div>
			            								<div class="modal-body">			                
			                								<p>¿Estás seguro de querer eliminar este archivo?'.$key->id_file.'</p>
			                								<p class="text-warning"><small>El archivo será eliminado completamente y no podrá ser recuperado.</small></p>
			            								</div>
			            								<div class="modal-footer">';
			            							   echo form_open('embark/delete_card_bill/'.$key->id_file.'/'.$this->uri->segment(3));
											           echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
											                <button type="submit" class="btn btn-primary">Borrar</button>
											            	</form>
											            </div>
											        </div>
											    </div>
											</div>';
									}
								}
							?>
						</div>

						<div class="col-md-12">	
							<div class="clear">&nbsp</div>
							<div class="col-md-1">
								<h3>Dictamen</h3>
							</div>
							<div class="col-md-10 col-md-offset-1">
								<a href="#myModal03" class="btn btn-default" data-toggle="modal">Adjuntar PDF</a>								
							</div>
							<?php
								if($dictum != NULL){
									foreach ($dictum as $key) {
										echo '<div class="col-md-10 col-md-offset-2">';
										echo '<a href="/plantanova/uploads/'.$key->location.'" target="_blank" style="color:yellowgreen;">'.$key->location.'</a>
											  <a href="#Modal'.$key->id_file.'"
	                    						title="Eliminar"
	                    						data-toggle="modal">
											  <i class="fa fa-times"></i>
	                			  			  </a>';
										echo '</div>';
										echo '<div id="Modal'.$key->id_file.'" class="modal fade">
			    								<div class="modal-dialog">
			        								<div class="modal-content">
			            								<div class="modal-header">
			                								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                								<h4 class="modal-title">Confirmación</h4>
			            								</div>
			            								<div class="modal-body">			                
			                								<p>¿Estás seguro de querer eliminar este archivo?'.$key->id_file.'</p>
			                								<p class="text-warning"><small>El archivo será eliminado completamente y no podrá ser recuperado.</small></p>
			            								</div>
			            								<div class="modal-footer">';
			            							   echo form_open('embark/delete_card_bill/'.$key->id_file.'/'.$this->uri->segment(3));
											           echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
											                <button type="submit" class="btn btn-primary">Borrar</button>
											            	</form>
											            </div>
											        </div>
											    </div>
											</div>';
									}
								}	 
							?>
						</div>		

					</div>
				<div>&nbsp</div>
				<div>&nbsp</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-3 col-md-offset-1" style="margin-top:10px;">
							<?php  
								$data = array(
									'class'	=> 'btn btn-primary btn-block',
									'name' => 'Regresar',
									'id'=>'regresar'
								);
								if($this->uri->segment(4)==1){
									echo anchor('breakdown/pedido_embarcado', 'Regresar', $data);
								}else{
									echo anchor('breakdown/edit_process/'.$this->uri->segment(3), 'Regresar', $data);
								}
								
							?>
						</div>

						<div class="col-md-3 col-md-offset-4">
							<?php
								$data = array(
										'class'	=> 'btn btn-success btn-block',
										'name' => 'Aceptar',
										'id' => 'aceptar'
									);
								echo anchor('breakdown/pedido_embarcado', 'Aceptar', $data);
							?>
							
						</div>
					</div><!-- End row -->
				</div><!-- End panel-footer -->	
				<!--</form> End form -->		
		</div><!-- End panel-default -->
	</div><!-- End col-md-4 col-md-offset-4 -->
</div><!-- End row -->
			<script>
				$('#aceptar').click(function() {
			    	var btn = $(this)
			        btn.button('loading')
			        setTimeout(function () {
			            btn.button('reset')
			        }, 5000)
				});

				$('#regresar').click(function() {
			    	var btn = $(this)
			        btn.button('loading')
			        setTimeout(function () {
			            btn.button('reset')
			        }, 5000)
				});
			</script>

			<div id="myModals" class="modal fade">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
					    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					        <h4 class="modal-title">Embarque</h4>
					    </div>

					    <div class="modal-body row">
					    	<?php 
								$attributes = array('id' => 'registry', 'name' => 'registry');
								echo form_open('embark/insert_embark/'.$this->uri->segment(3),$attributes); 
							?>

					    	<div class="col-md-6">
								<h3>Fecha de Entrega</h3>							
								<div class="input-group">
									<p><a class="btn btn-default" style="height: 31px; border-radius: 0px;" id="butondate" ><i class="fa fa-calendar"></i></a><input type="text" class="form-control oli" placeholder="--Selecciona una Fecha--" id="datepicker" name="datepicker" style="width:90% !important; float: right;" readonly></p>
								</div>	

					    		<div class="clear">&nbsp</div>
								<h3>Fecha de Arribo</h3>
								<div class="input-group">
									<p><a class="btn btn-default" style="height: 31px; border-radius: 0px;" id="butondatz"><i class="fa fa-calendar"></i></a><input type="text" class="form-control oli" placeholder="--Selecciona una Fecha--" id="butondates" name="butondates" style="width:90% !important; float: right;" readonly></p>
								</div><!-- End fecha -->

					    		<div class="clear">&nbsp</div>
								<h3>Volumen a Entregar</h3>
								<div class="input-group input-group-lg">
									<input type="text" class="form-control" placeholder="Volumen Final" name="final_volume" id="final_volume">
								</div><!-- End volumen a entregar -->

								<div class="clear">&nbsp</div>
								<h3>Transporte</h3>
								<div class="input-group input-group-lg">
									<select class="form-control" name='transporter' id='transporter'>
										<option value='-1' selected>--Selecciona un Transporte--</option>
										<option value='Trailer 53' >Trailer 53</option>
										<option value='Trailer 48'>Trailer 48</option>
										<option value='Torton' >Torton</option>
										<option value='Camioneta de tres y media' >Camioneta de tres y media</option>
										<option value='Pickup' >Pickup</option>									
									</select>	
								</div><!-- End Cajas --><!-- End transporte -->

								<div class="clear">&nbsp</div>
								<h3>Fletera</h3>
								<div class="input-group input-group-lg">
									<input type="text" class="form-control" placeholder="Fletera" name="fletera" id="fletera">
								</div><!-- End fletera -->

								<div class="clear">&nbsp</div>
								<h3>Chofer</h3>
								<div class="input-group input-group-lg">
									<input type="text" class="form-control" placeholder="Chofer" name="chofer" id="chofer">
								</div><!-- End Chofer -->

								<div class="clear">&nbsp</div>
								<h3>Cel Chofer</h3>
								<div class="input-group input-group-lg">
									<input type="text" class="form-control" placeholder="Cel Chofer" name="cel" id="cel">
								</div><!-- End Cel chofer -->
								<div class="clear">&nbsp</div>
								<h3>Destino</h3>
								<div class="input-group input-group-lg">
									<input type="text" class="form-control" placeholder="Destino" name="destino" id="destino">
								</div><!-- End Destino -->
								<div class="clear">&nbsp</div>	
								<h3>Direccion</h3>
								<div class="input-group input-group-lg">
									<input type="text" class="form-control" placeholder="Direccion" name="address" id="address">
								</div><!-- End Destino -->							
					    	</div>

					    	<div class="col-md-6">
								<h3>Estado</h3>
								<div class="input-group input-group-lg">
									<select class="form-control" name="state" id="state" onchange="get_towns(this.value);">
										<option value="-1" selected>---Selecciona un estado---</option>
										<?php 
											foreach($states as $key)
											{
												echo "<option value='" . $key->id_state . "' set_select('state','".$key->id_state."')>" . $key->state_name . "</option>";
											}
										?>
									</select>
								</div><!-- End state -->
								<div class="clear">&nbsp</div>
								<h3>Ciudad</h3>
								<div class="input-group input-group-lg">
									<select class="form-control" name="town" id="town">
										<option selected value="-1">---Selecciona una ciudad---</option>
										<?php 
											foreach($towns as $key)
											{
												echo "<option value='" . $key->id_town . "' set_select('town','".$key->id_town."') >" . $key->town_name . "</option>";
											}
										?>
									</select>
								</div><!-- End town -->
								<div class="clear">&nbsp</div>
								<h3>Contacto Entrega</h3>
								<div class="input-group input-group-lg">
									<input type="text" class="form-control" placeholder="Contacto Entrega" name="contacto" id="contacto">
								</div><!-- End Contacto Entrega -->			
								
								<div class="clear">&nbsp</div>
								<h3>Cajas</h3>
								<hr size="10" />
								<div class="input-group input-group-lg">
									<h4><input type="checkbox"  name="checkChep" id="checkChep">Chep (Retornable)</h4>
									<input type="text" class="form-control" placeholder="# Chep" name="chep" id="chep" style="display:none">	
								</div>
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<h4><input type="checkbox"  name="checkEnsenada" id="checkEnsenada">Ensenada</h4>
									<div class="input-group input-group-lg" id="radiobutons" style="display:none">
										<h4><input type="radio"  name="radio[]" id="1" value="Retornable" >Retornable</h4>
										<h4><input type="radio"  name="radio[]" id="2" value="No Retornable">No Retornable</h4>
									</div>
									<input type="text" class="form-control" placeholder="# Ensenada" name="ensenada" id="ensenada" style="display:none">	
								</div>
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<h4><input type="checkbox"  name="checkNoAplica" id="checkNoAplica">No Aplica</h4>
									<input type="text" class="form-control" placeholder="# No Aplica" name="no_aplica" id="no_aplica" style="display:none">
								</div><!-- End Cajas -->
								<div class="clear">&nbsp</div>
								<h3>Caja del Transporte</h3>
								<div class="input-group input-group-lg">
									<select class="form-control" name="transport_box" id="transport_box">
										<option value="Seca" selected>Seca</option>
										<option value="Thermo">Thermo</option>												
									</select>	
								</div><!-- End Cajas -->
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<h4><input type="checkbox"  name="checkRacks" id="checkRacks">Racks</h4>
									<input type="text" class="form-control" placeholder="# Racks" name="racks" id="racks" style="display:none">
								</div><!-- End Cajas -->
								<div class="clear">&nbsp</div>
																
							</div>

								<script>
									function cambio (a)
									{
										if (a==1){
											document.getElementById("hiden").style.display = "block";
										}
										else {
											document.getElementById("hiden").style.display = "none";
										}	
									}

									
									$("#checkChep").click(function() {  
										if (document.getElementById("checkChep").checked){
											document.getElementById("chep").style.display = "block";
										}
										else {
											document.getElementById("chep").style.display = "none";
										}
									});
									$("#checkEnsenada").click(function() {  
										if (document.getElementById("checkEnsenada").checked){
											document.getElementById("ensenada").style.display = "block";
											document.getElementById("radiobutons").style.display = "block";
										}
										else {
											document.getElementById("ensenada").style.display = "none";
											document.getElementById("radiobutons").style.display = "none";
										}
									});
									$("#checkNoAplica").click(function() {  
										if (document.getElementById("checkNoAplica").checked){
											document.getElementById("no_aplica").style.display = "block";
										}
										else {
											document.getElementById("no_aplica").style.display = "none";
										}
									});
									$("#checkSeca").click(function() {  
										if (document.getElementById("checkSeca").checked){
											document.getElementById("seca").style.display = "block";
										}
										else {
											document.getElementById("seca").style.display = "none";
										}
									});
									$("#checkThermo").click(function() {  
										if (document.getElementById("checkThermo").checked){
											document.getElementById("thermo").style.display = "block";
										}
										else {
											document.getElementById("thermo").style.display = "none";
										}
									});
									$("#checkRacks").click(function() {  
										if (document.getElementById("checkRacks").checked){
											document.getElementById("racks").style.display = "block";
										}
										else {
											document.getElementById("racks").style.display = "none";
										}
									});
								</script>
							</div>	
					    	
					   					    
					    <div class="modal-footer">
					    	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					        <input type="submit" class="btn btn-success" id="save" name="save" value="Guardar"></button>
					    	</form>
					    </div>	
					</div>	
				</div>
			</div>


			<script>
			
				$('#save').click(function() {
			    	var btn = $(this)
			        btn.button('loading')
			        setTimeout(function () {
			            btn.button('reset')
			        }, 2000)
				});
			
				$("#registry").validate({
							rules: {
								transporter:{
									transporter:true
								},
						        datepicker: {
						        	required:true
						        },
						        final_volume:{
						       		required: true,
						       		number: true
						       	},
						       	fletera:{
						       		required: true
						       	},
						       	chofer:{
						       		required: true
						       	},
						       	cel:{
						       		required: true,
						       		number: true
						       	}, 
						       	destino: {
						       		required: true
						       	},
						       	address:{
						       		required:true
						       	},
						       	state: {
						            state: true
						        },
						        town:{
						       		town: true
						       	},
						       	
						       	contacto: {
						       		required: true
						       	},
						       	retornable:{
						       		number:true
						       	},
						       	no_retornable:{
						       		number:true
						       	},
						       	chep:{
						       		number:true
						       	},
						       	ensenada:{
						       		number:true
						       	},
						       	no_aplica:{
						       		number:true
						       	},
						       	seca:{
						       		number:true
						       	},
						       	thermo:{
						       		number:true
						       	},
						       	butondates: {
						       		required: true
						       	},
						       	rackz: {
						       		number: true
						       	}
								
							},
							messages: {
                        		
								datepicker:{
	                				required:"El Campo Fecha es Requerido"
	                			},
						       final_volume: { 
									required: "El Campo Volumne Final es Requerido",
									number: "El Campo Volumen Final debe ser Numérico"
								}, 
								fletera:{
									required: "El Campo Fletera es Requerido"
								},
								chofer:{
									required: "El Campo Chofer es Requerido"
								},
								cel:{
									required: "El Campo Celular es Requerido",
									number: "El Campo Celular debe ser Numérico"
								},
								destino:{
									required: "El Campo Destino es Requerido"
								},
								address:{
						       		required:"El Campo de Direccion es Requerido"
						       	},
								contacto:{
									required: "El campo Contacto es Requerido"
								},
								retornable:{
						       		number:"El campo # Retornable debe ser Numerico"
						       	},
						       	no_retornable:{
						       		number:"El campo # No Retornable debe ser Numerico"
						       	},
						       	chep:{
						       		number:"El campo # Chep debe ser Numerico"
						       	},
						       	ensenada:{
						       		number:"El campo # Ensenada debe ser Numerico"
						       	},
						       	no_aplica:{
						       		number:"El campo # No Aplica debe ser Numerico"
						       	},
						       	seca:{
						       		number:"El campo # Seca debe ser Numerico"
						       	},
						       	thermo:{
						       		number:"El campo # Thermo debe ser Numerico"
						       	},
								butondates:{
									required: "El campo de Fecha es Requerido"
								},
								rackz: {
									number: "El # de racks debe ser un número"
								}
						    }
						});

			$.validator.addMethod("transporter", transporter, "Selecciona un Transporte");
			$.validator.addMethod("state", state, "Selecciona un Estado");
			$.validator.addMethod("town", town, "Selecciona una Ciudad");

			function state(){
				if (document.getElementById('state').value < 0){
					return false;
				}else return true;
			}

			function town(){
				if (document.getElementById('town').value < 0){
					return false;
				}else return true;
			}


			function transporter(){
				if (document.getElementById('transporter').value == -1){
					return false;
				}
				else return true;
			}
						
			</script>

			<div id="myModal0" class="modal fade">
    			<div class="modal-dialog">
       				<div class="modal-content">
            			<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h4 class="modal-title">Agregar PDF de cotización</h4>
            			</div>
            			<div class="modal-body">

                			<?php echo form_open_multipart('embark/do_upload1/'.$this->uri->segment(3));?>
                			<p>Elige un PDF para subir en la cotización</p>
							<input id="uploadFile" placeholder="Elige un PDF" disabled="disabled" style="height: 30px; position: relative; top: 5px;"/>
							<div class="fileUpload btn btn-success">
    							<span>Buscar</span>
							    <input id="uploadBtn" type="file" class="upload" name="userfile"/>
							</div>

							<script>
								document.getElementById("uploadBtn").onchange = function () {
					    			document.getElementById("uploadFile").value = this.value;
								};
							</script>

           	 			</div>
            			<div class="modal-footer">
               	 			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                			<button type="submit" class="btn btn-primary" id="upload1">Subir</button>
                			</form>
           				 </div>
        			</div>
    			</div>
			</div>
			<script>
				$('#upload1').click(function() {
			    	var btn = $(this)
			        btn.button('loading')
			        setTimeout(function () {
			            btn.button('reset')
			        }, 5000)
				});
			</script>

			<div id="myModal00" class="modal fade">
    			<div class="modal-dialog">
       				<div class="modal-content">
            			<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h4 class="modal-title">Agregar PDF de contrato</h4>
            			</div>
            			<div class="modal-body">

                			<?php echo form_open_multipart('embark/do_upload2/'.$this->uri->segment(3));?>
                			<p>Elige un PDF para subir en el contrato</p>
							<input id="uploadFile1" placeholder="Elige un PDF" disabled="disabled" style="height: 30px; position: relative; top: 5px;"/>
							<div class="fileUpload btn btn-success">
    							<span>Buscar</span>
							    <input id="uploadBtn1" type="file" class="upload" name="userfile"/>
							</div>

							<script>
								document.getElementById("uploadBtn1").onchange = function () {
					    			document.getElementById("uploadFile1").value = this.value;
								};
							</script>

           	 			</div>
            			<div class="modal-footer">
               	 			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                			<button type="submit" class="btn btn-primary" id="upload2">Subir</button>
                			</form>
           				 </div>
        			</div>
    			</div>
			</div>
			<script>
				$('#upload2').click(function() {
			    	var btn = $(this)
			        btn.button('loading')
			        setTimeout(function () {
			            btn.button('reset')
			        }, 5000)
				});
			</script>

			<div id="myModal01" class="modal fade">
    			<div class="modal-dialog">
       				<div class="modal-content">
            			<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h4 class="modal-title">Agregar PDF de factura</h4>
            			</div>
            			<div class="modal-body row">

                			<?php echo form_open_multipart('embark/do_upload3/'.$this->uri->segment(3),'id="money"');?>
                			<p>Elige un PDF para subir en la factura</p>
							<input id="uploadFile2" placeholder="Elige un PDF" disabled="disabled" style="height: 30px; position: relative; top: 5px;"/>
							<div class="fileUpload btn btn-success">
    							<span>Buscar</span>
							    <input id="uploadBtn2" type="file" class="upload" name="userfile"/>
							</div>

							<script>
								document.getElementById("uploadBtn2").onchange = function () {
					    			document.getElementById("uploadFile2").value = this.value;
								};
							</script>
							<div class="clear">&nbsp</div>
							<div class="col-md-2">
								<p>Folio:</p>
								<div class="clear">&nbsp</div>
								<p>Moneda:</p>
								<div class="clear">&nbsp</div>
								<p style="margin: 1px 0px;">Total:</p>
							</div>
							<div class="col-md-5">
								<div class="input-group input-group-sm">
									<input type="text" class="form-control" placeholder="Folio" name="folio" id="folio">
								</div>
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-sm">
									<select class="form-control" name='moneda' id='moneda'>
										<option value='pesos' selected>Pesos</option>
										<option value='dolares'>Dólares</option>									
									</select>
								</div>
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-sm">
									<input type="text" class="form-control" placeholder="Total" name="volume" id="volume">
								</div>
							</div>
           	 			</div>
            			<div class="modal-footer">
               	 			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                			<button type="submit" class="btn btn-primary" id="upload3">Subir</button>
                			</form>
           				 </div>
           				 <script>

						$('#upload3').click(function() {
					    	var btn = $(this)
					        btn.button('loading')
					        setTimeout(function () {
					            btn.button('reset')
					        }, 2000)
						});
			
           				 $("#money").validate({
           				 	rules: {
           				 		folio: {
           				 			required: true
           				 		},
           				 		moneda: {
           				 			required: true
           				 		},
           				 		volume: {
           				 			required: true,
           				 			number: true
           				 		}
           				 	},
           				 	messages: {
           				 		folio:{
						       		required:"El campo folio es requerido"
						       	},
						       	moneda:{
						       		required:"El campo moneda es requerido"
						       	},
						       	volume:{
						       		required:"El campo total es requerido",
						       		number:"El campo total debe ser numérico"
						       	}
           				 	}
           				 });	
           				 </script>
        			</div>
    			</div>
			</div>


			<div id="myModal02" class="modal fade">
    			<div class="modal-dialog">
       				<div class="modal-content">
            			<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h4 class="modal-title">Agregar PDF de carta factura</h4>
            			</div>
            			<div class="modal-body">

                			<?php echo form_open_multipart('embark/do_upload4/'.$this->uri->segment(3));?>
                			<p>Elige un PDF para subir en la carta factura</p>
							<input id="uploadFile3" placeholder="Elige un PDF" disabled="disabled" style="height: 30px; position: relative; top: 5px;"/>
							<div class="fileUpload btn btn-success">
    							<span>Buscar</span>
							    <input id="uploadBtn3" type="file" class="upload" name="userfile"/>
							</div>

							<script>
								document.getElementById("uploadBtn3").onchange = function () {
					    			document.getElementById("uploadFile3").value = this.value;
								};
							</script>

           	 			</div>
            			<div class="modal-footer">
               	 			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                			<button type="submit" class="btn btn-primary" id="upload4">Subir</button>
                			</form>
           				 </div>
        			</div>
    			</div>
			</div>
			<script>
				$('#upload4').click(function() {
			    	var btn = $(this)
			        btn.button('loading')
			        setTimeout(function () {
			            btn.button('reset')
			        }, 5000)
				});
			</script>

			<div id="myModal03" class="modal fade">
    			<div class="modal-dialog">
       				<div class="modal-content">
            			<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h4 class="modal-title">Agregar PDF de dictamen</h4>
            			</div>
            			<div class="modal-body">

                			<?php echo form_open_multipart('embark/do_upload5/'.$this->uri->segment(3));?>
                			<p>Elige un PDF para subir en el dictamen</p>
							<input id="uploadFile4" placeholder="Elige un PDF" disabled="disabled" style="height: 30px; position: relative; top: 5px;"/>
							<div class="fileUpload btn btn-success">
    							<span>Buscar</span>
							    <input id="uploadBtn4" type="file" class="upload" name="userfile"/>
							</div>

							<script>
								document.getElementById("uploadBtn4").onchange = function () {
					    			document.getElementById("uploadFile4").value = this.value;
								};
							</script>

           	 			</div>
            			<div class="modal-footer">
               	 			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                			<button type="submit" class="btn btn-primary" id="upload5">Subir</button>
                			</form>
           				 </div>
        			</div>
    			</div>
			</div>
			<script>
				$('#upload5').click(function() {
			    	var btn = $(this)
			        btn.button('loading')
			        setTimeout(function () {
			            btn.button('reset')
			        }, 5000)
				});
			</script>
			<div id="myModal011" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title">Confirmación</h4>
			            </div>
			            <div class="modal-body">			                
			                <p>¿Estás seguro de querer eliminar este archivo?</p>
			                <p class="text-warning"><small>El archivo será eliminado completamente y no podrá ser recuperado.</small></p>
			            </div>
			            <div class="modal-footer">
			            	<?php echo form_open('embark/delete_quotation/'.$this->uri->segment(3));?>
			                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			                <button type="submit" class="btn btn-primary">Borrar</button>
			            	</form>
			            </div>
			        </div>
			    </div>
			</div>

			<div id="myModal012" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title">Confirmación</h4>
			            </div>
			            <div class="modal-body">			                
			                <p>¿Estás seguro de querer eliminar este archivo?</p>
			                <p class="text-warning"><small>El archivo será eliminado completamente y no podrá ser recuperado.</small></p>
			            </div>
			            <div class="modal-footer">
			            	<?php echo form_open('embark/delete_contract/'.$this->uri->segment(3));?>
			                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			                <button type="submit" class="btn btn-primary">Borrar</button>
			            	</form>
			            </div>
			        </div>
			    </div>
			</div>

			<div id="myModal013" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title">Confirmación</h4>
			            </div>
			            <div class="modal-body">			                
			                <p>¿Estás seguro de querer eliminar este archivo?</p>
			                <p class="text-warning"><small>El archivo será eliminado completamente y no podrá ser recuperado.</small></p>
			            </div>
			            <div class="modal-footer">
			            	<?php echo form_open('embark/delete_bill/'.$this->uri->segment(3));?>
			                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			                <button type="submit" class="btn btn-primary">Borrar</button>
			            	</form>
			            </div>
			        </div>
			    </div>
			</div>

			<div id="myModal014" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title">Confirmación</h4>
			            </div>
			            <div class="modal-body">			                
			                <p>¿Estás seguro de querer eliminar este archivo?</p>
			                <p class="text-warning"><small>El archivo será eliminado completamente y no podrá ser recuperado.</small></p>
			            </div>
			            <div class="modal-footer">
			            	<?php echo form_open('embark/delete_card_bill/'.$this->uri->segment(3));?>
			                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			                <button type="submit" class="btn btn-primary">Borrar</button>
			            	</form>
			            </div>
			        </div>
			    </div>
			</div>