<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Planta Nova</title>

		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/css/custom.css';?>">

	</head>
	<!-- End head -->
	<body>
		<header class="" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="#" height="63px">
						<img src="<?php echo base_url().'img/logo.png'; ?>" height="100%">
					</a>
				</div>
				<!-- End logo -->
				<div class="">
			      	<ul class="nav navbar-nav">
				        <li class="active">
				        	<a href="#">Home</a>
				        </li>
				        <li>
				        	<a href="#">Reports</a>
				        </li>
				        <li>
				        	<a href="#">Requests</a>
				        </li>
			      	</ul>
			      	<ul class="nav navbar-nav navbar-right">
				        <div class="btn-group" style="margin-top:10px; margin-right:5px;">
						    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						    	<?php echo $this->session->userdata('mail'); ?>
						      	<span class="caret"></span>
						    </button>
						    <ul class="dropdown-menu">
						      <li>
						      	<a href="#">Account <span class="glyphicon glyphicon-user pull-right"></span></a>
						      </li>
						      <li role="presentation" class="divider"></li>
						      <li>
						      	<a href="#">Logout <span class="glyphicon glyphicon-off pull-right"></span></a>
						      </li>
						    </ul>
						</div>
				    </ul>
			    </div><!-- /.navbar-collapse -->
			</div>
		</header> <!-- End header -->