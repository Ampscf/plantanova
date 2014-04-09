<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"> Registro </h3>
			</div>
			<?php echo form_open('registro'); ?>
				<div class="panel-body" style="padding: 10px 10px 10px 10px;">

					<!-- first, last name mail password rfc phone cellphone -->
					<div class="col-md-6">
						<input type="hidden" name="rol" id="rol" value="2" />
						<div class="input-group input-group-lg">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
							</div>
							<input type="text" class="form-control" placeholder="Nombre(s)" name="first_name" id="first_name" value="<?php echo set_value('first_name'); ?>">
						</div><!-- End first name -->

						<div class="clear"></div>

						<div class="input-group input-group-lg">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
							</div>
							<input type="text" class="form-control" placeholder="Apellido(s)" name="last_name" id="last_name" value="<?php echo set_value('first_name'); ?>">
						</div><!-- End last name -->

						<div class="clear"></div>

						<div class="input-group input-group-lg">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-envelope"></span>
							</div>
							<input type="text" class="form-control" placeholder="Correo electrónico" name="email" id="email" value="<?php echo set_value('email'); ?>">
						</div><!-- End email -->

						<div class="clear"></div>

						<div class="input-group input-group-lg">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-eye-close"></span>
							</div>
							<input type="password" class="form-control" placeholder="Contraseña" name="password" id="password">
						</div><!-- End password -->

						<div class="clear"></div>

						<div class="input-group input-group-lg">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-tint"></span>
							</div>
							<input type="text" class="form-control" placeholder="RFC" name="rfc" id="rfc" value="<?php echo set_value('rfc'); ?>">
						</div><!-- End rfc -->

						<div class="clear"></div>

						<div class="input-group input-group-lg">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-phone-alt"></span>
							</div>
							<input type="text" class="form-control" placeholder="Teléfono" name="phone" id="phone" value="<?php echo set_value('phone'); ?>">
						</div><!-- End phone -->

						<div class="clear"></div>

						<div class="input-group input-group-lg">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-phone"></span>
							</div>
							<input type="text" class="form-control" placeholder="Celular" name="cellphone" id="cellphone" value="<?php echo set_value('cellphone'); ?>">
						</div><!-- End cellphone -->
					</div>

					<!-- farm name street addr number colony cp town state -->
					<div class="col-md-6">
						<div class="input-group input-group-lg">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-tree-deciduous"></span>
							</div>
							<input type="text" class="form-control" placeholder="Agrícola" name="farm_name" id="farm_name" value="<?php echo set_value('farm_name'); ?>">
						</div><!-- End farm name -->

						<div class="clear"></div>

						<div class="input-group input-group-lg">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-road"></span>
							</div>
							<input type="text" class="form-control" placeholder="Calle" name="street" id="street" value="<?php echo set_value('street'); ?>">
						</div><!-- End street -->

						<div class="clear"></div>

						<div class="input-group input-group-lg">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-home"></span>
							</div>
							<input type="text" class="form-control" placeholder="Número" name="addr_number" id="addr_number" value="<?php echo set_value('addr_number'); ?>">
						</div><!-- End address number -->

						<div class="clear"></div>

						<div class="input-group input-group-lg">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-home"></span>
							</div>
							<input type="text" class="form-control" placeholder="Colonia" name="colony" id="colony" value="<?php echo set_value('colony'); ?>">
						</div><!-- End colony -->

						<div class="clear"></div>

						<div class="input-group input-group-lg">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-barcode"></span>
							</div>
							<input type="text" class="form-control" placeholder="CP" name="cp" id="cp" value="<?php echo set_value('cp'); ?>">
						</div><!-- End cp -->

						<div class="clear"></div>

						<div class="input-group input-group-lg">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-globe"></span>
							</div>
							<select class="form-control" name="state" id="state" value="<?php echo set_value('state'); ?>" onchange="get_towns(this.value);">
								<option value="-1" selected>---Estado---</option>
								<?php 
									foreach($states as $key)
									{
										echo "<option value='" . $key->id_state . "'>" . $key->state_name . "</option>";
									}
								?>
							</select>
						</div><!-- End state -->

						<div class="clear"></div>

						<div class="input-group input-group-lg">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-picture"></span>
							</div>
							<select class="form-control" name="town" id="town" value="<?php echo set_value('town'); ?>">
								<option selected>---Ciudad---</option>
								<?php 
									foreach($towns as $key)
									{
										echo "<option value='" . $key->id_town . "'>" . $key->town_name . "</option>";
									}
								?>
							</select>
						</div><!-- End town -->
					</div>

				</div><!-- End panel-body -->

				<div class="panel-footer">
					<div class="row">
						<div class="col-md-3 col-md-offset-1">
							<input class="btn btn-success btn-block" type="submit" value="Crear cuenta"/>
						</div>
			</form><!-- End form -->
						<div class="col-md-3 col-md-offset-4">
							<?php  
								$data = array(
									'class'	=> 'btn btn-primary btn-block',
									'name' => 'Cancelar',
								);
								echo anchor('inicio', 'Cancelar', $data);
							?>
						</div>
					</div><!-- End row -->
				</div><!-- End panel-footer -->
			
		</div><!-- End panel-default -->
	</div><!-- End col-md-4 col-md-offset-4 -->
</div><!-- End row -->
