	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="col-md-12">
						<div class="col-md-8">
							<img src="<?php echo base_url() . '/img/plantanovaicongrand.png'; ?>" alt="Logotipo" class="img-rounded">
						</div>
						<div class="col-md4">
							<img src="<?php echo base_url() . '/img/logo.png'; ?>" alt="Logotipo" class="img-rounded">
							mensaje:
							<?php
							if(is_array($new_order)){
								echo $new_order[0]->comment;
							}
							
							?>
						</div>
						<div class="col-md4 col-md-offset-8">
							<img src="<?php echo base_url() . '/img/logo.png'; ?>" alt="Logotipo" class="img-rounded">
						</div>
					</div>
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