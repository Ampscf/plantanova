<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Plantanova</title>

	<!-- Scripts -->
	
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.css"/>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css"/>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	
	<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/css/custom.css';?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/css/TableTools.css';?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/css/styles.css';?>"/>
	
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>	
		
	
		<!--<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>-->
	
	<script>
		$(function() {
			//alert("entro");
			$( "#datepicker" ).datepicker();
		});
	</script>

</head>
<body>
	<div id="wrapper">
		<!-- Contenedor para el encabezado de la pagina o la barra de encabezado -->
				<nav class="navbar navbar-default" role="navigation" style="min-height: 30px;padding-left: 30px;">
					<div class="container">
						<div class="navbar-header">
							<a class="navbar-brand" href="#" style="height: 40px; padding: 5px;">
								<img src="<?php echo base_url() . '/img/logo2.jpg'; ?>" alt="Logotipo" style="height:30px; width:auto;"/>
							</a>
							<!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button> -->
							
						</div>
						<div class="navbar-collapse collapse">
							<ul class="nav nav-justified">
								<li class="active" style="border-left: 1px solid #000;"><?php echo anchor('order/index','Ver pedidos'); ?></li>
								<li style="border-left: 1px solid #000;"><?php echo anchor('order/carga_ordenes','Hacer pedido'); ?></li>
								<li style="border-left: 1px solid #000;"><?php echo anchor('admin/list_clients','Clientes'); ?></li>
								<li class="dropdown" style="border-left: 1px solid #000;">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<?php echo $this->session->userdata('mail'); ?>
						      			<span class="caret"></span>
						      		</a>
									<ul class="dropdown-menu">
										<li>
						      				<?php echo anchor('admin/my_acount_form', 'Cuenta <span class="glyphicon glyphicon-user pull-right"></span>'); ?>
									    </li>
						      			<li role="presentation" class="divider"></li>
						      			<li>
						      				<?php echo anchor('principal/logout', 'Salir <span class="glyphicon glyphicon-off pull-right"></span>'); ?>
						      			</li>
									</ul>
								</li>
							</ul>
							
						</div><!--/.nav-collapse -->
					</div>
				</nav>
				<div id="content">