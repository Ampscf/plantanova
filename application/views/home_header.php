<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Planta Nova</title>

		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="//code.jquery.com/jquery-1.9.1.js"></script>
		<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo base_url() . 'css/css/bootstrap.css'; ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/css/custom.css';?>">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">

		<script>
			$(function() {
				$( "#datepicker" ).datepicker();
			});
		</script>
	</head>
	<!-- End head -->
	<body>
		<div id="wrapper">
			<nav class="navbar header" role="navigation">
			  	<div class="container-fluid">
			    	<div class="col-md-12">
			    		<a class="col-md-3 col-md-offset-1" href="#">
							<img class="logo-header" src="<?php echo base_url().'img/logoparabanner.png'; ?>">
						</a>
						<div class="row" style="padding-top:2%;">
							<ul class="nav navbar-nav" style="margin-right:20px;">
						        <li class="dropdown header-elements" styl="display:inline-block;">
							        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pedidos <b class="caret"></b></a>
							        <ul class="dropdown-menu">
							           	<li>
							        		<?php echo anchor('order_controller/index','Hacer pedido'); ?>
							           	</li>
							           	<?php if($this->session->userdata('id_rol') == 1)
							           	{ ?>
								            <li>
								            	<?php echo anchor('order_controller/admin','Ver pedidos'); ?>
								            </li>
								        <?php } ?>
						            </ul>
						        </li>
						    </ul>
							<ul class="nav navbar-nav">
						        <li class="header-elements" style="display:inline-block;">
						        	<?php echo anchor('Order_controller/semillas', 'Semillas', 'class="header-link"'); ?>
						        </li>
						        <?php if($this->session->userdata('id_rol') == 1)
						        { ?>
							        <li class="header-elements" style="display:inline-block;">
							        	<?php echo anchor('#', 'Usuarios', 'class="header-link"'); ?>
							        </li>
							    <?php } ?>
						    </ul>
						    <ul class="nav navbar-nav navbar-right">
						        <div class="btn-group header-elements col-md-2">
						    		<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
						    			<?php echo $this->session->userdata('mail'); ?>
						      			<span class="caret"></span>
						    		</button>
						    		<ul class="dropdown-menu">
						      			<li>
						      				<?php echo anchor('#', 'Cuenta <span class="glyphicon glyphicon-user pull-right"></span>'); ?>
									    </li>
						      			<li role="presentation" class="divider"></li>
						      			<li>
						      				<?php echo anchor('Login_controller/logout', 'Salir <span class="glyphicon glyphicon-off pull-right"></span>'); ?>
						      			</li>
						    		</ul>
								</div>
							</ul>
						</div>
			    	</div>
				</div><!-- /.container-fluid -->
			</nav>
			<div id="content">
