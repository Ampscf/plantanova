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

		<!--<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>-->
	
	<script>
		$(function() {
			//alert("entro");
			$( "#datepicker" ).datepicker();
		});

		$(function() {    
	       $('#butondate').click(function() {
	          $('#datepicker').datepicker('show');
	       });
	    });
		 jQuery(function($){
		 	$.datepicker.regional['es'] = {
	            closeText: 'Cerrar',
	            prevText: '&#x3c;Ant',
	            nextText: 'Sig&#x3e;',
	            currentText: 'Hoy',
	            monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	            'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	            monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
	            'Jul','Ago','Sep','Oct','Nov','Dic'],
	            dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
	            dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
	            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
	            weekHeader: 'Sm',
	            dateFormat: 'dd-mm-yy',
	            firstDay: 1,
	            isRTL: false,
	            showMonthAfterYear: false,
	            yearSuffix: ''
	        };
		    
		    $.datepicker.setDefaults($.datepicker.regional['es']);
		});


		$(function() {
			//alert("entro");
			$( ".datepicker1" ).datepicker();
		});
		$(function() {    
	       $('#butondate1').click(function() {
	          $('.datepicker1').datepicker('show');
	       });
	    });
		 jQuery(function($){
		 	$.datepicker.regional['es'] = {
	            closeText: 'Cerrar',
	            prevText: '&#x3c;Ant',
	            nextText: 'Sig&#x3e;',
	            currentText: 'Hoy',
	            monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	            'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	            monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
	            'Jul','Ago','Sep','Oct','Nov','Dic'],
	            dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
	            dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
	            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
	            weekHeader: 'Sm',
	            dateFormat: 'dd-mm-yy',
	            firstDay: 1,
	            isRTL: false,
	            showMonthAfterYear: false,
	            yearSuffix: ''
	        };
		    
		    $.datepicker.setDefaults($.datepicker.regional['es']);
		});
		
		$(function() {
			//alert("entro");
			$( ".datepicker2" ).datepicker();
		});
		$(function() {    
	       $('#butondate2').click(function() {
	          $('.datepicker2').datepicker('show');
	       });
	    });
		 jQuery(function($){
		 	$.datepicker.regional['es'] = {
	            closeText: 'Cerrar',
	            prevText: '&#x3c;Ant',
	            nextText: 'Sig&#x3e;',
	            currentText: 'Hoy',
	            monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	            'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	            monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
	            'Jul','Ago','Sep','Oct','Nov','Dic'],
	            dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
	            dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
	            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
	            weekHeader: 'Sm',
	            dateFormat: 'dd-mm-yy',
	            firstDay: 1,
	            isRTL: false,
	            showMonthAfterYear: false,
	            yearSuffix: ''
	        };
		    
		    $.datepicker.setDefaults($.datepicker.regional['es']);
		});
		
			$(function() {
			//alert("entro");
			$( ".datepicker3" ).datepicker();
		});
		$(function() {    
	       $('#butondate3').click(function() {
	          $('.datepicker3').datepicker('show');
	       });
	    });
		 jQuery(function($){
		 	$.datepicker.regional['es'] = {
	            closeText: 'Cerrar',
	            prevText: '&#x3c;Ant',
	            nextText: 'Sig&#x3e;',
	            currentText: 'Hoy',
	            monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	            'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	            monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
	            'Jul','Ago','Sep','Oct','Nov','Dic'],
	            dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
	            dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
	            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
	            weekHeader: 'Sm',
	            dateFormat: 'dd-mm-yy',
	            firstDay: 1,
	            isRTL: false,
	            showMonthAfterYear: false,
	            yearSuffix: ''
	        };
		    
		    $.datepicker.setDefaults($.datepicker.regional['es']);
		});

			$(function() {
			//alert("entro");
			$( ".datepicker4" ).datepicker();
		});
		$(function() {    
	       $('#butondate4').click(function() {
	          $('.datepicker4').datepicker('show');
	       });
	    });
		 jQuery(function($){
		 	$.datepicker.regional['es'] = {
	            closeText: 'Cerrar',
	            prevText: '&#x3c;Ant',
	            nextText: 'Sig&#x3e;',
	            currentText: 'Hoy',
	            monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	            'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	            monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
	            'Jul','Ago','Sep','Oct','Nov','Dic'],
	            dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
	            dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
	            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
	            weekHeader: 'Sm',
	            dateFormat: 'dd-mm-yy',
	            firstDay: 1,
	            isRTL: false,
	            showMonthAfterYear: false,
	            yearSuffix: ''
	        };
		    
		    $.datepicker.setDefaults($.datepicker.regional['es']);
		});

		$(function() {
			//alert("entro");
			$( "#butondates" ).datepicker();
		});
		$(function() {    
	       $('#butondatz').click(function() {
	          $('#butondates').datepicker('show');
	       });
	    });
		 jQuery(function($){
		 	$.datepicker.regional['es'] = {
	            closeText: 'Cerrar',
	            prevText: '&#x3c;Ant',
	            nextText: 'Sig&#x3e;',
	            currentText: 'Hoy',
	            monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	            'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	            monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
	            'Jul','Ago','Sep','Oct','Nov','Dic'],
	            dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
	            dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
	            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
	            weekHeader: 'Sm',
	            dateFormat: 'dd-mm-yy',
	            firstDay: 1,
	            isRTL: false,
	            showMonthAfterYear: false,
	            yearSuffix: ''
	        };
		    
		    $.datepicker.setDefaults($.datepicker.regional['es']);
		});
	
	</script>

</head>
<body>
	<div id="wrapper">
		<!-- Contenedor para el encabezado de la pagina o la barra de encabezado -->
				<nav class="navbar navbar-default" role="navigation" style="min-height: 30px;padding-left: 30px;">
					<div class="container">
						<div class="navbar-header">
							<?php $img='<img src="'. base_url() . 'img/logo2.jpg" style="height:30px; width:auto;">'; echo anchor('order/index', $img, 'class="navbar-brand"'); ?>
							<!--<a class="navbar-brand" href="#">
								<img src="<?php echo base_url() . '/img/logo2.jpg'; ?>" alt="Logotipo" style="height:30px; width:auto;"/>
							</a>
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
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
								<li style="border-left: 1px solid #000;"><?php echo anchor('seeds/index','Semillas'); ?></li>
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