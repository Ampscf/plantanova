<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"> Log in </h3>
			</div>
			<?php echo form_open('Login_controller/login'); ?>
				<div class="panel-body" style="padding: 10px 10px 10px 10px;">
					<?php echo form_error('email'); ?>
					<div class="input-group input-group-lg">
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-user"></span>
						</div>
						<input type="text" class="form-control" placeholder="E-mail" name="email" id="email" value="<?php echo set_value('email'); ?>">
					</div><!-- End mail -->
					<div class="clear"></div>
					<?php echo form_error('password'); ?>
					<div class="input-group input-group-lg">
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-eye-close"></span>
						</div>
						<input type="password" class="form-control" placeholder="Password" name="password" id="password">
					</div><!-- End password -->
				</div><!-- End panel-body -->
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-2">
							<button href="#" class="btn btn-link">Recuperar contraseña</button>
						</div>
						<div class="col-md-3 col-md-offset-6">
							<input class="btn btn-success btn-block" type="submit" value="Acceder"/>
						</div>
					</div><!-- End row -->
				</div><!-- End panel-footer -->
			</form><!-- End form -->
		</div><!-- End panel-default -->
	</div><!-- End col-md-4 col-md-offset-4 -->
</div><!-- End row -->
