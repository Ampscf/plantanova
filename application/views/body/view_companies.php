	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> Clientes</h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<?php echo anchor('admin/register_client_form','Agregar Nuevo', 'class="btn btn-success"'); ?>
							<?php include_once('application/views/extra/tabla_empresa.php'); ?>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- End row -->
	</div> <!-- End container -->
</div> <!-- End content div -->