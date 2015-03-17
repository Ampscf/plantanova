<table class="table table-hover" id="tabla-pedidos">
	<th># Embarque</th>
	<th>Fecha de Entrega</th>
	<th>Fecha de Arribo</th>
	<th>Volumen Embarcado</th>
	<th>Destino</th>
	<th>Transporte</th>
	<th>Fletera</th>
	<th>Editar</th>
	<th>Eliminar</th>
	
	<?php 
	if(is_array($embarque_pedido))
	{
		foreach ($embarque_pedido as $key) 
		{
			echo "<tr>";
			echo "<td>" . $key->id_embark . "</td>";
			echo "<td>" . date("d-m-Y",strtotime($key->date_delivery)) . "</td>";
			echo "<td>" . date("d-m-Y",strtotime($key->date_arrival)) . "</td>";
			echo "<td>" . number_format($key->volume). "</td>";
			echo "<td>" . $key->destiny. "</td>";
			echo "<td>" . $key->transport. "</td>";
			echo "<td>" . $key->freight."</td>";
			echo "<td>";?>
			
				<a href="#myModalEditEmbarque<?php echo $key->id_embark; ?>" class="btn btn-default"
		            title="Editar"
	                data-toggle="modal">
					<i class="fa fa-edit"></i>
	            </a>
					
				<div id="myModalEditEmbarque<?php echo $key->id_embark; ?>" class="modal fade">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
					    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					        <h4 class="modal-title">Embarque</h4>
					    </div>

					    <div class="modal-body row">
					    	<?php 
								$attributes = array('id' => 'edit_embark'.$key->id_embark, 'name' => 'edit_embark'.$key->id_embark);
								echo form_open('embark/edit_embark/'.$this->uri->segment(3),$attributes); 
							?>
							<input type="hidden" id="id_embark" name="id_embark" value="<?php echo $key->id_embark; ?>">
					    	<div class="col-md-6">
								<h3>Fecha de Entrega</h3>							
								<div class="input-group">
									<p><a class="btn btn-default" style="height: 31px; border-radius: 0px;" id="butondate<?php echo $key->id_embark; ?>" ><i class="fa fa-calendar"></i></a><input type="text" class="form-control oli" placeholder="--Selecciona una Fecha--" id="datepicker<?php echo $key->id_embark; ?>" name="datepicker<?php echo $key->id_embark; ?>" style="width:90% !important; float: right;" value="<?php echo date("d-m-Y",strtotime($key->date_delivery)) ?>" readonly></p>
								</div>	

					    		<div class="clear">&nbsp</div>
								<h3>Fecha de Arribo</h3>
								<div class="input-group">
									<p><a class="btn btn-default" style="height: 31px; border-radius: 0px;" id="butondatz<?php echo $key->id_embark; ?>"><i class="fa fa-calendar"></i></a><input type="text" class="form-control oli" placeholder="--Selecciona una Fecha--" id="butondates<?php echo $key->id_embark; ?>" name="butondates<?php echo $key->id_embark; ?>" style="width:90% !important; float: right;" value="<?php echo date("d-m-Y",strtotime($key->date_arrival)) ?>" readonly></p>
								</div><!-- End fecha -->

					    		<div class="clear">&nbsp</div>
								<h3>Volumen a Entregar</h3>
								<div class="input-group input-group-lg">
									<input type="text" class="form-control" placeholder="Volumen Final" name="final_volume<?php echo $key->id_embark; ?>" id="final_volume<?php echo $key->id_embark; ?>" value="<?php echo $key->volume; ?>">
								</div><!-- End volumen a entregar -->

								<div class="clear">&nbsp</div>
								<h3>Transporte</h3>
								<div class="input-group input-group-lg">
									<select class="form-control" name='transporter<?php echo $key->id_embark; ?>' id='transporter<?php echo $key->id_embark; ?>'>
										<option value='<?php echo $key->transport;?>' selected><?php echo $key->transport;?></option>
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
									<input type="text" class="form-control" placeholder="Fletera" name="fletera<?php echo $key->id_embark; ?>" id="fletera<?php echo $key->id_embark; ?>" value="<?php echo $key->freight; ?>">
								</div><!-- End fletera -->

								<div class="clear">&nbsp</div>
								<h3>Chofer</h3>
								<div class="input-group input-group-lg">
									<input type="text" class="form-control" placeholder="Chofer" name="chofer<?php echo $key->id_embark; ?>" id="chofer<?php echo $key->id_embark; ?>" value="<?php echo $key->driver; ?>">
								</div><!-- End Chofer -->

								<div class="clear">&nbsp</div>
								<h3>Cel Chofer</h3>
								<div class="input-group input-group-lg">
									<input type="text" class="form-control" placeholder="Cel Chofer" name="cel<?php echo $key->id_embark; ?>" id="cel<?php echo $key->id_embark; ?>" value="<?php echo $key->driver_cel; ?>">
								</div><!-- End Cel chofer -->
								<div class="clear">&nbsp</div>
								<h3>Destino</h3>
								<div class="input-group input-group-lg">
									<input type="text" class="form-control" placeholder="Destino" name="destino<?php echo $key->id_embark; ?>" id="destino<?php echo $key->id_embark; ?>" value="<?php echo $key->destiny; ?>">
								</div><!-- End Destino -->
								<div class="clear">&nbsp</div>	
								<h3>Direccion</h3>
								<div class="input-group input-group-lg">
									<input type="text" class="form-control" placeholder="Direccion" name="address<?php echo $key->id_embark; ?>" id="address<?php echo $key->id_embark; ?>" value="<?php echo $key->address; ?>">
								</div><!-- End Destino -->							
					    	</div>

					    	<div class="col-md-6">
								<h3>Estado</h3>
								<div class="input-group input-group-lg">
									<select class="form-control" name="state<?php echo $key->id_embark; ?>" id="state<?php echo $key->id_embark; ?>" onchange="get_towns<?php echo $key->id_embark; ?>(this.value);">
										<?php $t_state = $this->model_embark->get_state($key->id_state); ?>
										<option value="<?php echo $key->id_state; ?>" selected><?php echo $t_state[0]->state_name; ?></option>
										<?php 
											foreach($states as $key2)
											{
												echo "<option value='" . $key2->id_state . "' set_select('state','".$key2->id_state."')>" . $key2->state_name . "</option>";
											}
										?>
									</select>
								</div><!-- End state -->
								<div class="clear">&nbsp</div>
								<h3>Ciudad</h3>
								<div class="input-group input-group-lg">
									<select class="form-control" name="town<?php echo $key->id_embark; ?>" id="town<?php echo $key->id_embark; ?>">
										<?php $t_town = $this->model_embark->get_town($key->id_town); ?>
										<option selected value="<?php echo $key->id_town; ?>"><?php echo $t_town[0]->town_name; ?></option>
										<?php 
											foreach($towns as $key3)
											{
												echo "<option value='" . $key3->id_town . "' set_select('town','".$key3->id_town."') >" . $key3->town_name . "</option>";
											}
										?>
									</select>
								</div><!-- End town -->
								<div class="clear">&nbsp</div>
								<h3>Contacto Entrega</h3>
								<div class="input-group input-group-lg">
									<input type="text" class="form-control" placeholder="Contacto Entrega" name="contacto<?php echo $key->id_embark; ?>" id="contacto<?php echo $key->id_embark; ?>" value="<?php echo $key->arrival_contact; ?>">
								</div><!-- End Contacto Entrega -->			
								
								<div class="clear">&nbsp</div>
								<h3>Cajas</h3>
								<hr size="10" />
								<div class="input-group input-group-lg">
									<h4><input type="checkbox"  name="checkChep<?php echo $key->id_embark; ?>" id="checkChep<?php echo $key->id_embark; ?>">Chep (Retornable)</h4>
									<input type="text" class="form-control" placeholder="# Chep" name="chep<?php echo $key->id_embark; ?>" id="chep<?php echo $key->id_embark; ?>" style="display:none" value="<?php echo $key->chep; ?>">	
								</div>
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<h4><input type="checkbox"  name="checkEnsenada<?php echo $key->id_embark; ?>" id="checkEnsenada<?php echo $key->id_embark; ?>">Ensenada</h4>
									<div class="input-group input-group-lg" id="radiobutons<?php echo $key->id_embark; ?>" style="display:none">
										<h4><input type="radio"  name="radio[]" id="1<?php echo $key->id_embark; ?>" value="Retornable" >Retornable</h4>
										<h4><input type="radio"  name="radio[]" id="2<?php echo $key->id_embark; ?>" value="No Retornable">No Retornable</h4>
									</div>
									<input type="hidden" name="tipo_ensenada<?php echo $key->id_embark; ?>" id="tipo_ensenada<?php echo $key->id_embark; ?>" value="<?php echo $key->tipo_ensenada; ?>">	
									<input type="text" class="form-control" placeholder="# Ensenada" name="ensenada<?php echo $key->id_embark; ?>" id="ensenada<?php echo $key->id_embark; ?>" style="display:none" value="<?php echo $key->ensenada; ?>">	
								</div>
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<h4><input type="checkbox"  name="checkNoAplica<?php echo $key->id_embark; ?>" id="checkNoAplica<?php echo $key->id_embark; ?>">No Aplica</h4>
									<input type="text" class="form-control" placeholder="# No Aplica" name="no_aplica<?php echo $key->id_embark; ?>" id="no_aplica<?php echo $key->id_embark; ?>" style="display:none" value="<?php echo $key->no_aplica; ?>">
								</div><!-- End Cajas -->
								<div class="clear">&nbsp</div>
								<h3>Caja del Transporte</h3>
								<div class="input-group input-group-lg">
									<select class="form-control" name="transport_box<?php echo $key->id_embark; ?>" id="transport_box<?php echo $key->id_embark; ?>">
										<option value="<?php echo $key->transport_box; ?>" selected><?php echo $key->transport_box; ?></option>
										<option value="Seca" selected>Seca</option>
										<option value="Thermo">Thermo</option>												
									</select>	
								</div><!-- End Cajas -->
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<h4><input type="checkbox"  name="checkRacks<?php echo $key->id_embark; ?>" id="checkRacks<?php echo $key->id_embark; ?>">Racks</h4>
									<input type="text" class="form-control" placeholder="# Racks" name="racks<?php echo $key->id_embark; ?>" id="racks<?php echo $key->id_embark; ?>" style="display:none" value="<?php echo $key->racks; ?>">
								</div><!-- End Cajas -->
								<div class="clear">&nbsp</div>
																
							</div>

								
							</div>	
					    	
					   					    
					    <div class="modal-footer">
					    	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					        <input type="submit" class="btn btn-success" id="save<?php echo $key->id_embark; ?>" name="save<?php echo $key->id_embark; ?>" value="Guardar"></button>
					    	</form>
					    </div>	
					</div>	
				</div>
			</div>

			<script type="text/javascript">
				if (document.getElementById("racks<?php echo $key->id_embark; ?>").value != 0){
					document.getElementById("racks<?php echo $key->id_embark; ?>").style.display = "block";
					document.getElementById("checkRacks<?php echo $key->id_embark; ?>").checked = true;
				}
				$("#checkRacks<?php echo $key->id_embark; ?>").click(function() {  
					if (document.getElementById("checkRacks<?php echo $key->id_embark; ?>").checked){
						document.getElementById("racks<?php echo $key->id_embark; ?>").style.display = "block";
					}
					else {
						document.getElementById("racks<?php echo $key->id_embark; ?>").style.display = "none";
						document.getElementById("racks<?php echo $key->id_embark; ?>").value = 0;
					}
				});
				if (document.getElementById("chep<?php echo $key->id_embark; ?>").value != 0){
					document.getElementById("chep<?php echo $key->id_embark; ?>").style.display = "block";
					document.getElementById("checkChep<?php echo $key->id_embark; ?>").checked = true;
				}
				$("#checkChep<?php echo $key->id_embark; ?>").click(function() {  
					if (document.getElementById("checkChep<?php echo $key->id_embark; ?>").checked){
						document.getElementById("chep<?php echo $key->id_embark; ?>").style.display = "block";
					}
					else {
						document.getElementById("chep<?php echo $key->id_embark; ?>").style.display = "none";
						document.getElementById("chep<?php echo $key->id_embark; ?>").value = 0;
					}
				});
				if (document.getElementById("ensenada<?php echo $key->id_embark; ?>").value != 0){
					document.getElementById("ensenada<?php echo $key->id_embark; ?>").style.display = "block";
					document.getElementById("checkEnsenada<?php echo $key->id_embark; ?>").checked = true;
					document.getElementById("radiobutons<?php echo $key->id_embark; ?>").style.display = "block";

				}
				$("#checkEnsenada<?php echo $key->id_embark; ?>").click(function() {  
					if (document.getElementById("checkEnsenada<?php echo $key->id_embark; ?>").checked){
						document.getElementById("ensenada<?php echo $key->id_embark; ?>").style.display = "block";
						document.getElementById("radiobutons<?php echo $key->id_embark; ?>").style.display = "block";
					}
					else {
						document.getElementById("ensenada<?php echo $key->id_embark; ?>").style.display = "none";
						document.getElementById("radiobutons<?php echo $key->id_embark; ?>").style.display = "none";
						document.getElementById("1<?php echo $key->id_embark; ?>").checked = false;
						document.getElementById("2<?php echo $key->id_embark; ?>").checked = false;
						document.getElementById("ensenada<?php echo $key->id_embark; ?>").value = 0;
					}
				});

				if (document.getElementById("tipo_ensenada<?php echo $key->id_embark; ?>").value == "Retornable"){
					document.getElementById("1<?php echo $key->id_embark; ?>").checked = true;
				}else if (document.getElementById("tipo_ensenada<?php echo $key->id_embark; ?>").value == "No Retornable"){
					document.getElementById("2<?php echo $key->id_embark; ?>").checked = true;
				}

				if (document.getElementById("no_aplica<?php echo $key->id_embark; ?>").value != 0){
					document.getElementById("no_aplica<?php echo $key->id_embark; ?>").style.display = "block";
					document.getElementById("checkNoAplica<?php echo $key->id_embark; ?>").checked = true;
				}
				$("#checkNoAplica<?php echo $key->id_embark; ?>").click(function() {  
					if (document.getElementById("checkNoAplica<?php echo $key->id_embark; ?>").checked){
						document.getElementById("no_aplica<?php echo $key->id_embark; ?>").style.display = "block";
					}
					else {
						document.getElementById("no_aplica<?php echo $key->id_embark; ?>").style.display = "none";
						document.getElementById("no_aplica<?php echo $key->id_embark; ?>").value= 0;
					}
				});
				if (document.getElementById("seca<?php echo $key->id_embark; ?>").value != 0){
					document.getElementById("seca<?php echo $key->id_embark; ?>").style.display = "block";
					document.getElementById("checkSeca<?php echo $key->id_embark; ?>").checked = true;
				}
				$("#checkSeca<?php echo $key->id_embark; ?>").click(function() {  
					if (document.getElementById("checkSeca<?php echo $key->id_embark; ?>").checked){
						document.getElementById("seca<?php echo $key->id_embark; ?>").style.display = "block";
					}
					else {
						document.getElementById("seca<?php echo $key->id_embark; ?>").style.display = "none";
						document.getElementById("seca<?php echo $key->id_embark; ?>").value = 0;
					}
				});
				if (document.getElementById("thermo<?php echo $key->id_embark; ?>").value != 0){
					document.getElementById("thermo<?php echo $key->id_embark; ?>").style.display = "block";
					document.getElementById("checkThermo<?php echo $key->id_embark; ?>").checked = true;
				}
				$("#checkThermo<?php echo $key->id_embark; ?>").click(function() {  
					if (document.getElementById("checkThermo<?php echo $key->id_embark; ?>").checked){
						document.getElementById("thermo<?php echo $key->id_embark; ?>").style.display = "block";
					}
					else {
						document.getElementById("thermo<?php echo $key->id_embark; ?>").style.display = "none";
						document.getElementById("thermo<?php echo $key->id_embark; ?>").value = 0;
					}
				});
				if (document.getElementById("racks<?php echo $key->id_embark; ?>").value != 0){
					document.getElementById("racks<?php echo $key->id_embark; ?>").style.display = "block";
					document.getElementById("checkRacks<?php echo $key->id_embark; ?>").checked = true;
				}

				

				$('#save<?php echo $key->id_embark; ?>').click(function() {
			    	var btn = $(this)
			        btn.button('loading')
			        setTimeout(function () {
			            btn.button('reset')
			        }, 2000)
				});
			
				$("#edit_embark<?php echo $key->id_embark; ?>").validate({
							rules: {
								transporter<?php echo $key->id_embark; ?>:{
									transporter<?php echo $key->id_embark; ?>:true
								},
						        datepicker<?php echo $key->id_embark; ?>: {
						        	required:true
						        },
						        final_volume<?php echo $key->id_embark; ?>:{
						       		required: true,
						       		number: true
						       	},
						       	fletera<?php echo $key->id_embark; ?>:{
						       		required: true
						       	},
						       	chofer<?php echo $key->id_embark; ?>:{
						       		required: true
						       	},
						       	cel<?php echo $key->id_embark; ?>:{
						       		required: true,
						       		number: true
						       	}, 
						       	destino<?php echo $key->id_embark; ?>: {
						       		required: true
						       	},
						       	address<?php echo $key->id_embark; ?>:{
						       		required:true
						       	},
						       	        					       	
						       	contacto<?php echo $key->id_embark; ?>: {
						       		required: true
						       	},
						       	retornable<?php echo $key->id_embark; ?>:{
						       		number:true
						       	},
						       	no_retornable<?php echo $key->id_embark; ?>:{
						       		number:true
						       	},
						       	chep<?php echo $key->id_embark; ?>:{
						       		number:true
						       	},
						       	ensenada<?php echo $key->id_embark; ?>:{
						       		number:true
						       	},
						       	no_aplica<?php echo $key->id_embark; ?>:{
						       		number:true
						       	},
						       	seca<?php echo $key->id_embark; ?>:{
						       		number:true
						       	},
						       	thermo<?php echo $key->id_embark; ?>:{
						       		number:true
						       	},
						       	butondates<?php echo $key->id_embark; ?>: {
						       		required: true
						       	},
						       	racks<?php echo $key->id_embark; ?>: {
						       		number: true
						       	}
								
							},
							messages: {
                        		
								datepicker<?php echo $key->id_embark; ?>:{
	                				required:"El Campo Fecha es Requerido"
	                			},
						       final_volume<?php echo $key->id_embark; ?>: { 
									required: "El Campo Volumne Final es Requerido",
									number: "El Campo Volumen Final debe ser Numérico"
								}, 
								fletera<?php echo $key->id_embark; ?>:{
									required: "El Campo Fletera es Requerido"
								},
								chofer<?php echo $key->id_embark; ?>:{
									required: "El Campo Chofer es Requerido"
								},
								cel<?php echo $key->id_embark; ?>:{
									required: "El Campo Celular es Requerido",
									number: "El Campo Celular debe ser Numérico"
								},
								destino<?php echo $key->id_embark; ?>:{
									required: "El Campo Destino es Requerido"
								},
								address<?php echo $key->id_embark; ?>:{
						       		required:"El Campo de Direccion es Requerido"
						       	},
								contacto<?php echo $key->id_embark; ?>:{
									required: "El campo Contacto es Requerido"
								},
								retornable<?php echo $key->id_embark; ?>:{
						       		number:"El campo # Retornable debe ser Numerico"
						       	},
						       	no_retornable<?php echo $key->id_embark; ?>:{
						       		number:"El campo # No Retornable debe ser Numerico"
						       	},
						       	chep<?php echo $key->id_embark; ?>:{
						       		number:"El campo # Chep debe ser Numerico"
						       	},
						       	ensenada<?php echo $key->id_embark; ?>:{
						       		number:"El campo # Ensenada debe ser Numerico"
						       	},
						       	no_aplica<?php echo $key->id_embark; ?>:{
						       		number:"El campo # No Aplica debe ser Numerico"
						       	},
						       	seca<?php echo $key->id_embark; ?>:{
						       		number:"El campo # Seca debe ser Numerico"
						       	},
						       	thermo<?php echo $key->id_embark; ?>:{
						       		number:"El campo # Thermo debe ser Numerico"
						       	},
								butondates<?php echo $key->id_embark; ?>:{
									required: "El campo de Fecha es Requerido"
								},
								racks<?php echo $key->id_embark; ?>: {
									number: "El # de racks debe ser un número"
								}
						    }
						});

			$.validator.addMethod("transporter<?php echo $key->id_embark; ?>", transporter<?php echo $key->id_embark; ?>, "Selecciona un Transporte");

			
			function transporter<?php echo $key->id_embark; ?>(){
				if (document.getElementById('transporter<?php echo $key->id_embark; ?>').value == -1){
					return false;
				}
				else return true;
			}

			function get_towns<?php echo $key->id_embark; ?>($id_state)
			{
				if($("#state [value='-1']").length)
				{
					$("#state [value='-1']").remove();
				}
				
				$.ajax({
					url: site_url + 'admin/get_towns',
					data: {'id_state':$id_state},
					type: "POST",
					success: function(data){
						$("#town<?php echo $key->id_embark; ?>").html(data);
					},
					failure:function(data){
						
					}
				});
			}

			$(function() {
				$( "#datepicker<?php echo $key->id_embark; ?>" ).datepicker();
			});
			$(function() {    
		       $('#butondate<?php echo $key->id_embark; ?>').click(function() {
		          $('#datepicker<?php echo $key->id_embark; ?>').datepicker('show');
		       });
		    });
			$(function() {
				$( "#butondates<?php echo $key->id_embark; ?>" ).datepicker();
			});
			$(function() {    
			    $('#butondatz<?php echo $key->id_embark; ?>').click(function() {
				    $('#butondates<?php echo $key->id_embark; ?>').datepicker('show');
			    });
		    });

			</script>


			
	<?php 
			echo "</td>";
			echo "<td>";?>
			
				<a href="#myModal<?php echo $key->id_embark; ?>" class="btn btn-default"
		            title="Eliminar"
	                data-toggle="modal">
					<i class="fa fa-times"></i>
	            </a>
					
				<div id="myModal<?php echo $key->id_embark; ?>" class="modal fade">
        			<div class="modal-dialog">
           				<div class="modal-content">
               				<div class="modal-header">
                   				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                   				<h4 class="modal-title">Confirmación</h4>
              				</div>
               				<div class="modal-body">
                   				<p>¿Estás seguro de querer eliminar este registro?</p>
               				</div>
               				<div class="modal-footer">
								<?php echo form_open('embark/delete_embark/'.$this->uri->segment(3)."/".$this->uri->segment(4)); ?>
                   					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                   					<button type="submit" class="btn btn-success" name="<?php echo $key->id_embark; ?>">Confirmar</button>
               					</form><!--endform2-->
							</div>	
           				</div>
        			</div>
    			</div>
	<?php 
			echo "</td>";
		}
	}
	?>	
</table>