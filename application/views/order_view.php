<div class="page-container">
	
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"> Pedido </h3>
				</div>
	
				<?php echo form_open('Login_controller/login'); ?>
					<div class="panel-body" style="padding: 10px 10px 10px 10px;">
						<select class="form-control">
							<option selected>Planta</option>
						</select>
						
						<div class="clear"></div>

						<div class="input-group input-group-lg">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
							</div>
							<input type="text" class="form-control" placeholder="Variedad" name="variedad" id="variedad">
						</div>
						
						<div class="clear"></div>

						<div class="input-group input-group-lg">
							<input type="text" class="form-control" placeholder="Porta Injerto" name="variedad" id="variedad">
						</div>
						
						<div class="clear"></div>
						
						<select class="form-control">
							<option selected>Brazos</option>
							<option>1</option>
							<option>2</option>
						</select>
						
						<div class="clear"></div>

						<div class="input-group input-group-lg">
							<input type="text" class="form-control" placeholder="Volumen" name="variedad" id="variedad">
						</div>
						
						<div class="clear"></div>

						<div class="input-group input-group-lg">
							<input type="text" class="form-control" placeholder="Fecha entrega" name="variedad" id="variedad">
						</div>
						
						<div class="clear"></div>

						<div class="input-group input-group-lg">
							<input type="text" class="form-control" placeholder="Tipo sustrato" name="variedad" id="variedad">
						</div>
						
						<div class="clear"></div>

						<div class="input-group input-group-lg">
							<input type="text" class="form-control" placeholder="Subtipo" name="variedad" id="variedad">
						</div>
						
						<div class="clear"></div>

						<div class="input-group input-group-lg">
							<input type="text" class="form-control" placeholder="Observaciones" name="variedad" id="variedad">
						</div>
						
					</div>

					<div class="panel-footer">
						<div class="row">
							<div class="col-md-3">
								<input class="btn btn-default btn-block" type="submit" value="Acceder"/>
							</div>
							<div class="col-md-3 col-md-offset-6">
								<input class="btn btn-default btn-block" type="submit" value="Cancelar"/>
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






