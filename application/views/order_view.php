<div class="page-container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"> Pedido </h3>
				</div>
	
				<?php echo form_open('Login_controller/home'); ?>
					<div class="panel-body" style="padding: 10px 10px 10px 10px;">
						
						<label>Planta</label>
						<select class="form-control">
							<option selected>Planta</option>
							<?php foreach ($plants as $key) {
								echo "<option>".$key->plant_name."</option>";
							}?>
						</select>
						
						<div class="clear"></div>

						<label>Variedad</label>
						<div class="input-group-lg">
							<input type="text" class="form-control" placeholder="Variedad" name="variedad" id="variedad">
						</div>
						
						<div class="clear"></div>

						<label>Porta Injerto</label>
						<div class="input-group-lg">						
							<input type="text" class="form-control" placeholder="Porta Injerto" name="portainjerto" id="portainjerto">
						</div>
						
						<div class="clear"></div>
						
						<label>Brazos</label>
						<select class="form-control">
							<option selected>Brazos</option>
							<option>1</option>
							<option>2</option>
						</select>
						
						<div class="clear"></div>

						<label>Volumen</label>
						<div class="input-group-lg">	
							<input type="text" class="form-control" placeholder="Volumen" name="volumen" id="volumen">
						</div>
						
						<div class="clear"></div>	
				
						<label>Fecha</label>
					    <div class="input-group input-group-lg">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-time"></span>
							</div>
							<input type="text" class="form-control" name="fecha" id="datepicker">
						</div>
						
						<div class="clear"></div>

						<label>Sustrato</label>
						<select class="form-control">
							<option selected>Sustrato</option>
							<?php foreach ($sustratum as $key) {
								echo "<option>".$key->sustrato_name."</option>";
							}?>
						</select>
						
						<div class="clear"></div>

						<label>Subtipo</label>
						<div class="input-group-lg">
							<input type="text" class="form-control" placeholder="Subtipo" name="variedad" id="variedad">
						</div>
						
						<div class="clear"></div>

						<div>
							<label>Comentarios</label>
							<textarea class="form-control" rows="4"></textarea> 
						</div>
						
					</div>

					<div class="panel-footer">
						<div class="row">
							<div class="col-md-3">
								<input class="btn btn-default btn-block" type="submit" value="Aceptar"/>
							</div>
							<div class="col-md-3 col-md-offset-6">
								<input class="btn btn-default btn-block" type="button" value="Cancelar"/>
							</div>
						</div>
					</div>
				</form>
				
			</div>
			<!-- End panel-default -->
		</div>
		<!-- End col-md-4 col-md-offset-4 -->
	</div>
	<!-- End row -->
</div>
<!-- End page-container -->








