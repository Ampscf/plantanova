<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> EMBARQUE </h3>
			</div>
			<?php 
				$attributes = array('id' => 'registry', 'name' => 'registry');
				echo form_open('breakdown/finish_order/'.$this->uri->segment(3),$attributes); 
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

						
							<h3>Transportador</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Transportador" name="transporter" id="transporter" value="<?php echo $embark[0]->transporter;?>">
							</div><!-- End farm name -->

							<div class="clear">&nbsp</div>
							<h3>Fecha de Embarque</h3>
							<div class="input-group">
								<p><a class="btn btn-default" style="height: 46px; border-radius: 0px;" id="butondate"><i class="fa fa-calendar fa-2x"></i></a><input type="text" class="form-control" placeholder="--Selecciona una Fecha--" id="datepicker" name="datepicker" style="width:93%; float: right;" value="<?php echo date("d-m-Y",strtotime($embark[0]->date));?>" readonly></p>
							</div><!-- End fecha -->

							<div class="clear">&nbsp</div>
							<h3>Volumen Final</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Volumen Final" name="final_volume" id="final_volume" value="<?php echo $embark[0]->final_volume;?>">
							</div><!-- End address number -->

							<div class="clear">&nbsp</div>
							<h3>Comentario</h3>
							<div class="input-group input-group-lg">
								<textarea class="form-control" rows="4" style="height: auto;" id="comment" name="comment"><?php echo $embark[0]->comment; ?></textarea>								
							</div><!-- End comment -->

											
					</div>

				</div><!-- End panel-body -->
				
			
			
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-3 col-md-offset-1">
							<?php  
								$data = array(
									'class'	=> 'btn btn-primary btn-block',
									'name' => 'Cancelar',
								);
								echo anchor('breakdown/process/'.$this->uri->segment(3), 'Regresar', $data);
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
									number: "El Campo Volumen Final debe ser Numerico"
								}
						    }
						});
						
			</script>
