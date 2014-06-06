	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					
					<div class="">
					<ul class="nav nav-pills">
						<li id="nuevo" class="active"><a href="#">Nuevos</a></li>
						<li id="proceso"><a href="#">En proceso</a></li>
						<li id="embarcado"><a href="#">Embarcados</a></li>
					</ul>
					</div>
					
					<div class="panel-body">
						<div class="table-responsive" id="area">
							<?php include_once('application/views/extra/tabla_pedido_nuevo.php'); ?>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- End row -->
	</div> <!-- End container -->
</div> <!-- End content div -->