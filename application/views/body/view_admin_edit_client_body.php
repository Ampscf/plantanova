<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> Edicion de Cliente </h3>
			</div>
			<?php 
				

				//llenado de datos de la base de datos para llenar el value de los inputs
				
				$id_user=$client->result()[0]->id_user;
				$farm_name = $client->result()[0]->farm_name;
				$addr_number = $client->result()[0]->address_number;
				$cp = $client->result()[0]->cp;
				$social_reason = $client->result()[0]->social_reason;
				$street = $client->result()[0]->street;
				$colony = $client->result()[0]->colony;
				$company_phone = $client->result()[0]->company_phone;
				$rfc = $client->result()[0]->rfc;
				$first_name = $client->result()[0]->first_name;
				$phone = $client->result()[0]->phone;
				$email = $client->result()[0]->mail;
				$last_name = $client->result()[0]->last_name;
				$cellphone = $client->result()[0]->cellphone;
				$id_town = $client->result()[0]->id_town;
				
				//jalar de la base de datos town
				$town=$this->model_order->get_town_id($id_town);
				$town_name=$town->result()[0]->town_name;
				$id_town=$town->result()[0]->id_town;
				$id_state=$town->result()[0]->id_state;
				
				//jalar de la base de datos state
				$state=$this->model_order->get_state_id($id_state);
				$state_name=$state->result()[0]->state_name;
				$id_state=$state->result()[0]->id_state;

				//obtiene solo las ciudades del estado selecionado en un principio
				$towns_id=$this->model_order->get_towns_id($id_state);
				

				$attributes = array('id' => 'update','name'=>'update');
				echo form_open('admin/update_client/'.$id_user,$attributes); 

			?>
				<div class="panel-body" style="padding: 10px 10px 10px 10px;">

					<!-- farm name, street, addr number, colony, cp, state, city, phone, social reason, rfc -->
					<div class="col-md-12">

						<div class="clear">&nbsp</div>

						<div class="col-md-12">
							<h3><span class="glyphicon glyphicon-list-alt"></span> Datos Empresa</h3>
						</div>

						<div class="clear">&nbsp</div>

						<div class="col-md-6">
							<h3>Empresa</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Empresa" name="farm_name" id="farm_name" value="<?php echo $farm_name; ?>" tabindex="1">
							</div><!-- End farm name -->
							<?php echo form_error('farm_name'); ?>

							<div class="clear">&nbsp</div>
							<h3>Número</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Número" name="addr_number" id="addr_number" onkeyup="this.value=add_commas(this.value);" value="<?php echo $addr_number; ?>" tabindex="3">
							</div><!-- End address number -->
							<?php echo form_error('addr_number'); ?>

							<div class="clear">&nbsp</div>
							<h3>CP</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="CP" name="cp" id="cp" value="<?php echo $cp; ?>" tabindex="5">
							</div><!-- End cp -->
							<?php echo form_error('cp'); ?>

							<div class="clear">&nbsp</div>
							<h3>Estado</h3>
							<div class="input-group input-group-lg">
								<select class="form-control" name="state" id="state" onchange="get_towns(this.value);" tabindex="7">
									<option value="<?php echo $id_state;?>" selected><?php echo $state_name; ?></option>
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
								<input type="text" class="form-control" placeholder="Razón Social" name="social_reason" id="social_reason" value="<?php echo $social_reason; ?>" tabindex="9">
							</div><!-- End social reason -->
							<?php echo form_error('social_reason'); ?>
						</div>						

						<div class="col-md-6">
							<h3>Calle</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Calle" name="street" id="street" value="<?php echo $street; ?>" tabindex="2">
							</div><!-- End street -->
							<?php echo form_error('street'); ?>

							<div class="clear">&nbsp</div>
							<h3>Colonia</h3>				
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Colonia" name="colony" id="colony" value="<?php echo $colony; ?>" tabindex="4">
							</div><!-- End colony -->
							<?php echo form_error('colony'); ?>

							<div class="clear">&nbsp</div>
							<h3>Teléfono Empresa</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Teléfono Empresa" name="company_phone" id="company_phone" value="<?php echo $company_phone; ?>" tabindex="6">
							</div><!-- End company_phone -->
							<?php echo form_error('company_phone'); ?>

							<div class="clear">&nbsp</div>
							<h3>Ciudad</h3>
							<div class="input-group input-group-lg">
								<select class="form-control" name="town" id="town" tabindex="8">
									<option value="<?php echo $id_town?>" selected><?php echo $town_name;?></option>
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
								<input type="text" class="form-control" placeholder="RFC" name="rfc" id="rfc" value="<?php echo $rfc; ?>" tabindex="10">
							</div><!-- End rfc -->
							<?php echo form_error('rfc'); ?>
						</div>					

					</div>
				

					<!-- Company representant:  Name, last name, phone, cellphone, email -->
					<div class="col-md-12">

						<div class="clear">&nbsp</div>
						<div class="col-md-12">
							<h3><span class="glyphicon glyphicon-user"></span> Representante de la empresa</h3>
						</div>

						<div class="clear">&nbsp</div>

						<div class="col-md-6">
							<div class="input-group input-group-lg">
								<h3>Nombre(s)</h3>
								<input type="text" class="form-control" placeholder="Nombre(s)" name="first_name" id="first_name" value="<?php echo $first_name; ?>" tabindex="11">
							</div><!-- End first name -->
							<?php echo form_error('first_name'); ?>

							<div class="clear">&nbsp</div>

							<div class="input-group input-group-lg">
								<h3>Teléfono</h3>
								<input type="text" class="form-control" placeholder="Teléfono" name="phone" id="phone" value="<?php echo $phone; ?>" tabindex="13">
							</div><!-- End phone -->
							<?php echo form_error('phone'); ?>

							<div class="clear">&nbsp</div>
							<h3>Correo Electrónico</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Correo Electrónico" name="email" id="email" value="<?php echo $email; ?>" tabindex="15">
							</div><!-- End email -->
							<?php echo form_error('email'); ?>	

						</div>

						<div class="col-md-6">
							<h3>Apellido(s)</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Apellido(s)" name="last_name" id="last_name" value="<?php echo $last_name; ?>" tabindex="12">
							</div><!-- End last name -->
							<?php echo form_error('last_name'); ?>

							<div class="clear">&nbsp</div>
							<h3>Celular</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Celular" name="cellphone" id="cellphone" value="<?php echo $cellphone; ?>" tabindex="14">
							</div><!-- End cellphone -->
							<?php echo form_error('cellphone'); ?>
							<div class="clear">&nbsp</div>
							<div class="input-group input-group-lg" >
								<a href="#myModal" class="btn btn-pas" data-toggle="modal" style="width: 100%;" tabindex="16">Cambiar Contraseña</a>
							</div>
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

			<!-- End form -->

			
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-3 col-md-offset-1">
							<?php  
								$data = array(
									'class'	=> 'btn btn-primary btn-block',
									'name' => 'Cancelar',
								);
								echo anchor('admin/list_clients', 'Cancelar', $data);
							?>
						</div>
						<div class="col-md-3 col-md-offset-4">
							<input class="btn btn-success btn-block" type="submit" value="Editar Cuenta" onClick="update_client();"/>
						</div>
					</div><!-- End row -->
				</div><!-- End panel-footer -->
			</form>
		</div><!-- End panel-default -->
	</div><!-- End col-md-4 col-md-offset-4 -->
