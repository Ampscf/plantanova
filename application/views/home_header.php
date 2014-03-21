<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Planta Nova</title>

		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="<?php echo base_url() . 'css/css/bootstrap.css'; ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/css/custom.css';?>">

	</head>
	<!-- End head -->
	<body>
		<nav class="navbar header" role="navigation">
		  	<div class="container-fluid">
		    	<div class="col-md-12">
		    		<a class="col-md-3 col-md-offset-1" href="#">
						<img class="logo-header" src="<?php echo base_url().'img/logoparabanner.png'; ?>">
					</a>
					<li class="header-elements col-md-1" style="display:inline-block;">
			        	<a class="header-link" href="#">Pedidos</a>
			        </li>
			        <li class="header-elements col-md-1" style="display:inline-block;">
			        	<a class="header-link" href="#">Usuarios</a>
			        </li>
			        <div class="btn-group header-elements col-md-2 col-md-offset-6">
			    		<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
			    			<?php echo $this->session->userdata('mail'); ?>
			      			<span class="caret"></span>
			    		</button>
			    		<ul class="dropdown-menu">
			      			<li>
						      	<a href="#">Mi cuenta <span class="glyphicon glyphicon-user pull-right"></span></a>
						    </li>
			      			<li role="presentation" class="divider"></li>
			      			<li>
			      				<a href="#">Salir <span class="glyphicon glyphicon-off pull-right"></span></a>
			      			</li>
			    		</ul>
					</div>
		    	</div>
			</div><!-- /.container-fluid -->
		</nav>


		

					
			        	
			        	