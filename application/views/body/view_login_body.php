<div class="container">
	<div class="row">
		<div class="col-xs-4 col-xs-offset-4" style="min-width: 200px;">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"> Inicio de sesión </h3>
				</div>
				<?php echo form_open('principal/log_in'); ?>
				
					<div class="panel-body" style="padding: 10px 10px 10px 10px;">

						<div class="text-center">
							<?php echo form_error('password'); ?>
						</div>

						<div class="input-group input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
							</div>
							<input type="text" class="form-control inicio" placeholder="E-mail" name="email" id="email" value="<?php echo set_value('email'); ?>">
						</div><!-- End mail -->

						<div class="clear">&nbsp</div>

						<div class="input-group input-group">
							<div class="input-group-addon" style="width: 39px;">
								<i class="fa fa-lock"></i>
							</div>
							<input type="password" class="form-control inicio" placeholder="Contraseña" name="password" id="password">
						</div><!-- End password -->

					</div><!-- End panel-body -->

					<div class="panel-footer">
						<div class="row">
							<div class="col-xs-12" style="min-width: 100px;">
								<input class="btn btn-success btn-block" type="submit" value="Acceder"/>
							</div>
						</div><!-- End row -->
					</div><!-- End panel-footer -->
				</form><!-- End form -->
			</div><!-- End panel-default -->
		</div><!-- End col-xs-4 col-xs-offset-4 -->
	</div><!-- End row -->
</div>