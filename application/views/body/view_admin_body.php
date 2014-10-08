	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1">
				<a href="<?php echo base_url().'index.php/reports/report'?>" class="btn btn-success" data-toggle="modal">Descargar Reporte</a>
			</div>
			<div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1">

				<div class="panel panel-default">

					<div class="order-navs">
						<ul class="nav nav-pills">
							<li class="active"><?php echo anchor('breakdown/index', 'Nuevos') ?></li>
							<li><?php echo anchor('breakdown/pedido_proceso', 'En proceso') ?></li>
							<li><?php echo anchor('breakdown/pedido_embarcado', 'Embarcados') ?></li>
							<li><?php echo anchor('breakdown/finalizado', 'Finalizados') ?></li>
							<li><?php echo anchor('breakdown/cancelados', 'Cancelados') ?></li>
							<li><?php echo anchor('breakdown/todos', 'Todos') ?></li>
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