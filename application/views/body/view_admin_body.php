	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					
					<div class="order-navs">
						<ul class="nav nav-pills">
							<li class="active"><?php echo anchor('breakdown/index', 'Nuevos') ?></li>
							<li><?php echo anchor('breakdown/pedido_proceso', 'En proceso') ?></li>
							<li><?php echo anchor('breakdown/pedido_embarcado', 'Embarcados') ?></li>
							<li><?php echo anchor('', 'Finalizados') ?></li>
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