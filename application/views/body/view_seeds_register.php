<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> Formulario de Semillas </h3>
			</div>
				
			<?php 
				$attributes = array('id' => 'register_seeds');
				echo form_open('seeds/register_seeds',$attributes); 
			?>
				<div class="panel-body" style="padding: 10px 10px 10px 10px;">
					
					<div class="col-md-12">
						<div class="input-group input-group-lg">
							<p><b>Pedido: <?php //echo $id_order;?></b></p>
						</div><!-- End nombre -->
						
						<div class="col-md-6">
						
							<div class="input-group input-group-lg">
								<p><b>Nombre Completo:</b> <?php //echo $client->result()[0]->first_name." ".$client->result()[0]->last_name;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Correo Electrónico: </b><?php //echo $client->result()[0]->mail;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Teléfono:</b> <?php //echo $client->result()[0]->phone;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Calle/Colonia:</b> <?php //echo $client->result()[0]->street." ".$client->result()[0]->colony;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Número: </b><?php //echo $client->result()[0]->address_number;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>CP:</b> <?php //echo $client->result()[0]->cp;?></p>
							</div><!-- End nombre -->
						
						</div>
						
						<div class="col-md-6">
							
							<div class="input-group input-group-lg">
								<p><b>Razón Social:</b> <?php //echo $client->result()[0]->social_reason;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Fecha: </b><?php //echo date("d-m-Y",strtotime($fecha))?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Tipo de cultivo:</b> <?php //echo $planta->result()[0]->plant_name;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Categoría:</b> <?php //echo $categoria->result()[0]->category_name;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Volumen Total:</b> <?php //echo number_format($volumen);?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Volumen Plantado:</b> <?php //echo number_format($suma->result()[0]->volume);?></p>
							</div><!-- End nombre -->
							
						</div>
					</div>

					<!-- farm name, street, addr number, colony, cp, state, city, phone, social reason, rfc -->
					<div class="col-md-12">

						<div class="clear">&nbsp</div>

						<div class="col-md-12">
							<h3><span class="glyphicon glyphicon-list-alt"></span> Recepcion de Semilla</h3>
						</div>

						<div class="clear">&nbsp</div>

						<div class="col-md-6">
						
							<div class="clear">&nbsp</div>
							<h3>Variedad / Portainjerto</h3>
							<div class="input-group input-group-lg">
								
								<select class="form-control" name="type" id="type">
									<option selected>Variedad</option>
									<option >Portainjerto</option>
									
								</select>
							</div><!-- End seed -->
							
							<?php echo form_error('type'); ?>	

							<div class="clear">&nbsp</div>
							<h3>Cantidad</h3>
							<div class="input-group input-group-lg">
								
								<input type="text" class="form-control" placeholder="Cantidad" name="volume" id="volume" value="<?php echo set_value('volume'); ?>">
							</div><!-- End cp -->
							<?php echo form_error('volume'); ?>

							<div class="clear">&nbsp</div>
							<h3>Procentaje de germinación</h3>
							<div class="input-group input-group-lg">
								
								<input type="text" class="form-control" placeholder="Porcentaje de germinación" name="seed_name" id="seed_name" value="<?php echo set_value('seed_name'); ?>">
							</div><!-- End address number -->
							<?php echo form_error('seed_name'); ?>

						</div>						

						<div class="col-md-6">
						
							<div class="clear">&nbsp</div>
							<h3>Semilla</h3>
							<div class="input-group input-group-lg">
								
								
								<select class="form-control" name="id_order" id="id_order" onchange="get_order(this.value);">
									<option value="-1" selected>---Selecciona una Semilla---</option>
									<?php 
										foreach($order as $key)
										{
											echo "<option value='" . $key->id_order . "' set_select('id_order','".$key->id_order."')>" ."Orden ". $key->id_order . "</option>";
										}
									?>
								</select>
							</div><!-- End state -->
							<?php echo form_error('id_order'); ?>
							
							<div class="clear">&nbsp</div>
							<h3>Lote</h3>
							<div class="input-group input-group-lg">
								
								<input type="text" class="form-control" placeholder="Lote" name="batch" id="batch" value="<?php echo set_value('batch'); ?>">
							</div><!-- End street -->
							<?php echo form_error('batch'); ?>
							

						</div>					

					</div>

				</div><!-- End panel-body -->

			<?php
			echo form_close();
			?><!-- End form -->

				<div class="panel-footer">
					<div class="row">
						<div class="col-md-3 col-md-offset-1">
							<input class="btn btn-success btn-block" type="submit" value="Registrar" onClick="register_seeds();">
						</div>
						<div class="col-md-3 col-md-offset-4">
							<?php  
								$data = array(
									'class'	=> 'btn btn-primary btn-block',
									'name' => 'Cancelar',
								);
								echo anchor('seeds/index', 'Cancelar', $data);
							?>
						</div>
					</div><!-- End row -->
				</div><!-- End panel-footer -->
			
		</div><!-- End panel-default -->
	</div><!-- End col-md-4 col-md-offset-4 -->
</div><!-- End row -->
