<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> Edicion Orden de Semilla </h3>
			</div>
			<?php 
				$attributes = array('id' => 'update_seeds');
				echo form_open('seeds/update_seeds/'.$this->uri->segment(3),$attributes); 
			?>
				<div class="panel-body" style="padding: 10px 10px 10px 10px;">

					<!-- farm name, street, addr number, colony, cp, state, city, phone, social reason, rfc -->
					<div class="col-md-12">

						<div class="clear">&nbsp</div>

						<div class="col-md-12">
							<h3><span class="glyphicon glyphicon-list-alt"></span> Edicion Orden de Semilla</h3>
						</div>

						<div class="clear">&nbsp</div>

						<div class="col-md-6">
							<h3># Orden</h3>
							<div class="input-group input-group-lg">
								<?php $type_s=$this->model_seeds->get_seed_id($this->uri->segment(3)); ?>
								<select class="form-control" name="id_order" id="id_order" onchange="get_order(this.value);">
									<option value="<?php echo $type_s->result()[0]->id_order; ?>" selected><?php echo "Orden ". $type_s->result()[0]->id_order; ?></option>
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

							<h3>Nombre</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Nombre" name="seed_name" id="seed_name" value="<?php echo set_value('seed_name'); ?>">
							</div><!-- End address number -->
							<?php echo form_error('seed_name'); ?>

							<div class="clear">&nbsp</div>
							<h3>Lote</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Lote" name="batch" id="batch" value="<?php echo set_value('batch'); ?>">
							</div><!-- End street -->
							<?php echo form_error('batch'); ?>
						</div>						

						<div class="col-md-6">
							<h3>Cantidad</h3>
							<div class="input-group input-group-lg">
								<input type="text" class="form-control" placeholder="Cantidad" name="volume" id="volume" value="<?php echo set_value('volume'); ?>">
							</div><!-- End cp -->
							<?php echo form_error('volume'); ?>

							<div class="clear">&nbsp</div>
							<h3>Variedad / Portainjerto</h3>
							<div class="input-group input-group-lg">
								<select class="form-control" name="type" id="type">
									<?php $type_s=$this->model_seeds->get_seed_id($this->uri->segment(3));
									if($type_s->result()[0]->type=="Variedad"){
									?>
									<option selected>Variedad</option>
									<option >Portainjerto</option>
									<?php }else{ ?>
									<option selected>Portainjerto</option>
									<option >Variedad</option>
									<?php } ?>
									
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
							<input class="btn btn-success btn-block" type="submit" value="Editar" onClick="updateseeds();">
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
