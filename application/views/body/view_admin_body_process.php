	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					
					<div class="order-navs">
					<ul class="nav nav-pills">
						<li><?php echo anchor('breakdown/index', 'Nuevos') ?></li>
						<li class="active"><?php echo anchor('breakdown/pedido_proceso', 'En proceso') ?></li>
						<li><?php echo anchor('breakdown/pedido_embarcado', 'Embarcados') ?></li>
					</ul>
					</div>
					
					<div class="panel-body">
						<ul class="breadcrumb">
					        <li><a href="#" class="some" rel="first">Proceso</a></li>
					        <li><a href="#" class="some" rel="second">Germinacion</a> <span class="divider"></span></li>
					        <li><a href="#" class="some" rel="third">Injerto</a> <span class="divider"></span></li>
					        <li><a href="#" class="some" rel="fourth">Plantado</a> <span class="divider"></span></li>
					        <li><a href="#" class="some" rel="fifth">Transplante</a> <span class="divider"></span></li>
					       
						</ul>
						<div id="area" >
								<?php echo "0";?>
							<?php include('application/views/extra/tabla_pedido_proceso.php'); ?>
						</div>
						<div class="first" style="display:none;">
							<?php echo "1";?>
							<?php include('application/views/extra/tabla_pedido_proceso.php'); ?>
						</div>
						<div class="second" style="display:none;">
							<?php echo "2";?>
							<?php include('application/views/extra/tabla_pedido_proceso.php'); ?>
						</div>
						<div class="third" style="display:none;">
							<?php echo "3";?>
							<?php include('application/views/extra/tabla_pedido_proceso.php'); ?>
						</div>
						<div class="fourth" style="display:none;">
							<?php echo "4";?>
							<?php include('application/views/extra/tabla_pedido_proceso.php'); ?>
						</div>
						<div class="fifth" style="display:none;">
							<?php echo "5";?>
							<?php include('application/views/extra/tabla_pedido_proceso.php'); ?>
						</div>
						<script>
						
						$(".some").click(function() {  
						  $("#area").html($("." + $(this).attr('rel')).html());
						});
						</script>
					</div>
				</div>
			</div>
		</div> <!-- End row -->
	</div> <!-- End container -->
</div> <!-- End content div -->