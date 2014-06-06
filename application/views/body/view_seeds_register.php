<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> Registro de Semillas </h3>
			</div>
			<?php 
				$attributes = array('id' => 'register_seeds');
				echo form_open('seeds/register_seeds',$attributes); 
			?>
				<div class="panel-body" style="padding: 10px 10px 10px 10px;">

					<!-- farm name, street, addr number, colony, cp, state, city, phone, social reason, rfc -->
					<div class="col-md-12">

						<div class="clear">&nbsp</div>

						<div class="col-md-12">
							<h3><span class="glyphicon glyphicon-list-alt"></span> Recepcion de Semilla</h3>
						</div>

						<div class="clear">&nbsp</div>

						<div class="col-md-6">
							<div class="input-group input-group-lg">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-globe"></span>
								</div>
								<select class="form-control" name="id_order" id="id_order" onchange="get_order(this.value);">
									<option value="-1" selected>---Selecciona una Orden---</option>
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

							
							<div class="input-group input-group-lg">
								<div class="input-group-addon">
									<i class="fa fa-home"></i>
								</div>
								<input type="text" class="form-control" placeholder="Nombre" name="seed_name" id="seed_name" value="<?php echo set_value('seed_name'); ?>">
							</div><!-- End address number -->
							<?php echo form_error('seed_name'); ?>

							<div class="clear">&nbsp</div>

							<div class="input-group input-group-lg">
								<div class="input-group-addon">
									<i class="fa fa-home"></i>
								</div>
								<input type="text" class="form-control" placeholder="Lote" name="batch" id="batch" value="<?php echo set_value('batch'); ?>">
							</div><!-- End street -->
							<?php echo form_error('batch'); ?>
						</div>						

						<div class="col-md-6">
							<div class="input-group input-group-lg">
								<div class="input-group-addon">
									<i class="fa fa-envelope"></i>
								</div>
								<input type="text" class="form-control" placeholder="Cantidad" name="volume" id="volume" value="<?php echo set_value('volume'); ?>">
							</div><!-- End cp -->
							<?php echo form_error('volume'); ?>

							<div class="clear">&nbsp</div>

							<div class="input-group input-group-lg">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-picture"></span>
								</div>
								<select class="form-control" name="type" id="type">
									<option selected>Variedad</option>
									<option >Protainjerto</option>
									
								</select>
							</div><!-- End town -->
							
							<?php echo form_error('type'); ?>

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
								echo anchor('admin/list_clients', 'Cancelar', $data);
							?>
						</div>
					</div><!-- End row -->
				</div><!-- End panel-footer -->
			
		</div><!-- End panel-default -->
	</div><!-- End col-md-4 col-md-offset-4 -->
</div><!-- End row -->