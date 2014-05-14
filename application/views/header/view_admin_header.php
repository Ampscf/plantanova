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
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/css/custom.css';?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/css/TableTools.css';?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/css/styles.css';?>"/>
</head>
<body>
	<div id="wrapper">
		<!-- Contenedor para el encabezado de la pagina o la barra de encabezado -->
				<nav class="navbar navbar-default" role="navigation">
					<div class="container">
						<div class="navbar-header">
							<a class="navbar-brand" href="#">
								<img src="<?php echo base_url() . '/img/logo.png'; ?>" alt="Logotipo" style="height:30px; width:auto;"/>
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
								<li class="active"><?php echo anchor('order/index','Ver pedidos'); ?></li>
								<li><?php echo anchor('order/register_order_form','Hacer pedido'); ?></li>
								<li><?php echo anchor('admin/register_client_form','Clientes'); ?></li>
								<li class="dropdown">
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