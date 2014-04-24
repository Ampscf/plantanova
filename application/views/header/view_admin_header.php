<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Plantanova</title>

	<!-- Scripts -->
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-1.9.1.js"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<!-- Tema opcional -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
	<!-- Bootstrap JavaScript -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

	<!-- Customs -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/css/custom.css';?>">
</head>
<body>
	<div id="wrapper">
		<!-- Contenedor para el encabezado de la pagina o la barra de encabezado -->
		<div id="container">
			<div class="row">
				<div class="navbar navbar-default navbar-fixed-top" role="navigation">
					<div class="container">
						<div class="navbar-header">
							<a class="navbar-brand" href="#">
								<img src="<?php echo base_url() . '/img/logo.png'; ?>" alt="Logotipo" style="height:30px; width:auto;">
							</a>
							<!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button> -->
							
						</div>
						<div class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li class="active"><a href="#">Ver pedidos</a></li>
								<li><a href="#about">Hacer pedido</a></li>
								<li><a href="#contact">Cuenta</a></li>
								<!-- <li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="#">Action</a></li>
										<li><a href="#">Another action</a></li>
										<li><a href="#">Something else here</a></li>
										<li class="divider"></li>
										<li class="dropdown-header">Nav header</li>
										<li><a href="#">Separated link</a></li>
										<li><a href="#">One more separated link</a></li>
									</ul>
								</li> -->
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $usuario->mail; ?><b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="#">Mi Cuenta</a></li>
										<li class="divider"></li>
										<li><a href="#">Log out</a></li>
									</ul>
								</li>
							</ul>
						</div><!--/.nav-collapse -->
					</div>
				</div>
			</div>
		</div>