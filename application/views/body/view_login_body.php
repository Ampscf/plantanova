<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<?php echo form_open('principal/login'); ?>	 
				<div class="panel-heading">
					<h1 class="panel-title">Iniciar sesión</h1>
				</div><!-- End panel heading -->
				<div class="panel-body">
					<?php echo form_error('email'); ?>
					<div class="input-group input-group-lg">
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-user"></span>
						</div>
							<input type="text" class="form-control" placeholder="Correo electrónico	" name="email" id="email" value="<?php echo set_value('email'); ?>">
					</div><!-- End mail -->
					<div class="clear"></div>
					<?php echo form_error('password'); ?>
					<div class="input-group input-group-lg">
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-eye-close"></span>
						</div>
							<input type="password" class="form-control" placeholder="Contraseña" name="password" id="password">
					</div><!-- End password -->
				</div><!-- End panel body -->
				<div class="panel-footer clearfix">
					<div class="pull-right">
						<input type="submit"  class="btn btn-success" value="Entrar" />
					</div>
				</div><!-- End panel footer -->
			</form>
		</div>
	</div>
</div><!-- End row -->