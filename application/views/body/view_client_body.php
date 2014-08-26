	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="col-md-8 blu">
					<div class="vlac">Reservado pa la imagen del click</div>
				</div>
				<div class="col-md-4 grin">Reservado pa los mensajes</div>
				<div class="clear">&nbsp</div>
				<div class="col-md-4 gray">Reservado pa la publicidad</div>
				<div class="clear">&nbsp</div>
				<div class="panel panel-default">
					
					<div class="order-navs">
						<ul class="nav nav-pills">
							<li class="active"><?php echo anchor('client/index', 'Nuevos') ?></li>
							<li><?php echo anchor('client/pedido_proceso', 'En proceso') ?></li>
							<li><?php echo anchor('client/finalizado', 'Finalizados') ?></li>	
							<li><?php echo anchor('client/todos', 'Todos') ?></li>
						</ul>
					</div>

					<div class="panel-body">	
						<div class="table-responsive" id="area">
							<?php include_once('application/views/extra/tabla_pedidos_cliente.php');?>
						</div>	
					</div>
						
				</div>
			</div>
		</div> <!-- End row -->
	</div> <!-- End container -->
</div> <!-- End content div -->