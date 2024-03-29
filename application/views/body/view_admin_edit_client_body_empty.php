<div class="row">
	<div class="col-xs-8 col-xs-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> Edicion de Cliente </h3>
			</div>
			<?php 
				//jalar de la base de datos id_town
				$town_client=$this->model_user->obtenerCliente($this->uri->segment(3));
				$id_tow_client=$town_client->result()[0]->id_town;
				//jalar de la base de datos town
				$town=$this->model_order->get_town_id($id_tow_client);
				$town_name=$town->result()[0]->town_name;
				$id_town=$town->result()[0]->id_town;
				$id_state=$town->result()[0]->id_state;
				//jalar de la base de datos state
				$state=$this->model_order->get_state_id($id_state);
				$state_name=$state->result()[0]->state_name;
				$id_state=$state->result()[0]->id_state;

				//obtiene solo las ciudades del estado selecionado en un principio
				$towns_id=$this->model_order->get_towns_id($id_state);

				$attributes = array('id' => 'update');
				echo form_open('admin/update_client/'.$this->uri->segment(3),$attributes);


			?>
				<div class="panel-body" style="padding: 10px 10px 10px 10px;">

					<!-- farm name, street, addr number, colony, cp, state, city, phone, social reason, rfc -->
					<div class="col-xs-12">

						<div class="clear">&nbsp</div>

						<div class="col-xs-12">
							<h3><span class="glyphicon glyphicon-list-alt"></span> Datos Empresa</h3>
						</div>

						<div class="clear">&nbsp</div>

						<input type="hidden" name="rol" id="rol" value="2" />

						<div class="col-xs-6">
							<h3>Empresa</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Empresa" name="farm_name" id="farm_name" value="<?php echo set_value('farm_name'); ?>">
							</div><!-- End farm name -->
							<?php echo form_error('farm_name'); ?>

							<div class="clear">&nbsp</div>

							<div class="input-group input-group-lg">
								<h3>Número</h3>
								<input type="text" class="form-control" placeholder="Número" name="addr_number" id="addr_number" onkeyup="this.value=add_commas(this.value);" value="<?php echo set_value('addr_number'); ?>">
							</div><!-- End address number -->
							<?php echo form_error('addr_number'); ?>

							<div class="clear">&nbsp</div>
							<h3>CP</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="CP" name="cp" id="cp" value="<?php echo set_value('cp'); ?>">
							</div><!-- End cp -->
							<?php echo form_error('cp'); ?>

							<div class="clear">&nbsp</div>
							<h3>Estado</h3>
							<div class="input-group input-group-lg">
								<select class="form-control" name="state" id="state" onchange="get_towns(this.value);">
									<option value="<?php echo $id_state; ?>" selected><?php echo $state_name;?></option>
									<?php 
										foreach($states as $key)
										{
											echo "<option value='" . $key->id_state . "' set_select('state','".$key->id_state."')>" . $key->state_name . "</option>";
										}
									?>
								</select>
							</div><!-- End state -->
							<?php echo form_error('state'); ?>	

							<div class="clear">&nbsp</div>
							<h3>Razón Social</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Razón Social" name="social_reason" id="social_reason" value="<?php echo set_value('social_reason'); ?>">
							</div><!-- End social reason -->
							<?php echo form_error('social_reason'); ?>
						</div>						

						<div class="col-xs-6">
							<h3>Calle</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Calle" name="street" id="street" value="<?php echo set_value('street'); ?>">
							</div><!-- End street -->
							<?php echo form_error('street'); ?>

							<div class="clear">&nbsp</div>
							<h3>Colonia</h3>						
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Colonia" name="colony" id="colony" value="<?php echo set_value('colony'); ?>">
							</div><!-- End colony -->
							<?php echo form_error('colony'); ?>

							<div class="clear">&nbsp</div>
							<h3>Teléfono Empresa</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Teléfono Empresa" name="company_phone" id="company_phone" value="<?php echo set_value('company_phone'); ?>">
							</div><!-- End company_phone -->
							<?php echo form_error('company_phone'); ?>

							<div class="clear">&nbsp</div>
							<h3>Ciudad</h3>
							<div class="input-group input-group-lg">
								<select class="form-control" name="town" id="town">
									<option selected value="<?php echo $id_town; ?>"><?php echo $town_name; ?></option>
									<?php 
										foreach($towns_id as $key)
										{
											echo "<option value='" . $key->id_town . "' set_select('town','".$key->id_town."') >" . $key->town_name . "</option>";
										}
									?>
								</select>
							</div><!-- End town -->

							<div class="clear">&nbsp</div>
							<h3>RFC</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="RFC" name="rfc" id="rfc" value="<?php echo set_value('rfc'); ?>">
							</div><!-- End rfc -->
							<?php echo form_error('rfc'); ?>
						</div>					

					</div>
				

					<!-- Company representant:  Name, last name, phone, cellphone, email -->
					<div class="col-xs-12">

						<div class="clear">&nbsp</div>

						<div class="col-xs-12">
							<h3><span class="glyphicon glyphicon-user"></span> Representante de la empresa</h3>
						</div>

						<div class="clear">&nbsp</div>

						<div class="col-xs-6">
							<h3>Nombre(s)</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Nombre(s)" name="first_name" id="first_name" value="<?php echo set_value('first_name'); ?>">
							</div><!-- End first name -->
							<?php echo form_error('first_name'); ?>

							<div class="clear">&nbsp</div>
							<h3>Teléfono</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Teléfono" name="phone" id="phone" value="<?php echo set_value('phone'); ?>">
							</div><!-- End phone -->
							<?php echo form_error('phone'); ?>

							<div class="clear">&nbsp</div>
							<h3>Correo Electrónico</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Correo Electrónico" name="email" id="email" value="<?php echo set_value('email'); ?>">
							</div><!-- End email -->
							<?php echo form_error('email'); ?>	

						</div>

						<div class="col-xs-6">
							<h3>Apellido(s)</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Apellido(s)" name="last_name" id="last_name" value="<?php echo set_value('last_name'); ?>">
							</div><!-- End last name -->
							<?php echo form_error('last_name'); ?>

							<div class="clear">&nbsp</div>
							<h3>Celular</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Celular" name="cellphone" id="cellphone" value="<?php echo set_value('cellphone'); ?>">
							</div><!-- End cellphone -->
							<?php echo form_error('cellphone'); ?>
						</div>
											

						<!-- <div class="clear">&nbsp</div>	

						<div class="input-group input-group-lg">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-eye-close"></span>
							</div>
							<input type="password" class="form-control" placeholder="Contraseña" name="password" id="password">

						</div> End password -->
					</div>

				</div><!-- End panel-body -->

			<?php echo form_close(); ?><!-- End form -->

				<div class="panel-footer">
					<div class="row">
						
						<div class="col-xs-3 col-xs-offset-1">
							<?php  
								$data = array(
									'class'	=> 'btn btn-primary btn-block',
									'name' => 'Cancelar',
								);
								echo anchor('admin/list_clients', 'Cancelar', $data);
							?>
						</div>
						<div class="col-xs-3 col-xs-offset-4">
							<input class="btn btn-success btn-block" type="submit" id="button" value="Editar Cuenta" onClick="update_client();"/>
						</div>
					</div><!-- End row -->
				</div><!-- End panel-footer -->
			
		</div><!-- End panel-default -->
	</div><!-- End col-md-4 col-md-offset-4 -->
</div><!-- End row -->

<script>
$('#button').click(function() {
					    	var btn = $(this)
					        btn.button('loading')
					        setTimeout(function () {
					            btn.button('reset')
					        }, 1000)
						});
</script>
