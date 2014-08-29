<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> Datos de la Cuenta</b></h4>
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
							<h4><b>Empresa:</b></h4>
							<div class="input-group input-group-lg">
								<h4><?php echo $farm_name; ?></h4>
							</div><!-- End farm name -->

							<div class="clear">&nbsp</div>
							<h4><b>Número:</b></h4>
							<div class="input-group input-group-lg">
								<h4><?php echo $addr_number; ?></h4>
							</div><!-- End address number -->

							<div class="clear">&nbsp</div>
							<h4><b>CP:</b></h4>
							<div class="input-group input-group-lg">
								<h4><?php echo $cp; ?></h4>
							</div><!-- End cp -->

							<div class="clear">&nbsp</div>
							<h4><b>Estado:</b></h4>
							<div class="input-group input-group-lg">
								<h4><?php echo $state_name; ?></h4>
							</div><!-- End state -->

							<div class="clear">&nbsp</div>
							<h4><b>Razón Social:</b></h4>
							<div class="input-group input-group-lg">
								<h4><?php echo $social_reason; ?></h4>
							</div><!-- End social reason -->
						</div>						

						<div class="col-md-6">
							<h4><b>Calle:</b></h4>
							<div class="input-group input-group-lg">
								<h4><?php echo $street; ?></h4>
							</div><!-- End street -->

							<div class="clear">&nbsp</div>
							<h4><b>Colonia:</b></h4>				
							<div class="input-group input-group-lg">
								<h4><?php echo $colony; ?></h4>
							</div><!-- End colony -->

							<div class="clear">&nbsp</div>
							<h4><b>Teléfono Empresa:</b></h4>
							<div class="input-group input-group-lg">
								<h4><?php echo $company_phone; ?></h4>
							</div><!-- End company_phone -->

							<div class="clear">&nbsp</div>
							<h4><b>Ciudad:</b></h4>
							<div class="input-group input-group-lg">
								<h4><?php echo $town_name;?></h4>
							</div><!-- End town -->

							<div class="clear">&nbsp</div>
							<h4><b>RFC:</b></h4>
							<div class="input-group input-group-lg">
								<h4><?php echo $rfc; ?></h4>
							</div><!-- End rfc -->
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
								<h4><b>Nombre(s):</b></h4>
								<h4><?php echo $first_name; ?></h4>
							</div><!-- End first name -->

							<div class="clear">&nbsp</div>

							<div class="input-group input-group-lg">
								<h4><b>Teléfono:</b></h4>
								<h4><?php echo $phone; ?></h4>
							</div><!-- End phone -->

							<div class="clear">&nbsp</div>
							<h4><b>Correo Electrónico:</b></h4>
							<div class="input-group input-group-lg">
								<h4><?php echo $email; ?></h4>
							</div><!-- End email -->

						</div>

						<div class="col-md-6">
							<h4><b>Apellido(s):</b></h4>
							<div class="input-group input-group-lg">
								<h4><?php echo $last_name; ?></h4>
							</div><!-- End last name -->

							<div class="clear">&nbsp</div>
							<h4><b>Celular:</b></h4>
							<div class="input-group input-group-lg">
								<h4><?php echo $cellphone; ?></h4>
							</div><!-- End cellphone -->
							
						</div>
											
					</div>

				</div><!-- End panel-body -->

				<div class="panel-footer">
					<div class="row">
						<div class="col-md-6 col-md-offset-1">
						</div>
						<div class="col-md-3 col-md-offset-1">
							<a href="#myModal" class="btn btn-primary" data-toggle="modal">Cambiar Contraseña</a>
						</div>
					</div><!-- End row -->
				</div><!-- End panel-footer -->

				<?php 
				$attributes = array('id' => 'change_pass','name'=>'change_pass');
				echo form_open('client/change_pass',$attributes)?>
					<div id="myModal" class="modal fade">
		        		<div class="modal-dialog">
		            		<div class="modal-content">
		                		<div class="modal-header">
		                			<h4 class="modal-title">Cambiar Password </h4>	  
		                		</div>
		                		<div class="modal-body">
		                			<div class="input-group">
		                				<p>Contraseña Actual</p>
										<input type="password" class="form-control" placeholder="Contraseña Actual" name="password1" id="password1">     		
			                				
									</div>
		                			<div class="clear">&nbsp</div>
			                		<div class="input-group">
			                			<p>Nueva Contraseña</p>
										<input type="password" class="form-control" placeholder="Nueva Contraseña" name="password2" id="password2">     		
			                		</div>
			                		<div class="clear">&nbsp</div>
			                		<div class="input-group">
			                			<p>Repetir Nueva Contraseña</p>
										<input type="password" class="form-control" placeholder="Repetir Nueva Contraseña" name="password3" id="password3">     		
			                		</div>
		                		</div>
		                		<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                    			<button type="submit" class="btn btn-success" name="" onclick="update_pass()">Confirmar</button>
		                		</div>
		            		</div>
		        		</div>
		    		</div>
	    		</form>
	    		<script>
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
		</div><!-- End panel-default -->
	</div><!-- End col-md-4 col-md-offset-4 -->
</div><!-- End row -->
