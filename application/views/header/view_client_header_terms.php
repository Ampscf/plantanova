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
				<?php $img='<img src="'. base_url() . 'img/LOGOS_plantanova.png" style="height:70px;">'; echo anchor('client/index', $img, 'class="navbar-brand" style="height:auto !important"'); ?>
			</div>
				
		</div>
	</nav>	
	<div id="content">	

