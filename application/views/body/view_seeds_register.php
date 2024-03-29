<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> Formulario de Semillas </h3>
			</div>
			
				<div class="panel-body" style="padding: 10px 10px 10px 10px;">
					
					<div class="col-md-12">
						<div class="input-group input-group-lg">
							<p><b>Pedido: <?php echo $order_number;?></b></p>
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
								<p><b>Número #: </b><?php echo $client->result()[0]->address_number;?></p>
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
								<p><b>Fecha: </b><?php echo date("d-m-Y",strtotime($fecha))?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Tipo de cultivo:</b> <?php echo $planta->result()[0]->plant_name;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Categoría:</b> <?php echo $categoria->result()[0]->category_name;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Volumen Total Pedido:</b> <?php echo number_format($volumen);?></p>
							</div><!-- End nombre -->

							<div class="input-group input-group-lg">
								<p><b>Volumen Total Semillas:</b> <?php echo number_format($suma->volume);?></p>
							</div><!-- End nombre -->
							
						</div>
						
					</div>
					
					<div class="clear">&nbsp</div>
					<div class="table-responsive">
						<a href="#myModal" class="btn btn-success" data-toggle="modal">+ Agregar</a>
						<div class="clear">&nbsp</div>
						<?php include_once('application/views/extra/tabla_semillas.php'); ?>
					</div>
					<?php 
			$attributes = array('id' => 'register_seeds','name'=>'register_seeds');
			echo form_open('seeds/register_seeds/'.$this->uri->segment(3).'/'.$this->uri->segment(4),$attributes); 
			?>
			<div id="myModal" class="modal fade">
        		<div class="modal-dialog">
            		<div class="modal-content">
                		<div class="modal-header">
                    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    		<h4 class="modal-title">Recepcion de Semilla</h4>
                		</div>
                		<div class="modal-body">			
							<h3>Variedad / Portainjerto</h3>
							<div class="input-group input-group-lg">
								
								<select class="form-control" name="type" id="type" onchange="get_type(this.value,<?php echo $this->uri->segment(3);?>);">
									<option value="Variedad" selected>Variedad</option>
									<option value="Portainjerto">Portainjerto</option>
									
								</select>
							</div><!-- End variedad/portainjerto -->
				
							<div class="clear">&nbsp</div>
							<h3>Semilla</h3>
							<div class="input-group input-group-lg">								
								<select class="form-control" name="seed_name" id="seed_name" >
									<?php 
										foreach($varial as $key)
										{
											echo "<option value='" . $key->variety . "' set_select('id_order','".$key->variety."')>" . $key->variety . "</option>";
										}
									?>
								</select>
							</div><!-- End semilla -->

							<div class="clear">&nbsp</div>
							<h3>Cantidad</h3>
							<div class="input-group input-group-lg">
								
								<input type="text" class="form-control" placeholder="Cantidad" name="volume" id="volume" value="<?php echo set_value('volume'); ?>">
							</div><!-- End cantidad -->		

							<div class="clear">&nbsp</div>
							<h3>Cultivo</h3>
							<div class="input-group input-group-lg">								
								<select class="form-control" name="crop" id="crop" >
									<?php 
										foreach($crop as $key)
										{
											echo "<option value='" . $key->plant_name . "' set_select('plant_name','".$key->plant_name."')>" . $key->plant_name . "</option>";
										}
									?>
								</select>
							</div><!-- End semilla -->

							<div class="clear">&nbsp</div>
							<h3>Marca</h3>
							<div class="input-group input-group-lg">								
								<input type="text" class="form-control" placeholder="Marca" name="mark" id="mark" value="<?php echo set_value('mark'); ?>">
							</div><!-- End semilla -->
							<div class="clear">&nbsp</div>
							<h3>Lote</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Lote" name="batch" id="batch" value="<?php echo set_value('batch'); ?>">
							</div><!-- End lote -->							
							
							<div class="clear">&nbsp</div>
							<h3>Fecha</h3>
							<div class="input-group input-group-lg">
								<p><a class="btn btn-default" style="height: 31px; border-radius: 0px;" id="butondate"><i class="fa fa-calendar"></i></a><input type="text" class="form-control" placeholder="--Selecciona una Fecha--" id="datepicker" name="datepicker" style="width:92%; float: right;" readonly></p>
							</div><!-- End fecha -->
							
							<div class="clear">&nbsp</div>
							<h3>Porcentaje de germinación</h3>
							<div class="input-group input-group-lg">
								
								<input type="text" class="form-control" placeholder="Porcentaje de germinación" name="germ_percentage" id="germ_percentage" value="<?php echo set_value('seed_name'); ?>">
							</div><!-- End porcentaje de germ -->				
                    		
                		</div>
                		<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    			<button type="submit" id="buttol" class="btn btn-success" name="">Confirmar</button>
                			</form>
						</div>
            		</div>
        		</div>
    		</div>
    	</div><!-- End panel-body -->
    	<script>

					  	 $('#buttol').click(function() {
					    	var btn = $(this)
					        btn.button('loading')
					        setTimeout(function () {
					            btn.button('reset')
					        }, 2000)
						});

						$("#register_seeds").validate({
							rules: {
								volume: {
									required: true,
									number: true
								},
								mark:{
									required:true
								},
						       	batch:{
						       		required: true
						       },
						        datepicker: {
						            required: true
						        },
						        germ_percentage: {
						            number:true,
						            max:100
						        }
							},
							messages: {
                        		volume: {
				                    required: "El Campo Volumen es Requerido",
				                    number: "El Campo Volumen debe ser Numerico"
				                },
				                mark:{
				                	required:"El Campo Marca es Requerido"
				                },
				                batch: {
				                    required: "El Campo Lote es Requerido"
				                },
				                datepicker:{
				                	required:"El Campo Fecha es Requerido"
				                },
				                germ_percentage:{
				                	number:"El Campo Porcentaje debe ser Numerico",
				                	max:"Ingrese un Porcentaje Valido"
				                }
						  	}
						});

						
						
				</script>	

				<div class="panel-footer">
					<div class="row">
						<?php
						if($this->uri->segment(4)==1){
						?>
						<div class="col-md-3 col-md-offset-1">
							<?php  
								$data = array(
									'class'	=> 'btn btn-primary btn-block',
									'name' => 'Regresar',
								);
								echo anchor('seeds/index', 'Regresar', $data);
							?>
						</div>
						<?php
							}else{
						?>
						<div class="col-md-3 col-md-offset-1">
							<?php  
								$data = array(
									'class'	=> 'btn btn-primary btn-block',
									'name' => 'Regresar',
								);
								echo anchor('breakdown/index', 'Regresar', $data);
							?>
						</div>		
						<?php
							}
						?>
						<?php 
						$attributes = array('id' => 'register_status','name'=>'register_status');
						echo form_open('seeds/register_status/'.$this->uri->segment(3),$attributes); 
						?>
						<div class="col-md-3 col-md-offset-4">
							<?php if(is_array($seeds))
									{?>
							<button type="submit" class="btn btn-success btn-block" id="buttos" style="float: right">Registrar</button>
							<?php }else{?>
							<button type="submit" class="btn btn-success btn-block" id="buttos" style="float: right;" disabled>Registrar</button>
							<?php }?>
						</div>
						</form>
					</div><!-- End row -->
				</div><!-- End panel-footer -->
		</div><!-- End panel-default -->
	</div><!-- End col-md-4 col-md-offset-4 -->
</div><!-- End row -->

<script>
$('#buttos').click(function() {
	var btn = $(this)
	btn.button('loading')
	setTimeout(function () {
	    btn.button('reset')
	}, 1000)
});
</script>