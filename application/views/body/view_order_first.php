<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div id="result">				
				<div class="panel-header">
					<ul class="nav nav-tabs">
						<li><a>Cliente</a></li>
						<li class="active"><a>Orden</a></li>
						<li><a>Desglose</a></li>
						<li><a>Resumen</a></li>
						<li style="position: relative; left:50%;"><a>Cliente: <?php echo $company->farm_name; ?></a></li>
					</ul>
				</div>
					<div class="panel-body" style="padding: 10px 10px 10px 10px;">
						<?php 
						$attributes = array('id' => 'update','name' => 'update');
						echo form_open('order/pending_order_first_next_before',$attributes);
						?>

						<!-- farm name, street, addr number, colony, cp, state, city, phone, social reason, rfc -->
						<div class="col-md-12">
							<div class="clear">&nbsp</div>
							<div class="col-md-12">
								<h3><span class="glyphicon glyphicon-list-alt"></span> Nuevo Pedido</h3>
							</div>

							<input type="hidden" value="<?php echo $id_company;?>" id="id_company" name="id_company">
							
							<div class="clear">&nbsp</div>
							<div class="col-md-6">
							
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">									

									<p>Tipo de Cultivo</p>
									<select class="form-control" name="plant" id="plant">
										<option value="-1" selected>---Selecciona un cultivo---</option>
										<?php 
										foreach($plants as $key)
										{
											echo "<option value='" . $key->id_plant . "' set_select('state','".$key->id_plant."')>" . $key->plant_name . "</option>";
										}
										?>
									</select>
								</div><!-- End Plant -->
								<?php echo form_error('plant'); ?>							
							
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<p>Fecha de entrega</p>
									<p><input type="text" class="form-control" placeholder="--Selecciona una Fecha--" id="datepicker" name="datepicker" readonly></p>
								</div><!-- End Date -->
								<?php echo form_error('datepicker'); ?>
								
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<p>Brazos</p>
									<select class="form-control" name="arms" id="arms">
										<option value="2" selected>2</option>
										<option value="1">1</option>
									</select>	
								</div><!-- End Arms -->	
								<?php echo form_error('arms'); ?>							
							
							</div>						

							<div class="col-md-6">
							
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<p>Categoría</p>
									<select class="form-control" name="category" id="category">
										<option value="-1" selected>---Selecciona una categoría---</option>
										<?php 
										foreach($categories as $key)
										{
											echo "<option value='" . $key->id_category . "' set_select('state','".$key->id_category."')>" . $key->category_name . "</option>";
										}
										?>								
									</select>
								</div><!-- End Category -->
								<?php echo form_error('category'); ?>
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<p>Volumen</p>
									<input type="text" class="form-control" placeholder="Volumen" name="volume" id="volume" value="">
								</div><!-- End Volume -->
								<?php echo form_error('volume'); ?>
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<p>Tutoreo</p>
										<select class="form-control" name="tutoring" id="tutoring">
											<option value="No" selected>No</option>
											<option value="Si" >Si</option>
										</select>
								</div><!-- End Tutoring -->
							<?php echo form_error('tutoring'); ?>
							</div>
						
							<div class="col-md-12">
								<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<p>Comentarios</p>
									<textarea class="form-control" rows="4" style="height: auto;" id="comment" name="comment"></textarea>								
								</div><!-- End Comments -->
							</div>					

						</div>
				
					</div><!-- End panel-body -->

					<div class="panel-footer">						
						<ul class="pager">
							<input type="submit" value="&larr; Anterior" class="btn btn-default" style="float: left;" id="before" name="before"/>
					        <input type="submit" value="Siguiente &rarr;" class="btn btn-default" style="float: right;" id="next" name="next" />
						</ul>	
					</div><!-- End panel-footer -->
					<?php echo form_close();?>
				</div><!-- @end .result -->
			</div>
      	</div><!-- @end .span12 -->
	</div><!-- @end .row -->
</div><!-- @end .container -->