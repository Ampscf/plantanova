<div class="row">
	<div class="col-xs-8 col-xs-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> Registro Nuevo Cliente </h3>
			</div>
			<?php 
				$attributes = array('id' => 'registry', 'name' => 'registry');
				echo form_open('admin/register_client',$attributes); 
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

						<div class="col-md-6">
							<h3>Empresa</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Empresa" name="farm_name" id="farm_name" value="<?php echo set_value('farm_name'); ?>" tabindex="1">
							</div><!-- End farm name -->
							<?php echo form_error('farm_name'); ?>

							<div class="clear">&nbsp</div>
							<h3>Número</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Número" name="addr_number" id="addr_number" onkeyup="this.value=add_commas(this.value);" value="<?php echo set_value('addr_number'); ?>" tabindex="3">
							</div><!-- End address number -->
							<?php echo form_error('addr_number'); ?>

							<div class="clear">&nbsp</div>
							<h3>CP</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="CP" name="cp" id="cp" value="<?php echo set_value('cp'); ?>" tabindex="5">
							</div><!-- End cp -->
							<?php echo form_error('cp'); ?>

							<div class="clear">&nbsp</div>
							<h3>Estado</h3>
							<div class="input-group input-group-lg">
								<select class="form-control" name="state" id="state" onchange="get_towns(this.value);" tabindex="7">
									<option value="-1" selected>---Selecciona un estado---</option>
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
								<input type="text" class="form-control" placeholder="Razón Social" name="social_reason" id="social_reason" value="<?php echo set_value('social_reason'); ?>" tabindex="9">
							</div><!-- End social reason -->
							<?php echo form_error('social_reason'); ?>
						</div>						

						<div class="col-md-6">
							<h3>Calle</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Calle" name="street" id="street" value="<?php echo set_value('street'); ?>" tabindex="2">
							</div><!-- End street -->
							<?php echo form_error('street'); ?>

							<div class="clear">&nbsp</div>
							<h3>Colonia</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Colonia" name="colony" id="colony" value="<?php echo set_value('colony'); ?>" tabindex="4">
							</div><!-- End colony -->
							<?php echo form_error('colony'); ?>

							<div class="clear">&nbsp</div>
							<h3>Teléfono Empresa</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Teléfono Empresa" name="company_phone" id="company_phone" value="<?php echo set_value('company_phone'); ?>" tabindex="6">
							</div><!-- End company_phone -->
							<?php echo form_error('company_phone'); ?>

							<div class="clear">&nbsp</div>
							<h3>Ciudad</h3>
							<div class="input-group input-group-lg">
								<select class="form-control" name="town" id="town" tabindex="8">
									<option selected value="-1">---Selecciona una ciudad---</option>
									<?php 
										foreach($towns as $key)
										{
											echo "<option value='" . $key->id_town . "' set_select('town','".$key->id_town."') >" . $key->town_name . "</option>";
										}
									?>
								</select>
							</div><!-- End town -->

							<div class="clear">&nbsp</div>
							<h3>RFC</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="RFC" name="rfc" id="rfc" value="<?php echo set_value('rfc'); ?>" tabindex="10">
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
						<div class="col-md-6">
							<h3>Nombre(s)</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Nombre(s)" name="first_name" id="first_name" value="<?php echo set_value('first_name'); ?>" tabindex="11">
							</div><!-- End first name -->
							<?php echo form_error('first_name'); ?>

							<div class="clear">&nbsp</div>
							<h3>Apellido(s)</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Apellido(s)" name="last_name" id="last_name" value="<?php echo set_value('last_name'); ?>" tabindex="13">
							</div><!-- End last name -->
							<?php echo form_error('last_name'); ?>

							
							<div class="clear">&nbsp</div>
							<h3>Teléfono</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Teléfono" name="phone" id="phone" value="<?php echo set_value('phone'); ?>" tabindex="15">
							</div><!-- End phone -->
							<?php echo form_error('phone'); ?>

							<div class="clear">&nbsp</div>
							<h3>Celular</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Celular" name="cellphone" id="cellphone" value="<?php echo set_value('cellphone'); ?>" tabindex="17">
							</div><!-- End cellphone -->
							<?php echo form_error('cellphone'); ?>

							
							<?php echo form_error('email'); ?>	

						</div>

						<div class="col-md-6">
							<h3>Correo Electrónico</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Correo Electrónico" name="email" id="email" value="<?php echo set_value('email'); ?>" tabindex="12">
							</div><!-- End email -->							

							<div class="clear">&nbsp</div>
							<h3>Contraseña</h3>
							<div class="input-group input-group-lg">
								<input type="password" class="form-control" placeholder="Contraseña" name="password" id="password" value="<?php echo set_value('password'); ?>" tabindex="14">
							</div>
							

							<div class="clear">&nbsp</div>
							<h3>Repetir Contraseña</h3>
							<div class="input-group input-group-lg">
								<input type="password" class="form-control" placeholder="Contraseña" name="password_again" id="password_again" value="<?php echo set_value('password'); ?>"tabindex="16">
							</div>
						</div>
											
					</div>

				</div><!-- End panel-body -->
				
			
			
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
							<input class="btn btn-success btn-block" type="submit" id="button" value="Crear cuenta" /><!--onClick="register_client()"-->
						</div>
					</div><!-- End row -->
				</div><!-- End panel-footer -->	
				</form><!-- End form -->		
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

				$("#registry").validate({
							rules: {
								state: {
						            state: true
						        },
						        town:{
						       		town: true
						       },
						       cp: {
									required: true,
									number: true, 
									maxlength: 5,
									minlength: 5
								},
						       company_phone: {
									required: true,
									number: true
								},
						       phone: {
									required: true

								},
						       
								farm_name: {
									required: true,
								},
								addr_number: {
									required: true,
								},
								social_reason: {
									required: true,
								},
								street: {
									required: true,
								},
								colony: {
									required: true,
								},
								rfc: {
									required: true,
								},
								first_name: {
									required: true,
								},
								last_name: {
									required: true,
								},
								email: {
									required: true,
									email:true,
									remote:{url:"<?php echo base_url('index.php/admin/register_email_exists'); ?>", 
											type:"post", 
											data:$("email").val()
									}
								},
								password: {
									required:true
								},
							    password_again: {
							      equalTo: "#password"
							    }
							},
							messages: {
                        		cp: {
									required: "El Campo CP es Requerido",
									number: "El Campo CP debe ser Numerico",
									maxlength: "El Campo CP debe tener 5 caracteres",
									minlength: "El Campo CP debe tener 5 caracteres"
								},
						       company_phone: {
									required: "El Campo Teléfono Empresa es Requerido",
									number: "El Campo Teléfono Empresa debe ser Numerico"
								},
						       phone: {
									required: "El Teléfono es Requerido"
									
								},
						       cellphone: {
									 number: "El Campo Celular debe ser Numerico"
								},
								farm_name: {
									required: "El Campo Empresa es Requerido"
								},
								addr_number: {
									required: "El Campo Número es Requerido",
								},
								social_reason: {
									required: "El Campo Razón Social es Requerido"
								},
								street: {
									required: "El Campo Calle es Requerido"
								},
								colony: {
									required: "El Campo Colonia es Requerido"
								},
								rfc: {
									required: "El Campo RFC es Requerido"
								},
								first_name: {
									required: "El Campo Nombre es Requerido"
								},
								last_name: {
									required: "El Campo Apellido es Requerido"
								},
								email: {
									required: "El Campo Correo Electrónico es Requerido",
									email: "Ingresa un Correo Valido",
									remote: 'Este Correo Electrónico Ya Existe.'
								},
								password: {
									required:"El Campo Contraseña es Requerido"
								},
							    password_again: {
							      equalTo: "Las Contraseñas Deben Ser Iguales"
							    }
						  	}
						});

						$.validator.addMethod("state", state, "Selecciona un Estado");
						$.validator.addMethod("town", town, "Selecciona una Ciudad");

						function state(){
							if (document.getElementById('state').value < 0){
								return false;
							}else return true;
						}

						function town(){
							if (document.getElementById('town').value < 0){
								return false;
							}else return true;
						}

						
			</script>
