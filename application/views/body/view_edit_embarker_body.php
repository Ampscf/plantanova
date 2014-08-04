<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> EMBARQUE </h3>
			</div>
			<?php 
				$attributes = array('id' => 'registry', 'name' => 'registry');
				echo form_open('embark/update_embark/'.$this->uri->segment(3),$attributes); 
			?>
				<div class="panel-body">

					<div class="clear">&nbsp</div>
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

					<div class="col-md-12">

						<div class="clear">&nbsp</div>

						<input type="hidden" name="rol" id="rol" value="2" />

						<div class="col-md-6">

							<div class="clear">&nbsp</div>
							<h3>Fecha de Entrega</h3>							
							<div class="input-group">
								<p><a class="btn btn-default" style="height: 46px; border-radius: 0px;" id="butondate" ><i class="fa fa-calendar fa-2x"></i></a><input type="text" class="form-control oli" placeholder="--Selecciona una Fecha--" id="datepicker" name="datepicker" style="width:87% !important; float: right;" value="<?php echo date("d-m-Y", strtotime($embark[0]->date_arrival));?>" readonly></p>
							</div><!-- End fecha -->

							<div class="clear">&nbsp</div>
							<h3>Fecha de Arribo</h3>
							<div class="input-group">
								<p><a class="btn btn-default" style="height: 46px; border-radius: 0px;" id="butondatz"><i class="fa fa-calendar fa-2x"></i></a><input type="text" class="form-control oli" placeholder="--Selecciona una Fecha--" id="butondates" name="butondates" style="width:87% !important; float: right;" value="<?php echo date("d-m-Y", strtotime($embark[0]->date_delivery));?>" readonly></p>
							</div><!-- End fecha -->

							<div class="clear">&nbsp</div>
							<h3>Volumen a Entregar</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Volumen Final" name="final_volume" id="final_volume" value="<?php echo $embark[0]->volume;?>">
							</div><!-- End volumen a entregar -->

							<div class="clear">&nbsp</div>
							<h3>Transportador</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Transportador" name="transporter" id="transporter" value="<?php echo $embark[0]->transport;?>">
							</div><!-- End transporte -->

							<div class="clear">&nbsp</div>
							<h3>Fletera</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Fletera" name="fletera" id="fletera" value="<?php echo $embark[0]->freight;?>">
							</div><!-- End fletera -->

							<div class="clear">&nbsp</div>
							<h3>Chofer</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Chofer" name="chofer" id="chofer" value="<?php echo $embark[0]->driver;?>">
							</div><!-- End Chofer -->

							<div class="clear">&nbsp</div>
							<h3>Cel Chofer</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Cel Chofer" name="cel" id="cel" value="<?php echo $embark[0]->driver_cel;?>">
							</div><!-- End Cel chofer -->

						</div>

						<div class="col-md-6">

							<div class="clear">&nbsp</div>
							<h3>Destino</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Destino" name="destino" id="destino" value="<?php echo $embark[0]->destiny;?>">
							</div><!-- End Destino -->	

							<div class="clear">&nbsp</div>
							<h3>Tipo de Empaque</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Tipo de Empaque" name="empaque" id="empaque" value="<?php echo $embark[0]->pack_type;?>">
							</div><!-- End Tipo de Empaque -->			

							<div class="clear">&nbsp</div>
							<h3>Contacto Entrega</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Contacto Entrega" name="contacto" id="contacto" value="<?php echo $embark[0]->arrival_contact;?>">
							</div><!-- End Contacto Entrega -->
							<div class="clear">&nbsp</div>
							<h3>Cajas</h3>
							<div class="input-group input-group-lg">
								<select class="form-control" name="cajas" id="cajas">
									<?php if($embark[0]->boxes == 1){
									?>
									<option value="1" selected>Chep</option>
									<option value="2" >Ensenada</option>
									<option value="3" >No Aplica</option>
									<?php
									}else if($embark[0]->boxes == 2){
									?>	
									<option value="1" >Chep</option>
									<option value="2" selected>Ensenada</option>
									<option value="3" >No Aplica</option>
									<?php
									}else if($embark[0]->boxes == 3){
									?>	
									<option value="1" >Chep</option>
									<option value="2" selected>Ensenada</option>
									<option value="3" >No Aplica</option>
									<?php
									}
									?>
								</select>	
							</div><!-- End Cajas -->

							<div class="clear">&nbsp</div>
							<h3>Caja</h3>
							<div class="input-group input-group-lg">
								<select class="form-control" name="caja" id="caja">
									<?php if($embark[0]->box == 1){
									?>
									<option value="1" selected>Seca</option>
									<option value="2" >Thermo</option>
									<?php
									}else if($embark[0]->box == 2){
									?>	
									<option value="1" >Seca</option>
									<option value="2" selected>Thermo</option>
									<?php
									}
									?>	

								</select>	
							</div><!-- End Caja -->

							<div class="clear">&nbsp</div>
							<h3>Racks</h3>
							<div class="input-group input-group-lg">
								<select class="form-control" name="racks" id="racks" onchange="cambio(this.value)">
									<?php if($embark[0]->racks > 0){
									?>
									<option value="1" selected>Si</option>
									<option value="2">No</option>
									<?php
									}else if($embark[0]->racks == 0){
									?>
									<option value="1" >Si</option>
									<option value="2"selected>No</option>
									<?php
									}
									?>	
								</select>	
							</div><!-- End Racks -->

							<div class="clear">&nbsp</div>
							<?php if($embark[0]->racks > 0){
									?>
							<div id="hiden">
								<?php
									}else if($embark[0]->racks == 0){
									?>
							<div id="hiden" style="display:none;">
								<?php
								}
								?>
							<h3># de Racks</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="# de Racks" name="rackz" id="rackz" value="<?php echo $embark[0]->racks;?>">
							</div><!-- End Racks -->
							</div>
						</div>

						<div class="col-md-12">	

							<div class="clear">&nbsp</div>
							<h3>Comentario</h3>
							<div class="input-group input-group-lg">
								<textarea class="form-control" rows="4" style="height: auto;" id="comment" name="comment"><?php echo $embark[0]->comment;?></textarea>								
							</div><!-- End comment -->

						</div>


						<div class="clear">&nbsp</div>
							<div class="col-md-4">
								<h5 style="color:red;"><?php echo $error;?></h5>
							</div>

						<div class="col-md-12">
							<div class="clear">&nbsp</div>
							<div class="col-md-1">
								<h3>Cotización</h3>
							</div>
							<div class="col-md-3 col-md-offset-1">
								<a href="#myModal" class="btn btn-default" data-toggle="modal">Adjuntar PDF</a>
								<a href="#myModal11" class="btn btn-default"
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i>
	                			</a>
							</div>	
						</div>

						<div class="col-md-12">	
							<div class="clear">&nbsp</div>
							<div class="col-md-1">
								<h3>Contrato</h3>
							</div>
							<div class="col-md-3 col-md-offset-1">
								<a href="#myModal0" class="btn btn-default" data-toggle="modal">Adjuntar PDF</a>
								<a href="#myModal11" class="btn btn-default"
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i>
	                			</a>
							</div>	
						</div>

						<div class="col-md-12">	
							<div class="clear">&nbsp</div>
							<div class="col-md-1">
								<h3>Factura</h3>
							</div>
							<div class="col-md-3 col-md-offset-1">
								<a href="#myModal1" class="btn btn-default" data-toggle="modal">Adjuntar PDF</a>
								<a href="#myModal11" class="btn btn-default"
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i>
	                			</a>
							</div>	
						</div>

						<div class="col-md-12">	
							<div class="clear">&nbsp</div>
							<div class="col-md-1">
								<h3>Carta Factura</h3>
							</div>
							<div class="col-md-3 col-md-offset-1">
								<a href="#myModal2" class="btn btn-default" data-toggle="modal">Adjuntar PDF</a>
								<a href="#myModal11" class="btn btn-default"
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i>
	                			</a>
							</div>	
						</div>	

				</div><!-- End panel-body -->
				<div class="clear">&nbsp</div>
				<div class="clear">&nbsp</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-3 col-md-offset-1">
							<?php  
								$data = array(
									'class'	=> 'btn btn-primary btn-block',
									'name' => 'Regresar',
								);
								echo anchor('breakdown/pedido_embarcado', 'Regresar', $data);
							?>
						</div>

						<div class="col-md-3 col-md-offset-4">
							<input class="btn btn-success btn-block" type="submit" value="Aceptar" /><!--onClick="register_client()"-->
						</div>
					</div><!-- End row -->
				</div><!-- End panel-footer -->	
				</form><!-- End form -->		
		</div><!-- End panel-default -->
	</div><!-- End col-md-4 col-md-offset-4 -->