</div><!-- End row -->
		<script>
			$("#update").validate({
					rules: {
						farm_name:{
							required:true
						},
						addr_number:{
							required:true
							
						},
						cp:{
							required:true,
							number:true,
							maxlength: 5,
							minlength:5
						},
						state:{
							min:0,
							required:true
						},
						social_reason:{
							required:true
						},
						street:{
							required:true
						},
						colony:{
							required:true
						},
						company_phone:{
							required:true,
							number:true
						},
						town:{
							required:true,
							min:0
						},
						rfc:{
							required:true
						},
						first_name:{
							required:true
						},
						phone:{
							required:true
						},
						email:{
							required:true,
							email:true
						},
						last_name:{
							required:true
						}					    
					},
					messages: {
						farm_name:{
							required:"El campo Empresa es requerido"
						},
						addr_number:{
							required:"El campo Número es requerido",
							number:"El campo Número debe ser numerico"
						},
						cp:{
							required:"El campo CP es requerido",
							maxlength: "El campo CP debe tener 5 digitos",
							minlength:"El campo CP debe tener 5 digitos",
							number:"El campo CP debe ser numerico"
						},
						state:{
							min:"Selecciona un Estado",
							required:"Selecciona un estado"
						},
						social_reason:{
							required:"El campo Razón Social es requerido"
						},
						street:{
							required:"El campo Calle es requerido"
						},
						colony:{
							required:"El campo Colonia es requerido"
						},
						company_phone:{
							required:"El campo Telefono Empresa es requerido",
							number:"El campo Telefono Empresa debe se numerico"
						},
						town:{
							required:"Selecciona una Ciudad",
							min:"Selecciona una Ciudad"
						},
						rfc:{
							required:"El campo RFC es requerido"
						},
						first_name:{
							required:"El campo Nombre es requerido"
						},
						phone:{
							required:"El campo Telefono es requerido",
							number:"El campo Telefono debe ser numerico"
						},
						email:{
							required:"El campo Correo Electronico es requerido",
							email:"Ingresa un Correo Electronico valido"
						},
						last_name:{
							required:"El campo Apellido es requerido"
						},
						cellphone:{
							required:"El campo Celular es requerido",
							number:"El campo Celular deba ser numerico"
						}				
				  	}
				});

			</script>

				<?php 
				$att = array('id' => 'change_pass','name'=>'change_pass');
				echo form_open('admin/change_pass/'.$this->uri->segment(3),$att)?>
					<div id="myModal" class="modal fade">
		        		<div class="modal-dialog">
		            		<div class="modal-content">
		                		<div class="modal-header">
		                			<h4 class="modal-title">Cambiar Password </h4>	  
		                		</div>
		                		<div class="modal-body">
		                			<div class="input-group">
		                				<p>Contraseña Administrador</p>
										<input type="password" class="form-control" placeholder="Contraseña Administrador" name="password1" id="password1" value="">	
									</div>
		                			<div class="clear">&nbsp</div>
			                		<div class="input-group">
			                			<p>Nueva Contraseña</p>
										<input type="password" class="form-control" placeholder="Nueva Contraseña" name="password2" id="password2" value="">     		
			                		</div>
			                		<div class="clear">&nbsp</div>
			                		<div class="input-group">
			                			<p>Repetir Nueva Contraseña</p>
										<input type="password" class="form-control" placeholder="Repetir Nueva Contraseña" name="password3" id="password3" value="">     		
			                		</div>
		                		</div>
		                		<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                    			<button type="submit" class="btn btn-success" id="button" name="" onclick="update_pass()">Confirmar</button>
		                		</div>
		            		</div>
		        		</div>
		    		</div>
	    		</form>
	    		<script>

	    		$('#button').click(function() {
					    	var btn = $(this)
					        btn.button('loading')
					        setTimeout(function () {
					            btn.button('reset')
					        }, 1000)
						});

	    		$("#change_pass").validate({
					rules: {
						password1:{
							required:true
						},
						password2:{
							required:true,
							password2:true
						},
						password3: {
							required:true,
							equalTo:"#password2"
						}							    
					},
					messages: {
						password1:{
							required:"La Contraseña es Requerida"
						},
						password2:{
							required:"La Nueva Contraseña es Requerida"
						},
                		password3:{
                			required:"La Nueva Contraseña es Requerida",
		                	equalTo:"Las Contraseñas no son iguales"
		                }
				  	}
				});

				$.validator.addMethod("password2", password2, "Las contraseñas deban ser diferentes");

						function password2(){
							if (document.getElementById('password1').value == document.getElementById('password2').value){
								return false;
							}else return true;
						}

				
	    		</script>