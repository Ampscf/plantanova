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
								<p><b>Número #: </b><?php echo $client->result()[0]->address_number;?></p>
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
						<hr/>
					</div>
					
					<div class="col-md-12">
						<div class="col-md-10">
							<h4>Siembra</h4>
						</div>
						<div class="col-md-2">
							<a href="#myModal5" class="btn btn-success" data-toggle="modal">+Agregar</a>
						</div>
						
						<div class="table-responsive" id="area">
							<?php include_once('application/views/extra/tabla_siembra.php'); ?>
						</div>
						<div class="col-md-2">
							<labbel><b>Total:</b> <?php echo number_format($suma->result()[0]->volume);?></labbel>
						</div>
						<!--<div class="col-md-2">
							<labbel><b>Alcance:</b> <?php echo round($alcance_germinacion)."%";?></labbel>
						</div>-->
					</div>
					
					<div class="clear">&nbsp</div>
					<div class="col-md-12">
						<div class="col-md-10">
							<h4>Germinación</h4>
						</div>
						<div class="col-md-2">
							<a href="#myModal" class="btn btn-success" data-toggle="modal">+Agregar</a>
						</div>
						<div class="clear">&nbsp</div>
						<div class="table-responsive" id="area">
							<?php include_once('application/views/extra/tabla_germinacion.php'); ?>
						</div>
						<div class="col-md-2">
							<labbel><b>Total:</b> <?php echo number_format($total_germ->germination);?></labbel>
						</div>
						<!--<div class="col-md-2">
							<labbel><b>Alcance:</b> <?php echo round($alcance_germinacion)."%";?></labbel>
						</div>-->
					</div>

					<div class="clear">&nbsp</div>
					<div class="col-md-12">
					<h2>Injerto <input type="checkbox" name="check" id="check1" value="1"  />
					Pinchado <input type="checkbox" name="check" id="check2" value="1"  />
					Transplante <input type="checkbox" name="check" id="check3" value="1"  /></h2>
					</div>
					
					<div class="clear">&nbsp</div>
	
					<div class="col-md-12" name="divinjerto" id="divinjerto" style="display: none;" >
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
						<!--<div class="col-md-2">
							<labbel><b>Alcance:</b> <?php echo round($alcance_injerto)."%";?></labbel>
						</div>-->
					</div>

					<div class="clear">&nbsp</div>
					<div class="col-md-12" name="divpinchado" id="divpinchado" style="display: none;">
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
						<!--<div class="col-md-2">
							<labbel><b>Alcance:</b> <?php echo round($alcance_pinchado)."%";?></labbel>
						</div>-->
					</div>
					
					<div class="clear">&nbsp</div>
					<div class="col-md-12" name="divtransplante" id="divtransplante" style="display: none;">
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
						<!--<div class="col-md-2">
							<labbel><b>Alcance:</b> <?php echo round($alcance_transplante)."%";?></labbel>
						</div>-->
					</div>
					
				</div>
				<div class="clear">&nbsp</div>
				<div class="col-md-12">
					<div class="col-md-6">	
						<?php echo anchor('breakdown/pedido_proceso', 'Regresar', 'class="btn btn-primary" style="float: right"');?>
					</div>
					<div class="col-md-6">	
						<a href="#myModal4" class="btn btn-success" data-toggle="modal">Embarcar</a>
					</div>
				</div>
				<div class="clear">&nbsp</div>
			
			<?php echo form_open('breakdown/pedido_embarcado_body/'.$this->uri->segment(3))?>
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
			$attributes = array('id' => 'insert_sowing','name'=>'insert_sowing');
			echo form_open('order/insert_sowing/'.$this->uri->segment(3),$attributes); 
			?>
		    <div id="myModal5" class="modal fade">
		    	<div class="modal-dialog">
		            <div class="modal-content">
		                <div class="modal-header">
		                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                    <h4 class="modal-title">Desglose</h4>
		                </div>
		                <div class="modal-body">	
		                	<div class="input-group">
								<p>Semilla</p>
								<select class="form-control" name="seeds" id="seeds" >
									<option value="-1" selected>---Selecciona una Semilla---</option>
									<?php 
										foreach($seeds as $key)
										{

											echo "<option value='" . $key->seed_name . "' set_select('breackdown','".$key->seed_name."')>" . $key->seed_name ." -> Volumen Recibido:".$key->volume."</option>";
										}
										
									?>	
								</select>
							</div><!-- End Cantidad -->				
							<div class="input-group">
								<p>Cantidad</p>
								<input type="text" class="form-control" placeholder="Cantidad" name="volume" id="volume">
							</div><!-- End Cantidad -->
							<p>Fecha</p>
							<div class="input-group">
								<p><a class="btn btn-default" style="height: 46px; border-radius: 0px;" id="butondate"><i class="fa fa-calendar fa-2x"></i></a><input type="text" class="form-control" placeholder="--Selecciona una Fecha--" id="datepicker" name="datepicker" style="width:90%; float: right;" readonly></p>
							</div><!-- End fecha -->
							<div class="input-group">
								<p>Comentario</p>
								<textarea class="form-control" rows="4" style="height: auto;" id="comment" name="comment"></textarea>										
							</div><!-- End Alcance -->				
		                </div>
		                <div class="modal-footer">
		                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		                    <input type="submit" class="btn btn-success" id="save" name="save" value="Guardar"></button>
		                </div>
		            </div>
		        </div>
		    </div>
		    </form><!--endform1-->
		      <script>
		    
			$("#insert_sowing").validate({
				rules: {
					volume: {
						required: true,
						number: true
					},
					datepicker: {
			            required: true
			        },
					seeds: {
			            seeds: true
			        }
				},
				messages: {
            		 datepicker:{
	                	required:"El Campo Fecha es Requerido"
	                },
	                volume: {
	                    required: "Este Campo es Requerido",
	                    number: "Este Campo Debe Ser Numerico"
	                }
			  	}
			});

			$.validator.addMethod("seeds", seeds, "Selecciona una Semilla");

			function seeds(){
				if (document.getElementById('seeds').value < 0){
					return false;
				}else return true;
			}

				
			</script>

			<br/>
			<br/>
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

														echo "<option value='" . $key->id_sowing . "' set_select('breackdown','".$key->seed."')>" . $key->seed ." -> Volumen Sembrado:".$key->volume."</option>";
													}
													
										?>	
								</select>
							</div><!-- End Cantidad -->
							<p>Fecha</p>
							<div class="input-group">
								<p><a class="btn btn-default" style="height: 46px; border-radius: 0px;" id="butondate1"><i class="fa fa-calendar fa-2x"></i></a><input type="text" class="datepicker1" placeholder="--Selecciona una Fecha--" id="datepicker1" name="datepicker1" style="width:90%; float: right;" readonly></p>
							</div><!-- End fecha -->
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
						        datepicker1: {
						            required: true
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
				                 datepicker1:{
				                	required:"El Campo Fecha es Requerido"
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
			<input type="hidden" id="order_volume" name="order_volume" value="<?php echo $volumen;?>">
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
							<p>Fecha</p>
							<div class="input-group">
								<p><a class="btn btn-default" style="height: 46px; border-radius: 0px;" id="butondate2"><i class="fa fa-calendar fa-2x"></i></a><input type="text" class="datepicker2" placeholder="--Selecciona una Fecha--" id="datepicker2" name="datepicker2" style="width:90%; float: right;" readonly></p>
							</div><!-- End fecha -->
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
								datepicker2: {
						            required: true
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
				                 datepicker2:{
				                	required:"El Campo Fecha es Requerido"
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
							<p>Fecha</p>
							<div class="input-group">
								<p><a class="btn btn-default" style="height: 46px; border-radius: 0px;" id="butondate3"><i class="fa fa-calendar fa-2x"></i></a><input type="text" class="datepicker3" placeholder="--Selecciona una Fecha--" id="datepicker3" name="datepicker3" style="width:90%; float: right;" readonly></p>
							</div><!-- End fecha -->
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
								datepicker3: {
						            required: true
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
				                 datepicker3:{
				                	required:"El Campo Fecha es Requerido"
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
							<p>Fecha</p>
							<div class="input-group">
								<p><a class="btn btn-default" style="height: 46px; border-radius: 0px;" id="butondate4"><i class="fa fa-calendar fa-2x"></i></a><input type="text" class="datepicker4" placeholder="--Selecciona una Fecha--" id="datepicker4" name="datepicker4" style="width:90%; float: right;" readonly></p>
							</div><!-- End fecha -->
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
								datepicker4: {
						            required: true
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
				                 datepicker4:{
				                	required:"El Campo Fecha es Requerido"
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

<script type="text/javascript">
	if (document.getElementById("grafta").value == 1){
		document.getElementById("divinjerto").style.display = "block";
		document.getElementById("check1").checked = true;
		document.getElementById("check1").disabled=true;
	}

	if (document.getElementById("puncha").value == 1){
		document.getElementById("divpinchado").style.display = "block";
		document.getElementById("check2").checked = true;
		document.getElementById("check2").disabled=true;
	}

	if (document.getElementById("transplanta").value == 1){
		document.getElementById("divtransplante").style.display = "block";
		document.getElementById("check3").checked = true;
		document.getElementById("check3").disabled=true;
	}
	

	$("#check1").click(function() {  
		if (document.getElementById("check1").checked){
			document.getElementById("divinjerto").style.display = "block";
		}
		else {
			document.getElementById("divinjerto").style.display = "none";
		}
	});

	$("#check2").click(function() {  
		if (document.getElementById("check2").checked) {
			document.getElementById("divpinchado").style.display = "block";
		}
		else {
			document.getElementById("divpinchado").style.display = "none";
		}
	});

	$("#check3").click(function() {  
		if (document.getElementById("check3").checked) {
			document.getElementById("divtransplante").style.display = "block";
		}
		else {
			document.getElementById("divtransplante").style.display = "none";
		}
	});

</script>