</div><!-- End row -->

			<script>
			function cambio (a){

					if (a==1){
					document.getElementById("hiden").style.display = "block";
					}
					else {
						document.getElementById("hiden").style.display = "none";
					}	
				}



				$("#registry").validate({
							rules: {
								transporter: {
						           required: true
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
						       	empaque: {
						       		required: true
						       	}, 
						       	contacto: {
						       		required: true
						       	},
						       	cajas: {
						       		required: true
						       	},
						       	caja: {
						       		required: true
						       	},
						       	butondates: {
						       		required: true
						       	},
						       	rackz: {
						       		number: true
						       	}
								
							},
							messages: {
                        		transporter: {
									required: "El Campo Transportador es Requerido"
								},
								datepicker:{
	                				required:"El Campo Fecha es Requerido"
	                			},
						       final_volume: { 
									required: "El Campo Volumne Final es Requerido",
									number: "El Campo Volumen Final debe ser Numérico"
								}, 
								fletera:{
									required: "El campo Fletera es Requerido"
								},
								chofer:{
									required: "El campo Chofer es Requerido"
								},
								cel:{
									required: "El campo Celular es Requerido",
									number: "El campo Celular debe ser Numérico"
								},
								destino:{
									required: "El campo Destino es Requerido"
								},
								empaque:{
									required: "El campo Tipo de Empaque es Requerido"
								},
								contacto:{
									required: "El campo Contacto es Requerido"
								},
								cajas:{
									required: "El campo Cajas es Requerido"
								},
								caja:{
									required: "El campo Caja es Requerido"
								},
								butondates:{
									required: "El campo de Fecha es Requerido"
								},
								rackz: {
									number: "El # de racks debe ser un número"
								}
						    }
						});
						
			</script>

			<div id="myModal" class="modal fade">
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
                			<button type="submit" class="btn btn-primary">Subir</button>
                			</form>
           				 </div>
        			</div>
    			</div>
			</div>

			<div id="myModal0" class="modal fade">
    			<div class="modal-dialog">
       				<div class="modal-content">
            			<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h4 class="modal-title">Agregar PDF de contrato</h4>
            			</div>
            			<div class="modal-body">

                			<p>Elige un PDF para subir al contrato</p>
           	 			
           	 			</div>
            			<div class="modal-footer">
               	 			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                			<button type="submit" class="btn btn-primary">Subir</button>
           				 </div>
        			</div>
    			</div>
			</div>

			<div id="myModal1" class="modal fade">
    			<div class="modal-dialog">
       				<div class="modal-content">
            			<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h4 class="modal-title">Agregar PDF de factura</h4>
            			</div>
            			<div class="modal-body">

                			<?php echo $error;?>
                			<?php echo form_open_multipart('embark/do_upload1');?>
                			<p>Elige un PDF para subir a la factura</p>
           	 			
           	 			</div>
            			<div class="modal-footer">
               	 			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                			<button type="submit" class="btn btn-primary">Subir</button>
                			</form>
           				 </div>
        			</div>
    			</div>
			</div>

			<div id="myModal2" class="modal fade">
    			<div class="modal-dialog">
       				<div class="modal-content">
            			<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h4 class="modal-title">Agregar PDF de carta factura</h4>
            			</div>
            			<div class="modal-body">
            				
                			<p>Elige un PDF para subir a la carta factura</p>
           	 			
           	 			</div>
            			<div class="modal-footer">
               	 			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                			<button type="submit" class="btn btn-primary">Subir</button>
           				 </div>
        			</div>
    			</div>
			</div>