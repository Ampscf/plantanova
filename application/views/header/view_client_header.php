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
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'css/js/jspdf.js'; ?>"></script>
</head>
<body>
	<div id="wrapper">
	<!-- Contenedor para el encabezado de la pagina o la barra de encabezado -->
	<nav class="navbar navbar-default" role="navigation" style="min-height: 80px;padding-left: 30px;">
		<div class="container">	
			<div class="navbar-header">
				<?php $img='<img src="'. base_url() . 'img/LOGOS_plantanova.png" style="height:70px;">'; echo anchor('client/index', $img, 'class="navbar-brand"'); ?>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav nav-justified">
					<li class="dropdown" style="border-left: 1px solid #000;">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height:77px;" id="pedi">
							Ver pedidos
			      			<span class="caret"></span>
			      		</a>
			      		<ul class="dropdown-menu">
			      			<li><?php echo anchor('client/index','Nuevos');?></li>
			      			<li role="presentation" class="divider"></li>
			      			<li><?php echo anchor('client/pedido_proceso','En Proceso');?></li>
			      			<li role="presentation" class="divider"></li>
			      			<li><?php echo anchor('client/pedido_embarcado','Embarcados');?></li>
			      			<li role="presentation" class="divider"></li>
			      			<li><?php echo anchor('client/finalizado','Finalizados');?></li>
			      			<li role="presentation" class="divider"></li>
			      			<li><?php echo anchor('client/todos','Todos');?></li>
			      		</ul>
					</li>		
					<li style="border-left: 1px solid #000;"><?php echo anchor('client/inform','Avisos','id="info" style="height:77px;"'); ?></li>
					<li class="dropdown" style="border-left: 1px solid #000;">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height:77px;">
							<?php echo $this->session->userdata('mail'); ?>
						    <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li>
						      	<?php echo anchor('client/my_acount_form_client', 'Cuenta <span class="glyphicon glyphicon-user pull-right"></span>'); ?>
							</li>
						    <li role="presentation" class="divider"></li>
						    <li>
						    	<?php echo anchor('principal/logout', 'Salir <span class="glyphicon glyphicon-off pull-right"></span>'); ?>
						    </li>
						</ul>	
					</li>	
				</ul>	
			</div>
			<script>
				var url = window.location.href;
				if (/(contributors)/i.test(url)) {
					document.getElementById("cola").style.color = "White";
					document.getElementById("cola").style.backgroundColor = "#6BBD44";
				} else if (/(inform)/i.test(url)) {
					document.getElementById("info").style.color = "White";
					document.getElementById("info").style.backgroundColor = "#6BBD44";
				} else {
					document.getElementById("pedi").style.color = "White";
					document.getElementById("pedi").style.backgroundColor = "#6BBD44";
				}	
			</script>
		</div>
	</nav>	
	<div id="content">	
