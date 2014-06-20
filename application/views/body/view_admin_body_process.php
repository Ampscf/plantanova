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
					        <li><a href="#" class="some1" >Proceso</a></li>
					        <li><a href="#" class="some6" >Siembra</a> <span class="divider"></span></li>
					        <li><a href="#" class="some2" >Germinacion</a> <span class="divider"></span></li>
					        <li><a href="#" class="some3" >Injerto</a> <span class="divider"></span></li>
					        <li><a href="#" class="some4" >Pinchado</a> <span class="divider"></span></li>
					        <li><a href="#" class="some5" >Transplante</a> <span class="divider"></span></li>
					        
					       
						</ul>
						
						<div id="a" >
							<?php echo "Proceso";?>
							<?php include('application/views/extra/tabla_pedido_proceso.php'); ?>
						</div>
						<div id="b" >
							<?php echo "Germinacion";?>
							<?php include('application/views/extra/tabla_pedido_proceso_germinacion.php'); ?>
						</div>
						<div id="c" >
							<?php echo "Injerto";?>
							<?php include('application/views/extra/tabla_pedido_proceso_injerto.php'); ?>
						</div>
						<div id="d" >
							<?php echo "Pinchado";?>
							<?php include('application/views/extra/tabla_pedido_proceso_pinchado.php'); ?>
						</div>
						<div  id="e" >
							<?php echo "Transplante";?>
							<?php include('application/views/extra/tabla_pedido_proceso_transplante.php'); ?>
						</div>
						<div  id="f" >
							<?php echo "Siembra";?>
							<?php include('application/views/extra/tabla_pedido_proceso_siembra.php'); ?>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- End row -->
	</div> <!-- End container -->
</div> <!-- End content div -->

<script type="text/javascript">
						
	document.getElementById("a").style.display = "block";
	document.getElementById("b").style.display = "none";
	document.getElementById("c").style.display = "none";
	document.getElementById("d").style.display = "none";
	document.getElementById("e").style.display = "none";
	document.getElementById("f").style.display = "none";

	$(".some1").click(function() {  
		document.getElementById("a").style.display = "block";
		document.getElementById("b").style.display = "none";
		document.getElementById("c").style.display = "none";
		document.getElementById("d").style.display = "none";
		document.getElementById("e").style.display = "none";
		document.getElementById("f").style.display = "none";
	});

	$(".some2").click(function() {  
		document.getElementById("a").style.display = "none";
		document.getElementById("b").style.display = "block";
		document.getElementById("c").style.display = "none";
		document.getElementById("d").style.display = "none";
		document.getElementById("e").style.display = "none";
		document.getElementById("f").style.display = "none";
	});

	$(".some3").click(function() {  
		document.getElementById("a").style.display = "none";
		document.getElementById("b").style.display = "none";
		document.getElementById("c").style.display = "block";
		document.getElementById("d").style.display = "none";
		document.getElementById("e").style.display = "none";
		document.getElementById("f").style.display = "none";
	});
	$(".some4").click(function() {  
		document.getElementById("a").style.display = "none";
		document.getElementById("b").style.display = "none";
		document.getElementById("c").style.display = "none";
		document.getElementById("d").style.display = "block";
		document.getElementById("e").style.display = "none";
		document.getElementById("f").style.display = "none";
	});
	$(".some5").click(function() {  
		document.getElementById("a").style.display = "none";
		document.getElementById("b").style.display = "none";
		document.getElementById("c").style.display = "none";
		document.getElementById("d").style.display = "none";
		document.getElementById("e").style.display = "block";
		document.getElementById("f").style.display = "none";
	});
	$(".some6").click(function() {  
		document.getElementById("a").style.display = "none";
		document.getElementById("b").style.display = "none";
		document.getElementById("c").style.display = "none";
		document.getElementById("d").style.display = "none";
		document.getElementById("e").style.display = "none";
		document.getElementById("f").style.display = "block";
	});

</script>