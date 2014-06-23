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
						<div class="input-group input-group-lg">
							<p><b>Pedido: <?php echo $id_order;?></b></p>
						</div><!-- End nombre -->
						
						<div class="col-md-6">
						
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
								<p><b>Calle/Colonia:</b> <?php echo $client->result()[0]->street." ".$client->result()[0]->colony;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Número: </b><?php echo $client->result()[0]->address_number;?></p>
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
								<p><b>Fecha: </b><?php echo date("Y-m-d",strtotime($fecha))?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Tipo de cultivo:</b> <?php echo $planta->result()[0]->plant_name;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Categoría:</b> <?php echo $categoria->result()[0]->category_name;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Volumen Total:</b> <?php echo $volumen;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Volumen Plantado:</b> <?php echo $suma->result()[0]->volume;?></p>
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
							<labbel><b>Total:</b> <?php echo 'var';?></labbel>
						</div>
						<div class="col-md-2">
							<labbel><b>Alcance:</b> <?php echo 'var';?></labbel>
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
							<labbel><b>Total:</b> <?php echo 'var';?></labbel>
						</div>
						<div class="col-md-2">
							<labbel><b>Alcance:</b> <?php echo 'var';?></labbel>
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
							<labbel><b>Total:</b> <?php echo 'var';?></labbel>
						</div>
						<div class="col-md-2">
							<labbel><b>Alcance:</b> <?php echo 'var';?></labbel>
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
							<labbel><b>Total:</b> <?php echo 'var';?></labbel>
						</div>
						<div class="col-md-2">
							<labbel><b>Alcance:</b> <?php echo 'var';?></labbel>
						</div>
					</div>
					
				</div>
				<div>
				<?php echo form_open('breakdown/finish_order/'.$this->uri->segment(3))?>
					<button type="submit" class="btn btn-success" name="" style="margin-left: 30%; margin-right: 20%;">Guardar</button>
					<?php echo anchor('breakdown/pedido_proceso', 'Regresar', 'class="btn btn-primary"');?>
				</form>
				</div>
			<div>
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
								<p>Viabilidad</p>
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

						$.validator.addMethod("selectcheck_punch", selectcheck_punch, "Selecciona una Variedad/Portainjerto");

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