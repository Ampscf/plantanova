	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/css/TableTools.css';?>"/>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		<script type="text/javascript" src="<?php echo base_url() . 'css/js/jquery.dataTables.min.js'; ?>"></script>
		<script type="text/javascript" src="<?php echo base_url() . 'css/js/TableTools.js'; ?>"></script>	
		<script type="text/javascript" src="<?php echo base_url() . 'css/js/ZeroClipboard.js'; ?>"></script>	
		<script type="text/javascript" src="<?php echo base_url() . 'css/js/jquery.noty.js'; ?>"></script>
		<script type="text/javascript" src="<?php echo base_url() . 'css/js/layouts/topCenter.js'; ?>"></script>
		<script type="text/javascript" src="<?php echo base_url() . 'css/js/themes/default.js'; ?>"></script>

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
					        <li><a href="#" class="some" rel="fourth">Pinchado</a> <span class="divider"></span></li>
					        <li><a href="#" class="some" rel="fifth">Transplante</a> <span class="divider"></span></li>
					       
						</ul>
						<div id="area" >
								<?php echo "Proceso";?>
							<?php include('application/views/extra/tabla_pedido_proceso.php'); ?>
						</div>
						<div class="first" id="first" style="display:none;">
							<?php echo "Proceso";?>
							<?php include('application/views/extra/tabla_pedido_proceso.php'); ?>
						</div>
						<div class="second" style="display:none;">
							<?php echo "Germinacion";?>
							<?php include('application/views/extra/tabla_pedido_proceso_germinacion.php'); ?>
						</div>
						<div class="third" style="display:none;">
							<?php echo "Injerto";?>
							<?php include('application/views/extra/tabla_pedido_proceso_injerto.php'); ?>
						</div>
						<div class="fourth" style="display:none;">
							<?php echo "Plantado";?>
							<?php include('application/views/extra/tabla_pedido_proceso_pinchado.php'); ?>
						</div>
						<div class="fifth" style="display:none;">
							<?php echo "Transplante";?>
							<?php include('application/views/extra/tabla_pedido_proceso_transplante.php'); ?>
						</div>
							

						<script type="text/javascript">
						
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