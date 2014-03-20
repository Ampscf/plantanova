<div class="page-container">
	<div class="row">
		<div class="logo">
			<img src="<?php echo base_url().'img/logo.png'; ?>" width="200px" height="80px">
		</div>
		<!-- End logo -->
	</div>
	<!-- End row -->
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"> Acceder </h3>
				</div>
	
				<?php echo validation_errors(); ?>
				<?php echo form_open('verify_login_controller'); ?>
					<div class="panel-body" style="padding: 10px 10px 10px 10px;">
						<div class="input-group input-group-lg">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
							</div>
							<input type="text" class="form-control" placeholder="Correo" name="correo" id="correo">
						</div>

						<div class="clear"></div>

						<div class="input-group input-group-lg">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-eye-close"></span>
							</div>
							<input type="password" class="form-control" placeholder="Contraseña" name="contraseña" id="contraseña">
						</div>
					</div>

					<div class="panel-footer">
						<div class="row">
							<div class="col-md-2">
								<button href="#" class="btn btn-link">Recuperar contraseña</button>
							</div>
							<div class="col-md-3 col-md-offset-6">
								<input class="btn btn-success btn-block" type="submit" value="Acceder"/>
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
