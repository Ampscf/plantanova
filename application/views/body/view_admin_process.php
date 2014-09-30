<div class="container">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> desglose de pedido </h3>
				</div>
				<div class="panel-body">
				
					<div class="clear">&nbsp</div>
					<div class="col-xs-12">
						<h3><span class="glyphicon glyphicon-th-large"></span> DETALLE DEL PEDIDO</h3>
					</div>
					
					<div class="col-xs-12">
						<hr/>
					</div>
					
					<div class="col-xs-12">
						
						
						<div class="col-xs-6">
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
						
						<div class="col-xs-6">
							
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
					
					<div class="col-xs-12">
						<hr/>
					</div>
					
					<div class="col-xs-12">
						<div class="col-xs-10" id="siembra">
							<h4>Siembra</h4>
						</div>
						<div class="col-xs-2">
							<a href="#myModal5" class="btn btn-success" data-toggle="modal">+Agregar</a>
						</div>
						
						<div class="table-responsive" id="area">
							<?php include_once('application/views/extra/tabla_siembra.php'); ?>
						</div>
						<div class="col-xs-2">
							<labbel><b>Total:</b> <?php echo number_format($suma->result()[0]->volume);?></labbel>
						</div>
						<!--<div class="col-xs-2">
							<labbel><b>Alcance:</b> <?php echo round($alcance_germinacion)."%";?></labbel>
						</div>-->
					</div>
					
					<div class="clear">&nbsp</div>
					<div class="col-xs-12">
						<div class="col-xs-10" name="germinacion" id="germinacion">
							<h4>Germinación</h4>
						</div>
						<div class="col-xs-2">
							<a href="#myModal" class="btn btn-success" data-toggle="modal">+Agregar</a>
						</div>
						<div class="clear">&nbsp</div>
						<div class="table-responsive" id="area">
							<?php include_once('application/views/extra/tabla_germinacion.php'); ?>
						</div>
						<div class="col-xs-2">
							<labbel><b>Total:</b> <?php echo number_format($total_germ->germination);?></labbel>
						</div>
						<!--<div class="col-xs-2">
							<labbel><b>Alcance:</b> <?php echo round($alcance_germinacion)."%";?></labbel>
						</div>-->
						</br></br>

						<a href="<?php echo base_url("index.php/order/results/$id_order");?>" class="btn btn-default" onclick="window.open(this.href, 'mywin',
						'left=20,top=20,width=950,height=500,toolbar=1,resizable=0'); return false;" >Ver resultados</a>
					</div>

					<div class="clear">&nbsp</div>
					<div class="col-xs-12">
					<h2>Injerto <input type="checkbox" name="check" id="check1" value="1"  />
					Pinchado <input type="checkbox" name="check" id="check2" value="1"  />
					Transplante <input type="checkbox" name="check" id="check3" value="1"  />
					Tutoreo <input type="checkbox" name="check" id="check4" value="1"  /></h2>
					</div>

					<div class="clear">&nbsp</div>
						<div class="col-xs-4" id="error">
							<h5 style="color:red;"><?php 
								if (isset($error)){
									echo $error;		
								}
							?></h5>
						</div>
					
					<div class="clear">&nbsp</div>
	
					<div class="col-xs-12" name="divinjerto" id="divinjerto" style="display: none;" >
						<div class="col-xs-10" id="injerto">
							<h4>Injerto</h4>
						</div>
						<div class="col-xs-2">
							<a href="#myModal1" class="btn btn-success" data-toggle="modal">+Agregar</a>
						</div>
						<div class="clear">&nbsp</div>
						<div class="table-responsive" id="area">
							<?php include_once('application/views/extra/tabla_injerto.php'); ?>
						</div>
						<div class="col-xs-12">
							<div class="col-xs-2">
								<labbel><b>Total:</b> <?php echo number_format($total_graft->graft);?></labbel>
							</div>
							<?php echo $injert1;?>
							<?php echo $injert2;?>
							<?php echo $injert3;?>
						</div>
						</br></br>

						<a href="<?php echo base_url("index.php/order/results_graft/$id_order");?>" class="btn btn-default" onclick="window.open(this.href, 'mywin',
						'left=20,top=20,width=950,height=500,toolbar=1,resizable=0'); return false;" >Ver resultados</a>
					</div>

					<div class="clear">&nbsp</div>
	
					<div class="col-xs-12" name="divpinchado" id="divpinchado" style="display: none;" >
						<div class="col-xs-10" id="pinchado">
							<h4>Pinchado</h4>
						</div>
						<div class="col-xs-2">
							<a href="#myModal2" class="btn btn-success" data-toggle="modal">+Agregar</a>
						</div>
						<div class="clear">&nbsp</div>
						<div class="table-responsive" id="area">
							<?php include_once('application/views/extra/tabla_pinchado.php'); ?>
						</div>
						<div class="col-xs-12">
							<div class="col-xs-2">
								<labbel><b>Total:</b> <?php echo number_format($total_punch->punch);?></labbel>
							</div>
							<?php echo $pinch1;?>
							<?php echo $pinch2;?>
							<?php echo $pinch3;?>
						</div>
						</br></br>

						<a href="<?php echo base_url("index.php/order/results_punch/$id_order");?>" class="btn btn-default" onclick="window.open(this.href, 'mywin',
						'left=20,top=20,width=950,height=500,toolbar=1,resizable=0'); return false;" >Ver resultados</a>
					</div>

					<div class="clear">&nbsp</div>
					<div class="col-xs-12" name="divtransplante" id="divtransplante" style="display: none;">
						<div class="col-xs-10" id="transplante">	
							<h4>Transplante</h4>
						</div>
						<div class="col-xs-2">
							<a href="#myModal3" class="btn btn-success" data-toggle="modal">+Agregar</a>
						</div>
						<div class="clear">&nbsp</div>
						<div class="table-responsive" id="area">
							<?php include_once('application/views/extra/tabla_transplante.php'); ?>
						</div>
						<div class="col-xs-12">
							<div class="col-xs-2">
								<labbel><b>Total:</b> <?php echo number_format($total_transplant->transplant);?></labbel>
							</div>
							<?php echo $trans1;?>
							<?php echo $trans2;?>
							<?php echo $trans3;?>
						</div>
						</br></br>

						<a href="<?php echo base_url("index.php/order/results_transplant/$id_order");?>" class="btn btn-default" onclick="window.open(this.href, 'mywin',
						'left=20,top=20,width=950,height=500,toolbar=1,resizable=0'); return false;" >Ver resultados</a>
					</div>

					<div class="clear">&nbsp</div>
					<div class="col-xs-12" name="divtutoreo" id="divtutoreo" style="display: none;">
						<div class="col-xs-10" id="tutoreo">	
							<h4>Tutoreo</h4>
						</div>
						<div class="col-xs-2">
							<a href="#myModal6" class="btn btn-success" data-toggle="modal">+Agregar</a>
						</div>
						<div class="clear">&nbsp</div>
						<div class="table-responsive" id="area">
							<?php include_once('application/views/extra/tabla_tutoreo.php'); ?>
						</div>
						<div class="col-xs-12">
							<div class="col-xs-2">
								<labbel><b>Total:</b> <?php echo number_format($total_tutoring->tutoring);?></labbel>
							</div>
							<?php echo $tuto1;?>
							<?php echo $tuto2;?>
							<?php echo $tuto3;?>
						</div>
						</br></br>

						<a href="<?php echo base_url("index.php/order/results_transplant/$id_order");?>" class="btn btn-default" onclick="window.open(this.href, 'mywin',
						'left=20,top=20,width=950,height=500,toolbar=1,resizable=0'); return false;" >Ver resultados</a>
					</div>
						
				
				<div class="clear">&nbsp</div>
				<div class="clear">&nbsp</div>
				<div class="col-xs-12">
					<div class="col-xs-6">	
						<?php echo anchor('breakdown/pedido_proceso', 'Procesos', 'class="btn btn-primary" style="float: right; width: 50%;"');?>
					</div>
					<div class="col-xs-6">	
						<a href="#myModal4" class="btn btn-success" data-toggle="modal" style="width: 50%;">Embarcar</a>
					</div>
				</div>
				
			
			</div>
		</div>
			
			<?php echo form_open('embark/change_status/'.$this->uri->segment(3))?>
			<div id="myModal4" class="modal fade">
        		<div class="modal-dialog">
            		<div class="modal-content">
                		<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h4 class="modal-title">Embarcar</h4>
                		</div>
                		<div class="modal-body">
                		<h4 class="modal-title">¿Seguro que desea Embarcar? </h4>	                    		
                		</div>
                		<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    			<button type="submit" class="btn btn-success" name="embarcar" id="embarcar">Confirmar</button>
                			</form>
						</div>
            		</div>
        		</div>
    		</div>
    		<script>
				$('#embarcar').click(function() {
			    	var btn = $(this)
			        btn.button('loading')
			        setTimeout(function () {
			            btn.button('reset')
			        }, 2000)
				});
			</script>
    		<?php 
			$attributes = array('id' => 'insert_sowing','name'=>'insert_sowing');
			echo form_open('order/insert_sowing/'.$this->uri->segment(3),$attributes); 
			?>
		    <div id="myModal5" class="modal fade">
		    	<div class="modal-dialog">
		            <div class="modal-content">
		                <div class="modal-header">
		                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                    <h4 class="modal-title">Siembra</h4>
		                </div>
		                <div class="modal-body">	
		                	<div class="input-group">
								<p>Semilla</p>
								<select class="form-control" name="seeds" id="seeds" onchange="valor(this.value)" >
									<option value="-1" selected>---Selecciona una Semilla---</option>
									<?php 
										foreach($seeds as $key)
										{
											echo "<option value='$key->id_seed'>" . $key->seed_name ." / Volumen Recibido: ".number_format($key->volume)." / Lote: ".$key->batch."</option>";
										}
										
									?>	
								</select>
							</div><!-- End Cantidad -->	
							<div>
								<input type="hidden" id="inputval" name="inputval" value="" />
							</div>

							<div class="input-group">
								<p>Cantidad</p>
								<input type="text" class="form-control" placeholder="Cantidad" name="volume" id="volume" onchange="valor2(this.value)">
							</div><!-- End Cantidad -->
							<p>Fecha</p>
							<div class="input-group">
								<p><a class="btn btn-default" style="height: 31px; border-radius: 0px;" id="butondate"><i class="fa fa-calendar"></i></a><input type="text" class="form-control" placeholder="--Selecciona una Fecha--" id="datepicker" name="datepicker" style="width:92%; float: right;" readonly></p>
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

		    $('#save').click(function() {
		    	var btn = $(this)
		        btn.button('loading')
		        setTimeout(function () {
		            btn.button('reset')
		        }, 2000)
			});
			
			$("#insert_sowing").validate({
				
				rules: {
					volume: {
						required: true,
						number: true,
						valor:true,
						valor2:true,
						min:0

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
	                    number: "Este Campo debe ser Númerico",
	                    min:"Cantidad Invalida"
	                    //remote:"Cantidad Invalida"
	                }
			  	}
			});

			$.validator.addMethod("seeds", seeds, "Selecciona una Semilla");
			$.validator.addMethod("valor", valor, "Cantidad Invalida");
			$.validator.addMethod("valor2", valor2, "Cantidad Invalida");

			 function valor(a){
				var a = document.getElementById('seeds').value;
				var b = document.getElementById('volume').value;
				$.ajax({
					url: "<?php echo base_url('index.php/breakdown/max_volume_sowing'); ?>", 
					data: {'volume':b,'seeds':a},
					type: "POST",
					success: function(data){
						document.getElementById('inputval').value=data.length;
						
					},
					failure:function(data){
						
					}
				});
				if(document.getElementById('inputval').value == 1 ){
					return true;
				}else return false;
			}

			function valor2(b){
				var a = document.getElementById('seeds').value;
				var b = document.getElementById('volume').value;
				$.ajax({
					url: "<?php echo base_url('index.php/breakdown/max_volume_sowing'); ?>", 
					data: {'volume':b,'seeds':a},
					type: "POST",
					success: function(data){
						document.getElementById('inputval').value=data.length;
					},
					failure:function(data){
						
					}
				});
				if(document.getElementById('inputval').value == 1 ){
					return true;
				}else return false;
			}

			function seeds(){
				if (document.getElementById('seeds').value < 0){
					return false;
				}
				else return true;
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
												echo "<option value='" . $key->id_sowing . "' set_select('breackdown','".$key->seed."')>" . $key->seed ." / Volumen Sembrado: ".number_format($key->volume)."</option>";
											}													
										?>	
								</select>
							</div><!-- End Cantidad -->
							<p>Fecha</p>
							<div class="input-group">
								<p><a class="btn btn-default" style="height: 31px; border-radius: 0px;" id="butondate1"><i class="fa fa-calendar"></i></a><input type="text" class="datepicker1" placeholder="--Selecciona una Fecha--" id="datepicker1" name="datepicker1" style="width:92%; float: right;" readonly></p>
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
                    			<button type="submit" class="btn btn-success" name="save2" id="save2">Confirmar</button>
                			</form>
                			<script>
					    
					    $('#save2').click(function() {
					    	var btn = $(this)
					        btn.button('loading')
					        setTimeout(function () {
					            btn.button('reset')
					        }, 2000)
						});

						$("#insert_germination").validate({
							rules: {
								breakdown_germination: {
						            selectcheck: true
						        },
						        percentage:{
						           	number: true,
						        	max: 100,
						        	min:0
						        },
						        datepicker1: {
						            required: true
						        },
						        viability:{
						        	number:true,
						        	required: true,
						        	max:100,
						        	min:0
						        }
							},
							messages: {
                        		percentage:{
				                	number: "Este Campo debe ser Númerico",
				                	max: "Ingresa un Porcentaje Valido",
				                	min:"Ingresa un Porcentaje Valido"
				                },
				                 datepicker1:{
				                	required:"El Campo Fecha es Requerido"
				                },
				                viability:{
				                	required: "Este Campo es Requerido",
				                	number:"Este Campo debe ser Númerico",
				                	max:"Ingresa un Porcentaje Valido",
				                	min:"Ingresa un Porcentaje Valido"
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
								<select class="form-control" name="breakdown_graft" id="breakdown_graft" onchange="max_graft(this.value)">
									<option value="-1" selected>---Selecciona una variedad/portainjerto---</option>
										<?php 
											foreach($breakdown as $key)
											{
												echo "<option value='" . $key->id_breakdown . "' set_select('breackdown','".$key->id_breakdown."')>" . $key->variety ." / ".$key->rootstock. "</option>";
											}
										?>	
								</select>
							</div><!-- End breakdown_graft -->
							<div>
								<input type="hidden" id="inputvalgraft" name="inputvalgraft" value="true">
							</div>
							<div class="input-group">
								<p>Cantidad</p>
								<input type="text" class="form-control" placeholder="Cantidad" name="volume_graft" id="volume_graft" onchange="max_graft2(this.value)">
							</div><!-- End Cantidad -->	
							<div class="input-group">
								<p>Fecha</p>
								<p><a class="btn btn-default" style="height: 31px; border-radius: 0px;" id="butondate2"><i class="fa fa-calendar"></i></a><input type="text" class="datepicker2" placeholder="--Selecciona una Fecha--" id="datepicker2" name="datepicker2" style="width:92%; float: right;" readonly></p>
							</div><!-- End fecha -->
							
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
                    			<button type="submit" class="btn btn-success" name="save3" id="save3">Confirmar</button>
                			</form>
                		<script>

					    $('#save3').click(function() {
					    	var btn = $(this)
					        btn.button('loading')
					        setTimeout(function () {
					            btn.button('reset')
					        }, 2000)
						});

						$("#insert_graft").validate({
							rules: {
								volume_graft: {
									required: true,
									number: true,
									max_graft:true,
									max_graft2:true,
									min:0
								},
								datepicker2: {
						            required: true
						        },
								breakdown_graft: {
						            selectcheck_graft: true
						        }
							},
							messages: {
                        		volume_graft: {
				                    required: "Este Campo es Requerido",
				                    number: "Este Campo Debe Ser Númerico",
				                    min:"Cantidad Invalida"
				                },
				                 datepicker2:{
				                	required:"El Campo Fecha es Requerido"
				                },
				                viability: {
				                    required: "Este Campo es Requerido",
				                    number: "Este Campo Debe Ser Númerico"
				                }
						  	}
						});

						$.validator.addMethod("selectcheck_graft", selectcheck_graft, "Selecciona una Variedad/Portainjerto");
						$.validator.addMethod("max_graft", max_graft, "Cantidad Invalida");
						$.validator.addMethod("max_graft2", max_graft2, "Cantidad Invalida");

						 function max_graft(a){
							var a = document.getElementById('breakdown_graft').value;
							var b = document.getElementById('volume_graft').value;
							$.ajax({
								url: "<?php echo base_url('index.php/breakdown/max_volume_graft/'.$this->uri->segment(3)); ?>", 
								data: {'volume_graft':b,'breakdown_graft':a},
								type: "POST",
								success: function(data){
									document.getElementById('inputvalgraft').value=data.length;
								},
								failure:function(data){
									
								}
							});
							if(document.getElementById('inputvalgraft').value == 1 ){
								return true;
							}else return false;
						}

						function max_graft2(b){
							var a = document.getElementById('breakdown_graft').value;
							var b = document.getElementById('volume_graft').value;
							$.ajax({
								url: "<?php echo base_url('index.php/breakdown/max_volume_graft/'.$this->uri->segment(3)); ?>", 
								data: {'volume_graft':b,'breakdown_graft':a},
								type: "POST",
								success: function(data){
									document.getElementById('inputvalgraft').value=data.length;
								},
								failure:function(data){
									
								}
							});
							if(document.getElementById('inputvalgraft').value == 1 ){
								return true;
							}else return false;
						}

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
								<select class="form-control" name="breakdown_punch" id="breakdown_punch" onchange="max_punch(this.value)">
									<option value="-1" selected>---Selecciona una Variedad/Portainjerto---</option>
										<?php 
											foreach($breakdown as $key)
											{
												echo "<option value='" . $key->id_breakdown . "' set_select('breackdown','".$key->id_breakdown."')>" . $key->variety ." / ".$key->rootstock. "</option>";
											}
										?>	
								</select>
							</div><!-- End Cantidad -->
							<div>
								<input type="hidden" id="inputvalpunch" name="inputvalpunch" value="true">
							</div>

							<div class="input-group">
								<p>Cantidad</p>
								<input type="text" class="form-control" placeholder="Cantidad" name="volume_punch" id="volume_punch" onchange="max_punch2(this.value)">
							</div><!-- End Cantidad -->
							<div class="input-group">
								<p>Fecha</p>
								<p><a class="btn btn-default" style="height: 31px; border-radius: 0px;" id="butondate3"><i class="fa fa-calendar"></i></a><input type="text" class="datepicker3" placeholder="--Selecciona una Fecha--" id="datepicker3" name="datepicker3" style="width:92%; float: right;" readonly></p>
							</div><!-- End fecha -->	
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
                    			<button type="submit" class="btn btn-success" name="save4" id="save4">Confirmar</button>
                			</form>
                			<script>
					    
					    $('#save4').click(function() {
					    	var btn = $(this)
					        btn.button('loading')
					        setTimeout(function () {
					            btn.button('reset')
					        }, 2000)
						});

						$("#insert_punch").validate({
							rules: {
								volume_punch: {
									required:true,
									number:true,
									max_punch:true,
									max_punch2:true,
									min:0
								},
								datepicker3: {
						            required: true
						        },
								breakdown_punch: {
						            selectcheck_punch: true
						        }
							},
							messages: {
                        		volume_punch: {
				                    required: "Este Campo es Requerido",
				                    number: "Este Campo Debe Ser Númerico",
				                    minimo:"Cntidad Invalida"
				                },
				                 datepicker3:{
				                	required:"El Campo Fecha es Requerido"
				                },
				                viability: {
				                    required: "Este Campo es Requerido",
				                    number: "Este Campo Debe Ser Númerico"
				                }
						  	}
						});

						$.validator.addMethod("selectcheck_punch", selectcheck_punch, "Selecciona una variedad/portainjerto");
						$.validator.addMethod("max_punch", max_punch, "Cantidad Invalida");
						$.validator.addMethod("max_punch2", max_punch2, "Cantidad Invalida");

						function max_punch(a){
							var a = document.getElementById('breakdown_punch').value;
							var b = document.getElementById('volume_punch').value;
							$.ajax({
								url: "<?php echo base_url('index.php/breakdown/max_volume_punch/'.$this->uri->segment(3)); ?>", 
								data: {'volume_punch':b,'breakdown_punch':a},
								type: "POST",
								success: function(data){
									
									document.getElementById('inputvalpunch').value=data.length;
								},
								failure:function(data){
									
								}
							});
							if(document.getElementById('inputvalpunch').value == 1 ){
								return true;
							}else return false;
						}

						function max_punch2(b){
							var a = document.getElementById('breakdown_punch').value;
							var b = document.getElementById('volume_punch').value;
							$.ajax({
								url: "<?php echo base_url('index.php/breakdown/max_volume_punch/'.$this->uri->segment(3)); ?>", 
								data: {'volume_punch':b,'breakdown_punch':a},
								type: "POST",
								success: function(data){
									
									document.getElementById('inputvalpunch').value=data.length;
								},
								failure:function(data){
									
								}
							});
							if(document.getElementById('inputvalpunch').value == 1 ){
								return true;
							}else return false;
						}

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
								<select class="form-control" name="breakdown_transplant" id="breakdown_transplant" onchange="max_transplant(this.value)">
									<option value="-1" selected>---Selecciona una Variedad/Portainjerto---</option>
										<?php 
											foreach($breakdown as $key)
											{
												echo "<option value='" . $key->id_breakdown . "' set_select('breackdown','".$key->id_breakdown."')>" . $key->variety ." / ".$key->rootstock. "</option>";
											}
										?>	
								</select>
							</div><!-- End breakdown_transplant -->
							<div>
								<input type="hidden" id="inputvaltransplant" name="inputvaltransplant" value="true">
							</div>
							<div class="input-group">
								<p>Cantidad</p>
								<input type="text" class="form-control" placeholder="Cantidad" name="volume_transplant" id="volume_transplant" onchange="max_transplant2(this.value)">
							</div><!-- End Cantidad -->	
							<div class="input-group">
								<p>Fecha</p>
								<p><a class="btn btn-default" style="height: 31px; border-radius: 0px;" id="butondate4"><i class="fa fa-calendar"></i></a><input type="text" class="datepicker4" placeholder="--Selecciona una Fecha--" id="datepicker4" name="datepicker4" style="width:92%; float: right;" readonly></p>
							</div><!-- End fecha -->
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
                    			<button type="submit" class="btn btn-success" name="save5" id="save5">Confirmar</button>
                			</form>
                		<script>

					    $('#save5').click(function() {
					    	var btn = $(this)
					        btn.button('loading')
					        setTimeout(function () {
					            btn.button('reset')
					        }, 2000)
						});

						$("#insert_transplant").validate({
							rules: {
								volume_transplant: {
									required: true,
									number: true,
									max_transplant:true,
									min:0
								},
								datepicker4: {
						            required: true
						        },
								breakdown_transplant: {
						            selectcheck_transplant: true
						        }
							},
							messages: {
                        		volume_transplant: {
				                    required: "Este Campo es Requerido",
				                    number: "Este Campo Debe Ser Númerico",
				                    min:"Cantidad Invalida"
				                },
				                 datepicker4:{
				                	required:"El Campo Fecha es Requerido"
				                },
				                viability: {
				                    required: "Este Campo es Requerido",
				                    number: "Este Campo Debe Ser Númerico"
				                }
						  	}
						});

						$.validator.addMethod("selectcheck_transplant", selectcheck_transplant, "Selecciona una Variedad/Portainjerto");
						$.validator.addMethod("max_transplant", max_transplant, "Cantidad Invalida");
						//$.validator.addMethod("max_transplant2", max_transplant2, "Cantidad Invalida");

						function max_transplant(a){
							var a = document.getElementById('breakdown_transplant').value;
							var b = document.getElementById('volume_transplant').value;
							$.ajax({
								url: "<?php echo base_url('index.php/breakdown/max_volume_transplant/'.$this->uri->segment(3)); ?>", 
								data: {'volume_transplant':b,'breakdown_transplant':a},
								type: "POST",
								success: function(data){
									document.getElementById('inputvaltransplant').value=data.length;
								},
								failure:function(data){
									
								}
							});
							if(document.getElementById('inputvaltransplant').value == 1 ){
								return true;
							}else return false;
						}


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


    	<?php 
			$attributes = array('id' => 'insert_tutoring','name'=>'insert_tutoring');
			echo form_open('breakdown/insert_tutoring/'.$this->uri->segment(3),$attributes); 
			?>
			<div id="myModal6" class="modal fade">
        		<div class="modal-dialog">
            		<div class="modal-content">
                		<div class="modal-header">
                    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    		<h4 class="modal-title">Tutoreo</h4>
                		</div>
                		<div class="modal-body">
							<div class="input-group">
								<p>Variedad/Portainjerto</p>
								<select class="form-control" name="breakdown_tutoring" id="breakdown_tutoring" onchange="max_tutoring(this.value)">
									<option value="-1" selected>---Selecciona una Variedad/Portainjerto---</option>
										<?php 
											foreach($breakdown as $key)
											{
												echo "<option value='" . $key->id_breakdown . "' set_select('breackdown','".$key->id_breakdown."')>" . $key->variety ." / ".$key->rootstock. "</option>";
											}
										?>	
								</select>
							</div><!-- End breakdown_transplant -->
							<div>
								<input type="hidden" id="inputvaltutoring" name="inputvaltutoring" value="true">
							</div>
							<div class="input-group">
								<p>Cantidad</p>
								<input type="text" class="form-control" placeholder="Cantidad" name="volume_tutoring" id="volume_tutoring" onchange="max_tutoring(this.value)">
							</div><!-- End Cantidad -->	
							<div class="input-group">
								<p>Fecha</p>
								<p><a class="btn btn-default" style="height: 31px; border-radius: 0px;" id="butondate5"><i class="fa fa-calendar"></i></a><input type="text" class="datepicker5" placeholder="--Selecciona una Fecha--" id="datepicker5" name="datepicker5" style="width:92%; float: right;" readonly></p>
							</div><!-- End fecha -->
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
                    			<button type="submit" class="btn btn-success" name="save6" id="save6">Confirmar</button>
                			</form>
                		<script>

					    $('#save6').click(function() {
					    	var btn = $(this)
					        btn.button('loading')
					        setTimeout(function () {
					            btn.button('reset')
					        }, 2000)
						});

						$("#insert_tutoring").validate({
							rules: {
								volume_tutoring: {
									required: true,
									number: true,
									max_tutoring:true,
									min:0
								},
								datepicker5: {
									required: true
						        },
								breakdown_tutoring: {
									selectcheck_tutoring: true
						        }
							},
							messages: {
                        		volume_tutoring: {
				                    required: "Este Campo es Requerido",
				                    number: "Este Campo Debe Ser Númerico",
				                    min:"Cantidad Invalida"
				                },
				                 datepicker5:{
									required:"El Campo Fecha es Requerido"
				                }
						  	}
						});

						$.validator.addMethod("selectcheck_tutoring", selectcheck_tutoring, "Selecciona una Variedad/Portainjerto");
						$.validator.addMethod("max_tutoring", max_tutoring, "Cantidad Invalida");
						//$.validator.addMethod("max_transplant2", max_transplant2, "Cantidad Invalida");

						function max_tutoring(a){
							var a = document.getElementById('breakdown_tutoring').value;
							var b = document.getElementById('volume_tutoring').value;
							$.ajax({
								url: "<?php echo base_url('index.php/breakdown/max_volume_tutoring/'.$this->uri->segment(3)); ?>", 
								data: {'volume_tutoring':b,'breakdown_tutoring':a},
								type: "POST",
								success: function(data){
									document.getElementById('inputvaltutoring').value=data.length;
								},
								failure:function(data){
									
								}
							});
							if(document.getElementById('inputvaltutoring').value == 1 ){
								return true;
							}else return false;
						}


						function selectcheck_tutoring(){
							if (document.getElementById('breakdown_tutoring').value < 0){
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
		document.getElementById("check3").disabled= true;
	}

	if (document.getElementById("tutoringa").value == 1){
		document.getElementById("divtutoreo").style.display = "block";
		document.getElementById("check4").checked = true;
		document.getElementById("check4").disabled=true;
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

	$("#check4").click(function() {  
		if (document.getElementById("check4").checked) {
			document.getElementById("divtutoreo").style.display = "block";
		}
		else {
			document.getElementById("divtutoreo").style.display = "none";
		}
	});

</script>

			<div id="myModal111" class="modal fade">
    			<div class="modal-dialog">
       				<div class="modal-content">
            			<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h4 class="modal-title">Agregar imagen a injerto</h4>
            			</div>
            			<div class="modal-body">

                			<?php echo form_open_multipart('breakdown/upload_injer1/'.$this->uri->segment(3));?>
                			<p>Elige una imagen para subir al injerto</p>
							<input id="uploadFile" placeholder="Elige una imagen" disabled="disabled" style="height: 30px; position: relative; top: 5px;"/>
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

			<div id="myModal112" class="modal fade">
    			<div class="modal-dialog">
       				<div class="modal-content">
            			<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h4 class="modal-title">Agregar imagen a injerto</h4>
            			</div>
            			<div class="modal-body">

                			<?php echo form_open_multipart('breakdown/upload_injer2/'.$this->uri->segment(3));?>
                			<p>Elige una imagen para subir al injerto</p>
							<input id="uploadFile1" placeholder="Elige una imagen" disabled="disabled" style="height: 30px; position: relative; top: 5px;"/>
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
			<div id="myModal113" class="modal fade">
    			<div class="modal-dialog">
       				<div class="modal-content">
            			<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h4 class="modal-title">Agregar imagen a injerto</h4>
            			</div>
            			<div class="modal-body">

                			<?php echo form_open_multipart('breakdown/upload_injer3/'.$this->uri->segment(3));?>
                			<p>Elige una imagen para subir al injerto</p>
							<input id="uploadFile3" placeholder="Elige una imagen" disabled="disabled" style="height: 30px; position: relative; top: 5px;"/>
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
                			<button type="submit" class="btn btn-primary" id="upload3">Subir</button>
                			</form>
           				 </div>
        			</div>
    			</div>
			</div>
			<script>
				$('#upload3').click(function() {
			    	var btn = $(this)
			        btn.button('loading')
			        setTimeout(function () {
			            btn.button('reset')
			        }, 5000)
				});
			</script>
			<div id="myModal222" class="modal fade">
    			<div class="modal-dialog">
       				<div class="modal-content">
            			<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h4 class="modal-title">Agregar imagen a pinchado</h4>
            			</div>
            			<div class="modal-body">

                			<?php echo form_open_multipart('breakdown/upload_pinch1/'.$this->uri->segment(3));?>
                			<p>Elige una imagen para subir al pinchado</p>
							<input id="uploadFile4" placeholder="Elige una imagen" disabled="disabled" style="height: 30px; position: relative; top: 5px;"/>
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
			<div id="myModal223" class="modal fade">
    			<div class="modal-dialog">
       				<div class="modal-content">
            			<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h4 class="modal-title">Agregar imagen a pinchado</h4>
            			</div>
            			<div class="modal-body">

                			<?php echo form_open_multipart('breakdown/upload_pinch2/'.$this->uri->segment(3));?>
                			<p>Elige una imagen para subir al pinchado</p>
							<input id="uploadFile5" placeholder="Elige una imagen" disabled="disabled" style="height: 30px; position: relative; top: 5px;"/>
							<div class="fileUpload btn btn-success">
    							<span>Buscar</span>
							    <input id="uploadBtn5" type="file" class="upload" name="userfile"/>
							</div>

							<script>
								document.getElementById("uploadBtn5").onchange = function () {
					    			document.getElementById("uploadFile5").value = this.value;
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
			<div id="myModal224" class="modal fade">
    			<div class="modal-dialog">
       				<div class="modal-content">
            			<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h4 class="modal-title">Agregar imagen a pinchado</h4>
            			</div>
            			<div class="modal-body">

                			<?php echo form_open_multipart('breakdown/upload_pinch3/'.$this->uri->segment(3));?>
                			<p>Elige una imagen para subir al pinchado</p>
							<input id="uploadFile6" placeholder="Elige una imagen" disabled="disabled" style="height: 30px; position: relative; top: 5px;"/>
							<div class="fileUpload btn btn-success">
    							<span>Buscar</span>
							    <input id="uploadBtn6" type="file" class="upload" name="userfile"/>
							</div>

							<script>
								document.getElementById("uploadBtn6").onchange = function () {
					    			document.getElementById("uploadFile6").value = this.value;
								};
							</script>

           	 			</div>
            			<div class="modal-footer">
               	 			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                			<button type="submit" class="btn btn-primary" id="upload6">Subir</button>
                			</form>
           				 </div>
        			</div>
    			</div>
			</div>
			<script>
				$('#upload6').click(function() {
			    	var btn = $(this)
			        btn.button('loading')
			        setTimeout(function () {
			            btn.button('reset')
			        }, 5000)
				});
			</script>

			<div id="myModal335" class="modal fade">
    			<div class="modal-dialog">
       				<div class="modal-content">
            			<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h4 class="modal-title">Agregar imagen a transplante</h4>
            			</div>
            			<div class="modal-body">

                			<?php echo form_open_multipart('breakdown/upload_trans1/'.$this->uri->segment(3));?>
                			<p>Elige una imagen para subir al transplante</p>
							<input id="uploadFile7" placeholder="Elige una imagen" disabled="disabled" style="height: 30px; position: relative; top: 5px;"/>
							<div class="fileUpload btn btn-success">
    							<span>Buscar</span>
							    <input id="uploadBtn7" type="file" class="upload" name="userfile"/>
							</div>

							<script>
								document.getElementById("uploadBtn7").onchange = function () {
					    			document.getElementById("uploadFile7").value = this.value;
								};
							</script>

           	 			</div>
            			<div class="modal-footer">
               	 			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                			<button type="submit" class="btn btn-primary" id="upload7">Subir</button>
                			</form>
           				 </div>
        			</div>
    			</div>
			</div>
			<script>
				$('#upload7').click(function() {
			    	var btn = $(this)
			        btn.button('loading')
			        setTimeout(function () {
			            btn.button('reset')
			        }, 5000)
				});
			</script>
			<div id="myModal336" class="modal fade">
    			<div class="modal-dialog">
       				<div class="modal-content">
            			<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h4 class="modal-title">Agregar imagen a transplante</h4>
            			</div>
            			<div class="modal-body">

                			<?php echo form_open_multipart('breakdown/upload_trans2/'.$this->uri->segment(3));?>
                			<p>Elige una imagen para subir al transplante</p>
							<input id="uploadFile8" placeholder="Elige una imagen" disabled="disabled" style="height: 30px; position: relative; top: 5px;"/>
							<div class="fileUpload btn btn-success">
    							<span>Buscar</span>
							    <input id="uploadBtn8" type="file" class="upload" name="userfile"/>
							</div>

							<script>
								document.getElementById("uploadBtn8").onchange = function () {
					    			document.getElementById("uploadFile8").value = this.value;
								};
							</script>

           	 			</div>
            			<div class="modal-footer">
               	 			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                			<button type="submit" class="btn btn-primary" id="upload8">Subir</button>
                			</form>
           				 </div>
        			</div>
    			</div>
			</div>
			<script>
				$('#upload8').click(function() {
			    	var btn = $(this)
			        btn.button('loading')
			        setTimeout(function () {
			            btn.button('reset')
			        }, 5000)
				});
			</script>
			<div id="myModal337" class="modal fade">
    			<div class="modal-dialog">
       				<div class="modal-content">
            			<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h4 class="modal-title">Agregar imagen a transplante</h4>
            			</div>
            			<div class="modal-body">

                			<?php echo form_open_multipart('breakdown/upload_trans3/'.$this->uri->segment(3));?>
                			<p>Elige una imagen para subir al transplante</p>
							<input id="uploadFile9" placeholder="Elige una imagen" disabled="disabled" style="height: 30px; position: relative; top: 5px;"/>
							<div class="fileUpload btn btn-success">
    							<span>Buscar</span>
							    <input id="uploadBtn9" type="file" class="upload" name="userfile"/>
							</div>

							<script>
								document.getElementById("uploadBtn9").onchange = function () {
					    			document.getElementById("uploadFile9").value = this.value;
								};
							</script>

           	 			</div>
            			<div class="modal-footer">
               	 			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                			<button type="submit" class="btn btn-primary" id="upload9">Subir</button>
                			</form>
           				 </div>
        			</div>
    			</div>
			</div>

			<script>
				$('#upload9').click(function() {
			    	var btn = $(this)
			        btn.button('loading')
			        setTimeout(function () {
			            btn.button('reset')
			        }, 5000)
				});
			</script>

			<div id="myModal444" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title">Confirmación</h4>
			            </div>
			            <div class="modal-body">			                
			                <p>¿Estás seguro de querer eliminar esta imagen?</p>
			                <p class="text-warning"><small>La imagen será eliminada completamente y no podrá ser recuperada.</small></p>
			            </div>
			            <div class="modal-footer">
			            	<?php echo form_open('breakdown/delete_injer1/'.$this->uri->segment(3));?>
			                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			                <button type="submit" class="btn btn-primary">Borrar</button>
			            	</form>
			            </div>
			        </div>
			    </div>
			</div>

			<div id="myModal445" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title">Confirmación</h4>
			            </div>
			            <div class="modal-body">			                
			                <p>¿Estás seguro de querer eliminar esta imagen?</p>
			                <p class="text-warning"><small>La imagen será eliminada completamente y no podrá ser recuperada.</small></p>
			            </div>
			            <div class="modal-footer">
			            	<?php echo form_open('breakdown/delete_injer2/'.$this->uri->segment(3));?>
			                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			                <button type="submit" class="btn btn-primary">Borrar</button>
			            	</form>
			            </div>
			        </div>
			    </div>
			</div>

			<div id="myModal446" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title">Confirmación</h4>
			            </div>
			            <div class="modal-body">			                
			                <p>¿Estás seguro de querer eliminar esta imagen?</p>
			                <p class="text-warning"><small>La imagen será eliminada completamente y no podrá ser recuperada.</small></p>
			            </div>
			            <div class="modal-footer">
			            	<?php echo form_open('breakdown/delete_injer3/'.$this->uri->segment(3));?>
			                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			                <button type="submit" class="btn btn-primary">Borrar</button>
			            	</form>
			            </div>
			        </div>
			    </div>
			</div>

			<div id="myModal553" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title">Confirmación</h4>
			            </div>
			            <div class="modal-body">			                
			                <p>¿Estás seguro de querer eliminar esta imagen?</p>
			                <p class="text-warning"><small>La imagen será eliminada completamente y no podrá ser recuperada.</small></p>
			            </div>
			            <div class="modal-footer">
			            	<?php echo form_open('breakdown/delete_pinch1/'.$this->uri->segment(3));?>
			                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			                <button type="submit" class="btn btn-primary">Borrar</button>
			            	</form>
			            </div>
			        </div>
			    </div>
			</div>

			<div id="myModal554" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title">Confirmación</h4>
			            </div>
			            <div class="modal-body">			                
			                <p>¿Estás seguro de querer eliminar esta imagen?</p>
			                <p class="text-warning"><small>La imagen será eliminada completamente y no podrá ser recuperada.</small></p>
			            </div>
			            <div class="modal-footer">
			            	<?php echo form_open('breakdown/delete_pinch2/'.$this->uri->segment(3));?>
			                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			                <button type="submit" class="btn btn-primary">Borrar</button>
			            	</form>
			            </div>
			        </div>
			    </div>
			</div>

			<div id="myModal555" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title">Confirmación</h4>
			            </div>
			            <div class="modal-body">			                
			                <p>¿Estás seguro de querer eliminar esta imagen?</p>
			                <p class="text-warning"><small>La imagen será eliminada completamente y no podrá ser recuperada.</small></p>
			            </div>
			            <div class="modal-footer">
			            	<?php echo form_open('breakdown/delete_pinch3/'.$this->uri->segment(3));?>
			                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			                <button type="submit" class="btn btn-primary">Borrar</button>
			            	</form>
			            </div>
			        </div>
			    </div>
			</div>

			<div id="myModal661" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title">Confirmación</h4>
			            </div>
			            <div class="modal-body">			                
			                <p>¿Estás seguro de querer eliminar esta imagen?</p>
			                <p class="text-warning"><small>La imagen será eliminada completamente y no podrá ser recuperada.</small></p>
			            </div>
			            <div class="modal-footer">
			            	<?php echo form_open('breakdown/delete_trans1/'.$this->uri->segment(3));?>
			                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			                <button type="submit" class="btn btn-primary">Borrar</button>
			            	</form>
			            </div>
			        </div>
			    </div>
			</div>

			<div id="myModal662" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title">Confirmación</h4>
			            </div>
			            <div class="modal-body">			                
			                <p>¿Estás seguro de querer eliminar esta imagen?</p>
			                <p class="text-warning"><small>La imagen será eliminada completamente y no podrá ser recuperada.</small></p>
			            </div>
			            <div class="modal-footer">
			            	<?php echo form_open('breakdown/delete_trans2/'.$this->uri->segment(3));?>
			                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			                <button type="submit" class="btn btn-primary">Borrar</button>
			            	</form>
			            </div>
			        </div>
			    </div>
			</div>

			<div id="myModal663" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title">Confirmación</h4>
			            </div>
			            <div class="modal-body">			                
			                <p>¿Estás seguro de querer eliminar esta imagen?</p>
			                <p class="text-warning"><small>La imagen será eliminada completamente y no podrá ser recuperada.</small></p>
			            </div>
			            <div class="modal-footer">
			            	<?php echo form_open('breakdown/delete_trans3/'.$this->uri->segment(3));?>
			                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			                <button type="submit" class="btn btn-primary">Borrar</button>
			            	</form>
			            </div>
			        </div>
			    </div>
			</div>

			<div id="myModal771" class="modal fade">
    			<div class="modal-dialog">
       				<div class="modal-content">
            			<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h4 class="modal-title">Agregar imagen a tutoreo</h4>
            			</div>
            			<div class="modal-body">

                			<?php echo form_open_multipart('breakdown/upload_tuto1/'.$this->uri->segment(3));?>
                			<p>Elige una imagen para subir al tutoreo</p>
							<input id="uploadFile10" placeholder="Elige una imagen" disabled="disabled" style="height: 30px; position: relative; top: 5px;"/>
							<div class="fileUpload btn btn-success">
    							<span>Buscar</span>
							    <input id="uploadBtn10" type="file" class="upload" name="userfile"/>
							</div>

							<script>
								document.getElementById("uploadBtn10").onchange = function () {
					    			document.getElementById("uploadFile10").value = this.value;
								};
							</script>

           	 			</div>
            			<div class="modal-footer">
               	 			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                			<button type="submit" class="btn btn-primary" id="upload10">Subir</button>
                			</form>
           				 </div>
        			</div>
    			</div>
			</div>

			<script>
				$('#upload10').click(function() {
			    	var btn = $(this)
			        btn.button('loading')
			        setTimeout(function () {
			            btn.button('reset')
			        }, 5000)
				});
			</script>

			<div id="myModal772" class="modal fade">
    			<div class="modal-dialog">
       				<div class="modal-content">
            			<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h4 class="modal-title">Agregar imagen a tutoreo</h4>
            			</div>
            			<div class="modal-body">

                			<?php echo form_open_multipart('breakdown/upload_tuto2/'.$this->uri->segment(3));?>
                			<p>Elige una imagen para subir al tutotreo</p>
							<input id="uploadFile11" placeholder="Elige una imagen" disabled="disabled" style="height: 30px; position: relative; top: 5px;"/>
							<div class="fileUpload btn btn-success">
    							<span>Buscar</span>
							    <input id="uploadBtn11" type="file" class="upload" name="userfile"/>
							</div>

							<script>
								document.getElementById("uploadBtn11").onchange = function () {
					    			document.getElementById("uploadFile11").value = this.value;
								};
							</script>

           	 			</div>
            			<div class="modal-footer">
               	 			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                			<button type="submit" class="btn btn-primary" id="upload11">Subir</button>
                			</form>
           				 </div>
        			</div>
    			</div>
			</div>

			<script>
				$('#upload11').click(function() {
			    	var btn = $(this)
			        btn.button('loading')
			        setTimeout(function () {
			            btn.button('reset')
			        }, 5000)
				});
			</script>

			<div id="myModal773" class="modal fade">
    			<div class="modal-dialog">
       				<div class="modal-content">
            			<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h4 class="modal-title">Agregar imagen a tutoreo</h4>
            			</div>
            			<div class="modal-body">

                			<?php echo form_open_multipart('breakdown/upload_tuto3/'.$this->uri->segment(3));?>
                			<p>Elige una imagen para subir al tutoreo</p>
							<input id="uploadFile11" placeholder="Elige una imagen" disabled="disabled" style="height: 30px; position: relative; top: 5px;"/>
							<div class="fileUpload btn btn-success">
    							<span>Buscar</span>
							    <input id="uploadBtn11" type="file" class="upload" name="userfile"/>
							</div>

							<script>
								document.getElementById("uploadBtn11").onchange = function () {
					    			document.getElementById("uploadFile11").value = this.value;
								};
							</script>

           	 			</div>
            			<div class="modal-footer">
               	 			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                			<button type="submit" class="btn btn-primary" id="upload11">Subir</button>
                			</form>
           				 </div>
        			</div>
    			</div>
			</div>

			<script>
				$('#upload11').click(function() {
			    	var btn = $(this)
			        btn.button('loading')
			        setTimeout(function () {
			            btn.button('reset')
			        }, 5000)
				});
			</script>

			<div id="myModal881" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title">Confirmación</h4>
			            </div>
			            <div class="modal-body">			                
			                <p>¿Estás seguro de querer eliminar esta imagen?</p>
			                <p class="text-warning"><small>La imagen será eliminada completamente y no podrá ser recuperada.</small></p>
			            </div>
			            <div class="modal-footer">
			            	<?php echo form_open('breakdown/delete_tuto1/'.$this->uri->segment(3));?>
			                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			                <button type="submit" class="btn btn-primary">Borrar</button>
			            	</form>
			            </div>
			        </div>
			    </div>
			</div>

			<div id="myModal882" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title">Confirmación</h4>
			            </div>
			            <div class="modal-body">			                
			                <p>¿Estás seguro de querer eliminar esta imagen?</p>
			                <p class="text-warning"><small>La imagen será eliminada completamente y no podrá ser recuperada.</small></p>
			            </div>
			            <div class="modal-footer">
			            	<?php echo form_open('breakdown/delete_tuto2/'.$this->uri->segment(3));?>
			                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			                <button type="submit" class="btn btn-primary">Borrar</button>
			            	</form>
			            </div>
			        </div>
			    </div>
			</div>

			<div id="myModal881" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title">Confirmación</h4>
			            </div>
			            <div class="modal-body">			                
			                <p>¿Estás seguro de querer eliminar esta imagen?</p>
			                <p class="text-warning"><small>La imagen será eliminada completamente y no podrá ser recuperada.</small></p>
			            </div>
			            <div class="modal-footer">
			            	<?php echo form_open('breakdown/delete_tuto3/'.$this->uri->segment(3));?>
			                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			                <button type="submit" class="btn btn-primary">Borrar</button>
			            	</form>
			            </div>
			        </div>
			    </div>
			</div>
