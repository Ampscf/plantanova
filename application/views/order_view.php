<div class="page-container">
	<?php echo form_open('pedidos/registro'); ?>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"> Pedido </h3>
					</div>

					<div class="panel-body" style="padding: 10px 10px 10px 10px;">
						<div class="container-fluid">
							<div class="col-md-6">
								<div class="input-group-lg">
									<label>Planta</label>
									<select class="form-control" id="plant_name">
										<option selected>Planta</option>
										<?php foreach ($plants as $key) {
											echo "<option value=" . $key->id_plant . ">".$key->plant_name."</option>";
										}?>
									</select>
								</div>
								
								<div class="clear"></div>

								<div class="input-group-lg">
									<label>Variedad</label>
									<input type="text" class="form-control" placeholder="Variedad" name="variedad" id="variety">
								</div>
								
								<div class="clear"></div>

								<div class="input-group-lg">	
									<label>Porta Injerto</label>					
									<input type="text" class="form-control" placeholder="Porta Injerto" name="portainjerto" id="rootstock">
								</div>
								
								<div class="clear"></div>
								
								<div class="input-group-lg">
									<label>Brazos</label>
									<select class="form-control" id="branches">
										<option selected>Brazos</option>
										<option value="1">1</option>
										<option value="2">2</option>
									</select>
								</div>
								
								<div class="clear"></div>
								
								<div class="input-group-lg">
									<label>Volumen</label>
									<input type="text" class="form-control" placeholder="Volumen" name="volume" id="volume">
								</div>
							</div>

							<div class="col-md-6">
								<label>Fecha</label>
							    <div class="input-group input-group-lg">
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-time"></span>
									</div>
									<input type="text" class="form-control" name="fecha" id="datepicker">
								</div>
								
								<div class="clear"></div>

								<div class="input-group-lg">
									<label>Sustrato</label>
									<select class="form-control" id="sustratum" onchange="get_subtype(this.value);">
										<option value="-1" selected>Sustrato</option>
										<?php foreach ($sustratum as $key) {
											echo "<option value=".$key->id_sustratum .">".$key->sustrato_name."</option>";
										}?>
									</select>
								</div>
								
								<div class="clear"></div>

								<!-- Cargar subtipos con ajax de acuerdo al sustrao seleccionado -->
								<label>Subtipo</label>
								<div class="input-group-lg">
									<select class="form-control" id="subtype">
										<option selected>Subtipo</option>
									</select>
								</div>
								
								<div class="clear"></div>

								<div>
									<label>Comentarios</label>
									<textarea class="form-control" rows="4" id="observations"></textarea> 
								</div>
							</div>
						</div>
					</div>
					<!-- End panel body -->

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
				</div>
				<!-- End panel-default -->
			</div>
			<!-- End col-md-4 col-md-offset-4 -->
		</div>
		<!-- End row -->
	</form>
</div>
<!-- End page-container -->