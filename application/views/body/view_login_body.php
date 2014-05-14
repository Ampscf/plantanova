<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"> Inicio de sesión </h3>
				</div>
				<?php echo form_open('principal/log_in'); ?>
				
					<div class="panel-body" style="padding: 10px 10px 10px 10px;">

						<div class="text-center">
							<?php echo form_error('password'); ?>
						</div>

						<div class="input-group input-group-lg">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
							</div>
							<input type="text" class="form-control" placeholder="E-mail" name="email" id="email" value="<?php echo set_value('email'); ?>">
						</div><!-- End mail -->

						<div class="clear">&nbsp</div>

						<div class="input-group input-group-lg">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-eye-close"></span>
							</div>
							<input type="password" class="form-control" placeholder="Contraseña" name="password" id="password">
						</div><!-- End password -->

					</div><!-- End panel-body -->

					<div class="panel-footer">
						<div class="row">
							<div class="col-md-4 col-md-offset-4">
								<input class="btn btn-success btn-block" type="submit" value="Acceder"/>
							</div>
						</div><!-- End row -->
					</div><!-- End panel-footer -->
				</form><!-- End form -->
			</div><!-- End panel-default -->
		</div><!-- End col-md-4 col-md-offset-4 -->
	</div><!-- End row -->
</div>