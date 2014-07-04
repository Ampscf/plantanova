<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
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

							<div class="input-group input-group-lg">
								<p><b>CP:</b> <?php echo $client->result()[0]->cp;?></p>
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
								<p><b>Número: </b><?php echo $client->result()[0]->address_number;?></p>
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
							
							<div class="input-group input-group-lg">
								<p><b>Volumen Plantado:</b> <?php echo number_format($suma->result()[0]->volume);?></p>
							</div><!-- End nombre -->
							
						</div>
						
					</div>
					
					<div class="col-md-12">
						<hr/>
					</div>
					
					<div class="col-md-12">
						<div class="col-md-10">
							<h4>Germinación</h4>
						</div>
						<div class="col-md-2">
							<a href="#myModal" class="btn btn-success" data-toggle="modal">+Agregar</a>
						</div>
						
						<div class="table-responsive" id="area">
							<?php include_once('application/views/extra/tabla_germinacion.php'); ?>
						</div>
						<div class="col-md-2">
							<labbel><b>Total:</b> <?php echo number_format($total_germ->germination);?></labbel>
						</div>
						<div class="col-md-2">
							<labbel><b>Alcance:</b> <?php //echo round($alcance_germinacion)."%";?></labbel>
						</div>
					</div>
					
					<div class="clear">&nbsp</div>
					<div class="col-md-12">
						<div class="col-md-10">
							<h4>Injerto</h4>
						</div>
						<div class="col-md-2">
							<a href="#myModal1" class="btn btn-success" data-toggle="modal">+Agregar</a>
						</div>
						<div class="clear">&nbsp</div>
						<div class="table-responsive" id="area">
							<?php include_once('application/views/extra/tabla_injerto.php'); ?>
						</div>
						<div class="col-md-2">
							<labbel><b>Total:</b> <?php echo number_format($total_graft->graft);?></labbel>
						</div>
						<div class="col-md-2">
							<labbel><b>Alcance:</b> <?php echo round($alcance_injerto)."%";?></labbel>
						</div>
					</div>
					
					<div class="clear">&nbsp</div>
					<div class="col-md-12">
						<div class="col-md-10">	
							<h4>Pinchado</h4>
						</div>
						<div class="col-md-2">
							<a href="#myModal2" class="btn btn-success" data-toggle="modal">+Agregar</a>
						</div>
						<div class="clear">&nbsp</div>
						<div class="table-responsive" id="area">
							<?php include_once('application/views/extra/tabla_pinchado.php'); ?>
						</div>
						<div class="col-md-2">
							<labbel><b>Total:</b> <?php echo number_format($total_punch->punch);?></labbel>
						</div>
						<div class="col-md-2">
							<labbel><b>Alcance:</b> <?php echo round($alcance_pinchado)."%";?></labbel>
						</div>
					</div>
					
					<div class="clear">&nbsp</div>
					<div class="col-md-12">
						<div class="col-md-10">	
							<h4>Transplante</h4>
						</div>
						<div class="col-md-2">
							<a href="#myModal3" class="btn btn-success" data-toggle="modal">+Agregar</a>
						</div>
						<div class="clear">&nbsp</div>
						<div class="table-responsive" id="area">
							<?php include_once('application/views/extra/tabla_transplante.php'); ?>
						</div>
						<div class="col-md-2">
							<labbel><b>Total:</b> <?php echo number_format($total_transplant->transplant);?></labbel>
						</div>
						<div class="col-md-2">
							<labbel><b>Alcance:</b> <?php echo round($alcance_transplante)."%";?></labbel>
						</div>
					</div>
					
				</div>
				<div class="clear">&nbsp</div>
				<div class="col-md-12">
					<div class="col-md-6">	
						<a href="#myModal4" class="btn btn-success" data-toggle="modal" style="float: right">Embarcar</a>
					</div>
					<div class="col-md-6">	
						<?php echo anchor('breakdown/pedido_proceso', 'Regresar', 'class="btn btn-primary"');?>
					</div>
				</div>
				<div class="clear">&nbsp</div>
			
			<?php echo form_open('breakdown/finish_order/'.$this->uri->segment(3))?>
			<div id="myModal4" class="modal fade">
        		<div class="modal-dialog">
            		<div class="modal-content">
                		<div class="modal-header">
                		</div>
                		<div class="modal-body">
                		<h4 class="modal-title">¿Seguro que desea Embarcar? </h4>	                    		
                		</div>
                		<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    			<button type="submit" class="btn btn-success" name="">Confirmar</button>
                			</form>
						</div>
            		</div>
        		</div>
    		</div>
			<?php 
			$attributes = array('id' => 'insert_germination','name'=>'insert_germination');
			echo form_open('breakdown/insert_germination/'.$this->uri->segment(3),$attributes); 
			?>
			<div id="myModal" class="modal fade">
        		<div class="modal-dialog">
            		<div class="modal-content">
                		<div class="modal-header">
                    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    		<h4 class="modal-title">Germinación</h4>
                		</div>
                		<div class="modal-body">
							<div class="input-group">
								<p>Variedad/Portainjerto</p>
								<select class="form-control" name="breakdown_germination" id="breakdown_germination" >
									<option value="-1" selected>---Selecciona una semilla---</option>
										<?php 
													foreach($varial as $key)
													{

														echo "<option value='" . $key->variety . "' set_select('breackdown','".$key->variety."')>" . $key->variety ."</option>";
													}
													foreach($injertal as $key)
													{
														echo "<option value='" . $key->rootstock . "' set_select('breackdown','".$key->rootstock."')>" . $key->rootstock ."</option>";
													}
										?>	
								</select>
							</div><!-- End Cantidad -->
							<div class="input-group">
								<p>% de germinación</p>
								<input type="text" class="form-control" placeholder="% de germinación" name="percentage" id="percentage">
							</div><!-- End Cantidad -->	
							<div class="input-group">
								<p>Viabilidad</p>
								<input type="text" class="form-control" placeholder="Viabilidad" name="viability" id="viability">
							</div><!-- End Viabilidad -->
							<div class="input-group">
								<p>Comentario</p>
								<textarea class="form-control" rows="4" style="height: auto;" id="comment" name="comment"></textarea>										
							</div><!-- End Alcance -->	
							<input type="hidden" name="total" id="total" value="<?php echo $suma->result()[0]->volume?>" />                    		
                		</div>
                		<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    			<button type="submit" class="btn btn-success" name="">Confirmar</button>
                			</form>
                			<script>
					    
						$("#insert_germination").validate({
							rules: {
								volume: {
									required: true,
									number: true
								},
								viability: {
									required: true,
									number: true
								},
								breakdown_germination: {
						            selectcheck: true
						        },
						        percentage:{
						           	number: true,
						        	max: 100
						        },
						        viability:{
						        	number:true,
						        	max:100
						        }
							},
							messages: {
                        		volume: {
				                    required: "Este Campo es Requerido",
				                    number: "Este Campo Debe Ser Numerico"
				                },
				                viability: {
				                    required: "Este Campo es Requerido",
				                    number: "Este Campo Debe Ser Numerico"
				                },
				                percentage:{
				                	number: "Este Campo Debe Ser Numerico",
				                	max: "Ingresa Un Porcentaje Valido"
				                },
				                viability:{
				                	number:"Este Campo Debe Ser Numerico",
				                	max:"Ingresa un Porcentaje Valido"
				                }

						  	}
						});

						$.validator.addMethod("selectcheck", selectcheck, "Selecciona una Variedad/Portainjerto");

						function selectcheck(){
							if (document.getElementById('breakdown_germination').value < 0){
								return false;
							}else return true;
						}

						</script>
						</div>
            		</div>
        		</div>
    		</div>
			
			<?php 
			$attributes = array('id' => 'insert_graft','name'=>'insert_graft');
			echo form_open('breakdown/insert_graft/'.$this->uri->segment(3),$attributes); 
			?>
			<div id="myModal1" class="modal fade">
        		<div class="modal-dialog">
            		<div class="modal-content">
                		<div class="modal-header">
                    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    		<h4 class="modal-title">Injerto</h4>
                		</div>
                		<div class="modal-body">
							<div class="input-group">
								<p>Variedad/Portainjerto</p>
								<select class="form-control" name="breakdown_graft" id="breakdown_graft" >
									<option value="-1" selected>---Selecciona una variedad/portainjerto---</option>
										<?php 
											foreach($breakdown as $key)
											{
												echo "<option value='" . $key->id_breakdown . "' set_select('breackdown','".$key->id_breakdown."')>" . $key->variety ." / ".$key->rootstock. "</option>";
											}
										?>	
								</select>
							</div><!-- End Cantidad -->
							<div class="input-group">
								<p>Cantidad</p>
								<input type="text" class="form-control" placeholder="Cantidad" name="volume" id="volume">
							</div><!-- End Cantidad -->	
							<div class="input-group">
								<!--<p>Viabilidad</p>
								<input type="text" class="form-control" placeholder="Viabilidad" name="viability" id="viability">
							</div><!-- End Viabilidad -->
							<div class="input-group">
								<p>Comentario</p>
								<textarea class="form-control" rows="4" style="height: auto;" id="comment" name="comment"></textarea>										
							</div><!-- End Alcance -->	                    		
                		</div>
                		<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    			<button type="submit" class="btn btn-success" name="">Confirmar</button>
                			</form>
                			<script>
					    
						$("#insert_graft").validate({
							rules: {
								volume: {
									required: true,
									number: true
								},
								breakdown_graft: {
						            selectcheck_graft: true
						        }
							},
							messages: {
                        		volume: {
				                    required: "Este Campo es Requerido",
				                    number: "Este Campo Debe Ser Numerico"
				                },
				                viability: {
				                    required: "Este Campo es Requerido",
				                    number: "Este Campo Debe Ser Numerico"
				                }
						  	}
						});

						$.validator.addMethod("selectcheck_graft", selectcheck_graft, "Selecciona una Variedad/Portainjerto");

						function selectcheck_graft(){
							if (document.getElementById('breakdown_graft').value < 0){
								return false;
							}else return true;
						}
						</script>
						</div>
            		</div>
        		</div>
    		</div>
    	</div>
			
			<?php 
			$attributes = array('id' => 'insert_punch','name'=>'insert_punch');
			echo form_open('breakdown/insert_punch/'.$this->uri->segment(3),$attributes); 
			?>
			<div id="myModal2" class="modal fade">
        		<div class="modal-dialog">
            		<div class="modal-content">
                		<div class="modal-header">
                    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    		<h4 class="modal-title">Pinchado</h4>
                		</div>
                		<div class="modal-body">
							<div class="input-group">
								<p>Variedad/Portainjerto</p>
								<select class="form-control" name="breakdown_punch" id="breakdown_punch" >
									<option value="-1" selected>---Selecciona una Variedad/Portainjerto---</option>
										<?php 
											foreach($breakdown as $key)
											{
												echo "<option value='" . $key->id_breakdown . "' set_select('breackdown','".$key->id_breakdown."')>" . $key->variety ." / ".$key->rootstock. "</option>";
											}
										?>	
								</select>
							</div><!-- End Cantidad -->
							<div class="input-group">
								<p>Cantidad</p>
								<input type="text" class="form-control" placeholder="Cantidad" name="volume" id="volume">
							</div><!-- End Cantidad -->	
							<div class="input-group">
								<!--<p>Viabilidad</p>
								<input type="text" class="form-control" placeholder="Viabilidad" name="viability" id="viability">
							</div><!-- End Viabilidad -->
							<div class="input-group">
								<p>Comentario</p>
								<textarea class="form-control" rows="4" style="height: auto;" id="comment" name="comment"></textarea>										
							</div><!-- End Alcance -->	                    		
                		</div>
                		<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    			<button type="submit" class="btn btn-success" name="">Confirmar</button>
                			</form>
                			<script>
					    
						$("#insert_punch").validate({
							rules: {
								volume: {
									required: true,
									number: true
								},
								breakdown_punch: {
						            selectcheck_punch: true
						        }
							},
							messages: {
                        		volume: {
				                    required: "Este Campo es Requerido",
				                    number: "Este Campo Debe Ser Numerico"
				                },
				                viability: {
				                    required: "Este Campo es Requerido",
				                    number: "Este Campo Debe Ser Numerico"
				                }
						  	}
						});

						$.validator.addMethod("selectcheck_punch", selectcheck_punch, "Selecciona una variedad/portainjerto");

						function selectcheck_punch(){
							if (document.getElementById('breakdown_punch').value < 0){
								return false;
							}else return true;
						}
						</script>
						</div>
            		</div>
        		</div>
    		</div>
		</div>
			
			<?php 
			$attributes = array('id' => 'insert_transplant','name'=>'insert_transplant');
			echo form_open('breakdown/insert_transplant/'.$this->uri->segment(3),$attributes); 
			?>
			<div id="myModal3" class="modal fade">
        		<div class="modal-dialog">
            		<div class="modal-content">
                		<div class="modal-header">
                    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    		<h4 class="modal-title">Transplante</h4>
                		</div>
                		<div class="modal-body">
							<div class="input-group">
								<p>Variedad/Portainjerto</p>
								<select class="form-control" name="breakdown_transplant" id="breakdown_transplant" >
									<option value="-1" selected>---Selecciona una Variedad/Portainjerto---</option>
										<?php 
											foreach($breakdown as $key)
											{
												echo "<option value='" . $key->id_breakdown . "' set_select('breackdown','".$key->id_breakdown."')>" . $key->variety ." / ".$key->rootstock. "</option>";
											}
										?>	
								</select>
							</div><!-- End Cantidad -->
							<div class="input-group">
								<p>Cantidad</p>
								<input type="text" class="form-control" placeholder="Cantidad" name="volume" id="volume">
							</div><!-- End Cantidad -->	
							<div class="input-group">
								<!--<p>Viabilidad</p>
								<input type="text" class="form-control" placeholder="Viabilidad" name="viability" id="viability">
							</div><!-- End Viabilidad -->
							<div class="input-group">
								<p>Comentario</p>
								<textarea class="form-control" rows="4" style="height: auto;" id="comment" name="comment"></textarea>										
							</div><!-- End Alcance -->	                    		
                		</div>
                		<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    			<button type="submit" class="btn btn-success" name="">Confirmar</button>
                			</form>
                			<script>
					    
						$("#insert_transplant").validate({
							rules: {
								volume: {
									required: true,
									number: true
								},
								breakdown_transplant: {
						            selectcheck_transplant: true
						        }
							},
							messages: {
                        		volume: {
				                    required: "Este Campo es Requerido",
				                    number: "Este Campo Debe Ser Numerico"
				                },
				                viability: {
				                    required: "Este Campo es Requerido",
				                    number: "Este Campo Debe Ser Numerico"
				                }
						  	}
						});

						$.validator.addMethod("selectcheck_transplant", selectcheck_transplant, "Selecciona una Variedad/Portainjerto");

						function selectcheck_transplant(){
							if (document.getElementById('breakdown_transplant').value < 0){
								return false;
							}else return true;
						}
						</script>
						</div>
            		</div>
        		</div>
    		</div>
    	</div>
		
		</div>
	</div>
</div> <!-- End content div -->